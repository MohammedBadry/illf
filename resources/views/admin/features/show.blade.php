@extends('admin/include/master')
@section('title') لوحة التحكم |  {{$showfeature->arname}} - المواصفات الفرعية   @endsection
@section('content')
<style>form{display: initial;}</style>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">   
                
                <div class="box-header with-border">
                    <h3 class="box-title"> <a href="{{asset('adminpanel/features')}}"> {{$showfeature->arname}} </a> - المواصفات الفرعية</h3>
                    <button style="float:left" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-addclass"><i class="fa fa-plus" aria-hidden="true"></i> إضافة مواصفة فرعية جديدة</button>
                </div>
                
                <div class="modal fade" id="modal-addclass" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">إضافة مواصفة فرعية جديدة  </h4>
                        </div>
                        <div class="modal-body">
                            {{ Form::open(array('method' => 'POST','files'=>true,'url' => 'adminpanel/features')) }}
                                <input type="hidden" name="parent" value="{{$showfeature->id}}">
                                <div class="form-group col-md-12">
                                    <label>اسم المواصفة باللغة العربية</label>
                                    <div class="form-group col-md-12">
                                        <input style="width:100%;" type="text" class="form-control" name="arname" placeholder="اسم المواصفة باللغة العربية" value="{{old('arname')}}" required>
                                        @if ($errors->has('arname'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('arname') }}</div>
                                        @endif
                                    </div>  
                                </div>  

                                <div class="form-group col-md-12">
                                    <label>اسم المواصفة باللغة الانجليزية</label>
                                    <div class="form-group col-md-12">
                                        <input style="width:100%;" type="text" class="form-control" name="enname" placeholder="اسم المواصفة باللغة الانجليزية" value="{{old('enname')}}" required>
                                        @if ($errors->has('enname'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('enname') }}</div>
                                        @endif
                                    </div>  
                                </div>

                                <div class="form-group col-md-12">
                                    <label>اللون</label>
                                    <div class="form-group col-md-12">
                                        <input style="width:100%;" type="color" class="form-control" name="value" value="{{old('value')}}">
                                        @if ($errors->has('value'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('value') }}</div>
                                        @endif
                                    </div>  
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
                                        <th style="text-align:center;">المواصفة</th>
                                        <th style="text-align:center;"></th>
                                    </tr>
                                </thead>
                        
                                <tbody> 
                                    @foreach($subfeatures as $feature)
                                        <tr>
                                            <td style="text-align:center;">{{$feature->arname}}</td>
                                            <td style="text-align:center;">
                                                <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modal-upclass{{$feature->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button>
                                                {{ Form::open(array('method' => 'DELETE',"onclick"=>"return confirm('هل انت متأكد ؟!')",'files' => true,'url' => array('adminpanel/features/'.$feature->id))) }}
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="modal-upclass{{$feature->id}}" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">تعديل  المواصفة</h4>
                                                </div>
                                                <div class="modal-body">
                                                    {{ Form::open(array('method' => 'patch','files'=>true,'url' => 'adminpanel/features/'.$feature->id )) }}
                                                        
                                                        <div class="form-group col-md-12">
                                                            <label>اسم المواصفة باللغة العربية</label>
                                                            <div class="form-group col-md-12">
                                                                <input style="width:100%;" type="text" class="form-control" name="arname" placeholder="اسم المواصفة باللغة العربية" value="{{$feature->arname}}" required>
                                                                @if ($errors->has('arname'))
                                                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('arname') }}</div>
                                                                @endif
                                                            </div>  
                                                        </div>  

                                                        <div class="form-group col-md-12">
                                                            <label>اسم المواصفة باللغة الانجليزية</label>
                                                            <div class="form-group col-md-12">
                                                                <input style="width:100%;" type="text" class="form-control" name="enname" placeholder="اسم المواصفة باللغة الانجليزية" value="{{$feature->enname}}" required>
                                                                @if ($errors->has('enname'))
                                                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('enname') }}</div>
                                                                @endif
                                                            </div>  
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label>اللون</label>
                                                            <div class="form-group col-md-12">
                                                                <input style="width:100%;" type="color" class="form-control" name="value" value="{{$feature->value}}">
                                                                @if ($errors->has('value'))
                                                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('value') }}</div>
                                                                @endif
                                                            </div>  
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
