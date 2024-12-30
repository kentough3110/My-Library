@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="card" style="margin-top: 15px; padding: 0px">
                <div class="card-header" style="font-family: Euclid Circular B Semibold">Borrower's Book Data</div>
                    <div class="card-body">
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Name</th>
                                    <th>Gmail</th>
                                    <th>Borrow Date</th>
                                    <th>Return Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($borrows as $borrow)
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $loop->iteration }}</td>
                                            @foreach ($books as $book)
                                                @if ($borrow->book_id == $book->id)
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-black-900">
                                                        {{ $book->title }}
                                                    </td>
                                                @endif
                                            @endforeach

                                            @foreach ($users as $user)
                                                @if ($borrow->user_id == $user->id)
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $user->name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $user->email }}
                                                    </td>
                                                @endif
                                            @endforeach
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $borrow->borrow_date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $borrow->return_date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            @if($borrow->status == 0)
                                                <span style="background-color: green; color: white; padding: 2px 6px; border-radius: 4px;">Reservation Done</span>
                                            @endif
                                            @if($borrow->status == 1)
                                                <span style="background-color: #B22700; color: white; padding: 2px 6px; border-radius: 4px;">Reservation On Going</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{--if status == 1, show action btn--}}
                                            @if($borrow->status ==1)
                                                {{--call function web.php to change the value from 1 to 0--}}
                                                <form method="POST" action="{{ url('/admin/borrow/borrowindex/'.$borrow->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('Patch') }}
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="status" id="status" class="form-input rounded-md shadow-sm mt-1 block w-full" value= 0 />
                                                    <button type="submit" class="btn btn-success btn-sm" title="Return Book" onclick="return confirm(&quot;Confirm return book?&quot;)">Finish</button>
                                                </form>
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
@endsection
