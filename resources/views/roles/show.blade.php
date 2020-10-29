@extends('layouts.app')


@section('content')
<div class="section banner bg-color-primary container container-palette">
    <div class="container banner-container">
        <div class="banner-body text-center">
            <h2 class="title">Show Role</h2><!-- ./ banner body -->
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-4 p-4">
                <div class="card-title">
                    <a class="btn btn-primary float-right" href="{{ route('roles.index') }}"> Back</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {{ $role->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Permissions:</strong>
                                @if(!empty($rolePermissions))
                                    @foreach($rolePermissions as $v)
                                        <label class="label label-success">{{ $v->name }},</label>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection