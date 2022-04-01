@extends('admin/include/master')
@section('title') لوحة التحكم | طلبات المنتجات @endsection
@section('content')
<?php use Carbon\Carbon; ?>
<section class="content">
    <div class="row">
       <div class="col-md-12">
            <div class="nav-tabs-custom">

                <ul class="nav nav-tabs">
                    <li style="margin-right: 0px; width:20%;" class="active"><a href="#activity" data-toggle="tab">طلبات اليوم</a></li>
                    <li style="margin-right: 0px; width:20%;"><a href="#activity1" data-toggle="tab">طلبات الاسبوع</a></li>
                    <li style="margin-right: 0px; width:20%;"><a href="#activity2" data-toggle="tab">طلبات الشهر</a></li>
                    <li style="margin-right: 0px; width:20%;"><a href="#activity3" data-toggle="tab">طلبات السنة</a></li>
                    <li style="margin-right: 0px; width:20%;"><a href="#activity4" data-toggle="tab">كل الطلبات</a></li>
                </ul>

                <div class="tab-content">

                    <div class="active tab-pane" id="activity">
                        <div class="box">
                            <h3 class="box-title">طلبات اليوم {{$nowday}} - {{$nowmonth}} - {{$nowyear}}</h3>
                            @if(count($itemorders) != 0)
                                <div class="table-responsive box-body">
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">رقم الطلب</th>
                                                <th style="text-align:center;">إجمالى الطلب</th>
                                                <th style="text-align:center;">تاريخ الطلب</th>
                                                <th style="text-align:center;">حالة الطلب</th>
                                                <th style="text-align:center;">مشاهدة</th>
                                                <th style="text-align:center;"> حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($itemorders  as $order)
                                            <?php
                                                $yearorders     = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->year;
                                                $monthorders    = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->month;
                                                $weekorders     = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->week;
                                                $dayorders      = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->day;
                                            ?>
                                            @if($dayorders == $nowday && $weekorders == $nowweek && $monthorders == $nowmonth && $yearorders == $nowyear)
                                                <tr>
                                                    <td style="text-align:center;">#{{$order->order_number}} </td>
                                                    <td style="text-align:center;">{{$order->total}} ريال</td>
                                                    <td style="text-align:center;">{{$order->created_at}} </td>
                                                    <td style="text-align:center;">
                                                        @if($order->status == 0)
                                                            <span style="border-radius: 3px;border: 1px solid green;color: orange;float:left;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">قيد الانتظار</span>
                                                        @elseif($order->status == 1)
                                                             <span style="border-radius: 3px;border: 1px solid green;color: springgreen;float:left;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">جارى التجهيز</span>
                                                        @elseif($order->status == 2)
                                                             <span style="border-radius: 3px;border: 1px solid #c22356;float:left;color:crimson;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">تم رفض الطلب</span>
                                                        @elseif($order->status == 3)
                                                             <span style="border-radius: 3px;border: 1px solid green;float:left;color:green;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">تم التسليم</span>
                                                        @elseif($order->status == 4)
                                                             <span style="border-radius: 3px;border: 1px solid #c22356;float:left;color:crimson;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">مرتجع</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <a href='{{asset("adminpanel/orders/".$order->id)}}' class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    </td style="text-align:center;">
                                                    <td style="text-align:center;">
                                                        {{ Form::open(array('method' => 'DELETE','id' => 'del'.$order->id,"onclick"=>"return confirm('هل انت متأكد ؟!')",'files' => true,'url' => array('adminpanel/orders/'.$order->id))) }}
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                                <?php
                                                    $daytotal += $order->total;
                                                ?>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="col-md-12">
                                        <h3>الاجمالى : <span style="color:#500253">{{$daytotal}}</span> ريال</h3>
                                    </div>
                                </div>
                            @else
                            <p> لا يوجد طلبات </p>
                            @endif
                        </div>
                    </div>

                    <div class="tab-pane" id="activity1">
                        <div class="box">
                            <h3 class="box-title">طلبات الاسبوع {{$nowweek}} - {{$nowmonth}} - {{$nowyear}}</h3>
                            @if(count($itemorders) != 0)
                                <div class="table-responsive box-body">
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">رقم الطلب</th>
                                                <th style="text-align:center;">إجمالى الطلب</th>
                                                <th style="text-align:center;">تاريخ الطلب</th>
                                                <th style="text-align:center;">حالة الطلب</th>
                                                <th style="text-align:center;">مشاهدة</th>
                                                <th style="text-align:center;"> حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($itemorders  as $order)
                                            <?php
                                                $yearorders     = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->year;
                                                $monthorders    = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->month;
                                                $weekorders     = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->week;
                                            ?>
                                            @if($weekorders == $nowweek && $monthorders == $nowmonth && $yearorders == $nowyear)
                                                <tr>
                                                    <td style="text-align:center;">#{{$order->order_number}} </td>
                                                    <td style="text-align:center;">{{$order->total}} ريال</td>
                                                    <td style="text-align:center;">{{$order->created_at}} </td>
                                                    <td style="text-align:center;">
                                                        @if($order->status == 0)
                                                            <span style="border-radius: 3px;border: 1px solid green;color: orange;float:left;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">قيد الانتظار</span>
                                                        @elseif($order->status == 1)
                                                             <span style="border-radius: 3px;border: 1px solid green;color: springgreen;float:left;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">جارى التجهيز</span>
                                                        @elseif($order->status == 2)
                                                             <span style="border-radius: 3px;border: 1px solid #c22356;float:left;color:crimson;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">تم رفض الطلب</span>
                                                        @elseif($order->status == 3)
                                                             <span style="border-radius: 3px;border: 1px solid green;float:left;color:green;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">تم التسليم</span>
                                                        @elseif($order->status == 4)
                                                        <span style="border-radius: 3px;border: 1px solid #c22356;float:left;color:crimson;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">مرتجع</span>
                                                        @endif
                                                    </td>

                                                    <td style="text-align:center;">
                                                        <a href='{{asset("adminpanel/orders/".$order->id)}}' class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    </td style="text-align:center;">
                                                    <td style="text-align:center;">
                                                        {{ Form::open(array('method' => 'DELETE','id' => 'del'.$order->id,"onclick"=>"return confirm('هل انت متأكد ؟!')",'files' => true,'url' => array('adminpanel/orders/'.$order->id))) }}
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                                <?php
                                                    $weektotal += $order->total;
                                                ?>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="col-md-12">
                                        <h3>الاجمالى : <span style="color:#500253">{{$weektotal}}</span> ريال</h3>
                                    </div>
                                </div>

                            @else
                            <p> لا يوجد طلبات </p>
                            @endif
                    </div>
                    </div>

                    <div class="tab-pane" id="activity2">
                        <div class="box">
                            <h3 class="box-title">طلبات الشهر {{$nowmonth}} - {{$nowyear}}</h3>
                            @if(count($itemorders) != 0)
                                <div class="table-responsive box-body">
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">رقم الطلب</th>
                                                <th style="text-align:center;">إجمالى الطلب</th>
                                                <th style="text-align:center;">تاريخ الطلب</th>
                                                <th style="text-align:center;">حالة الطلب</th>

                                                <th style="text-align:center;">مشاهدة</th>
                                                <th style="text-align:center;"> حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($itemorders  as $order)
                                            <?php
                                                $yearorders     = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->year;
                                                $monthorders    = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->month;
                                            ?>
                                            @if($monthorders == $nowmonth && $yearorders == $nowyear)
                                                <tr>
                                                    <td style="text-align:center;">#{{$order->order_number}} </td>
                                                    <td style="text-align:center;">{{$order->total}} ريال</td>
                                                    <td style="text-align:center;">{{$order->created_at}} </td>
                                                    <td style="text-align:center;">
                                                        @if($order->status == 0)
                                                            <span style="border-radius: 3px;border: 1px solid green;color: orange;float:left;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">قيد الانتظار</span>
                                                        @elseif($order->status == 1)
                                                             <span style="border-radius: 3px;border: 1px solid green;color: springgreen;float:left;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">جارى التجهيز</span>
                                                        @elseif($order->status == 2)
                                                             <span style="border-radius: 3px;border: 1px solid #c22356;float:left;color:crimson;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">تم رفض الطلب</span>
                                                        @elseif($order->status == 3)
                                                             <span style="border-radius: 3px;border: 1px solid green;float:left;color:green;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">تم التسليم</span>
                                                        @elseif($order->status == 4)
                                                            <span style="border-radius: 3px;border: 1px solid #c22356;float:left;color:crimson;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">مرتجع</span>
                                                        @endif
                                                    </td>

                                                    <td style="text-align:center;">
                                                        <a href='{{asset("adminpanel/orders/".$order->id)}}' class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    </td style="text-align:center;">
                                                    <td style="text-align:center;">
                                                        {{ Form::open(array('method' => 'DELETE','id' => 'del'.$order->id,"onclick"=>"return confirm('هل انت متأكد ؟!')",'files' => true,'url' => array('adminpanel/orders/'.$order->id))) }}
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                                <?php
                                                    $monthtotal += $order->total;
                                                ?>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="col-md-12">
                                        <h3>الاجمالى : <span style="color:#500253">{{$monthtotal}}</span> ريال</h3>
                                    </div>
                                </div>

                            @else
                            <p> لا يوجد طلبات </p>
                            @endif
                    </div>
                    </div>

                    <div class="tab-pane" id="activity3">
                        <div class="box">
                            <h3 class="box-title">طلبات السنة {{$nowyear}}</h3>
                            @if(count($itemorders) != 0)
                                <div class="table-responsive box-body">
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">رقم الطلب</th>
                                                <th style="text-align:center;">إجمالى الطلب</th>
                                                <th style="text-align:center;">تاريخ الطلب</th>
                                                <th style="text-align:center;">حالة الطلب</th>

                                                <th style="text-align:center;">مشاهدة</th>
                                                <th style="text-align:center;"> حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($itemorders  as $order)
                                            <?php
                                                $yearorders = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->year;
                                            ?>
                                            @if($yearorders == $nowyear)
                                                <tr>
                                                    <td style="text-align:center;">#{{$order->order_number}} </td>
                                                    <td style="text-align:center;">{{$order->total}} ريال</td>
                                                    <td style="text-align:center;">{{$order->created_at}} </td>
                                                    <td style="text-align:center;">
                                                        @if($order->status == 0)
                                                            <span style="border-radius: 3px;border: 1px solid green;color: orange;float:left;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">قيد الانتظار</span>
                                                        @elseif($order->status == 1)
                                                             <span style="border-radius: 3px;border: 1px solid green;color: springgreen;float:left;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">جارى التجهيز</span>
                                                        @elseif($order->status == 2)
                                                             <span style="border-radius: 3px;border: 1px solid #c22356;float:left;color:crimson;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">تم رفض الطلب</span>
                                                        @elseif($order->status == 3)
                                                             <span style="border-radius: 3px;border: 1px solid green;float:left;color:green;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">تم التسليم</span>
                                                        @elseif($order->status == 4)
                                                            <span style="border-radius: 3px;border: 1px solid #c22356;float:left;color:crimson;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">مرتجع</span>
                                                        @endif
                                                    </td>

                                                    <td style="text-align:center;">
                                                        <a href='{{asset("adminpanel/orders/".$order->id)}}' class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    </td style="text-align:center;">
                                                    <td style="text-align:center;">
                                                        {{ Form::open(array('method' => 'DELETE','id' => 'del'.$order->id,"onclick"=>"return confirm('هل انت متأكد ؟!')",'files' => true,'url' => array('adminpanel/orders/'.$order->id))) }}
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                                <?php
                                                    $yeartotal += $order->total;
                                                ?>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="col-md-12">
                                        <h3>الاجمالى : <span style="color:#500253">{{$yeartotal}}</span> ريال</h3>
                                    </div>
                                </div>

                            @else
                            <p> لا يوجد طلبات </p>
                            @endif
                    </div>
                    </div>

                    <div class="tab-pane" id="activity4">
                        <div class="box">
                            <h3 class="box-title">كل الطلبات</h3>
                            @if(count($itemorders) != 0)
                                <div class="table-responsive box-body">
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">رقم الطلب</th>
                                                <th style="text-align:center;">إجمالى الطلب</th>
                                                <th style="text-align:center;">تاريخ الطلب</th>
                                                <th style="text-align:center;">حالة الطلب</th>

                                                <th style="text-align:center;">مشاهدة</th>
                                                <th style="text-align:center;"> حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($itemorders  as $order)

                                                <tr>
                                                    <td style="text-align:center;">#{{$order->order_number}} </td>
                                                    <td style="text-align:center;">{{$order->total}} ريال</td>
                                                    <td style="text-align:center;">{{$order->created_at}} </td>
                                                    <td style="text-align:center;">
                                                        @if($order->status == 0)
                                                            <span style="border-radius: 3px;border: 1px solid green;color: orange;float:left;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">قيد الانتظار</span>
                                                        @elseif($order->status == 1)
                                                             <span style="border-radius: 3px;border: 1px solid green;color: springgreen;float:left;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">جارى التجهيز</span>
                                                        @elseif($order->status == 2)
                                                             <span style="border-radius: 3px;border: 1px solid #c22356;float:left;color:crimson;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">تم رفض الطلب</span>
                                                        @elseif($order->status == 3)
                                                             <span style="border-radius: 3px;border: 1px solid green;float:left;color:green;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">تم التسليم</span>
                                                        @elseif($order->status == 4)
                                                            <span style="border-radius: 3px;border: 1px solid #c22356;float:left;color:crimson;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">مرتجع</span>
                                                        @endif
                                                    </td>

                                                    <td style="text-align:center;">
                                                        <a href='{{asset("adminpanel/orders/".$order->id)}}' class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    </td style="text-align:center;">
                                                    <td style="text-align:center;">
                                                        {{ Form::open(array('method' => 'DELETE','id' => 'del'.$order->id,"onclick"=>"return confirm('هل انت متأكد ؟!')",'files' => true,'url' => array('adminpanel/orders/'.$order->id))) }}
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                                <?php
                                                    $mytotal += $order->total;
                                                ?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="col-md-12">
                                        <h3>الاجمالى : <span style="color:#500253">{{$mytotal}}</span> ريال</h3>
                                    </div>
                                </div>

                            @else
                            <p> لا يوجد طلبات </p>
                            @endif
                    </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection
