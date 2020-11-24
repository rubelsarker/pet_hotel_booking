@extends('layouts.app')
@section('content')
    <div class="saercion section-page-title container container-palette">
        <div class="container">
            <h2 class="title">Contact</h2>
        </div>
    </div><!-- ./ page title -->
    <main class="container container-palette pt-75 pb-40">
        <div class="container">
            <div class="wraper-row">
                <div class="column-content">
                    <div class="widget no-padding no-border widget-contat-map">
                        <div id="property-map" class="map"></div>
                    </div><!-- ./ contact map  -->
                    <div class="widget-contat-form m55" id="form_contact">
                        <div class="validation d-none m25">
                            <div class="alert alert-primary" role="alert">
                                Validation successfully example text
                            </div>
                        </div>
                        <form action="#form_contact" class="job-form default jborder">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"><input type="text" placeholder="Name" class="form-control" /></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"><input type="text" placeholder="Enter Your Email" class="form-control" /></div>
                                </div>
                            </div>
                            <div class="form-group"><textarea name="mes" rows="4" placeholder="Message" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-custom btn-custom-secondary">Send Message</button>
                            </div>
                        </form>
                    </div><!-- ./ widget contact form  -->
                </div><!-- ./ content -->
                <div class="column-sidebar">
                    <div class="widget widget-btn">
                        <div class="widget-btn-icon"><i class="icon_mail_alt"></i></div>
                        <div class="widget-btn-text"><a href="mailto:helpme@example.com">helpme@example.com</a></div>
                    </div> <!-- ./ widget -->
                    <div class="widget widget-btn">
                        <div class="widget-btn-icon"><i class="icon_phone"></i></div>
                        <div class="widget-btn-text"><a href="tel://1-888-292-9499">1-888-292-9499</a></div>
                    </div><!-- ./ widget -->
                </div><!-- ./ sidebar  -->
            </div>
        </div>
    </main>
@endsection