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

</style>
@stop('stylesheet')

@section('content')




<div class="container margin-top-75 padding-bottom-70">

	<!-- Blockquote
	================================================== -->
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
        <!-- Head<b class="colorb">ROBOTEL</b> -->
        <h4  class="headline with-border margin-top-0 margin-bottom-35">นโยบายความเป็นส่วนตัวของ <b class="colorb">www.khunsukto.com</b></h4>
		
		<p style="font-size: 14px;"> เว็บไซต์ <b class="colorb">www.khunsukto.com</b> ตระหนักถึงความปลอดภัยของข้อมูลส่วนบุคคลและจะรักษาข้อมูลที่ได้รับจากท่านไว้อย่างเป็นความลับและ 
        ปลอดภัยโดยใช้นโยบายความเป็นส่วนตัวเพื่อป้องกันความเสียหายที่อาจเกิดขึ้นกับท่าน บริษัทจึงมีนโยบายความเป็นส่วนตัวเพื่อป้องกันความปลอดภัยของข้อมูลส่วนตัวของท่านดังนี้</p>
   
            <h4 class="headline margin-bottom-10 margin-top-10" style="font-size: 18px;">การเก็บข้อมูลและการใช้ข้อมูลส่วนบุคคล</h4>
            <p style="font-size: 14px;">เมื่อท่านใช้บริการผ่านทางเว็บไซต์ <b class="colorb">www.khunsukto.com</b> และลงทะเบียนบัญชีผู้ใช้ ท่านจะต้องให้ข้อมูลส่วนตัวกับทางเว็บไซต์
             เช่น ชื่อ ที่อยู่ อีเมล เบอร์โทรศัพท์ ข้อมูลบัญชีธนาคาร ข้อมูลบัตรเครดิต รวมถึงข้อมูลลักษณะการใช้งานเว็บไซต์ เป็นต้น บริษัทตกลงจะเก็บข้อมูลเหล่านี้ไว้เป็นความลับ และบริษัทอาจใช้ข้อมูลดังกล่าวเพื่อ</p>
            <ul class="list-1">
                <li>ประมวลผลและบริหารการใช้งานเว็บไซต์ของท่าน รวมถึงผู้ใช้งานอื่น</li>
                <li>สื่อสารกับท่านทางโทรศัพท์ อีเมล หรือข้อความทางมือถือเกี่ยวกับการใช้งานเว็บไซต์</li>
                <li>ตอบคำถามของท่านเกี่ยวกับการให้บริการลูกค้า หรือกระทำการอื่นใดเพื่อตอบคำถามของท่านหรือตอบสนองกิจกรรมในเว็บไซต์อื่นๆของท่าน</li>
                <li>สร้างการส่งเสริมการขายเฉพาะกลุ่มโดยการรวมข้อมูลส่วนตัวของท่านกับข้อมูลที่ไม่เป็นข้อมูลส่วนตัวของท่าน เช่นจำนวนครั้งและประเภทการซื้อของท่าน หรือประโยชน์ใดๆ ที่ท่านได้รับผ่านเว็บไซต์</li>
                <li>จัดทำข้อเสนอการขายเฉพาะกลุ่มโดยพิจารณาจากข้อมูลการใช้งานเว็บไซต์ส่วนบุคคล</li>
            </ul>
          
            <h4 class="headline margin-bottom-10 margin-top-10" style="font-size: 18px;">การเปิดเผยข้อมูลส่วนบุคคลให้แก่บุคคลภายนอก</h4>
            <p style="font-size: 14px;">บริษัทจะไม่เปิดเผยข้อมูลส่วนบุคคลใดๆ ของท่านให้แก่บุคคลภายนอก เว้นแต่</p>
            <ul class="list-1">
                <li>ได้รับความยินยอมจากท่าน</li>
                <li>เป็นการเปิดเผยให้กับผู้จัดงาน หรือผู้จัดการแสดงต่าง ๆ ทั้งนี้ เฉพาะข้อมูลส่วนบุคคลที่เกี่ยวข้องกับงานหรือการแสดงที่เกี่ยวข้อง</li>
                <li>เป็นการเปิดเผยให้กับบริการอื่นซึ่งสนับสนุนการใช้งานเว็บไซต์ เช่น ผู้ประมวลบัตรเครดิต ผู้ให้บริการด้านการชำระเงิน หรือ ผู้ให้บริการอีเมล เป็นต้น</li>
                <li>ข้อมูลบางส่วนอาจเปิดเผย เมื่อมีคำร้องขอโดยชอบด้วยกฎหมาย จากหน่วยงานทางกฎหมาย หรือเพื่อปกป้องสิทธิ ทรัพย์สิน และความปลอดภัยของบริษัท พนักงาน ตัวแทน และผู้ใช้งานเว็บไซต์ท่านอื่น เป็นต้น</li>
                <li>กรณีมีการโอนกิจการ ควบรวมกิจการ การขายสินทรัพย์ หรือการกู้ยืมเงิน บริษัทอาจต้องเปิดเผยข้อมูลบางส่วนให้กับผู้ที่เกี่ยวข้องในการทำธุรกรรมดังกล่าวทราบ</li>
            </ul>
            <br>
            <h4 class="headline margin-bottom-10 margin-top-10" style="font-size: 18px;">การแก้ไขนโยบายความปลอดภัยและข้อปฏิเสธความรับผิดชอบ</h4>
            <p style="font-size: 14px;">บริษัทขอสงวนสิทธิในการเปลี่ยนแปลงนโยบายความเป็นส่วนตัวและข้อปฏิเสธความรับผิดชอบได้ทุกเมื่อ 
            เนื้อหาทั้งหมดในหน้าเว็บไซต์นี้เป็นเนื้อหาที่ปรับปรุงล่าสุด ทางบริษัทจะแจ้งข้อมูลใหม่ให้ท่านทราบเมื่อมีการปรับปรุงข้อมูลเพื่อท่านจะได้ทราบถึงวิธีการป้องกันข้อมูล ส่วนตัวของลูกค้า</p>
            <h4 class="headline margin-bottom-10 margin-top-10" style="font-size: 18px;">การคุ้มครองความปลอดภัยในการเข้าถึงข้อมูลส่วนบุคคล</h4>
            <p style="font-size: 14px;">บริษัทมีการดำเนินการตามสมควรในการรักษาความปลอดภัยด้านกายภาพ เทคนิค และการจัดการเพื่อป้องกันความสูญเสีย การใช้งานอันไม่สมควร การเข้าถึงข้อมูลโดยไม่ได้รับอนุญาต การเปิดเผยหรือปรับเปลี่ยนข้อมูลส่วนบุคคล อย่างไรก็ตาม<br>
            บริษัทขอสงวนความรับผิดในการคุ้มครองความปลอดภัยดังกล่าว เนื่องจากไม่มีระบบหรือการส่งข้อมูลใดทางเครือข่ายสาธารณะใดที่จะสามารถรับประกันความปลอดภัยได้โดยสมบูรณ์</p>
            <br>
            <p>จบ <br>
                ปรับปรุงล่าสุดเมื่อวันที่ 31 มีนาคม 2564</p>
            
            <br><br><br>
           
                


            
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