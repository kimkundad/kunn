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
</style>
@stop('stylesheet')

@section('content')






<!-- Content
================================================== -->


<!-- Container -->
<div class="container">

	<div class="row">
		<div class="col-md-12">

			<section id="not-found" class="center">
				
            
				<h4 style="margin-top:150px; font-size:28px">ขอบคุณสำหรับการเข้าร่วมการบรรยายกับเรา</h4>
				<h4>เข้าร่วมและติดตามเราได้ที่</h4>
				<br>
				<h4>เพจ Facebook : ขุนศึกโต รักชาติ <a href="https://www.facebook.com/KhunsuktoRakchat">https://www.facebook.com/KhunsuktoRakchat</a> 
				<br><br> Line@ : <a href="https://lin.ee/FCnpgSv">https://lin.ee/FCnpgSv</a> </h4>
				<!-- Search -->
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6" >
					<a href="https://www.facebook.com/KhunsuktoRakchat"><img src="{{ url('img/messageImage_1617158828138.jpg') }}" class="img-responsive"></a>	
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<a href="https://lin.ee/FCnpgSv"><img src="{{ url('img/messageImage_1617158836326.jpg') }}" class="img-responsive"></a>
						
					</div>
				</div>
				<!-- Search Section / End -->


			</section>

		</div>
	</div>

</div>
<!-- Container / End -->



@endsection

@section('scripts')





@stop('scripts')