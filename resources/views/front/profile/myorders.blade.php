@extends('front.include.master')
@section('title') {{__('messages.hsc')}} | {{__('messages.myorders')}} @endsection
@section('content')

    <div class="title_page">
        <div class="container">
            <ul>
                <li><a href="{{asset('/')}}">{{__('messages.home')}} /</a></li>
                <li>{{__('messages.myorders')}}</li>
            </ul>
        </div>
    </div>

    <div class="pages">
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

@endsection
