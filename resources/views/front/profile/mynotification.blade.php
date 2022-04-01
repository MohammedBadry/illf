@extends('front.include.master')
@section('title') {{__('messages.hsc')}} | {{__('messages.mynotification')}} @endsection
@section('content')

    <div class="title_page">
        <div class="container">
            <ul>
                <li><a href="{{asset('/')}}">{{__('messages.home')}} /</a></li>
                <li>{{__('messages.mynotification')}}</li>
            </ul>
        </div>
    </div>

        <div class="pages">
        <div class="orders">
            <div class="container text-center">
            <table>
            @if(count($mynotifications) != 0)
                <tbody>
                    <tr>
                        <th>{{__('messages.notification')}}</th>
                    </tr>
                        @foreach($mynotifications as $notification)
                            <tr>
                                <td>{{$notification->notification}}</td>
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