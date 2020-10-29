@extends('layouts.app')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="section banner bg-color-primary container container-palette">
        <div class="container banner-container">
            <div class="banner-body text-center">
                <h2 class="title">Update Room</h2><!-- ./ banner body -->
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
                        <a class="btn btn-primary float-right" href="{{ route('room.index') }}"> Back</a>
                    </div>
                    <form method="POST" action="{{route('room.update',$row->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Room Type</label>
                                        <select name="type" class="form-control" required>
                                            <option disabled selected>please select one</option>
                                            @foreach($categories as $category)
                                                <option {{$row->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Room Title</label>
                                        <input value="{{$row->title}}" type="text" placeholder="Room Title" name="title" id="title" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Room Name</label>
                                        <input  value="{{$row->name}}" type="text" placeholder="Room Name" name="name" id="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_of_bed">No of Beds</label>
                                        <input value="{{$row->no_of_bed}}" type="number" placeholder="No of Beds" name="no_of_bed" id="no_of_bed" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="max_adult">Max Adults </label>
                                        <input value="{{$row->max_adult}}" type="number" placeholder="Max Adults" name="max_adult" id="max_adult" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="max_child">Max Childs </label>
                                        <input value="{{$row->max_child}}" type="number" placeholder="Max Childs" name="max_child" id="max_child" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fare">Room Fare</label>
                                        <input value="{{$row->fare}}"  type="number" placeholder="Room Fare" name="fare" id="fare" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Room Image</label>
                                        <input type="file"  name="image" accept="image/*"  onchange="readURL(this);" >
                                        <img id="image" src="#" />
                                        <img src="{{URL::to($row->image)}}" width="100" height="100" alt="old image">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type">Room Facility</label>
                                        <select class="js-example-basic-multiple form-control" name="facility[]"  multiple="multiple">
                                            <option disabled selected>please select</option>
                                            @foreach($facilities as $facility)
                                                <option

                                                        @foreach($row->facilities as $rf)
                                                        {{$rf->id == $facility->id ? 'selected' : ''}}
                                                        @endforeach
                                                        value="{{$facility->id}}">{{$facility->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="desc">Room Description:</label>
                                        <textarea name="desc" class="form-control" rows="5" placeholder="Description...">{{$row->desc}}</textarea>
                                    </div>
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
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
