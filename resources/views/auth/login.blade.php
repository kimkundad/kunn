@extends('layouts.template')

@section('ga')
window.gaTitle = 'หน้าแรก';
@endsection

@section('stylesheet')

@stop('stylesheet')

@section('content')


<!-- Container / Start -->
<div class="container margin-bottom-80 margin-top-120">

	<div class="row justify-content-around">


		<!-- Contact Form -->
		<div class="col-lg-6 col-lg-offset-3">

			<section id="contact ">
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
			</section>
		</div>
		<!-- Contact Form / End -->

	</div>

</div>
<!-- Container / End -->

<br><br><br>

@endsection

@section('scripts')


@stop('scripts')