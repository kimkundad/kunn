@extends('admin.layouts.template')

@section('ga')
window.gaTitle = 'หน้าแรก';
@endsection

@section('stylesheet')

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

                      <div class="table-responsive">


                      <table class="table">
                        <thead>

                          <tr>
                            <th>วัน-เวลา</th>
                            <th>ชื่อ</th>
							<th>นามสกุล</th>
                            <th>อีเมล</th>
                            <th>เบอร์โทร</th>
                            <th>เบอร์โทร</th>
                          </tr>
                        </thead>
                        <tbody>
                      
						


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