@extends('front.include.master')
@section('title') إيلف | شكراً لانضمامك لإيلف @endsection
@section('content')

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
                                            <h2>شكراً لانضمامك لمنصة إيلف</h2>
                                            <p>سنقوم بارسال رسالة إلى البريد الإلكتروني الخاص بك لتتمكن من تسجيل الدخول</p>
                                            <a href="{{asset('/')}}"  class="btn-red join-register">الرئيسية</a>
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

                    </div>
                    <!--End .page-content -->
                </div>
                <!--End #inner-content -->
            </div>
            <!--End #site-content -->
        </div>
    </div>

@endsection