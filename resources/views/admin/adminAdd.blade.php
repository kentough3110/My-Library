@extends('layouts.app')
@section('content')
    <div class="container mt-9">
        <div class="card mx-auto" style="max-width: 1500px; font-family: Euclid Circular B Semibold">
            <div class="card-header">Add New Book Catalogue Page</div>
            <div class="card-body">
                <form action="{{ url('admin/adminadd') }}" method="post">
                    {!! csrf_field() !!}
                    
                    <label>Title</label></br>
                    <input type="text" name="title" id="title" class="form-control"></br>
                    <label>Author</label></br>
                    <input type="text" name="author" id="author" class="form-control"></br>
                    <label>Publisher</label></br>
                    <input type="text" name="publisher" id="publisher" class="form-control"></br>
                    <label>Publication Year</label></br>
                    <input type="text" name="year_publication" id="year_publication" class="form-control"></br>
                    <label>ISBN</label></br>
                    <input type="text" name="isbn" id="isbn" class="form-control"></br>
                    <input type="submit" value="Save" class="btn btn-success"></br>
                </form>
            </div>
        </div>
    </div>
@endsection
