@extends('front.include.master')
@section('title') {{__('messages.hsc')}} | {{__('messages.categories')}} @endsection
@section('content')

    <!-- Categories -->
    <div class="latest_products">
        <div class="container text-center">

            <div class="title">
                <h1>{{__('messages.categories')}}</h1>
                <img src="{{asset('users/images/title.jpg')}}" alt="">
            </div>

            <div class="row">
                @foreach($favourited as $item)
                    @include('front.items.partials.item-card', $item)
                @endforeach
            </div>
        </div>
    </div>


@endsection
