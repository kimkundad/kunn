@extends('layouts.template')

@section('title')
เกี่ยวกับเรา || Wealth Angels
@stop

@section('stylesheet')
<style>

</style>
@stop('stylesheet')

@section('content')




<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Gallery</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li>Gallery</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->


<!-- Container -->
<div class="container margin-top-70 margin-bottom-70">
	<div class="row">

		<div class="col-md-12">
			<h3 class="headline centered margin-bottom-35 margin-top-70">รวมภาพกิจกกรรมที่ผ่านมา</h3>
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
		
        

		

	</div>
</div>



@endsection

@section('scripts')





@stop('scripts')