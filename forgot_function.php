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
echo "<script>alert ('��سҡ�͡���������ú���¤�Ѻ');window.location.replace('".$page_link."/������ʼ�ҹ/forgot-password');</script>" ; 
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
echo "<script>alert ('�����żԴ��Ҵ��Ѻ');window.location.replace(''".$page_link."/������ʼ�ҹ/forgot-password'');</script>" ; 
}else{


$email_from =  "sarawootyou@gamil.com" ; 


$mail = new phpmailer();
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SMTPAuth = true;  
$mail->Host = "mail.beeplusjay.com"; // SMTP server
$mail->Username = "sarawoot@beeplusjay.com";
$mail->Password = "sarpass";
$mail->From = "webmaster@singburin.net" ; 
$mail->FromName = "�����ʼ�ҹ�ҡ Webmaster";
$mail->Mailer   = "smtp";
$mail->Subject = '�����ʼ�ҹ�ҡ Webmaster';   
$mail->Body .= "<head>
<meta http-equiv='Content-Type' content='text/html; charset=windows-874' />
<link href='http://www.beeplusjay.com/pco/style.css' rel='stylesheet' type='text/css'>
<title>Forgot Password Information ::.</title>
</head>
<body>
<p class='mtext1'>���¹�س ".htmlspecialchars($R['mName'])."&nbsp;".htmlspecialchars($R['mLname'])."</p>
<p class='mtext1'>�����ʼ�ҹ<br>�������������к��ͧ��ҹ���</p>
<p>&nbsp;</p>
<p class='mtext1'>User Name:����� ".htmlspecialchars($R['mUsername'])."</p>
<p class='mtext1'>Password:����� ".htmlspecialchars($R['mPassword'])."</p>
<p>&nbsp;</p>
<p class='mtext1'>�ͺ�س��Ѻ</p>
<p class='mtext1'></p>
<p class='mtext1'></p>
<p class='mtext1'></p>
<p class='mtext1'></p>
 <p class='mtext1'>��ҹ����ö�Դ��ͷҧ����ҹ���� <a href='mailto:".$send1."'>".$send1."</a> �������Ѿ�� 08-3348-9908</p>
  <p class='mtext1'>����</p>
 <p class='mtext1'>��ҹ����ö�Դ��ͷҧ����ҹ���� <a href='mailto:".$send2."'>".$send2."</a> �������Ѿ�� 083-336-9796</p>
 <p class='mtext1'></p>
 <p class='mtext1'></p>
  <p class='mtext1'>WWW.SINGBURIN.NET</p>
 <p class='mtext1'>ŧ��С�ȿ�� ,��ѧ�������Ѿ�� ,���� ,��� ,������ ,��ҹ ����� ,��ҹ�Ѵ��� ,��ҹ����ͧ ,��ǹ������� ,�͹ � ,���Թ ,�Ҥ�� ,��������� ,��ҹ��� ,��ͧ��� ,ö¹�� ,ö¹����� �ͧ </p>
</body>
</html>";
$mail->AddAddress($R['mEmail']);
if($mail->Send()){ 
echo "<script>alert ('������͡�Թ�Ѻ���ʼ�ҹ����价ҧ��������º����');window.location.replace('index.php');</script>" ; 
}else{
echo "<script>alert ('�������ö�����������Ѻ');window.location.replace('index.php');</script>" ; 
}
}

?>
