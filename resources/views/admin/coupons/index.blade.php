@extends('admin/include/master')
@section('title') لوحة التحكم |  كوبونات الخصم   @endsection
@section('content')
<style>form{display: initial;}</style>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">كل كوبونات الخصم</h3>
                    <button style="float:left" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-addclass"><i class="fa fa-plus" aria-hidden="true"></i> إضافة كوبون الخصم جديد</button>
                </div>

                <div class="modal fade" id="modal-addclass" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">إضافة كوبون الخصم جديد  </h4>
                        </div>
                        <div class="modal-body">
                            {{ Form::open(array('method' => 'POST','files'=>true,'url' => 'adminpanel/coupons')) }}

                                <div class="form-group col-md-12">
                                    <label>كود الكوبون</label>
                                    <div class="form-group col-md-12">
                                        <input style="width:100%;" type="text" class="form-control" name="code" placeholder="كود الكوبون" value="{{old('code')}}" required>
                                        @if ($errors->has('code'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('code') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>قيمة الخصم بالريال</label>
                                    <div class="form-group col-md-12">
                                        <input style="width:100%;" type="text" class="form-control" name="value" placeholder="قيمة الخصم بالريال" value="{{old('value')}}" required>
                                        @if ($errors->has('value'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('value') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>تاريخ انتهاء الكوبون</label>
                                    <div class="form-group col-md-12">
                                        <input style="width:100%;" type="text" class="form-control datepicker" name="expire_date" placeholder="تاريخ انتهاء الكوبون" value="" autocomplete="off" required>
                                        @if ($errors->has('expire_date'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('expire_date') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>حالة الكوبون</label>
                                    <select class="form-control"  name="status" required>
                                        <option value="1">مفعل</option>
                                        <option value="0">غير مفعل</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('status') }}</div>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary col-md-offset-4 col-md-4">اضافة</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">اغلاق</button>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="active tab-pane" id="activity">
                    <div class="table-responsive box-body">
                        <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;">كود الكوبون</th>
                                        <th style="text-align:center;">قيمة الخصم بالريال</th>
                                        <th style="text-align:center;">تاريخ انتهاء الكوبون</th>
                                        <th style="text-align:center;">حالة الكوبون</th>
                                        <th style="text-align:center;"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($allcoupons as $coupon)
                                        <tr>
                                            <td style="text-align:center;">{{$coupon->code}}</td>
                                            <td style="text-align:center;">{{$coupon->value}} ريال</td>
                                            <td style="text-align:center;">{{$coupon->expire_date}}</td>
                                            <td style="text-align:center;">{{$coupon->status==1 ? 'مفعل' : 'غير مفعل'}}</td>
                                            <td style="text-align:center;">
                                                <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modal-upclass{{$coupon->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button>
                                                {{ Form::open(array('method' => 'DELETE',"onclick"=>"return confirm('هل انت متأكد ؟!')",'files' => true,'url' => array('adminpanel/coupons/'.$coupon->id))) }}
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="modal-upclass{{$coupon->id}}" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">تعديل  الكوبون الخصم</h4>
                                                </div>
                                                <div class="modal-body">
                                                    {{ Form::open(array('method' => 'patch','files'=>true,'url' => 'adminpanel/coupons/'.$coupon->id )) }}

                                                        <div class="form-group col-md-12">
                                                            <label>كود الكوبون</label>
                                                            <div class="form-group col-md-12">
                                                                <input style="width:100%;" type="text" class="form-control" name="code" placeholder="كود الكوبون" value="{{$coupon->code}}" required>
                                                                @if ($errors->has('code'))
                                                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('code') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label>قيمة الخصم بالريال</label>
                                                            <div class="form-group col-md-12">
                                                                <input style="width:100%;" type="text" class="form-control" name="value" placeholder="قيمة الخصم بالريال" value="{{$coupon->value}}" required>
                                                                @if ($errors->has('value'))
                                                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('value') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label>تاريخ انتهاء الكوبون</label>
                                                            <div class="form-group col-md-12">
                                                                <input style="width:100%;" type="text" class="form-control datepicker" name="expire_date" placeholder="تاريخ انتهاء الكوبون" value="{{$coupon->expire_date}}" autocomplete="off" required>
                                                                @if ($errors->has('expire_date'))
                                                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('expire_date') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label>حالة الكوبون</label>
                                                            <select class="form-control"  name="status" required>
                                                                <option value="1" @if($coupon->status == 1) selected @endif>مفعل</option>
                                                                <option value="0" @if($coupon->status == 0) selected @endif>غير مفعل</option>
                                                            </select>
                                                            @if ($errors->has('status'))
                                                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('status') }}</div>
                                                            @endif
                                                        </div>

                                                        <button type="submit" class="btn btn-primary col-md-offset-4 col-md-4">تعديل</button>
                                                    {!! Form::close() !!}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">اغلاق</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
