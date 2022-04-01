<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>إيلف | تعيين كلمة المرور</title>
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href=" {{asset('users/assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('users/assets/fontawesome/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('users/assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('users/assets/css/animsition.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('users/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('users/assets/css/themecore-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('users/assets/css/finance-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('users/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('users/assets/css/simpletextrotator.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('users/assets/css/vegas.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('users/assets/css/shortcodes.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('users/assets/css/woocommerce.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('users/assets/css/customfont.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('users/includes/rev-slider/css/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('users/includes/rev-slider/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('users/includes/rev-slider/css/navigation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('users/styleltr.css')}}">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{asset('users/assets/icon/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="assets/icon/apple-touch-icon-158-precomposed.png">
    <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700&display=swap&subset=arabic" rel="stylesheet">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>

<body class="page header-fixed no-sidebar site-layout-full-width header-style-2 has-topbar topbar-style-2 menu-has-search menu-has-cart">

    <div id="wrapper" class="animsaition">
        <div id="page" class="clearfix">
            <!-- Header Wrap -->
            <div id="site-header-wrap" class="absolute">
                <!-- Main Content -->
                <div id="main-content" class="site-main clearfix">
                    <div id="content-wrap">
                        <div id="site-content" class="site-content clearfix">
                            <div id="inner-content" class="inner-content-wrap">
                                <div class="page-content">
                                    <div class="sign-container">
                                        
                                        <div class="sign-container-d">
                                            <div class="right-box">
                                                <form method="POST" action="{{ route('password.update') }}">
                                                @csrf
                                                <input type="hidden" name="token" value="{{ $token }}">
                                                    <h6>تعيين كلمة المرور</h6>
                                                    <p>مرحبا بك فضلا قم بإدخال معلوماتك لتعيين كلمة المرور </p>

                                                    @if (session('status'))
                                                        <div style="width: 80%;" class="successnotify">
                                                            <p>{{session('status')}}</p>
                                                        </div>
                                                    @endif
                                                    
                                                    <div>
                                                        <div>
                                                            <i class="fa icon-email"></i>
                                                            <input type="email" name="email" required placeholder="البريد الإلكتروني" />
                                                            @if ($errors->has('email'))
                                                                <span class="error">{{ $errors->first('email') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div>
                                                            <i class="icon-lock"></i>
                                                            <input type="password" name="password" required placeholder="كلمة المرور" /><br>
                                                            @if ($errors->has('password'))
                                                                <span class="error">{{ $errors->first('password') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <div>
                                                            <i class="icon-lock"></i>
                                                            <input type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور" /><br>
                                                        </div>
                                                    </div>
                                                    
                                                    <button type="submit" class="btn-red">تعيين</button>
                                                </form>
                                            </div>

                                            <div class="left-box">
                                               <a href="{{asset('/')}}"><img src="{{asset('users/assets/img/logo-footer-01.png')}}"></a>
                                                <p>
                                                    Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots 
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


   
    <!-- Javascript -->
    <script src=" {{asset('users/assets/js/jquery.min.js')}}"></script>
    <script src=" {{asset('users/assets/js/plugins.js')}}"></script>
    <script src=" {{asset('users/assets/js/bootstrap.min.js')}}"></script>
    <script src=" {{asset('users/assets/js/animsition.js')}}"></script>
    <script src=" {{asset('users/assets/js/countto.js')}}"></script>
    <script src=" {{asset('users/assets/js/owl.carousel.min.js')}}"></script>
    <script src=" {{asset('users/assets/js/magnific.popup.min.js')}}"></script>
    <script src=" {{asset('users/assets/js/equalize.min.js')}}"></script>
    <script src=" {{asset('users/assets/js/typed.js')}}"></script>
    <script src=" {{asset('users/assets/js/vegas.js')}}"></script>
    <script src=" {{asset('users/assets/js/shortcodes.js')}}"></script>
    <script src=" {{asset('users/assets/js/main.js')}}"></script>


    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ2z7aoo8okwvyHbaxfKwUi-sblBj5QYk"></script>
    <script src="{{asset('users/assets/js/gmap3.min.js')}}"></script>
    <!-- Revolution Slider -->
    <script src="{{asset('users/includes/rev-slider/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src=" {{asset('users/includes/rev-slider/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src=" {{asset('users/assets/js/rev-slider.js')}}"></script>
    <!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading -->
    <script src=" {{asset('users/includes/rev-slider/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src=" {{asset('users/includes/rev-slider/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{asset('users/includes/rev-slider/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('users/includes/rev-slider/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('users/includes/rev-slider/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('users/includes/rev-slider/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('users/includes/rev-slider/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{asset('users/includes/rev-slider/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('users/includes/rev-slider/js/extensions/revolution.extension.video.min.js')}}"></script>
</body>
</html>
