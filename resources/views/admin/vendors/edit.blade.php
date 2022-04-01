@extends('admin/include/master')
@section('title') لوحة التحكم | تعديل بيانات التاجر @endsection
@section('content')
   
<section class="content">
    <div class="row">
      <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">تعديل بيانات التاجر </h3>
          <p> {{ $eduser->name }} </p>
        </div>
        
        {!! Form::open(array('method' => 'patch','files' => true,'url' =>'adminpanel/vendors/'.$eduser->id)) !!}
        <div class="box-body">
                
                <div class="form-group col-md-6">
                    <label>إسم الشركة</label>
                    <input type="text" class="form-control" name="company" placeholder="ادخل إسم الشركة " value="{{ $eduser->company }}" required>
                    @if ($errors->has('company'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('company') }}</div>
                    @endif  
                </div>

                <div class="form-group col-md-6">
                    <label>الاسم بالكامل </label>
                    <input type="text" class="form-control" name="name" placeholder="ادخل الاسم بالكامل " value="{{$eduser->name}}" required>
                    @if ($errors->has('name'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('name') }}</div>
                    @endif  
                </div>

                <div class="form-group col-md-4">
                    <label>رقم الهاتف </label>
                    <input type="text" class="form-control" name="phone" placeholder="ادخل رقم الهاتف " value="{{ $eduser->phone }}" required>
                    @if ($errors->has('phone'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('phone') }}</div>
                    @endif  
                </div>

                <div class="form-group col-md-4">
                    <label>البريد الإلكترونى</label>
                    <input type="email" class="form-control" name="email" placeholder="ادخل البريد الإلكترونى" value="{{ $eduser->email }}" required>
                    @if ($errors->has('email'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('email') }}</div>
                    @endif    
                </div>

                <div class="form-group col-md-4">
                    <label>الوظيفة</label>
                    <input type="text" class="form-control" name="job" placeholder="ادخل الوظيفة" value="{{ $eduser->job }}" required>
                    @if ($errors->has('job'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('job') }}</div>
                    @endif  
                </div>


                <div class="form-group col-md-12">
                    <label> كلمة المرور الجديدة</label>
                    <input type="password" class="form-control" id="adminpass1" name="pass" placeholder="كلمة المرور الجديدة">
                    <div style="padding:1%;" id="errorpass"></div>
                    <div class="figure" id="strength_human2"></div>
                    @if ($errors->has('pass'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('pass') }}</div>
                    @endif  
                </div>

                <div class="form-group col-md-4">
                    <label>الدولة</label>
                    <select class="form-control" id="country"  name="country" required>
                        <option value="" disabled="" selected="">اختر الدولة</option>
                        @foreach($countries as $country)
                            <option value="{{$country->id}}" @if($eduser->country == $country->id) selected @endif> {{$country->name}} </option>
                        @endforeach
                    </select>
                    @if ($errors->has('country'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('country') }}</div>
                    @endif  
                </div>

                <div class="form-group col-md-4">
                    <label>المدينة</label>
                    <select class="form-control" id="city"  name="city" required>
                        <option value="" disabled="" selected="">اختر المدينة</option>
                        @foreach($cities as $city)
                            <option value="{{$city->id}}" @if($eduser->city == $city->id) selected @endif> {{$city->name}} </option>
                        @endforeach
                    </select>
                    @if ($errors->has('city'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('city') }}</div>
                    @endif  
                </div>

                <div class="form-group col-md-4">
                    <label>المنطقة</label>
                    <select class="form-control" id="area"  name="area" required>
                        <option value="" disabled="" selected="">اختر المنطقة</option>
                        @foreach($areas as $area)
                            <option value="{{$area->id}}" @if($eduser->area == $area->id) selected @endif> {{$area->name}} </option>
                        @endforeach
                    </select>
                    @if ($errors->has('area'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('area') }}</div>
                    @endif  
                </div>

                <div class="card card-secondary col-md-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>التخصص</label>
                                <div class="form-group">
                                    @foreach($categories as $category)
                                        <div class="custom-control custom-checkbox col-md-2">
                                            <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="classfication[]"
                                            value="{{$category->id}}" @if(in_array($category->id,$selectedclassfications)) checked @endif>
                                            <label for="customCheckbox1" class="custom-control-label">{{$category->arcategory}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

          </div>

          <div class="box-footer">
            <button style="width: 20%;margin-right: 40%;" type="submit" class="btn btn-success">تعديل</button>
          </div>
          {!! Form::close() !!}
        </div> 
      </div>  
    </div> 
</section>                          
@endsection 
