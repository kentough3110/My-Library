@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div>
                <div class="card-body">
                    <a href="{{ url('/admin/adminadd') }}" style="font-family: Euclid Circular B Semibold; background-color: #FFAB40; border: none;"
                               class="btn btn-warning btn-sm" title="Add New Book Catalog">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New Book Catalogue
                    </a>
                    <a href="{{ route('borrow.create') }}" style="font-family: Euclid Circular B Semibold; background-color: #FFAB40; border: none;"
                       class="btn btn-info btn-sm" title="Add New Book Catalog">
                        <i class="fa fa-plus" aria-hidden="true"></i> Borrower's Book Input
                    </a>
                    <a href="{{ route('borrow.index') }}" style="font-family: Euclid Circular B Semibold; background-color: #FFAB40; border: none;"
                       class="btn btn-info btn-sm" title="Add New Book Catalog">
                        <i class="fa fa-folder" aria-hidden="true"></i> Borrower's Book Data
                    </a>
                    <div class="card" style="margin-top: 15px">
                        <div class="card-header" style="font-family: Euclid Circular B Semibold">Books Catalogue</div>

                        <div class="card-body">
                            <br/>
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Publisher</th>
                                        <th>Publication Year</th>
                                        <th>ISBN</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($books as $book)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $book->title }}</td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ $book->publisher }}</td>
                                            <td>{{ $book->year_publication }}</td>
                                            <td>{{ $book->isbn }}</td>
                                            <td>
                                                @if($book->status == 0)
                                                    <span style="background-color: green; color: white; padding: 2px 6px; border-radius: 4px;">Book Available</span>
                                                @endif
                                                @if($book->status == 1)
                                                    <span style="background-color: #B22700; color: white; padding: 2px 6px; border-radius: 4px;">Book On Rent</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('/admin/adminedit/' . $book->id) }}" title="Edit Book"><button class="btn btn-info btn-sm" style="font-family: Euclid Circular B Semibold; background-color: #FFAB40; border: none;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                {{--                                            <form method="POST" action="{{ url('/admin/adminview/' . $book->id) }}" accept-charset="UTF-8" style="display:inline">--}}
                                                {{--                                                {{ method_field('DELETE') }}--}}
                                                {{--                                                {{ csrf_field() }}--}}
                                                {{--                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Book" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>--}}
                                                {{--                                            </form>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
