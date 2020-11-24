@extends('layouts.app')
@section('styles')
    <style>
        .carousel{
            position: relative;
        }
        .search-form{
            position: absolute;
            top: 100px;
            left: 0px;
            width: 100%;
        }
        .about-title{
            font-size: 34px;
            font-weight: 700;
            color: #18ad50;
            margin: 0;
            margin-bottom: 30px;
        }
        .image{
            height: 450px;
            width: 400px;
        }


    </style>

@endsection
@section('content')
    <!--slider-->
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{url('')}}/assets/img/slider/puppy-1082141_1920.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100"  src="{{url('')}}/assets/img/slider/bulldog-1047518_1920.jpg" alt="Second slide">

            </div>
            <div class="carousel-item">
                <img class="d-block w-100"  src="{{url('')}}/assets/img/slider/puppy-3982865_1920.jpg" alt="Third slide">
            </div>
            <div class="search-form">
                <div class="widget-mapsearch container container-palette">
                    <div class="container">
                        <div class="search-overflow">
                            <form method="GET" action="{{route('search.room')}}" class="flex-row job-form">
                                <div class="form-group col-md-3">
                                    <label for="from" class="control-label text-white">Check In</label>
                                    <input value="{{isset($_GET['from']) ? $_GET['from'] : ''}}" name="from" id="from" type="date" class="form-control" placeholder="Check In" required />
                                </div>
                                <div class="form-group clo-md-3">
                                    <label for="to" class="control-label text-white">Check Out</label>
                                    <input value="{{isset($_GET['to']) ? $_GET['to'] : ''}}" name="to" id="to" type="date" class="form-control" placeholder="Check Out" required />
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="cats" class="control-label text-white">Cats</label>
                                    <input  value="{{isset($_GET['cats']) ? $_GET['cats'] : ''}}" name="cats" id="cats" type="number" class="form-control" placeholder="Cats"  />
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="dogs" class="control-label text-white">Dogs</label>
                                    <input  value="{{isset($_GET['dogs']) ? $_GET['dogs'] : ''}}" name="dogs" id="dogs" type="number" class="form-control" placeholder="Dogs"  />
                                </div>
                                <div class="form-group-btn">
                                    <button style="margin-top: 30px;" type="submit" class="btn btn-flat-search">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- ./ search with map -->
            </div>
        </div>
    </div>
    <!--end slider-->
    <!--about-->
    <main class="container container-palette pt-75 m60">
        <div class="container">
            <div class="wraper-row">
                <div class="column-content">
                    <div class="widget widget-rsm no-border no-padding">
                        <div class="rsm-box">
                            <h2 class="about-title text-center">About Pet Hotel</h2>
                            <div class="decription text-justify">
                                Etiam consectetur semper tincidunt. Praesent luctus erat elit, at vulputate ex vehicula eget. Vestibulum sit amet velit at sapien placerat maximus sed id magna. Sed pretium rhoncus lacus nec suscipit. Praesent nec gravida dui. Aenean auris sem, dapibus id tempor a, ullamcorper ut urna. Vivamus congue est quis ex rhoncus, ac imperdiet felis molestie. Nulla tincidunt turpis felis, id elementum mi posuere vel. Pellentesque tempus, eros suscipit laoreet suscip. Mauris a nunc rhoncus, cursus sapien ut, congue mi.
                            </div>
                            <div class="text-center">
                                <a href="{{route('about')}}" class=" btn btn-custom btn-custom-primary text-white">Read More</a>
                            </div>

                        </div>
                    </div> <!-- ./ widget profile -->
                </div> <!-- ./ content -->

            </div>
        </div>
    </main>
    <!--end about-->
    <main class="container container-palette " style="background-color: #edeff1">
        <div class="container ">
            <div class="wraper-row ">
                <div class="column-sidebar mt-5">
                    <div class="image">
                        <img src="{{url('')}}/assets/img/slider/puppy-1207816_1920.jpg" class="img-fluid">
                    </div>
                </div><!-- ./ sidebar -->
                <div class="column-content results-listings-ext first-nopadding m65 mt-5">
                    <div class="item-listings-ext">
                        <div class="header">
                            <div class="content">
                                <div class="caption">
                                    <h3 class="title text-center about-title">Share a Room</h3>
                                    <p class="text-justify mt-2">Lorem ipsum, or lipsum as it is sometimes known, is dummy text
                                        used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter
                                        in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum
                                        for use in a type specimen book. It usually begins with:</p>
                                    <div class="text-center">
                                        <a href="{{route('room.list')}}" class=" btn btn-custom btn-custom-primary text-white">BOOK A ROOM</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div><!-- ./ results big -->
            </div>
        </div>
    </main>
@endsection
@section('scripts')
 <script>
     $('.carousel').carousel({
         interval: 2000
     })
 </script>
@endsection