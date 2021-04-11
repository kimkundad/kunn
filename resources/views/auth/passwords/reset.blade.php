@extends('layouts.template')

@section('ga')
window.gaTitle = 'หน้าแรก';
@endsection

@section('stylesheet')

@stop('stylesheet')

@section('content')
<div class="container margin-bottom-80 margin-top-120">

	<div class="row justify-content-around">


		<!-- Contact Form -->
		<div class="col-lg-8 col-lg-offset-2">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" class="login" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                       

                        <p class="form-row form-row-wide">
                        <label for="username">{{ __('E-Mail Address') }}
                            <i class="im im-icon-Male"></i>
                            <input type="email" class="input-text" name="email" value="{{ $email ?? old('email') }}" placeholder="Email Address" required autofocus/>
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
								<input class="input-text" type="password" name="password" required autocomplete="new-password" />
							</label>
        
							@error('password')
                                <span class="text-danger">
                                <strong>รหัสผ่านควรมีอย่างน้อย 8 ตัวขึ้นไป และ password กับ ยืนยัน password ต้องตรงกัน</strong>
                                </span>
								@enderror
						</p>

						<p class="form-row form-row-wide">
							<label for="password2">{{ __('Confirm Password') }}:
								<i class="im im-icon-Lock-2"></i>
								<input class="input-text" type="password" name="password_confirmation" required autocomplete="new-password"/>
							</label>
						</p>

                       

                        <div class="form-row">
                                
                                <input type="submit" class="button border margin-top-5" name="login" value="{{ __('Reset Password') }}" />
                            
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')


@stop('scripts')
