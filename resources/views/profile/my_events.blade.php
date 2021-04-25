@extends('layouts.template')

@section('title')
เกี่ยวกับเรา || Wealth Angels
@stop

@section('stylesheet')
<style>
.img-box:before {
    opacity: 0;
}
.shop.rev_slider .slotholder:after, .home.rev_slider .slotholder:after {

    opacity: 0;
  
}
.list-4, .list-3, .list-2, .list-1 {
    font-size: 14px;
}
.boxed-widget-kim{
        background-color: #ffffff;
        border-radius: 3px;
        padding: 22px;
        transform: translate3d(0,0,0);
        z-index: 90;
        position: relative;
        box-shadow: 0px 0px 12px 0px rgb(0 0 0 / 10%);
}
.listing-details-sidebar-kim{
    padding: 0;
    list-style: none;
    font-size: 15px;
    margin-bottom: -5px;
    margin-top: 15px;
    position: relative;
    display: block;
    
    
}
.listing-details-sidebar-kim li {
    display: block;
    padding: 15px 10px;
    position: relative;
    line-height: 24px;
    font-size: 18px;
    border-radius: 3px;
}
.listing-details-sidebar-kim li:hover > a{
    background-color: #729ECC;
    color: #fff !important;
    white-space: nowrap;
    text-overflow: ellipsis;
    display: block;
}
.listing-details-sidebar-kim li:hover{
    background-color: #729ECC;
    color: #fff !important;
}
.listing-details-sidebar-kim li i {
    margin-left: 5px;
    margin-right: 5px;
}
.listing-details-sidebar-kim li.active{
    background-color: #729ECC;
    color: #fff !important;
}
.listing-details-sidebar-kim li.active a{
    background-color: #729ECC;
    color: #fff !important;
}
.box-content-user{
    background-color: #ffffff;
        border-radius: 3px;
        padding: 22px;
        transform: translate3d(0,0,0);
        z-index: 90;
        position: relative;
        box-shadow: 0px 0px 12px 0px rgb(0 0 0 / 10%);
}
#titlebar {
    background-color: #f8f8f8;
    position: relative;
    padding: 70px 0;
    margin-bottom: 45px;
}
.boxed-widget-kim h3 {
    padding: 25px;
    top: 0px;
    left: 0;
    position: absolute;
    font-size: 24px;
    /* padding: 0 0 25px; */
    /* margin: 0 0 25px 0; */
    /* display: block; */
    border-bottom: 1px solid #e8e8e8;
    width: 100%;
}
.like-icon:before {
    content: "\e608";
    transform: scale(0.95);
}
.like-icon:before, .like-icon:after {

    font-family: 'iconsmind'  !important
  
}
span.like-icon {
    color: #fff;
    font-size: 24px;
    position: absolute;
    z-index: 101;
    right: 30px;
    bottom: 30px;
    cursor: normal;
    background-color: rgba(24,24,24,0.4);
    display: block;
    height: 44px;
    width: 44px;
    border-radius: 50%;
    transition: all 0.4s;
}
.listing-item-content span {
    font-size: 12px;
    font-weight: 300;
    line-height:18px;
    display: inline-block;
    color: rgba(255,255,255,0.7);
}
.listing-item-content h3 {
    color: #fff;
    font-size: 13px;
    bottom: -1px;
    position: relative;
    font-weight: 500;
    margin: 0;
    line-height: 31px;
}
</style>
@stop('stylesheet')

@section('content')




<div class="container margin-top-75 padding-bottom-70">

	<!-- Blockquote
	================================================== -->
	<div class="row">

                <div class="col-md-3 margin-top-0">
                    <div class="boxed-widget-kim margin-top-30 margin-bottom-50">
                        
                        <ul class="listing-details-sidebar-kim">
                            <li>
                                <a href="{{ url('profile') }}"><i class="sl sl-icon-user"></i> ข้อมูลผู้ใช้งาน</a>
                            </li>
                            <li class="active">
                                <a href="{{ url('my_events') }}" ><i class="sl sl-icon-tag"></i> งานสัมมนา</a>
                            </li>
                            
                            <li>
                                <a href="{{ url('logout') }}"><i class="im im-icon-Lock-2"></i> ออกจากระบบ</a>
                            </li>
                        </ul>
                    </div>

                </div>


                <div class="col-md-9">

                    <div class="row">

                        <div class="col-md-12">
                            <h4 class="headline margin-bottom-35">งานสัมมนา ที่คุณเคยเข้าร่วมกับเรา</h4>
                            <p><p> *หมายถึงคุณได้เข้าร่วมแล้ว <i class="verified-icon"></i></p></p>
                        </div>

                        @if(isset($event))
                        @foreach($event as $u)
                        <!-- Listing Item -->
                        <div class="col-lg-6 col-md-12">
                            <a href="{{ url('events/'.$u->id) }}" class="listing-item-container">
                                <div class="listing-item">
                                    <img src="{{ url('img/events/'.$u->image) }}" alt="{{$u->name}}">
                                    @if($u->status_end == 1)
                                    <div class="listing-badge now-closed">ปิดแล้ว</div>
                                    @else
                                    <div class="listing-badge now-open">ยังเปิดอยู่</div>
                                    @endif
                                    <div class="listing-item-content">
                                        <span class="tag">{{ $u->start_event_date }} {{ $u->end_event_date }}, {{ $u->start_event_time }}</span>
                                        <h3>{{$u->name}} 
                                        @if($u->check_event == 1)
                                        <i class="verified-icon"></i>
                                        @endif</h3>
                                        <span>{{ $u->name_address }}, {{ $u->address }}</span>
                                    </div>
                                    @if($u->check_event == 0)
                                    @if($u->status_end == 0)
                                    <span class="like-icon" onclick="location.href='{{ url('events/'.$u->id) }}';"></span>
                                    @endif
                                    @endif
                                </div>
                                
                            </a>
                        </div>
                        <!-- Listing Item / End -->
                        @endforeach
                        @endif




                    </div>

                </div>
        
        
        

	</div>


</div>


    
    


	</div>
	<!-- Row / End -->

</div>
<!-- Container / End -->



@endsection

@section('scripts')





@stop('scripts')