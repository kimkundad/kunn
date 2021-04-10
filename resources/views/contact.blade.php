@extends('layouts.template')

@section('title')
ติดต่อเรา || Wealth Angels
@stop

@section('stylesheet')

@stop('stylesheet')

@section('content')


<div class="clearfix"></div>
<!-- Map Container / End -->


<!-- Container / Start -->
<div class="container margin-bottom-90" style="margin-top:80px;">

	<div class="row">

		<!-- Contact Details -->
		<div class="col-md-4">

			<h4 class="t-color headline margin-bottom-30 ">ขุนศึกโต รักชาติ</h4>

			<!-- Contact Details -->
			<div class="sidebar-textbox">
				

				<ul class="contact-details">
        <li><i class="im im-icon-Phone-2"></i> <strong>Phone:</strong> <span>{{ setting()->phone }}</span></li>
          <li><i class="im im-icon-Facebook"></i> <strong>Facebook:</strong> <span><a target="_blank" href="{{ setting()->facebook_url }}">{{ setting()->facebook }}</a> </span></li>
					<li><i class="im im-icon-Speach-Bubble11"></i> <strong>Line:</strong> <span><a href="{{ setting()->line_oa_url }}">{{ setting()->line_oa }}</a></span></li>
					<li><i class="im im-icon-Envelope"></i> <strong>E-Mail:</strong> <span><a href="#">{{ setting()->email }}</a></span></li>
				</ul>
			</div>
		</div>

		<!-- Contact Form -->
		<div class="col-md-8">

			<section id="contact">
				<h4 class="headline margin-bottom-35">ส่งข้อความถึงเรา</h4>

				<div id="contact-message"></div> 

					<form id="contactForm">

					<div class="row">
						<div class="col-md-6">
							<div>
								<input name="name" type="text" id="name" placeholder="ชื่อ-นามสกุล" required="required" />
							</div>
						</div>

						<div class="col-md-6">
							<div>
								<input name="email" type="email" id="email" placeholder="อีเมล" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" required="required" />
							</div>
						</div>
					</div>

					<div>
						<input name="subject" type="text" id="subject" placeholder="หัวข้อเรื่อง" required="required" />
					</div>

					<div>
						<div class="g-recaptcha" data-sitekey="6LdBOl8UAAAAALrNu0pKZ5qiNc42G2FYKh8Jmynb"></div>
					</div>

					<div>
						<textarea name="comments" cols="40" rows="3" id="comments" placeholder="ข้อความ" spellcheck="true" required="required"></textarea>
					</div>

					<input type="submit" class="submit button" id="btnSendData" value="ส่งข้อความ" />

					</form>
			</section>
		</div>
		<!-- Contact Form / End -->

	</div>

</div>
<!-- Container / End -->


@endsection

@section('scripts')

<script src='https://www.google.com/recaptcha/api.js?hl=th'></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js"></script>

<script>
$(document).on('click','#btnSendData',function (event) {
  event.preventDefault();
  var form = $('#contactForm')[0];
  var formData = new FormData(form);

  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var msg = document.getElementById("comments").value;
  var phone = document.getElementById("subject").value;




if(name == '' || msg == '' || email == '' || phone == ''){

  swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");

}else{

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
      url: "{{url('/api/add_contact')}}",
      headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
      data: formData,
      processData: false,
      contentType: false,
      cache:false,
      type: 'POST',
      success: function (data) {

      //  console.log(data.data.status)
          if(data.data.status == 200){


            setTimeout(function(){
                $.LoadingOverlay("hide");
            }, 0);

            swal("สำเร็จ!", "ข้อความถูกส่งไปหาเจ้าหน้าที่เรียบร้อยแล้ว", "success");

            $("#name").val('');
            $("#comments").val('');
            $("#email").val('');
            $("#subject").val('');


          setTimeout(function(){
            //    window.location.replace("{{url('clients/success_payment/')}}/"+data.data.value);
          }, 3000);

          }else{

            setTimeout(function(){
                $.LoadingOverlay("hide");
            }, 500);

            swal("กรูณา ป้อนข้อมูลให้ครบถ้วน");

          }
      },
      error: function () {

      }
  });

}


});
</script>

@stop('scripts')