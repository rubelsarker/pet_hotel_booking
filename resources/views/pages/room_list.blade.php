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

            <div class="col-md-12 mt-5">
                <div class="search-form">
                    <div class="widget-mapsearch container container-palette">
                        <div class="container">
                            <div class="search-overflow">
                                <form method="GET" action="{{route('search.room')}}" class="flex-row job-form">
                                    <div class="form-group col-md-3">
                                        <label for="from" class="control-label text-white">Check In</label>
                                        <input value="{{isset($_GET['from']) ? $_GET['from'] : ''}}" name="from" id="from" type="date" class="form-control" placeholder="Check In" required />
                                    </div>
                                    <div class="form-group clo-md-3">
                                        <label for="to" class="control-label text-white">Check Out</label>
                                        <input value="{{isset($_GET['to']) ? $_GET['to'] : ''}}" name="to" id="to" type="date" class="form-control" placeholder="Check Out" required />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="cats" class="control-label text-white">Cats</label>
                                        <input  value="{{isset($_GET['cats']) ? $_GET['cats'] : ''}}" name="cats" id="cats" type="number" class="form-control" placeholder="Cats"  />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="dogs" class="control-label text-white">Dogs</label>
                                        <input  value="{{isset($_GET['dogs']) ? $_GET['dogs'] : ''}}" name="dogs" id="dogs" type="number" class="form-control" placeholder="Dogs"  />
                                    </div>
                                    <div class="form-group-btn">
                                        <button style="margin-top: 30px;" type="submit" class="btn btn-flat-search">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- ./ search with map -->
                </div>
            </div>
            @if(isset($_GET['from']) && isset($_GET['to']))
                @foreach($rooms as $room)
                <div class="col-md-12 my-1">
                    <div class="card">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <img class="card-img-top" src="{{URL::to($room->image)}}" alt="Card image" style="width:100%;height: 200px">
                                </div>
                                <div class="col-md-6">
                                    <h4 class="card-title">{{$room->type->title}} Room</h4>
                                    <p>{{Str::limit($room->desc,150,'...')}}</p>
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
                                        <a href="{{route('room-details',$room->id)}}?from={{isset($_GET['from'])?$_GET['from']:null}}&to={{isset($_GET['to'])?$_GET['to']:null}}" class="btn btn-sm btn-secondary float-right mx-1">View</a>
                                        <a href="{{route('add.booking',$room->id)}}?from={{isset($_GET['from'])?$_GET['from']:null}}&to={{isset($_GET['to'])?$_GET['to']:null}}" class="btn btn-sm btn-secondary float-right mx-1">Book Room</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
                @else
                <div class="">
                    <h2>Please select a date first</h2>
                </div>
            @endif
        </div>
    </div>
@endsection