@extends('admin.include.master')
@section('title') لوحة التحكم | سياسة الإلكترونيات @endsection
@section('content')

<section class="content">
        <div class="row">
                <div class="col-xs-12">
              {{ Form::open(array('method' => 'patch','url' => 'adminpanel/epolicy/'.$cancelpolicy->id )) }}
                <div class="box-body">

                    <!-- editor -->
                    <div class="col-md-12">
                            <div class="box box-info">
                                <div class="box-header">
                                <h3 class="box-title" >
                                 سياسة الإلكترونيات باللغة العربية
                                </h3>
                                </div>
                                <div class="box-body pad">
                                    <textarea id="editor1" name="arepolicy" rows="10" cols="80" required>{!! $cancelpolicy->arepolicy !!}</textarea>
                                    @if ($errors->has('arepolicy'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('arepolicy') }}</div>
                                    @endif
                                </div>
                            </div>
                    </div>

                      <!-- editor -->
                    <div class="col-md-12">
                            <div class="box box-info">
                                <div class="box-header">
                                <h3 class="box-title" >
                                 سياسة الإلكترونيات باللغة الانجليزية
                                </h3>
                                </div>
                                <div class="box-body pad">
                                    <textarea id="editor2" name="enepolicy" rows="10" cols="80" required>{!! $cancelpolicy->enepolicy !!}</textarea>
                                    @if ($errors->has('enepolicy'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('enepolicy') }}</div>
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
