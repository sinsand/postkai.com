<?php session_start() ; 
require '../lib/connect.php' ?>
<?php  
$db = new mydb;
   ?>
<?php
error_reporting (E_ALL ^ E_NOTICE);
$flag = $_REQUEST["flag"] ; 
$name = $_POST["name"] ; 
$lastname = $_POST["lastname"] ; 
$username= $_POST["username"] ; 
$password= $_POST["password"] ; 
$aboutus = $_POST["aboutus"] ;
$admin = $_POST["admin"] ; 

$aID = $_POST["aID"] ;
$checkbox = $_POST["checkbox"] ; 
$offset=$_POST["offset"];
$limit = $_POST["limit"] ; 

if (get_magic_quotes_gpc())
{
	$name = stripslashes($name);
	$lastname = stripslashes($lastname); 
}

$name = mysql_real_escape_string($name);
$lastname = mysql_real_escape_string($lastname); 

if($flag =="Editmember") {
 
if($_POST['password'] != '')
{
		$update= "UPDATE  member SET mUsername='".$_POST['user']."',mPassword='".$_POST['password']."' where  mID = '".$_POST['mID']."'";
        $result =  $db->query($update) ; 
		echo "<script language='javascript'>window.location.href = 'member_mod.php?msg=แก้ไขสมาชิกเรียบร้อย'</script>";
}
		$update= "UPDATE  member SET mName='".$_POST['fname']."', mMname='".$_POST['mname']."', mLname='".$_POST['lname']."',mAddress='".$_POST['address']."',mPostalcode='".$_POST['postalcode']."',mTelephone='".$_POST['telephone']."',mEmail='".$_POST['email']."' where  mID = '".$_POST['mID']."'";
        $result =  $db->query($update) ; 
		echo "<script language='javascript'>window.location.href = 'member_mod.php?msg=แก้ไขสมาชิกเรียบร้อย'</script>";

}


if($flag == "Add") {
	$chk = "select  *  from  admin  where  aUsername = '$username' ";
	$check = $db->query($chk);
	$num  = mysql_num_rows($check) ;
	if ($num ==0){

		$insert = "INSERT INTO  admin (aUsername,aPassword,aName,aSurname,aAdmin) VALUES ('".$username."','".$password."','".$name."','".$lastname."','".$admin."')";
		 $result = $db->query($insert) ; 
	 }
	else
	{
		echo "<div align='center' ><font face='Microsoft Sans Serif'>ชื่อล็อกอินซ้ำกรุณาตรวจสอบ</font><br><input type='button' value='Back' onclick='javascript:window.history.back();'></div>";
		exit;
	}		 

	 if($result!=0)
	{
			echo		"<script language='javascript'>window.location.href = 'admin_mod.php?msg=เพิ่มผู้ดูแลระบบเรียบร้อย&offset=$offset&limit=$limit'</script>";
	}
}


if($flag =="Delete") {

if (empty($checkbox))
{
		echo "<script language='javascript'>window.location.href = 'member_mod.php?msg=กรุณาเลือกสมาชิก&offset=$offset&limit=$limit'</script>";
}

$i=0;
while($i<count($checkbox))
{
$mID = $checkbox[$i];
$query = "delete   from  member where mID = $mID";
$result = $db->query($query) ; 
if(!$result)
return;
$i++;
}
if($result)
{ 

		echo		"<script language='javascript'>window.location.href = 'member_mod.php?msg=ลบสมาชิกเรียบร้อย&offset=$offset&limit=$limit'</script>";
}
}


if($flag =="changstatus") {

$update= "UPDATE  member SET mStatus='".$_GET['active']."' where  mID = '".$_GET['mID']."'";
$result =  $db->query($update) ; 
echo	"<script language='javascript'>window.location.href = 'member_mod.php?msg=เปลี่ยนสถานะเรียบร้อย&offset=$offset&limit=$limit'</script>";
}

close($dbID) ; 
?>
