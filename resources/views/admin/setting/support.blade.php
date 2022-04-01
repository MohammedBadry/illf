@extends('admin.include.master')
@section('title') لوحة التحكم | مركز المساعدة @endsection
@section('content')

<section class="content">
        <div class="row">
                <div class="col-xs-12">
              {{ Form::open(array('method' => 'patch','url' => 'adminpanel/support/'.$cancelpolicy->id )) }}
                <div class="box-body">

                    <!-- editor -->
                    <div class="col-md-12">
                            <div class="box box-info">
                                <div class="box-header">
                                <h3 class="box-title" >
                                 مركز المساعدة باللغة العربية
                                </h3>
                                </div>
                                <div class="box-body pad">
                                    <textarea id="editor1" name="arsupport" rows="10" cols="80" required>{!! $cancelpolicy->arsupport !!}</textarea>
                                    @if ($errors->has('arsupport'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('arsupport') }}</div>
                                    @endif
                                </div>
                            </div>
                    </div>

                      <!-- editor -->
                    <div class="col-md-12">
                            <div class="box box-info">
                                <div class="box-header">
                                <h3 class="box-title" >
                                 مركز المساعدة باللغة الانجليزية
                                </h3>
                                </div>
                                <div class="box-body pad">
                                    <textarea id="editor2" name="ensupport" rows="10" cols="80" required>{!! $cancelpolicy->ensupport !!}</textarea>
                                    @if ($errors->has('ensupport'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('ensupport') }}</div>
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
