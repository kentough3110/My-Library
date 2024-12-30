@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div >
            <div class="container">
                <div class="row">
                    <div>
                        <div class="card">
                            <div class="card-header" style="font-family: Euclid Circular B Semibold">Book Catalogue</div>
                            <div class="card-body">
{{--                                <form class="navbar navbar-light bg-light" method="GET">--}}
{{--                                    <nav action="/home/search" class="form-inline">--}}
{{--                                        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">--}}
{{--                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--                                    </nav>--}}
{{--                                </form>--}}
                                <div class="table-responsive">
                                    <table class="table table-hover table-borderless">
                                        <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Publisher</th>
                                            <th>Publication Year</th>
                                            <th>ISBN</th>
                                            <th>Status</th>
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
    </div>
</div>
@endsection
