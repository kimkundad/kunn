<!-- Footer
================================================== -->
<div id="footer" class="dark">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<img class="footer-logo" src="{{ url('img/khunsukto_logo.png') }}" alt="">
				<br><br>
				<p>โครงการ สัมมนาเครือข่ายเสริมสร้างความรู้เกี่ยวกับสถาบันพระมหากษัตริย์ จัดโดย คณะกรรมาธิการวิสามัญการพิทักษ์และเทิดทูนสถาบันพระมหากษัตริย์ สภานิติบัญญัติแห่งชาติ  </p>
			</div>

			<div class="col-md-4 col-sm-6 ">
				<h4>Helpful Links</h4>
				<ul class="footer-links">
					@if (Auth::guest())
					<li><a href="{{ url('login') }}">เข้าสู่ระบบ</a></li>
					<li><a href="{{ url('register') }}">สมัครสมาชิก</a></li>
					@else
					<li><a href="{{ url('profile') }}">ข้อมูลของฉัน</a></li>
					@endif
					<li><a href="{{ url('events') }}#">งานสัมมนา</a></li>
					<li><a href="{{ url('terms') }}#">เงื่อนไขการใช้งาน</a></li>
					<li><a href="{{ url('policy') }}#">ความเป็นส่วนตัว</a></li>
				</ul>

				<ul class="footer-links">
					<li><a href="#">คำถามที่พบบ่อย</a></li>
					<li><a href="{{ url('blog') }}#">บทความ</a></li>
					<li><a href="{{ url('contact') }}#">ติดต่อเรา</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>		

			<div class="col-md-3  col-sm-12">
				<h4>Contact Us</h4>
				<div class="text-widget">
				<!--	<span>Id line :  0979619491</span> <br>
					ที่ทำงาน/แฟกซ์ : <span>02-2436181 </span><br>
					Phone: <span>097-9619491 </span><br> -->
					E-Mail:<span> <a href="#">Khunsukto.Rakchat@gmail.com</a> </span><br>
					Facebook:<span> <a href="https://www.facebook.com/KhunsuktoRakchat/">KhunsuktoRakchat</a> </span><br>
				</div>

				<ul class="social-icons margin-top-20">
					<li><a class="facebook" href="https://www.facebook.com/KhunsuktoRakchat/"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
				</ul>

			</div>

		</div>
		
		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>
			</div>
		</div>

	</div>

</div>
<!-- Footer / End -->