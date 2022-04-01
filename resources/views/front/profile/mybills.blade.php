@extends('front.include.master')
@section('title') {{__('messages.hsc')}} | {{__('messages.mybills')}} @endsection
@section('content')

    <div class="title_page">
        <div class="container">
            <ul>
                <li><a href="{{asset('/')}}">{{__('messages.home')}} /</a></li>
                <li>{{__('messages.mybills')}}</li>
            </ul>
        </div>
    </div>

    <div class="pages">
        <div class="orders">
            <div class="container text-center">
            <table>
            @if(count($mybills) != 0)
                <tbody>
                    <tr>
                        <th>{{__('messages.billcode')}}</th>
                        <th>{{__('messages.total')}}</th>
                        <th>{{__('messages.billstatus')}}</th>
                        <th>{{__('messages.showbill')}}</th>
                        <th>{{__('messages.sendbanktransfer')}}</th>
                    </tr>
                        @foreach($mybills as $bill)
                            <tr>
                                <td>{{$bill->order_number}}</td>
                                <td>{{$bill->total}} {{__('messages.currancy')}}</td>
                                <td style="text-align:center;">
                                    @if($bill->paid == 1)
                                        <span style="border-radius: 3px;border: 1px solid green;color: orange;float:left;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">{{__('messages.active')}}</span>
                                    @elseif($bill->paid == 0) 
                                        <span style="border-radius: 3px;border: 1px solid #c22356;float:left;color:crimson;padding: 3px;font-weight: bold;background: #fff;display: inline-block;margin-top: 4%;" class="ads__item__featured">{{__('messages.notactive')}}</span> 
                                    @endif
                                </td>
                                <td>
                                    <a class="btn-link" href="{{asset('orders/'.$bill->id)}}">{{__('messages.showbill')}}</a>
                                </td>
                                <td style="text-align:center;">
                                    @if($bill->paid == 1)
                                        <span class="text-success">{{__('messages.transfersent')}}</span>
                                    @elseif($bill->paid == 0) 
                                        <a class="btn-link" href="{{asset('banktransfer/'.$bill->order_number)}}">{{__('messages.sendbanktransfer')}}</a>
                                    @endif
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