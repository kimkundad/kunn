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
				<h4 class="headline margin-bottom-35 margin-top-30">สมัครสมาชิก</h4>

				<div id="contact-message"></div> 

                <div class="sign-in-form style-1">
                <form method="POST" action="{{ url('/register') }}" class="login">
                @csrf
                        <p class="form-row form-row-wide">
							<label for="username2">Username:
								<i class="im im-icon-Male"></i>
								<input type="text" class="input-text" name="name" value="{{ old('name') }}" />
							</label>
							@error('name')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
								@enderror
						</p>
								
						<p class="form-row form-row-wide">
							<label for="email2">Email Address:
								<i class="im im-icon-Mail"></i>
								<input type="text" class="input-text" name="email"  value="{{ old('email') }}" />
							</label>
                       
							@error('email')
                                <span class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </span>
								@enderror
						</p>

						<p class="form-row form-row-wide">
							<label for="password1">Password:
								<i class="im im-icon-Lock-2"></i>
								<input class="input-text" type="password" name="password" />
							</label>
        
							@error('password')
                                <span class="text-danger">
                                <strong>รหัสผ่านควรมีอย่างน้อย 8 ตัวขึ้นไป และ password กับ ยืนยัน password ต้องตรงกัน</strong>
                                </span>
								@enderror
						</p>

						<p class="form-row form-row-wide">
							<label for="password2">Repeat Password:
								<i class="im im-icon-Lock-2"></i>
								<input class="input-text" type="password" name="password_confirmation" />
							</label>
						</p>

						<input type="submit" class="button border fw margin-top-10" name="register" value="สมัครสมาชิก" />

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