@extends('admin/include/master')
@section('title') لوحة التحكم | الأقسام الفرعية - {{$showcategory->arcategory}} @endsection
@section('content')
<style>form{display: initial;}</style>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li style="margin-right: 0px; width:50%" class="active ">
                        <a href="#activity" data-toggle="tab">إضافة قسم فرعى - {{$showcategory->arcategory}}</a></li>
                        <li style="margin-right: 0px; width:50%"><a href="#activity1" data-toggle="tab">الاقسام الفرعية - ({{count($subcategories)}}) قسم فرعى</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">إضافة قسم فرعى - <a href="@if($showcategory->parent == 0) {{asset('adminpanel/categories')}} @else {{asset('adminpanel/categories/'.$showcategory->parent)}} @endif">{{$showcategory->arcategory}}</a></h3>
                                </div>

                                <div class="box-body">
                                        <input type="hidden" name="parent" value="{{$showcategory->id}}">
                                        <div class="form-group col-md-6">
                                            <label>إسم القسم باللغة العربية</label>
                                            <div class="form-group col-md-12">
                                                <input style="width:100%;" type="text" class="form-control" name="arcategory" placeholder="إسم القسم باللغة العربية" value="{{$showcategory->arcategory}}" required>
                                                @if ($errors->has('arcategory'))
                                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('arcategory') }}</div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>إسم القسم باللغة الانجليزية</label>
                                            <div class="form-group col-md-12">
                                                <input style="width:100%;" type="text" class="form-control" name="encategory" placeholder="إسم القسم باللغة الانجليزية" value="{{$showcategory->encategory}}" required>
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

                                        <div class="form-group col-md-12">
                                            <label>مميز</label>
                                            <select class="form-control"  name="special" required>
                                                @if($showcategory->special==1)
                                                <option value="1">نعم</option>
                                                @else
                                                <option value="0" selected>لأ</option>
                                                @endif
                                            </select>
                                            @if ($errors->has('special'))
                                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('special') }}</div>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>عرض في الصفحة الرئيسية</label>
                                            <select class="form-control"  name="special" required>
                                                <option value="1" @if($showcategory->view_at_home == 1) selected @endif>نعم</option>
                                                <option value="0" @if($showcategory->view_at_home == 0) selected @endif>لأ</option>
                                            </select>
                                            @if ($errors->has('special'))
                                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('special') }}</div>
                                            @endif
                                        </div>

                                        @if($showcategory->parent == 0)
                                            <div class="form-group col-md-12" style="display: none">

                                                @if ($errors->has('subfeatures'))
                                                    <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('subfeatures') }}</div>
                                                @endif

                                                @foreach($parentfeature as $parentfeatur)
                                                    <?php $subfeatures = DB::table('features')->where('parent',$parentfeatur->id)->get(); ?>
                                                    <div class="card card-secondary col-md-4">
                                                        <div class="card-header">
                                                            <h3 class="card-title">
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="parentfeatures[]" value="{{$parentfeatur->id}}">
                                                                {{$parentfeatur->arname}}
                                                            </h3>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        @foreach($subfeatures as $subfeature)
                                                                            <div class="custom-control custom-checkbox col-md-6">
                                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="subfeatures[]" value="{{$subfeature->id}}">
                                                                                <label for="customCheckbox1" class="custom-control-label">{{$subfeature->arname}}</label>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        <!--button type="submit" class="btn btn-primary col-md-offset-4 col-md-4">إضافة</button-->
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="activity1">
                            <div class="box">
                                <h3 class="box-title">الأقسام الفرعية - <a href="@if($showcategory->parent == 0) {{asset('adminpanel/categories')}} @else {{asset('adminpanel/categories/'.$showcategory->parent)}} @endif">{{$showcategory->arcategory}}</a></h3>
                                <div class="table-responsive box-body">
                                    @if(count($subcategories) != 0)
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">صورة القسم</th>
                                                <th style="text-align:center;">القسم</th>
                                                <th style="text-align:center;"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($subcategories as $category)
                                                <tr>
                                                    <td style="text-align:center;"><img style="width:100px;height:100px;" src="{{asset('users/images/'.$category->image)}}" alt="{{$category->arcategory}}"></td>
                                                    <td style="text-align:center;">{{$category->arcategory}}</td>
                                                    <td style="text-align:center;">
                                                        <a href='{{asset("adminpanel/categories/".$category->id)}}' class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> مشاهدة</a>
                                                        @if($showcategory->parent == 0)
                                                            <a href='{{asset("adminpanel/categories/".$category->id."/edit")}}' class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</a>
                                                        @else
                                                            <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#modal-upclass{{$category->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button>
                                                        @endif

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
                                                                    <label>إسم القسم باللغة العربية</label>
                                                                    <div class="form-group col-md-12">
                                                                        <input style="width:100%;" type="text" class="form-control" name="arcategory" placeholder="إسم القسم باللغة العربية" value="{{$category->arcategory}}" required>
                                                                        @if ($errors->has('arcategory'))
                                                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('arcategory') }}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <label>إسم القسم باللغة الانجليزية</label>
                                                                    <div class="form-group col-md-12">
                                                                        <input style="width:100%;" type="text" class="form-control" name="encategory" placeholder="إسم القسم باللغة الانجليزية" value="{{$category->encategory}}" required>
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
                                    @else
                                        <p class="text-center">لا يوجد أقسام فرعية</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
