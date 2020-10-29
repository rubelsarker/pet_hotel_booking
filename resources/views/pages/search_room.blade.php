@extends('layouts.app')
@section('content')
    <div class="section banner bg-color-primary container container-palette">
        <div class="container banner-container">
            <div class="banner-body text-center">
                <h2 class="title">Searching Room</h2><!-- ./ banner body -->
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
                    <form  method="POST" action="{{route('search.room')}}">
                        @csrf
                        <h3>Searching Room</h3>
                        <hr>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="from">Check In</label>
                                        <input name="from" id="from" type="date" class="form-control" placeholder="Check In" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="to">Check Out</label>
                                        <input name="to" id="to" type="date" class="form-control" placeholder="Check Out" required />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pets">Pets</label>
                                        <input name="pets" id="pets" type="number" class="form-control" placeholder="Pets" required />
                                    </div>
                                </div>

                                <div class="col-md-2 offset-md-10 text-right">
                                    <button type="submit" class="btn btn-primary">Searching</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

