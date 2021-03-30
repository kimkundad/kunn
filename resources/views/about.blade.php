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




<div class="margin-bottom-40"></div>
<!-- Container / Start -->
<div class="container">

	<!-- Row / Start -->
	<div class="row">

        
        <!-- Post Content -->
		<div class="col-lg-12">


<!-- Blog Post -->
<div class=" single-post">
    
    

    
    <!-- Content -->
    <div class="post-content">

      <img src="{{ url('img/cover_img.png') }}" class="img-responsive center-block">
		<br>
    <h3>ขุนศึกโต รักชาติ</h3>
        <p>
       <b> พลตรี วรวุฒิ แสงทอง </b> 
        </p>

        <div class="post-quote">
            <span class="icon"></span>
            <blockquote>
                - อายุ 52 ปี  
เกิด 29 ส.ค. 2511 <br>
                - สังกัด  กองทัพบก กระทรวงกลาโหม <br>
                - สถานที่ทำงาน
กองอำนวยการรักษาความมั่นคงภายในราชอาณาจักร (ศปป.1 กอ.รมน.)สวนรื่นฤดี      ถนนนครราชสีมา  แขวงวชิรพยาบาล เขตดุสิต กทม.  10300 <br>
                - ตำแหน่ง รองผู้อำนวยการ ศูนย์ประสานการปฏิบัติที่ 1 ​ <br>
               
            </blockquote>
        </div>

        <p>ที่ทำงาน/แฟกซ์ 02-2436181</p>
        <p>Id line   0979619491</p>
        <p>Email   pt_voravut@yahoo.com</p>

        <br><br><br>
        
        <div class="row text-center">
        
		
		
        </div>
        
        
        <div class="clearfix"></div>

    </div>
</div>
<!-- Blog Post / End -->
        




<!-- Related Posts -->




<div class="margin-top-50"></div>









</div>
<!-- Content / End -->


    
    


	</div>
	<!-- Row / End -->

</div>
<!-- Container / End -->



@endsection

@section('scripts')





@stop('scripts')