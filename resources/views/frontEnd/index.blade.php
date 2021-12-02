@extends('frontEnd.layouts.master')
@section('title','Home Page')
@section('sliceshow1')
<div class="slider" id="slider1">
    <!-- Slides -->
    <div ><img src="{{asset('img/sliceshow12.jpg')}}" style="max-width:100%;"></div>
    <div ><img src="{{asset('img/slicehow11.jpg')}}" style="width:100%"></div>
    <div ><img src="{{asset('img/slicehow10.jpg')}}" style="width:100%"></div>
    <div ><img src="{{asset('img/slicehow11.jpg')}}" style="width:100%"></div>
    <div ><img src="{{asset('img/sliceshow12.jpg')}}" style="width:100%"></div>
    <!-- The Arrows -->
    <i class="left" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path></svg></i>
    <i class="right" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100"><path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" transform="translate(100, 100) rotate(180) "></path></svg></i>
    <!-- Title Bar -->
    <span class="titleBar">
        <h1>Máy tính chính hãng</h1>
    </span>
</div>
@endsection
@section('sliceshow')
    <section>
        <!-- Slideshow container -->
                <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                        <div class="numbertext" style="height:500px;">1 / 3</div>
                            <img src="{{asset('img/sliceshow12.jpg')}}" style="max-width:100%;";>
                        <div class="text">Caption Text</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                            <img src="{{asset('img/slicehow11.jpg')}}" style="width:100%">
                        <div class="text">Caption Two</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                            <img src="{{asset('img/slicehow10.jpg')}}" style="width:100%">
                        <div class="text">Caption Three</div>
                    </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="aplusSlides(-1)">&#10094;</a>
                <a class="next" onclick="aplusSlides(1)">&#10095;</a>
                </div>
                <br>

                <!-- The dots/circles -->
                <div style="text-align:center">
                <span class="dot" onclick="acurrentSlide(1)"></span>
                <span class="dot" onclick="acurrentSlide(2)"></span>
                <span class="dot" onclick="acurrentSlide(3)"></span>
                </div>
    </section>
@endsection

@section('content')
    <section>
        <div class="container">
           
            <div class="row">
            <div class="row">
                <div class="col-sm-3">
                    @include('frontEnd.layouts.category_menu')
                </div>

                <div class="col-sm-9 padding-right">
                    <div id="table_data">
                        
                        @include('frontEnd.pagination_data')
                    </div><!--features_items-->
                    
                </div>
            </div>
        </div>
    </section>
@endsection