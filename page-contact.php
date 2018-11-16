<?php
session_start();
include("class/simple-php-captcha/simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
/*
Template name: contact
*/
?>
<?php get_header()?>
<style type="text/css">
label.error,label#captchaError{
	display:none;
	color:#de3e02;
}
</style>
<div class="bartitle">ติดต่อกรรมการนโยบาย</div>

<main>
<ol class="breadcrumb">
  <li><a href="<?php bloginfo('url')?>">หน้าหลัก</a></li>
  <li class="active">ติดต่อกรรมการนโยบาย</li>
</ol>
<div class="row">
	<div class="col-lg-8">
		<div id="map-canvas"></div>
		<div class="contact col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="row">
							<div class="header kmedium">ติดต่อสำนักงานเลขานุการกรรมการนโยบาย</div>
							<div class="clearfix"></div>
							<div class="content">
								<div class="info tel">
								<i class="fa fa-phone"></i> คุณสมพร จรูญอุปการ       <br/>02-790-2139<br/>
								<i class="fa fa-phone"></i> คุณพิมพ์นิภา อุดมเรืองเกียรติ     <br/> 02-790-2156<br/>
								<i class="fa fa-phone"></i> คุณนิตยา  ศรีแนน    <br/> 02-790-2117
								</div>
								<div class="info post"><i class="fa fa-location-arrow"></i> ที่อยู่ : องค์การกระจายเสียงและ<br/>แพร่ภาพสาธารณะแห่งประเทศไทย <br/>145 ถนนวิภาวดีรังสิต แขวงตลาดบางเขน เขตหลักสี่ กรุงเทพ 10210</div>
								<div class="info email"><i class="fa fa-at"></i> อีเมล : Bog@thaipbs.or.th</div>
								<div class="info website"><i class="fa fa-desktop"></i>
 เว็บไซต์ : http://www.thaipbs.or.th/bog</div>
							</div>
						</div>
					</div>
					<div class="contactForm col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<div class="row">
							<div class="header kmedium">ส่งอีเมลถึงกรรมการนโยบาย</div>
							<div class="clearfix"></div>
							<form id="contact-form" class="form-horizontal" role="form" method="POST" action="<?php bloginfo('url'); ?>/submit?fn=sendMail">
                    <div class="form-group">
                        <label class="col-sm-4 control-label required" for="login-email">ชื่อ - นามสกุล</label>
                        <div class="col-sm-8">
                            <input class="form-control input-text required-entry validate-email" id="userName" name="fromname" placeholder="" value="" required="" type="text">
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label class="col-sm-4 control-label required" for="login-email">อีเมล</label>
                        <div class="col-sm-8">
                            <input class="form-control input-text required-entry validate-email" id="userEmail" name="from" placeholder="example@domain.com" value="" required="" type="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label required" for="login-password">เรื่อง</label>
                        <div class="col-sm-8">
                            <input class="form-control input-text required-entry" id="subject" name="subject" required="" type="text">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-sm-4 control-label required" for="login-password">ข้อความ</label>
                        <div class="col-sm-8">
                            <textarea class="form-control input-text required-entry" name="description" id="text" rows="5" required=""></textarea>
                        </div>
                    </div>
          <div class="form-group field-complaintform-verifycode">
<label class="control-label col-sm-4  required" for="complaintform-verifycode">ระบุอักขระตามภาพ</label>
<div class="col-sm-8">
<div class="row">
		<div class="col-sm-12">
		<?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA" id="captcha" height="60" />';?><a style="font-size:12px;color:#666;padding-left:10px;" id="recaptcha" href="javascript:;">เปลี่ยนอักขระ</a>
		</div>
		<div class="col-lg-12" style="margin-top:10px">
		<div class="input">
			<input type="text" id="verifyCaptcha" class="form-control" name="verifyCaptcha" maxlength="6" required>
		</div>
		<label id="captchaError">รหัสยืนยันไม่ถูกต้อง</label>
		</div>
	</div>
</div>


</div> 
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-8">
                                                        
                            <button type="submit" style="background:#E85400 none repeat scroll 0% 0%;color:#fff;" name="send" class="btn btn-lg btn-block btn-proceed-login">ส่งอีเมล</button>
                        </div>
                    </div>
                </form>
						</div>
					</div>
	</div>
	
	<?php get_sidebar()?>
</div>
</main>

<?php get_footer()?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script type="text/javascript">
function initialize() {
  var myLatlng = new google.maps.LatLng(13.867636,100.572939);
  var mapOptions = {
    zoom: 14,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'สภาผู้ชมและผู้ฟังรายการไทยพีบีเอส (เขตภาคกลาง)'
  });
}

google.maps.event.addDomListener(window, 'load', initialize);


$(document).ready(function(){	
	var cform = $("#contact-form");
	cform.validate({
	
		submitHandler: function(form) {
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
								window.location = '<?php bloginfo('url')?>/contact';
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