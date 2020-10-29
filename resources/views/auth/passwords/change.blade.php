@extends('layouts.app')
@section('content')
    <div class="section banner bg-color-primary container container-palette">
        <div class="container banner-container">
            <div class="banner-body text-center">
                <h2 class="title">Change Password </h2><!-- ./ banner body -->
            </div>
        </div>
    </div>
   <div class="container my-4">
       <div class="row">
           <div class="col-md-8">
               <div class="card">
                   <div class="card-header">
                       <strong>Password Change</strong>
                   </div>
                   <div class="card-body">
                       @if ($errors->any())
                           <div class="alert alert-danger">
                               <ul>
                                   @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                   @endforeach
                               </ul>
                           </div>
                       @endif
                       <form method="POSt" action="{{route('manual.password.update')}}">
                           @csrf
                           @method('PUT')
                           <div class="form-group">
                               <label for="old_password">Old password</label>
                               <input name="old_password" type="password" class="form-control" id="old_password"
                                      placeholder="Old password">
                           </div>

                           <div class="form-group">
                               <label for="password">New password</label>
                               <input name="password" type="password" class="form-control" id="password"
                                      placeholder="New password">
                           </div>
                           <div class="form-group">
                               <label for="confirm_password">Confirm password</label>
                               <input name="password_confirmation" type="password" class="form-control" id="confirm_password"
                                      placeholder="Confirm password">
                           </div>

                           <button type="submit" class="btn btn-primary float-right">Submit</button>
                       </form>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection