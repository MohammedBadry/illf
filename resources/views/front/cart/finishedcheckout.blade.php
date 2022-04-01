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
                            <div class="side-menu-nav-flex">                                
                                <div style="text-align: center;" class="side-flex">
                                    <h3>{{$successmessage}}</h3>
                                    <div class="cart-flex">
                                        <a style="margin-bottom: 20px;" href="{{asset('/')}}" class="btn-red">تسوق الأن من جديد</a>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection 