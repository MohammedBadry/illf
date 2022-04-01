@extends('front.include.master')
@section('title') {{__('messages.sitename')}} | {{__('messages.profile')}} @endsection
@section('content')

    <div id="content-wrap">
        <div id="site-content" class="site-content clearfix">
            <div id="inner-content" class="inner-content-wrap">
                <div class="page-content">
                    <div class="themesflat-spacer clearfix" data-desktop="60" data-mobi="60" data-smobi="60"></div>
                    <div class="container">

                        <div class="side-menu-nav-flex">
                            <div id="hamburgerBtn">&#9776 &nbsp;&nbsp; {{__('messages.profile')}} </div>
                            <nav id="sideMenu">
                                <div class="nav-brand">
                                    <img id="userImg" onclick="loadImg()" src="{{asset('users/assets/img/products/electronics1.png')}}" />
                                    <input type="file" onchange="previewFile()" class="hidden">
                                </div>
                                <ul class="nav-items">
                                    <li class="side-list-item item-active myaccount"><a>{{__('messages.my_account')}}</a><i class="fa icon-account"></i></li>
                                    <li class="side-list-item myadress"><a>{{__('messages.my_addresses')}}</a><i class="fa icon-location_bar"></i></li>
                                    <li class="side-list-item mypayments"><a>{{__('messages.purchases')}}</a><i class="flat-icon-shopping-bag"></i></li>
                                    <li class="side-list-item mywallet"><a>{{__('messages.wallet')}}</a><i class="finance-icon-safebox-3"></i></li>
                                    <li class="side-list-item mycobons"><a>{{__('messages.coupons')}}</a><i class="fa fa-tag"></i></li>
                                    <li class="side-list-item mygifts"><a>{{__('messages.gifts')}}</a><i class="fa fa-gift"></i></li>
                                    <li class="side-list-item myfav"><a>{{__('messages.wishlist')}}</a><i class="fa icon-fav_fill"></i></li>
                                    <li class="side-list-item myevals"><a>{{__('messages.reviews')}}</a><i class="fa icon-grade"></i></li>
                                    <li class="side-list-item mysuggest"><a>{{__('messages.suggestions')}}</a><i class="fa fa-lightbulb-o"></i></li>
                                    <!--li class="side-list-item mybackorder"><a>استرجاع</a><i class="fa fa-repeat"></i></li-->
                                </ul>
                            </nav>
                            <div class="side-flex">
                                <div class="stats-profile">
                                    <div>
                                        <article>
                                            <h6>{{__('messages.total_purchases')}}</h6>
                                            <div><span>0</span><span>{{__('messages.item')}}</span></div>
                                        </article>
                                        <img src="{{asset('users/assets/img/service/diagram.png')}}">
                                    </div>
                                    <div>
                                        <article>
                                            <h6>{{__('messages.total_payments')}}</h6>
                                            <div><span>0</span><span>{{__('messages.sar')}}</span></div>
                                        </article>
                                        <img src="{{asset('users/assets/img/service/diagram.png')}}">
                                    </div>
                                    <div>
                                        <article>
                                            <h6>{{__('messages.wishlist')}}</h6>
                                            <div><span>{{$favouriteitems->count()}}</span><span>{{__('messages.item')}}</span></div>
                                        </article>
                                        <img src="{{asset('users/assets/img/service/diagram.png')}}">
                                    </div>
                                </div>

                                <div id="myaccount" class="parent-flex">

                                    {!! Form::open(array('method' => 'POST','files' => true,'url' =>'/profile')) !!}
                                        <div class="input-flex">
                                            <div>
                                                <h6>الإسم بالكامل</h6>
                                                <div>
                                                    <i class="fa icon-account"></i>
                                                    <input type="text" name="name" value="{{auth()->user()->name}}" placeholder="الإسم بالكامل">
                                                    @if ($errors->has('name'))
                                                        <span class="error">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-flex">
                                            <div>
                                                <h6>البريد الالكتروني</h6>
                                                <div>
                                                    <i class="fa icon-email"></i>
                                                    <input type="email" name="email" value="{{auth()->user()->email}}" placeholder="البريد الإلكترونى">
                                                    @if ($errors->has('email'))
                                                        <span class="error">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>

                                        <div class="input-flex">
                                            <div>
                                                <h6>رقم الجوال</h6>
                                                <div>
                                                    <i class="fa icon-phone"></i>
                                                    <input type="tel" name="phone" value="{{auth()->user()->phone}}" placeholder="رقم الجوال">
                                                    @if ($errors->has('phone'))
                                                        <span class="error">{{ $errors->first('phone') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-flex">
                                            <div>
                                                <h6>الدولة</h6>
                                                <div>
                                                    <i class="fa icon-location"></i>
                                                    <select  id="country" name="country" required>
                                                        <option value="" selected="selected">اختر الدولة</option>
                                                        @foreach($countries as $country )
                                                            <option value="{{$country->id}}" @if(auth()->user()->country == $country->id) selected @endif>{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('country'))
                                                        <span class="error">{{ $errors->first('country') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-flex">
                                            <div>
                                                <h6>المدينة</h6>
                                                <div>
                                                    <i class="fa icon-location"></i>
                                                    <select id="city" name="city" required>
                                                        <option value="" selected="selected">اختر المدينة</option>
                                                        @if($cities->count() != 0)
                                                            @foreach($cities as $city )
                                                                <option value="{{$city->id}}" @if(auth()->user()->city == $city->id) selected @endif>{{$city->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @if ($errors->has('city'))
                                                        <span class="error">{{ $errors->first('city') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-flex">
                                            <div>
                                                <h6>المنطقة</h6>
                                                <div>
                                                    <i class="fa icon-location"></i>
                                                    <select id="area" name="area" required>
                                                        <option value="" selected="selected">اختر المنطقة</option>
                                                        @if($areas->count() != 0)
                                                            @foreach($areas as $area )
                                                                <option value="{{$area->id}}" @if(auth()->user()->area == $area->id) selected @endif>{{$area->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @if ($errors->has('area'))
                                                        <span class="error">{{ $errors->first('area') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn-red">حفظ</button>
                                    {!! Form::close() !!}

                                    @if(auth()->user()->type == 'email')
                                        {!! Form::open(array('method' => 'POST','files' => true,'url' =>'/profile')) !!}
                                            <div class="input-flex">
                                                @if(session('error'))
                                                    <span class="error">{{ session('error') }}</span>
                                                @endif

                                                <div>
                                                    <h6>كلمة المرور الحالية</h6>
                                                    <div>
                                                        <i class="fa icon-lock"></i>
                                                        <input type="password" name="oldpassword" required placeholder="كلمة المرور الحالية">
                                                        @if ($errors->has('oldpassword'))
                                                            <span class="error">{{ $errors->first('oldpassword') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="input-flex">
                                                <div>
                                                    <h6>كلمة المرور الجديدة</h6>
                                                    <div>
                                                        <i class="fa icon-lock"></i>
                                                        <input type="password" name="password" required placeholder="كلمة المرور الجديدة">
                                                        @if ($errors->has('password'))
                                                            <span class="error">{{ $errors->first('password') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="input-flex">
                                                <div>
                                                    <h6>تأكيد كلمة المرور</h6>
                                                    <div>
                                                        <i class="fa icon-lock"></i>
                                                        <input type="password" name="password_confirmation" required placeholder="تأكيد كلمة المرور">
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn-red">حفظ</button>
                                        {!! Form::close() !!}
                                    @endif

                                </div>

                                <div id="myadress" class="parent-flex hidden">
                                    <div class="img-address">
                                        <img src="{{asset('users/assets/img/service/address.png')}}">
                                        <button onclick="cloneRadio()" class="btn-red address-btn">أنشئ عنوان جديد</button>
                                    </div>

                                    {!! Form::open(array('method' => 'POST','id' =>'addressform', 'class' => 'hidden' ,'files' => true,'url' =>'/profile')) !!}
                                        <div class="radio redio-new">
                                            <input type="hidden" name="addnewlocation">
                                            <div onmouseup="slidetoggle(this)">
                                                <label>
                                                <input type="radio" name="optradio" checked>عنواني<i class="finance-icon-angle-down"></i></label>
                                                <div>
                                                    <button type="submit" class="btn-blue">حفظ</button>
                                                </div>
                                            </div>

                                            <div class="address-container box">
                                                <div>
                                                    <p>الاسم</p>
                                                    <input type="text" name="name" value="{{auth()->user()->name}}"  placeholder="الإسم">
                                                    @if ($errors->has('name'))
                                                        <span class="error">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>

                                                <div>
                                                    <p>بلد الاقامة</p>
                                                     <select  id="countrylocation" name="country" required>
                                                        <option value="" selected="selected">اختر البلد</option>
                                                        @foreach($countries as $country )
                                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('country'))
                                                        <span class="error">{{ $errors->first('country') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p>المدينة</p>
                                                    <select  id="citylocation" name="city" required>
                                                        <option value="" selected="selected">اختر المدينة</option>
                                                    </select>
                                                    @if ($errors->has('city'))
                                                        <span class="error">{{ $errors->first('city') }}</span>
                                                    @endif
                                                </div>

                                                <div>
                                                    <p>المنطقة</p>
                                                    <select  id="arealocation" name="area" required>
                                                        <option value="" selected="selected">اختر المنطقة</option>
                                                    </select>
                                                    @if ($errors->has('area'))
                                                        <span class="error">{{ $errors->first('area') }}</span>
                                                    @endif
                                                </div>

                                                <div>
                                                    <p>اسم / رقم الشارع</p>
                                                    <input type="text" name="street" value="{{old('street')}}"  placeholder="اسم / رقم الشارع">
                                                    @if ($errors->has('street'))
                                                        <span class="error">{{ $errors->first('street') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p>اسم / رقم العمارة</p>
                                                    <input type="text" name="building" value="{{old('building')}}"  placeholder="اسم / رقم العمارة">
                                                    @if ($errors->has('building'))
                                                        <span class="error">{{ $errors->first('building') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p>رقم الطابق</p>
                                                    <input type="text" name="floor" value="{{old('floor')}}"  placeholder="رقم الطابق">
                                                    @if ($errors->has('floor'))
                                                        <span class="error">{{ $errors->first('floor') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p>رقم الشقة</p>
                                                    <input type="text" name="flat" value="{{old('flat')}}"  placeholder="رقم الشقة">
                                                    @if ($errors->has('flat'))
                                                        <span class="error">{{ $errors->first('flat') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p>رقم الهاتف</p>
                                                    <input type="tel" name="phone"  value="{{auth()->user()->phone}}"  placeholder="رقم الهاتف">
                                                    @if ($errors->has('phone'))
                                                        <span class="error">{{ $errors->first('phone') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p>رقم هاتف بديل </p>
                                                    <input type="tel" name="alternativephone" value="{{old('alternativephone')}}"  placeholder="رقم هاتف بديل">
                                                    @if ($errors->has('alternativephone'))
                                                        <span class="error">{{ $errors->first('alternativephone') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p>اقرب معلم لديك </p>
                                                    <input type="text" name="placemark" value="{{old('placemark')}}"  placeholder="اقرب معلم لديك">
                                                    @if ($errors->has('placemark'))
                                                        <span class="error">{{ $errors->first('placemark') }}</span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <p>ملاحظات</p>
                                                    <textarea name="notes" placeholder="ملاحظات">{{old('notes')}}</textarea>
                                                    @if ($errors->has('notes'))
                                                        <span class="error">{{ $errors->first('notes') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    {!! Form::close() !!}

                                    @foreach($mylocations as $location)

                                        {{ Form::open(array('method' => 'DELETE','id' => 'delete-location-form'.$location->id,'url' => array('profile/'.$location->id))) }}
                                            <input type="hidden" name="deletelocation">
                                        {!! Form::close() !!}

                                        {!! Form::open(array('method' => 'patch' ,'files' => true,'url' =>'profile/'.$location->id)) !!}
                                            <div class="radio redio-new">
                                                <input type="hidden" name="updateuserlocation">
                                                <div onmouseup="slidetoggle(this)">
                                                    <label>
                                                    <input type="radio" name="optradio" checked>عنواني<i class="finance-icon-angle-down"></i></label>
                                                    <div>
                                                        <button type="submit" class="btn-blue">تعديل</button>
                                                        <a onclick="event.preventDefault();document.getElementById('delete-location-form{{$location->id}}').submit();" class="btn-blue btn-ghost">حذف</a>
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
                                                        <p>بلد الاقامة</p>
                                                        <select  id="upcountrylocation" name="country" required>
                                                            <option value="" selected="selected">اختر البلد</option>
                                                            @foreach($countries as $country )
                                                                <option value="{{$country->id}}" @if($location->country == $country->id) selected @endif>{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('country'))
                                                            <span class="error">{{ $errors->first('country') }}</span>
                                                        @endif
                                                    </div>

                                                    <div>
                                                        <p>المدينة</p>
                                                        <select  id="upcitylocation" name="city" required>
                                                            <option value="" selected="selected">اختر المدينة</option>
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
                                                        <p>المنطقة</p>
                                                        <select  id="arealocation" name="area" required>
                                                            <option value="" selected="selected">اختر المنطقة</option>
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
                                                        <p>اسم / رقم الشارع</p>
                                                        <input type="text" name="street" value="{{$location->street}}"  placeholder="اسم / رقم الشارع">
                                                        @if ($errors->has('street'))
                                                            <span class="error">{{ $errors->first('street') }}</span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <p>اسم / رقم العمارة</p>
                                                        <input type="text" name="building" value="{{$location->building}}"  placeholder="اسم / رقم العمارة">
                                                        @if ($errors->has('building'))
                                                            <span class="error">{{ $errors->first('building') }}</span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <p>رقم الطابق</p>
                                                        <input type="text" name="floor" value="{{$location->floor}}"  placeholder="رقم الطابق">
                                                        @if ($errors->has('floor'))
                                                            <span class="error">{{ $errors->first('floor') }}</span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <p>رقم الشقة</p>
                                                        <input type="text" name="flat" value="{{$location->flat}}"  placeholder="رقم الشقة">
                                                        @if ($errors->has('flat'))
                                                            <span class="error">{{ $errors->first('flat') }}</span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <p>رقم الهاتف</p>
                                                        <input type="tel" name="phone"  value="{{$location->phone}}"  placeholder="رقم الهاتف">
                                                        @if ($errors->has('phone'))
                                                            <span class="error">{{ $errors->first('phone') }}</span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <p>رقم هاتف بديل </p>
                                                        <input type="tel" name="alternativephone" value="{{$location->alternativephone}}"  placeholder="رقم هاتف بديل">
                                                        @if ($errors->has('alternativephone'))
                                                            <span class="error">{{ $errors->first('alternativephone') }}</span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <p>اقرب معلم لديك </p>
                                                        <input type="text" name="placemark" value="{{$location->placemark}}"  placeholder="اقرب معلم لديك">
                                                        @if ($errors->has('placemark'))
                                                            <span class="error">{{ $errors->first('placemark') }}</span>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <p>ملاحظات</p>
                                                        <textarea name="notes" placeholder="ملاحظات">{{$location->notes}}</textarea>
                                                        @if ($errors->has('notes'))
                                                            <span class="error">{{ $errors->first('notes') }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                        {!! Form::close() !!}
                                    @endforeach

                                </div>


                                <div id="mypayments" class="parent-flex hidden">
                                    <div>
                                        <ul>
                                            <li class="pay-item active-pay-item allorders">{{__('messages.all')}}</li>
                                            <li class="pay-item pending">{{__('messages.pending')}}</li>
                                            <li class="pay-item processing">{{__('messages.processing')}}</li>
                                            <li class="pay-item delivered">{{__('messages.delivered')}}</li>
                                            <li class="pay-item returned">{{__('messages.returned')}}</li>
                                            <!--li class="dropdown open">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <i class="finance-icon-angle-down"></i>تصفية حسب
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">تاريخ الشراء</a>
                                                    <a class="dropdown-item" href="#">الأعلى تكلفة</a>

                                                </div>
                                            </li-->
                                        </ul>

                                        <div class="empty-page allorders">
                                            <div class="orders">
                                                <div class="container text-center">
                                                <table>
                                                @if(count($myorders) != 0)
                                                    <tbody>
                                                        <tr>
                                                            <th>{{__('messages.ordercode')}}</th>
                                                            <th>{{__('messages.total')}}</th>
                                                            <th>{{__('messages.orderstatus')}}</th>
                                                            <th>{{__('messages.showorder')}}</th>
                                                        </tr>
                                                            @foreach($myorders as $order)
                                                                <tr>
                                                                    <td>{{$order->order_number}}</td>
                                                                    <td>{{$order->total}} {{__('messages.currancy')}}</td>
                                                                    <td style="text-align:center;">
                                                                        @if($order->status == 0)
                                                                            <span style="border-radius: 3px;border: 1px solid green;color: orange;float:left;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">{{__('messages.waiting')}}</span>
                                                                        @elseif($order->status == 1)
                                                                                <span style="border-radius: 3px;border: 1px solid green;color: springgreen;float:left;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">{{__('messages.processing')}}</span>
                                                                        @elseif($order->status == 2)
                                                                                <span style="border-radius: 3px;border: 1px solid #c22356;float:left;color:crimson;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">{{__('messages.rejecting')}}</span>
                                                                        @elseif($order->status == 3)
                                                                                <span style="border-radius: 3px;border: 1px solid green;float:left;color:green;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">{{__('messages.finished')}}</span>
                                                                        @elseif($order->status == 4)
                                                                                <span style="border-radius: 3px;border: 1px solid #c22356;float:left;color:crimson;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">{{__('messages.returned')}}</span>
                                                                        @endif


                                                                        @if($order->status != 4)
                                                                        {{ Form::open(array('method' => 'post',"onclick"=>"return confirm('هل انت متاكد ؟!')",'files' => true,'url' =>'orders/'.$order->id )) }}
                                                                                <input type="hidden" name="status" value="4">
                                                                                <button type="submit" class="btn btn-warning"><i class="fa fa-check" aria-hidden="true"></i>{{__('messages.return_request')}}</button>
                                                                        {!! Form::close() !!}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <a class="btn-link" href="{{asset('orders/'.$order->id)}}">{{__('messages.showorder')}}</a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                    </tbody>
                                                @else
                                                    <h3>{{$errormessage}}</h3>
                                                @endif
                                                </table>
                                                </div>
                                            </div>
                                                                            </div>

                                    </div>
                                </div>

                                <div id="mywallet" class="parent-flex hidden">
                                    <div class="wallet-flex">
                                        <h6>رصيد الحساب</h6>
                                        <div>
                                            <span>SAR</span>
                                            <span>300</span>
                                            <img src="{{asset('users/assets/img/service/wallet.png')}}">
                                        </div>
                                        <a href="payment.html" class="btn-red">شحن الرصيد</a>
                                    </div>
                                </div>

                                <div id="mycobons" class="parent-flex hidden">
                                    <div class="inner-fav">
                                        <div class="empty-page">
                                            <img src="{{asset('users/assets/img/service/gift.png')}}">
                                            <h6>لا توجد كوبونات لك اليوم</h6>
                                        </div>
                                    </div>
                                </div>

                                <div id="mygifts" class="parent-flex hidden">
                                    <div class="empty-page">
                                        <img src="{{asset('users/assets/img/service/gift.png')}}">
                                        <h6>لا توجد هدايا لك اليوم</h6>
                                    </div>

                                    <div class="inner-fav">

                                    </div>
                                </div>
                                <div id="myfav" class="parent-flex hidden">
                                    <div class="inner-fav">
                                        <?php
                                        $favouriteitems = DB::table('favorite_items')->where('user_id',auth()->user()->id)->pluck('item_id')->toArray();
                                        $favitems = DB::table('items')->whereIn('id', $favouriteitems)->get();
                                        ?>
                                        @if ($favitems->count()<1)
                                            <div class="empty-page">
                                                <img src="{{asset('users/assets/img/service/empty-page-product.png')}}">
                                                <h6>لم تقم بتفضيل أي منتج حتي الأن</h6>
                                            </div>
                                        @else
                                            @foreach($favitems as $key => $cartitem)
                                                <?php
                                                    $itempic  = DB::table('item_images')->where('item_id',$cartitem->id)->first();
                                                ?>
                                                <div class="cart-product">
                                                    {!! Form::open(array('method' => 'POST','url' =>'/removefromwishlist/'.$cartitem->id)) !!}
                                                    <input type="hidden" name="deletesessionitem" >
                                                    <button style="background: none;border: none;" type="submit"><i class="fas fa-heart"></i></button>
                                                    {!! Form::close() !!}

                                                    <div>
                                                        @if($itempic)
                                                            <img src="{{asset('users/images/'.$itempic->image)}}" alt="{{$cartitem ? $cartitem->artitle : '?????'}}">
                                                        @else
                                                            <img src="{{asset('users/assets/img/products/product1.png')}}" alt="{{$cartitem ? $cartitem->artitle : '?????'}}">
                                                        @endif
                                                    </div>

                                                    <p>{{$cartitem ? $cartitem->code : '?????'}}</p>

                                                    @if($cartitem)
                                                        <a class="mypreview" href="{{asset('p/'.$cartitem->id)}}">
                                                    @else
                                                        <a class="mypreview" href="">
                                                    @endif
                                                        <img src="{{asset('users/assets/img/service/preview.png')}}">
                                                    </a>

                                                    <div>
                                                        <span>{{$cartitem->price}} SAR</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <div id="myevals" class="parent-flex hidden">

                                     <div class="empty-page">
                                        <img src="{{asset('users/assets/img/service/empty-page-product.png')}}">
                                        <h6>لم تقم بتقييم أي منتج حتي الأن</h6>
                                    </div>

                                    <div>
                                        <div class="proflex">

                                        </div>
                                    </div>

                                </div>

                                <div id="mysuggest" class="parent-flex hidden">
                                    <div>
                                        <img src="{{asset('users/assets/img/service/suggestion.png')}}">
                                    </div>

                                    {{ Form::open(array('method' => 'POST','url' => array('profile'))) }}
                                        <input type="hidden" name="addnewsuggestion">
                                        <input type="text" name="subject" required value="{{old('subject')}}" placeholder="العنوان الرئيسي">
                                        <textarea name="suggestion" required placeholder="إكتب إقتراحك هنا ....">{{old('suggestion')}}</textarea>
                                        <button type="submit" class="btn-blue send-sugg">إرسال</button>
                                    {!! Form::close() !!}

                                </div>

                                <div id="mybackorder" class="parent-flex hidden">

                                    <div class="empty-page">
                                        <img src="{{asset('users/assets/img/service/empty-page-product.png')}}">
                                        <h6>لم تقم بإسترجاع أي منتج حتي الأن</h6>
                                    </div>

                                    <div>
                                        <div class="pro-flex">
                                            <div class="pays">

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
