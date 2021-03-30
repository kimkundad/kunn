@extends('layouts.template')

@section('title')
อยากลงทุนแต่ไม่รู้จะเริ่มต้นอย่างไร หรือมีปัญหาที่ไม่รู้จะปรึกษาใคร ปรึกษาเราได้ในทุกเรื่องของการลงทุน วางใจให้ แองเจิ้ล || Wealth Angels
@stop

@section('stylesheet')
@stop('stylesheet')

@section('content')

<div class="padding-top-40 padding-bottom-40 parallax"
	data-background="{{ url('assets/images/slider-bg-02.jpg') }}"
	data-color="#36383e"
	data-color-opacity="0"
	data-img-width="800"
	data-img-height="505">
<div class="container " style="padding-left: 0px; padding-right: 0px;">
	<div class="row">

		<div class="col-md-12">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="https://p-u.popcdn.net/hero_images/desktop_images/000/000/167/medium/1b9395419f392bf7da6a11b6e315c0782c01c5fd.jpg?1612178569" alt="...">
      
    </div>
    <div class="item">
      <img src="https://p-u.popcdn.net/hero_images/desktop_images/000/000/172/medium/90507098c85978268055d651a57e43df45a34ff0.jpg?1611893793" alt="...">
      
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon-chevron-left sl sl-icon-arrow-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon-chevron-right sl sl-icon-arrow-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
		</div>

	</div>
</div>
</div>


<!-- Container -->
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline centered margin-bottom-35 margin-top-70">Popular Cities <span>Browse listings in popular places</span></h3>
		</div>
		
		<div class="col-md-4">

			<!-- Image Box -->
			<a href="listings-list-with-sidebar.html" class="img-box" data-background-image="{{ url('img/165990210_116050633900795_6614954977878515547_n.jpg') }}">
				<div class="img-box-content visible">
					<h4>New York </h4>
					<span>14 Listings</span>
				</div>
			</a>

		</div>	
			
		<div class="col-md-8">

			<!-- Image Box -->
			<a href="listings-list-with-sidebar.html" class="img-box" data-background-image="{{ url('img/165843197_116050367234155_825442725899874212_n.jpg') }}">
				<div class="img-box-content visible">
					<h4>Los Angeles</h4>
					<span>24 Listings</span>
				</div>
			</a>

		</div>	

		<div class="col-md-8">

			<!-- Image Box -->
			<a href="listings-list-with-sidebar.html" class="img-box" data-background-image="{{ url('img/166417822_116050433900815_6003868338657347927_n.jpg') }}">
				<div class="img-box-content visible">
					<h4>San Francisco </h4>
					<span>12 Listings</span>
				</div>
			</a>

		</div>	
			
		<div class="col-md-4">

			<!-- Image Box -->
			<a href="listings-list-with-sidebar.html" class="img-box" data-background-image="{{ url('img/164915345_113986617440530_1032446838384860369_n.jpg') }}">
				<div class="img-box-content visible">
					<h4>Miami</h4>
					<span>9 Listings</span>
				</div>
			</a>

		</div>

	</div>
</div>
<!-- Container / End -->


<section class="fullwidth margin-top-70 padding-top-75 padding-bottom-70" data-background-color="#f9f9f9">
	<!-- Info Section -->
	<div class="container">

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h3 class="headline centered">
					สิ่งที่ผู้เข้าร่วมงานของเราพูด
					<span class="margin-top-25">เรารวบรวมบทวิจารณ์จากผู้ใช้ของเราเพื่อให้คุณได้รับความคิดเห็นอย่างตรงไปตรงมาว่าประสบการณ์ในเว็บไซต์ของเรานั้นเป็นอย่างไร!</span>
				</h3>
			</div>
		</div>

	</div>
	<!-- Info Section / End -->

	<!-- Categories Carousel -->
	<div class="fullwidth-carousel-container margin-top-20">
		<div class="testimonial-carousel testimonials">

			<!-- Item -->
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial">ทำงานด้วยหัวใจ สร้างพลังคนดี คืนแผ่นดิน ขอแสดงความนับถือค่ะ</div>
				</div>
				<div class="testimonial-author">
					<img src="{{ url('img/1016948_225180804351761_2120572456_n.jpg') }}" alt="">
					<h4>Rsa Pume <span>Coffee Shop Owner</span></h4>
				</div>
			</div>
			
			<!-- Item -->
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial">ความรักชาติ ศาสนา เทิดทูนสถาบันพระมหากษัตริย์ เป้าหมาย เป็นคณะครูและ นักเรียน ใน 25 โรงเรียน</div>
				</div>
				<div class="testimonial-author">
					<img src="{{ url('img/145563942_869915243845988_2285363511913583173_o.jpg') }}" alt="">
					<h4>น้องเอมมี่ <span>Clothing Store Owner</span></h4>
				</div>
			</div>

			<!-- Item -->
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial">การประชุมเชิงปฏิบัติการ การสร้างการมีส่วนร่วมของชุมชนหลากหลายวัฒนธรรมเมืองอุตสาหกรรมเชิงนิเวศ ในมิติสิ่งแวดล้อม</div>
				</div>
				<div class="testimonial-author">
					<img src="{{ url('img/119927487_3783254788353211_7165514661812341173_n.jpg') }}" alt="">
					<h4>ผศ. ดร.สุริยา แก้วอาษา <span>Restaurant Owner</span></h4>
				</div>
			</div>

		</div>
	</div>
	<!-- Categories Carousel / End -->

