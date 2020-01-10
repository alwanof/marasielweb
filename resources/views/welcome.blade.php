@extends('layouts.frontend')
@section('body')
    <header id="home" class="masthead">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 class="mx-auto my-4 text-uppercase">{{__('home.slogan')[0]}}<br>{{__('home.slogan')[1]}}</h1>
                <a href="#">
                    <img src="{{asset('front/img/appstore.png')}}" class="img-fluid m-2">
                </a>
                <a href="#">
                    <img src="{{asset('front/img/play.png')}}" class="img-fluid m-2">
                </a>


            </div>
        </div>
    </header>
    <div id="about"></div>
    <section style="text-align: {{(session('locale')=='ar')?'right':'left'}} !important;">
        <div  class="container mt-5 p-4 border border-primary">
            <div class="h3 text-secondary d-inline-flex p-2" style="border: 2px solid">
                {{__('home.about.title')}}
            </div>
            <div class="row p-3">

                <div class="col-md-6 slideanim">
                    <div class="h2 p-2 d-inline-flex  text-primary" >
                        {{__('home.about.section')[0]}}
                    </div>
                    <div class="lead">
                        {{__('home.about.content')[0]}}
                        <img class="img-fluid mt-3" src="{{asset('front/img/about1.jpg')}}" alt="">
                    </div>

                </div>
                <div class="col-md-6 slideanim">
                    <div class="h2 p-2 d-inline-flex  text-primary">
                        {{__('home.about.section')[1]}}
                    </div>
                    <div class="lead">
                        <img class="img-fluid mb-2" src="{{asset('front/img/about2.jpg')}}" alt=""><br>
                        {{__('home.about.content')[1]}}

                    </div>

                </div>
            </div>
        </div>
    </section>
    <div id="competitiveness"></div>
    <section style="text-align: {{(session('locale')=='ar')?'right':'left'}} !important;">
        <div class="container p-0 mt-5 bg-primary text-white">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{asset('front/img/place.png')}}" class="img-fluid slideanim">
                </div>
                <div class="col-md-9 p-5">
                    <div class="h2 text-secondary">
                        {{__('home.competitiveness.title')}}
                    </div>
                    <div class="lead">
                        {{__('home.competitiveness.content')}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="whyus"></div>
    <section   style="background-color: #f1f1f1;text-align: {{(session('locale')=='ar')?'right':'left'}} !important;">
        <div class="container p-2 mt-5">
            <div class="h2 p-2 d-inline-flex  text-primary" >
                {{__('home.whyus.title')}}
            </div>
            <div class="row mt-3 text-center">
                <div class="col-md-4 slideanim">
                    <img src="{{asset('front/img/nomore.png')}}" class="pb-2">
                    <p class="lead mb-5">
                        {{__('home.whyus.content')[0]}}
                    </p>
                </div>
                <div class="col-md-4 slideanim">
                    <img src="{{asset('front/img/getoffer.png')}}" class="pb-2">
                    <p class="lead mb-5">
                        {{__('home.whyus.content')[1]}}
                    </p>
                </div>
                <div class="col-md-4 slideanim">
                    <img src="{{asset('front/img/shoppingas.png')}}" class="pb-2">
                    <p class="lead mb-5">
                        {{__('home.whyus.content')[2]}}
                    </p>
                </div>
                <div class="col-md-4 slideanim">
                    <img src="{{asset('front/img/takeyourtaxi.png')}}" class="pb-2">
                    <p class="lead mb-5">
                        {{__('home.whyus.content')[3]}}
                    </p>
                </div>
                <div class="col-md-4 slideanim">
                    <img src="front/img/ourshopping.png" class="pb-2">
                    <p class="lead mb-5">
                        {{__('home.whyus.content')[4]}}
                    </p>
                </div>
                <div class="col-md-4 slideanim">
                    <img src="{{asset('front/img/multilang.png')}}" class="pb-2">
                    <p class="lead mb-5">
                        {{__('home.whyus.content')[5]}}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <div id="howitworks"></div>
    <section style="text-align: {{(session('locale')=='ar')?'right':'left'}} !important;">
        <div class="container p-2 mt-5">
            <div class="h2 p-2 d-inline-flex  text-primary" >
                {{__('home.howitworks.title')}}
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <img src="{{asset('front/img/screen1.jpg')}}" class="mb-2 img-fluid">
                    <h3 class="text-secondary">{{__('home.howitworks.section')[0]}}</h3>
                    <p class="lead mb-5 slideanim">
                        {{__('home.howitworks.content')[0]}}
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="{{asset('front/img/screen3.jpg')}}" class="img-fluid mb-2">
                    <h3 class="text-secondary">{{__('home.howitworks.section')[1]}}</h3>
                    <p class="lead mb-5 slideanim">
                        {{__('home.howitworks.content')[1]}}
                    </p>
                </div>
                <div class="col-md-4 ">
                    <img src="{{asset('front/img/screen2.jpg')}}" class="img-fluid mb-2">
                    <h3 class="text-secondary">{{__('home.howitworks.section')[2]}}</h3>
                    <p class="lead mb-5 slideanim">
                        {{__('home.howitworks.content')[2]}}
                    </p>
                </div>
            </div>
        </div>
    </section>
    @stop
