<?php
session_start();
include("class/simple-php-captcha/simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
/*
Template name: complaint-contact
*/
?>
<?php get_header()?>
<style type="text/css">
label.error,label#captchaError{
	display:none;
	color:#de3e02;
}
</style>
<div class="bartitle">รับเรื่องร้องเรียนจริยธรรม</div>
<main>
<ol class="breadcrumb">
  <li><a href="<?php bloginfo('url')?>">หน้าหลัก</a></li>
  <li><a href="<?php bloginfo('url')?>/complaint/contact">รับเรื่องร้องเรียนจริยธรรม</a></li>
  <li class="active">แบบฟอร์มรับเรื่องร้องเรียน</li>
</ol>
<div class="row">
		<div class="col-lg-8">
			<div class="blog-post">
				<h1 id="title" class="ktm blog-post-title"><?php the_title()?></h1>
				
				
				<div class="body">
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
				<h3 class="title orange">เรื่องร้องเรียน</h3>
				<?php the_content();  ?>
				
				<form id="complaint_form" action="<?php bloginfo('url')?>/submit?fn=saveComplaint" method="post" enctype="multipart/form-data">

				<div class="col-xs-12 col-sm-6 form-group"> 

          <div class="form-group field-complaintform-topic">
<label class="control-label required" for="complaintform-topic">เรื่อง</label>
<div class="input">
<input type="text" id="subject" class="form-control" name="subject" required>

</div>

</div>          <label for="opinion">มีความประสงค์จะร้องเรียนประเด็นผิดจริยธรรมวิชาชีพว่าด้วยการผลิตและเผยแพร่รายการ ตามข้อกล่าวหาและความเสียหายที่ผู้ร้องได้รับ หรือ คำแนะนำติชมดังนี้</label>
          <div class="form-group field-complaintform-opinion">
<label class="control-label" for="complaintform-opinion"></label>
<div class="input">
<textarea id="description" class="form-control" name="description" rows="9" cols="30" required></textarea>
</div>

</div>
          <label for="channel" class="required"><strong>พบการเผยแพร่ประเด็นดังกล่าวทาง</strong></label>
          <div class="form-group field-complaintform-channel">

<div class="radio"><label><input type="radio" name="channel" value="1" required>สถานีโทรทัศน์ไทยพีบีเอส</label></div>
<div class="radio"><label><input type="radio" name="channel" id="channel_website_check" value="2">เว็บไซต์  (โปรดระบุ)<input type="text" class="form-control" name="channel_website" value=""></label></div>
<div class="radio"><label><input type="radio" name="channel" value="3">สื่ออื่นๆ (โปรดระบุ)<input type="text" class="form-control" name="channel_other"></label></div>
<label for="channel" class="error"></label>

</div>                    
          

          <div class="form-group field-complaintform-publish">
<label class="control-label required" for="complaintform-publish">วันที่ออกอากาศ หรือเผยแพร่</label>
<div id="complaintform-publish"><div class="radio"><label><input type="radio" name="publishing" value="0" required>ไม่ทราบ</label></div>
<div class="radio"><label><input type="radio" name="publishing" value="1">ทราบ : (โปรดระบุ)<input type="text" class="form-control" name="publishing_date" placeholder="ระบุเวลา และวันที่"></label>

</div></div>
<label for="publishing" class="error"></label>

</div>         
          <label for="">เอกสารประกอบ</label>
          <div class="hint">ขนาดไฟล์ไม่เกิน 5 MB เป็นไฟล์ที่มีนามสกุลดังนี้ gif, jpg, png, pdf, doc, xls, jpeg</div>
           <!-- <label for="fileToUpload"> <span class="fileupload-btn btn btn-upload">เลือกไฟล์</span></label>
    	   <span class="filename"></span>
    	   <input style="visibility: hidden; position: absolute;" id="fileToUpload" class="form-control" type="file" name="fileToUpload">-->
    	   <div class="form-group field-complaintform-file">
<label class="control-label" for="complaintform-file"></label>
<input type="file" id="complaintform-file" name="attachment">


</div>          <div class="checkbox">
            <div class="form-group field-complaintform-publicly">
<div class="checkbox">
<label for="complaintform-publicly">
<input type="checkbox" id="public" name="public" value="1">
ไม่ประสงค์เปิดเผยชื่อต่อสาธารณะ
</label>


</div>
</div>          </div>

          <div class="form-group field-complaintform-verifycode">
