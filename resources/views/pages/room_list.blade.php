@extends('layouts.app')
@section('content')
    <div class="section banner bg-color-primary container container-palette">
        <div class="container banner-container">
            <div class="banner-body text-center">
                <h2 class="title">Our Luxaries Room</h2><!-- ./ banner body -->
            </div>
        </div>
    </div>
    <div class="container my-4 ">
        <div class="row">
            @foreach($rooms as $room)
                <div class="col-md-4 my-1">
                    <div class="card">

                        <img class="card-img-top" src="{{URL::to($room->image)}}" alt="Card image" style="width:100%;height: 200px">
                        <div class="card-body">
                            <h4 class="card-title">{{$room->type->title}} Room</h4>
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    No of Beds
                                    <span class="badge badge-primary badge-pill">{{$room->no_of_bed}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Fare
                                    <span class="badge badge-primary badge-pill">{{$room->fare}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Facility
                                    @foreach($room->facilities as $facility)
                                    <span class="badge badge-primary badge-pill">{{$facility->title}}</span>
                                    @endforeach

                                </li>
                            </ul>
                            <div class="mt-2">
                                <a href="{{route('room-details',$room->id)}}" class="btn btn-sm btn-secondary float-right mx-1">View</a>
                                @if( url()->current() == route('search.room') )
                                    <a href="{{route('add.booking',[$room->id,$from,$to])}}" class="btn btn-sm btn-secondary float-right mx-1">Book Room</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection