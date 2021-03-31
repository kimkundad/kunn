@extends('admin.layouts.template')

@section('ga')
window.gaTitle = 'หน้าแรก';
@endsection

@section('stylesheet')

<link href="https://cdnjs.cloudflare.com/ajax/libs/TableExport/4.0.11/css/tableexport.css" rel="stylesheet">
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
              

                  <!-- <a id="exportData" target="_blank" class="btn btn-success btn-fw" style="float:right"><i class="icon-plus"></i>Export Events</a> -->
                  <br /><br />
                </div>
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">รายงาน ทั้งหมด</h4>

                      <div class="table-responsive scrollbar-width-auto" style="height: 700px; scrollbar-width: auto;">


                      <table id="export-data"  class="table"  >
                        <thead>
                          <tr>
                            <th >วัน-เวลา</th>
                            <th >ชื่อ</th>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.11.10/xlsx.core.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/blob-polyfill/1.0.20150320/Blob.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.3/FileSaver.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/4.0.11/js/tableexport.min.js"></script>

<script>
                //เรียกใช้งานฟังชั่น TableExport ให้ทำงานกับ Tag Table
        TableExport(document.getElementsByTagName("table"), {
            headers: true,                              // (Boolean), display table headers (th or td elements) in the <thead>, (default: true)
            footers: true,                              // (Boolean), display table footers (th or td elements) in the <tfoot>, (default: false)
            formats: ['xlsx', 'csv', 'txt'],             // (String[]), filetype(s) for the export, (default: ['xls', 'csv', 'txt'])
            filename: 'id',                             // (id, String), filename for the downloaded file, (default: 'id')
            bootstrap: false,                           // (Boolean), style buttons using bootstrap, (default: true)
            exportButtons: true,                        // (Boolean), automatically generate the built-in export buttons for each of the specified formats (default: true)
            position: 'bottom',                         // (top, bottom), position of the caption element relative to table, (default: 'bottom')
            ignoreRows: null,                           // (Number, Number[]), row indices to exclude from the exported file(s) (default: null)
            ignoreCols: null,                           // (Number, Number[]), column indices to exclude from the exported file(s) (default: null)
            trimWhitespace: true                        // (Boolean), remove all leading/trailing newlines, spaces, and tabs from cell text in the exported file(s) (default: false)
        });
 
    </script>



@stop('scripts')