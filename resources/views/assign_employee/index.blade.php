@extends('layouts.app')
@section('content')
    <div class="section banner bg-color-primary container container-palette">
        <div class="container banner-container">
            <div class="banner-body text-center">
                <h2 class="title">Employee Task</h2><!-- ./ banner body -->
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
                        <a class="btn btn-primary float-right" href="{{ route('assign-employee.create') }}"> Assign Employee</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered display" id="example"  style="width:100%">
                            <tr>
                                <th>No</th>
                                <th>Room No</th>
                                <th>Employee</th>
                                <th>Task</th>
                                <th class="text-center" width="280px">Action</th>
                            </tr>
                            @php
                             $i = 0;
                            @endphp
                            @foreach ($data as $key => $row)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{$row->room->title}}</td>
                                    <td>{{$row->user->name}}</td>
                                    <td>
                                        @foreach(json_decode($row->tasks) as $task)
                                            <span class="badge badge-secondary">{{$task}}</span>
                                        @endforeach
                                    </td>

                                    <td class="text-center">
                                        <a class="btn btn-info" href="{{ route('assign-employee.show',$row->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('assign-employee.edit',$row->id) }}">Edit</a>
                                        <a class="btn btn-danger" href="{{ route('assign-employee.destroy',$row->id) }}">Delete</a>
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
