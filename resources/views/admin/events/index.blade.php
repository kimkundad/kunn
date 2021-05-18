@extends('admin.layouts.template')

@section('ga')
window.gaTitle = 'หน้าแรก';
@endsection

@section('stylesheet')

@stop('stylesheet')

@section('content')



<div class="row">
                <div class="col-md-12">
                  <a href="{{ url('admin/events/create') }}" class="btn btn-success btn-fw" style="float:right"><i class="icon-plus"></i>เพิ่ม Events</a>
                  <br /><br />
                </div>
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Event ทั้งหมด</h4>

                      <div class="table-responsive">


                      <table class="table">
                        <thead>

                          <tr>
                            <th></th>
                            <th>ประเภท</th>
							<th>วันที่</th>
                            <th>เปิดใช้งาน</th>
                            <th>ดำเนินการ</th>
                          </tr>
                        </thead>
                        <tbody>
                      
						@if(isset($objs))
                      @foreach($objs as $u)
                          <tr access_id="{{$u->id}}">
                            <td style="overflow: hidden; max-width: 250px;}">
                              {{ $u->name }}
                            </td>
                            <td>
                              @if($u->type == 0)
                              แบบสมัครสมาชิก
                              @else
                              แบบไม่สมัครสมาชิก
                              @endif
                            </td>
							<td>
                              {{$u->created_at}}
                            </td>
                            <td>
                              <div class="form-check form-check-flat">
                              <label class="form-check-label">
                                <input class="checkbox" type="checkbox" @if($u->status == 1)
                                  checked="checked"
                                  @endif>
                                ปิด / เปิด
                              </label>
                            </div>
                            </td>
                            <td>
                            @if($u->type == 0)
                            <a href="{{ url('admin/get_user_join_event/'.$u->id) }}" class="btn btn-outline-info btn-sm">เข้าร่วม</a>
                            @endif
                            <a href="{{ url('admin/get_user_event/'.$u->id) }}" class="btn btn-outline-success btn-sm">แบบสอบถาม</a>
                            <a href="{{ url('admin/report_event/'.$u->id) }}" class="btn btn-outline-warning btn-sm">รายงาน</a>
                              <a href="{{ url('admin/events/'.$u->id.'/edit') }}" class="btn btn-outline-primary btn-sm">แก้ไข</a>
                              <a href="{{ url('api/del_events/'.$u->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger btn-sm">ลบ</a>
                            </td>
                          </tr>
                          @endforeach
                          @endif


                        </tbody>
                      </table>
                      </div>
					  {{ $objs->links() }}
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
        url:'{{url('api/events_status')}}',
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