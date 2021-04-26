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

if($flag =="Edit") {
 
	$chk = "select  *  from  admin  where  aUsername = '$username' and aID != '$aID'  ";
	$check = $db->query($chk);
	$num  = mysql_num_rows($check) ;
	
	if ($num ==0){
		if ($_SESSION['aAdmin']=="1")
		{
		$update= "UPDATE  admin SET aUsername='".$username."',aPassword='".$password."', aName='$name', aSurname='$lastname', aAdmin='".$admin."' where  aID = '".$aID."'";
        $result =  $db->query($update) ; 
		}
		if ($_SESSION['aAdmin']=="0")
		{
		$update= "UPDATE  admin SET aUsername='".$username."',aPassword='".$password."',aName='$name', aSurname='$lastname'  where  aID = '".$aID."'";
        $result =  $db->query($update) ; 
		}
				if ($_SESSION['aAdmin']=="2" and $aID =="1")
		{
		$update= "UPDATE  admin SET aUsername='".$username."',aPassword='".$password."',aName='$name',aSurname='$lastname'  where  aID = '".$aID."'";
        $result =  $db->query($update) ; 
		}else if  ($_SESSION['aAdmin']=="2" and $aID !="1")
		{
		$update= "UPDATE  admin SET aUsername='".$username."',aPassword='".$password."', aName='$name', aSurname='$lastname', aAdmin='".$admin."' where  aID = '".$aID."'";
        $result =  $db->query($update) ; 

		}


		
}else{
				echo "<div align='center' ><font face='Microsoft Sans Serif'>ชื่อล็อกอินซ้ำกรุณาตรวจสอบ</font><br><input type='button' value='Back' onclick='javascript:window.history.back();'></div>";
		exit;
}


		 if($result!=0)
	{
		echo		"<script language='javascript'>
	 window.location.href = 'admin_mod.php?msg=แก้ไขผู้ดูแลระบบเรียบร้อย&offset=$offset&limit=$limit'</script>";


}
}

?>
<?php 
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
			echo		"<script language='javascript'>
		 window.location.href = 'admin_mod.php?msg=เพิ่มผู้ดูแลระบบเรียบร้อย&offset=$offset&limit=$limit'</script>";
	}
}


?>
<?php
if($flag =="Delete") {


if (empty($checkbox))
{
		echo		"<script language='javascript'>
	 window.location.href = 'admin_mod.php?msg=กรุณาเลือกผู้ดูแลระบบ&offset=$offset&limit=$limit'</script>";
}
$i=0;
while($i<count($checkbox))
{
$aID = $checkbox[$i];
$query = "delete   from  admin where aID = $aID";
$result = $db->query($query) ; 
if(!$result)
return;
$i++;
}
if($result)
{ 

		echo		"<script language='javascript'>
	 window.location.href = 'admin_mod.php?msg=ลบผู้ดูแลระบบเรียบร้อย&offset=$offset&limit=$limit'</script>";
}
}
close($dbID) ; 
?>
