@extends('admin/include/master')
@section('title') لوحة التحكم | إضافة تاجر جديد @endsection
@section('content')

<section class="content">
        <div class="row">
            <div class="col-xs-12">  
                <div class="box box-primary">
  
              <div class="box-header with-border">
                <h3 class="box-title">إضافة تاجر جديد</h3>
              </div>
              
              {!! Form::open(array('method' => 'POST','files' => true,'url' =>'adminpanel/vendors')) !!}
                <div class="box-body">
                    
                    <div class="form-group col-md-6">
                        <label>إسم الشركة</label>
                        <input type="text" class="form-control" name="company" placeholder="ادخل إسم الشركة " value="{{ old('company') }}" required>
                        @if ($errors->has('company'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('company') }}</div>
                        @endif  
                    </div>

                    <div class="form-group col-md-6">
                        <label>الاسم بالكامل </label>
                        <input type="text" class="form-control" name="name" placeholder="ادخل الاسم بالكامل " value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('name') }}</div>
                        @endif  
                    </div>

                    <div class="form-group col-md-4">
                        <label>رقم الهاتف </label>
                        <input type="text" class="form-control" name="phone" placeholder="ادخل رقم الهاتف " value="{{ old('phone') }}" required>
                        @if ($errors->has('phone'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('phone') }}</div>
                        @endif  
                    </div>

                    <div class="form-group col-md-4">
                        <label>البريد الإلكترونى</label>
                        <input type="email" class="form-control" name="email" placeholder="ادخل البريد الإلكترونى" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('email') }}</div>
                        @endif    
                    </div>

                    <div class="form-group col-md-4">
                        <label>الوظيفة</label>
                        <input type="text" class="form-control" name="job" placeholder="ادخل الوظيفة" value="{{ old('job') }}" required>
                        @if ($errors->has('job'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('job') }}</div>
                        @endif  
                    </div>

                    <div class="form-group col-md-6">
                        <label> كلمة المرور</label>
                        <input type="password" class="form-control" name="password" placeholder="كلمة المرور" required>
                        @if ($errors->has('password'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('password') }}</div>
                        @endif  
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label> إعادة كلمة المرور</label>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="إعادة كلمة المرور" required>
                        @if ($errors->has('password_confirmation'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('password_confirmation') }}</div>
                        @endif  
                    </div>

                    <div class="form-group col-md-4">
                        <label>الدولة</label>
                        <select class="form-control" id="country"  name="country" required>
                            <option value="" disabled="" selected="">اختر الدولة</option>
                            @foreach($countries as $country)
                                <option value="{{$country->id}}"> {{$country->name}} </option>
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
                        </select>
                        @if ($errors->has('city'))
                            <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('city') }}</div>
                        @endif  
                    </div>

                    <div class="form-group col-md-4">
                        <label>المنطقة</label>
                        <select class="form-control" id="area"  name="area" required>
                            <option value="" disabled="" selected="">اختر المنطقة</option>
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
                                                value="{{$category->id}}">
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
                  <button style="width: 20%;margin-right: 40%;" type="submit" id="submit1" class="btn btn-primary">إضافة</button>
                </div>
                {!! Form::close() !!}
          </div>
        </div>
</section>
@endsection 
