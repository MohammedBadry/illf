@extends('admin.include.master')
@section('title') لوحة التحكم | الأسئلة الشائعة @endsection
@section('content')

<section class="content">
        <div class="row">
                <div class="col-xs-12">
              {{ Form::open(array('method' => 'patch','url' => 'adminpanel/faq/'.$cancelpolicy->id )) }}
                <div class="box-body">

                    <!-- editor -->
                    <div class="col-md-12">
                            <div class="box box-info">
                                <div class="box-header">
                                <h3 class="box-title" >
                                 الأسئلة الشائعة باللغة العربية
                                </h3>
                                </div>
                                <div class="box-body pad">
                                    <textarea id="editor1" name="arfaq" rows="10" cols="80" required>{!! $cancelpolicy->arfaq !!}</textarea>
                                    @if ($errors->has('arfaq'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('arfaq') }}</div>
                                    @endif
                                </div>
                            </div>
                    </div>

                      <!-- editor -->
                    <div class="col-md-12">
                            <div class="box box-info">
                                <div class="box-header">
                                <h3 class="box-title" >
                                 الأسئلة الشائعة باللغة الانجليزية
                                </h3>
                                </div>
                                <div class="box-body pad">
                                    <textarea id="editor2" name="enfaq" rows="10" cols="80" required>{!! $cancelpolicy->enfaq !!}</textarea>
                                    @if ($errors->has('enfaq'))
                                        <div style="color: crimson;font-size: 18px;" class="error">{{ $errors->first('enfaq') }}</div>
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
