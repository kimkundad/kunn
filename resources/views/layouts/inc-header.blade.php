<!-- Header Container
================================================== -->
<header id="header-container">

	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="{{ url('/') }}"><img src="{{ url('assets/images/logo.png') }}" alt=""></a>
				</div>

				<!-- Mobile Navigation -->
				<div class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation" class="style-1">
					<ul id="responsive">
						<li><a href="{{ url('/') }}">หน้าแรก</a></li>
						<li><a href="{{ url('/about') }}">เกี่ยวกับเรา</a></li>
						<li><a href="{{ url('/events') }}">งานสัมมนา</a></li>
						<li><a href="{{ url('/blog') }}">บทความ</a></li>
						<li><a href="{{ url('/contact') }}">ติดต่อเรา</a></li>
					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">
				<div class="header-widget">
				@if (Auth::guest())
					<a href="{{ url('login') }}" class="sign-in"><i class="sl sl-icon-login"></i> เข้าสู่ระบบ</a>
					<a href="{{ url('register') }}" class="button border with-icon">สมัครสมาชิก <i class="sl sl-icon-plus"></i></a>
				@else
					<div class="user-menu">
						@if(Auth::user()->provider == 'email')
						<div class="user-name" ><span><img src="{{url('assets/images/avatar/'.Auth::user()->avatar)}}" alt=""></span>Hi, {{ Auth::user()->name }}!</div>
						@else
						<div class="user-name" ><span><img src="{{Auth::user()->avatar}}" alt=""></span>Hi, {{ Auth::user()->name }}!</div>
						@endif
						<ul>
							<li><a href="{{url('logout')}}"><i class="sl sl-icon-power"></i> ออกจากระบบ</a></li>
						</ul>
					</div>
				@endif
				</div>
			</div>
			<!-- Right Side Content / End -->

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->