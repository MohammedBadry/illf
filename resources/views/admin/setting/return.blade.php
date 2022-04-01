@extends('admin.include.master')
@section('title') لوحة التحكم | سياسة الإرجاع واستلام النقدية @endsection
@section('content')

<section class="content">
        <div class="row">
                <div class="col-xs-12">
              {{ Form::open(array('method' => 'patch','url' => 'adminpanel/return/'.$cancelpolicy->id )) }}
                <div class="box-body">

                    <!-- editor -->
                    <div class="col-md-12">
                            <div class="box box-info">
                                <div class="box-header">
                                <h3 class="box-title" >
                                 سياسة الإرجاع واستلام النقدية باللغة العربية
                                </h3>
                                </div>
                                <div class="box-body pad">
                                    <textarea id="editor1" name="arreturn" rows="10" cols="80" required>{!! $cancelpolicy->arreturn !!}</textarea>
                                    @if ($errors->has('arreturn'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('arreturn') }}</div>
                                    @endif
                                </div>
                            </div>
                    </div>

                      <!-- editor -->
                    <div class="col-md-12">
                            <div class="box box-info">
                                <div class="box-header">
                                <h3 class="box-title" >
                                 سياسة الإرجاع واستلام النقدية باللغة الانجليزية
                                </h3>
                                </div>
                                <div class="box-body pad">
                                    <textarea id="editor2" name="enreturn" rows="10" cols="80" required>{!! $cancelpolicy->enreturn !!}</textarea>
                                    @if ($errors->has('enreturn'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('enreturn') }}</div>
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
