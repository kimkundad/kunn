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
        <div class="row">

				<div class="col-md-6">
                <div class="input-with-icon medium-icons">
					<label>ชื่อ</label>
					<input type="text" value="">
                    <i class="im im-icon-Checked-User"></i>
                    </div>
				</div>

				<div class="col-md-6">
                <div class="input-with-icon medium-icons">
					<label>นามสกุล</label>
					<input type="text" value="">
                    <i class="im im-icon-Checked-User"></i>
                    </div>
				</div>

				<div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label>E-Mail Address</label>
						<input type="text" value="">
						<i class="im im-icon-Mail"></i>
					</div>
				</div>

				<div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label> เบอร์โทร</label>
						<input type="text" value="">
						<i class="im im-icon-Phone-2"></i>
					</div>
				</div>

                <div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label> Line ID</label>
						<input type="text" value="">
					</div>
				</div>

                <div class="col-md-6">
					<div class="input-with-icon medium-icons">
						<label> Facebook</label>
						<input type="text" value="">
                        <i class="im im-icon-Facebook-2"></i>
					</div>
				</div>

			</div>
            <a href="#" class="button preview pull-right">ลงทะเบียนเข้าร่วม <i class="fa fa-arrow-circle-right"></i></a>
        </div>
        
        <br><br><br>
        
        
        
        
        <div class="clearfix"></div>

    </div>
</div>
<!-- Blog Post / End -->
</div></div></div>


@endsection

@section('scripts')





@stop('scripts')