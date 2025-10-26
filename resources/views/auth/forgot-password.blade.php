@extends('auth.auth-layout')
@section('class-body','log-in-page')
@section('content')
      <!--======= forgot-password =======-->

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
        	<form action="{{route('password.email')}}" method="post">
				@csrf
				<div class="form-group label-floating">
					<label class="control-label">ایمیل</label>
					<input class="form-control" placeholder="" name="email" type="email" autofocus required>
				</div>
                
                
                <div class="flex items-center justify-end mt-4">
                  <button class="btn btn-lg btn-primary full-width">لینک تغییر رمز عبور </button>
                 </div>
            </form>
        </div>


    </div>



      <!--======= // log_in_page =======-->
      @endsection










