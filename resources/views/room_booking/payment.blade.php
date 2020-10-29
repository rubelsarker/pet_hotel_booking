@extends('layouts.app')
@section('content')
    <div class="section banner bg-color-primary container container-palette">
        <div class="container banner-container">
            <div class="banner-body text-center">
                <h2 class="title">Make Payment</h2><!-- ./ banner body -->
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
                    <form method="POST" action="{{route('make.payment')}}">
                        @csrf
                        <h3>Make Payment </h3>
                        <hr>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="card_number">Card Number </label>
                                        <input type="text" placeholder="Card Number" name="card_number" id="card_number" class="form-control" required >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="card_number">Card Type</label>
                                       <select name="card_type" class="form-control" id="card_type" required>
                                           <option value="Credit">Credit</option>
                                           <option value="Debit">Debit</option>
                                           <option value="Atm">Atm</option>
                                       </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="payment_date">Payment Date</label>
                                        <input type="date" placeholder="Payment Date" name="payment_date" id="payment_date" class="form-control"
                                        required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="number" placeholder="Amount" name="amount" id="amount" class="form-control" required>
                                    </div>
                                </div>
                                @foreach($data as $key =>$d)
                                 <input type="hidden" name="booking_data[{{$key}}]" value="{{$d}}">
                                @endforeach
                                <div class="col-md-2 offset-md-10 text-right">
                                   <button type="submit" class="btn btn-primary">Make Payment</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

