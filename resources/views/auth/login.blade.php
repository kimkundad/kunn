@extends('layouts.template')

@section('ga')
window.gaTitle = 'หน้าแรก';
@endsection

@section('stylesheet')


<style>
.theme-login-social-login-facebook, .theme-login-social-login-google {
    display: block;
    padding: 10px 12px;
    color: #fff;
    overflow: hidden;
    border-radius: 3px;
    text-decoration: none!important;
    -moz-transition: .3s;
    transition: .3s;
    margin-top:10px;
}
                    .clearfix:after, .clearfix:before, .container-fluid:after, .container-fluid:before, .container:after, .container:before, .dl-horizontal dd:after, .dl-horizontal dd:before, .row:after, .row:before {
    content: " ";
    display: table;
}
.theme-login-social-login-google {
    background: #db4437;
}
                    
                    .theme-login-social-login-facebook span, .theme-login-social-login-google span {
    display: table;
    line-height: 15px;
    font-size: 15px;
    opacity: .9;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=90)";
    filter: alpha(opacity=90);
}
.theme-login-social-login-facebook {
    background: #3b5998;
}
                    .theme-login-social-login-facebook .fa, .theme-login-social-login-google .fa {
    display: block;
    float: left;
    margin-right: 10px;
    font-size: 30px;
    text-shadow: 2px 3px 5px rgb(0 0 0 / 15%);
}
                    .theme-login-social-login-facebook:hover, .theme-login-social-login-google:hover {
    color: #fff;
}
                    .theme-login-social-login-facebook:hover {
    background: #324c81;
}
                    .theme-login-social-separator {
    margin-bottom: 20px;
    position: relative;
}
.theme-login-social-separator:before {
    content: "";
    height: 1px;
    width: 100%;
    position: absolute;
    left: 0;
    top: 50%;
    background: #000;
    z-index: 1;
    opacity: .17;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=17)";
    filter: alpha(opacity=17);
}
.theme-login-social-separator>p {
    display: table;
    margin: 0 auto;
    background: #fff;
    position: relative;
    z-index: 2;
    padding: 0 7px;
    color: #8c8c8c;
    font-size: 16px;
}
.login-new {
    border-radius: 35px;
}
.login-g {
    box-shadow: 0 0 12px 0 rgb(0 0 0 / 10%);
    padding: 15px 30px;
    background: #fff;
}
@media (max-width: 767px){
    .hidden-xs {
    display: none!important;
}
}
.padding-30 {
    padding: 80px 15px 50px;
}

                    </style>


@stop('stylesheet')

@section('content')


<!-- Container / Start -->
<div class="container margin-bottom-80 margin-top-120">

	<div class="row justify-content-around">

        <div class="col-md-10 col-md-offset-1">

        <div class="row justify-content-around">
		<!-- Contact Form -->
        <div class="col-lg-6 hidden-xs">
        <div class="padding-30"><img src="{{ url('img/Login@2x@2x.png') }}" class="img-responsive"></div>
        
        </div>
		<div class="col-lg-6 ">

			<section id="contact " class="login-new login-g">
				<h4 class="headline margin-bottom-35 margin-top-30">เข้าสู่ระบบ</h4>

				<div id="contact-message"></div> 

                <div class="sign-in-form style-1">
                <form method="POST" action="{{ url('/login') }}" class="login">
                @csrf
                    <p class="form-row form-row-wide">
                        <label for="username">Email:
                            <i class="im im-icon-Male"></i>
                            <input type="text" class="input-text" name="email" placeholder="Email Address" />
                        </label>
                        @if ($errors->has('email'))
                            <span class="text-danger">
                                <strong>Email ไม่มีอยู่ในระบบ</strong>
                            </span>
                        @endif
                    </p>

                    <p class="form-row form-row-wide">
                        <label for="password">Password:
                            <i class="im im-icon-Lock-2"></i>
                            <input class="input-text" type="password" name="password" placeholder="Password" />
                        </label>
                        @if ($errors->has('password'))
                            <span class="help-block">
                            <strong>password ไม่ถูกต้อง</strong>
                            </span>
                        @endif
                        <span class="lost_password">
                            <a href="{{ route('password.request') }}" >ลืมพาสเวิร์ด</a>
                        </span>
                    </p>

                    <div class="form-row">
                        
                        <div class="checkboxes margin-top-10">
                            <input type="checkbox" name="remember" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember-me">จดจำฉันไว้ในระบบ</label>
                        </div>
                        <br>
                        <input type="submit" class="button border margin-top-5" name="login" value="เข้าสู่ระบบ" />
                    </div>

                    </form>
                    </div>
                    <br>
                    <div class="theme-login-social-separator"><p>หรือลงชื่อเข้าใช้ด้วย Social Media</p></div>       
                            
                <div class="theme-login-social-login">
                    <div class="row" >
                        <div class="col-md-6">
                            <a class="theme-login-social-login-facebook" href="{{ route('social.oauth', 'facebook') }}">
                                <i class="fa fa-facebook-square"></i>
                                <span>Sign in with<br><b>Facebook</b></span>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a class="theme-login-social-login-google" href="{{ route('social.oauth', 'google') }}">
                            <i class="fa fa-google"></i>
                            <span>Sign in with<br><b>Google</b></span>
                            </a>
                        </div>
                    </div>
                </div>
                <br>
                    



			</section>
		</div>
		<!-- Contact Form / End --></div>
        </div>
	</div>

</div>
<!-- Container / End -->

<br><br><br>

@endsection

@section('scripts')


@stop('scripts')