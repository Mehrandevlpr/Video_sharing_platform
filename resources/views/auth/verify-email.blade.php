@extends('auth.auth-layout')
@section('class-body','full-height')
@section('content')
    <div id="log-in" class="site-form log-in-form">

        <div id="log-in-head">
            <h1>تاییده ایمیل</h1>
            <div id="logo">
                <a href="{{ route('front.index') }}">
                    <img src="{{asset('/img/logo.png')}}" alt="">
                </a>
            </div>
        </div>

        <div class="my-4 text-sm text-gray-600 padding">
            یک لینک تایید به ایمیل شما ارسال شده است. لطفا برای تایید آدرس ایمیل خود بر روی لینک موجود در ایمیل کلیک کنید.
        </div>

        <div class="form-output">
            <x-validation-errors />
            <form action="{{route('verification.send')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-lg btn-primary full-width">ارسال دوباره لینک تایید</button>
            </form>
        </div>

    </div>

    @endsection