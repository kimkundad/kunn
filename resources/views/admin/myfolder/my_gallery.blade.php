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
      <h4 class="card-title">เพิ่มรูป folder : {{  $objs->name }}</h4>
      

      <form class="forms-sample" method="POST" action="{{ url('admin/add_my_gallery/'.$objs->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        
        <div class="form-group">
          <br />
          <label for="exampleInputUsername1">รูป folder <span class="text-danger">*</span></label>
          <input type="file" class="dropify"  name="image[]" multiple/>
          <br />
        </div>


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
<br><br>

<div class="row">

<div class="col-md-12">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">แก้ไขรูป folder : {{  $objs->name }}</h4>
      
      <table class="table">
                        <thead>
                          <tr>
                            <th>รูปภาพ</th>
                            <th>ดำเนินการ</th>
                          </tr>
                        </thead>
                        <tbody>
                      
						  @if(isset($obj))
                      @foreach($obj as $u)
                          <tr access_id="{{$u->id}}">
                            <td>
                            <img src="{{ url('img/folder/'.$u->g_name) }}" style="border-radius: 10%; width: 400px; height: auto;">
                            </td>
                            <td>
                              <a href="{{ url('api/del_image_ff/'.$u->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger btn-sm">ลบ</a>
                            </td>
                          </tr>
                          @endforeach
                          @endif

                        </tbody>
                      </table>
      
      
    </div>
  </div>
</div>

</div>

<br><br><br><br><br><br>


@endsection

@section('scripts')


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