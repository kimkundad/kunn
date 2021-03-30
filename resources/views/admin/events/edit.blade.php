@extends('admin.layouts.template')

@section('ga')
window.gaTitle = 'หน้าแรก';
@endsection

@section('stylesheet')
<style>
.note-editor.note-frame .note-editing-area .note-editable {
    padding: 35px;
    overflow: auto;
    color: #000;
    background-color: #fff;
}
</style>
@stop('stylesheet')

@section('content')



<div class="row">

<div class="col-md-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">ข้อมูล Events</h4>
      <p class="card-description">
        กรอกข้อมูลให้ครบ ในส่วนที่มีเครื่องหมาย <span class="text-danger">*</span>
      </p>

      <form class="forms-sample" method="POST" action="{{$url}}" enctype="multipart/form-data">
        {{ method_field($method) }}
        {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputUsername1">ชื่องาน Event <span class="text-danger">*</span></label>
          <input type="text" class="form-control" placeholder="#March2021 Angular Meetup by CODIUM" name="name" value="{{ $objs->name }}">
        </div>


        <div class="form-group">
          <label for="exampleInputUsername1">จำนวนที่รับ <span class="text-danger">*</span></label>
          <input type="text" class="form-control"  name="total" value="{{ $objs->total }}">
        </div>

        <div class="form-group">
          <label for="exampleInputUsername1">ชื่อสถานที่ <span class="text-danger">*</span></label>
          <input type="text" class="form-control"  name="name_address" placeholder="CODIUM , 11 FLOOR" value="{{ $objs->name_address }}">
        </div>

        <div class="form-group">
          <label for="exampleInputUsername1">ที่อยู่สถานที่ <span class="text-danger">*</span></label>
          <input type="text" class="form-control"  name="address" placeholder="Siam@Siam Design Hotel Bangkok ชั้น 11 BTS สนามกีฬาแห่งชาติ" value="{{ $objs->address }}">
        </div>

        <div class="form-group">
          <label for="exampleInputUsername1">วันที่ <span class="text-danger">*</span></label>
          <input type="text" class="form-control" placeholder="30 Mar 2021"  name="start_event_date" value="{{ $objs->start_event_date }}">
        </div>

        <div class="form-group">
          <label for="exampleInputUsername1">ถึงวันที่ <span class="text-danger">(ไม่ใส่ก็ได้ จะแสดงแค่วันที่เริ่ม)</span></label>
          <input type="text" class="form-control" placeholder="30 Mar 2021"  name="end_event_date" value="{{ $objs->end_event_date }}">
        </div>

        <div class="form-group">
          <label for="exampleInputUsername1">เวลา <span class="text-danger">*</span></label>
          <input type="text" class="form-control" placeholder="at 18:00 - 22:00" name="start_event_time" value="{{ $objs->start_event_time }}">
        </div>


        <div class="form-group">
          <label for="exampleInputEmail1">รายละเอียด <span class="text-danger">*</span></label>
          <textarea class="summernote form-control" id="textareaAutosize" name="detail" >{!! $objs->detail !!}</textarea>
        </div>

        <div class="form-group">
        <br />
        <label for="exampleInputUsername1">รูป Events <span class="text-danger">*</span></label><br />
          <img src="{{ url('img/events/'.$objs->image) }}" style="width: 450px; border: 2px solid #439aff;" >
           <br /><br />
          <label for="exampleInputUsername1">แก้ไขรูป Events <span class="text-danger">*</span></label>
          <input type="file" class="dropify"  name="image" />
          <br />
        </div>


        <div class="form-group">
                      <label for="exampleInputUsername1">เลือก แบบสอบถาม <span class="text-danger">*</span></label>
                      <select class="form-control" name="ex_id" >
                        <option value=""> -- เลือก แบบสอบถาม -- </option>
                      @if(isset($ex))
                      @foreach($ex as $u)
                      <option value="{{$u->id}}" @if( $objs->ex_id == $u->id)
														selected='selected'
														@endif> {{$u->ex_name}} </option>
                      @endforeach
                      @endif
                    </select>
                    </div>

        <div class="form-group">
            <label for="exampleFormControlSelect2">ประเภทบทความ <span class="text-danger">*</span></label>
                      <select class="form-control" name="type">
                        <option value="">เลือกประเถท</option>
                        <option value="0" @if( $objs->type == 0)
                                        selected='selected'
                                        @endif >แบบสมัครสมาชิก</option>
                        <option value="1" @if( $objs->type == 1)
                                        selected='selected'
                                        @endif >แบบไม่สมัครสมาชิก</option>
                      </select>
          </div>
        
        
        <br />


        <div style="text-align: right;">
        <br /><br /><br />
        <button type="submit" class="btn btn-primary mr-2">บันทึก</button>
        <button class="btn btn-light">ยกเลิก</button>
        </div>

      </form>
    </div>
  </div>
</div>

</div>



@endsection

@section('scripts')


<script>

$(document).ready(function() {
  $('.summernote').summernote({
    fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48' , '64', '82', '150'],
    fontNames: ['Arial', 'Prompt', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto'],
    height: 550,
    popover: {
            image: [
                ['custom', ['imageAttributes']],
                ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']]
            ],
        },
        imageAttributes:{
            icon:'<i class="note-icon-pencil"/>',
            removeEmpty:false, // true = remove attributes | false = leave empty if present
            disableUpload: false // true = don't display Upload Options | Display Upload Options
        },
  callbacks: {
  onImageUpload: function(image) {
  editor = $(this);
  uploadImageContent(image[0], editor);
  }
  }
});



  function uploadImageContent(image, editor) {
    var data = new FormData();
    data.append("image", image);
    $.ajax({
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        url: "{{ url('api/upload_img') }}",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "post",
        success: function(url) {
        var image = $('<img>').attr({src: url, width: '100%'});
        $(editor).summernote("insertNode", image[0]);
        },
        error: function(data) {
        console.log(data);
        }
    });
  }



});

</script>
@stop('scripts')