@extends('admin/include/master')
@section('title') لوحة التحكم | إضافة منتج جديد @endsection
@section('content')

<section class="content">
        <div class="row">
                <div class="col-xs-12">
                <div class="box box-primary">

              <div class="box-header with-border">
                <h3 class="box-title">إضافة منتج جديد</h3>
              </div>

              {!! Form::open(array('method' => 'POST','files' => true,'url' =>'adminpanel/items')) !!}
                <div class="box-body">

                  <div class="form-group col-md-6">
                    <label>اسم المنتج باللغة العربية</label>
                    <input type="text" class="form-control" name="artitle" placeholder="ادخل اسم المنتج باللغة العربية" value="{{ old('artitle') }}" required>
                    @if ($errors->has('artitle'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('artitle') }}</div>
                    @endif
                  </div>

                  <div class="form-group col-md-6">
                    <label>اسم المنتج باللغة الانجليزية</label>
                    <input type="text" class="form-control" name="entitle" placeholder="ادخل اسم المنتج باللغة الانجليزية" value="{{ old('entitle') }}" required>
                    @if ($errors->has('entitle'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('entitle') }}</div>
                    @endif
                  </div>

                    <div class="form-group col-md-4">
                        <label>القسم الرئيسى</label>
                        <select class="form-control" id="maincategory"  name="category" required>
                            <option value="0" disabled="" selected="">اختار القسم</option>
                            @foreach($allcats as $cat)
                                <option value="{{$cat->id}}"> {{$cat->arcategory}} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('category'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('category') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label>القسم الفرعى</label>
                        <select class="form-control" id="subcategory"  name="subcategory" required>
                            <option value="0" disabled="" selected="">اختار القسم</option>
                        </select>
                        @if ($errors->has('subcategory'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('subcategory') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label>القسم الفرعى</label>
                        <select class="form-control" id="subsubcategory"  name="subsubcategory" required>
                            <option value="0" disabled="" selected="">اختار القسم</option>
                        </select>
                        @if ($errors->has('subsubcategory'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('subsubcategory') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label>كود المنتج</label>
                        <input type="text" name="code" class="form-control" placeholder = 'ادخل كود المنتج' required>
                        @if ($errors->has('code'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('code') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label>السعر [ريال]</label>
                        <input type="number" name="price" class="form-control" placeholder = 'ادخل السعر' required>
                        @if ($errors->has('price'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('price') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label>السعر قبل الخصم [ريال] (يضاف في حالة وجود خصم فقط)</label>
                        <input type="number" name="before_price" class="form-control" placeholder = ' ادخل السعر قبل الخصم'>
                        @if ($errors->has('before_price'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('before_price') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label>الكمية</label>
                        <input type="number" name="stock" class="form-control" placeholder = 'ادخل الكمية' required>
                        @if ($errors->has('stock'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('stock') }}</div>
                        @endif
                    </div>

                    <div id="itemfeatures" class="form-group col-md-12">
                        @if ($errors->has('subfeatures'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('subfeatures') }}</div>
                        @endif

                        @if ($errors->has('parentfeatures'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('parentfeatures') }}</div>
                        @endif

                    </div>

                    <div class="form-group col-md-12">
                        <label>صور المنتج [يمكنك رفع اكثر من صورة]</label>
                        <input type="file" name="items[]" multiple>
                        @if ($errors->has('items'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('items') }}</div>
                        @endif
                    </div>

                  <div class="col-md-12">
                      <div class="box box-info">
                          <div class="box-header">
                          <h3 class="box-title" > تفاصيل المنتج باللغة العربية</h3>
                          </div>
                          <div class="box-body pad">
                              <textarea id="editor1" name="ardesc" rows="10" cols="167" required>{!! old('ardesc') !!}</textarea>
                              @if ($errors->has('ardesc'))
                                  <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('ardesc') }}</div>
                              @endif
                          </div>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="box box-info">
                          <div class="box-header">
                          <h3 class="box-title" > تفاصيل المنتج باللغة الانجليزية</h3>
                          </div>
                          <div class="box-body pad">
                              <textarea id="editor2" name="endesc" rows="10" cols="167" required>{!! old('endesc') !!}</textarea>
                              @if ($errors->has('endesc'))
                                  <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('endesc') }}</div>
                              @endif
                          </div>
                      </div>
                  </div>

                </div>

                <div class="box-footer">
                  <button style="width: 20%;margin-right: 40%;" type="submit" class="btn btn-primary">إضافة</button>
                </div>
                {!! Form::close() !!}
          </div>
          </div>
          </div>
</section>

@endsection
