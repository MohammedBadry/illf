@extends('admin/include/master')
@section('title') لوحة التحكم | تعديل إعلان الصفحة الرئيسية @endsection
@section('content')

    <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">تعديل إعلان الصفحة الرئيسية </h3>
                    </div>

                {!! Form::open(array('method' => 'patch','files'=> true ,'url' =>'adminpanel/home-adv/'.$edadv->id)) !!}
                <div class="box-body">
                        <div class="form-group col-md-12">
                          <img class="img-thumbail" style="width:100%; height:300px;" src="{{asset('users/images/'.$edadv->home_adv_image)}}" >
                        </div>

                        <div class="form-group col-md-12">
                            <label>صورة السلايدر</label>
                            <input type="file" class="form-control" name="home_adv_image" >
                            @if ($errors->has('home_adv_image'))
                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('home_adv_image') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="box-footer">
                        <button style="width: 20%;margin-right: 40%;" type="submit" class="btn btn-success">تعديل</button>
                    </div>
                {!! Form::close() !!}
            </div>
            </div>
    </section>

@endsection
