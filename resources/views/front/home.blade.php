@extends('front.include.master')
@section('title') إيلف | الرئيسية @endsection
@section('content')

    <div id="main-content" class="site-main clearfix">
        <div id="content-wrap">
            <div id="site-content" class="site-content clearfix">
                <div id="inner-content" class="inner-content-wrap">
                    <div class="page-content">

                        <!-- SLIDER -->
                        <div class="rev_slider_wrapper index-slider fullwidthbanner-container">

                            <div id="rev-slider1" class="rev_slider fullwidthabanner">
                                <div class="social-flex">
                                    <a><i class="icon finance-icon-Facebook"></i></a>
                                    <a><i class="icon finance-icon-Twitter"></i></a>
                                    <a><i class="icon finance-icon-instagram"></i></a>
                                    <a><i class="flat-icon-youtube"></i></a>
                                </div>
                                <ul>
                                    @foreach($allsliders as $slider)
                                    <!-- Slide 1 -->
                                    <li data-transition="random">

                                        <!-- Main Image -->
                                        <img src="{{ url('users/images/').'/'.$slider->image }}" alt="" data-bgposition="center center" data-no-retina>
                                    </li>
                                    <!-- /End Slide 1 -->
                                    @endforeach
                                </ul>


                            </div>
                        </div>
                        <!-- END SLIDER -->


                        <!-- recently added -->
                        <div class="row-partner outerrow">
                            <div class="container">
                                <div class="row">
                                    <div class="themesflat-spacer clearfix" data-desktop="90" data-mobi="40" data-smobi="40"></div>
                                    <div class="col-md-12">
                                        <div class="type-flex-parent">
                                            <div class="col-md-12">
                                                <div class="row row-custom">
                                                    <div class="col-md-6 text-right">
                                                        <div class="themesflat-headings style-1 clearfix text-right">
                                                            <h2 style="letter-spacing: 0;color: #37405a">{{__('messages.latest_products')}}</h2>
                                                            <div class="sep"></div>
                                                            <div class="clearfix"></div>
                                                        </div><!-- /.themesflat-headings -->
                                                    </div>
                                                    <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                    <div class="col-md-6 text-left" style="display: none">
                                                        <div class="type-flex">
                                                            <div class="active-cat">
                                                                <a>
                                                                    <h6>رجالي</h6>
                                                                </a>

                                                            </div>
                                                            <div>
                                                                <a>
                                                                    <h6>نسائي</h6>
                                                                </a>
                                                            </div>
                                                            <div>
                                                                <a>
                                                                    <h6>أطفالي</h6>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                    <div class="col-md-4">
                                                        <div>
                                                            <div>
                                                                &nbsp;
                                                            </div>

                                                        </div>
                                                        <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                    </div>
                                                    <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                    <div class="col-md-4">
                                                        <div>
                                                            <div>
                                                                <a href="{{ url('products') }}">
                                                                    <h6 class="offers-p all-page" style="text-align: left">&lsaquo;&lsaquo; {{__('messages.show_all')}} </h6>
                                                                </a>

                                                            </div>

                                                        </div>
                                                        <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- /.col-md-12 -->
                                    <div class="themesflat-spacer clearfix" data-desktop="70" data-mobi="40" data-smobi="40"></div>
                                    <div class="col-md-12 over">
                                        <div class="themesflat-partner style-1 arrow-center offset30 offset-v0 has-arrows arrows-circle w32" data-auto="false" data-loop="false" data-column="3" data-column2="2" data-column3="1" data-gap="60">
                                            <div class="owl-carousel  owl-theme">
                                                @foreach($lastitems as $item)
                                                    @include('front.items.partials.item-card', $item)
                                                @endforeach
                                            </div>
                                        </div><!-- /.themesflat-partner -->

                                        <div class="themesflat-spacer clearfix" data-desktop="70" data-mobi="40" data-smobi="40"></div>
                                    </div><!-- /.col-md-12 -->
                                </div><!-- /.row -->
                            </div><!-- /.container -->
                        </div>
                        <!-- /recently added -->

                        <!-- offers -->
                        <div class="row-partner outerrow">
                            <div class="container">
                                <div class="row">
                                    <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="40" data-smobi="40"></div>
                                    <div class="col-md-12">
                                        <div class="type-flex-parent">
                                            <div class="col-md-12">
                                                <div class="row row-custom">
                                                    <div class="col-md-4 text-right">
                                                        <div class="themesflat-headings style-1 clearfix text-right">
                                                            <h2 style="font-size: 25px;font-weight: 700; letter-spacing: 0;color: #37405a">{{__('messages.special_offer')}}</h2>
                                                            <div class="sep"></div>
                                                            <div class="clearfix"></div>
                                                        </div><!-- /.themesflat-headings -->
                                                    </div>
                                                    <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                    <div class="col-md-4">
                                                        <div>
                                                            <div>
                                                                <h6 class="offers-p">{{__('messages.big_discounts')}} </h6>

                                                            </div>

                                                        </div>
                                                        <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div>
                                                            <div>
                                                                <a href="{{ url('products') }}/?type=offer">
                                                                    <h6 class="offers-p all-page" style="text-align: left">&lsaquo;&lsaquo; {{__('messages.show_all')}} </h6>
                                                                </a>

                                                            </div>

                                                        </div>
                                                        <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                    </div> <!-- /.col-md-12 -->
                                    <div class="themesflat-spacer clearfix" data-desktop="70" data-mobi="40" data-smobi="40"></div>
                                    <div class="col-md-12 over">
                                        <div class="themesflat-partner style-1 arrow-center offset30 offset-v0 has-arrows arrows-circle w32" data-auto="false" data-loop="false" data-column="3" data-column2="2" data-column3="1" data-gap="60">
                                            <div class="owl-carousel  owl-theme">
                                                @foreach($discounted_items as $item)
                                                    @include('front.items.partials.item-card', $item)
                                                @endforeach
                                            </div>
                                        </div><!-- /.themesflat-partner -->

                                        <div class="themesflat-spacer clearfix" data-desktop="70" data-mobi="40" data-smobi="40"></div>
                                    </div><!-- /.col-md-12 -->
                                </div><!-- /.row -->
                            </div><!-- /.container -->
                        </div>
                        <!-- /offers -->

                        <!-- statistics -->
                        <div class="row-services">
                            <div class="fullwidthbanner-container">
                                <div class="row">
                                    <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="40" data-smobi="40"></div>
                                    <div class="col-md-12 our-service why-us states">
                                        <div class="col-md-4 servmain">
                                            <div class="flex">
                                                <div class="flex-parent">
                                                    <img src="{{asset('users/assets/img/service/circle-state.png')}}">
                                                    <p>{{__('messages.products_num')}}</p>
                                                    <span>{{$products_num}}</span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 servmain">
                                            <div class="flex">
                                                <div class="flex-parent">
                                                    <img src="{{asset('users/assets/img/service/circle-state.png')}}">
                                                    <p>{{__('messages.purchase_num')}}</p>
                                                    <span>{{$purchases_num}}+</span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 servmain">
                                            <div class="flex">
                                                <div class="flex-parent">
                                                    <img src="{{asset('users/assets/img/service/circle-state.png')}}">
                                                    <p>{{__('messages.num_users')}}</p>
                                                    <span>{{$users_num}}</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div><!-- /.col-md-12 -->
                                    <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40"></div>
                                </div>
                            </div><!-- /.container -->
                        </div>
                        <!-- statistics -->


                        <!-- products -->
                        <div class="row-partner outerrow">
                            <div class="container">
                                <div class="row">
                                    <div class="themesflat-spacer clearfix" data-desktop="60" data-mobi="40" data-smobi="40"></div>
                                    <div class="col-md-12">
                                        <div class="type-flex-parent">
                                            <div class="col-md-12">
                                                <div class="row row-custom">
                                                    <div class="col-md-6 text-right">
                                                        <div class="themesflat-headings style-1 clearfix text-right">
                                                            <h2 style="font-size: 25px;font-weight: 700; letter-spacing: 0;color: #37405a">{{__('messages.special_cats')}}</h2>
                                                            <div class="sep"></div>
                                                            <div class="clearfix"></div>
                                                        </div><!-- /.themesflat-headings -->
                                                    </div>
                                                    <div class="col-md-6 text-left">
                                                        <div class="type-flex">

                                                        </div>
                                                        <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 over">
                                            <div class="themesflat-spacer clearfix" data-desktop="60" data-mobi="40" data-smobi="40"></div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    @foreach ($specialcats as $cat)
                                                    <div class="col-md-3">
                                                        <div class="column-flex-products">
                                                            <div>
                                                                <img src="{{asset('users/images/'.$cat->image)}}">
                                                            </div>
                                                            <a href="{{asset('products/'.$cat->encategory.'?CAT='.$cat->id)}}">
                                                                <h6>
                                                                    @if(request()->segment(1)!='en') {{$cat->arcategory}} @else {{$cat->encategory}} @endif</a></li>
                                                                </h6>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="themesflat-spacer clearfix" data-desktop="60" data-mobi="40" data-smobi="40"></div>
                                            </div>
                                            <a href="{{ url('products') }}/?type=special" class="more">{{__('messages.more')}}</a>
                                            <div class="themesflat-spacer clearfix" data-desktop="90" data-mobi="40" data-smobi="40"></div>


                                        </div><!-- /.col-md-12 -->
                                    </div><!-- /.col-md-12 -->
                                </div><!-- /.row -->
                            </div><!-- /.container -->
                        </div>
                        <!-- /products -->

                        <!-- Models -->
                        <div class="row-partner outerrow">
                            <div class="container">
                                <div class="row">
                                    <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40"></div>
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="column-flex">
                                                <img src="{{asset('users/assets/img/models/model1.png')}}">

                                            </div>
                                            <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="column-flex">
                                                <img src="{{asset('users/assets/img/models/model2.png')}}">

                                            </div>
                                            <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="column-flex">
                                                <img src="{{asset('users/assets/img/models/model3.png')}}">
                                                <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="column-flex">
                                                <img src="{{asset('users/assets/img/models/model4.png')}}">

                                            </div>
                                            <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40"></div>
                                        </div>
                                    </div><!-- /.col-md-12 -->
                                    <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40"></div>
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="column-flex">
                                                <img src="{{asset('users/assets/img/models/model5.png')}}">

                                            </div>
                                            <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="column-flex">
                                                <img src="{{asset('users/assets/img/models/model6.png')}}">

                                            </div>
                                            <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="column-flex">
                                                <img src="{{asset('users/assets/img/models/model7.png')}}">

                                            </div>
                                            <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="column-flex">
                                                <img src="{{asset('users/assets/img/models/model8.png')}}">
                                            </div>
                                            <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40"></div>
                                        </div>

                                    </div><!-- /.col-md-12 -->
                                    <div class="themesflat-spacer clearfix" data-desktop="60" data-mobi="40" data-smobi="40"></div>
                                </div><!-- /.row -->
                                <a class="more">{{__('messages.more')}}</a>
                            </div><!-- /.container -->
                        </div>
                        <!-- /Models -->
                        @if($home_cats->count()>0)
                        @foreach($home_cats as $cat)
                        <!-- phones -->
                        <div class="row-partner outerrow">
                            <div class="container">
                                <div class="row">
                                    <div class="themesflat-spacer clearfix" data-desktop="90" data-mobi="40" data-smobi="40"></div>
                                    <div class="col-md-12">
                                        <div class="type-flex-parent">
                                            <div class="col-md-12">
                                                <div class="row row-custom">
                                                    <div class="col-md-4 text-right">
                                                        <div class="themesflat-headings style-1 clearfix text-right">
                                                            <h2 style="font-size: 25px;font-weight: 700; letter-spacing: 0;color: #37405a">
                                                                @if(request()->segment(1)!='en') {{$cat->arcategory}} @else {{$cat->encategory}} @endif</a></li>
                                                            </h2>
                                                            <div class="sep"></div>
                                                            <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                            <div class="clearfix"></div>
                                                        </div><!-- /.themesflat-headings -->
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div>
                                                            <div>
                                                                <h6 class="offers-p">{{__('messages.big_discounts')}} </h6>

                                                            </div>

                                                        </div>
                                                        <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div>
                                                            <div>
                                                                <a href="{{asset('products/'.$cat->encategory.'?CAT='.$cat->id)}}">
                                                                    <h6 class="offers-p all-page" style="text-align: left">&lsaquo;&lsaquo; {{__('messages.show_all')}} </h6>
                                                                </a>

                                                            </div>

                                                        </div>
                                                        <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.col-md-12 -->

                                    <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40"></div>

                                    <div class="col-md-12 over">
                                        @foreach($cat->items as $item)
                                            @include('front.items.partials.item-card2', $item)
                                        @endforeach
                                    </div><!-- /.col-md-12 -->

                                </div><!-- /.row -->
                                <div class="themesflat-spacer clearfix" data-desktop="90" data-mobi="40" data-smobi="40"></div>
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                        <!-- lastwork -->


                        <!-- banner -->
                        <div class="row-services">
                            <div class="fullwidthbanner-container">
                                <div class="row">
                                    <div class="col-md-12 our-service banner-media">
                                        <img src="{{asset('users/images/'.$setting->home_adv_image)}}">
                                    </div>
                                </div><!-- /.row -->
                            </div><!-- /.container -->
                        </div>
                        <!-- banner -->
                        @endforeach
                    @else

                        <!-- banner -->
                        <div class="row-services">
                            <div class="fullwidthbanner-container">
                                <div class="row">
                                    <div class="col-md-12 our-service banner-media">
                                        <img src="{{asset('users/images/'.$setting->home_adv_image)}}">
                                    </div>
                                </div><!-- /.row -->
                            </div><!-- /.container -->
                        </div>
                        <!-- banner -->
                    @endif
                    </div>
                    <!--End .page-content -->
                </div>
                <!--End #inner-content -->
            </div>
            <!--End #site-content -->
        </div>
        <!--End #content-wrap -->
    </div>

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
                                            <h6 class="offers-p suscribe">{{__('messages.subscribe_offer')}}</h6>
                                            <form>
                                                <i class="finance-icon-Email02"></i>
                                                <input type="email" placeholder="{{__('messages.enter_your_email')}}">
                                                <a>{{__('messages.enter_your_email')}}</a>
                                            </form>

                                        </div>

                                    </div>
                                    <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <div class="our-mail">

                                            <h6 class="offers-p all-page our-email">&lsaquo;&nbsp;&nbsp;{{__('messages.ouremail')}}</h6>

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

    @section('script')
        <script type="text/javascript">
            function addtocart(item_id,price,qty)
            {
                var Token = $("input[name='_token']").val();
                $.ajax({
                    type: 'post',
                    url: '{{asset("/cart")}}',
                    data: {
                        _token  : Token,
                        item_id : item_id,
                        price   : price,
                        qty     : qty,
                    },
                    success: function (data) {
                        console.log(data);
                        $("#cart_text").html(data['cartcount']);
                        $("#total_text").html(data['total']);
                        alert("{{__('messages.added_to_cart')}}");
                        //toastr.success('Successflly added to Cart');
                    },
                    error: function (data) {
                        alert("{{__('messages.error_added_to_cart')}}");
                    }
                });
            }
            function addtowishlist(item_id,user_id)
            {
                var Token = $("input[name='_token']").val();
                $.ajax({
                    type: 'post',
                    url: '{{asset("/addtowishlist")}}',
                    data: {
                        _token  : Token,
                        item_id : item_id,
                        user_id : user_id,
                    },
                    success: function (data) {
                        console.log(data);
                        $("#wishlist-text").html(data['count']);
                        //alert(data['message']);
                        alert("{{__('messages.added_to_wishlist')}}");
                        //toastr.success('Successflly added to Cart');
                    },
                    error: function (data) {
                        alert("{{__('messages.added_to_wishlist')}}");
                    }
                });
            }
        </script>
    @stop
@endsection
