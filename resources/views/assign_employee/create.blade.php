@extends('layouts.app')

@section('content')
    <div class="section banner bg-color-primary container container-palette">
        <div class="container banner-container">
            <div class="banner-body text-center">
                <h2 class="title">Assign employee to room</h2><!-- ./ banner body -->
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card my-4 p-4">
                    <div class="card-title">
                        <a class="btn btn-primary float-right" href="{{ route('assign-employee.index') }}"> Back</a>
                    </div>
                    <form method="POST" action="{{route('assign-employee.store')}}">
                        @csrf
                        <div class="card-body">
                            <h3>Assign Employee </h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="room">Room No</label>
                                        <select name="room_id" class="form-control" required>
                                            <option disabled selected>please select one</option>
                                             @foreach($rooms as $room)
                                                <option value="{{$room->id}}">{{$room->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Employee</label>
                                        <select name="employee_id" class="form-control" required>
                                            <option disabled selected>please select one</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                        <label>Tasks</label>
                                        <hr>
                                        @foreach($tasks as $task)
                                            <div>
                                                <input type="checkbox" value="{{$task->name}}"  name="tasks[]">
                                                <label >{{$task->name}}</label>
                                            </div>
                                        @endforeach
                                </div>
                                <div class="col-md-2 offset-md-10 text-right">
                                   <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

