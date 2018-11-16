<?php
/*
Template name: submit
*/
?>
<?php
function sendMail(){
	session_start();
	$data = prepare_data($_POST);
	if($data['verifyCaptcha'] != $_SESSION['captcha']['code']){
		$result[] = false;
		$result[] = 'รหัสยืนยันไม่ถูกต้อง';
		$result[] = true;
	
	}
	else{
		unset($data['verifyCaptcha']);
		
		header('Content-type: text/html; charset=utf-8');
		require_once('class/PHPMailer/PHPMailerAutoload.php');
		$mail = new PHPMailer;
		
		$mail->isSMTP();                  
		$mail->Host = '58.97.53.13'; 
		$mail->SMTPAuth = false;   
		$mail->Port = 25;   
		$mail->CharSet = 'UTF-8';

		$mail->setFrom($_POST['from'], $_POST['fromname']);
		$mail->addAddress('bog@thaipbs.or.th', 'คณะกรรมการนโยบาย องค์การกระจายเสียงและแพร่ภาพสาธารณะแห่งประเทศไทย'); 

		
		$mail->isHTML(true);                               

		$mail->Subject = $_POST['subject'];
		$mail->Body    = '<!-- Inliner Build Version 4380b7741bb759d6cb997545f3add21ad48f010b -->
	<!DOCTYPE html>
	<html style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
	<head>
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Really Simple HTML Email Template</title>
	</head>
	<body bgcolor="#f6f6f6" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; -webkit-font-smoothing: antialiased; height: 100%; -webkit-text-size-adjust: none; width: 100% !important; margin: 0; padding: 0;">

	<!-- body -->
	<table class="body-wrap" bgcolor="#f6f6f6" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; width: 100%; margin: 0; padding: 20px;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
	<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;"></td>
		<td class="container" bgcolor="#FFFFFF" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; clear: both !important; display: block !important; max-width: 600px !important; Margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;">

		  <!-- content -->
		  <div class="content" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; display: block; max-width: 600px; margin: 0 auto; padding: 0;">
		  <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; width: 100%; margin: 0; padding: 0;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
	<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
				<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 20px; line-height: 1.6em; font-weight: bold; margin: 0 0 10px; padding: 0;">เรียน คณะกรรมการนโยบาย องค์การกระจายเสียงและแพร่ภาพสาธารณะแห่งประเทศไทย</p>
				<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 20px; line-height: 1.6em; font-weight: bold; margin: 0 0 10px; padding: 0;">เรื่อง '.$_POST['subject'].'</p>

				<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6em; font-weight: normal; margin: 0 0 10px; padding: 0;">'.$_POST['description'].'</p>
				<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.6em; font-weight: bold;text-align:right; margin: 0 0 10px; padding: 0;">'.$_POST['fromname'].'</p>
			  </td>
			</tr></table>
	</div>
		  <!-- /content -->
		  
		</td>
		<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;"></td>
	  </tr></table>
	<!-- /body -->
	</body>
	</html>';
		
		if(!$mail->send()) {
				$result[] = false;
				$result[] = 'ไม่สามารถส่งอีเมลได้ ' . $mail->ErrorInfo;
			} else {
				$result[] = true;
			}

	}
		echo json_encode($result);
}

function recaptcha(){
	session_start();
	include("class/simple-php-captcha/simple-php-captcha.php");
	$_SESSION['captcha'] = simple_php_captcha();
	echo $_SESSION['captcha']['image_src'];
}

