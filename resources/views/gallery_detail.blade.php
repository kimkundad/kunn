@extends('layouts.template')

@section('title')
เกี่ยวกับเรา || Wealth Angels
@stop

@section('stylesheet')
<link rel="stylesheet" href="{{ url('assets/fancybox/jquery.fancybox-1.3.4.css') }}" type="text/css" media="screen" />
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
			<h3 class="headline centered margin-bottom-35 margin-top-70">{{ $obj->name }}</h3>
		</div>


        @if(isset($objs))
		@foreach($objs as $u)
		<div class="col-md-4">

        <a id="single_image" href="{{ url('img/folder/'.$u->g_name) }}"><img src="{{ url('img/folder/'.$u->g_name) }}" /></a>

		</div>	
		@endforeach
        @endif
		
        

		

	</div>
</div>



@endsection

@section('scripts')

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script type="text/javascript" src="{{ url('assets/fancybox/jquery.fancybox-1.3.4.pack.js') }}"></script>

<script>
$(document).ready(function() {

/* This is basic - uses default settings */

$("a#single_image").fancybox();

/* Using custom settings */




});
</script>

@stop('scripts')