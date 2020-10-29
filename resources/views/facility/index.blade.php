@extends('layouts.app')
@section('content')
    <div class="section banner bg-color-primary container container-palette">
        <div class="container banner-container">
            <div class="banner-body text-center">
                <h2 class="title">Room Facility</h2><!-- ./ banner body -->
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
                        <a class="btn btn-primary float-right" href="{{ route('room-facility.create') }}"> Add New Facility</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered display" id="example"  style="width:100%">
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th width="280px">Action</th>
                            </tr>
                            @php
                             $i = 0;
                            @endphp
                            @foreach ($data as $key => $row)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ Str::limit($row->desc,50,'...') }}</td>
                                    <td>{{date('d-M-Y',strtotime($row->created_at))}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('room-facility.edit',$row->id) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('room-facility.destroy',$row->id) }}">Delete</a>
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
