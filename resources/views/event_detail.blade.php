@extends('layouts.template')

@section('title')
{{ $event->name }} || ขุนศึกโต รักชาติ
@stop

@section('stylesheet')


@stop('stylesheet')

@section('content')


<div class="container">

	<!-- Row / Start -->
	<div class="row">

        
        <!-- Post Content -->
		<div class="col-lg-12">

<div class=" single-post">
    

    <div class="post-content">

		
        <img src="{{ url('img/events/'.$event->image) }}" alt="{{$event->name}}" class="img-responsive center-block">
		<br>
        <h3 class="text-danger">@if($event->status_end == 1)
        <a href="#" style=" color: #fff; "class="button">จบงานไปแล้ว</a>
        @endif {{ $event->name }}</h3>
		<h5><b>วันที่ :</b> {{ $event->start_event_date }} {{ $event->end_event_date }}, {{ $event->start_event_time }}</h5>
		<h5><b>สถานที่ :</b> {{ $event->name_address }}, {{ $event->address }}</h5>
		<h5><b>จำนวน :</b> {{ $event->total }} คน</h5>

		@if (Auth::guest())
		@if($event->type == 0)
		<div class="text-center margin-bottom-50 margin-top-50">
		<a href="{{ url('/api/regis_event/'.$event->id) }}" class="button">ลงทะเบียนเข้าร่วมงาน</a>
		</div>
		@endif
		@endif

        <p>
            {!! $event->detail !!}
        </p>
        
    <div>
	@if (Auth::guest())
	@if($event->type == 0)
	<div class="text-center margin-bottom-70 margin-top-70">
	<a href="{{ url('/api/regis_event/'.$event->id) }}" class="button">ลงทะเบียนเข้าร่วมงาน</a>
	</div>
	@endif
	@endif

	

		@if($event->status_end == 0)
		
        <h3 class="margin-top-80 margin-bottom-30">กรอกแบบสอบถามหลังเข้าร่วมงาน</h3>
		<p>เครื่องหมาย <i class="tip" data-tip-content="Name of your business"></i> จำเป็นต้องกรอกให้ครบ</p>
		<form id="contactForm" method="POST" action="{{ url('add_data_user') }}">
		{{ csrf_field() }}
		<input type="hidden" name="e_id" value="{{ $event->id }}">
		
        <div class="row">

				@if ($errors->has('fname'))
				<div class="notification notice large margin-bottom-10">
                    <span class="text-w">
					กรอบ ชื่อ ให้ครบ
                    </span>
				</div>
				@endif

				@if ($errors->has('lname'))
				<div class="notification notice large margin-bottom-10">
                    <span class="text-w">
					กรอบ นามสกุล ให้ครบ
                    </span>
				</div>
				@endif

				@if ($errors->has('email'))
				<div class="notification notice large margin-bottom-10">
                    <span class="text-w">
					กรอบ E-Mail Address ให้ครบ
                    </span>
				</div>
				@endif

				@if ($errors->has('phone'))
				<div class="notification notice large margin-bottom-10">
                    <span class="text-w">
					กรอบ เบอร์โทร ให้ครบ
                    </span>
				</div>
				@endif

				@if ($errors->has('age'))
				<div class="notification notice large margin-bottom-10">
                    <span class="text-w">
					กรอบ อายุ ให้ครบ
                    </span>
				</div>
				@endif

				@if ($errors->has('age'))
				<div class="notification notice large margin-bottom-10">
                    <span class="text-w">
					กรอบ อายุ ให้ครบ
                    </span>
				</div>
				@endif

				@if ($errors->has('study'))
				<div class="notification notice large margin-bottom-10">
                    <span class="text-w">
					กรอบ ระดับการศึกษ ให้ครบ
                    </span>
				</div>
				@endif

				@if ($errors->has('novice'))
				<div class="notification notice large margin-bottom-10">
                    <span class="text-w">
					กรอบ อาชีพ ให้ครบ
                    </span>
				</div>
				@endif

		
				@if ($message = Session::get('error_email'))
				<div class="notification notice large margin-bottom-10">
                    <span class="text-w">
					E-Mail Address ถูกใช้ไปแล้ว
                    </span>
				</div>
				@endif

				@if ($message = Session::get('error_phone'))
				<div class="notification notice large margin-bottom-10">
                    <span class="text-w">
					เบอร์โทรนี้ ถูกใช้ไปแล้ว
                    </span>
				</div>
				@endif

				@if (Auth::guest())

				<div class="col-md-2">
								<h5>คำนำหน้า <i class="tip" data-tip-content="จำเป็นต้องกรอกให้ครบ"></i></h5>
								<select class="chosen-select-no-single" name="first_n" >
									<option value="1"> นาย </option>
									<option value="2"> นางสาว </option>
									<option value="3"> นาง </option>
								</select>
                                
							</div>


				@else

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


				@endif
				

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
					<div class="">
						<label>E-Mail Address <i class="tip" data-tip-content="จำเป็นต้องกรอกให้ครบ"></i></label>
						<input type="text" name="email" value="{{ Auth::user()->email ?? old('email') }}" >
					</div>
				</div>

				<div class="col-md-6">
					<div class="">
						<label> เบอร์โทร <i class="tip" data-tip-content="จำเป็นต้องกรอกให้ครบ"></i></label> 
						<input type="text" name="phone" value="{{ Auth::user()->phone ?? old('phone') }}">
				
					</div>
				</div>

                <div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label> Line ID</label>
						<input type="text" name="line" value="{{ Auth::user()->zipcode ?? old('line') }} ">
					</div>
				</div>

                <div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label> Facebook</label>
						<input type="text" name="facebook" value="{{ Auth::user()->birthday ?? old('facebook') }} ">
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
                                    <option value="" > เลือกอาชีพ </option>
									<option value=" ข้าราชการ/รัฐวิสาหกิจ"> ข้าราชการ/รัฐวิสาหกิจ </option>
									<option value="นักเรียน/นักศึกษา"> นักเรียน/นักศึกษา </option>
									<option value="รับจ้าง/อิสระ"> รับจ้าง/อิสระ </option>
                                    <option value="เกษตรกรรม/ประมง"> เกษตรกรรม/ประมง </option>
                                    <option value="พนักงานบริษัท"> พนักงานบริษัท </option>
                                    <option value=" ค้าขาย/ธุรกิจส่วนตัว/เจ้าของกิจการ">  ค้าขาย/ธุรกิจส่วนตัว/เจ้าของกิจการ </option>
                                
								</select>
				            </div>

				<div class="col-md-12">
				
					<h3 class=" margin-bottom-30 margin-top-30">กรอกแบบสอบถาม</h3>
				</div>

				@if(isset($obj))
                @foreach($obj as $u)
				<div class="col-md-12">
					<h4 class="font-18 margin-bottom-20">{{ $u->qu_name }}</h4>

					@if($u->type == 0)
					@if(isset($u->option))
                	@foreach($u->option as $uu)
					<div class="radio-custom">
						<input type="radio" id="radioExample1" name="value_{{$u->id}}" value="{{ $uu->id }}">
						<label for="radioExample1">{{ $uu->op_name }}</label>
					</div {{$s++}}>
					@endforeach
                    @endif

					@else
					<textarea class="WYSIWYG" name="valuex_{{$u->id}}" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
					@endif
				</div>
				@endforeach
                @endif

			</div>
			<div class="row">
			<div class="col-md-12 text-center">
			<button type="submit" class="button preview">ลงทะเบียนหลังเข้าร่วม <i class="fa fa-arrow-circle-right"></i></button>
			</div>
            </div>
			
			@endif
        </div>
		</form>
        
        <br><br><br>
        
        
        
        
        <div class="clearfix"></div>

    </div>
</div>
<!-- Blog Post / End -->
</div></div></div>


@endsection

@section('scripts')





@stop('scripts')