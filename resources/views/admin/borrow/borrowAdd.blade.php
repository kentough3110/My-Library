@extends('layouts.app')
@section('content')
    <div class="card mx-auto" style="max-width: 1300px">
        <div class="card-header" style="font-family: Euclid Circular B Semibold">Borrower's Book Input Page</div>
        <div class="card-body">

{{--            <form action="{{ url('borrow/borrowadd') }}" method="post">--}}
            <form action="{{ route('borrow.store') }}" method="post">
                {!! csrf_field() !!}
                <div>
                    <label for="book_id" class="block font-medium text-sm text-gray-700">Book</label>
                    <select name="book_id" id="book_id" class="form-control block rounded-md shadow-sm mt-1 block w-full">
                        @foreach($books as $book)
                            @if($book->status == 0)
                                <option value="{{ $book->id }}">{{$book->title . ' (' . $book->year_publication .')'}}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('book_id')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                </br>
                <div>
                    <label for="user_id" class="block font-medium text-sm text-gray-700">User</label>
                    <select name="user_id" id="user_id" class="form-control block rounded-md shadow-sm mt-1 block w-full" >
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{$user->email . ' (' . $user->name .')'}}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                </br>
                <div>
                    <label for="loan_date" class="block font-medium text-sm text-gray-700">Borrow Date</label>
                    <input type="date" name="borrow_date" id="borrow_date" class="form-control rounded-md shadow-sm mt-1 block w-full"
                           value="{{ $borrow_date }}" readonly/>
                    @error('loan_date')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                </br>
                <div>
                    <label for="return_date" class="block font-medium text-sm text-gray-700">Return Date</label>
                    <input type="date" name="return_date" id="return_date" class="form-control rounded-md shadow-sm mt-1 block w-full"
                           value="{{ $return_date }}" readonly/>
                    @error('return_date')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                </br>
                <div style="margin-top: 15px">
                    <input type="hidden" name="status" id="status" class="form-input rounded-md shadow-sm mt-1 block w-full"
                           value=1 />
                    @error('status')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="Save" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@endsection
