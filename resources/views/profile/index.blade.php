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




<div class="container margin-top-75 padding-bottom-70">

	<!-- Blockquote
	================================================== -->
	<div class="row">

                <div class="col-md-3 margin-top-0">
                    <div class="boxed-widget-kim margin-top-30 margin-bottom-50">
                        
                        <ul class="listing-details-sidebar-kim">
                            <li class="active">
                                <a href="{{ url('profile') }}"><i class="sl sl-icon-user"></i> ข้อมูลผู้ใช้งาน</a>
                            </li>
                            <li >
                                <a href="{{ url('my_events') }}" ><i class="sl sl-icon-tag"></i> งานสัมมนา</a>
                            </li>
                            
                            <li>
                                <a href="{{ url('logout') }}"><i class="im im-icon-Lock-2"></i> ออกจากระบบ</a>
                            </li>
                        </ul>
                    </div>

                </div>

        <div class="col-md-9">

			<section id="contact">
				<h4 class="headline margin-bottom-35">แก้ไขข้อมูลส่วนตัว</h4>
                <p>เครื่องหมาย <i class="tip" data-tip-content="Name of your business"></i> จำเป็นต้องกรอกให้ครบ</p>


				<div id="contact-message">
                     @if ($errors->has('fname'))
                    <div class="notification error closeable margin-bottom-30">
                        <p>กรอกชื่อจริงของท่านด้วย!</p>
                        <a class="close"></a>
                    </div>
                    @endif

					@if ($errors->has('lname'))
                    <div class="notification error closeable margin-bottom-30">
                        <p>กรอก นามสกุล ของท่านด้วย</p>
                        <a class="close"></a>
                    </div>
                    @endif

					@if ($errors->has('phone'))
                    <div class="notification error closeable margin-bottom-30">
                        <p>กรอก เบอร์โทร ของท่านด้วย</p>
                        <a class="close"></a>
                    </div>
                    @endif

					@if ($errors->has('age'))
                    <div class="notification error closeable margin-bottom-30">
                        <p>กรอก อายุ ของท่านด้วย</p>
                        <a class="close"></a>
                    </div>
                    @endif

					@if ($errors->has('study'))
                    <div class="notification error closeable margin-bottom-30">
                        <p>กรอก ระดับการศึกษา ของท่านด้วย</p>
                        <a class="close"></a>
                    </div>
                    @endif

					@if ($errors->has('novice'))
                    <div class="notification error closeable margin-bottom-30">
                        <p>กรอก อาชีพ ของท่านด้วย</p>
                        <a class="close"></a>
                    </div>
                    @endif

                </div> 

					<form method="POST" action="{{ url('api/post_update_profile') }}" enctype="multipart/form-data">
                    @csrf
					<div class="row">

                            <div class="col-md-2">
								<h5>คำนำหน้า <i class="tip" data-tip-content="จำเป็นต้องกรอกให้ครบ"></i></h5>
								<select class="chosen-select-no-single" name="first_n" >
									<option value="1" 
                                    @if(Auth::user()->first_n == 1)
                                    selected='selected'
                                    @endif
                                    > นาย </option>
									<option value="2"
                                    @if(Auth::user()->first_n == 2)
                                    selected='selected'
                                    @endif
                                    > นางสาว </option>
									<option value="3" 
                                    @if(Auth::user()->first_n == 3)
                                    selected='selected'
                                    @endif
                                    > นาง </option>
								</select>
                                
							</div>

                <div class="col-md-5">
                <div class="">
					<label>ชื่อ <i class="tip" data-tip-content="จำเป็นต้องกรอกให้ครบ"></i></label>
					<input type="text" name="fname" value="{{ Auth::user()->fname ?? old('fname') }}">
               
                    </div>
				</div>

				<div class="col-md-5">
                <div class="">
					<label>นามสกุล <i class="tip" data-tip-content="จำเป็นต้องกรอกให้ครบ"></i></label>
					<input type="text" name="lname" value="{{ Auth::user()->lname ?? old('lname') }}">
                
                    </div>
				</div>

				<div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label>E-Mail Address</label>
						<input type="text" name="email" value="{{ Auth::user()->email ?? old('email') }}" readonly>
						<i class="im im-icon-Mail"></i>
					</div>
				</div>

				<div class="col-md-6">
					<div class="">
						<label> เบอร์โทร <i class="tip" data-tip-content="จำเป็นต้องกรอกให้ครบ"></i></label> 
						<input type="text" name="phone" value="{{ Auth::user()->phone ?? old('phone') }}">
				
					</div>
				</div>

                <div class="col-md-6">
					<div class="">
						<label> Line ID</label>
						<input type="text" name="zipcode" value="{{ Auth::user()->zipcode ?? old('zipcode') }}">
					</div>
				</div>

                <div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label> Facebook</label>
						<input type="text" name="birthday" value="{{ Auth::user()->birthday ?? old('birthday') }}">
                        <i class="im im-icon-Facebook-2"></i>
					</div>
				</div>

                <div class="col-md-6">
					<div class="">
						<label> อายุ <i class="tip" data-tip-content="จำเป็นต้องกรอกให้ครบ"></i></label>
						<input type="text" name="age" value="{{ Auth::user()->age ?? old('age') }}">
					</div>
				</div>

                            <div class="col-md-6">
								<h5>ระดับการศึกษา <i class="tip" data-tip-content="จำเป็นต้องกรอกให้ครบ"></i></h5>
								<select class="chosen-select-no-single" name="study">
                                    @if(Auth::user()->study != null)
                                    <option value="{{ Auth::user()->study }}" selected='selected'> {{ Auth::user()->study }} </option>
                                    @endif
                                    <option value=""> เลือกระดับการศึกษา </option>
									<option value="ประถมศึกษา"> ประถมศึกษา </option>
									<option value="มัธยมศึกษา"> มัธยมศึกษา </option>
									<option value="อาชีวศึกษา"> อาชีวศึกษา </option>
                                    <option value="อุดมศึกษา"> อุดมศึกษา </option>
                                    <option value="อาชีวศึกษา"> อาชีวศึกษา </option>
                                    <option value="ปริญญาตรี"> ปริญญาตรี </option>
                                    <option value="ปริญญาโท"> ปริญญาโท </option>
                                    <option value="ปริญญาเอก"> ปริญญาเอก </option>
                                    <option value="อื่นๆ"> อื่นๆ </option>
								</select>
				            </div>

                            

                            <div class="col-md-12">
								<h5>อาชีพ <i class="tip" data-tip-content="จำเป็นต้องกรอกให้ครบ"></i></h5>
								<select class="chosen-select-no-single" name="novice">
                                    @if(Auth::user()->novice != null)
                                    <option value="{{ Auth::user()->novice }}" selected='selected'> {{ Auth::user()->novice }} </option>
                                    @endif
                                    <option value=""> เลือกอาชีพ </option>
									<option value=" ข้าราชการ/รัฐวิสาหกิจ"> ข้าราชการ/รัฐวิสาหกิจ </option>
									<option value="นักเรียน/นักศึกษา"> นักเรียน/นักศึกษา </option>
									<option value="รับจ้าง/อิสระ"> รับจ้าง/อิสระ </option>
                                    <option value="เกษตรกรรม/ประมง"> เกษตรกรรม/ประมง </option>
                                    <option value="พนักงานบริษัท"> พนักงานบริษัท </option>
                                    <option value=" ค้าขาย/ธุรกิจส่วนตัว/เจ้าของกิจการ">  ค้าขาย/ธุรกิจส่วนตัว/เจ้าของกิจการ </option>
                                
								</select>
				            </div>
                        
					</div>

					<input type="submit" class="submit button margin-top-20" id="btnSendData" value="บันทึกข้อมูล" />

					</form>
			</section>
		</div>
        
        
        

	</div>


</div>


    
    


	</div>
	<!-- Row / End -->

</div>
<!-- Container / End -->



@endsection

@section('scripts')





@stop('scripts')