function saveComplaint(){
	session_start();
	$data = prepare_data($_POST);
	if($data['verifyCaptcha'] != $_SESSION['captcha']['code']){
		$result[] = false;
		$result[] = 'รหัสยืนยันไม่ถูกต้อง';
		$result[] = true;
	
	}
	else{
		global $wpdb;
		unset($data['verifyCaptcha']);
		/*if($_FILES['attachment']['name'] != ""){
			if ($_FILES["attachment"]["size"] > 5000000) {
					$result[] = false;
					$result[] = 'ไฟล์มีขนาดใหญ่เกิน 5 MB';
			}
			else{
				$type= strrchr(strtolower($_FILES["attachment"]["name"]),".");
				$filename = "CPT-".date("ymdHis")."-".$_SESSION['captcha']['code'].$type;
				if(move_uploaded_file($_FILES["attachment"]["tmp_name"], 'uploads/complaint/'.$filename)){
					$data['attachment'] = $filename;
				}
				else{
					$result[] = false;
					$result[] = 'ไม่สามารถอัพโหลดไฟล์ได้';
				}
				
			}
		}*/
		
		$insert = $wpdb->insert('complaint',$data);
		if($insert){
				$provinceArr = array(			
					1=>"กระบี่",
					2=>"กรุงเทพมหานคร",
					3=>"กาญจนบุรี",
					4=>"กาฬสินธุ์",
					5=>"กำแพงเพชร",
					6=>"ขอนแก่น",
					7=>"จันทบุรี",
					8=>"ฉะเชิงเทรา",
					9=>"ชลบุรี",
					10=>"ชัยนาท",
					11=>"ชัยภูมิ",
					12=>"ชุมพร",
					13=>"เชียงราย",
					14=>"เชียงใหม่",
					15=>"ตรัง",
					16=>"ตราด",
					17=>"ตาก",
					18=>"นครนายก",
					19=>"นครปฐม",
					20=>"นครพนม",
					21=>"นครราชสีมา",
					22=>"นครศรีธรรมราช",
					23=>"นครสวรรค์",
					24=>"นนทบุรี",
					25=>"นราธิวาส",
					26=>"น่าน",
					27=>"บึงกาฬ",
					28=>"บุรีรัมย์",
					29=>"ปทุมธานี",
					30=>"ประจวบคีรีขันธ์",
					31=>"ปราจีนบุรี",
					32=>"ปัตตานี",
					33=>"พระนครศรีอยุธยา",
					34=>"พะเยา",
					35=>"พังงา",
					36=>"พัทลุง",
					37=>"พิจิตร",
					38=>"พิษณุโลก",
					39=>"เพชรบุรี",
					40=>"เพชรบูรณ์",
					41=>"แพร่",
					42=>"ภูเก็ต",
					43=>"มหาสารคาม",
					44=>"มุกดาหาร",
					45=>"แม่ฮ่องสอน",
					46=>"ยโสธร",
					47=>"ยะลา",
					48=>"ร้อยเอ็ด",
					49=>"ระนอง",
					50=>"ระยอง",
					51=>"ราชบุรี",
					52=>"ลพบุรี",
					53=>"ลำปาง",
					54=>"ลำพูน",
					55=>"เลย",
					56=>"ศรีสะเกษ",
					57=>"สกลนคร",
					58=>"สงขลา",
					59=>"สตูล",
					60=>"สมุทรปราการ",
					61=>"สมุทรสงคราม",
					62=>"สมุทรสาคร",
					63=>"สระแก้ว",
					64=>"สระบุรี",
					65=>"สิงห์บุรี",
					66=>"สุโขทัย",
					67=>"สุพรรณบุรี",
					68=>"สุราษฎร์ธานี",
					69=>"สุรินทร์",
					70=>"หนองคาย",
					71=>"หนองบัวลำภู",
					72=>"อ่างทอง",
					73=>"อำนาจเจริญ",
					74=>"อุดรธานี",
					75=>"อุตรดิตถ์",
					76=>"อุทัยธานี",
					77=>"อุบลราชธานี");
			$occArr = array(
						1=>"นักเรียน/นักศึกษา",
						2=>"ข้าราชการ/พนักงานรัฐหรือองค์กรของรัฐ",
						3=>"พนักงานเอกชน",
						4=>"อาชีพอิสระ",
						5=>"เจ้าของกิจการ",
						6=>"อื่นๆ  (โปรดระบุ)"
						);
			header('Content-type: text/html; charset=utf-8');
			require_once('class/PHPMailer/PHPMailerAutoload.php');
			$mail = new PHPMailer;
			
			$mail->isSMTP();                  
			$mail->Host = '58.97.53.13'; 
			$mail->SMTPAuth = false;   
			$mail->Port = 25;   
			$mail->CharSet = 'UTF-8';

			$mail->setFrom($_POST['email'], $_POST['fname']." ".$_POST['lname']);
			$mail->addAddress('complaint@thaipbs.or.th', 'คณะอนุกรรมการรับและพิจารณาเรื่องร้องเรียน ไทยพีบีเอส'); 

			$mail->isHTML(true);  
			$mail->Subject = $_POST['subject'];
			
			$body = '<!DOCTYPE html>
<html style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
<head>
<meta name="viewport" content="width=device-width">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Really Simple HTML Email Template</title>
</head>
<body bgcolor="#f6f6f6" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; -webkit-font-smoothing: antialiased; height: 100%; -webkit-text-size-adjust: none; width: 100% !important; margin: 0; padding: 0;">

<!-- body -->
<table class="body-wrap" bgcolor="#f6f6f6" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; width: 100%; margin: 0; padding: 20px;"><tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;"></td>
    <td class="container" bgcolor="#FFFFFF" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; clear: both !important; display: block !important; max-width: 600px !important; Margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;">

      <!-- content -->
      <div class="content" style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; display: block; max-width: 600px; margin: 0 auto; padding: 0;">
      <table style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; width: 100%; margin: 0; padding: 0;">
      <tr style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;">
<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;"><strong>เรียน คณะอนุกรรมการรับและพิจารณาเรื่องร้องเรียน ไทยพีบีเอส</strong><br>
  <strong> เรื่อง '.$_POST['subject'].'</strong><br>
  <br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ข้าพเจ้า '.$_POST['fname'].' '.$_POST['lname'].' &nbsp;ที่อยู่ &nbsp;'.$_POST['address'].' &nbsp;ตำบล/แขวง &nbsp;'.$_POST['subdistrict'].'&nbsp;
  อำเภอ/เขต &nbsp;'.$_POST['district'].'&nbsp;  จังหวัด&nbsp; '.$provinceArr[$_POST['province']].'&nbsp;รหัสไปรษณีย์&nbsp;'.$_POST['zipcode'].'&nbsp;<br>
โทรศัพท์บ้าน &nbsp;'.$_POST['phone'].'&nbsp; มือถือ&nbsp;'.$_POST['mobile'].'<br>
อีเมล &nbsp;'.$_POST['email'].' &nbsp;อาชีพ&nbsp;'.$occArr[$_POST['occupation']].'<br>
  <br>
  มีความประสงค์จะร้องเรียนประเด็นผิดจริยธรรมวิชาชีพว่าด้วยการผลิตและเผยแพร่รายการ ตามข้อกล่าวหาและความเสียหายที่ผู้ร้องได้รับ หรือ คำแนะนำติชมดังนี้<br>
  &nbsp;&nbsp;&nbsp;'.nl2br($_POST['description']).'
  <br><br><strong>พบการเผยแพร่ประเด็นดังกล่าวทาง</strong><br>';
			if($_POST['channel'] == 1){
				$body .= 'สถานีโทรทัศน์ไทยพีบีเอส';
			}
			elseif($_POST['channel'] == 2){
				$body .= 'เว็บไซต์ ('.$_POST['channel_website'].")";
			}
			else{
				$body .= 'สื่ออื่นๆ ('.$_POST['channel_other'].")";
			}
  
  $body .= '<br><br><strong>วันที่ออกอากาศ หรือเผยแพร่</strong><br>';
			if($_POST['publishing'] == 0){
				$body .= 'ไม่ทราบ';
			}
			else{
				$body .= 'ทราบ ('.$_POST['publishing_date'].")";
			}
			
			$body .= '<br>';
			if($_POST['public'] == 1){ 
				$body .= '
				<p style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 20px; line-height: 1.6em; font-weight: bold;color:red; margin: 0 0 10px; padding: 0;">โดยข้าพเจ้าไม่ประสงค์เปิดเผยชื่อต่อสาธารณะ</p>';
			}
			$body .= '<br>
  </td>
		</tr>
        </table>
		</div>
					  <!-- /content -->
					  
					</td>
					<td style="font-family: \'Helvetica Neue\', \'Helvetica\', Helvetica, Arial, sans-serif; font-size: 100%; line-height: 1.6em; margin: 0; padding: 0;"></td>
				  </tr></table>
				<!-- /body -->
				</body>
				</html>';
			
		
		$mail->Body    = $body;	
		if($_FILES['attachment']['name'] != ""){
			$mail->AddAttachment( $_FILES['attachment']['tmp_name'], $_FILES['attachment']['name'] );
		}
		
			if(!$mail->send()) {
				$result[] = false;
				$result[] = 'ไม่สามารถส่งอีเมลได้ ' . $mail->ErrorInfo;
			} else {
				$result[] = true;
			}
			
		
		}
		else{
			$result[] = false;
			$result[] = 'ไม่สามารถบันทึกข้อมูลได้';
		}
	}
		echo json_encode($result);
}

if($_GET['fn']){
	$_GET['fn']();
}
?>