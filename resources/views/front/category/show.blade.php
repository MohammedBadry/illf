@extends('front.include.master')
@section('title') {{__('messages.hsc')}} | {{session('locale') == 'en' ? $showcategory->encategory : $showcategory->arcategory }} @endsection
@section('content')

    <div class="title_page">
        <div class="container">
            <ul>
                <li><a href="{{asset('/')}}">{{__('messages.home')}} /</a></li>
                <li>{{session('locale') == 'en' ? $showcategory->encategory : $showcategory->arcategory }}</li>
            </ul>
        </div>
    </div>

    <!-- most sold -->
    <div class="products">
        <div class="container text-center">
            <div class="title">
             
            </div>
            
            @foreach($categoryitems as $item)
                <?php 
                    $content  = session('locale') == 'en' ? $item->entitle : $item->artitle;
                    $itemimage = DB::table('item_images')->where('item_id',$item->id)->value('image'); 
                ?>
                <div class="col-md-3">
                    <div class="project_1">
                        <img src="{{asset('users/images/'.$itemimage)}}" alt="">
                        @guest
                        @else
                        <div class="add_favorit">
                            <a type="button" onclick = "return addtowishlist({{$item->id}},{{Auth()->user()->id}})"><i class="far fa-heart"></i></a>
                        </div>
                        @endif

                        <div class="details_project">
                            <a href="{{asset('items/'.$item->id)}}">{!! strlen($content) > 30 ? substr($content,0,30).'....' : $content!!}</a>
                            @if($item->offer == 1)
                                <?php $discount = $item->price == 0 ? 0 :  100 - (($item->discountprice / $item->price) * 100 ) ?>
                                <h3>{{$item->discountprice}} {{__('messages.currancy')}}  <span>{{$item->price}} {{__('messages.currancy')}}</span>  </h3>
                                <div class="cart_discount"> <span>{{__('messages.discount')}}  {{ (int)($discount)}}%</span> </div>
                            @else 
                                <h3>{{$item->price}} {{__('messages.currancy')}} </h3>
                            @endif
                        </div>

                        <div class="cart_project">
                            <a type="button" onclick = "return addtocart('{{$item->id}}','{{ $item->discountprice == null ? $item->price : $item->discountprice}}','1')">
                                <i class="fas fa-shopping-cart"></i>
                                <span>{{__('messages.addtocart')}}</span>
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </div>

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
                        console.log(data);
                        $("#wishlist-text").html(data['count']);
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