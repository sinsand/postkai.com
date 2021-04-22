<? include 'lib/connect.php' ; 
extract($_REQUEST); 
include "class.phpmailer.php";

$send1 = "webmaster@singburin.net";
$send2 = "sarawoot.singburin@gmail.com";

$db = new mydb ; 
$flag  = $_REQUEST['flag']  ; 
$username = $_REQUEST['username'] ; 
$email = $_REQUEST['email'] ; 


if ($username == "" && $email == "") {
echo "<script>alert ('กรุณากรอกข้อมูลให้ครบด้วยครับ');window.location.replace('".$page_link."/ลืมรหัสผ่าน/forgot-password');</script>" ; 
}else if ($username != '' &&  $email !='')
{
$sel = "select * from member where mUsername = '".$username."' and mEmail  = '".$email."' "; 
}else if ($username != '') 
{
$sel = "select * from member where mUsername = '".$username."'  "; 
}
else if ($email != '') { 
$sel = "select * from member where mEmail = '".$email."'  "; 
}
$r = $db->query($sel)  ;
$R = mysql_fetch_array($r) ; 
$num = mysql_num_rows($r)  ; 
if ($num == 0 )
{
echo "<script>alert ('ข้อมูลผิดพลาดครับ');window.location.replace(''".$page_link."/ลืมรหัสผ่าน/forgot-password'');</script>" ; 
}else{


$email_from =  "sarawootyou@gamil.com" ; 


$mail = new phpmailer();
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth = true;  
$mail->Host = "mail.beeplusjay.com"; // SMTP server
$mail->Username = "sarawoot@beeplusjay.com";
$mail->Password = "sarpass";
$mail->From = "webmaster@singburin.net" ; 
$mail->FromName = "แจ้งรหัสผ่านจาก Webmaster";
$mail->Mailer   = "smtp";
$mail->Subject = 'แจ้งรหัสผ่านจาก Webmaster';   
$mail->Body .= "<head>
<meta http-equiv='Content-Type' content='text/html; charset=windows-874' />
<link href='http://www.beeplusjay.com/pco/style.css' rel='stylesheet' type='text/css'>
<title>Forgot Password Information ::.</title>
</head>
<body>
<p class='mtext1'>เรียนคุณ ".htmlspecialchars($R['mName'])."&nbsp;".htmlspecialchars($R['mLname'])."</p>
<p class='mtext1'>แจ้งรหัสผ่าน<br>ข้อมูลเข้าสู่ระบบของท่านคือ</p>
<p>&nbsp;</p>
<p class='mtext1'>User Name:      ".htmlspecialchars($R['mUsername'])."</p>
<p class='mtext1'>Password:      ".htmlspecialchars($R['mPassword'])."</p>
<p>&nbsp;</p>
<p class='mtext1'>ขอบคุณครับ</p>
<p class='mtext1'></p>
<p class='mtext1'></p>
<p class='mtext1'></p>
<p class='mtext1'></p>
 <p class='mtext1'>ท่านสามารถติดต่อทางทีมงานได้ที่ <a href='mailto:".$send1."'>".$send1."</a> หรือโทรศัพท์ 08-3348-9908</p>
  <p class='mtext1'>หรือ</p>
 <p class='mtext1'>ท่านสามารถติดต่อทางทีมงานได้ที่ <a href='mailto:".$send2."'>".$send2."</a> หรือโทรศัพท์ 083-336-9796</p>
 <p class='mtext1'></p>
 <p class='mtext1'></p>
  <p class='mtext1'>WWW.SINGBURIN.NET</p>
 <p class='mtext1'>ลงประกาศฟรี ,อสังหาริมทรัพย์ ,ซื้อ ,ขาย ,ให้เช่า ,บ้าน เดี่ยว ,บ้านจัดสรร ,บ้านมือสอง ,ทาวน์เฮ้าส์ ,คอน โด ,ที่ดิน ,อาคาร ,เฟอร์นิเจอร์ ,บ้านเช่า ,ห้องเช่า ,รถยนต์ ,รถยนต์มือ สอง </p>
</body>
</html>";
$mail->AddAddress($R['mEmail']);
if($mail->Send()){ 
echo "<script>alert ('ชื่อล็อกอินกับรหัสผ่านได้ส่งไปทางอีเมลเรียบร้อย');window.location.replace('index.php');</script>" ; 
}else{
echo "<script>alert ('ไม่สามารถส่งอีเมล์ได้ครับ');window.location.replace('index.php');</script>" ; 
}
}

?>
