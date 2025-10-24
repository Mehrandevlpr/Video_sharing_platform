@extends('auth.auth-layout')
@section('class-body','sing-up-page')
@section('content')
      <div id="log-in" class="site-form log-in-form">
      
      	<div id="log-in-head">
        	<h1>ثبت نام</h1>
            <div id="logo"><a href="{{route('front.index')}}"><img src="img/logo.png" alt=""></a></div>
        </div>
        
        <div class="form-output">
			<x-validation-errors />
        	<form action="{{route('register.store')}}" method="post">
                @csrf
                <div class="form-group label-floating">
                    <label class="control-label"> نام </label>
                    <input class="form-control" name="name" placeholder="" type="text">
                </div>
    
				<div class="form-group label-floating">
					<label class="control-label">ایمیل</label>
					<input class="form-control" name="email" placeholder="" type="email">
				</div>
				<div class="form-group label-floating">
					<label class="control-label">رمز عبور</label>
					<input class="form-control" name="password" placeholder="" type="password">
				</div>
                
				<div class="form-group label-floating">
					<label class="control-label">تأیید رمز عبور</label>
					<input class="form-control" name="password_confirmation" placeholder="" type="password">
				</div>

                
                
				<div class="remember">
					<div class="checkbox">
						<label>
							<input name="optionsCheckboxes" type="checkbox">
							<a href="#">شرایط و ضوابط</a> سایت را قبول میکنم
						</label>
					</div>
				</div>
                
			  <button class="btn btn-lg btn-primary full-width">ثبت نام</button>

			  <div class="or"></div>


				<p>شما یک حساب کاربری دارید؟ <a href="{{route('login.create')}}"> ورود!</a> </p>
            </form>
        </div>
      </div>
	  @endsection

