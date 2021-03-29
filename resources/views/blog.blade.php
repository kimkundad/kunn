@extends('layouts.template')

@section('title')
บทความการเงิน || Wealth Angels
@stop

@section('stylesheet')

@stop('stylesheet')

@section('content')

<div class="clearfix"></div>
<!-- Header Container / End -->


<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>บทความการเงิน</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{ url('/') }}">หน้าหลัก</a></li>
						<li>บทความการเงิน</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">

	<!-- Blog Posts -->
	<div class="blog-page">
	<div class="row">
		<div class="col-lg-9 col-md-8 padding-right-30">


			@if(isset($objs))
			@foreach($objs as $u)
			<!-- Blog Post -->
			<div class="blog-post">
				
				<!-- Img -->
				<a href="{{ url('blog_detail/'.$u->id) }}" class="post-img">
					<img src="{{ url('img/blog/'.$u->image) }}" alt="">
				</a>
				
				<!-- Content -->
				<div class="post-content">
					<h3><a href="{{ url('blog_detail/'.$u->id) }}">{{ $u->title }} </a></h3>

					<ul class="post-meta">
						<li>{{ formatDateThat($u->created_at) }}</li>
						@if($u->type == 0)
						<li><a href="#">Tips</a></li>
						@else
						<li><a href="#">Stories</a></li>
						@endif
						
					</ul>

					<p>{!! $u->sub_title !!}</p>

					<a href="{{ url('blog_detail/'.$u->id) }}" class="read-more">อ่านต่อ <i class="fa fa-angle-right"></i></a>
				</div>

			</div>
			<!-- Blog Post / End -->
			@endforeach
			@endif


			
            


			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					@include('pagination.default', ['paginator' => $objs])
				</div>
			</div>
			<!-- Pagination / End -->

		</div>

	<!-- Blog Posts / End -->


	<!-- Widgets -->
	<div class="col-lg-3 col-md-4">
		<div class="sidebar right">

			


			


			<!-- Widget -->
			<div class="widget ">

				<h3>Popular Posts</h3>
				<ul class="widget-tabs">


					@if(isset($slide))
					<!-- Post #1 -->
					@foreach($slide as $u)
					<li>
						<div class="widget-content">
								
							
							<div class="widget-text">
								<h5><a href="{{ url('blog_detail/'.$u->id) }}">{{ $u->title }} </a></h5>
								<span>{{ formatDateThat($u->created_at) }}</span>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>
					@endforeach
					@endif
					
					

				</ul>

			</div>
			<!-- Widget / End-->


			<!-- Widget -->
			<div class="widget margin-top-40">
				<h3 class="margin-bottom-25">Social</h3>
				<ul class="social-icons rounded">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
				</ul>

			</div>
			<!-- Widget / End-->

			<div class="clearfix"></div>
			<div class="margin-bottom-40"></div>
		</div>
	</div>
	</div>
	<!-- Sidebar / End -->


</div>
</div>


@endsection

@section('scripts')

@stop('scripts')