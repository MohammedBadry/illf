@extends('admin/include/master')
@section('title') لوحة التحكم | تعديل بيانات المنتج @endsection
@section('content')

<section class="content">
    <div class="row">
      <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">تعديل بيانات المنتج </h3>
          <p> {{ $editem->title}} </p>
        </div>

        {!! Form::open(array('method' => 'patch','files' => true,'url' =>'adminpanel/items/'.$editem->id)) !!}
        <input type="hidden" name="item_id" id="itemID" value="{{$editem->id}}">
        <div class="box-body">

                  <div class="form-group col-md-6">
                    <label>اسم المنتج باللغة العربية</label>
                    <input type="text" class="form-control" name="artitle" placeholder="ادخل اسم المنتج باللغة العربية" value="{{ $editem->artitle }}" required>
                    @if ($errors->has('artitle'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('artitle') }}</div>
                    @endif
                  </div>

                  <div class="form-group col-md-6">
                    <label>اسم المنتج باللغة الانجليزية</label>
                    <input type="text" class="form-control" name="entitle" placeholder="ادخل اسم المنتج باللغة الانجليزية" value="{{ $editem->entitle }}" required>
                    @if ($errors->has('entitle'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('entitle') }}</div>
                    @endif
                  </div>

                  <div class="form-group col-md-4">
                        <label>القسم الرئيسى</label>
                        <select class="form-control" id="maincategory"  name="category" required>
                            <option value="0" disabled="" selected="">اختار القسم</option>
                            @foreach($allcats as $cat)
                                <option value="{{$cat->id}}" @if($editem->category == $cat->id) selected @endif> {{$cat->arcategory}} </option>
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
                            @foreach($allsubcats as $cat)
                                <option value="{{$cat->id}}" @if($editem->subcategory == $cat->id) selected @endif> {{$cat->arcategory}} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('subcategory'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('subcategory') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label>القسم الفرعى</label>
                        <select class="form-control" id="subsubcategory"  name="subsubcategory" required>
                            <option value="0" disabled="" selected="">اختار القسم</option>
                            @foreach($allsubsubcats as $cat)
                                <option value="{{$cat->id}}" @if($editem->subsubcategory == $cat->id) selected @endif> {{$cat->arcategory}} </option>
                            @endforeach
                        </select>
                        @if ($errors->has('subsubcategory'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('subsubcategory') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label>كود المنتج</label>
                        <input type="text" name="code" class="form-control" value="{{$editem->code}}" placeholder = 'ادخل كود المنتج' required>
                        @if ($errors->has('code'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('code') }}</div>
                        @endif
                    </div>


                  <div class="form-group col-md-6">
                    <label>السعر [ريال]</label>
                    <input type="number" name="price" class="form-control" placeholder = 'ادخل السعر' value="{{$editem->price}}" required>
                    @if ($errors->has('price'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('price') }}</div>
                    @endif
                  </div>

                  <div class="form-group col-md-4">
                    <label>السعر قبل الخصم [ريال] (يضاف في حالة وجود خصم فقط)</label>
                    <input type="number" name="before_price" class="form-control" placeholder = ' ادخل السعر قبل الخصم' value="{{$editem->before_price}}">
                    @if ($errors->has('before_price'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('before_price') }}</div>
                    @endif
                </div>

                    <div id="itemfeatures" class="form-group col-md-12">
                        @if ($errors->has('subfeatures'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('subfeatures') }}</div>
                        @endif

                        @if ($errors->has('parentfeatures'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('parentfeatures') }}</div>
                        @endif


                        @foreach($parentfeatures as $parentfeatur)
                            <div class="card card-secondary col-md-4">

                                <div class="card-header">
                                    <h3 class="card-title">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="parentfeatures[]"
                                        value="{{$parentfeatur->id}}" @if(in_array($parentfeatur->id,$parentitemfeatures)) checked @endif>
                                        {{$parentfeatur->arname}}
                                    </h3>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                @foreach($subfeatures as $subfeature)
                                                    @if($subfeature->parent == $parentfeatur->id)
                                                        <div class="custom-control custom-checkbox col-md-6">
                                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="subfeatures[]"
                                                            value="{{$subfeature->id}}" @if(in_array($subfeature->id,$subitemfeatures)) checked @endif>
                                                            <label for="customCheckbox1" class="custom-control-label">{{$subfeature->arname}}</label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach

                    </div>

                   <div class="form-group col-md-12">
                    <label>صور اكثر عن الاعلان [يمكنك رفع اكثر من صورة]</label>
                    <input type="file" name="items[]" multiple>
                    @if ($errors->has('items'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('items') }}</div>
                    @endif
                  </div>

                  <div class="form-group col-md-12">
                      <label>صور الاعلان</label>
                      <br>
                      @foreach($adimages as $image)
                      <div style="padding: 2%;" class="col-md-3">
                          <img class="img-thumbnail" style="width:100%; height:10%;" src="{{asset('users/images/'.$image->image)}}" alt="">
                      </div>
                      @endforeach
                  </div>

                  <div class="col-md-12">
                      <div class="box box-info">
                          <div class="box-header">
                          <h3 class="box-title" > تفاصيل الاعلان باللغة العربية</h3>
                          </div>
                          <div class="box-body pad">
                              <textarea id="editor1" name="ardesc" rows="10" cols="167" required>{!! $editem->ardesc !!}</textarea>
                              @if ($errors->has('ardesc'))
                                  <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('ardesc') }}</div>
                              @endif
                          </div>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <div class="box box-info">
                          <div class="box-header">
                          <h3 class="box-title" > تفاصيل الاعلان باللغة الانجليزية</h3>
                          </div>
                          <div class="box-body pad">
                              <textarea id="editor2" name="endesc" rows="10" cols="167" required>{!! $editem->endesc !!}</textarea>
                              @if ($errors->has('endesc'))
                                  <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('endesc') }}</div>
                              @endif
                          </div>
                      </div>
                  </div>

                <div class="box-footer">
                  <button style="width: 20%;margin-right: 40%;" type="submit" id="submit1" class="btn btn-primary">تعديل</button>
                </div>
        {!! Form::close() !!}
        </div>
      </div>
    </div>
</section>
@endsection
