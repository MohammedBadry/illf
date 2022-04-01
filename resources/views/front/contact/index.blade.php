@extends('front.include.master')
@section('title') {{__('messages.hsc')}} | {{__('messages.contactus')}} @endsection
@section('content')

  

    <div class="title_page">
        <div class="container">
            <ul>
                <li><a href="{{asset('/')}}">{{__('messages.home')}} /</a></li>
                <li>{{__('messages.contactus')}}</li>
            </ul>
        </div>
    </div>

    <div class="pages">
        <div class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="contact_footer"> 
                            <h1 class="title_footer">{{__('messages.contactus')}}</h1>
                            <p>
                                </p><div class="fl_lef">
                                    <h3> {{$info->email}}</h3>
                                </div>
                            <p></p>

                            <p>
                                </p><div class="fl_lef">
                                    <h3> {{$info->phone}}</h3>
                                </div>
                            <p></p>
                            
                        </div>
                    </div>


                    <div class="col-md-9">
                        <div class="message_contact">
                            <h1>{{__('messages.sendmsg')}}</h1>
                            {!! Form::open(array('method' => 'POST','files' => true,'url' =>'/contactus')) !!} 
                                <div class="col-md-12">
                                    <input type="text" name="name" placeholder="{{__('messages.username')}}"  @guest @else value="{{Auth()->user()->name}}" @endif required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('name') }}</strong></span><br>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" placeholder="{{__('messages.email')}}"  required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('email') }}</strong></span><br>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="phone" placeholder="{{__('messages.phone')}}" @guest @else value="{{Auth()->user()->phone}}" @endif required>
                                    @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('phone') }}</strong></span><br>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <textarea name="message" placeholder="{{__('messages.message')}}" required> {{old('message')}} </textarea>
                                    @if ($errors->has('message'))
                                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('message') }}</strong></span><br>
                                    @endif
                                </div>

                                <div class="col-md-12">
                                    <div class="btn_reg">
                                        <button type="submit">{{__('messages.sendnow')}}</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection 