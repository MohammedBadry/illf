@extends('admin/include/master')
@section('title') لوحة التحكم | تعديل قسم @endsection
@section('content')
<style>form{display: initial;}</style>
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="active tab-pane" id="activity">
                        <div class="box">

                            <div class="box-header with-border">
                                <h3 class="box-title">تعديل قسم</h3>
                            </div>

                            <div class="box-body">

                                {{ Form::open(array('method' => 'patch','files'=>true,'url' => 'adminpanel/categories/'.$edcategory->id)) }}
                                    <input type="hidden" name="parent" value="{{$edcategory->id}}">

                                    <div class="form-group col-md-6">
                                        <label>إسم القسم باللغة العربية</label>
                                        <div class="form-group col-md-12">
                                            <input style="width:100%;" type="text" class="form-control" name="arcategory" placeholder="إسم القسم باللغة العربية" value="{{$edcategory->arcategory}}" required>
                                            @if ($errors->has('arcategory'))
                                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('arcategory') }}</div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>إسم القسم باللغة الانجليزية</label>
                                        <div class="form-group col-md-12">
                                            <input style="width:100%;" type="text" class="form-control" name="encategory" placeholder="إسم القسم باللغة الانجليزية" value="{{$edcategory->encategory}}" required>
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
                                                <option value="1" @if($edcategory->special == 1) selected @endif>نعم</option>
                                                <option value="0" @if($edcategory->special == 0) selected @endif>لأ</option>
                                            </select>
                                            @if ($errors->has('special'))
                                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('special') }}</div>
                                            @endif
                                        </div>

                                    @if($parentcategory && $parentcategory->parent == 0)
                                        <div class="form-group col-md-12">
                                            @if ($errors->has('subfeatures'))
                                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('subfeatures') }}</div>
                                            @endif

                                            @foreach($parentfeatures as $parentfeatur)
                                                <?php $subfeatures = DB::table('features')->where('parent',$parentfeatur->id)->get(); ?>
                                                <div class="card card-secondary col-md-4">

                                                    <div class="card-header">
                                                        <h3 class="card-title">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="parentfeatures[]"
                                                            value="{{$parentfeatur->id}}" @if(in_array($parentfeatur->id,$parentcategoryfeatures)) checked @endif>
                                                            {{$parentfeatur->arname}}
                                                        </h3>
                                                    </div>

                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    @foreach($subfeatures as $subfeature)
                                                                        <div class="custom-control custom-checkbox col-md-6">
                                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="subfeatures[]"
                                                                            value="{{$subfeature->id}}" @if(in_array($subfeature->id,$subcategoryfeatures)) checked @endif>
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

                                    <button type="submit" class="btn btn-success col-md-offset-4 col-md-4">تعديل</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
