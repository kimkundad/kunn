@extends('admin.layouts.template')

@section('ga')
window.gaTitle = 'หน้าแรก';
@endsection

@section('stylesheet')

@stop('stylesheet')

@section('content')



<div class="row">
                
                <div class="col-md-12">
                <a href="{{ url('admin/get_user_event/'.$objs->id) }}" class="btn btn-danger btn-fw" style="float:left"><i class="icon-user"></i>ผู้เข้าร่วมงาน</a>
                <a href="{{ url('admin/random_user5/'.$objs->id) }}" class="btn btn-info btn-fw" style="float:right; "><i class="icon-user"></i>สุ่มผู้โชคดี 5 คน</a>
                <a href="{{ url('admin/random_user10/'.$objs->id) }}" class="btn btn-success btn-fw" style="float:right"><i class="icon-user"></i>สุ่มผู้โชคดี 10 คน</a>
                  <br /><br />
                </div>
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">สุ่มผู้โชคดี 5 คน</h4>

                      <div class="table-responsive">


                      <table class="table">
                        <thead>

                          <tr>
                          <th></th>
                            <th>ชื่อ - นามสกุล </th>
                            <th>อีเมล</th>
							<th>เบอร์โทร</th>
                            <th>Line ID</th>
                            <th>facebook</th>
                            <th>ให้รางวัล</th>
                            <th>ดำเนินการ</th>
                          </tr>
                        </thead>
                        <tbody>
                      
						@if(isset($obj))
                      @foreach($obj as $u)
                          <tr access_id="{{$u->id}}">
                          <td>
                            {{$u->id}}
                            </td>
                            <td>
                              {{$u->fname}}  {{$u->lname}}
                            </td>
                            <td>
                            {{$u->email}}
                            </td>
							<td>
                              {{$u->phone}}
                            </td>
                            <td>
                              {{$u->line}}
                            </td>
                            <td>
                              {{$u->facebook}}
                            </td>
                            <td>
                              <div class="form-check form-check-flat">
                              <label class="form-check-label">
                                <input class="checkbox" type="checkbox" @if($u->status == 1)
                                  checked="checked"
                                  @endif>
                                ไม่ได้ / ได้
                              </label>
                            </div>
                            </td>
                            <td>
                            <a href="{{ url('admin/get_user_event_ans/'.$u->id) }}" class="btn btn-outline-success btn-sm">ดูแบบสอบถาม</a>
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


              </div>



@endsection

@section('scripts')



<script>

$(document).ready(function(){


$("input.checkbox").change(function(event) {

var course_id = $(this).closest('tr').attr('access_id');

console.log('fea : '+course_id);
$.ajax({
        type:'POST',
        url:'{{url('api/getuser_status')}}',
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        data: { "user_id" : course_id },
        success: function(data){
          if(data.data.success){


            $.toast({
              heading: 'Success',
              text: 'ระบบทำการแก้ไขข้อมูลให้แล้ว.',
              showHideTransition: 'slide',
              icon: 'success',
              loaderBg: '#f96868',
              position: 'top-right'
            })



          }
        }
    });
});

  });

</script>

@stop('scripts')