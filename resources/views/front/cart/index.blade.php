@extends('front.include.master')
@section('title')  إيلف | سلة المشتريات - تفاصيل الطلب @endsection
@section('content')

    <div id="main-content" class="site-main clearfix">
        <div id="content-wrap">
            <div id="site-content" class="site-content clearfix">
                <div id="inner-content" class="inner-content-wrap">
                    <div class="page-content">

                        <div class="themesflat-spacer clearfix" data-desktop="60" data-mobi="60" data-smobi="60"></div>
                        @if(session('shopping_cart'))
                            <div class="container">
                                <div class="payment-steps">
                                    <div>
                                        <i class="fa fa-check active-pay"></i>
                                        <p class="active-pay">{{__('messages.order_details')}}</p>
                                        <i class="fa fa-circle active-pay"></i>
                                    </div>
                                    <div class="line-pay"></div>
                                    <div>
                                        <i class="fa fa-truck"></i>
                                        <p class="active-pay">{{__('messages.charge_details')}}</p>
                                        <i class="fa fa-circle"></i>
                                    </div>
                                    <div class="line-pay line-pay-2"></div>
                                    <div>
                                        <i class="icon-credit"></i>
                                        <p>{{__('messages.payway')}}</p>
                                        <i class="fa fa-circle"></i>
                                    </div>
                                </div>
                                <div class="side-menu-nav-flex">


                                    <div id="hamburgerBtn">&#9776 &nbsp;&nbsp; {{__('messages.cart')}} </div>

                                    <nav id="sideMenu" class="card-side open">

                                        @include('front.cart.cart-nav')

                                        <div class="cart-flex">
                                            <a href="{{asset('cartcharge')}}" class="btn-red">المتابعة</a>
                                        </div>
                                    </nav>

                                    <div class="side-flex">

                                            <div class="our-offers">
                                                <p>{{__('messages.delivery_note')}} </p>
                                                <img src="{{asset('users/assets/img/service/our-offers.png')}}">
                                            </div>

                                            <div class="cart-title">
                                                <h6>{{__('messages.cart')}}</h6>
                                                <span>{{count($cartitems)}} {{__('messages.items')}}</span>
                                            </div>

                                            <div class="cart-title-d">
                                                <h6>{{__('messages.item')}}</h6>
                                                <h6>{{__('messages.item_code')}}</h6>
                                                <h6>&nbsp;</h6>
                                                <h6>{{__('messages.quantity')}}</h6>
                                                <h6>{{__('messages.cost')}}</h6>
                                            </div>

                                            @foreach($cartitems as $key => $cartitem)
                                                <?php
                                                    $iteminfo = DB::table('items')->where('id',$cartitem['item_id'])->first();
                                                    $itempic  = DB::table('item_images')->where('item_id',$cartitem['item_id'])->first();
                                                ?>
                                                <div class="cart-product">
                                                    {{ Form::open(array('method' => 'DELETE','id'=> 'delcartitemform'.$key,'style' => 'display:none','url' => array('cart/'.$key))) }}
                                                        <input type="hidden" name="deletesessionitem" >
                                                    {!! Form::close() !!}
                                                    <a class="del-item" onclick="event.preventDefault();document.getElementById('delcartitemform{{$key}}').submit();">×</a>

                                                    <div>
                                                        @if($itempic)
                                                            <img src="{{asset('users/images/'.$itempic->image)}}" alt="{{$iteminfo ? $iteminfo->artitle : '?????'}}">
                                                        @else
                                                            <img src="{{asset('users/assets/img/products/product1.png')}}" alt="{{$iteminfo ? $iteminfo->artitle : '?????'}}">
                                                        @endif
                                                    </div>

                                                    <p>{{$iteminfo ? $iteminfo->code : '?????'}}</p>

                                                    @if($iteminfo)
                                                        <a class="mypreview" href="{{ url('p/'.$iteminfo->id) }}">
                                                    @else
                                                        <a class="mypreview" href="">
                                                    @endif
                                                        <img src="{{asset('users/assets/img/service/preview.png')}}">
                                                    </a>

                                                    <div>
                                                        <span>{{$cartitem['qty']}}</span>
                                                    </div>

                                                    <div>
                                                        <span>{{$cartitem['price']}} SAR</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                    </div>

                                </div>
                            </div>
                        @else
                            <div class="container">
                                <div class="side-menu-nav-flex">
                                    <div style="text-align: center;" class="side-flex">
                                        <h3>السلة فارغة</h3>
                                        <div class="cart-flex">
                                            <a style="margin-bottom: 20px;" href="{{asset('/')}}" class="btn-red">تسوق الأن</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        hamburgerBtn.addEventListener('click', () => {
            sideMenu.classList.toggle('open');
        });
    </script>

@endsection
