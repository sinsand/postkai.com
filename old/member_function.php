<?php session_start(); 
include "lib/connect.php" ;
extract($_REQUEST); 
include"class.phpmailer.php";

$send1 = "webmaster@singburin.net";
$send2 = "sarawoot.singburin@gmail.com";
 
$db = new mydb;

$flag = $_REQUEST["flag"] ; 
$user = $_REQUEST["user"] ; 
$password = $_REQUEST["password"]; 
$title = $_REQUEST['title'] ; 
$titles = $_REQUEST['titles'] ;
$fname = $_REQUEST['fname'] ; 
$mname = $_REQUEST['mname'] ; 
$lname = $_REQUEST['lname'] ;  
$address = $_REQUEST['address'] ; 
$postalcode = $_REQUEST['postalcode'] ; 
$telephone = $_REQUEST['telephone'] ; 
$email = $_REQUEST['email'] ; 
$old_user = $_REQUEST['old_user'] ; 
$new_password = $_REQUEST['new_password'] ; 
$old_email = $_REQUEST['old_email'] ; 

	if (get_magic_quotes_gpc())
{
	$user = stripslashes($user);
	$title = stripslashes($title);
	$titles = stripslashes($titles);
	$fname = stripslashes($fname);
	$mname = stripslashes($mname);
	$lname = stripslashes($lname) ; 
	$address = stripslashes($address) ;
	$postalcode = stripslashes($postalcode) ;
	$telephone = stripslashes($telephone) ;
	$email = stripslashes($email) ;
}

	$user_e = mysql_real_escape_string($user);
	$title_e = mysql_real_escape_string($title);
	$titles_e = mysql_real_escape_string($titles);
	$fname_e = mysql_real_escape_string($fname);
	$mname_e = mysql_real_escape_string($mname);
	$lname_e = mysql_real_escape_string($lname) ; 
	$address_e = mysql_real_escape_string($address) ;
	$postalcode_e = mysql_real_escape_string($postalcode) ;
	$telephone_e = mysql_real_escape_string($telephone) ;
	$email_e = mysql_real_escape_string($email) ;


if($flag == 'changePassword'){

	if($user == "admin" || $user == "Admin" || $user == "administrator" || $user == "Administrator")
	{
	echo "<script>alert('ท่านไม่สามารถใช้ชื่อล็อกอินนี้ได้ครับ')</script>" ; 
	refresh('sing-member-signup.php') ; 
	exit();
	}
	
	$mID = $_SESSION["mID"] ;
	$chk = "select * from member where mPassword = '$old' and mID = '".$mID."'";
	$R= mysql_fetch_array($db->query($chk));
	if($R['mID'] <>  ""){
		$upd = "update member set mPassword='$new_password' ,mUsername = '$user' where mID = '".$R['mID']."'";
		$db->query($upd);
		echo "<script>alert('เปลี่ยนรหัสผ่านเรียบร้อย')</script>" ; 
		refresh('sing-member-changepassword.php?mID='.$_SESSION['mID'].'') ; 
	}else{	
		echo "<script>alert('รหัสผ่านเก่าไม่ถูกต้องกรุณาตรวจสอบ')</script>" ; 
		refresh('sing-member-changepassword.php?mID='.$_SESSION['mID'].'') ; 
	}
}

