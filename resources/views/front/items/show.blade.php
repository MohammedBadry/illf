@extends('front.include.master')
@section('title') {{__('messages.sitename')}} | @if(request()->segment(1)=='ar') {{$showitem ? $showitem->artitle : '?????' }} @else {{$showitem ? $showitem->entitle : '?????' }} @endif @endsection
@section('content')

    <div id="content-wrap">
        <div id="site-content" class="site-content clearfix">
            <div id="inner-content" class="inner-content-wrap">
                <div class="page-content">

                    <div class="themesflat-spacer clearfix" data-desktop="60" data-mobi="40" data-smobi="40"></div>
                    <div class="container mflex">
                        <aside>
                            <div class="img-content">
                                @foreach($adimages as $image)
                                    <img class="mySlides" src="{{asset('users/images/'.$image->image)}}">
                                @endforeach
                                <button class="btn-slider" onclick="plusDivs(-1)">next</button>
                                <button class="btn-slider" onclick="plusDivs(1)">prev</button>
                            </div>
                            <div class="fav-share">
                                <div>
                                    <p>مشاركة</p>
                                    <a><i class="icon finance-icon-Facebook"></i></a>
                                    <a><i class="icon finance-icon-Twitter"></i></a>
                                    <a><i class="finance-icon-instagram"></i></a>

                                </div>
                                @if(auth()->user())
                                    <div>
                                        <p id="itemfavouritecount">({{$favcount}})</p>
                                        <a onclick = "return addtowishlist({{$showitem->id}},{{Auth()->user()->id}})"><i class="icon-fav_fill"></i></a>
                                        <p>أضف للمفضلة</p>
                                    </div>
                                @endif

                            </div>
                        </aside>
                        <aside>
                            <!--div>
                                <article>
                                    <span> البائع :</span>
                                    <span>{{$traderinfo ? $traderinfo->name : '?????'}}</span>
                                </article>
                                <ul>
                                    <i class="finance-icon-star"></i>
                                    <i class="finance-icon-star"></i>
                                    <i class="finance-icon-star"></i>
                                    <i class="finance-icon-star"></i>
                                    <i class="finance-icon-star"></i>
                                </ul>
                                <a>متابعة</a>
                            </div>

                            <div class="pay-terms cutomer-badges">
                                <span>
                                    تاجر مميز
                                </span>
                                <span>
                                    تاجر مميز
                                </span>
                                <span>
                                    تاجر مميز
                                </span>
                                <span>
                                    تاجر مميز
                                </span>
                                <span>
                                    تاجر مميز
                                </span>
                                <span>
                                    تاجر مميز
                                </span>
                                <span>
                                    تاجر مميز
                                </span>
                                <span>
                                    تاجر مميز
                                </span>

                            </div-->

                            <form>
                                <div class="desc-rate">
                                    <span>
                                        {{$showitem->artitle}}
                                    </span>
                                    <ul>
                                        <i class="finance-icon-star"></i>
                                        <i class="finance-icon-star"></i>
                                        <i class="finance-icon-star"></i>
                                        <i class="finance-icon-star"></i>
                                        <i class="finance-icon-star"></i>
                                        <span>(30)</span>
                                    </ul>
                                </div>
                                <div class="price-id">
                                    <span>
                                        <p> {{$showitem->price}} </p>
                                        &nbsp;
                                        <p> ريــال </p>
                                    </span>
                                    <ul>
                                        <span>ID</span>
                                        <span>{{$showitem->code}}</span>
                                    </ul>
                                </div>

                                <div class="custom-desc">
                                    <span>
                                        {{$showitem->ardesc}}
                                    </span>
                                </div>

                                <div class="pay-terms info-terms">
                                    <span>إرجاع مجاني</span>
                                    <span>دفع عند الاستلام</span>
                                    <span>ضمان سنتان</span>
                                </div>

                                <div class="size-cobon">
                                    @foreach($parentitemfeatures as $parentfeatur)
                                        <div class="col-md-12">
                                            <p class="custom-title">{{$parentfeatur->arname}}</p>
                                            <div>
                                                @foreach($subitemfeatures as $subfeature)
                                                    @if($subfeature->parent == $parentfeatur->id)
                                                        <label class="label-item">
                                                            <span>{{$subfeature->arname}}</span>
                                                            <input class="size" name="itemfeatures[]" value="{{$subfeature->arname}}" type="checkbox">
                                                        </label>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div><br>
                                    @endforeach
                                </div>

                                <!--div class="cobon">
                                    <p class="custom-title">
                                        قسيمة شراء لاكثر من 600 ريال
                                    </p>
                                    <div>
                                        <span onclick="myFunction()" class="mycobon">
                                            نسخ الكوبون
                                        </span>
                                        <span>
                                            <input id="myInput" type="text" value="1456416516515fgdf" disabled />
                                        </span>

                                    </div>
                                </div-->

                                <div class="quantity">
                                    <p class="custom-title">الكمية</p>
                                </div>
                                <div class="quantity-details">
                                    <cite onclick="increment(this)">+</cite>
                                    <span class='number-wrapper'>
                                        <input id="productcartcount" type="number" value="1" min="1" max="{{$showitem->stock}}" />
                                    </span>
                                    <cite onclick="decrement(this)">-</cite>

                                </div>

                                <a onclick = "return addtocart('{{$showitem->id}}','{{$showitem->price}}','1')" class="addcart">
                                    <p>أضف للعربة</p>
                                    <i class="finance-icon-shopping-cart"></i>
                                </a>

                            </form>

                        </aside>
                    </div>
                    <div class="themesflat-spacer clearfix" data-desktop="60" data-mobi="40" data-smobi="40"></div>

                    <div class="container">
                        <div class="row">

                            <div class="col-md-12">
                                    <div class="product-details">
                                        <div class="text-center">
                                            <h2 id="detailsID" class="prodetails heading clearfix active-border ">تفاصيل المنتج</h2>
                                        </div>
                                        <div id="advicesID" class="text-center">
                                            <h2  class="prodetails heading clearfix">نصائح التسوق</h2>
                                        </div>
                                        <div id="ratingsID"  class="text-center">
                                            <h2 class="prodetails heading clearfix">تقييم العملاء</h2>
                                        </div>
                                    </div>
                            </div>

                            <div class="themesflat-spacer clearfix" data-desktop="60" data-mobi="40" data-smobi="40"></div>
                            <div id="details" class="col-md-12">

                                <div class="detail-parent">
                                        <div class="details-column">
                                    <div class="details-flex">
                                        <div>
                                            <span>
                                                كود المنتج
                                            </span>
                                        </div>
                                        <div>
                                            <span>
                                                {{$showitem->code}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="details-flex">
                                        <div>
                                            <span>
                                                الفئة
                                            </span>
                                        </div>
                                        <div>
                                            @if($parentcat)<span><a href="{{asset('products/'.$parentcat->encategory.'?CAT='.$parentcat->id)}}" style="color:#f14635">{{$parentcat->arcategory}}</a>/</span>@endif
                                            @if($parentcat && $subcat)<span><a href="{{asset('products/'.$subcat->encategory.'?CAT='.$parentcat->id.'&SCAT='.$subcat->id)}}" style="color:#f14635">{{$subcat->arcategory}}</a>/</span>@endif
                                            @if($parentcat && $subcat && $subsubcat)<span><a href="{{asset('products/'.$subsubcat->encategory.'?CAT='.$parentcat->id.'&SCAT='.$subcat->id.'&SSCAT='.$subsubcat->id)}}" style="color:#f14635">{{$subsubcat->arcategory}}</a>/</span>@endif
                                        </div>
                                    </div>

                                </div>

                                <div class="side-details">
                                    <img src="{{asset('users/assets/img/service/scales.png')}}">
                                </div>
                                </div>
                            </div>

                            <div id="advices" class="col-md-12 mysliding">
                                <div class="advice-flex">
                                    <div>
                                        <a>
                                            عملية الطلب
                                        </a>
                                    </div>
                                    <div>
                                        <a>
                                            وقت التحضير والتوصيل
                                        </a>
                                    </div>
                                </div>
                                <div class="advice-flex">
                                    <div>
                                        <a>
                                            طرق الدفع
                                        </a>
                                    </div>
                                    <div >
                                        <a>
                                            سياسة الارجاع
                                        </a>
                                    </div>
                                </div>
                                <div class="advice-flex">
                                    <div>
                                        <a>
                                            الدفع عند الاستلام
                                        </a>
                                    </div>
                                    <div>
                                        <a>
                                            نصائح الشحن
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div id="ratings" class="col-md-12 mysliding">
                                    <div class="eval">
                                        <aside>
                                            <h2>3.0</h2>
                                            <div>
                                                <i class="finance-icon-star"></i>
                                                <i class="finance-icon-star"></i>
                                                <i class="finance-icon-star"></i>
                                                <i class="finance-icon-star"></i>
                                                <i class="finance-icon-star"></i>
                                            </div>
                                        </aside>
                                        <aside>
                                            <p>متوسط التقييم</p>
                                        </aside>
                                    </div>
                                    <div class="comment">
                                        <aside>
                                            <div>
                                            <img src="assets/img/products/myproduct.png">
                                            </div>
                                        </aside>
                                        <aside>
                                            <div>
                                                <article>
                                                    <span>أحمد محمد السيد</span>
                                                    <div>
                                                        <i class="finance-icon-star"></i>
                                                        <i class="finance-icon-star"></i>
                                                        <i class="finance-icon-star"></i>
                                                        <i class="finance-icon-star"></i>
                                                        <i class="finance-icon-star"></i>
                                                    </div>
                                                </article>
                                                <article>
                                                    <span>اسود</span>
                                                    <span>XL</span>
                                                </article>
                                                <article>
                                                    2/9/2020
                                                </article>
                                            </div>
                                            <div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut nisi ut aliquip commodo consequat
                                            </p>
                                            </div>

                                        </aside>
                                    </div>
                            </div>

                        </div>

                    </div>

                    <div class="themesflat-spacer clearfix" data-desktop="60" data-mobi="40" data-smobi="40"></div>

                    <!-- offers -->
                    <div class="row-partner outerrow">
                        <div class="container">
                            <div class="row">
                                <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="40" data-smobi="40"></div>
                                <div class="col-md-12">
                                    <div class="type-flex-parent">
                                        <div class="col-md-12">
                                            <div class="row row-custom">
                                                <div class="col-md-4 text-right">
                                                    <div class="themesflat-headings style-1 clearfix text-right">
                                                        <h2 style="font-size: 25px;font-weight: 700; letter-spacing: 0;color: #37405a">منتجات موصى بها</h2>
                                                        <div class="sep"></div>
                                                        <div class="clearfix"></div>
                                                    </div><!-- /.themesflat-headings -->
                                                </div>
                                                <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <div>
                                                            <h6 class="offers-p"> </h6>

                                                        </div>

                                                    </div>
                                                    <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div>
                                                        <div>
                                                            <a>
                                                                <h6 class="offers-p all-page" style="text-align: left"></h6>
                                                            </a>

                                                        </div>

                                                    </div>
                                                    <div class="themesflat-spacer clearfix" data-desktop="20" data-mobi="20" data-smobi="20"></div>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div> <!-- /.col-md-12 -->
                                <div class="themesflat-spacer clearfix" data-desktop="70" data-mobi="40" data-smobi="40"></div>
                                <div class="col-md-12 over">
                                    <div class="themesflat-partner style-1 arrow-center offset30 offset-v0 has-arrows arrows-circle w32" data-auto="false" data-loop="false" data-column="3" data-column2="2" data-column3="1" data-gap="60">
                                        <div class="owl-carousel  owl-theme">

                                            @foreach($recommendproducts as $product)
                                                <?php $productimage = DB::table('item_images')->where('item_id',$showitem->id)->first(); ?>
                                                <div class="partner-item  clearfix">
                                                    <div class="inner">
                                                        <div class="thumb">
                                                            <div class="inner-thumb-image">
                                                                <div class="black-over">
                                                                    <div>
                                                                        <a href="{{asset('p/'.$product->entitle)}}"><i class="flat-icon-search3"></i></a>
                                                                        <div>
                                                                            @if(auth()->user())
                                                                                <a onclick = "return addtowishlist({{$showitem->id}},{{Auth()->user()->id}})"><i class="fa icon-fav"></i></a>
                                                                            @endif
                                                                            <a>
                                                                                <p>رابط المنتج</p><i class="flat-icon-link-symbol"></i>
                                                                            </a>
                                                                            <a>
                                                                                <i class="flat-icon-share-button-outline"></i>
                                                                            </a>
                                                                        </div>
                                                                        <a class="myCart" onclick = "return addtocart('{{$product->id}}','{{$product->price}}','1')">
                                                                            <i class="finance-icon-shopping-cart"></i>
                                                                            <span>إضف للعربة</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                @if($productimage)
                                                                    <img src="{{asset('users/images/'.$productimage->image)}}" alt="{{$product->artitle}}">
                                                                @else
                                                                    <img src="{{asset('users/assets/img/products/product9.png')}}" alt="Image">
                                                                @endif
                                                                <div class="parent-thumb">
                                                                    <div class="thumb-flex">
                                                                        <p>{{$product->artitle}}</p>
                                                                        <div>
                                                                            <i class="finance-icon-star"></i>
                                                                            <i class="finance-icon-star"></i>
                                                                            <i class="finance-icon-star"></i>
                                                                            <i class="finance-icon-star"></i>
                                                                            <i class="finance-icon-star"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="thumb-flex">
                                                                        <p>رجالي</p>
                                                                        <div>
                                                                            <span>{{$product->price}}</span><span>ريال</span>
                                                                            <!--em>100SAR</em-->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="themesflat-spacer clearfix" data-desktop="70" data-mobi="40" data-smobi="40"></div>
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div>
                    <!-- /offers -->

                </div>
                <!--End #inner-content -->
            </div>
            <!--End #site-content -->
        </div>
    </div>

    <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            if (n > x.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = x.length
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex - 1].style.display = "block";
        }
    </script>

    <script>
        window.onload = function() {
            $('.size').click(function() {
                if ($(this).prop("checked", true)) {
                    $(".size").prop("checked", false);
                    $(".size").attr("checked", false);
                    $(this).prop("checked", true);
                    $(this).attr("checked", true);
                }
            });

            $('.prodetails').click(function() {
                    $(".prodetails").removeClass("active-border");
                $(this).addClass("active-border");
            });



            $('.label-item').click(function() {
                $(".label-item").removeClass("selected-item");
                $(this).addClass("selected-item");

            });

            $('.cite-item').click(function() {
                $(".cite-item").removeClass("cite-selected");
                $(this).addClass("cite-selected");

            });

            $('#detailsID').click(function() {
                document.getElementById('details').style.display = "block";
                document.getElementById('advices').style.display = "none";
                document.getElementById('ratings').style.display = "none";

            });
            $('#advicesID').click(function() {
                document.getElementById('details').style.display = "none";
                document.getElementById('advices').style.display = "block";
                document.getElementById('ratings').style.display = "none";

            });
            $('#ratingsID').click(function() {
                document.getElementById('details').style.display = "none";
                document.getElementById('advices').style.display = "none";
                document.getElementById('ratings').style.display = "block";

            });

        }
    </script>

    <script>
        function increment(el) {
            var x = el.parentElement.querySelector("input").value;
            x++;
            if (x > el.parentElement.querySelector("input").max) {
                x = el.parentElement.querySelector("input").max;
            }
            el.parentElement.querySelector("input").value = x;
            return false;

        }

        function decrement(el) {
            var x = el.parentElement.querySelector("input").value;
            x--;
            if (x < el.parentElement.querySelector("input").min) {
                x = el.parentElement.querySelector("input").min;
            }
            el.parentElement.querySelector("input").value = x;
            return false;

        }
    </script>

    <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            alert("Copied the text: " + copyText.value);
        }
    </script>

    <script>
        function selectColor(el) {
            var x = el.parentElement.parentElement.querySelector('input');
            x.value = el.parentElement.querySelector('input').value;
        }
    </script>

    @section('script')
        <script type="text/javascript">
            function addtocart(item_id,price,qty)
            {
                var Token = $("input[name='_token']").val();
                var qty   = $("#productcartcount").val();

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
