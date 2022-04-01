<div class="partner-item  clearfix">
    <div class="inner">

            <div class="thumb">
                <div class="inner-thumb-image">
                    <div class="black-over">
                        <div>
                            <a href="{{ url('p/'.$item->id) }}"><i class="flat-icon-search3"></i></a>
                            <div>
                                @guest
                                <a onclick = "return alert('Please login first')"><i class="fa icon-fav"></i></a>
                                @else
                                <a onclick = "return addtowishlist({{$item->id}},{{Auth()->user()->id}})"><i class="fa icon-fav"></i></a>
                                @endif
                                <a href="{{ url('p/'.$item->id) }}">
                                    <p>{{__('messages.item_link')}}</p><i class="flat-icon-link-symbol"></i>
                                </a>
                                <a href="{{ url('p/'.$item->id) }}">
                                    <i class="flat-icon-share-button-outline"></i>
                                </a>
                            </div>
                            <a onclick = "return addtocart('{{$item->id}}','{{$item->price}}','1')" class="myCart">
                                <i class="finance-icon-shopping-cart"></i>
                                <span>{{__('messages.addtocart')}}</span>
                            </a>
                        </div>
                    </div>
                    <img src="@if($item->image){{ url('users/images/').'/'.$item->image->image }} @else {{asset('users/assets/img/products/product9.png')}} @endif" alt="Image">
                    @if($item->before_price>0)
                        @php
                            $rest = $item->before_price-$item->price;
                            $perc = ($rest/$item->price)*100;
                        @endphp
                    <div class="price-thumb">
                        <p>{{$perc}}% {{__('messages.discount')}}</p>
                        <p>{{__('messages.sar')}} {{__('messages.putby')}} {{$rest}}</p>
                    </div>
                    @endif
                    <div class="parent-thumb">
                        <div class="thumb-flex">
                            <p>
                                @if(request()->segment(1)=='ar') {{ $item->artitle }} @else {{ $item->entitle }} @endif
                            </p>
                            <div>
                                <i class="finance-icon-star"></i>
                                <i class="finance-icon-star"></i>
                                <i class="finance-icon-star"></i>
                                <i class="finance-icon-star"></i>
                                <i class="finance-icon-star"></i>
                            </div>

                        </div>
                        <div class="thumb-flex">
                            <p>
                                @if(request()->segment(1)=='ar') {{ $item->cat->arcategory }} @else {{ $item->cat->encategory }} @endif
                            </p>
                            <div>
                                <span>{{$item->price}}</span><span>{{__('messages.sar')}}</span>
                                @if($item->before_price>0)  <em>{{ $item->before_price }}{{__('messages.sar')}}</em> @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
</div>
