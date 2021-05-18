@extends('admin.layouts.template')

@section('ga')
window.gaTitle = 'หน้าแรก';
@endsection

@section('stylesheet')

@stop('stylesheet')

@section('content')



<div class="row">
                
                <div class="col-md-12">
                <a href="{{ url('admin/get_user_join_event/'.$objs->id) }}" class="btn btn-danger btn-fw" style="float:left"><i class="icon-user"></i>ผู้เข้าร่วมงาน</a>
                  <a href="{{ url('admin/random_user5_join/'.$objs->id) }}" class="btn btn-info btn-fw" style="float:right"><i class="icon-user"></i>สุ่มผู้โชคดี 5 คน</a>
                  <a href="{{ url('admin/random_user10_join/'.$objs->id) }}" class="btn btn-success btn-fw" style="float:right"><i class="icon-user"></i>สุ่มผู้โชคดี 10 คน</a>
                  <br /><br />
                </div>
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                    <h4 class="card-title">สุ่มผู้โชคดี 10 คน</h4>

                      <div class="table-responsive">


                      <table class="table">
                        <thead>

                          <tr>
                          <th> </th>
                            <th>ชื่อผู้เข้าร่วม </th>
                            <th>อีเมล</th>
							<th>เบอร์โทร</th>
                            <th>ให้รางวัล</th>
                            <th>ดำเนินการ</th>
                          </tr>
                        </thead>
                        <tbody>
                      
						@if(isset($obj))
                      @foreach($obj as $u)
                          <tr access_id="{{$u->idb}}">
                          <td> {{$u->created_at}} </td>
                            <td>
                              {{$u->name}}
                            </td>
                            <td>
                            {{$u->email}}
                            </td>
							<td>
                              {{$u->phone}}
                            </td>
                            
                            <td>
                              <div class="form-check form-check-flat">
                              <label class="form-check-label">
                                <input class="checkbox" type="checkbox" @if($u->status_e == 1)
                                  checked="checked"
                                  @endif>
                                ไม่ได้ / ได้
                              </label>
                            </div>
                            </td>
                            <td>
                            
                            <a href="{{ url('api/del_user_event_join/'.$u->idb) }}" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger btn-sm">ลบ</a>
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
        url:'{{url('api/getuser_status2')}}',
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