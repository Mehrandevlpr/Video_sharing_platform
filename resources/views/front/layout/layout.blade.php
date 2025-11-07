<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Video Post – Video Sharing HTML Template</title>
    <meta name="author" content="MH95">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Core CSS -->
    <!-- Owl Carousel Assets -->


    <!-- Main CSS -->
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">



</head>

<body>
    <!--======= header =======-->
    <header>
        <div class="container-full">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-12">
                    <a id="main-category-toggler" class="hidden-md hidden-lg hidden-md" href="#">
                        <i class="fa fa-navicon"></i>
                    </a>
                    <a id="main-category-toggler-close" class="hidden-md hidden-lg hidden-md" href="#">
                        <i class="fa fa-close"></i>
                    </a>
                    <div id="logo">
                        <a href="{{route('front.index')}}"><img src="{{asset('img/logo.png')}}" alt=""></a>
                    </div>
                </div><!-- // col-md-2 -->
                <div class="col-lg-3 col-md-3 col-sm-6 hidden-xs hidden-sm">
                    <div class="search-form">
                        <form id="search" action="#" method="get">
                            <input type="text" value="{{request()->query('q') }}" name="q" placeholder="جستجو ..." />
                            <input type="submit" />
                        </form>
                    </div>
                </div><!-- // col-md-3 -->
                <div class="col-lg-3 col-md-3 col-sm-5 hidden-xs hidden-sm">
                </div><!-- // col-md-4 -->
                <div class="col-lg-2 col-md-2 col-sm-4 hidden-xs hidden-sm">
                    <!--  -->
                </div>
                @auth
                <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs hidden-sm">
                    <div class="dropdown">
                        <a data-toggle="dropdown" href="#" class="user-area">
                            <div class="thumb"><img
                                    src="{{auth()->user()->gravatar}}" alt="">
                            </div>
                            <div class="details">
                                <h2>{{ auth()->user()->name}} </h2>
                                <h3>25 اشتراک</h3>
                            </div>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu account-menu">
                            <li><a href="#"><i class="fa fa-edit"></i>ویرایش پروفایل</a></li>
                            <li><a href="#"><i class="fa fa-video-camera"></i>اضافه کردن فیلم</a></li>
                            <li><a href="#"><i class="fa fa-star"></i>برگزیده</a></li>
                            <li><a href="{{route('logout')}}""><i class=" fa fa-sign-out"></i>خروج</a></li>
                        </ul>
                    </div>
                </div>
                @endauth

                @guest
                <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs hidden-sm">
                    <a href="{{route('login.create')}}" class="btn btn-danger">ورود</a>
                    <a href="{{route('register.create')}}" class="btn btn-danger">ثبت نام</a>
                </div>
                @endguest
            </div><!-- // row -->
        </div><!-- // container-full -->
    </header><!-- // header -->

    <x-header-menu />
    <div class="site-output">

        <div id="all-output" class="col-md-12">
            @yield('content')
        </div><!-- // row -->



    </div>
    </div>
    <script src="{{ asset('js/main.js') }}" defer></script>
</body>

</html>