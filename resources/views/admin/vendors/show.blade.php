@extends('admin/include/master')
@section('title') لوحة التحكم | مشاهدة بيانات العضو @endsection
@section('content')  
<style>form{display: initial;} .location_details p {color: #f14635;}</style>
<section class="content">
    <div class="row">
    
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li style="margin-right: 0px; width:10%" class="active"><a href="#activity" data-toggle="tab"> بيانات العضو الشخصية </a></li>
                    <li style="margin-right: 0px; width:10%"><a href="#activity1"  data-toggle="tab">عناوينى</a></li>
                    <li style="margin-right: 0px; width:10%"><a href="#activity2"  data-toggle="tab">المشتريات والفواتير</a></li>
                    <li style="margin-right: 0px; width:10%"><a href="#activity4"  data-toggle="tab">المحفظة</a></li>
                    <li style="margin-right: 0px; width:10%"><a href="#activity5"  data-toggle="tab">كوبونات</a></li>
                    <li style="margin-right: 0px; width:7%"><a href="#activity6"   data-toggle="tab">هدايا</a></li>
                    <li style="margin-right: 0px; width:10%"><a href="#activity7"  data-toggle="tab">المفضلة</a></li>
                    <li style="margin-right: 0px; width:10%"><a href="#activity8"  data-toggle="tab">تقييمات</a></li>
                    <li style="margin-right: 0px; width:10%"><a href="#activity9"  data-toggle="tab">اقتراحات</a></li>
                    <li style="margin-right: 0px; width:10%"><a href="#activity10" data-toggle="tab">استرجاع</a></li>
                </ul>
                <div class="tab-content">

                    <div class="active tab-pane" id="activity">
                        <div class="box-body">
                            <div style="margin-top: 7%;" class="col-md-6">
                                
                                <div class="form-group col-md-12">
                                    <label>الاسم بالكامل</label>
                                    <input type="text" class="form-control" value="{{$showuser->name}}" readonly> 
                                </div>

                                <div class="form-group col-md-12">
                                    <label>البريد الإلكترونى</label>
                                    <input type="text" class="form-control" value="{{$showuser->email}}" readonly> 
                                </div>

                                <div class="form-group col-md-12">
                                    <label>رقم الجوال</label>
                                    <input type="text" class="form-control" value="{{$showuser->phone}}" readonly> 
                                </div>

                                <div class="form-group col-md-4">
                                    <label>الدولة</label>
                                    <input type="text" class="form-control" value="{{$usercountry ? $usercountry->name : '?????'}}" readonly> 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>المدينة</label>
                                    <input type="text" class="form-control" value="{{$usercity ? $usercity->name : '?????'}}" readonly> 
                                </div>
                                <div class="form-group col-md-4">
                                    <label>المنطقة</label>
                                    <input type="text" class="form-control" value="{{$userarea ? $userarea->name : '?????'}}" readonly> 
                                </div>
                            </div>

                            <div class="col-md-6">
                            
                            <h3 class="box-title" style="float:left;"> {{$showuser->name}}</h3>
                            
                                <h4 style="float:right;margin-top: 5%;">
                                    @if($showuser->suspensed == 0)
                                    غير معطل<span> <i class="fa fa-unlock text-success"></i> </span>
                                    @else 
                                    معطل<span> <i class="fa fa-lock text-danger"></i> </span>
                                    @endif 
                                </h4>
                                
                                <div class="col-md-12">
                                    @if($showuser->image == null)
                                    <img class="img-circle" style="width:100%; height:50%;" src="{{asset('users/images/default2.png')}}" alt="{{$showuser->name}}">
                                    @else 
                                    <img class="img-circle" style="width:100%; height:50%;" src="{{asset('users/images/'.$showuser->image)}}" alt="{{$showuser->name}}">
                                    @endif
                                </div>
                            </div>
                        </div>  
                    </div>

                    <div class="tab-pane" id="activity1">
                        <div class="box">  
                            <h3 class="box-title">عناوينى</h3>
                            @if(count($mylocations) != 0)
                                <div class="table-responsive box-body">
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">رقم الجوال</th>
                                                <th style="text-align:center;">بلد الإقامة</th>
                                                <th style="text-align:center;">المدينة</th>
                                                <th style="text-align:center;">المنطقة</th>
                                                <th style="text-align:center;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($mylocations  as $location)
                                            <?php
                                                $usercountry  = DB::table('country_areas')->where('id',$location->country)->first();
                                                $usercity     = DB::table('country_areas')->where('id',$location->city)->first();
                                                $userarea     = DB::table('country_areas')->where('id',$location->area)->first();
                                            ?>
                                            <tr>
                                                <td style="text-align:center;">{{$location->phone}} </td>
                                                <td style="text-align:center;">{{$usercountry ? $usercountry->name : '?????'}}</td>
                                                <td style="text-align:center;">{{$usercity    ? $usercity->name    : '?????'}}</td>
                                                <td style="text-align:center;">{{$userarea    ? $userarea->name    : '?????'}}</td>

                                                <td style="text-align:center;">
                                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default{{$location->id}}"><i class="fa fa-eye" aria-hidden="true"></i> مشاهدة</button>
                                                    {{ Form::open(array('method' => 'DELETE','id' => 'del'.$location->id,"onclick"=>"return confirm('هل انت متأكد ؟!')",'files' => true,'url' => array('adminpanel/users/'.$location->id))) }}
                                                        <input type="hidden" name="dellocation">
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-default{{$location->id}}" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">تفاصيل العنوان</h4>
                                                        <p>{{$location->created_at}}</p>
                                                    </div>
                                                    <div class="modal-body col-md-12 location_details">
                                                       
                                                        <div class="col-md-6">
                                                            <h5>الإسم :</h5>
                                                            <p>{{$location->name}}</p>
                                                            <h5>بلد الإقامة :</h5>
                                                            <p>{{$usercountry ? $usercountry->name : '?????'}}</p>
                                                            <h5>المدينة :</h5>
                                                            <p>{{$usercity    ? $usercity->name    : '?????'}}</p>
                                                            <h5>المنطقة :</h5>
                                                            <p>{{$userarea    ? $userarea->name    : '?????'}}</p>
                                                            <h5>اسم / رقم الشارع :</h5>
                                                            <p>{{$location->street}}</p>
                                                            <h5>اسم / رقم العمارة :</h5>
                                                            <p>{{$location->building}}</p>
                                                            <h5>رقم الطابق :</h5>
                                                            <p>{{$location->floor}}</p>
                                                            <h5>رقم الشقة :</h5>
                                                            <p>{{$location->flat}}</p>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <h5>رقم الجوال :</h5>
                                                            <p>{{$location->phone}}</p>
                                                            <h5> رقم هاتف بديل :</h5>
                                                            <p>{{$location->alternativephone}}</p>
                                                            <h5>اقرب معلم لديك :</h5>
                                                            <p>{{$location->placemark}}</p>
                                                            <h5>ملاحظات :</h5>
                                                            <p>{{$location->notes}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">اغلاق</button>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else 
                                <p> لا يوجد عناوين </p>
                            @endif 
                        </div>
                    </div>
            
                    <div class="tab-pane" id="activity2">
                        <div class="box">  
                            <h3 class="box-title">المشتريات</h3>
                            @if(count($myorders) != 0)
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
                                        @foreach($myorders  as $order)
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
                                            <?php $mytotal += $order->total; ?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="col-md-12">
                                        <h3>الاجمالى : <span style="color:#500253">{{$mytotal}}</span> ريال</h3>
                                    </div>  
                                </div>
                            @else 
                            <p> لا يوجد مشتريات </p>
                            @endif 
                        </div> 
                    </div>

                    <div class="tab-pane" id="activity3">
                        <div class="box">  
                            <h3 class="box-title">الفواتير</h3>
                            @if(count($myorders) != 0)
                                <div class="table-responsive box-body">
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">رقم الفاتورة</th>
                                                <th style="text-align:center;">إجمالى الفاتورة</th>
                                                <th style="text-align:center;">تاريخ الفاتورة</th>
                                                <th style="text-align:center;">حالة الفاتورة</th>
                                                <th style="text-align:center;">مشاهدة</th>
                                                <th style="text-align:center;"> حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($myorders  as $order)
                                            <tr>
                                                <td style="text-align:center;">#{{$order->order_number}} </td>
                                                <td style="text-align:center;">{{$order->total}} ريال</td>
                                                <td style="text-align:center;">{{$order->created_at}} </td>
                                                <td style="text-align:center;"> 
                                                    @if($order->paid == 0)   
                                                            <span style="border-radius: 3px;border: 1px solid #c22356;float:left;color:crimson;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">غير مفعلة</span>
                                                    @elseif($order->paid == 1)   
                                                            <span style="border-radius: 3px;border: 1px solid green;float:left;color:green;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">مفعلة</span>
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
                                            <?php $mytotal += $order->total; ?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="col-md-12">
                                        <h3>الاجمالى : <span style="color:#500253">{{$mytotal}}</span> ريال</h3>
                                    </div>  
                                </div>
                            @else 
                            <p> لا يوجد فواتير </p>
                            @endif 
                        </div>  
                    </div>

                    <div class="tab-pane" id="activity4">
                        <div class="box">  
                            <h3 class="box-title">المحفظة</h3>

                            <div class="row">

                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <div class="box box-info">

                                        <div class="box-header with-border">
                                            <h3 class="box-title">إيداع مبلغ إلى المحفظة</h3>
                                        </div>

                                        {!! Form::open(array('method' => 'patch','class' => 'form-horizontal','files' => true,'url' =>'adminpanel/users/'.$showuser->id)) !!}
                                            <div class="box-body">
                                                <div class="form-group">
                                                    <div class="col-sm-10">
                                                        <input type="number" name="deposite" required class="form-control" placeholder="أدخل قيمة الإيداع">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                <button type="submit" style="width: 25%;" class="btn btn-info pull-right">حفظ</button>
                                            </div>
                                        {!! Form::close() !!}

                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box bg-green">
                                        <span class="info-box-icon">
                                            <img style="" src="{{asset('admin/dist/img/wallet.png')}}" alt="deposit">
                                        </span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">المحفظة</span>
                                            <span class="info-box-number">SAR {{$showuser->wallet}} </span>

                                            <div class="progress">
                                                <div class="progress-bar" style="width: {{ $userdepositesar != 0 ? ($showuser->wallet * 100)/$userdepositesar : '0' }}%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box bg-green">
                                        <span class="info-box-icon">
                                            <img style="" src="{{asset('admin/dist/img/deposit.png')}}" alt="deposit">
                                        </span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">إيداع</span>
                                            <span class="info-box-number">SAR {{$userdepositesar}} </span>

                                            <div class="progress">
                                                <div class="progress-bar" style="width: 100%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box bg-red">
                                        <span class="info-box-icon">
                                            <img style="" src="{{asset('admin/dist/img/Withdrawal.png')}}" alt="Withdrawal">
                                        </span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">سحب</span>
                                            <span class="info-box-number">SAR {{$userwithdrawsar}} </span>

                                            <div class="progress">
                                                <div class="progress-bar" style="width: {{ $userdepositesar != 0 ? ($userwithdrawsar * 100)/$userdepositesar : '0' }}%"></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="info-box bg-yellow">
                                        <span class="info-box-icon">
                                            <img style="" src="{{asset('admin/dist/img/recovery.png')}}" alt="Withdrawal">
                                        </span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">إسترجاع</span>
                                            <span class="info-box-number">SAR {{$userrecoverysar}} </span>

                                            <div class="progress">
                                                <div class="progress-bar" style="width: {{ $userdepositesar != 0 ? ($userrecoverysar * 100)/$userdepositesar : '0' }}%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="table-responsive box box-success">
                                        @if($userdeposites->count() != 0)
                                            <table id="example3" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center;">مبلغ الإيداع</th>
                                                        <th style="text-align:center;">تاريخ الإيداع</th>
                                                    </tr>
                                                </thead>
                                        
                                                <tbody> 
                                                    @foreach($userdeposites as $deposite)
                                                        <tr>
                                                            <td style="text-align:center;">{{$deposite->value}} SAR</td>
                                                            <td style="text-align:center;">{{$deposite->created_at}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody> 
                                            </table>
                                        @else 
                                            <p class="text-center">لا يوجد عمليات إيداع حاليا</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="table-responsive box box-danger">
                                        @if($userwithdraws->count() != 0)
                                            <table id="example3" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center;">مبلغ السحب</th>
                                                        <th style="text-align:center;">تاريخ السحب</th>
                                                    </tr>
                                                </thead>
                                        
                                                <tbody> 
                                                    @foreach($userwithdraws as $withdraw)
                                                        <tr>
                                                            <td style="text-align:center;">{{$withdraw->value}} SAR</td>
                                                            <td style="text-align:center;">{{$withdraw->created_at}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody> 
                                            </table>
                                        @else 
                                            <p class="text-center">لا يوجد عمليات سحب حاليا</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="table-responsive box box-warning">
                                        @if($userrecoveries->count() != 0)
                                            <table id="example3" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center;">مبلغ الإسترجاع</th>
                                                        <th style="text-align:center;">تاريخ الإسترجاع</th>
                                                    </tr>
                                                </thead>
                                        
                                                <tbody> 
                                                    @foreach($userrecoveries as $recovery)
                                                        <tr>
                                                            <td style="text-align:center;">{{$recovery->value}} SAR</td>
                                                            <td style="text-align:center;">{{$recovery->created_at}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody> 
                                            </table>
                                        @else 
                                            <p class="text-center">لا يوجد عمليات استرجاع حاليا</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane" id="activity5">
                        <div class="box">  
                            <h3 class="box-title">كوبونات</h3>
                        </div>
                    </div>

                    <div class="tab-pane" id="activity6">
                        <div class="box">  
                            <h3 class="box-title">هدايا</h3>
                        </div>
                    </div>

                    <div class="tab-pane" id="activity7">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">المفضلة</h3>
                            </div>
                            
                            @if($myfavourites->count() != 0)
                                <div class="table-responsive box-body">
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;"> اسم المنتج</th>
                                                <th style="text-align:center;"> الفئة</th>
                                                <th style="text-align:center;">السعر [ريال]</th>
                                                <th style="text-align:center;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($myfavourites  as $favourite)
                                                <?php 
                                                    $item         = DB::table('items')->where('id',$favourite->item_id)->first();  
                                                    $itemcategory = DB::table('categories')->where('id',$favourite->item_id)->first();
                                                ?>
                                                <tr>
                                                    <td style="text-align:center;">{{$item->artitle}}</td>
                                                    <td style="text-align:center;">{{$itemcategory ? $itemcategory->arcategory : '?????'}} </td>
                                                    <td style="text-align:center;">{{$item->price}}</td>
                                                    <td style="text-align:center;">
                                                        <a href='{{asset("adminpanel/items/".$item->id)}}' class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> مشاهدة</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>  
                            @else  
                                <p>لا يوجد منتجات ف المفضلة</p>
                            @endif 

                        </div>
                    </div>

                    <div class="tab-pane" id="activity8">
                        <div class="box">  
                            <h3 class="box-title">تقييمات</h3>

                            <div class="box-body">
                                <ul class="products-list product-list-in-box">
                                    @if(count($myrates) != 0)
                                        @foreach($myrates as $comm) 
                                            <?php 
                                                $commitem  = DB::table('items')->where('id',$comm->item_id)->first(); 
                                                $itemimage = DB::table('item_images')->where('item_id',$comm->item_id)->first(); 
                                            ?>
                                            <li class="item">
                                                <div class="product-img pull-right">
                                                    @if($itemimage)
                                                       <img src="{{asset('users/images/'.$itemimage->image)}}" alt="{{$commitem->artitle}}">
                                                    @else 
                                                        <img src="{{asset('admin/dist/img/default-50x50.gif')}}" alt="Product Image">
                                                    @endif
                                                </div>

                                                <div class="product-info">
                                                    <a href="{{asset('adminpanel/items/'.$commitem->id)}}" class="product-title">{{ $commitem ? $commitem->artitle : '?????'}}</a>
                                                
                                                    <span style="padding: 5px;" class="label label-warning pull-left">@if($comm->rate == 1 || $comm->rate > 1) <i class="fa fa-star"></i> @endif</span>
                                                    <span style="padding: 5px;" class="label label-warning pull-left">@if($comm->rate == 2 || $comm->rate > 2) <i class="fa fa-star"></i> @endif</span>
                                                    <span style="padding: 5px;" class="label label-warning pull-left">@if($comm->rate == 3 || $comm->rate > 3) <i class="fa fa-star"></i> @endif</span>
                                                    <span style="padding: 5px;" class="label label-warning pull-left">@if($comm->rate == 4 || $comm->rate > 4) <i class="fa fa-star"></i> @endif</span>
                                                    <span style="padding: 5px;" class="label label-warning pull-left">@if($comm->rate == 5) <i class="fa fa-star"></i> @endif</span>
                                                    
                                                    <span style="padding: 1%;" class="product-description">{{$comm->comment}}</span>

                                                    {{ Form::open(array('method' => 'DELETE',"onclick"=>"return confirm('هل انت متأكد ؟!')",'files' => true,'url' => array('adminpanel/users/'.$comm->id))) }}
                                                        <input type="hidden" name="delrate" >
                                                        <button style="width: 10%;" type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف </button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </li>
                                        @endforeach
                                    @else 
                                        <p>لا يوجد تقييمات حاليا </p>
                                    @endif
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane" id="activity9">
                        <div class="box">  
                            <h3 class="box-title">اقتراحات</h3>

                            <div class="box-body">
                                <ul class="products-list product-list-in-box">
                                    @if(count($mysuggetions) != 0)
                                        @foreach($mysuggetions as $suggetion) 
                                            <li class="item">
                                                <div class="product-info">
                                                    <p class="product-title">{{ $suggetion->subject }}</p>
                                                    <span style="padding: 5px;" class="label label-warning pull-left">{{$suggetion->created_at}}</span>
                                                    <span style="padding: 1%;" class="product-description">{{$suggetion->suggestion}}</span>
                                                    {{ Form::open(array('method' => 'DELETE',"onclick"=>"return confirm('هل انت متأكد ؟!')",'files' => true,'url' => array('adminpanel/users/'.$suggetion->id))) }}
                                                        <input type="hidden" name="delsuggetion">
                                                        <button style="width: 10%;" type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف </button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </li>
                                        @endforeach
                                    @else 
                                        <p>لا يوجد اقتراحات حاليا </p>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="activity10">
                        <div class="box">  
                            <h3 class="box-title">استرجاع</h3>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</section> 

@endsection