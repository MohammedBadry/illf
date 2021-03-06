@extends('admin/include/master')
@section('title') لوحة التحكم | تعديل السليدر @endsection
@section('content')

    <section class="content">
            <div class="row">
                <div class="col-xs-12">  
                    <div class="box box-primary">
    
                    <div class="box-header with-border">
                        <h3 class="box-title">تعديل سليدر </h3>
                    </div>
                
                {!! Form::open(array('method' => 'patch','files'=> true ,'url' =>'adminpanel/sliders/'.$edslider->id)) !!}
                    <div class="box-body">
                        <div class="form-group col-md-12">
                          <img class="img-thumbail" style="width:100%; height:300px;" src="{{asset('users/images/'.$edslider->image)}}" alt="{{$edslider->title}}" >
                        </div>

                        <div class="form-group col-md-12">
                            <label>صورة السلايدر</label>
                            <input type="file" class="form-control" name="image" >
                            @if ($errors->has('image'))
                                <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('image') }}</div>
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