</section>

<!-- Parallax -->
<div class="parallax"
	data-background="{{ url('assets/images/slider-bg-02.jpg') }}"
	data-color="#36383e"
	data-color-opacity="0.6"
	data-img-width="800"
	data-img-height="505">

	<!-- Infobox -->
	<div class="text-content white-font">
		<div class="container">

			<div class="row">
				<div class="col-lg-6 col-sm-8">
					<h2>Streamline Your Business</h2>
					<p>We’re full-service, local agents who know how to find people and home each together. We use online tools with an unmatched search capability to make you smarter and faster.</p>
					<a href="listings-list-with-sidebar.html" class="button margin-top-25">Get Started</a>
				</div>
			</div>

		</div>
	</div>

	<!-- Infobox / End -->

</div>
<!-- Parallax / End -->

<!-- Recent Blog Posts -->
<section class="fullwidth padding-top-75 padding-bottom-75" data-background-color="#f9f9f9">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-50">
					From The Blog
				</h3>
			</div>
		</div>

		<div class="row">
			<!-- Blog Post Item -->
			<div class="col-md-4">
				<a href="pages-blog-post.html" class="blog-compact-item-container">
					<div class="blog-compact-item">
						<img src="{{ url('img/164915345_113986617440530_1032446838384860369_n.jpg') }}" alt="">
						<span class="blog-item-tag">Tips</span>
						<div class="blog-compact-item-content">
							<ul class="blog-post-tags">
								<li>22 August 2017</li>
							</ul>
							<h3>Hotels for All Budgets</h3>
							<p>Sed sed tristique nibh iam porta volutpat finibus. Donec in aliquet urneget mattis lorem. Pellentesque pellentesque.</p>
						</div>
					</div>
				</a>
			</div>
			<!-- Blog post Item / End -->

			<!-- Blog Post Item -->
			<div class="col-md-4">
				<a href="pages-blog-post.html" class="blog-compact-item-container">
					<div class="blog-compact-item">
						<img src="{{ url('img/165680740_115586290613896_3319704199513497414_n.jpg') }}" alt="">
						<span class="blog-item-tag">Tips</span>
						<div class="blog-compact-item-content">
							<ul class="blog-post-tags">
								<li>18 August 2017</li>
							</ul>
							<h3>The 50 Greatest Street Arts In London</h3>
							<p>Sed sed tristique nibh iam porta volutpat finibus. Donec in aliquet urneget mattis lorem. Pellentesque pellentesque.</p>
						</div>
					</div>
				</a>
			</div>
			<!-- Blog post Item / End -->

			<!-- Blog Post Item -->
			<div class="col-md-4">
				<a href="pages-blog-post.html" class="blog-compact-item-container">
					<div class="blog-compact-item">
						<img src="{{ url('img/166146022_116050030567522_8982822517603521279_n.jpg') }}" alt="">
						<span class="blog-item-tag">Tips</span>
						<div class="blog-compact-item-content">
							<ul class="blog-post-tags">
								<li>10 August 2017</li>
							</ul>
							<h3>The Best Cofee Shops In Sydney Neighborhoods</h3>
							<p>Sed sed tristique nibh iam porta volutpat finibus. Donec in aliquet urneget mattis lorem. Pellentesque pellentesque.</p>
						</div>
					</div>
				</a>
			</div>
			<!-- Blog post Item / End -->

			<div class="col-md-12 centered-content">
				<a href="{{ url('blog') }}" class="button border margin-top-10">View Blog</a>
			</div>

		</div>

	</div>
</section>
<!-- Recent Blog Posts / End -->


<section class="fullwidthmargin-top-40 margin-bottom-0 padding-top-60 padding-bottom-65" data-background-color="#ffffff">
	<!-- Logo Carousel -->
	<div class="container">
		<div class="row">

			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-40 margin-top-10">Companies We've Worked With <span>We can assist you with your innovation or commercialisation journey!</span></h3>
			</div>
			
			<!-- Carousel -->
			<div class="col-md-12">
				<div class="logo-slick-carousel dot-navigation">
					
					<div class="item">
						<img src="{{ url('assets/images/logo-01.png') }}" alt="">
					</div>
					
					<div class="item">
						<img src="{{ url('assets/images/logo-02.png') }}" alt="">
					</div>
					
					<div class="item">
						<img src="{{ url('assets/images/logo-03.png') }}" alt="">
					</div>
					
					<div class="item">
						<img src="{{ url('assets/images/logo-04.png') }}" alt="">
					</div>
					
					<div class="item">
						<img src="{{ url('assets/images/logo-05.png') }}" alt="">
					</div>		

					<div class="item">
						<img src="{{ url('assets/images/logo-06.png') }}" alt="">
					</div>	

					<div class="item">
						<img src="{{ url('assets/images/logo-07.png') }}" alt="">
					</div>


				</div>
			</div>
			<!-- Carousel / End -->

		</div>
	</div>
	<!-- Logo Carousel / End -->
</section>

@endsection

@section('scripts')





<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">

$('.carousel').carousel({
  interval: 4000
})



</script>		






@stop('scripts')