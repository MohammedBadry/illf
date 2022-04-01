@extends('front.include.master')
@section('title') إيلف | سلة المشتريات - تفاصيل الشحن@endsection
@section('content')

    <div id="main-content" class="site-main clearfix">
        <div id="content-wrap">
            <div id="site-content" class="site-content clearfix">
                <div id="inner-content" class="inner-content-wrap">
                    <div class="page-content">

                        <div class="themesflat-spacer clearfix" data-desktop="60" data-mobi="60" data-smobi="60"></div>
                        <div class="container">

                            <div class="payment-steps">
                                <div>
                                    <i class="fa fa-check active-pay"></i>
                                    <p class="active-pay">{{__('messages.order_details')}}</p>
                                    <i class="fa fa-circle active-pay"></i>
                                </div>
                                <div class="line-pay line-active"></div>
                                <div>
                                    <i class="fa fa-truck active-pay"></i>
                                    <p class="active-pay">{{__('messages.charge_details')}}</p>
                                    <i class="fa fa-circle active-pay"></i>
                                </div>
                                <div class="line-pay line-pay-2"></div>
                                <div>
                                    <i class="icon-credit"></i>
                                    <p>{{__('messages.payway')}}</p>
                                    <i class="fa fa-circle"></i>
                                </div>
                            </div>

                            <div class="side-menu-nav-flex">

                                <div id="hamburgerBtn">&#9776 &nbsp;&nbsp; {{__('messages.cart')}} </div>

                                <nav id="sideMenu" class="card-side open">

                                    @include('front.cart.cart-nav')

                                    <div class="cart-flex">
                                        {!! Form::open(array('method' => 'post','id' => 'select-location-form' ,'files' => true,'url' =>'cart')) !!}
                                            <input type="hidden" name="continuepayment">
                                            <input type="hidden" id="selectedlocation" name="selectedlocation" required>
                                        {!! Form::close() !!}
                                        <a style="margin-bottom: 20px;" href="{{asset('cart')}}" class="btn-red">{{__('messages.back')}}</a>
                                        <a onclick="if($('#selectedlocation').val()=='') { alert('{{__('messages.address_required')}}'); } else {event.preventDefault();document.getElementById('select-location-form').submit(); }" class="btn-red">{{__('messages.continue_payment')}}</a>
                                    </div>

                                </nav>

                                <div class="side-flex">

                                    <div class="our-offers">
                                        <p>{{__('messages.delivery_note')}} </p>
                                        <img src="{{asset('users/assets/img/service/our-offers.png')}}">
                                    </div>

                                    <div class="img-address">
                                        <img src="{{asset('users/assets/img/service/address.png')}}">
                                        <button onclick="cloneRadio()" class="btn-red address-btn"> {{__('messages.add_new_address')}}</button>
                                    </div>

                                    {!! Form::open(array('method' => 'POST','id' =>'addressform', 'class' => 'hidden' ,'files' => true,'url' =>'/profile')) !!}
                                        <div class="radio redio-new">
                                            <input type="hidden" name="addnewlocation">
                                            <div onmouseup="slidetoggle(this)">
                                                <label style="display: none"><input type="radio"  name="optradio" checked>{{__('messages.my_address')}}<i class="finance-icon-angle-down"></i></label>
                                                <div>
                                                    <button type="submit" class="btn-blue">{{__('messages.save')}}</button>
                                                </div>
                                            </div>

                                            <div class="address-container box">
                                                <div>
                                                    <p>{{__('messages.name')}}</p>
                                                    <input type="text" name="name" value="{{auth()->user()->name}}"  placeholder="{{__('messages.name')}}">
                                                    @if ($errors->has('name'))
                                                        <span class="error">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>

                                                <div>
                                                    <p>{{__('messages.country')}}</p>
                                                     <select  id="countrylocation" name="country" required>
                                                        <option value="" selected="selected">{{__('messages.choose')}} {{__('messages.country')}}</option>
                                                        @foreach($countries as $country )
                                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('country'))
                                                        <span class="error">{{ $errors->first('country') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p>{{__('messages.city')}}</p>
                                                    <select  id="citylocation" name="city" required>
                                                        <option value="" selected="selected">{{__('messages.choose')}} {{__('messages.city')}}</option>
                                                    </select>
                                                    @if ($errors->has('city'))
                                                        <span class="error">{{ $errors->first('city') }}</span>
                                                    @endif
                                                </div>

                                                <div>
                                                    <p>{{__('messages.district')}}</p>
                                                    <select  id="arealocation" name="area" required>
                                                        <option value="" selected="selected">{{__('messages.choose')}} {{__('messages.district')}}</option>
                                                    </select>
                                                    @if ($errors->has('area'))
                                                        <span class="error">{{ $errors->first('area') }}</span>
                                                    @endif
                                                </div>

                                                <div>
                                                    <p>{{__('messages.street_name_number')}}</p>
                                                    <input type="text" name="street" value="{{old('street')}}"  placeholder="{{__('messages.street_name_number')}}">
                                                    @if ($errors->has('street'))
                                                        <span class="error">{{ $errors->first('street') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p>{{__('messages.building_name_number')}}</p>
                                                    <input type="text" name="building" value="{{old('building')}}"  placeholder="{{__('messages.building_name_number')}}">
                                                    @if ($errors->has('building'))
                                                        <span class="error">{{ $errors->first('building') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p>{{__('messages.floor_number')}}</p>
                                                    <input type="text" name="floor" value="{{old('floor')}}"  placeholder="{{__('messages.floor_number')}}">
                                                    @if ($errors->has('floor'))
                                                        <span class="error">{{ $errors->first('floor') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p>{{__('messages.flat_number')}}</p>
                                                    <input type="text" name="flat" value="{{old('flat')}}"  placeholder="{{__('messages.flat_number')}}">
                                                    @if ($errors->has('flat'))
                                                        <span class="error">{{ $errors->first('flat') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p>{{__('messages.phone_number')}}</p>
                                                    <input type="tel" name="phone"  value="{{auth()->user()->phone}}"  placeholder="{{__('messages.phone_number')}}">
                                                    @if ($errors->has('phone'))
                                                        <span class="error">{{ $errors->first('phone') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p>{{__('messages.alt_phone_number')}} </p>
                                                    <input type="tel" name="alternativephone" value="{{old('alternativephone')}}"  placeholder="{{__('messages.alt_phone_number')}}">
                                                    @if ($errors->has('alternativephone'))
                                                        <span class="error">{{ $errors->first('alternativephone') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p>{{__('messages.nearest_landmark')}} </p>
                                                    <input type="text" name="placemark" value="{{old('placemark')}}"  placeholder="{{__('messages.nearest_landmark')}}">
                                                    @if ($errors->has('placemark'))
                                                        <span class="error">{{ $errors->first('placemark') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p>{{__('messages.notes')}}</p>
                                                    <textarea name="notes" placeholder="{{__('messages.notes')}}">{{old('notes')}}</textarea>
                                                    @if ($errors->has('notes'))
                                                        <span class="error">{{ $errors->first('notes') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    {!! Form::close() !!}

                                    @foreach($mylocations as $key => $location)
                                        {{ Form::open(array('method' => 'DELETE','id' => 'delete-location-form'.$location->id,'url' => array('profile/'.$location->id))) }}
                                            <input type="hidden" name="deletelocation">
                                        {!! Form::close() !!}

                                        {!! Form::open(array('method' => 'patch' ,'files' => true,'url' =>'profile/'.$location->id)) !!}
                                            <div class="radio redio-new">
                                                <input type="hidden" name="updateuserlocation">
                                                <div onmouseup="slidetoggle(this)">
                                                    <label>
                                                        <input type="radio" name="shippingto" value="{{$location->id}}" onclick="$('#selectedlocation').val($(this).val())">{{__('messages.my_address')}}<i class="finance-icon-angle-down"></i>
                                                    </label>
                                                    <div>
                                                        <button type="submit" class="btn-blue">{{__('messages.edit')}}</button>
                                                        <a onclick="event.preventDefault();document.getElementById('delete-location-form{{$location->id}}').submit();" class="btn-blue btn-ghost">{{__('messages.delete')}}</a>
                                                    </div>
                                                </div>

                                                <div class="address-container box">
                                                    <div>
                                                        <p>الاسم</p>
                                                        <input type="text" name="name" value="{{$location->name}}"  placeholder="الإسم">
                                                        @if ($errors->has('name'))
                                                            <span class="error">{{ $errors->first('name') }}</span>
                                                        @endif
                                                    </div>

                                                    <div>
                                                        <p>{{__('messages.country')}}</p>
                                                        <select  id="upcountrylocation" name="country" required>
                                                            <option value="" selected="selected">{{__('messages.choose')}} {{__('messages.country')}}</option>
                                                            @foreach($countries as $country )
                                                                <option value="{{$country->id}}" @if($location->country == $country->id) selected @endif>{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('country'))
                                                            <span class="error">{{ $errors->first('country') }}</span>
                                                        @endif
                                                    </div>

                                                    <div>
                                                        <p>{{__('messages.choose')}}</p>
                                                        <select  id="upcitylocation" name="city" required>
                                                            <option value="" selected="selected">{{__('messages.choose')}} {{__('messages.city')}}</option>
                                                            @if($cities->count() != 0)
                                                                @foreach($cities as $city)
                                                                    <option value="{{$city->id}}" @if($location->city == $city->id) selected @endif>{{$city->name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @if ($errors->has('city'))
                                                            <span class="error">{{ $errors->first('city') }}</span>
                                                        @endif
                                                    </div>

                                                    <div>
                                                        <p>{{__('messages.district')}}</p>
                                                        <select  id="arealocation" name="area" required>
                                                            <option value="" selected="selected">{{__('messages.choose')}} {{__('messages.district')}}</option>
                                                            @if($areas->count() != 0)
                                                                @foreach($areas as $area)
                                                                    <option value="{{$area->id}}" @if($location->area == $area->id) selected @endif>{{$area->name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @if ($errors->has('area'))
                                                            <span class="error">{{ $errors->first('area') }}</span>
                                                        @endif
                                                    </div>

                                                    <div>
                                                        <p>{{__('messages.street_name_number')}}</p>
                                                        <input type="text" name="street" value="{{$location->street}}"  placeholder="{{__('messages.street_name_number')}}">
                                                        @if ($errors->has('street'))
                                                            <span class="error">{{ $errors->first('street') }}</span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <p>{{__('messages.building_name_number')}}</p>
                                                        <input type="text" name="building" value="{{$location->building}}"  placeholder="{{__('messages.building_name_number')}}">
                                                        @if ($errors->has('building'))
                                                            <span class="error">{{ $errors->first('building') }}</span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <p>{{__('messages.floor_number')}}</p>
                                                        <input type="text" name="floor" value="{{$location->floor}}"  placeholder="{{__('messages.floor_number')}}">
                                                        @if ($errors->has('floor'))
                                                            <span class="error">{{ $errors->first('floor') }}</span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <p>{{__('messages.flat_number')}}</p>
                                                        <input type="text" name="flat" value="{{$location->flat}}"  placeholder="{{__('messages.flat_number')}}">
                                                        @if ($errors->has('flat'))
                                                            <span class="error">{{ $errors->first('flat') }}</span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <p>{{__('messages.phone_number')}}</p>
                                                        <input type="tel" name="phone"  value="{{$location->phone}}"  placeholder="{{__('messages.phone_number')}}">
                                                        @if ($errors->has('phone'))
                                                            <span class="error">{{ $errors->first('phone') }}</span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <p>{{__('messages.alt_phone_number')}} </p>
                                                        <input type="tel" name="alternativephone" value="{{$location->alternativephone}}"  placeholder="{{__('messages.alt_phone_number')}}">
                                                        @if ($errors->has('alternativephone'))
                                                            <span class="error">{{ $errors->first('alternativephone') }}</span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <p> {{__('messages.nearest_landmark')}}</p>
                                                        <input type="text" name="placemark" value="{{$location->placemark}}"  placeholder="{{__('messages.nearest_landmark')}}">
                                                        @if ($errors->has('placemark'))
                                                            <span class="error">{{ $errors->first('placemark') }}</span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <p>{{__('messages.notes')}}</p>
                                                        <textarea name="notes" placeholder="{{__('messages.notes')}}">{{$location->notes}}</textarea>
                                                        @if ($errors->has('notes'))
                                                            <span class="error">{{ $errors->first('notes') }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                        {!! Form::close() !!}
                                    @endforeach
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
