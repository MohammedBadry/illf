@extends('admin.include.master')
@section('title') لوحة التحكم | الدول والمدن @endsection
@section('content')
<style>
form{display: initial;}
th{text-align:center;}
</style>
    <section class="content">
            <div class="row">
            <div class="col-md-12">
            <div class="box-header">
                    <h3 class="box-title">اضافة الدولة</h3>
                </div>
                    <div class="box ">
                        {{ Form::open(array('method' => 'POST','files' => true,'url' =>'adminpanel/countries' )) }}
                            <input type="hidden" name="addcountry">
                            <div class="box-body">

                                <div class="form-group col-md-6">
                                    <label>اسم الدولة باللغة العربية</label>
                                    <input type="text" class="form-control" required="required" name="name" value="{{ Request::old('name') }}">
                                    @if ($errors->has('name'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>

                                <div class="form-group col-md-6">
                                    <label>اسم الدولة باللغة الانجليزية</label>
                                    <input type="text" class="form-control" required="required" name="enname" value="{{ Request::old('enname') }}">
                                    @if ($errors->has('enname'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('enname') }}</div>
                                    @endif
                                </div>

                            <div style="padding: 24px;" class="box-footer col-md-offset-4 col-md-4">
                                <button type="submit" class="btn btn-primary col-md-12">إضافة</button>
                            </div>
                        {!! Form::close() !!}
                        </div>
                    </div> 
            </div>
            </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
            <div class="box">
                <div class="table-responsive box-body">
                    <table  class="table table-bordered">
                        <thead>
                            <tr>
                                <th>اسم الدولة بالعربية</th>
                                <th>اسم الدولة بالانجليزية</th>
                                <th></th>
                            </tr>   
                        </thead>
                        <tbody>
                        @foreach($allareas as $area)
                        <tr>
                            <th>{{ $area->name }}</th>
                            <th>{{ $area->enname }}</th>
                            <th>
                                <a href='{{asset("adminpanel/countries/".$area->id."/edit")}}' class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</a>
                                {{ Form::open(array('method' => 'patch',"onclick"=>"return confirm('هل انت متاكد ؟!')",'files' => true,'url' =>'adminpanel/countries/'.$area->id )) }}
                                        <input type="hidden" name="suspensed" >
                                        <button type="submit" class="btn btn-default">
                                        @if($area->suspensed == 1) 
                                        <i style="color:crimson" class="fa fa-lock" aria-hidden="true"></i> تفعيل
                                        @else 
                                        <i style="color:#1FAB89" class="fa fa-unlock" aria-hidden="true"></i> تعطيل
                                        @endif
                                        </button>
                                {!! Form::close() !!}
                                <a href="{{asset('adminpanel/countries/'.$area->id)}}" style="margin-bottom: 0em;" class="btn  btn-info"><i class="fa fa-eye" aria-hidden="true" fa-2x></i>  مشاهدة المدن</a>
                                {!!Form::open(['url' => "adminpanel/countries/$area->id",'id' => 'delcountry'.$area->id,"method"=>"DELETE","onclick"=>"return confirm('هل انت متاكد؟!')"])!!}
                                    <input type="hidden" name="delcountry">
                                    <button form="delcountry{{$area->id}}" type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true" fa-2x></i> حذف</button>
                                {!! Form::close() !!} 
                            </th>   
                        </tr>
                        @endforeach 
                        </tbody>
                    </table>
                </div>        
            </div>
        </div>
        </div>
    </section>


@endsection