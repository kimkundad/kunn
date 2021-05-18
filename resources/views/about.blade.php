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

      <img src="{{ url('img/cover_img.png') }}" style=" width: 100%;" class="img-responsive center-block">
		<br>
    <h3>ขุนศึกโต รักชาติ</h3>
        <p>
       <b> พลตรี วรวุฒิ แสงทอง </b> 
        </p>

        <div class="post-quote">
            <span class="icon"></span>
            <blockquote>
            ยศ - ชื่อ  - สกุล     : พลตรี ดร. วรวุฒิ  แสงทอง    ชื่อเล่น  โต 
            ปัจจุบันดำรงตำแหน่ง  : รองผู้อำนวยการศูนย์ประสานการปฏิบัติที่ 1 กองอำนวยการรักษาความมั่นคงภายในราชอาณาจักร  
            ปัจจุบันดำรงตำแหน่ง  : 27 ส.ค. 2511

               
            </blockquote>
        </div>

       
        <p>Email  : Khunsukto.Rakchat@gmail.com</p>

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