@extends('layouts.app')
@section('content')
    <div class="section banner bg-color-primary container container-palette">
        <div class="container banner-container">
            <div class="banner-body text-center">
                <h2 class="title">Booking Room Details</h2><!-- ./ banner body -->
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
                        <a class="btn btn-primary float-right" href="{{ route('room.list') }}"> Back</a>
                    </div>
                    <form method="POST" action="{{route('room-booking.store')}}">
                        @csrf
                        <h3>Review your room details</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{URL::to($room->image)}}" alt="room image">
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Type
                                        <span class="badge badge-secondary badge-pill">{{$room->type->title}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Fare per day
                                        <span class="badge badge-secondary badge-pill">{{$room->fare}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        No of pets
                                        <span class="badge badge-secondary badge-pill">{{$room->no_of_bed}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Max Adults
                                        <span class="badge badge-secondary badge-pill">{{$room->max_adult}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Max Childs
                                        <span class="badge badge-secondary badge-pill">{{$room->max_child}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Facility
                                        @foreach($room->facilities as $facility)
                                            <span class="badge badge-secondary badge-pill">{{$facility->title}}</span>
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3>Book your room</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="from">From Date</label>
                                        <input readonly value="{{$from}}" type="date" placeholder="From Date" name="from" id="from" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="to">To Date</label>
                                        <input readonly value="{{$to}}" type="date" placeholder="To Date" name="to" id="to" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customer_name">Customer Name</label>
                                        <input readonly value="{{Auth::user()->name}}" type="text"  name="customer_name"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="customer_mobile">Customer Mobile</label>
                                        <input  value="{{Auth::user()->mobile}}" type="text"  name="customer_mobile"  class="form-control">
                                    </div>
                                </div>
                                <input type="hidden" name="room_id" value="{{$room->id}}">
                                <div class="col-md-2 offset-md-10 text-right">
                                   <button type="submit" class="btn btn-primary">Booking</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

