@extends('layouts.template')

@section('title')
เกี่ยวกับเรา || Wealth Angels
@stop

@section('stylesheet')
<style>
.img-box:before {
    opacity: 0;
}
.shop.rev_slider .slotholder:after, .home.rev_slider .slotholder:after {

    opacity: 0;
  
}
.list-4, .list-3, .list-2, .list-1 {
    font-size: 14px;
}

</style>
@stop('stylesheet')

@section('content')

<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>บันทึกข้อมูลสำเร็จ</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{ url('profile') }}">ข้อมูลผู้ใช้งาน</a></li>
						<li>บันทึกข้อมูลสำเร็จ</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>


<!-- Container -->
<div class="container">
	<div class="row">
		<div class="col-md-12">

			<div class="booking-confirmation-page">
				<i class="fa fa-check-circle"></i>
				<h2 class="margin-top-30">ทำการบันทึกข้อมูลสำเร็จ!</h2>
				<p>ระบบกำลังนำท่านกลับสู่หน้า ข้อมูลผู้ใช้งาน ในไม่ช้านี้</p>
				<a href="{{ url('profile') }}" class="button margin-top-30">กลับไปหน้าข้อมูลผู้ใช้งาน</a>
			</div>

		</div>
	</div>
</div>
<!-- Container / End -->



@endsection

@section('scripts')


<script>

setTimeout(function(){ 
    window.location.href = '{{ url('profile') }}';
    }, 5000);

</script>


@stop('scripts')