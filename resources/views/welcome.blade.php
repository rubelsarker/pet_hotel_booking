@extends('layouts.app')
@section('content')
    <div class="section section-flat-search container container-palette bg-mask">
        <div class="container">
            <div class="body">
                <div class="job-form">
                    <form method="POST" action="{{route('search.room')}}" class="flex-row">
                        @csrf
                        <div class="form-group">
                            <label for="from" class="control-label text-color-secondary">Check In</label>
                            <input name="from" id="from" type="date" class="form-control" placeholder="Check In" required />
                        </div>
                        <div class="form-group">
                            <label for="to" class="control-label text-color-secondary">Check Out</label>
                            <input name="to" id="to" type="date" class="form-control" placeholder="Check Out" required />
                        </div>
                        <div class="form-group">
                            <label for="pets" class="control-label text-color-secondary">Pets</label>
                            <input name="pets" id="pets" type="number" class="form-control" placeholder="Pets" required />
                        </div>
                        <button type="submit" class="btn btn-flat-search">Search</button>
                    </form>
                </div>
            </div> <!-- ./ top search body -->
        </div>
    </div> <!-- ./ top search -->
    <div class="section section-listings-wide container container-palette">
        <div class="container">
            <h2 class="section-title">Recent Jobs</h2><!-- ./ section title -->
            <div class="column-content">
                <div class="results-list middle m0">
                    <div class="item">
                        <div class="flex-row">
                            <div class="grid-content">
                                <h3 class="title text-color-secondary"><a href="09_Job_Open.html">Graphic Designer</a></h3>
                                <div class="options">
                                    <span class="opt">Bankable Payments</span>
                                    <span class="option opt-price"><i class="icon_currency"></i>$25 an hour</span>
                                    <span class="opt-light"><i class="icon_pin_alt"></i>Los Angeles, CA</span>
                                </div>
                            </div>
                            <div class="grid"><span class="item-label text-red"><i class="icon_ribbon_alt"></i>Full Time</span></div>
                            <div class="grid-side">
                                <a href="12_Submit_Resume.html" class="btn btn-custom btn-custom-secondary">Apply</a>
                            </div>
                        </div>
                    </div><!-- ./ job purpose -->
                    <div class="item">
                        <div class="flex-row">
                            <div class="grid-content">
                                <h3 class="title text-color-secondary"><a href="09_Job_Open.html">Analyst, Trade Marketing</a></h3>
                                <div class="options">
                                    <span class="opt">Trade in NY</span>
                                    <span class="option opt-price"><i class="icon_currency"></i>$70 an hour</span>
                                    <span class="opt-light"><i class="icon_pin_alt"></i>Torrance, CA</span>
                                </div>
                            </div>
                            <div class="grid"><span class="item-label text-yellow"><i class="icon_ribbon_alt"></i>Part Time</span></div>
                            <div class="grid-side">
                                <a href="12_Submit_Resume.html" class="btn btn-custom btn-custom-secondary">Apply</a>
                            </div>
                        </div>
                    </div><!-- ./ job purpose -->
                    <div class="item">
                        <div class="flex-row">
                            <div class="grid-content">
                                <h3 class="title text-color-secondary"><a href="09_Job_Open.html">Licensed Real Estate Sales Agent</a></h3>
                                <div class="options">
                                    <span class="opt">Douglas Eliman</span>
                                    <span class="option opt-price"><i class="icon_currency"></i>$75,900 a year</span>
                                    <span class="opt-light"><i class="icon_pin_alt"></i>Los Angeles, CA</span>
                                </div>
                            </div>
                            <div class="grid"><span class="item-label text-purple"><i class="icon_ribbon_alt"></i>Freelance</span></div>
                            <div class="grid-side">
                                <a href="12_Submit_Resume.html" class="btn btn-custom btn-custom-secondary">Apply</a>
                            </div>
                        </div>
                    </div><!-- ./ job purpose -->
                    <div class="item">
                        <div class="flex-row">
                            <div class="grid-content">
                                <h3 class="title text-color-secondary"><a href="09_Job_Open.html">Project Manager</a></h3>
                                <div class="options">
                                    <span class="opt">Netflix</span>
                                    <span class="option opt-price"><i class="icon_currency"></i>$40 an hour</span>
                                    <span class="opt-light"><i class="icon_pin_alt"></i>Arco-Plaza, CA</span>
                                </div>
                            </div>
                            <div class="grid"><span class="item-label text-red"><i class="icon_ribbon_alt"></i>Full Time</span></div>
                            <div class="grid-side">
                                <a href="12_Submit_Resume.html" class="btn btn-custom btn-custom-secondary">Apply</a>
                            </div>
                        </div>
                    </div><!-- ./ job purpose -->
                </div><!-- ./ jobs list -->
            </div>
        </div>
    </div><!-- ./ jobs listigns -->
@endsection