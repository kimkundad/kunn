@extends('admin.layouts.template')

@section('ga')
window.gaTitle = 'หน้าแรก';
@endsection

@section('stylesheet')

<style>

.content-wrapper {
    max-width: 1400px !important;
}
.table td, .jsgrid .jsgrid-table td, .table th, .jsgrid .jsgrid-table th {
    font-size: 12px;
    padding: 16px 5px;
}
</style>
@stop('stylesheet')

@section('content')



<div class="row">
                <div class="col-md-12">
                  <a href="#" class="btn btn-success btn-fw" style="float:right"><i class="icon-plus"></i>Export Events</a>
                  <br /><br />
                </div>
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">รายงาน ทั้งหมด</h4>

                      <div class="table-responsive scrollbar-width-auto" style="height: 700px; scrollbar-width: auto;">


                      <table class="table" >
                        <thead>

                          <tr>
                            <th>วัน-เวลา</th>
                            <th>ชื่อ</th>
							<th>นามสกุล</th>
                            <th>อีเมล</th>
                            <th>เบอร์โทร</th>
                            <th>Line ID</th>
                            <th>facebook</th>
                            <th>รางวัล</th>
                            @if(isset($obj))
                            @foreach($obj as $u)
                            <th>{{ $u->qu_name }}</th>
                            @endforeach
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                        @if(isset($objs))
                      @foreach($objs as $u)
                          <tr >
                          <td>
                            {{$u->updated_at}}
                            </td>
                            <td>
                              {{$u->fname}}  
                            </td>
                            <td>
                               {{$u->lname}}
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
                                 @if($u->status == 1)
                                 YES
                                  @else
                                  NO
                                  @endif
                            </td>

                            @if(isset($u->ans))

                                @foreach($u->ans as $j)
                                <td>
                                    @if($j->type == 0)
                                    {{$j->my_ans}}
                                    @else
                                    {{$j->answers}}
                                    @endif
                                </td>
                                @endforeach

                            @endif
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






@stop('scripts')