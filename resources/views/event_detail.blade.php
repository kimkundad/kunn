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
        <br>
        <a href="{{ url('/user_review/'.$event->id) }}" class="button">กรอกแบบสอบถามหลังเข้าร่วมงาน</a>

		@if($event->type == 0)
		<div class="text-center margin-bottom-50 margin-top-50">
		<a href="{{ url('/api/regis_event/'.$event->id) }}" class="button btnSendData">ลงทะเบียนเข้าร่วมงาน</a>
		</div>
		@endif

        <p>
            {!! $event->detail !!}
        </p>
        
    <div>
	<div class="text-center margin-bottom-70 margin-top-70">
	
	@if($event->type == 0)
	<a href="{{ url('/api/regis_event/'.$event->id) }}"  class="button btnSendData">ลงทะเบียนเข้าร่วมงาน</a>
	@endif

	<a href="{{ url('/user_review/'.$event->id) }}" class="button">กรอกแบบสอบถามหลังเข้าร่วมงาน</a>
	</div>
			
        </div>
        
        <br><br><br>
        
        
        
        
        <div class="clearfix"></div>

    </div>
</div>
<!-- Blog Post / End -->
</div></div></div>


@endsection

@section('scripts')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>

<script>

var id_event = {{$event->id}};

console.log(id_event)

$(document).on('click','.btnSendData',function (event) {
  event.preventDefault();


  $.LoadingOverlay("show", {
    background  : "rgba(255, 255, 255, 0.4)",
    image       : "",
    fontawesome : "fa fa-cog fa-spin"
  });
  

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
    }
});

  $.ajax({
      url: "{{url('/api/submit_my_events')}}",
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data: { "id_event" : id_event },
      type: 'POST',
      success: function (data) {

      //  console.log(data.data.status)
          if(data.data.status == 200){

            setTimeout(function(){
                $.LoadingOverlay("hide");
            }, 0);

            swal("สำเร็จ!", data.data.msg, "success");

          }else{

            setTimeout(function(){
                $.LoadingOverlay("hide");
            }, 500);

            swal(data.data.msg);

          }
      },
      error: function () {

      }
  });




});
</script>

@stop('scripts')