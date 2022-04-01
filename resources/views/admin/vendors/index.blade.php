@extends('admin/include/master')
@section('title') لوحة التحكم | الطلبات الجديدة @endsection
@section('content')
<style>form{display: initial;}</style>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            
            <div class="box-header with-border">
                <h3 class="box-title">كل الطلبات الجديدة</h3>
            </div>   

            <div class="active tab-pane" id="activity">
                <div class="table-responsive box-body">
                    @if($allvendors->count() != 0)
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">اسم الشركة</th>
                                    <th style="text-align:center;">الاسم بالكامل</th>
                                    <th style="text-align:center;">البريد الألكترونى</th>
                                    <th style="text-align:center;">رقم الجوال</th>
                                    <th style="text-align:center;"></th>
                                </tr>
                            </thead>
                    
                            <tbody> 
                                @foreach($allvendors as $user)
                                    <tr>
                                        <td style="text-align:center;">{{$user->company}}</td>
                                        <td style="text-align:center;">{{$user->name}}</td>
                                        <td style="text-align:center;">{{$user->email}}</td>
                                        <td style="text-align:center;">{{$user->phone}}</td>
                                        <td style="text-align:center;">
                                            {{ Form::open(array('method' => 'patch',"onclick"=>"return confirm('هل انت متاكد ؟!')",'files' => true,'url' =>'adminpanel/vendors/'.$user->id )) }}
                                                <input type="hidden" name="accept" >
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-check" aria-hidden="true"></i> قبول
                                                </button>
                                            {!! Form::close() !!}
                                            <a href='{{asset("adminpanel/vendors/".$user->id)}}' class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> مشاهدة</a>
                                            <a href='{{asset("adminpanel/vendors/".$user->id."/edit")}}' class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  تعديل</a>
                                            {{ Form::open(array('method' => 'DELETE','id' => 'del'.$user->id,"onclick"=>"return confirm('هل انت متأكد ؟!')",'files' => true,'url' => array('adminpanel/vendors/'.$user->id))) }}
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody> 
                        </table>
                    @else 
                        <p class="text-center">لا يوجد طلبات حاليا</p>
                    @endif
                </div>
            </div>
            </div>    
        </div>
        </div>
    </div>
</section>

@endsection
