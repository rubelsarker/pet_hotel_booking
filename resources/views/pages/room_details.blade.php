@extends('layouts.app')
@section('content')
    <div class="section banner bg-color-primary container container-palette">
        <div class="container banner-container">
            <div class="banner-body text-center">
                <h2 class="title">Room Details</h2><!-- ./ banner body -->
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card my-4 p-4">
                    <div class="card-title">
                        <a class="btn btn-primary float-right" href="{{ route('room.list') }}"> Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Type
                                        <span class="badge badge-secondary badge-pill">{{$row->type->title}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Name
                                        <span class="badge badge-secondary badge-pill">{{$row->name}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Title
                                        <span class="badge badge-secondary badge-pill">{{$row->title}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        No of Beds
                                        <span class="badge badge-secondary badge-pill">{{$row->no_of_bed}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Max Adults
                                        <span class="badge badge-secondary badge-pill">{{$row->max_adult}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Max Childs
                                        <span class="badge badge-secondary badge-pill">{{$row->max_child}}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Facility
                                        @foreach($row->facilities as $facility)
                                            <span class="badge badge-secondary badge-pill">{{$facility->title}}</span>
                                        @endforeach
                                    </li>
                                </ul>
                                <p class="text-muted my-2">
                                    {{$row->desc}}
                                </p>
                            </div>
                            <div class="col-4">
                                <img src="{{URL::to($row->image)}}" alt="Room Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
