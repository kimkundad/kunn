@extends('layouts.template')

@section('title')
อยากลงทุนแต่ไม่รู้จะเริ่มต้นอย่างไร หรือมีปัญหาที่ไม่รู้จะปรึกษาใคร ปรึกษาเราได้ในทุกเรื่องของการลงทุน วางใจให้ แองเจิ้ล || ขุนศึกโต รักชาติ
@stop

@section('stylesheet')

<style>
h2.headline {
    font-size: 30px;
}
h2.headline span {
    font-size: 20px;
}
</style>
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
  <ol class="carousel-indicators" {{$t = 0}}>
  @if(isset($event))
	@foreach($event as $u)
    <li data-target="#carousel-example-generic" data-slide-to="{{$t}}" class="@if($t == 0)
	active
	@else
	@endif"></li>
	@endforeach
    @endif
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" {{$s = 0}}>
	@if(isset($event))
	@foreach($event as $u)
    <div class="item 
	@if($s == 0)
	active
	@else
	@endif
	">
	<a href="{{ url($u->url_btn) }}">
      <img src="{{ url('img/slide/'.$u->image) }}" alt="{{$u->title}}">
	</a>
    </div {{$s++}}>
	@endforeach
    @endif
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


<!-- Info Section -->
<div class="container margin-top-50">

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2 class="headline centered margin-top-50">
			พลตรี ดร. วรวุฒิ แสงทอง<br> "ขุนศึกโต รักชาติ"
				<span class="margin-top-25">สร้างคนดีด้วยประวัติศาสตร์ สร้างชาติด้วยอุดมการณ์</span>
			</h2>
		</div>
	</div>

	<div class="row icons-container">
		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2 with-line">
				<i class="im im-icon-Map2"></i>
				<h3>วิทยากรบรรยาย</h3>
				<p>ด้านการสร้างแรงบันดาลใจ การเสริมสร้างอุดมการณ์ ความรักชาติ ความจงรักภักดีต่อสถาบันชาติ ศาสนา พระมหากษัตริย์ โดยใช้นวัตกรรมการบรรยายประกอบ แสง สี เสียง สื่อ ซาว์ด ภาพ และ เพลงในการบรรยาย อดีต-ปัจจุบัน-อนาคต</p>
			</div>
		</div>

		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2 with-line">
				<i class="im im-icon-Ribbon-2"></i>
				<h3>วิทยากรกิจกรรม</h3>
				<p>ด้านสันทนาการกลุ่ม การละลายพฤติกรรม และ การทำงานเป็นทีมในรูปแบบกิจกรรมเชิงเดี่ยว - กลุ่ม</p>
			</div>
		</div>

		<!-- Stage -->
		<div class="col-md-4">
			<div class="icon-box-2">
				<i class="im im-icon-Add-UserStar"></i>
				<h3>วิทยากรฝึกอบรม </h3>
				<p>การฝึกอบรมเยาวชนและประชาชนทั่วไป ด้านการปลูกฝังระเบียบวินัย , เสริมสร้างความสามัคคี , ความกตัญอยู่กตเวที การเสริมสร้างบุคลิกภาพ และ ปลูกฝังให้เยาวชนมีจิตสำนึก , จิตอาสาและจิตสาธารณะ</p>
			</div>
		</div>


		<!-- Stage -->
		<div class="col-md-6">
			<div class="icon-box-2 with-line">
				<i class="im im-icon-Ribbon-2"></i>
				<h3>วิทยากรการต่อสู้ป้องกันตัว</h3>
				<p>ด้านการต่อสู้ป้องกันตัว ด้วยมือเปล่า กับมือเปล่า, มีด, ไม้, ปืน และเป็นผู้สอนการยิงปืนทั้งเป้านิ่งและรณยุทธ์</p>
			</div>
		</div>

		<!-- Stage -->
		<div class="col-md-6">
			<div class="icon-box-2">
				<i class="im im-icon-Add-UserStar"></i>
				<h3>วิทยากรการฝึกสอนเทคนิคการนำเสนอ </h3>
				<p>การฝึกสอนการพูดและการเป็นวิทยากรในรูปแบบต่างๆ ด้วยเทคนิคการสื่อสาร การถ่ายทอดอารมณ์ผ่านหัวใจ และเทคนิคการใช้ภาษากาย เสริมทักษะในการนำเสนอ</p>
			</div>
		</div>
	</div>

