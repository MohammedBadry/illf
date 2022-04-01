@extends('admin/include/master')
@section('title') لوحة التحكم |  الفواتير @endsection
@section('content')
<?php 
    use Carbon\Carbon; 
    use App\member;
?>
<section class="content"> 
    <div class="row">
       <div class="col-md-12">
            <div class="nav-tabs-custom">

                <ul class="nav nav-tabs">
                    <li style="margin-right: 0px; width:20%;" class="active"><a href="#activity" data-toggle="tab">فواتير اليوم</a></li>
                    <li style="margin-right: 0px; width:20%;"><a href="#activity1" data-toggle="tab">فواتير الاسبوع</a></li>
                    <li style="margin-right: 0px; width:20%;"><a href="#activity2" data-toggle="tab">فواتير الشهر</a></li>
                    <li style="margin-right: 0px; width:20%;"><a href="#activity3" data-toggle="tab">فواتير السنة</a></li>
                    <li style="margin-right: 0px; width:20%;"><a href="#activity4" data-toggle="tab">كل الفواتير</a></li>
                </ul>
                
                <div class="tab-content">

                    <div class="active tab-pane" id="activity">
                        <div class="box">  
                            <h3 class="box-title">فواتير اليوم {{$nowday}} - {{$nowmonth}} - {{$nowyear}}</h3>
                            @if(count($itemorders) != 0)
                                <div class="table-responsive box-body">
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">الصورة</th>
                                                <th style="text-align:center;">رقم الفاتورة</th>
                                                <th style="text-align:center;">اسم العميل</th>
                                                <th style="text-align:center;">رقم الجوال</th>
                                                <th style="text-align:center;">إجمالى الفاتورة</th>
                                                <th style="text-align:center;">حالة الفاتورة</th>
                                                <th style="text-align:center;">مشاهدة</th>
                                                <th style="text-align:center;"> حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($itemorders  as $order)
                                                <?php 
                                                    $userinfo       = member::where('id',$order->user_id)->first();
                                                    $yearorders     = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->year;
                                                    $monthorders    = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->month;
                                                    $weekorders     = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->week;
                                                    $dayorders      = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->day;
                                                ?>
                                                @if($dayorders == $nowday && $weekorders == $nowweek && $monthorders == $nowmonth && $yearorders == $nowyear)
                                                    <tr>
                                                        <td style="text-align:center;"><img style="width:100px;height:100px;" src="{{asset('users/images/'.$logo)}}" alt=""></td>
                                                        <td style="text-align:center;">#{{$order->order_number}} </td>
                                                        <td style="text-align:center;">{{$userinfo->name}}</td>
                                                        <td style="text-align:center;">{{$userinfo->phone}}</td>
                                                        <td style="text-align:center;">{{$order->total}} ريال</td>

                                                        <td style="text-align:center;">
                                                            @if($order->paid == 0) 
                                                                {{ Form::open(array('method' => 'patch',"onclick"=>"return confirm('هل انت متاكد ؟!')",'files' => true,'url' =>'adminpanel/bills/'.$order->id )) }}
                                                                        <input type="hidden" name="confirm" >
                                                                        <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>تفعيل</button>
                                                                {!! Form::close() !!}
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
                                                <th style="text-align:center;">الصورة</th>
                                                <th style="text-align:center;">رقم الفاتورة</th>
                                                <th style="text-align:center;">اسم العميل</th>
                                                <th style="text-align:center;">رقم الجوال</th>
                                                <th style="text-align:center;">إجمالى الفاتورة</th>
                                                <th style="text-align:center;">حالة الفاتورة</th>
                                                <th style="text-align:center;">مشاهدة</th>
                                                <th style="text-align:center;"> حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($itemorders  as $order)
                                            <?php 
                                                $userinfo       = member::where('id',$order->user_id)->first();
                                                $yearorders     = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->year;
                                                $monthorders    = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->month;
                                                $weekorders     = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->week;
                                            ?>
                                            @if($weekorders == $nowweek && $monthorders == $nowmonth && $yearorders == $nowyear)
                                                <tr>
                                                    <td style="text-align:center;"><img style="width:100px;height:100px;" src="{{asset('users/images/'.$logo)}}" alt=""></td>
                                                    <td style="text-align:center;">#{{$order->order_number}} </td>
                                                    <td style="text-align:center;">{{$userinfo->name}}</td>
                                                    <td style="text-align:center;">{{$userinfo->phone}}</td>
                                                    <td style="text-align:center;">{{$order->total}} ريال</td>

                                                    <td style="text-align:center;">
                                                        @if($order->paid == 0) 
                                                            {{ Form::open(array('method' => 'patch',"onclick"=>"return confirm('هل انت متاكد ؟!')",'files' => true,'url' =>'adminpanel/bills/'.$order->id )) }}
                                                                    <input type="hidden" name="confirm" >
                                                                    <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>تفعيل</button>
                                                            {!! Form::close() !!}
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
                                                <th style="text-align:center;">الصورة</th>
                                                <th style="text-align:center;">رقم الفاتورة</th>
                                                <th style="text-align:center;">اسم العميل</th>
                                                <th style="text-align:center;">رقم الجوال</th>
                                                <th style="text-align:center;">إجمالى الفاتورة</th>
                                                <th style="text-align:center;">حالة الفاتورة</th>
                                                <th style="text-align:center;">مشاهدة</th>
                                                <th style="text-align:center;"> حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($itemorders  as $order)
                                            <?php 
                                                $userinfo       = member::where('id',$order->user_id)->first();
                                                $yearorders     = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->year;
                                                $monthorders    = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->month;
                                            ?>
                                            @if($monthorders == $nowmonth && $yearorders == $nowyear)
                                                <tr>
                                                    <td style="text-align:center;"><img style="width:100px;height:100px;" src="{{asset('users/images/'.$logo)}}" alt=""></td>
                                                    <td style="text-align:center;">#{{$order->order_number}} </td>
                                                    <td style="text-align:center;">{{$userinfo->name}}</td>
                                                    <td style="text-align:center;">{{$userinfo->phone}}</td>
                                                    <td style="text-align:center;">{{$order->total}} ريال</td>

                                                    <td style="text-align:center;">
                                                        @if($order->paid == 0) 
                                                            {{ Form::open(array('method' => 'patch',"onclick"=>"return confirm('هل انت متاكد ؟!')",'files' => true,'url' =>'adminpanel/bills/'.$order->id )) }}
                                                                    <input type="hidden" name="confirm" >
                                                                    <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>تفعيل</button>
                                                            {!! Form::close() !!}
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
                                                <th style="text-align:center;">الصورة</th>
                                                <th style="text-align:center;">رقم الفاتورة</th>
                                                <th style="text-align:center;">اسم العميل</th>
                                                <th style="text-align:center;">رقم الجوال</th>
                                                <th style="text-align:center;">إجمالى الفاتورة</th>
                                                <th style="text-align:center;">حالة الفاتورة</th>
                                                <th style="text-align:center;">مشاهدة</th>
                                                <th style="text-align:center;"> حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($itemorders  as $order)
                                            <?php 
                                                $userinfo       = member::where('id',$order->user_id)->first();
                                                $yearorders = Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)->year;
                                            ?>
                                            @if($yearorders == $nowyear)
                                                <tr>
                                                    <td style="text-align:center;"><img style="width:100px;height:100px;" src="{{asset('users/images/'.$logo)}}" alt=""></td>
                                                    <td style="text-align:center;">#{{$order->order_number}} </td>
                                                    <td style="text-align:center;">{{$userinfo->name}}</td>
                                                    <td style="text-align:center;">{{$userinfo->phone}}</td>
                                                    <td style="text-align:center;">{{$order->total}} ريال</td>

                                                    <td style="text-align:center;">
                                                        @if($order->paid == 0) 
                                                            {{ Form::open(array('method' => 'patch',"onclick"=>"return confirm('هل انت متاكد ؟!')",'files' => true,'url' =>'adminpanel/bills/'.$order->id )) }}
                                                                    <input type="hidden" name="confirm" >
                                                                    <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>تفعيل</button>
                                                            {!! Form::close() !!}
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
                            <?php 
                              $userinfo       = member::where('id',$order->user_id)->first();
                            ?>
                                <div class="table-responsive box-body">
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">الصورة</th>
                                                <th style="text-align:center;">رقم الفاتورة</th>
                                                <th style="text-align:center;">اسم العميل</th>
                                                <th style="text-align:center;">رقم الجوال</th>
                                                <th style="text-align:center;">إجمالى الفاتورة</th>
                                                <th style="text-align:center;">حالة الفاتورة</th>
                                                <th style="text-align:center;">مشاهدة</th>
                                                <th style="text-align:center;"> حذف</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($itemorders  as $order)
                                            
                                                <tr>
                                                    <td style="text-align:center;"><img style="width:100px;height:100px;" src="{{asset('users/images/'.$logo)}}" alt=""></td>
                                                    <td style="text-align:center;">#{{$order->order_number}} </td>
                                                    <td style="text-align:center;">{{$userinfo->name}}</td>
                                                    <td style="text-align:center;">{{$userinfo->phone}}</td>
                                                    <td style="text-align:center;">{{$order->total}} ريال</td>

                                                    <td style="text-align:center;">
                                                        @if($order->paid == 0) 
                                                            {{ Form::open(array('method' => 'patch',"onclick"=>"return confirm('هل انت متاكد ؟!')",'files' => true,'url' =>'adminpanel/bills/'.$order->id )) }}
                                                                    <input type="hidden" name="confirm" >
                                                                    <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>تفعيل</button>
                                                            {!! Form::close() !!}
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