@extends('admin.layouts.template')

@yield('stylesheet')

<link rel="stylesheet" href="{{ url('back/vendors/summernote/dist/summernote-bs4.css') }}">
@section('content')


      <div class="row">

            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">ข้อมูลแบบสอบถาม</h4>
                  <p class="card-description">
                    กรอกข้อมูลให้ครบ ในส่วนที่มีเครื่องหมาย <span class="text-danger">*</span>
                  </p>
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

                  <form class="forms-sample" method="POST" action="{{ url('api/post_edit_example/'.$objs->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label for="exampleInputUsername1">ชื่อแบบสอบถาม <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" placeholder="มินนะ โนะ นิฮงโกะ みんなの日本語 かんじ N5+N4 ?" name="ex_name" value="{{ $objs->ex_name }}">
                    </div>

                   
                   
                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">รายละเอียด</label>
                      <textarea class=" form-control" rows="5" id="textareaAutosize" name="ex_detail" >{{ $objs->ex_detail }}</textarea>
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


@stop('content')



@section('scripts')

<script src="{{ url('back/vendors/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ url('back/js/dropify.js') }}"></script>

<script>

$(document).ready(function() {
  $('.summernote').summernote({
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
