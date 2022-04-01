@extends('front.include.master')
@section('title') {{__('messages.sitename')}} | @if(request()->segment(1)=='ar') {{$categoryinfo ? $categoryinfo->arcategory : '?????' }} @else {{$categoryinfo ? $categoryinfo->encategory : '?????' }} @endif  @endsection
@section('content')

    <div id="main-content" class="site-main clearfix">
        <div id="content-wrap">
            <div id="site-content" class="site-content clearfix">
                <div id="inner-content" class="inner-content-wrap">
                    <div class="page-content">

                        <!-- SLIDER -->
                        <div class="rev_slider_wrapper index-slider fullwidthbanner-container">

                            <div id="rev-slider1" class="rev_slider fullwidthabanner">
                                <div class="social-flex">
                                    <a><i class="icon finance-icon-Facebook"></i></a>
                                    <a><i class="icon finance-icon-Twitter"></i></a>
                                    <a><i class="icon finance-icon-instagram"></i></a>
                                    <a><i class="flat-icon-youtube"></i></a>
                                </div>
                                <ul>
                                    @foreach($allsliders as $slider)
                                    <!-- Slide 1 -->
                                    <li data-transition="random">

                                        <!-- Main Image -->
                                        <img src="{{ url('users/images/').'/'.$slider->image }}" alt="" data-bgposition="center center" data-no-retina>
                                    </li>
                                    <!-- /End Slide 1 -->
                                    @endforeach
                                </ul>


                            </div>
                        </div>
                        <!-- END SLIDER -->


                        <!-- supermarket -->
                        <div class="container filter-container">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="themesflat-spacer clearfix" data-desktop="90" data-mobi="40" data-smobi="40"></div>
                                        <div class="type-flex-parent">

                                            <div class="col-md-12">
                                                <div class="row row-custom">

                                                    <div class="col-md-4">
                                                        <div>
                                                            <div>
                                                                <h6 class="state-pro"><span>({{$results->count()}})</span><span>{{__('messages.piece')}}</span></h6>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="themesflat-headings style-1 clearfix text-right">
                                                            <h2 style="font-size: 25px;font-weight: 700; letter-spacing: 0;color: #37405a; text-align: center">
                                                                @if(request()->segment(1)=='ar') {{$categoryinfo->arcategory}} @else {{$categoryinfo->encategory }} @endif
                                                            </h2>
                                                            <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                            <div class="red-sep"></div>
                                                            <div class="clearfix"></div>
                                                            <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                        </div><!-- /.themesflat-headings -->
                                                    </div>
                                                    <!--div class="col-md-4">
                                                        <div>
                                                            <div>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="finance-icon-angle-down"></i>{{__('messages.filter_by')}}
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <a class="dropdown-item" href="#">وصلنا حديثاً</a>
                                                                        <a class="dropdown-item" href="#">الأكثر شهرة</a>
                                                                        <a class="dropdown-item" href="#">ترتيب تصاعدي للأسعار</a>
                                                                        <a class="dropdown-item" href="#">ترتيب تنازلي للأسعار</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                    </div-->
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="themesflat-spacer clearfix" data-desktop="60" data-mobi="40" data-smobi="40"></div>
                                    <div class="content-flex">
                                        <!-- filter -->
                                        <div class="col-md-3">

                                            <div class="filter-flex">

                                                <div class="div-type">
                                                    <p>الفئة</p>
                                                    <figure>({{$results->count()}})</figure>
                                                </div>

                                                @if($subsubcategory != '')
                                                    <div class="form-flex">

                                                        <div>
                                                            <div onclick="slidetoggle(this)" class="collapsible">
                                                                <p>السعر</p>
                                                                <i class="finance-icon-angle-down"></i>
                                                            </div>
                                                            <div class="box">
                                                                <div class="content price">
                                                                    <div class="themesflat-spacer clearfix" data-desktop="50" data-mobi="40" data-smobi="40" style="height:50px"></div>
                                                                    <div>
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div id="slider-range" class="noUi-target noUi-ltr noUi-horizontal noUi-background"><div class="noUi-base"><div class="noUi-origin noUi-connect" style="left: 1.0101%;"><div class="noUi-handle noUi-handle-lower"></div></div><div class="noUi-origin noUi-background" style="left: 19.1919%;"><div class="noUi-handle noUi-handle-upper"></div></div></div></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="themesflat-spacer clearfix" data-desktop="10" data-mobi="10" data-smobi="10" style="height:10px"></div>
                                                                        <div class="row slider-labels">
                                                                            <div class="col-xs-6 caption">
                                                                                <strong>Min:</strong> <span id="slider-range-value1">SR100</span>
                                                                            </div>
                                                                            <div class="col-xs-6 text-right caption">
                                                                                <strong>Max:</strong> <span id="slider-range-value2">SR1,000</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <form>
                                                                                    <input type="hidden" name="min-value" value="">
                                                                                    <input type="hidden" name="max-value" value="">
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @foreach($parentfeatures as $parentfeatur)
                                                            <div>
                                                                <div class="themesflat-spacer clearfix" data-desktop="40" data-mobi="40" data-smobi="40" style="height:40px"></div>
                                                                <div onclick="slidetoggle(this)" class="collapsible">
                                                                    <p>{{$parentfeatur->arname}}</p>
                                                                    <i class="finance-icon-angle-down"></i>
                                                                </div>
                                                                <div class="box">
                                                                    <div class="content price">
                                                                        <div>
                                                                            <div class="content color-choose">
                                                                                <aside>
                                                                                    @foreach($subfeatures as $subfeature)
                                                                                        @if($subfeature->parent == $parentfeatur->id)
                                                                                            <label>{{$subfeature->arname}}<input name="subfeatures[]" value="{{$subfeature->id}}" type="checkbox"> </label>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </aside>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                @elseif($subcategory != '' && $subsubcategory == '')
                                                    <div class="form-flex">
                                                        <div>
                                                            @foreach($includedsubcats as $subcategory)
                                                                <?php $itemcount = DB::table('items')->where('subsubcategory',$subcategory->id)->count(); ?>
                                                                <div class="box">
                                                                    <div class="content">
                                                                        <a href="{{asset('products/'.$subcategory->encategory.'?CAT='.$category.'&SCAT='.$subcategory->parent.'&SSCAT='.$subcategory->id)}}">
                                                                            <p>
                                                                                @if(request()->segment(1)=='ar') {{$subcategory->arcategory}} @else {{$subcategory->encategory }} @endif
                                                                            </p>
                                                                            <figure>({{$itemcount}})</figure>
                                                                        </a>
                                                                        <div class="mySep"></div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="form-flex">
                                                        @if($includedcategories->count() != 0)
                                                            @foreach($includedcategories as $includecategory)
                                                                <?php $subincludedcategories = DB::table('categories')->where('parent',$includecategory->id)->get(); ?>
                                                                <div>
                                                                    <div onclick="slidetoggle(this)" class="collapsible">
                                                                        <a href="{{asset('products/'.$includecategory->encategory.'?CAT='.$includecategory->parent.'&SCAT='.$includecategory->id)}}"><p>
                                                                            @if(request()->segment(1)=='ar') {{$includecategory->arcategory}} @else {{$includecategory->encategory }} @endif
                                                                        </p></a>
                                                                        <i class="finance-icon-angle-down"></i>
                                                                    </div>
                                                                    @if($subincludedcategories->count() != 0)
                                                                        @foreach($subincludedcategories as $subcategory)
                                                                        <?php $itemcount = DB::table('items')->where('subsubcategory',$subcategory->id)->count(); ?>
                                                                            <div class="box">
                                                                                <div class="content">
                                                                                    <a href="{{asset('products/'.$subcategory->encategory.'?CAT='.$includecategory->parent.'&SCAT='.$subcategory->parent.'&SSCAT='.$subcategory->id)}}">
                                                                                        <p>
                                                                                            @if(request()->segment(1)=='ar') {{$subcategory->arcategory}} @else {{$subcategory->encategory }} @endif
                                                                                        </p>
                                                                                        <figure>({{$itemcount}})</figure>
                                                                                    </a>
                                                                                    <div class="mySep"></div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    @else
                                                                        <div class="box">
                                                                            <div class="content">
                                                                                <a>
                                                                                    <p style="width: 100%;">{{__('messages.no_sub_categories')}}</p>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        @else
                                                            <div>
                                                                <div class="collapsible">
                                                                    <p style="width: 100%;">{{__('messages.no_sub_categories')}}</p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif

                                            </div>

                                            <div class="themesflat-spacer clearfix" data-desktop="60" data-mobi="40" data-smobi="40"></div>
                                            <div class="filter-flex">
                                                <div class="div-type blue-type">
                                                    <h6>{{__('messages.special_offer')}}</h6>
                                                    <figure></figure>
                                                </div>
                                                <div class="form-flex">
                                                    @foreach($discounted_items as $item)
                                                    <a href="{{ url('p/'.$item->id) }}">
                                                        <div>
                                                            <div class="box">
                                                                <div class="content">
                                                                    <img src="@if($item->image){{ url('users/images/').'/'.$item->image->image }} @else {{asset('users/assets/img/products/electronics1.png')}} @endif" alt="Image">
                                                                </div>
                                                            </div>
                                                            <div class="box">
                                                                <div class="content">
                                                                    <a class="special">
                                                                        <p>
                                                                            @if(request()->segment(1)=='ar') {{ $item->artitle }} @else {{ $item->entitle }} @endif
                                                                        </p>
                                                                        <!--figure>
                                                                            <i class="finance-icon-star"></i>
                                                                            <i class="finance-icon-star"></i>
                                                                            <i class="finance-icon-star"></i>
                                                                            <i class="finance-icon-star"></i>
                                                                            <i class="finance-icon-star"></i>
                                                                        </figure-->
                                                                    </a>
                                                                    <div class="thumb-flex thumb-flex-custom">
                                                                        <div><span>{{$item->price}}</span><span>{{__('messages.sar')}}</span></div>
                                                                        <div>
                                                                            @if($item->before_price>0)  <em>{{ $item->before_price }}{{__('messages.sar')}}</em> @endif
                                                                        </div>
                                                                    </div>
                                                                        <div class="mySep"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <div class="mySep"></div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>

                                        <div class="themesflat-spacer clearfix" data-desktop="60" data-mobi="40" data-smobi="40"></div>

                                        <div class="col-md-9">
                                            <div class="col-md-12 custom-md-12">

                                                @if($results->count() != 0)
                                                    @foreach($results as $item)
                                                        @include('front.items.partials.item-card2', $item)
                                                    @endforeach
                                                @else
                                                    <div class="empty-page">
                                                        <img src="{{asset('users/assets/img/service/empty-page-product.png')}}" alt="Image">
                                                        <h6>{{__('messages.empty_cat')}}</h6>
                                                    </div>
                                                @endif

                                            </div>
                                            <center>{{ $results->links() }}</center>

                                            <div class="themesflat-spacer clearfix" data-desktop="90" data-mobi="40" data-smobi="40"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End .page-content -->
                </div>
                <!--End #inner-content -->
            </div>
            <!--End #site-content -->
        </div>
        <!--End #content-wrap -->
    </div>

    <script>
        function slidetoggle(el) {
            $(document).ready(function() {
                $(el.parentElement.getElementsByClassName("box")).slideToggle("slow");
            });
        }
    </script>

    @section('script')
        <script type="text/javascript">
            function addtocart(item_id,price,qty)
            {
                var Token = $("input[name='_token']").val();

                $.ajax({
                    type: 'post',
                    url: '{{asset("/cart")}}',
                    data: {
                        _token  : Token,
                        item_id : item_id,
                        price   : price,
                        qty     : qty,
                    },
                    success: function (data) {
                        console.log(data);
                        $("#cart_text").html(data['cartcount']);
                        $("#total_text").html(data['total']);
                        alert('Successflly added to Cart');
                        //toastr.success('Successflly added to Cart');
                    },
                    error: function (data) {
                        alert('error when try to add product to cart');
                    }
                });
            }

            function addtowishlist(item_id,user_id)
            {
                var Token = $("input[name='_token']").val();
                $.ajax({
                    type: 'post',
                    url: '{{asset("/addtowishlist")}}',
                    data: {
                        _token  : Token,
                        item_id : item_id,
                        user_id : user_id,
                    },
                    success: function (data) {
                        $("#wishlistcount").html(data['count']);
                        $("#itemfavouritecount").html(data['count']);
                        alert(data['message']);
                        //toastr.success('Successflly added to Cart');
                    },
                    error: function (data) {
                        alert('error when try to add product to cart');
                    }
                });
            }
        </script>
    @stop

@endsection