if($flag =="Add") 
{
// $_SESSION['verify_value'];
	//echo $_SESSION['captchas']; echo  $_REQUEST['capts'];
    if($_SESSION['verify_value'] ==$_REQUEST['capts'])
	{	
	
	if($user_e == "admin" || $user_e == "Admin" || $user_e == "administrator" || $user_e == "Administrator")
	{
	echo "<script>alert('ท่านไม่สามารถใช้ชื่อล็อกอินนี้ได้ครับ');</script>" ; 
	refresh(''.$page_link.'/สมัครสมาชิก/register') ; 
	exit();
	}

		$insert = "INSERT INTO  member (mUsername,mPassword,mTitle,mName,mMname,mLname,mAddress,mPostalcode,mTelephone,mEmail,mStatus,mDate) VALUES ('".$user_e."','".$password."' ,'".$title_e."' ,'".$fname_e."' ,'".$mname_e."' ,'".$lname_e."' ,'".$address_e."','".$postalcode_e."','".$telephone_e."' ,'".$email_e."' ,'1',NOW())";
		 $result = $db->query($insert) ;

$mail = new phpmailer();
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth = true;  
$mail->Host = "mail.beeplusjay.com"; // SMTP server
$mail->Username = "sarawoot@beeplusjay.com";
$mail->Password = "sarpass";
$mail->From = "webmaster@singburin.net" ; 
$mail->FromName = "ข้อมูลการสมัครสมาชิกจาก WWW.SINGBURIN.NET";
$mail->Mailer   = "smtp";
$mail->Subject = 'ข้อมูลการสมัครสมาชิกจาก WWW.SINGBURIN.NET';   
$mail->Body .= "<head>
<meta http-equiv='Content-Type' content='text/html; charset=windows-874' />
<link href='http://www.singburin.net/css/style.css' rel='stylesheet' type='text/css'>
<title>ข้อมูลการสมัครสมาชิกจาก WWW.SINGBURIN.NET ::.</title>
</head>
<body>
<p>เรียนคุณ ".htmlspecialchars($fname)."&nbsp;".htmlspecialchars($lname)."</p>
<p>ยินดีต้อนรับเข้าสู่เว็บ WWW.SINGBURIN.NET <br />ขอบคุณสำหรับการสมัครสมาชิกครับ ข้อมูลสำหรับเข้าสู่ระบบของท่านคือ</p>
<p >&nbsp;</p>
<p>ชื่อล็อกอิน:    ".htmlspecialchars($user)."</p>
<p>รหัสผ่าน:      ".htmlspecialchars($password)."</p>
<p>&nbsp;</p>
<p></p>
<p></p>
<p></p>
<p></p>
<p>ท่านสามารถติดต่อทีมงานได้ที่ <a href='mailto:".$send1."'>".$send1."</a> หรือโทรศัพท์ 08-3348-9908</p>
<p>หรือ</p>
<p>ท่านสามารถติดต่อทีมงานได้ที่ <a href='mailto:".$send2."'>".$send2."</a></p>
<p></p>
<p></p>
<p>WWW.SINGBURIN.NET</p>
<p>ลงประกาศฟรี ,อสังหาริมทรัพย์ ,ซื้อ ,ขาย ,ให้เช่า ,บ้าน เดี่ยว ,บ้านจัดสรร ,บ้านมือสอง ,ทาวน์เฮ้าส์ ,คอน โด ,ที่ดิน ,อาคาร ,เฟอร์นิเจอร์ ,บ้านเช่า ,ห้องเช่า ,รถยนต์ ,รถยนต์มือ สอง </p>
</body>
</html>";
$mail->AddAddress($email);
$page = 'index.php' ; 

		if($mail->Send())
		{
			echo "<script>alert('สมัครสมาชิกเรียบร้อยสามารถเข้าสู่ระบบได้เลย')</script>" ; 
			refresh(''.$page.'') ; 
		}
		else
		{
			echo "<script>alert('ไม่สามารถส่งอีเมลได้')</script>" ; 
			refresh(''.$page.'') ;
		}
	}
	else
	{
		echo "<script>alert('รหัสรูปภาพไม่ถูกต้อง')</script>" ; 
		refresh(''.$page_link.'/สมัครสมาชิก/register') ; 
	}
}

if ($flag == "Editmember") 
{
	if ($title == 1 ){
		$title = $titles ; 
	}

if($_POST['password-new1'] != "")
{
	$sel = "select *  from member  where mID = '".$_SESSION['mID']."'";
	$r = $db->query($sel) ;
	$fetch = mysql_fetch_array($r);
		if($fetch['mPassword'] != $_POST['password-old'])
		{
			 echo "<script>alert('รหัสผ่านเก่าไม่ถูกต้องกรุณตรวจสอบ')</script>" ;
 			 refresh(''.$page_link.'/ข้อมูลส่วนตัว/'.$_SESSION['mID'].'') ; 
		}
		else
		{
			$passadd = " ,mPassword = '".$_POST['password-new1']."'";
		}
}

 $up = "update member set mTitle = '".$title."',mName = '".$fname."' , mMname = '".$mname."' , mLname = '".$lname."',mAddress = '".$address."' ,mPostalcode ='".$postalcode."',mTelephone = '".$telephone."' ,mEmail = '".$email ."' $passadd where mID = '".$_SESSION['mID']."' "  ; 
 $r = $db->query($up) ; 
 echo "<script>alert('แก้ไขข้อมูลเรียบร้อย')</script>" ;
 refresh(''.$page_link.'/ข้อมูลส่วนตัว/'.$_SESSION['mID'].'') ; 
 }

if ($flag == "checkuser") {
$result = "Yes" ; 
$username = $_REQUEST['username'] ; 
$username = urldecode($username) ; 
$old_user = $_REQUEST['old_user'] ; 
$old_user = urldecode($old_user) ; 
	if ($old_user == ""){
$sel = "select *  from member  where mUsername = '$username'";
}else{
 $sel = "select *  from member where mUsername = '$username' and mUsername != '$old_user'";
}
	$r = $db->query($sel) ; 
	$num = $db->numrows($r) ;
	if ($num == 0 ){
	$result = "No" ; 
	}
	echo $result; 
}


if ($flag == "checkemail") {
$result = "Yes" ; 
	if ($old_email == ""){
 $sel = "select *  from member where mEmail = '$email'";
}else{
$sel = "select *  from member where mEmail = '$email' and mEmail != '$old_email'";
}
	$r = $db->query($sel) ; 
	$num = $db->numrows($r) ;
	if ($num == 0 ){
	$result = "No" ; 
	}
	echo $result; 
}
$db->close() ; 
?>