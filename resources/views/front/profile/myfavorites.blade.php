@extends('front.include.master')
@section('title') {{__('messages.hsc')}} | {{__('messages.myfavourites')}} @endsection
@section('content')

    <div class="title_page">
        <div class="container">
            <ul>
                <li><a href="{{asset('/')}}">{{__('messages.home')}} /</a></li>
                <li>{{__('messages.myfavourites')}}</li>
            </ul>
        </div>
    </div>

    <div class="products">
        <div class="container text-center">
            <div class="title">
            </div>

            @foreach($items as $item)
                <div class="col-md-3">
                    <div class="project_1">
                        <img src="{{asset('users/images/'.$item['image'])}}" alt="">
                        @guest
                        @else
                        <div class="add_favorit">
                        {!! Form::open(array('method' => 'POST','url' =>'/removefromwishlist/'.$item['id'])) !!}
                            <button style="background: none;border: none;" type="submit"><i class="fas fa-heart"></i></button>
                        {!! Form::close() !!}
                        </div>
                        @endif

                        <div class="details_project">
                            <a href="{{asset('items/'.$item['id'])}}">{!! strlen($item['title']) > 30 ? substr($item['title'],0,30).'....' : $item['title']!!}</a>
                            <h3>{{$item['price']}} {{__('messages.currancy')}}  @if($item['discountprice'] != null)<span>{{$item['discountprice']}} {{__('messages.currancy')}}</span>@endif  </h3>
                        </div>

                        <div class="cart_project">
                            <a type="button" onclick = "return addtocart('{{$item['id']}}','{{ $item['discountprice'] == null ? $item['price'] : $item['discountprice']}}','1')">
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
                var Token   = $("input[name='_token']").val();
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

        </script>
    @stop

@endsection
