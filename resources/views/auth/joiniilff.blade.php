<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
    <title>إيلف | إنضم إلينا</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <!-- Top Bar -->
                <div id="top-bar">
                    <div class="wrap-themesflat-container dark">
                        <div id="top-bar-inner" class="themesflat-container">
                            <div class="top-bar-inner-wrap">
                                <div class="top-bar-content">
                                    <a href="{{asset('login')}}" class="content">تسجيل الدخول</a>
                                    <span>|</span>
                                    <a href="{{asset('register')}}" class="content">انشاء حساب</a>

                                </div><!-- /.top-bar-content -->
                                <div class="switch-button">

                                    <a>العربية</a>
                                    <script>
                                        function sendIt(el) {
                                            if (el.checked == true) {
                                                //                                                    english page
                                                window.location = 'index.html';
                                            } else {
                                                //                                                   arabic page
                                                window.location = 'https://www.youtube.com';
                                            }
                                        }
                                    </script>
                                    <input onclick="sendIt(this)" type="checkbox" value="1" name="yousendit" />

                                    <a>English</a>
                                </div>

                                <div class="top-bar-content-right">
                                    <div class="top-bar-socials">
                                        <div class="inner">
                                            <span class="choose-service"><a href="{{asset('/')}}">الرئيسية</a></span>
                                        </div>
                                    </div><!-- /.top-bar-socials -->
                                </div><!-- .top-bar-content-right -->
                            </div>
                        </div>
                    </div><!-- /.wrap-themesflat-container -->
                </div>
                <!-- /#top-bar -->

               
                <!-- Main Content -->
                <div id="main-content" class="site-main clearfix">
                    <div id="content-wrap">
                        <div id="site-content" class="site-content clearfix">
                            <div  class="inner-content-wrap">
                                <div class="page-content">

                                    <div class="fullwidthbanner-container">

                                        <div class="fullwidthabanner">
                                            
                                            <ul class="join-header">
                                                <li class="social-flex">
                                                    <a><i class="icon finance-icon-Facebook"></i></a>
                                                    <a><i class="icon finance-icon-Twitter"></i></a>
                                                    <a><i class="icon finance-icon-instagram"></i></a>
                                                    <a><i class="flat-icon-youtube"></i></a>
                                                </li>

                                                <!-- Slide 1 -->
                                                <li>
                                                    <div>
                                                        <p>ابدأ البيع الآن حيث يتسوق الملايين من المشترين يومياً أنت على بعد خطوات قليلة لتصبح بائعاً على منصة ايلاف</p>
                                                        <a onclick="sliding()"  class="btn-red join-register">سجل الآن</a>
                                                    </div>
                                                    <!-- Main Image -->
                                                    <img src="{{asset('users/assets/img/service/joinback.png')}}">
                                                    <script>
                                                       function sliding(){
                                                            $('html, body').animate({
                                                                scrollTop: $('#join-register').offset().top - 10
                                                            }, 1000);
                                                       }
                                                    </script>
                                                    
                                                </li>
                                              
                                            </ul>


                                        </div>
                                    </div>

                                    <div class="container">
                                        <div class="join-iilff">
                                            <img src="{{asset('users/assets/img/service/join-iilff.png')}}">
                                        </div>
                                    </div>
                                    
                                    
                                    <!-- whyus -->
                                    <div class="row-partner outerrow">
                                        <div class="container">
                                            <div class="row">
                                                <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="40" data-smobi="40"></div>
                                                <div class="col-md-12">                                                    
                                                        <div class="col-md-12">
                                                            <div class="themesflat-headings style-1 clearfix text-center">
                                                                <h2 style="font-size: 25px;font-weight: 700; letter-spacing: 0;color: #37405a">لماذا تبيع على إلف</h2>
                                                                <div class="sep"></div>
                                                                <div class="clearfix"></div>
                                                            </div><!-- /.themesflat-headings -->

                                                            <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>

                                                        </div>                                                    
                                                </div> <!-- /.col-md-12 -->
                                                
                                                <div class="themesflat-spacer clearfix" data-desktop="70" data-mobi="40" data-smobi="40"></div>
                                                
                                                <div class="col-md-12">
                                                    <div class="row join">
                                                        <div class="col-md-6"> 
                                                            <div class="join-flex">
                                                                <div>

                                                                    <img src="{{asset('users/assets/img/service/bulb.png')}}">

                                                                </div>

                                                                <div class="themesflat-headings style-1 clearfix text-right">
                                                                    <h6>دعم مستمر للبائعين مع تسويق مجاني</h6>
                                                                    <div class="sep  joinsep"></div>

                                                                    <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="10" data-smobi="10"></div>

                                                                    <div>
                                                                        <p>لدينا فريق محترف لمساعدتك سواء كان من خلال مركز خدمة البائعين او من خلال قسم التطوير </p>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div><!-- /.themesflat-headings -->
                                                            </div>
                                                            <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40"></div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">                                                            
                                                            <div class="join-flex">
                                                                <div>

                                                                    <img src="{{asset('users/assets/img/service/bulb.png')}}">

                                                                </div>

                                                                <div class="themesflat-headings style-1 clearfix text-right">
                                                                    <h6>الوصول لملايين المشترين</h6>
                                                                    <div class="sep  joinsep"></div>

                                                                    <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="10" data-smobi="10"></div>

                                                                    <div>
                                                                        <p>العديد من المشترين سوف يجدون سلعك يومياً، مما يعني المزيد من المبيعات، أليس كذلك؟</p>
                                                                    </div>
                                                                    <div class="clearfix"></div>

                                                                </div><!-- /.themesflat-headings --> 
                                                            </div>
                                                            <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40"></div>
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row join">
                                                        <div class="col-md-6"> 
                                                            <div class="join-flex">
                                                                <div>

                                                                    <img src="{{asset('users/assets/img/service/bulb.png')}}">

                                                                </div>

                                                                <div class="themesflat-headings style-1 clearfix text-right">
                                                                    <h6>أضف سلعك مجاناً و بكل بسهولة</h6>
                                                                    <div class="sep  joinsep"></div>

                                                                    <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="10" data-smobi="10"></div>

                                                                    <div>
                                                                        <p>أنشئ حسابك كبائع واعرض سلعك على الموقع دون دفع أي رسوم، وبخطوات بسيطة وسريعة</p>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div><!-- /.themesflat-headings --> 
                                                            </div>
                                                            <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40"></div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">                                                            
                                                            <div class="join-flex">
                                                                <div>

                                                                    <img src="{{asset('users/assets/img/service/bulb.png')}}">

                                                                </div>

                                                                <div class="themesflat-headings style-1 clearfix text-right">
                                                                    <h6>اجراءات الشحن والدفع تتم عن طريق إلف.كوم</h6>
                                                                    <div class="sep  joinsep"></div>

                                                                    <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="10" data-smobi="10"></div>

                                                                    <div>
                                                                        <p>العديد من المشترين سوف يجدون سلعك يومياً، مما يعني المزيد من المبيعات، أليس نحن نتولى عنك هذا العناء، حيث سنقوم باستلام سلعك منك وتوصيلها للمشترين. بعدها سيتم استلام النقود منهم و في النهاية تحويلها لك</p>
                                                                    </div>
                                                                    <div class="clearfix"></div>

                                                                </div><!-- /.themesflat-headings --> 
                                                            </div>
                                                            <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40"></div>
                                                        </div>
                                                    </div>                                                    
                                                </div>
                                            </div><!-- /.row -->
                                        </div><!-- /.container -->
                                    </div>
                                    <!-- /whyus -->
                                    
                                     
                                 <!-- TESTIMONIALS -->
                                <div class="row-testimonials outerrow">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                 <div class="themesflat-spacer clearfix" data-desktop="91" data-mobi="40" data-smobi="40"></div>
                                                <div class="themesflat-headings style-1 clearfix text-center">
                                                    <h2 class="heading clearfix">قالو عنا</h2>
                                                    <div class="sep clearfix"></div>
                                                </div><!-- /.themesflat-headings -->
                                                <div class="themesflat-spacer clearfix" data-desktop="52" data-mobi="40" data-smobi="40"></div>
                                                <div class="container  mainbg">
                                                    <div class="mycontainer">
                                                        <div class="themesflat-carousel-box has-bullets bullet-circle" data-auto="true" data-loop="false" data-gap="300" data-column="1" data-column2="1" data-column3="1">
                                                    <div class="owl-carousel owl-theme">
                                                        <div class="themesflat-testimonials style-1 clearfix image-circle"> 
                                                            <div class="item said">
                                                                <div class="inner">
                                                                    <div class="thumb new-thumb">
                                                                        <img src="{{asset('users/assets/img/testimonials/customer-1.png')}}" alt="Image">
                                                                    </div>
                                                                    <div class="block-q right-q">
                                                                        <img src="assets/img/service/right-q.png">
                                                                    </div>
                                                                    <div class="block-q left-q">
                                                                        <img src="assets/img/service/left-q.png">
                                                                    </div>
                                                                    <blockquote class="text">
                                                                        <p>Very friendly staff that has worked with me on payment arrangement to insure that I am able to make my payment and satisfied them. I would recommend them to anyone who is looking for an Auto Loan. Thank you so much for your Service.</p>

                                                                    </blockquote>
                                                                    <div class="name-pos">
                                                                        <h6 class="name">SABRINA BROWN</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.themesflat-testimonials -->
                                                        <div class="themesflat-testimonials style-1 clearfix image-circle">
                                                            <div class="item said">
                                                                <div class="inner">
                                                                    <div class="thumb new-thumb">
                                                                        <img src="{{asset('users/assets/img/testimonials/customer-1.png')}}" alt="Image">
                                                                    </div>
                                                                    <div class="block-q right-q">
                                                                        <img src="assets/img/service/right-q.png">
                                                                    </div>
                                                                    <div class="block-q left-q">
                                                                        <img src="assets/img/service/left-q.png">
                                                                    </div>
                                                                    <blockquote class="text">
                                                                        <p>Very friendly staff that has worked with me on payment arrangement to insure that I am able to make my payment and satisfied them. I would recommend them to anyone who is looking for an Auto Loan. Thank you so much for your Service.</p>

                                                                    </blockquote>
                                                                    <div class="name-pos">
                                                                        <h6 class="name">SABRINA BROWN</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.themesflat-testimonials -->
                                                        <div class="themesflat-testimonials style-1 clearfix image-circle">
                                                            <div class="item said">
                                                                <div class="inner">
                                                                    <div class="thumb new-thumb">
                                                                        <img src="{{asset('users/assets/img/testimonials/customer-1.png')}}" alt="Image">
                                                                    </div>
                                                                    <div class="block-q right-q">
                                                                        <img src="assets/img/service/right-q.png">
                                                                    </div>
                                                                    <div class="block-q left-q">
                                                                        <img src="assets/img/service/left-q.png">
                                                                    </div>
                                                                    <blockquote class="text">
                                                                        <p>Very friendly staff that has worked with me on payment arrangement to insure that I am able to make my payment and satisfied them. I would recommend them to anyone who is looking for an Auto Loan. Thank you so much for your Service.</p>

                                                                    </blockquote>
                                                                    <div class="name-pos">
                                                                        <h6 class="name">SABRINA BROWN</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.themesflat-testimonials -->
                                                        <div class="themesflat-testimonials style-1 clearfix image-circle">
                                                            <div class="item said">
                                                                <div class="inner">
                                                                    <div class="thumb new-thumb">
                                                                        <img src="{{asset('users/assets/img/testimonials/customer-1.png')}}" alt="Image">
                                                                    </div>
                                                                    <div class="block-q right-q">
                                                                        <img src="assets/img/service/right-q.png">
                                                                    </div>
                                                                    <div class="block-q left-q">
                                                                        <img src="assets/img/service/left-q.png">
                                                                    </div>
                                                                    <blockquote class="text">
                                                                        <p>Very friendly staff that has worked with me on payment arrangement to insure that I am able to make my payment and satisfied them. I would recommend them to anyone who is looking for an Auto Loan. Thank you so much for your Service.</p>

                                                                    </blockquote>
                                                                    <div class="name-pos">
                                                                        <h6 class="name">SABRINA BROWN</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.themesflat-testimonials -->
                                                        <div class="themesflat-testimonials style-1 clearfix image-circle">
                                                            <div class="item said">
                                                                <div class="inner">
                                                                    <div class="thumb new-thumb">
                                                                        <img src="{{asset('users/assets/img/testimonials/customer-1.png')}}" alt="Image">
                                                                    </div>
                                                                    <div class="block-q right-q">
                                                                        <img src="assets/img/service/right-q.png">
                                                                    </div>
                                                                    <div class="block-q left-q">
                                                                        <img src="assets/img/service/left-q.png">
                                                                    </div>
                                                                    <blockquote class="text">
                                                                        <p>Very friendly staff that has worked with me on payment arrangement to insure that I am able to make my payment and satisfied them. I would recommend them to anyone who is looking for an Auto Loan. Thank you so much for your Service.</p>

                                                                    </blockquote>
                                                                    <div class="name-pos">
                                                                        <h6 class="name">SABRINA BROWN</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.themesflat-testimonials -->
                                                    </div>
                                                </div><!-- /.themesflat-carousel-box -->

                                                    </div>
                                                     
                                                </div>
                                               
                                               
                                            </div><!-- /.col-md-12 -->
                                            
                                        </div><!-- /.row -->
                                    </div><!-- /.container -->
                                </div>
                                <!-- END TESTIMONIALS -->
                                

                                    <!-- regster now -->
                                    <div id="join-register" class="row-partner outerrow">
                                        <div class="container">
                                            <div class="row">
                                                <div class="themesflat-spacer clearfix" data-desktop="70" data-mobi="40" data-smobi="40"></div>
                                                <div class="col-md-12">
                                                        <div class="col-md-12">
                                                            <div class="themesflat-headings style-1 clearfix text-center">
                                                                <h2 style="font-size: 25px;font-weight: 700; letter-spacing: 0;color: #37405a">سجل الآن</h2>
                                                                <div class="sep"></div>
                                                                <div class="clearfix"></div>
                                                            </div><!-- /.themesflat-headings -->

                                                            <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>

                                                        </div>                                                    
                                                </div> <!-- /.col-md-12 -->
                                                
                                               
                                                
                                                <div class="col-md-12">
                                                    <div class="parent-flex">

                                                        {{ Form::open(array('method' => 'POST','files'=>true,'url' => array('vendor_register'))) }}

                                                            <div class="input-flex">
                                                                <div>
                                                                    <h6>اسم الشركة</h6>
                                                                    <div>
                                                                        <i class="fa icon-account"></i>
                                                                        <input type="text" name="company" required placeholder="">
                                                                        @if ($errors->has('company'))
                                                                            <span class="error">{{ $errors->first('company') }}</span>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="input-flex">
                                                                <div>
                                                                    <h6>اسم بالكامل</h6>
                                                                    <div>
                                                                        <i class="fa icon-account"></i>
                                                                        <input type="text" name="name" required placeholder="">
                                                                        @if ($errors->has('name'))
                                                                            <span class="error">{{ $errors->first('name') }}</span>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="input-flex">
                                                                <div>
                                                                    <h6>رقم الهاتف</h6>
                                                                    <div>
                                                                        <i class="fa icon-phone"></i>
                                                                        <input type="text" name="phone" required placeholder="">
                                                                        @if ($errors->has('phone'))
                                                                            <span class="error">{{ $errors->first('phone') }}</span>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="input-flex">
                                                                <div>
                                                                    <h6>البريد الإلكترونى</h6>
                                                                    <div>
                                                                        <i class="fa icon-email"></i>
                                                                        <input type="email" name="email" required placeholder="">
                                                                        @if ($errors->has('email'))
                                                                            <span class="error">{{ $errors->first('email') }}</span>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="input-flex">
                                                                <div>
                                                                    <h6>كلمة المرور</h6>
                                                                    <div>
                                                                        <i class="fa icon-lock"></i>
                                                                        <input type="password" name="password" required placeholder="" />
                                                                        @if ($errors->has('password'))
                                                                            <span class="error">{{ $errors->first('password') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="input-flex">
                                                                <div>
                                                                    <h6> تأكيد كلمة المرور</h6>
                                                                    <div>
                                                                        <i class="fa icon-lock"></i>
                                                                        <input type="password" name="password_confirmation" required placeholder="" />
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="input-flex">
                                                                <div>
                                                                    <h6>الوظيفة</h6>
                                                                    <div>
                                                                        <i class="fa icon-account"></i>
                                                                        <input type="text" name="job" required placeholder="">
                                                                        @if ($errors->has('job'))
                                                                            <span class="error">{{ $errors->first('job') }}</span>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            
                                                            <div class="input-flex">
                                                                <div>
                                                                    <h6>الدولة</h6>
                                                                    <div>
                                                                        <i class="fa icon-location"></i>
                                                                        <select class="selectpicker form-control" id="country" name="country" required>
                                                                            <option value="" selected="selected">اختر الدولة</option>
                                                                            @foreach($countries as $country )
                                                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @if ($errors->has('country'))
                                                                            <span class="error">{{ $errors->first('country') }}</span>
                                                                        @endif
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="input-flex">
                                                                <div>
                                                                    <h6>المدينة</h6>
                                                                    <div>
                                                                        <i class="fa icon-location"></i>
                                                                        <select class="selectpicker form-control" id="city" name="city" required>
                                                                            <option value="" selected="selected">اختر المدينة</option>
                                                                        </select>
                                                                        @if ($errors->has('city'))
                                                                            <span class="error">{{ $errors->first('city') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="input-flex">
                                                                <div>
                                                                    <h6>المنطقة</h6>
                                                                    <div>
                                                                        <i class="fa icon-location"></i>
                                                                        <select class="selectpicker form-control" id="area" name="area" required>
                                                                            <option value="" selected="selected">اختر المنطقة</option>
                                                                        </select>
                                                                        @if ($errors->has('area'))
                                                                            <span class="error">{{ $errors->first('area') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="input-flex divisions">
                                                                <div>
                                                                    <h6>التخصص</h6>
                                                                    <div>
                                                                        @foreach($categories as $category)
                                                                            <label>
                                                                                <span>{{$category->arcategory}}</span>
                                                                                <input type="checkbox" value="{{$category->id}}" name="classfication[]" >
                                                                            </label>
                                                                        @endforeach

                                                                        @if ($errors->has('classfication'))
                                                                            <span class="error">{{ $errors->first('classfication') }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            
                                                            </div>

                                                            <button type="submit" class="btn-red">إرسال</button>
                                                        {!! Form::close() !!}

                                                    </div>
                                                </div>
                                            </div><!-- /.row -->
                                        </div><!-- /.container -->
                                    </div>
                                    <!-- /regster now -->

                                </div>
                                <!--End .page-content -->
                            </div>
                            <!--End #inner-content -->
                        </div>
                        <!--End #site-content -->
                    </div>
                    <!--End #content-wrap -->
                </div>
                <!-- / #main-content --> 
                
                <div class="row-partner outerrow bottom-grey">
                    <div class="themesflat-container title-style-1">
                        <div class="row">
                            <div class="themesflat-spacer clearfix" data-desktop="90" data-mobi="40" data-smobi="40"></div>
                            <div class="col-md-12">
                                <div class="type-flex-parent">
                                    <div class="col-md-12">
                                        <div class="row row-custom">
                                            <div class="col-md-4 text-center">
                                                <div class="themesflat-headings style-1 clearfix text-center mycenter-img">
                                                    <img src="{{asset('users/assets/img/logo-footer-01.png')}}">
                                                </div><!-- /.themesflat-headings -->
                                            </div>
                                            <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                            <div class="col-md-4">
                                                <div>
                                                    <div class="subscripe-mail">
                                                        <h6 class="offers-p suscribe">اشتراك عروضنا الحصرية</h6>
                                                        <form>
                                                            <i class="finance-icon-Email02"></i>
                                                            <input type="email" placeholder="أدخل بريدك الالكتروني">
                                                            <a>اشتراك</a>
                                                        </form>

                                                    </div>

                                                </div>
                                                <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div>
                                                    <div class="our-mail">

                                                        <h6 class="offers-p all-page our-email">&lsaquo;&nbsp;&nbsp;بريدنا الالكتروني</h6>

                                                        <p>iilff@gmail.com</p>

                                                    </div>

                                                </div>
                                                <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div> <!-- /.col-md-12 -->


                            <div class="themesflat-spacer clearfix" data-desktop="70" data-mobi="40" data-smobi="40"></div>
                        </div>
                    </div>
                </div>
                

                <!-- Footer -->
                <footer id="footer">
                    <div id="footer-widgets" class="themesflat-container title-style-1">
                        <div class="themesflat-row gutter-30">
                            <div class="span_1_of_5 col">
                                <div class="widget widget_tag_cloud margin-top-6 padding-left-9">
                                    <h2 class="widget-title margin-bottom-43"><span>شاركنا عبر الميديا</span></h2>
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
                                    <h2 class="widget-title margin-bottom-43"><span>طرق الدفع</span></h2>
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
                                    <h2 class="widget-title margin-bottom-43"><span>شغفنا تكون معنا</span></h2>
                                </div><!-- /.widget_tag_cloud -->
                            </div><!-- /.span_1_of_5 -->

                            <div class="span_1_of_5 col">
                                <div class="widget widget_tag_cloud margin-top-6 padding-left-9">
                                    <h2 class="widget-title margin-bottom-43"><span>خدمة العملاء</span></h2>
                                    <div class="tagcloud social-tag">
                                        <div class="callflex">
                                            <a href="support.html"> <span>مركز المساعدة</span></a>
                                        </div>
                                        <div class="callflex">
                                            <a href="return-policy.html"><span>سياسة الارجاع واستلام النقدية</span></a>
                                        </div>
                                        <div class="callflex">
                                            <a href="Epolicy.html"><span>سياسة الالكترونيات</span></a>
                                        </div>
                                        <div class="callflex">
                                            <a href="charge-policy.html"><span>الشحن</span></a>
                                        </div>
                                    </div>
                                </div><!-- /.widget_tag_cloud -->
                            </div><!-- /.span_1_of_5 -->

                            <div class="span_1_of_5 col">
                                <div class="widget widget_flickr margin-top-6 padding-left-6">
                                    <h2 class="widget-title"><span>إلف</span></h2>
                                    <div class="item sendus">
                                        <a href="about-us.html">من نحن</a>
                                    </div>
                                    <div class="item sendus">
                                        <a href="terms.html">الشروط و الأحكام</a>
                                    </div>
                                    <div class="item sendus">
                                        <a href="privacy.html">سياسة الخصوصية</a>
                                    </div>
                                    <div class="item sendus">
                                        <a href="faq.html">الأسئلة الشائعة</a>
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
                                            © COPYRIGHT FINANCE. DESIGN BY PROTECH.
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
        <!--End #wrapper -->
    </div>


    <a id="scroll-top"></a>

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

    <!-- ajax scripts  -->
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#country').change(function() {
            var countval = $('#country').val();
            console.log(countval);

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
            console.log(countval);

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
        
    </script>
</body>
</html>