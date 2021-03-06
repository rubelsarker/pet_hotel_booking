@extends('layouts.app')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="section banner bg-color-primary container container-palette">
        <div class="container banner-container">
            <div class="banner-body text-center">
                <h2 class="title">Add New Room</h2><!-- ./ banner body -->
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
                    <form method="POST" action="{{route('room.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type">Room Type</label>
                                        <select name="type" class="form-control" required>
                                            <option disabled selected>please select one</option>
                                             @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Room Title</label>
                                        <input type="text" placeholder="Room Title" name="title" id="title" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Room Name</label>
                                        <input type="text" placeholder="Room Name" name="name" id="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_of_bed">No of Beds</label>
                                        <input type="number" placeholder="No of Beds" name="no_of_bed" id="no_of_bed" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cats">No of Cats</label>
                                        <input type="number" placeholder="No of Cats" name="cats" id="cats" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dogs">No of Dogs</label>
                                        <input type="number" placeholder="No of Dogs" name="dogs" id="dogs" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fare">Room Fare</label>
                                        <input type="number" placeholder="Room Fare" name="fare" id="fare" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Room Image</label>
                                        <input type="file"  name="image" accept="image/*"  onchange="readURL(this);" >
                                        <img id="image" src="#" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="type">Room Facility</label>
                                        <select class="js-example-basic-multiple form-control" name="facility[]"  multiple="multiple">
                                            <option disabled selected>please select</option>
                                            @foreach($facilities as $facility)
                                                <option value="{{$facility->id}}">{{$facility->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="desc">Room Description:</label>
                                        <textarea name="desc" class="form-control" rows="5" placeholder="Description..."></textarea>
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
