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
					<a href="{{ url('/') }}"><img src="{{ url('img/khunsukto_logo.png') }}" alt=""></a>
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
					<ul id="responsive" style="font-size: 15px;">
						<li><a href="{{ url('/') }}">หน้าแรก</a></li>
						<li><a href="{{ url('/about') }}">เกี่ยวกับขุนศึกโต</a></li>
						<li><a href="{{ url('/events') }}">งานบรรยาย</a></li>
						<li><a href="{{ url('/blog') }}">ข่าวสาร</a></li>
						<li><a href="{{ url('/contact') }}">ติดต่อขุนศึกโต</a></li>
					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->


			<!-- Right Side Content / End -->
			<div class="right-side">
				<div class="header-widget" style="margin-top: 20px;">
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
							@if(Auth::user()->is_admin == 1)
							<li><a href="{{url('admin/dashboard')}}"><i class="im im-icon-Alien-2"></i>Controller</a></li>
							@endif
							<li><a href="{{url('profile')}}"><i class="sl sl-icon-user"></i>ข้อมูลผู้ใช้งาน</a></li>
							<li><a href="{{url('my_events')}}"><i class="sl sl-icon-tag"></i>งานสัมมนา</a></li>
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