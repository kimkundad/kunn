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
		<div class="col-lg-8 col-lg-offset-2">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="sign-in-form style-1">
                    <form method="POST" class="login" action="{{ route('password.email') }}">
                        @csrf

                        <p class="form-row form-row-wide">
                        <label for="username">{{ __('E-Mail Address') }}
                            <i class="im im-icon-Male"></i>
                            <input type="email" class="input-text" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus/>
                        </label>
                        @error('email')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </p>

                        

                        <div class="form-row">
                                
                                <input type="submit" class="button border margin-top-5" name="login" value="{{ __('Send Password Reset Link') }}" />
                            
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')


@stop('scripts')
