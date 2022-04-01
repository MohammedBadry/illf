@extends('admin.include.master')
@section('title') لوحة التحكم | سياسة الشحن @endsection
@section('content')

<section class="content">
        <div class="row">
                <div class="col-xs-12">
              {{ Form::open(array('method' => 'patch','url' => 'adminpanel/charge/'.$cancelpolicy->id )) }}
                <div class="box-body">

                <div class="form-group col-md-6">
                    <label>تكلفة الشحن</label>
                    <input type="number" class="form-control" name="charge_cost" value="{{ $cancelpolicy->charge_cost }}" required>
                    @if ($errors->has('charge_cost'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('charge_cost') }}</div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label>مدة التوصيل</label>
                    <input type="text" class="form-control" name="charge_time" value="{{ $cancelpolicy->charge_time }}" required>
                    @if ($errors->has('charge_time'))
                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('charge_time') }}</div>
                    @endif
                </div>

                <!-- editor -->
                    <div class="col-md-12">
                            <div class="box box-info">
                                <div class="box-header">
                                <h3 class="box-title" >
                                 سياسة الشحن باللغة العربية
                                </h3>
                                </div>
                                <div class="box-body pad">
                                    <textarea id="editor1" name="archarge" rows="10" cols="80" required>{!! $cancelpolicy->archarge !!}</textarea>
                                    @if ($errors->has('archarge'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('archarge') }}</div>
                                    @endif
                                </div>
                            </div>
                    </div>

                      <!-- editor -->
                    <div class="col-md-12">
                            <div class="box box-info">
                                <div class="box-header">
                                <h3 class="box-title" >
                                 سياسة الشحن باللغة الانجليزية
                                </h3>
                                </div>
                                <div class="box-body pad">
                                    <textarea id="editor2" name="encharge" rows="10" cols="80" required>{!! $cancelpolicy->encharge !!}</textarea>
                                    @if ($errors->has('encharge'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('encharge') }}</div>
                                    @endif
                                </div>
                            </div>
                    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary col-md-offset-4 col-md-4">تعديل</button>
    </div>
    {!! Form::close() !!}
    </div>
</div>
</div>
</section>

@endsection
