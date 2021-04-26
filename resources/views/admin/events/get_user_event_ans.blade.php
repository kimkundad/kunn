@extends('admin.layouts.template')

@section('ga')
window.gaTitle = 'หน้าแรก';
@endsection

@section('stylesheet')

@stop('stylesheet')

@section('content')



<div class="row">
                
              
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">แบบสอบถามของ {{ $get_data->fname }} {{ $get_data->lname }}</h4>

                      <div class="table-responsive scrollbar-width-auto" style="height: 700px; scrollbar-width: auto;">


                      <table id="export-data"  class="table"  >
                        <thead>
                          <tr>
                            <th >วัน-เวลา</th>
                            <th >ชื่อ</th>
						              	<th>นามสกุล</th>
                            <th>อายุ</th>
                            <th>อีเมล</th>
                            <th>เบอร์โทร</th>
                            <th>Line ID</th>
                            <th>facebook</th>
                            <th>การศึกษา</th>
                            <th>อาชีพ</th>
                            <th>รางวัล</th>
                            @if(isset($obj))
                            @foreach($obj as $u)
                            <th>{{ $u->qu_name }}</th>
                            @endforeach
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                     
                          <tr >
                          <td>
                            {{$get_data->updated_at}}
                            </td>
                            <td>
                              @if($get_data->first_n == 1)
                              นาย 
                              @elseif($get_data->first_n == 2)
                              นางสาว 
                              @else
                              นาง 
                              @endif
                               {{$get_data->fname}}  
                            </td>
                            <td>
                               {{$get_data->lname}}
                            </td>
                            <td>
                               {{$get_data->age}}
                            </td>
                            <td>
                            {{$get_data->email}}
                            </td>
							              <td>
                              {{$get_data->phone}}
                            </td>
                            <td>
                              {{$get_data->line}}
                            </td>
                            <td>
                              {{$get_data->facebook}}
                            </td>
                            <td>
                              {{$get_data->study}}
                            </td>
                            <td>
                              {{$get_data->novice}}
                            </td>
                            <td>
                                 @if($get_data->status == 1)
                                 YES
                                  @else
                                  NO
                                  @endif
                            </td>

                            @if(isset($get_data->ans))

                                @foreach($get_data->ans as $j)
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