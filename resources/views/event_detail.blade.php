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
        <h3 class="text-danger">#{{ $event->name }}</h3>
        <p>
            {!! $event->detail !!}
        </p>
        
        <div>

        <h3 class="margin-top-80 margin-bottom-30">ข้อมูลของผู้เข้าร่วม</h3>
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

				<div class="col-md-6">
                <div class="input-with-icon medium-icons">
					<label>ชื่อ</label>
					<input type="text" name="fname" value="{{ old('fname') }}">
                    <i class="im im-icon-Checked-User"></i>
                    </div>
				</div>

				<div class="col-md-6">
                <div class="input-with-icon medium-icons">
					<label>นามสกุล </label>
					<input type="text" name="lname" value="{{ old('lname') }}">
                    <i class="im im-icon-Checked-User"></i>
                    </div>
				</div>

				<div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label>E-Mail Address</label>
						<input type="text" name="email" value="{{ old('email') }}">
						<i class="im im-icon-Mail"></i>
					</div>
				</div>

				<div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label> เบอร์โทร</label>
						<input type="text" name="phone" value="{{ old('phone') }}">
						<i class="im im-icon-Phone-2"></i>
					</div>
				</div>

                <div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label> Line ID</label>
						<input type="text" name="line" value="{{ old('line') }}">
					</div>
				</div>

                <div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label> Facebook</label>
						<input type="text" name="facebook" value="{{ old('facebook') }}">
                        <i class="im im-icon-Facebook-2"></i>
					</div>
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
					<textarea class="WYSIWYG" name="summary" cols="40" rows="3" id="summary" spellcheck="true"></textarea>
					@endif
				</div>
				@endforeach
                @endif

			</div>
            <button type="submit" class="button preview pull-right">ลงทะเบียนเข้าร่วม <i class="fa fa-arrow-circle-right"></i></button>
			
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