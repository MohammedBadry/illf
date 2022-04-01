@extends('front.include.master')
@section('title') {{__('messages.sitename')}} | {{__('messages.faq')}} @endsection
@section('content')

          <div class="row-partner outerrow">
            <div class="container">
                <div class="row">
                    <div class="themesflat-spacer clearfix" data-desktop="70" data-mobi="40" data-smobi="40" style="height:70px"></div>
                    <div class="col-md-12">
                            <div class="col-md-12">
                                <div class="themesflat-headings style-1 clearfix text-center">
                                    <h2 style="font-size: 25px;font-weight: 700; letter-spacing: 0;color: #37405a">{{__('messages.faq')}}</h2>
                                    <div class="sep"></div>
                                    <div class="clearfix"></div>
                                </div><!-- /.themesflat-headings -->

                                <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20" style="height:20px"></div>

                            </div>
                    </div> <!-- /.col-md-12 -->

                    <div class="col-md-12">
                        <div class="row join">
                            <div class="col-md-12">

                                    <div class="themesflat-headings style-1 clearfix text-center">
                                        <div>
                                            {!! $faq[$lang.'faq'] !!}
                                        </div>
                                        <div class="clearfix"></div>
                                    </div><!-- /.themesflat-headings -->

                                <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40" style="height:40px"></div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div>
        </div>

@endsection
