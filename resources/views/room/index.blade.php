@extends('layouts.app')
@section('content')
    <div class="section banner bg-color-primary container container-palette">
        <div class="container banner-container">
            <div class="banner-body text-center">
                <h2 class="title">Rooms</h2><!-- ./ banner body -->
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
                    <div class="card-title">
                        <a class="btn btn-primary float-right" href="{{ route('room.create') }}"> Add New Room</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered display" id="example"  style="width:100%">
                            <tr>
                                <th>No</th>
                                <th>Room Type</th>
                                <th>Title</th>
                                <th>Photo</th>
                                <th>No of Beds</th>
                                <th>Room Fare</th>
                                <th>Room Facilities</th>
                                <th>Created At</th>
                                <th class="text-center" width="280px">Action</th>
                            </tr>
                            @php
                             $i = 0;
                            @endphp
                            @foreach ($data as $key => $row)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{$row->type->title}}</td>
                                    <td>{{$row->title}}</td>
                                    <td><img src="{{URL::to($row->image)}}" height="50" width="50" alt="Room image"></td>
                                    <td>{{$row->no_of_bed}}</td>
                                    <td>{{$row->fare}}</td>
                                    <td>
                                        @foreach($row->facilities as $facility)
                                            <span class="badge badge-info">{{$facility->title}}</span>
                                        @endforeach
                                    </td>
                                    <td>{{date('d-M-Y',strtotime($row->created_at))}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-info" href="{{ route('room.show',$row->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('room.edit',$row->id) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('room.destroy',$row->id) }}">Delete</a>
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
