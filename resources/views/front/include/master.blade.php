<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="{{asset('users/assets/css/bootstrap.css')}}">
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
    <link rel="stylesheet" type="text/css" href="{{asset('users/style.css')}}">
    <link rel="shortcut icon" href="{{asset('users/assets/icon/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('users/assets/icon/apple-touch-icon-158-precomposed.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700&display=swap&subset=arabic" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>

<body class="page header-fixed no-sidebar site-layout-full-width header-style-2 has-topbar topbar-style-2 menu-has-search menu-has-cart">

    <div id="wrapper" class="animsaition">
        <div id="page" class="clearfix">

            <!-- Header Wrap -->
            <div id="site-header-wrap" class="absolute">
                <!-- Top Bar -->
                <div id="top-bar">
                    <div class="wrap-themesflat-container dark">
                        <div id="top-bar-inner" class="themesflat-container">
                            <div class="top-bar-inner-wrap">
                                <div class="top-bar-content">
                                    @guest
                                        <a href="{{asset('login')}}" class="content">{{__('messages.login')}}</a>
                                        <span>|</span>
                                        <a href="{{asset('register')}}" class="content">{{__('messages.registration')}}</a>
                                    @else
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{asset('login')}}" class="content">{{__('messages.logout')}}</a>
                                        <span>|</span>
                                        <a href="{{asset('profile')}}" class="content">{{__('messages.profile')}}</a>
                                    @endif
                                </div>

                                <div class="switch-button">
                                    <a>العربية</a>
                                    <input onclick="sendIt(this)" type="checkbox" value="1" name="yousendit" @if(request()->segment(1)!='en') checked @endif />
                                    <a>English</a>
                                </div>

                                <div class="top-bar-content-right">
                                    <div class="top-bar-socials">
                                        <div class="inner">
                                            <span class="choose-service"><a href="{{asset('join_illff')}}">{{__('messages.slogan')}}</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /#top-bar -->

                <!-- Header -->
                <header id="site-header">
                    <div class="wrap-themesflat-container">
                        <div id="site-header-inner" class="themesflat-container">

                            <div class="wrap-inner mywrapInner">

                                <div class="mobile-button"><span></span>

                                </div> <!-- //mobile menu button -->

                                <nav id="main-nav" class="main-nav" style="width: 95%">
                                    <ul id="menu-primary-menu" class="menu">

                                        <li class="menu-item current-menu-item">
                                            <a href="{{asset('/')}}">{{__('messages.home')}}</a>
                                        </li>

                                        @foreach($headercats as $cat)
                                            <?php $subcategories = DB::table('categories')->where('parent',$cat->id)->get(); ?>
                                            <li class="megamenu col-4 menu-item menu-item-has-children" style="z-index: 1">
                                                <a href="{{asset('products/'.$cat->encategory.'?CAT='.$cat->id)}}">
                                                    @if(request()->segment(1)!='en') {{$cat->arcategory}} @else {{$cat->encategory}} @endif</a></li>
                                                </a>
                                                <ul class="sub-menu">
                                                    <div style="display: flex; justify-content: space-around">
                                                        @if($subcategories->count() != 0)
                                                            @foreach($subcategories as $subcat)
                                                                <div>
                                                                    <li class="menu-item"><a href="{{asset('products/'.$subcat->encategory.'?CAT='.$subcat->parent.'&SCAT='.$subcat->id)}}">
                                                                        @if(request()->segment(1)!='en') {{$subcat->arcategory}} @else {{$subcat->encategory}} @endif</a></li>
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <div>
                                                                <li class="menu-item">{{__('messages.no_sub_categories')}}</li>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </ul>
                                            </li>
                                        @endforeach

                                    </ul>

                                </nav><!-- /#main-nav -->

                                <aside>
                                    <a href="{{asset('cart')}}">
                                        <i class="finance-icon-shopping-cart"></i>
                                        <p id="cart_text">@if(session('shopping_cart')) {{session('shopping_cart')['cartcount']}} @else 0 @endif</p>
                                    </a>
                                    <a href="{{asset('profile')}}/?page=wishlist">
                                        <i class="fa icon-fav_fill"></i>
                                        <p id="wishlistcount">{{$wishlistcount}}</p>
                                    </a>
                                </aside>

                                <img class="menulogo" src="{{asset('users/assets/img/logo-footer-01.png')}}">

                            </div>


                        </div><!-- /#site-header-inner -->

                    </div><!-- /.wrap-themesflat-container -->


                    <!-- Search Filter -->
                    <div class="search-filter">
                        <div class="wrap-themesflat-container search-bar" style="padding: 15px 0;background-color: #f9f9f9">
                            <div class="themesflat-container">
                                <div class="themesflat-container">

                                    <nav id="main-nav" class="search-menu">
                                        <ul id="menu-primary-menu" class="menu" style="display: flex;justify-content: space-between;align-items: center;width: 100%">


                                            <li class="menu-item menu-item-has-children category">
                                                <p class="custom-p">{{__('messages.browse_categories')}}</p>

                                                <ul class="sub-menu customSubmenu">
                                                    @foreach($headercats as $cat)
                                                    <?php $subcategories = DB::table('categories')->where('parent',$cat->id)->get(); ?>
                                                        <li class="menu-item menu-item-has-children" style="left: 0;">
                                                        <a href="{{asset('products/'.$cat->encategory.'?CAT='.$cat->id)}}">
                                                            @if(request()->segment(1)!='en') {{$cat->arcategory}} @else {{$cat->encategory}} @endif</a></li>
                                                        </a>
                                                            <ul class="sub-menu submenu" style="top: -47px">
                                                                <div class="category-flex">
                                                                    @if($subcategories->count() != 0)
                                                                        @foreach($subcategories as $subcat)
                                                                            <?php $subsubcategories = DB::table('categories')->where('parent',$subcat->id)->get(); ?>
                                                                            <div>
                                                                                <a href="{{asset('products/'.$subcat->encategory.'?CAT='.$subcat->parent.'&SCAT='.$subcat->id)}}"><p>{{$subcat->arcategory}}</p></a>
                                                                                @if($subsubcategories->count() != 0)
                                                                                    @foreach($subsubcategories as $subsubcat)
                                                                                        <div>
                                                                                            <a href="{{asset('products/'.$subsubcat->encategory.'?CAT='.$subcat->parent.'&SCAT='.$subsubcat->parent.'&SSCAT='.$subsubcat->id)}}">
                                                                                                @if(request()->segment(1)!='en') {{$subsubcat->arcategory}} @else {{$subsubcat->encategory}} @endif</a></li>
                                                                                            </a>
                                                                                        </div>
                                                                                    @endforeach
                                                                                @else
                                                                                    <a>{{__('messages.no_sub_categories')}} </a>
                                                                                @endif
                                                                            </div>
                                                                        @endforeach
                                                                    @else
                                                                        <a>
                                                                            {{__('messages.no_categories')}}
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>

                                            <div class="md-form">
                                                <input style="height: 100%;margin: 0;" type="search" id="form-autocomplete" onkeyup="@if(request()->segment(2)=='products') search(this, 'products') @else search(this, 'search') @endif" class="form-control mdb-autocomplete" placeholder="{{__('messages.search_yours')}} ......">
                                            </div>
                                            <img class="mainlogo" src="{{asset('users/assets/img/logo-footer-01.png')}}">
                                        </ul>
                                    </nav><!-- /#main-nav -->

                                </div><!-- /#site-header-inner -->

                            </div><!-- /.wrap-themesflat-container -->
                        </div>
                        <!-- search-filter -->

                        <!-- Header -->

                    </div><!-- #site-header-wrap -->
                </header>
                <!-- /Header -->

                @yield('content')

                <!-- Footer -->
                <footer id="footer">
                    <div id="footer-widgets" class="themesflat-container title-style-1">
                        <div class="themesflat-row gutter-30">
                            <div class="span_1_of_5 col">
                                <div class="widget widget_tag_cloud margin-top-6 padding-left-9">
                                    <h2 class="widget-title margin-bottom-43"><span>{{__('messages.sharewithus')}}</span></h2>
                                    <div class="tagcloud social-tag">
                                        <div>
                                            <a><i class="icon finance-icon-Facebook"></i></a>
                                            <a><i class="icon finance-icon-Twitter"></i></a>
                                            <a><i class="icon finance-icon-instagram"></i></a>
                                            <a><i class="flat-icon-youtube"></i></a>
                                        </div>
                                    </div>
                                </div><!-- /.widget_tag_cloud -->
                            </div><!-- /.span_1_of_5 -->

                            <div class="span_1_of_5 col">
                                <div class="widget widget_tag_cloud margin-top-6 padding-left-9">
                                    <h2 class="widget-title margin-bottom-43"><span>{{__('messages.paymethods')}}</span></h2>
                                    <div class="tagcloud social-tag">
                                        <div>
                                            <img src="{{asset('users/assets/img/payment/pay1.png')}}">
                                            <img src="{{asset('users/assets/img/payment/pay2.png')}}">
                                            <img src="{{asset('users/assets/img/payment/pay3.png')}}">
                                        </div>

                                    </div>
                                </div><!-- /.widget_tag_cloud -->
                            </div><!-- /.span_1_of_5 -->

                            <div class="span_1_of_5 col">
                                <div class="widget widget_tag_cloud margin-top-6 padding-left-9">
                                    <h2 class="widget-title margin-bottom-43"><span>{{__('messages.slogan')}}</span></h2>
                                    <div class="item sendus">
                                        <a href="{{asset('join_illff')}}">{{__('messages.registernow')}}</a>
                                    </div>
                                </div><!-- /.widget_tag_cloud -->
                            </div><!-- /.span_1_of_5 -->

                            <div class="span_1_of_5 col">
                                <div class="widget widget_tag_cloud margin-top-6 padding-left-9">
                                    <h2 class="widget-title margin-bottom-43"><span>{{__('messages.callcenter')}}</span></h2>
                                    <div class="tagcloud social-tag">
                                        <div class="callflex">
                                            <a href="{{asset('support')}}"> <span>{{__('messages.support')}}</span></a>
                                        </div>


                                        <div class="callflex">
                                            <a href="{{asset('return')}}"><span>{{__('messages.returnpolicy')}}</span></a>
                                        </div>
                                        <div class="callflex">
                                            <a href="{{asset('epolicy')}}"><span>{{__('messages.epolicy')}}</span></a>
                                        </div>
                                        <div class="callflex">
                                            <a href="{{asset('charge')}}"><span>{{__('messages.chargepolicy')}}</span></a>
                                        </div>



                                    </div>
                                </div><!-- /.widget_tag_cloud -->
                            </div><!-- /.span_1_of_5 -->

                            <div class="span_1_of_5 col">
                                <div class="widget widget_flickr margin-top-6 padding-left-6">
                                    <h2 class="widget-title"><span>{{__('messages.sitename')}}</span></h2>
                                    <div class="item sendus">
                                        <a href="{{asset('aboutus')}}">{{__('messages.aboutsite')}}</a>
                                    </div>
                                    <div class="item sendus">
                                        <a href="{{asset('policy')}}">{{__('messages.terms')}}</a>
                                    </div>
                                    <div class="item sendus">
                                        <a href="{{asset('privacy')}}">{{__('messages.privacy')}}</a>
                                    </div>
                                    <div class="item sendus">
                                        <a href="{{asset('faq')}}">{{__('messages.faq')}}</a>
                                    </div>
                                </div><!-- /.instagram-wrap -->
                            </div><!-- /.widget_instagram -->
                        </div><!-- /.span_1_of_5 -->
                    </div><!-- /.themesflat-row -->
                    <!-- Bottom -->
                    <div id="bottom" class="clearfix style-1">
                        <div id="bottom-bar-inner" class="themesflat-container">
                            <div class="bottom-bar-inner-wrap">
                                <div class="bottom-bar-content">
                                    <div id="copyright" class="text-center">
                                        {{__('messages.copyrights')}}
                                    </div><!-- /#copyright -->
                                </div><!-- /.bottom-bar-content -->
                            </div>
                        </div>
                    </div>
                    <!-- End #bottom -->
                </footer>
                <!--End #footer -->

            </div>
            <!--End #page -->
        </div>
    </div>

    <div class="mychat">
        <div id="chat-circle" class=" btn-raised">
            <svg class="icon-speech" viewBox="0 0 48 48">
                <use xlink:href='#icon-speech'>
                </use>
            </svg>
        </div>

        <div class="chatbot chatbot--closed ">
            <div class="chatbot__header">
                <p><strong>Got a question?</strong> <span class="u-text-highlight">Ask Harry</span></p>
                <svg class="chatbot__close-button icon-speech" viewBox="0 0 32 32">
                    <use xlink:href="#icon-speech"></use>
                </svg>
                <svg class="chatbot__close-button icon-close" viewBox="0 0 32 32">
                    <use xlink:href="#icon-close"></use>
                </svg>
            </div>
            <div class="chatbot__message-window">
                <ul class="chatbot__messages">
                    <li class="is-ai animation">
                        <div class="is-ai__profile-picture">
                            <svg class="icon-avatar" viewBox="0 0 32 32">
                                <use xlink:href="#avatar"></use>
                            </svg>
                        </div>
                        <span class="chatbot__arrow chatbot__arrow--left"></span>
                        <p class="chatbot__message"><strong class="intro">مرحبًا ، ادارة الف ترحب بزيارتك موقعنا ، أنا هنا للمساعدة في استفساراتك العامة.
                            </strong>Example of questions you can ask for demo purpose: <br><em>Hi / How are you? / I'd like some financial advice / Can you email me a statement? / Can I get a form? / How do I cancel my life insurance? </em></p>
                    </li>

                </ul>
            </div>
            <div class="chatbot__entry chatbot--closed">

                <input type="text" class="chatbot__input" placeholder="Write a message...">
                <svg class="chatbot__submit" viewBox="0 0 32 32">
                    <use xlink:href="#icon-send"></use>
                </svg>
            </div>
        </div>

        <svg style="display: none">

            <symbol id="icon-close" viewBox="0 0 32 32">
                <title>Close</title>
                <path d="M2.624 8.297l2.963-2.963 23.704 23.704-2.963 2.963-23.704-23.704z"></path>
                <path d="M2.624 29.037l23.704-23.704 2.963 2.963-23.704 23.704-2.963-2.963z"></path>
            </symbol>

            <symbol id="icon-speech" viewBox="0 0 60 60">
                <title>Speech</title>

                <path style="fill: #ffffff; fill-rule: evenodd;" d="M19.82,27.46A2.16,2.16,0,0,1,22,25.32a2.13,2.13,0,0,1,2.16,2.11s0,0,0,.06A2.13,2.13,0,0,1,22,29.62h0a2.15,2.15,0,0,1-2.17-2.14s0,0,0,0h0Zm15.23,0a2.14,2.14,0,0,1,2.12-2.16h0a2.15,2.15,0,0,1,0,4.3h0A2.14,2.14,0,0,1,35,27.48Zm-5.44,2.14a2.14,2.14,0,0,1-2.17-2.12s0,0,0,0a2.15,2.15,0,0,1,2.16-2.14h0a2.15,2.15,0,0,1,0,4.3h0ZM29.31,47.2c0.18-.15.26-0.2,0.32-0.27A43.24,43.24,0,0,1,38,40.24a15.44,15.44,0,1,0-23.84-14,15.09,15.09,0,0,0,7.29,14.15,36.37,36.37,0,0,1,5.67,4.45c0.76,0.74,1.46,1.54,2.19,2.31h0Z" transform="translate(0 0)"/>
                <path style="fill: #ffffff; fill-rule: evenodd;" d="M51.24,19.78C49,10.88,40.39,2.09,28.58,2.63A21.45,21.45,0,0,0,13.91,9.3a24,24,0,0,0-6,10.47,2.09,2.09,0,0,1,1.56,2.38c0,5.15,0,10.31,0,15.46a4.47,4.47,0,0,0,.76,2.59A23,23,0,0,0,24.8,50.73a0.87,0.87,0,0,0,1-.32,4.71,4.71,0,0,1,6.51,0,2.34,2.34,0,0,1,.09,3.17c-1.85,2.22-6.21,1.71-7.17-.75a0.91,0.91,0,0,0-.61-0.37A24,24,0,0,1,16,48.7a25.41,25.41,0,0,1-7.64-8.29,0.89,0.89,0,0,0-.91-0.53,10,10,0,0,1-2.17-.1,4.31,4.31,0,0,1-3.52-4.31,0.7,0.7,0,0,0-.51-0.82A1.73,1.73,0,0,1,0,32.93q0-3.08,0-6.16A1.82,1.82,0,0,1,1.34,25a0.45,0.45,0,0,0,.36-0.51A4.41,4.41,0,0,1,4.82,20a1,1,0,0,0,.43-0.63,26.73,26.73,0,0,1,6-11.06A23.71,23.71,0,0,1,26.39.2C36.34-.95,44.15,2.91,50,10.92a24.78,24.78,0,0,1,3.9,8.37,1,1,0,0,0,.72.8,4.29,4.29,0,0,1,2.84,4.09A0.72,0.72,0,0,0,58,25a1.68,1.68,0,0,1,1.17,1.68q0,3.11,0,6.22a1.78,1.78,0,0,1-1.25,1.75,0.57,0.57,0,0,0-.46.63,4.37,4.37,0,0,1-4.63,4.58H51.65A1.79,1.79,0,0,1,49.75,38c0-2.65,0-5.3,0-8s0-5.3,0-8a2,2,0,0,1,1.52-2.32h0Z" transform="translate(0 0)"/>
            </symbol>

            <symbol id="icon-send" viewBox="0 0 23.97 21.9">
                <title>Send</title>
                <path d="M0.31,9.43a0.5,0.5,0,0,0,0,.93l8.3,3.23L23.15,0Z"></path>
                <path d="M9,14.6H9V21.4a0.5,0.5,0,0,0,.93.25L13.22,16l6,3.32A0.5,0.5,0,0,0,20,19l4-18.4Z"></path>
            </symbol>

            <symbol id="avatar" width="44.25" height="44" viewBox="0 0 44.25 44">
                <title>Avatar</title>
                <svg viewBox="0 0 600 600">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #f14635;
                            }

                            .cls-2 {
                                fill: #fff;
                            }
                        </style>
                    </defs>
                    <title>logopath2</title>
                    <rect class="cls-1" width="432.55" height="432.55" rx="122.59" ry="122.59" />
                    <path class="cls-2" d="M4.34,304.34c37.55,6.58,75.36,9.41,113.45,6.92,26-1.7,51.81-4.08,76.73-12.42a76,76,0,0,1,16-3.65c22.26-2.34,43-8.6,61.4-21.82,11.83-8.48,21.72-18.35,26.14-32.47,5.57-17.79,10.64-35.73,15.8-53.65,5.24-18.22,10.46-36.45,15.42-54.75,1.95-7.19,4-14.51,4.51-21.88s-5.48-10.6-11.63-6.41c-3.63,2.48-7.35,5.58-9.54,9.28-5.23,8.84-11.13,17.75-14,27.45-7.85,26.82-14,54.13-21.43,81.09a76.83,76.83,0,0,1-9.41,21.75c-6.39,9.7-16.53,14.63-27.35,17.38,1-6.53,2.39-12.53,2.86-18.61,1.47-18.94-11.13-35.16-33.92-29.47-18.26,4.56-31.09,16-41.58,30.82-5.57,7.87-9.26,16.19-6.39,26.18,0.92,3.19-.28,5.07-3.95,5.15-6.83.15-13.65,0.58-20.48,0.75a508.07,508.07,0,0,1-132.78-14c-2.83-.69-4.18-1.86-4.62-4.1h0q0.13,24.07.23,48.13C0.44,304.29,1.78,303.89,4.34,304.34Zm182.44-50.91c5.12-10.53,19.89-13.51,28.49-5.75,6.22,5.61,5.14,13.11-2.63,16.19-3.64,1.44-7.67,1.88-11.7,2.82-3.6-1-7.24-1.56-10.54-2.94C185.9,261.87,184.69,257.74,186.78,253.43ZM1.63,135A8.42,8.42,0,0,0,0,138.22c0.11-5.83.2-11.66,0.37-17.49C1.08,96.61,3.93,96.22,3.93,96.22c2.87-2,4.93-3.25,6.86-4.72C50,61.58,95.14,54.17,142.73,57.62c13.61,1,27.13,4.87,40.38,8.54,5.7,1.58,10.72,5.83,15.82,9.21a15.36,15.36,0,0,1,4.47,5.3c2.05,3.66,4,7.71,1.32,11.74-2.59,3.86-7,3.83-10.91,3.1-11.79-2.17-23.54-4.59-35.25-7.13C121.23,80.29,84.71,81.31,49.63,98A148.09,148.09,0,0,0,1.63,135Zm175.81,18.54c3.8,5.93,2.22,11.39-1.19,16.77-0.27.42-.5,0.87-0.8,1.26-5,6.58-10.74,12.72-19.81,10.69s-14.48-8.89-17.7-17.42a7.75,7.75,0,0,1-.37-2c-1-9.71,11.65-23.38,22.78-23.2C167.67,140.94,173,146.58,177.44,153.49ZM334.59,317.54A76.27,76.27,0,0,1,323,329.75c-3.33,2.88-7.59,3.72-11.49.65s-3.35-7.25-1.83-11.38a21.4,21.4,0,0,1,1.64-3.64c11.44-19,16.81-40,21.39-61.48q8.33-39.07,18.54-77.72c3.74-14.18,9.48-27.78,20-38.65,1-1.07,2-2.77,3.26-3,3.09-.52,6.63-1.23,9.35-0.19,2,0.75,2.9,4.19,4.08,6.08-2.13,9.28-3.86,17.59-6,25.81q-13.89,54.43-28,108.81C350,290.32,344,304.78,334.59,317.54Zm-6.37,36c-0.2,1.86-3,4.59-5,4.91-10,1.6-15.13,7.47-15.72,17.12-0.64,10.46-13.36,18-22.55,16.53a97.32,97.32,0,0,1-9.7-2.29c-3.4-.89-5-3.1-4.47-6.67s1.76-7.76,6-7.34c10.45,1,13.18-4.66,14.92-13.51,2-10.33,13.17-18.25,23.7-18.94,3.3,1,7,1.35,9.75,3.2A8.8,8.8,0,0,1,328.23,353.56Z" transform="translate(0.61)" />
                </svg>
            </symbol>
        </svg>


        <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/fetch/0.10.1/fetch.min.js"></script>
        <script id="rendered-js">
            const accessToken = "2d1ddeaadc20462dba88c9beebbe0a21";
            const baseUrl = "https://api.api.ai/api/query?v=20150910";
            const sessionId = "1";
            const loader = `<span class='loader'><span class='loader__dot'></span><span class='loader__dot'></span><span class='loader__dot'></span></span>`;
            const errorMessage = "My apologies, I'm not available at the moment. =^.^=";
            const urlPattern = /(\b(https?|ftp):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/gim;
            const loadingDelay = 700;
            const aiReplyDelay = 1800;

            const $document = document;
            const $chatbot = $document.querySelector(".chatbot");
            const $chatbotMessageWindow = $document.querySelector(
                ".chatbot__message-window");

            const $chatbotHeader = $document.querySelector(".chatbot__header");
            const $chatbotMessages = $document.querySelector(".chatbot__messages");
            const $chatbotInput = $document.querySelector(".chatbot__input");
            const $chatbotSubmit = $document.querySelector(".chatbot__submit");

            document.addEventListener(
                "keypress",
                event => {
                    if (event.which == 13) {
                        validateMessage();
                    }
                },
                false);


            $chatbotHeader.addEventListener(
                "click",
                () => {
                    // toggle($chatbot, "chatbot--closed");
                    // $chatbotInput.focus();
                    var element = document.getElementsByClassName("chatbot");
                    element[0].style.display = "none";
                    document.getElementById("chat-circle").style.display = "block";
                },
                false);


            $chatbotSubmit.addEventListener(
                "click",
                () => {
                    validateMessage();
                },
                false);

            document.getElementById("chat-circle").addEventListener(
                "click",
                () => {
                    var element = document.getElementsByClassName("chatbot");
                    element[0].classList.remove("chatbot--closed");
                    element[0].style.display = "block";
                    $chatbotInput.focus();
                    console.log(this);
                    document.getElementById("chat-circle").style.display = "none";

                });

            const toggle = (element, klass) => {
                const classes = element.className.match(/\S+/g) || [],
                    index = classes.indexOf(klass);
                index >= 0 ? classes.splice(index, 1) : classes.push(klass);
                element.className = classes.join(" ");
            };

            const userMessage = content => {
                $chatbotMessages.innerHTML += `<li class='is-user animation'>
                <p class='chatbot__message'>
                ${content}
                </p><span class='chatbot__arrow chatbot__arrow--right'></span></li>`;
            };

            const aiMessage = (content, isLoading = false, delay = 0) => {
                setTimeout(() => {
                    removeLoader();
                    $chatbotMessages.innerHTML += `<li
            class='is-ai animation'
            id='${isLoading ? "is-loading" : ""}'>
                <div class="is-ai__profile-picture">
                <svg class="icon-avatar" viewBox="0 0 32 32">
                    <use xlink:href="#avatar" />
                </svg>
                </div>
                <span class='chatbot__arrow chatbot__arrow--left'></span>
                <div class='chatbot__message'>
                ${content}
                </div>
            </li>`;
                    scrollDown();
                }, delay);
            };

            const removeLoader = () => {
                let loadingElem = document.getElementById("is-loading");
                if (loadingElem) {
                    $chatbotMessages.removeChild(loadingElem);
                }
            };

            const escapeScript = unsafe => {
                const safeString = unsafe.
                replace(/</g, " ").
                replace(/>/g, " ").
                replace(/&/g, " ").
                replace(/"/g, " ").
                replace(/\\/, " ").
                replace(/\s+/g, " ");
                return safeString.trim();
            };

            const linkify = inputText => {
                return inputText.replace(urlPattern, `<a href='$1' target='_blank'>$1</a>`);
            };

            const validateMessage = () => {
                const text = $chatbotInput.value;
                const safeText = text ? escapeScript(text) : "";
                if (safeText.length && safeText !== " ") {
                    resetInputField();
                    userMessage(safeText);
                    send(safeText);
                }
                scrollDown();
                return;
            };

            const multiChoiceAnswer = text => {

                userMessage(text);
                send(text);
                scrollDown();
                return;
            };

            const processResponse = val => {
                removeLoader();

                if (val.fulfillment) {
                    let output = "";
                    let messagesLength = val.fulfillment.messages.length;

                    for (let i = 0; i < messagesLength; i++) {
                        if (window.CP.shouldStopExecution(0)) break;
                        let message = val.fulfillment.messages[i];
                        let type = message.type;

                        switch (type) {
                            // 0 fulfillment is text
                            case 0:
                                let parsedText = linkify(message.speech);
                                output += `<p>${parsedText}</p>`;
                                break;

                                // 1 fulfillment is card
                            case 1:
                                // let imageUrl = message.imageUrl
                                // let imageTitle = message.title
                                // let imageSubtitle = message.subtitle
                                // output += `<img src='${imageUrl}' alt='${imageTitle}${imageSubtitle}' />`
                                break;

                                // 2 fulfillment is button list
                            case 2:
                                let title = message.title;
                                let replies = message.replies;
                                let repliesLength = replies.length;
                                output += `<p>${title}</p>`;

                                for (let i = 0; i < repliesLength; i++) {
                                    if (window.CP.shouldStopExecution(1)) break;
                                    let reply = replies[i];
                                    let encodedText = reply.replace(/'/g, "zzz");
                                    output += `<button onclick='multiChoiceAnswer("${encodedText}")'>${reply}</button>`;
                                }
                                window.CP.exitedLoop(1);

                                break;

                                // 3 fulfillment is image
                            case 3:
                                // console.log('Fulfillment is image - TODO')
                                break;
                        }

                    }
                    window.CP.exitedLoop(0);

                    return output;
                } else {
                    return val;
                }
            };

            const setResponse = (val, delay = 0) => {
                setTimeout(() => {
                    aiMessage(processResponse(val));
                }, delay);
            };

            const resetInputField = () => {
                $chatbotInput.value = "";
            };

            const scrollDown = () => {
                const distanceToScroll =
                    $chatbotMessageWindow.scrollHeight - (
                        $chatbotMessages.lastChild.offsetHeight + 60);
                $chatbotMessageWindow.scrollTop = distanceToScroll;
                return false;
            };


            //        ${baseUrl}&query=${text}&lang=en&sessionId=${sessionId}

            const send = (text = "") => {
                fetch(`${baseUrl}&query=${text}&lang=en&sessionId=${sessionId}`, {
                    method: "GET",
                    dataType: "json",
                    headers: {
                        Authorization: "Bearer " + accessToken,
                        "Content-Type": "application/json; charset=utf-8"
                    }
                }).


                then(response => response.json()).
                then(res => {
                    if (res.status < 200 || res.status >= 300) {
                        let error = new Error(res.statusText);
                        throw error;
                    }
                    return res;
                }).
                then(res => {
                    setResponse(res.result, loadingDelay + aiReplyDelay);
                }).
                catch(error => {
                    setResponse(errorMessage, loadingDelay + aiReplyDelay);
                    resetInputField();
                    console.log(error);
                });

                aiMessage(loader, true, loadingDelay);
            };
            //# sourceURL=pen.js
        </script>

    </div>

    <a id="scroll-top"></a>
    <!-- Javascript -->
    <script src="{{asset('users/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('users/assets/js/plugins.js')}}"></script>
    <script src="{{asset('users/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('users/assets/js/animsition.js')}}"></script>
    <script src="{{asset('users/assets/js/countto.js')}}"></script>
    <script src="{{asset('users/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('users/assets/js/magnific.popup.min.js')}}"></script>
    <script src="{{asset('users/assets/js/equalize.min.js')}}"></script>
    <script src="{{asset('users/assets/js/typed.js')}}"></script>
    <script src="{{asset('users/assets/js/vegas.js')}}"></script>
    <script src="{{asset('users/assets/js/shortcodes.js')}}"></script>
    <script src="{{asset('users/assets/js/main.js')}}"></script>

    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ2z7aoo8okwvyHbaxfKwUi-sblBj5QYk"></script>
    <script src="{{asset('users/assets/js/gmap3.min.js')}}"></script>

    <!-- Revolution Slider -->
    <script src="{{asset('users/includes/rev-slider/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{asset('users/includes/rev-slider/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{asset('users/assets/js/rev-slider.js')}}"></script>
    <script src="{{asset('users/includes/rev-slider/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{asset('users/includes/rev-slider/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{asset('users/includes/rev-slider/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{asset('users/includes/rev-slider/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{asset('users/includes/rev-slider/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{asset('users/includes/rev-slider/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{asset('users/includes/rev-slider/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{asset('users/includes/rev-slider/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{asset('users/includes/rev-slider/js/extensions/revolution.extension.video.min.js')}}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function ()
        {
            $('#makelike').click(function () {
                var ad_id = $('#itemID').val();
                $.ajax({
                    type: "post",
                    url: '{{asset("makelike")}}',
                    data: {
                        ad_id: ad_id
                    },
                    success: function (data) {
                        $('#likecounts').html('<i class="fas fa-thumbs-up"></i>' + data + ' لايك');
                        $('#likeoption').html('<button id="cancellike" style="margin-top:0;background:none;border:none;cursor:pointer;"><i  style="color:crimson" class="fas fa-heart"></i></button>');
                    }
                });
            });


            $('#cancellike').click(function () {
                var ad_id = $('#itemID').val();
                $.ajax({
                    type: "post",
                    url: '{{asset("cancellike")}}',
                    data: {
                        ad_id: ad_id
                    },
                    success: function (data) {
                        $('#likecounts').html('<i class="fas fa-thumbs-up"></i>' + data + ' لايك');
                        $('#likeoption').html('<button id="makelike" style="margin-top:0;background:none;border:none;cursor:pointer;"><i  style="color:#555" class="fas fa-heart"></i></button>');
                    }
                });
            });
        });
    </script>

    <!-- ajax scripts  -->
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#country').change(function() {
            var countval = $('#country').val();

            $.ajax({
            type: "post" ,
            url : '{{asset("filtercities")}}' ,
            data : {
                count_id: countval
            },
            success : function(data)
            {
            $('#city').html('<option value="0" selected disabled>اختر المدينة</option>');
                if(data.length!=0)
                {
                $('#city').html('<option value="0" disabled selected> اختر المدينة</option>');
                for (var i = 0; i < data.length; i++)
                {
                    var option = '<option value="'+data[i].id+'">'+data[i].name+'</option>' ;
                    $('#city').append(option);
                }
                }
                else {
                    $('#city').html('<option value="0" selected disabled="">اختر المدينة</option>');
                }

            },
            });
        });

        $('#city').change(function() {
            var countval = $('#city').val();

            $.ajax({
            type: "post" ,
            url : '{{asset("filtercities")}}' ,
            data : {
                count_id: countval
            },
            success : function(data)
            {
            $('#area').html('<option value="0" selected disabled>اختر المنطقة</option>');
                if(data.length!=0)
                {
                    $('#area').html('<option value="0" disabled selected> اختر المنطقة</option>');
                    for (var i = 0; i < data.length; i++)
                    {
                        var option = '<option value="'+data[i].id+'">'+data[i].name+'</option>' ;
                        $('#area').append(option);
                    }
                }
                else {
                    $('#area').html('<option value="0" selected disabled="">اختر المنطقة</option>');
                }
            },
            });
        });

        $('#countrylocation').change(function() {
            var countval = $('#countrylocation').val();

            $.ajax({
            type: "post" ,
            url : '{{asset("filtercities")}}' ,
            data : {
                count_id: countval
            },
            success : function(data)
            {
            $('#citylocation').html('<option value="0" selected disabled>اختر المدينة</option>');
                if(data.length!=0)
                {
                $('#citylocation').html('<option value="0" disabled selected> اختر المدينة</option>');
                for (var i = 0; i < data.length; i++)
                {
                    var option = '<option value="'+data[i].id+'">'+data[i].name+'</option>' ;
                    $('#citylocation').append(option);
                }
                }
                else {
                    $('#citylocation').html('<option value="0" selected disabled="">اختر المدينة</option>');
                }

            },
            });
        });

        $('#citylocation').change(function() {
            var countval = $('#citylocation').val();

            $.ajax({
            type: "post" ,
            url : '{{asset("filtercities")}}' ,
            data : {
                count_id: countval
            },
            success : function(data)
            {
            $('#arealocation').html('<option value="0" selected disabled>اختر المنطقة</option>');
                if(data.length!=0)
                {
                    $('#arealocation').html('<option value="0" disabled selected> اختر المنطقة</option>');
                    for (var i = 0; i < data.length; i++)
                    {
                        var option = '<option value="'+data[i].id+'">'+data[i].name+'</option>' ;
                        $('#arealocation').append(option);
                    }
                }
                else {
                    $('#arealocation').html('<option value="0" selected disabled="">اختر المنطقة</option>');
                }
            },
            });
        });

        $('#upcountrylocation').change(function() {
            var countval = $('#upcountrylocation').val();

            $.ajax({
            type: "post" ,
            url : '{{asset("filtercities")}}' ,
            data : {
                count_id: countval
            },
            success : function(data)
            {
            $('#upcitylocation').html('<option value="0" selected disabled>اختر المدينة</option>');
                if(data.length!=0)
                {
                $('#upcitylocation').html('<option value="0" disabled selected> اختر المدينة</option>');
                for (var i = 0; i < data.length; i++)
                {
                    var option = '<option value="'+data[i].id+'">'+data[i].name+'</option>' ;
                    $('#upcitylocation').append(option);
                }
                }
                else {
                    $('#upcitylocation').html('<option value="0" selected disabled="">اختر المدينة</option>');
                }

            },
            });
        });

        $('#upcitylocation').change(function() {
            var countval = $('#upcitylocation').val();

            $.ajax({
            type: "post" ,
            url : '{{asset("filtercities")}}' ,
            data : {
                count_id: countval
            },
            success : function(data)
            {
            $('#uparealocation').html('<option value="0" selected disabled>اختر المنطقة</option>');
                if(data.length!=0)
                {
                    $('#uparealocation').html('<option value="0" disabled selected> اختر المنطقة</option>');
                    for (var i = 0; i < data.length; i++)
                    {
                        var option = '<option value="'+data[i].id+'">'+data[i].name+'</option>' ;
                        $('#uparealocation').append(option);
                    }
                }
                else {
                    $('#uparealocation').html('<option value="0" selected disabled="">اختر المنطقة</option>');
                }
            },
            });
        });

    </script>

    <script>

        var qu = "{{request()->get('locale')}}";
        var url = "{{LaravelLocalization::getLocalizedURL(request()->get('locale'))}}";
        var locale = "{{request()->get('locale')}}";
        var new_url = url.replace("?locale="+locale, "");
        if(qu) {
            window.location = new_url;
        }

        function sendIt(el) {
            if (el.checked == true) {
                //                                                    english page
                window.location = "{{LaravelLocalization::getLocalizedURL('ar')}}/?locale=ar";
            } else {
                //                                                   arabic page
                window.location = "{{LaravelLocalization::getLocalizedURL('en')}}/?locale=en";
            }
        }
    </script>

    @yield('script')

    <script>

        const hamburgerBtn = document.getElementById('hamburgerBtn');
        hamburgerBtn.addEventListener('click', () => {
            sideMenu.classList.toggle('open');
        });

        var shippingto = $('input[name="shippingto"]:checked').val();
        $('#myselectedlocation').val(shippingto);


        function cloneRadio() {
            if ($("#addressform").hasClass('hidden')) {
                $("#addressform").removeClass('hidden');
                $(".img-address img").addClass('hidden');
            } else {
                $(".redio-new").clone().appendTo("#addressform");
            }
        }

        function slidetoggle(el) {

            $(el.parentElement.getElementsByClassName("box")).slideToggle("slow");

        }

        window.onload = function() {

            NodeList.prototype.forEach = Array.prototype.forEach;

            document.querySelectorAll('.pay-item').forEach(function(eve) {

                eve.addEventListener('click', function() {

                    document.querySelectorAll(".pro-flex").forEach(function(child) {
                        if (child) {
                            child.classList.add("hidden");
                        }


                    });

                    var myArr = eve.classList;
                    for (var i = myArr.length; i--;) {
                        if (myArr[i].indexOf("all") >= 0)
                            var myclass = eve.classList[i];
                        var mycontent = document.getElementById(myclass);
                        if (mycontent) {
                            mycontent.classList.remove("hidden");
                        }

                        break;
                    }

                    var elements = document.getElementsByClassName("pay-item");
                    for (var i = 0; i < elements.length; i++) {
                        elements[i].onclick = function() {
                            var el = elements[0];
                            while (el) {
                                if (el.tagName === "LI") {
                                    el.classList.remove("active-pay-item");
                                }
                                el = el.nextSibling;
                            }
                            this.classList.add("active-pay-item");
                        };
                    }
                })

            });


            document.querySelectorAll('.side-list-item').forEach(function(eve) {

                eve.addEventListener('click', function() {

                    document.querySelectorAll(".parent-flex").forEach(function(child) {
                        if (child) {
                            child.classList.add("hidden");
                        }
                    });

                    var myArr = eve.classList;
                    for (var i = myArr.length; i--;) {
                        if (myArr[i].indexOf("my") >= 0)
                            var myclass = eve.classList[i];
                        var mycontent = document.getElementById(myclass);
                        mycontent.classList.remove("hidden");
                        break;
                    }

                    var elements = document.getElementsByClassName("side-list-item");
                    for (var i = 0; i < elements.length; i++) {
                        elements[i].onclick = function() {
                            var el = elements[0];
                            while (el) {
                                if (el.tagName === "LI") {
                                    el.classList.remove("item-active");
                                }
                                el = el.nextSibling;
                            }
                            this.classList.add("item-active");
                        };
                    }

                    sideMenu.classList.toggle('open');

                })

            });
        }

        function search(input, url) {

            // Execute a function when the user releases a key on the keyboard
            input.addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                // Cancel the default action, if needed
                // Trigger the button element with a click
                if(url=='products') {
                    window.location="{{url()->full()}}"+"&keyword="+input.value;
                } else {
                    window.location="{{url('/search?keyword=')}}"+input.value;
                }
            }
            });
        }
    </script>
<script>
    var link = "{{request()->get('page')}}";
    if(link=='wishlist') {
        setTimeout(function() {
            $('.myfav').click();
            $('.nav-items li').removeClass('item-active');
            $('.myfav').addClass('item-active');
        }, 300);
    }
</script>

</body>
</html>
