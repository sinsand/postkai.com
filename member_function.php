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
	echo "<script>alert('��ҹ�������ö�������͡�Թ������Ѻ')</script>" ; 
	refresh('sing-member-signup.php') ; 
	exit();
	}
	
	$mID = $_SESSION["mID"] ;
	$chk = "select * from member where mPassword = '$old' and mID = '".$mID."'";
	$R= mysql_fetch_array($db->query($chk));
	if($R['mID'] <>  ""){
		$upd = "update member set mPassword='$new_password' ,mUsername = '$user' where mID = '".$R['mID']."'";
		$db->query($upd);
		echo "<script>alert('����¹���ʼ�ҹ���º����')</script>" ; 
		refresh('sing-member-changepassword.php?mID='.$_SESSION['mID'].'') ; 
	}else{	
		echo "<script>alert('���ʼ�ҹ������١��ͧ��سҵ�Ǩ�ͺ')</script>" ; 
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
	echo "<script>alert('��ҹ�������ö�������͡�Թ������Ѻ');</script>" ; 
	refresh(''.$page_link.'/��Ѥ���Ҫԡ/register') ; 
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
$mail->FromName = "�����š����Ѥ���Ҫԡ�ҡ WWW.SINGBURIN.NET";
$mail->Mailer   = "smtp";
$mail->Subject = '�����š����Ѥ���Ҫԡ�ҡ WWW.SINGBURIN.NET';   
$mail->Body .= "<head>
<meta http-equiv='Content-Type' content='text/html; charset=windows-874' />
<link href='http://www.singburin.net/css/style.css' rel='stylesheet' type='text/css'>
<title>�����š����Ѥ���Ҫԡ�ҡ WWW.SINGBURIN.NET ::.</title>
</head>
<body>
<p>���¹�س ".htmlspecialchars($fname)."&nbsp;".htmlspecialchars($lname)."</p>
<p>�Թ�յ�͹�Ѻ��������� WWW.SINGBURIN.NET <br />�ͺ�س����Ѻ�����Ѥ���Ҫԡ��Ѻ ����������Ѻ�������к��ͧ��ҹ���</p>
<p >&nbsp;</p>
<p>������͡�Թ:����".htmlspecialchars($user)."</p>
<p>���ʼ�ҹ:����� ".htmlspecialchars($password)."</p>
<p>&nbsp;</p>
<p></p>
<p></p>
<p></p>
<p></p>
<p>��ҹ����ö�Դ��ͷ���ҹ���� <a href='mailto:".$send1."'>".$send1."</a> �������Ѿ�� 08-3348-9908</p>
<p>����</p>
<p>��ҹ����ö�Դ��ͷ���ҹ���� <a href='mailto:".$send2."'>".$send2."</a></p>
<p></p>
<p></p>
<p>WWW.SINGBURIN.NET</p>
<p>ŧ��С�ȿ�� ,��ѧ�������Ѿ�� ,���� ,��� ,������ ,��ҹ ����� ,��ҹ�Ѵ��� ,��ҹ����ͧ ,��ǹ������� ,�͹ � ,���Թ ,�Ҥ�� ,��������� ,��ҹ��� ,��ͧ��� ,ö¹�� ,ö¹����� �ͧ </p>
</body>
</html>";
$mail->AddAddress($email);
$page = 'index.php' ; 

		if($mail->Send())
		{
			echo "<script>alert('��Ѥ���Ҫԡ���º��������ö�������к������')</script>" ; 
			refresh(''.$page.'') ; 
		}
		else
		{
			echo "<script>alert('�������ö���������')</script>" ; 
			refresh(''.$page.'') ;
		}
	}
	else
	{
		echo "<script>alert('�����ٻ�Ҿ���١��ͧ')</script>" ; 
		refresh(''.$page_link.'/��Ѥ���Ҫԡ/register') ; 
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
			 echo "<script>alert('���ʼ�ҹ������١��ͧ��س��Ǩ�ͺ')</script>" ;
 			 refresh(''.$page_link.'/��������ǹ���/'.$_SESSION['mID'].'') ; 
		}
		else
		{
			$passadd = " ,mPassword = '".$_POST['password-new1']."'";
		}
}

 $up = "update member set mTitle = '".$title."',mName = '".$fname."' , mMname = '".$mname."' , mLname = '".$lname."',mAddress = '".$address."' ,mPostalcode ='".$postalcode."',mTelephone = '".$telephone."' ,mEmail = '".$email ."' $passadd where mID = '".$_SESSION['mID']."' "  ; 
 $r = $db->query($up) ; 
 echo "<script>alert('��䢢��������º����')</script>" ;
 refresh(''.$page_link.'/��������ǹ���/'.$_SESSION['mID'].'') ; 
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