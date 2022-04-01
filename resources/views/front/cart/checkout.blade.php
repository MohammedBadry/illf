@extends('front.include.master')
@section('title') إيلف | سلة المشتريات - طريقة الدفع @endsection
@section('content')

    <div id="main-content" class="site-main clearfix">
        <div id="content-wrap">
            <div id="site-content" class="site-content clearfix">
                <div id="inner-content" class="inner-content-wrap">
                    <div class="page-content">

                        <div class="themesflat-spacer clearfix" data-desktop="60" data-mobi="60" data-smobi="60"></div>
                        <div class="container">

                            <div class="payment-steps">
                                <div>
                                    <i class="fa fa-check active-pay"></i>
                                    <p class="active-pay">تفاصيل الطلب</p>
                                    <i class="fa fa-circle active-pay"></i>
                                </div>
                                <div class="line-pay line-active"></div>
                                <div>
                                    <i class="fa fa-truck active-pay"></i>
                                    <p class="active-pay">تفاصيل الشحن</p>
                                    <i class="fa fa-circle active-pay"></i>
                                </div>
                                <div class="line-pay line-pay-2 line-active"></div>
                                <div>
                                    <i class="icon-credit  active-pay"></i>
                                    <p class="active-pay">طريقه الدفع</p>
                                    <i class="fa fa-circle active-pay"></i>
                                </div>
                            </div>

                            <div class="side-menu-nav-flex">

                                <div id="hamburgerBtn">&#9776 &nbsp;&nbsp; عربة التسوق </div>

                                <nav id="sideMenu" class="card-side open">

                                    @include('front.cart.cart-nav')

                                    <div class="cart-flex">
                                        {!! Form::open(array('method' => 'post','id' => 'select-location-form' ,'files' => true,'url' =>'cart')) !!}
                                            <input type="hidden" id="myselectedlocation" name="continuepayment">
                                        {!! Form::close() !!}
                                        <a style="margin-bottom: 20px;" href="{{asset('cart')}}" class="btn-red">رجوع</a>
                                        <a onclick="event.preventDefault();document.getElementById('select-location-form').submit();" class="btn-red">المتابعة للدفع</a>
                                    </div>

                                </nav>

                                <div class="side-flex">
                                    {!! Form::open(array('method' => 'post' ,'files' => true,'url' =>'cart')) !!}
                                        <input type="hidden" name="confirmcheckout">
                                        <div class="form">
                                            <select class="selectpicker form-control" name="paid" required>
                                                <option value="" selected="selected" disabled>اختر وسيلة الدفع</option>
                                                <option value="0">الدفع عند الاستلام</option>
                                                <option value="1">المحفظة</option>
                                                <!--option value="2">دفع إلكترونى</option-->
                                            </select>
                                            <button type="submit" class="btn-red begin-tab"><i class="icon-buy"></i></button>
                                        </div>
                                    {!! Form::close() !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
