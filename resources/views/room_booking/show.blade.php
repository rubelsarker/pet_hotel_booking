@extends('layouts.app')
@section('styles')
   <style>
       @media print {
           body * {
               visibility: hidden;
           }
           #section-to-print, #section-to-print * {
               visibility: visible;
           }
           #section-to-print {
               position: absolute;
               left: 0;
               top: 0;
           }
       }
   </style>
@endsection
@section('content')
    <div class="section banner bg-color-primary container container-palette">
        <div class="container banner-container">
            <div class="banner-body text-center">
                <h2 class="title">Booking Details</h2><!-- ./ banner body -->
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
                        <a class="btn btn-primary float-right" href="{{ route('room-booking.index') }}"> Back</a>
                    </div>
                    <div class="card-body" id="section-to-print">
                        <h3>Booking Receipt</h3>
                        <hr>
                       <div class="row">
                           <div class="col-8">
                               <ul class="list-group">
                                   <li class="list-group-item d-flex justify-content-between align-items-center">
                                       Booking Id
                                       <span class="badge badge-secondary badge-pill">{{$row->id}}</span>
                                   </li>
                                   <li class="list-group-item d-flex justify-content-between align-items-center">
                                       Customer Name
                                       <span class="badge badge-secondary badge-pill">{{$row->user->name}}</span>
                                   </li>
                                   <li class="list-group-item d-flex justify-content-between align-items-center">
                                       Customer Mobile
                                       <span class="badge badge-secondary badge-pill">{{$row->user->mobile}}</span>
                                   </li>
                                   <li class="list-group-item d-flex justify-content-between align-items-center">
                                       Customer Email
                                       <span class="badge badge-secondary badge-pill">{{$row->user->email}}</span>
                                   </li>
                                   <li class="list-group-item d-flex justify-content-between align-items-center">
                                       Type
                                       <span class="badge badge-secondary badge-pill">{{$row->room->type->title}}</span>
                                   </li>
                                   <li class="list-group-item d-flex justify-content-between align-items-center">
                                       Name
                                       <span class="badge badge-secondary badge-pill">{{$row->room->name}}</span>
                                   </li>

                                   <li class="list-group-item d-flex justify-content-between align-items-center">
                                       No of Pets
                                       <span class="badge badge-secondary badge-pill">{{$row->room->no_of_bed}}</span>
                                   </li>
                                   <li class="list-group-item d-flex justify-content-between align-items-center">
                                       Max Adults
                                       <span class="badge badge-secondary badge-pill">{{$row->room->max_adult}}</span>
                                   </li>
                                   <li class="list-group-item d-flex justify-content-between align-items-center">
                                       Max Childs
                                       <span class="badge badge-secondary badge-pill">{{$row->room->max_child}}</span>
                                   </li>
                                   <li class="list-group-item d-flex justify-content-between align-items-center">
                                       Facility
                                       @foreach($row->room->facilities as $facility)
                                           <span class="badge badge-secondary badge-pill">{{$facility->title}}</span>
                                       @endforeach
                                   </li>
                                   <li class="list-group-item d-flex justify-content-between align-items-center">
                                       Total Paid
                                       <span class="badge badge-secondary badge-pill">{{$row->payment->Amount}}</span>
                                   </li>
                               </ul>
                           </div>
                           <div class="col-4">
                               <img src="{{URL::to($row->room->image)}}" alt="Room Image">
                           </div>
                       </div>
                    </div>
                    <div class="">
                        <a onclick="window.print()" class="btn btn-sm btn-info text-white">Print</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