<label class="control-label required" for="complaintform-verifycode">กรุณาระบุอักขระตามภาพ</label>
<div class="row">
		<div class="col-lg-12">
		<?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA" id="captcha" height="60" />';?><a style="font-size:12px;color:#666;padding-left:10px;" id="recaptcha" href="javascript:;">เปลี่ยนอักขระ</a>
		</div>
		<div class="col-lg-6" style="margin-top:10px">
		<div class="input">
			<input type="text" id="verifyCaptcha" class="form-control" name="verifyCaptcha" maxlength="6" required>
		</div>
		<label id="captchaError">รหัสยืนยันไม่ถูกต้อง</label>
		</div>
	</div>


</div>       </div>

        <div class="col-xs-12 col-sm-6 form-group">
          <div class="form-group field-complaintform-name">
<label class="control-label required" for="complaintform-name">ชื่อ </label>
<div class="input">
<input type="text" id="fname" class="form-control" name="fname" required>
</div>

</div>          <div class="form-group field-complaintform-surname">
<label class="control-label required" for="complaintform-surname">นามสกุล</label>
<div class="input">
<input type="text" id="lname" class="form-control" name="lname" required>
</div>

</div>          <div class="form-group field-complaintform-address">
<label class="control-label  required" for="complaintform-address" >ที่อยู่ </label>
<div class="input">
<input type="text" id="address" class="form-control" name="address" required>
</div>

</div>          <div class="form-group field-complaintform-tumbon">
<label class="control-label required" for="complaintform-tumbon" >ตำบล/แขวง</label>
<div class="input">
<input type="text" id="subdistrict" class="form-control" name="subdistrict" required>
</div>

</div>          <div class="form-group field-complaintform-district">
<label class="control-label required" for="complaintform-district">อำเภอ/เขต</label>
<div class="input">
<input type="text" id="district" class="form-control" name="district" required>
</div>

</div>          <div class="form-group field-complaintform-province">
<label class="control-label required" for="complaintform-province">จังหวัด</label>
<div class="input">
<select id="province" class="form-control" name="province" required>
<option value="">กรุณาเลือกจังหวัด</option>
<option value="1">กระบี่</option>
<option value="2">กรุงเทพมหานคร</option>
<option value="3">กาญจนบุรี</option>
<option value="4">กาฬสินธุ์</option>
<option value="5">กำแพงเพชร</option>
<option value="6">ขอนแก่น</option>
<option value="7">จันทบุรี</option>
<option value="8">ฉะเชิงเทรา</option>
<option value="9">ชลบุรี</option>
<option value="10">ชัยนาท</option>
<option value="11">ชัยภูมิ</option>
<option value="12">ชุมพร</option>
<option value="13">เชียงราย</option>
<option value="14">เชียงใหม่</option>
<option value="15">ตรัง</option>
<option value="16">ตราด</option>
<option value="17">ตาก</option>
<option value="18">นครนายก</option>
<option value="19">นครปฐม</option>
<option value="20">นครพนม</option>
<option value="21">นครราชสีมา</option>
<option value="22">นครศรีธรรมราช</option>
<option value="23">นครสวรรค์</option>
<option value="24">นนทบุรี</option>
<option value="25">นราธิวาส</option>
<option value="26">น่าน</option>
<option value="27">บึงกาฬ</option>
<option value="28">บุรีรัมย์</option>
<option value="29">ปทุมธานี</option>
<option value="30">ประจวบคีรีขันธ์</option>
<option value="31">ปราจีนบุรี</option>
<option value="32">ปัตตานี</option>
<option value="33">พระนครศรีอยุธยา</option>
<option value="34">พะเยา</option>
<option value="35">พังงา</option>
<option value="36">พัทลุง</option>
<option value="37">พิจิตร</option>
<option value="38">พิษณุโลก</option>
<option value="39">เพชรบุรี</option>
<option value="40">เพชรบูรณ์</option>
<option value="41">แพร่</option>
<option value="42">ภูเก็ต</option>
<option value="43">มหาสารคาม</option>
<option value="44">มุกดาหาร</option>
<option value="45">แม่ฮ่องสอน</option>
<option value="46">ยโสธร</option>
<option value="47">ยะลา</option>
<option value="48">ร้อยเอ็ด</option>
<option value="49">ระนอง</option>
<option value="50">ระยอง</option>
<option value="51">ราชบุรี</option>
<option value="52">ลพบุรี</option>
<option value="53">ลำปาง</option>
<option value="54">ลำพูน</option>
<option value="55">เลย</option>
<option value="56">ศรีสะเกษ</option>
<option value="57">สกลนคร</option>
<option value="58">สงขลา</option>
<option value="59">สตูล</option>
<option value="60">สมุทรปราการ</option>
<option value="61">สมุทรสงคราม</option>
<option value="62">สมุทรสาคร</option>
<option value="63">สระแก้ว</option>
<option value="64">สระบุรี</option>
<option value="65">สิงห์บุรี</option>
<option value="66">สุโขทัย</option>
<option value="67">สุพรรณบุรี</option>
<option value="68">สุราษฎร์ธานี</option>
<option value="69">สุรินทร์</option>
<option value="70">หนองคาย</option>
<option value="71">หนองบัวลำภู</option>
<option value="72">อ่างทอง</option>
<option value="73">อำนาจเจริญ</option>
<option value="74">อุดรธานี</option>
<option value="75">อุตรดิตถ์</option>
<option value="76">อุทัยธานี</option>
<option value="77">อุบลราชธานี</option>
</select>
</div>
</div>          <div class="form-group field-complaintform-postcode">
<label class="control-label  required" for="complaintform-postcode" >รหัสไปรษณีย์</label>
<div class="input">
<input type="text" id="zipcode" class="form-control" name="zipcode" required>
</div>

