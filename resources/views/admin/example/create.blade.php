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

                  <form class="forms-sample" method="POST" action="{{ url('api/add_example/') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                      <label for="exampleInputUsername1">ชื่อแบบสอบถาม <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" placeholder="ความรู้ที่ได้รับในวันนี้ เป็นประโยชน์ต่อการดำเนินชีวิต ของท่าน" name="ex_name" value="{{ old('ex_name') }}">
                    </div>


                   
                    <div class="form-group">
                      <label for="exampleInputEmail1">รายละเอียด</label>
                      <textarea class=" form-control" rows="5" id="textareaAutosize" name="ex_detail" >{{ old('ex_detail') }}</textarea>
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

</script>

@stop('scripts')
