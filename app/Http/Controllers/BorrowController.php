<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //show all data from table borrows
        $users = User::all();
        $books = Book::all();
        $borrows = Borrow::all();

        //pass data to the view borrowindex
        return view('admin/borrow/borrowindex', compact('users', 'books', 'borrows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //show dropdown user and book from table users and books
        $users = User::all();
        //get books where status is 0
        $books = Book::where('status', 0)->get();

        //carbon = library to get online date
        $borrow_date = Carbon::now()->format('Y-m-d');
        //7 days return
        $return_date = Carbon::now()->addDays(7)->format('Y-m-d');

        //pass data to the view borrowadd
        return view('admin/borrow/borrowadd', compact( 'users','books', 'borrow_date', 'return_date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // //Input borrower's data to database
        // $input = $request->all();
        // Borrow::create($input);

        // //move to page borrow
        // return redirect('admin/borrow')->with('flash_message', 'Success!');

        //validate input
        $request->validate([
        'book_id' => 'required|exists:books,id',
        'user_id' => 'required|exists:users,id',
        'borrow_date' => 'required|date',
        'return_date' => 'required|date|after:borrow_date',
        'status' => 'required|integer',
        ]);

        //create a new borrow record
        $borrow = Borrow::create($request->all());

        //update the status of the book
        $books = Book::findOrFail($request->book_id);
        $books->status = 1; //1 = borrowed
        $books->save();

        //redirect with success message
        return redirect('admin/borrow')->with('Success!', 'Borrow record created and book status updated.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // //Update/changing status
        // $borrow = Borrow::find($id);
        // $input = $request->all();
        // $borrow->update($input);

        // //Move to page borrow
        // return redirect('admin/borrow');

        //find the borrow record by its ID
        $borrow = Borrow::findOrFail($id);

        //update the borrow status to 0
        $borrow->status = $request->input('status');
        $borrow->save();

        //update the book status to 0
        $books = Book::findOrFail($borrow->book_id);
        $books->status = 0; // Available again
        $books->save();

        // Redirect with success message
        return redirect('admin/borrow')->with('success', 'Borrow status updated and book is now available.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        //
        $borrow->delete();

        return redirect()->route('admin/borrow/borrowindex');
    }
}
