@extends('layouts.app')
@section('content')
    <div class="section banner bg-color-primary container container-palette">
        <div class="container banner-container">
            <div class="banner-body text-center">
                <h2 class="title">Room Booking List</h2><!-- ./ banner body -->
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card my-4 p-4">
                    <div class="card-body">
                        <table class="table table-bordered display" id="example"  style="width:100%">
                            <tr>
                                <th>No</th>
                                <th>Room No</th>
                                <th>Room Type</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Paid Amount</th>
                                <th class="text-center" width="280px">Action</th>
                            </tr>
                            @php
                             $i = 0;
                            @endphp
                            @foreach ($rows as $key => $row)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{$row->room_id}}</td>
                                    <td>{{$row->room->type->title}}</td>
                                    <td>{{$row->from}}</td>
                                    <td>{{$row->to}}</td>
                                    <td>{{$row->payment->Amount}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-info" href="{{ route('room-booking.show',$row->id) }}">Show</a>
                                        {{--<a class="btn btn-primary" href="{{ route('room-booking.edit',$row->id) }}">Edit</a>--}}
                                        {{--<a class="btn btn-danger" href="{{ route('room-booking.destroy',$row->id) }}">Delete</a>--}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
