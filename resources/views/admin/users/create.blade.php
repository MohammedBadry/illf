@extends('admin/include/master')
@section('title') لوحة التحكم | إضافة عضو جديد @endsection
@section('content')

<section class="content">
        <div class="row">
            <div class="col-xs-12">  
                <div class="box box-primary">
  
              <div class="box-header with-border">
                <h3 class="box-title">إضافة عضو جديد</h3>
              </div>
              
              {!! Form::open(array('method' => 'POST','files' => true,'url' =>'adminpanel/users')) !!}
                <div class="box-body">
                    
                <div class="form-group col-md-6">
                    <label>الاسم بالكامل </label>
                    <input type="text" class="form-control" name="name" placeholder="ادخل الاسم بالكامل " value="{{ old('name') }}" required>
                    @if ($errors->has('name'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('name') }}</div>
                    @endif  
                </div>

                <div class="form-group col-md-6">
                    <label>البريد الإلكترونى</label>
                    <input type="email" class="form-control" name="email" placeholder="ادخل البريد الإلكترونى" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('email') }}</div>
                    @endif    
                </div>

                <div class="form-group col-md-6">
                    <label> كلمة المرور</label>
                    <input type="password" class="form-control" name="pass" placeholder="كلمة المرور" required>
                    @if ($errors->has('pass'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('pass') }}</div>
                    @endif  
                </div>
                   
                <div class="form-group col-md-6">
                    <label> إعادة كلمة المرور</label>
                    <input type="password" class="form-control" name="confirmpass" placeholder="إعادة كلمة المرور" required>
                    @if ($errors->has('confirmpass'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('confirmpass') }}</div>
                    @endif  
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