</div>
<!-- Info Section / End -->

<!-- Container -->
<section class="fullwidth border-top margin-top-70 padding-top-75 " data-background-color="#fff">
<div class="container ">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline centered margin-bottom-35 margin-top-70">รูปกิจกรรม ขุนศึกโต รักชาติ </h3>
		</div>
		

		@if(isset($objs))
		@foreach($objs as $u)
		<div class="col-md-6">

			<!-- Image Box -->
			<a href="{{ url('gallery_detail/'.$u->id) }}" class="img-box" data-background-image="{{ url('img/folder/'.$u->image) }}">
				<div class="img-box-content visible">
					<h4>{{$u->name}} </h4>
					<span>{{$u->count}} รูป</span>
				</div>
			</a>

		</div>	
		@endforeach
        @endif

		<div class="col-md-12 padding-top-40 centered-content">
			<a href="{{ url('/gallery') }}" class="button border margin-top-10">ดูเพิ่มเติม</a>
		</div>

	</div>
</div>
</section>
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

			@if(isset($review))
			@foreach($review as $u)
			<!-- Item -->
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial">{{ $u->detail }}</div>
				</div>
				<div class="testimonial-author">
					<img src="{{ url('img/review/'.$u->avatar) }}" alt="ข้อความจาก {{ $u->name }}">
					<h4>{{ $u->name }} <span>{{ $u->position }}</span></h4>
				</div>
			</div>
			@endforeach
			@endif
			

		</div>
	</div>
	<!-- Categories Carousel / End -->

</section>



<section class="fullwidth padding-top-75 padding-bottom-75" data-background-color="#fff">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-50">
					ข่าวสารล่าสุด
				</h3>
			</div>
		</div>

		<div class="row">
		
		@if(isset($blog))
		@foreach($blog as $u)
			<div class="col-md-4">
				<a href="{{ url('blog_detail/'.$u->id) }}" class="blog-compact-item-container">
					<div class="blog-compact-item">
						<img src="{{ url('img/blog/'.$u->image) }}" alt="">
						<div class="blog-compact-item-content">
							<ul class="blog-post-tags">
								<li>{{ formatDateThat($u->created_at) }}</li>
							</ul>
							<h3>{{ $u->title }}</h3>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		@endif

			
		
		
		

			<div class="col-md-12 centered-content">
				<a href="{{ url('blog') }}" class="button border margin-top-10">ดูเพิ่มเติม</a>
			</div>

		</div>

	</div>
</section>



<section class="fullwidthmargin-top-40 border-top margin-bottom-0 padding-top-60 padding-bottom-65" data-background-color="#ffffff">
	<!-- Logo Carousel -->
	<div class="container">
		<div class="row">

			<div class="col-md-12">
				<h3 class="headline centered margin-bottom-40 margin-top-10">ที่เราเคยร่วมงานด้วย <span> การสร้างการมีส่วนร่วมของชุมชนหลากหลายวัฒนธรรมเมืองอุตสาหกรรมเชิงนิเวศ ในมิติสิ่งแวดล้อม</span></h3>
			</div>
			
			<!-- Carousel -->
			<div class="col-md-12">
				<div class="logo-slick-carousel dot-navigation">
					
					@if(isset($ban))
					@foreach($ban as $u)
					<div class="item">
						<img src="{{ url('img/banner/'.$u->image) }}" alt="">
					</div>
					@endforeach
					@endif

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



  $("#my_para").removeClass("parallax-overlay")

$('.carousel').carousel({
  interval: 4000
})



</script>		






@stop('scripts')