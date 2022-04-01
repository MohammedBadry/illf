@extends('admin/include/master')
@section('title') لوحة التحكم |  الأقسام   @endsection
@section('content')
<style>form{display: initial;}</style>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">كل الأقسام الرئيسية</h3>
                    <button style="float:left" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-addclass"><i class="fa fa-plus" aria-hidden="true"></i> إضافة قسم جديد</button>
                </div>

                <div class="modal fade" id="modal-addclass" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">إضافة قسم جديد  </h4>
                        </div>
                        <div class="modal-body">
                            {{ Form::open(array('method' => 'POST','files'=>true,'url' => 'adminpanel/categories')) }}

                                <div class="form-group col-md-12">
                                    <label>اسم القسم باللغة العربية</label>
                                    <div class="form-group col-md-12">
                                        <input style="width:100%;" type="text" class="form-control" name="arcategory" placeholder="اسم القسم باللغة العربية" value="{{old('arcategory')}}" required>
                                        @if ($errors->has('arcategory'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('arcategory') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>اسم القسم باللغة الانجليزية</label>
                                    <div class="form-group col-md-12">
                                        <input style="width:100%;" type="text" class="form-control" name="encategory" placeholder="اسم القسم باللغة الانجليزية" value="{{old('encategory')}}" required>
                                        @if ($errors->has('encategory'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('encategory') }}</div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>صورة القسم</label>
                                    <input type="file" class="form-control" name="image" required>
                                    @if ($errors->has('image'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('image') }}</div>
                                    @endif
                                </div>

                                <input type="hidden" name="parent" value="0">

                                <div class="form-group col-md-12">
                                    <label>تمييز</label>
                                    <select class="form-control"  name="special" required>
                                        <option value="1">نعم</option>
                                        <option value="0" selected>لأ</option>
                                    </select>
                                    @if ($errors->has('special'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('special') }}</div>
                                    @endif
                                </div>

                                <div class="form-group col-md-12">
                                    <label>عرض في الصفحة الرئيسية</label>
                                    <select class="form-control"  name="view_at_home" required>
                                        <option value="1">نعم</option>
                                        <option value="0" selected>لأ</option>
                                    </select>
                                    @if ($errors->has('view_at_home'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('view_at_home') }}</div>
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
                                        <th style="text-align:center;">صورة القسم</th>
                                        <th style="text-align:center;">القسم</th>
                                        <th style="text-align:center;"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($allcategories as $category)
                                        <tr>
                                            <td style="text-align:center;"><img style="width:100px;height:100px;" src="{{asset('users/images/'.$category->image)}}" alt="{{$category->arcategory}}"></td>
                                            <td style="text-align:center;">{{$category->arcategory}}</td>
                                            <td style="text-align:center;">
                                                <a href='{{asset("adminpanel/categories/".$category->id)}}' class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> مشاهدة</a>
                                                <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modal-upclass{{$category->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button>
                                                {{ Form::open(array('method' => 'DELETE',"onclick"=>"return confirm('هل انت متأكد ؟!')",'files' => true,'url' => array('adminpanel/categories/'.$category->id))) }}
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="modal-upclass{{$category->id}}" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">تعديل  القسم</h4>
                                                </div>
                                                <div class="modal-body">
                                                    {{ Form::open(array('method' => 'patch','files'=>true,'url' => 'adminpanel/categories/'.$category->id )) }}

                                                        <div class="form-group col-md-12">
                                                            <label>اسم القسم باللغة العربية</label>
                                                            <div class="form-group col-md-12">
                                                                <input style="width:100%;" type="text" class="form-control" name="arcategory" placeholder="اسم القسم باللغة العربية" value="{{$category->arcategory}}" required>
                                                                @if ($errors->has('arcategory'))
                                                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('arcategory') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label>اسم القسم باللغة الانجليزية</label>
                                                            <div class="form-group col-md-12">
                                                                <input style="width:100%;" type="text" class="form-control" name="encategory" placeholder="اسم القسم باللغة الانجليزية" value="{{$category->encategory}}" required>
                                                                @if ($errors->has('encategory'))
                                                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('encategory') }}</div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label>صورة القسم</label>
                                                            <input type="file" class="form-control" name="image">
                                                            @if ($errors->has('image'))
                                                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('image') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label>تمييز</label>
                                                            <select class="form-control"  name="special" required>
                                                                <option value="1" @if($category->special == 1) selected @endif>نعم</option>
                                                                <option value="0" @if($category->special == 0) selected @endif>لأ</option>
                                                            </select>
                                                            @if ($errors->has('special'))
                                                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('special') }}</div>
                                                            @endif
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label>عرض في الصفحة الرئيسية</label>
                                                            <select class="form-control"  name="view_at_home" required>
                                                                <option value="1" @if($category->view_at_home == 1) selected @endif>نعم</option>
                                                                <option value="0" @if($category->view_at_home == 0) selected @endif>لأ</option>
                                                            </select>
                                                            @if ($errors->has('view_at_home'))
                                                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('view_at_home') }}</div>
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
