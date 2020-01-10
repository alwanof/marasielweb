
<!doctype html>
<html lang="{{ str_replace('_', '-', session('locale')) }}" dir="{{(session('locale')=='ar')?'rtl':'ltr'}}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="PROMPT RESPONSE INSTANT DELIVERY">
    <meta name="author" content="Murad Alwan">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if(session('locale')=='ar')
        <link rel="stylesheet" href="{{ asset('front/css/bootstrap-rtl.min.css') }}" >

    @else
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    @endif
<!-- font-awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Tajawal:300,400,500,700,800,900&display=swap&subset=arabic" rel="stylesheet">

    <!-- Flag-icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.css" />
    <!-- main style -->
    <link rel="stylesheet" href="{{asset('front/css/style.css')}}" />

    <script src="{{asset('siteconfig.js')}}" ></script>

    @yield('css')

    <title>{{__('frontmaster.title')}}  @yield('title', '')</title>
    <style>
        .navbar.transparent.navbar-inverse .navbar-inner {
            background: rgba(0,0,0,0.4);
        }
    </style>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" style="text-align: {{(session('locale')=='ar')?'right':'left'}} !important;">
<nav class="navbar navbar-light navbar-static-top py-0" >
    <a class="navbar-brand"  href="#">
        <i class="flag-icon flag-icon-{{session('flag')}}"></i>
        {{ucfirst(session('country'))}}  {{ucfirst(session('city'))}}

    </a>
    <ul class="nav">
        @foreach(Config::get('countries.language') as $key=>$lang)
            <li class="nav-item">
                <a class="nav-link {{(session('locale')==$key)?'disabled':''}}" href="{{url('/lang/'.$key)}}">{{$lang }} </a>
            </li>
        @endforeach

    </ul>
</nav>
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">

    <div class="container-fluid mx-5">
        <img class="navbar-brand js-scroll-trigger" id="logo" src="{{asset('front/img/logo.png')}}"  alt="">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto" style="text-transform: uppercase;">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('start')}}">{{__('frontmaster.menu.home')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('start')}}/#about">{{__('frontmaster.menu.about')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('start')}}/#competitiveness">{{__('frontmaster.menu.competitiveness')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('start')}}/#whyus">{{__('frontmaster.menu.whyus')}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('start')}}/#howitworks">{{__('frontmaster.menu.howitworks')}}</a>
                </li>
            </ul>
            <a id="driver" class="btn btn-primary text-light" href="{{route('drivers.index')}}">{{__('frontmaster.menu.beourdriver')}}</a>
        </div>
    </div>
</nav>


<!-- Begin page content -->
<main role="main">
    @yield('body')
</main>


<!-- Footer -->
<footer class="bg-primary small  text-white-50">
    <div class="container text-light">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <center>
                    <img src="{{asset('front/img/logo-footer.png')}}" alt="" class="img-fluid mb-3">

                    <div>
                        <a class="text-light mx-2" href="#"><i class="fab fa-youtube fa-2x"></i>
                            <a class="text-light mx-2" href="#"><i class="fab fa-twitter fa-2x"></i></a>
                            <a class="text-light mx-2" href="#"><i class="fab fa-facebook-f fa-2x"></i></a>
                            <div class="mt-2"></div>
                            <a class="text-light" href="mailto:info@marasiel.com"><i class="far fa-envelope"></i> info@marasiel.com</a>
                    </div>
                </center>



            </div>
            <div class="col-lg-3 col-md-6">
                <ul style="list-style: none;">
                    <li><a href="#" class="text-light">{{__('master.menu.home')}}</a></li>
                    <li><a href="#" class="text-light">{{__('master.menu.about')}}</a></li>
                    <li><a href="#" class="text-light">{{__('master.menu.competitiveness')}}</a></li>
                    <li><a href="#" class="text-light">{{__('master.menu.whyus')}}</a></li>
                    <li><a href="#" class="text-light">{{__('master.menu.howitworks')}}</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <ul style="list-style: none;">
                    <li><a href="#" class="text-light">{{__('master.menu.beourdriver')}}</a></li>
                    <li><a href="#" class="text-light">{{__('master.menu.terms')}}</a></li>
                    <li><a href="#" class="text-light">{{__('master.menu.privacypolicy')}}</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <a href="#"><img src="{{asset('front/img/appstore.svg')}}" alt=""></a>
                <div class="mt-3"></div>
                <a href=""><img src="{{asset('front/img/gplay.svg')}}" alt=""></a>

            </div>
            <div class="col-12 text-center mt-4">
                Copyright &copy; marasiel.com 2019
            </div>
        </div>

    </div>
</footer>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="{{asset('front/js/main.js')}}"></script>
@yield('js')
</body>
</html>