</div>          <div class="form-group field-complaintform-tel">
<label class="control-label" for="complaintform-tel">โทรศัพท์บ้าน</label>
<div class="input">
<input type="text" id="phone" class="form-control" name="phone">
</div>

</div>          <div class="form-group field-complaintform-mobile">
<label class="control-label required" for="complaintform-mobile">มือถือ</label>
<div class="input">
<input type="text" id="mobile" class="form-control" name="mobile" required>
</div>

</div>          <div class="form-group field-complaintform-email">
<label class="control-label" for="complaintform-email">อีเมล์</label>
<div class="input">
<input type="text" id="email" class="form-control" name="email">
</div>

</div>
		  <div class="form-group field-complaintform-occupation">
<label class="control-label" for="complaintform-occupation">อาชีพ</label>
<div id="complaintform-occupation"><div class="radio"><label><input type="radio" name="occupation" value="1">นักเรียน/นักศึกษา</label></div>
<div class="radio"><label><input type="radio" name="occupation" value="2">ข้าราชการ/พนักงานรัฐหรือองค์กรของรัฐ</label></div>
<div class="radio"><label><input type="radio" name="occupation" value="3">พนักงานเอกชน</label></div>
<div class="radio"><label><input type="radio" name="occupation" value="4">อาชีพอิสระ</label></div>
<div class="radio"><label><input type="radio" name="occupation" value="5">เจ้าของกิจการ</label></div>
<div class="radio"><label><input type="radio" name="occupation" value="6">อื่นๆ  (โปรดระบุ)<input type="text" name="occupation_detail" id="occupation_detail" class="form-control"></label></div></div>

</div>            
        </div>

        <div class="col-xs-12 text-right">
          <input id="complain_form_button" type="submit" class="btn btn-primary" value="ส่งข้อความ">
		    <input id="complain_form_button" type="reset" class="btn btn-default" value="ยกเลิก">
        </div>
      </form>
				
				

				<?php endwhile; ?>
				<?php endif; ?>
				</div>
				<?php $file = get_field( "file",get_the_ID ()); 
				if(!empty($file)){ ?>
				<div class="document">
					<h2>ดาวน์โหลดเอกสาร</h2>
					<ul class="row doc-row">
					<?php foreach($file as $key=>$row){ ?>
						<li><a href="<?php echo $row['file']['url']?>" target="_blank"><img src="<?php echo $row['file']['icon']?>"> <?php echo $row['file']['title']?></a></li>
					<?php } ?>
					</ul>
				</div>
				<?php } ?>
			</div>
		</div>
		
		<?php 
		$is_complaint = 4; 
		get_sidebar();
		?>
	</div>
</main>
<?php get_footer()?>
<script type="text/javascript">

$(document).ready(function(){	
	var cform = $("#complaint_form");
	$( "#complaint_form" ).validate({
	
		submitHandler: function(form) {
			console.log(form);
			$.ajax({
				url: form.action,
				type: 'POST',
				 data : new FormData(cform[0]),
				   processData: false,
				   contentType: false,
				   dataType: "json",
					success: function(response) {
						
						if(response[2] === true){
							$('#captchaError').show();
						}
						else{
							$('#captchaError').hide();
							if(response[0] === true){
								alert('ได้รับข้อมูลของท่านเรียบร้อยแล้ว');
								window.location = '<?php bloginfo('url')?>/complaint/contact';
							}
							else{
								alert(response[1]);
							}
						}
				}            
			});
		}
	});
	$("#recaptcha").click(function(){
	$.ajax({
		type : 'POST',
		url : '<?php bloginfo('url')?>/submit/?fn=recaptcha',
		success : function(data){
			$('#captcha').attr('src',data);
		}
	})
})
})

</script>