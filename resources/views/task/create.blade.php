@extends('layouts.app')
@section('content')
    <div class="section banner bg-color-primary container container-palette">
        <div class="container banner-container">
            <div class="banner-body text-center">
                <h2 class="title">Add New Task</h2><!-- ./ banner body -->
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
                        <a class="btn btn-primary float-right" href="{{ route('task.index') }}"> Back</a>
                    </div>
                    <form method="POST" action="{{route('task.store')}}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Task Name:</label>
                                        <input name="name" type="text" class="form-control" placeholder="Enter Task name" id="name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="desc"> Description:</label>
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
