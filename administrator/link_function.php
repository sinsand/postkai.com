<?php
session_start() ; 
require '../lib/connect.php';
include "../lib/imageTransform.php";
$db = new mydb;

$flag = $_REQUEST["flag"];
$limit = $_REQUEST["limit"];
$offset = $_REQUEST["offset"];
$unlinks = $_POST['unlinks'] ; 
$wID = $_REQUEST["wID"];
$url = $_REQUEST['url'] ; 
$urlpic = $_REQUEST['urlpic'] ;
$detail = $_REQUEST['detail'] ; 
$checkbox = $_POST["checkbox"] ; 
$bpicture_name = $HTTP_POST_FILES['bpicture']['name'] ;
$bpicture_old = $_POST['bpicture_old'] ; 

if (get_magic_quotes_gpc())
{
	$url = stripslashes($url);
	$urlpic = stripslashes($urlpic);

}

  if($flag =="Delete") {


if (empty($checkbox))
{
		refresh('link_mod.php?msg='.urlencode("กรุณาเลือกข้อมูลที่จะลบ.").'') ;
}
$i=0;
while($i<count($checkbox))
{
$wID = $checkbox[$i];
$sql = "SELECT * FROM web_link WHERE wID=".$wID;
$result = $db->query($sql);
$row = mysql_fetch_array($result);
@unlink ("weblink/".$row['wPic']);

$query = "delete   from  web_link where wID = '".$wID."'";
$result = $db->query($query) ; 
if(!$result)
return;
$i++;
}
		refresh('link_mod.php?msg='.urlencode("ลบแลกลิิ้้งค์เรียบร้อย.").'') ;
}


if ($flag == "Add")
{
	
if ($HTTP_POST_FILES['bpicture']['tmp_name'] != "")
	{
		


		$size = GetimageSize($HTTP_POST_FILES['bpicture']['tmp_name']);
		
		if ($size[0] > 88)
		{
			$p = upload($bpicture_name, "weblink/", $HTTP_POST_FILES['bpicture']['tmp_name'],  $bpicture,88,true,$name) ; 
		}
		else
		{
			$p = upload($bpicture_name, "weblink/", $HTTP_POST_FILES['bpicture']['tmp_name'],  $bpicture, 0, false,$name) ; 
		}
		


		
		$bpicname=$p["picname"];
		$bpic_file_name = $p["picture_name"];
		@unlink($bpicture['tmp_name']); 
	}
			 
	$sql = "INSERT INTO web_link (wPic,wDetail,wURL,wURLPic,wStatus,wDate_Create) VALUES ('".$bpicname.$bpic_file_name."','".$detail."','".mysql_real_escape_string($url)."','".mysql_real_escape_string($urlpic)."','0',NOW())";
	$db->query($sql);
	refresh('link_mod.php') ;
}


if ($flag == "Edit")
{
		
	if ($HTTP_POST_FILES['bpicture']['tmp_name'] != "")
	{
	
		@unlink("weblink/".$bpicture_old);

		$size = getimagesize($HTTP_POST_FILES['bpicture']['tmp_name']);
		
		if ($size[0] > 88)
		{
			$p = upload($bpicture_name, "weblink/", $HTTP_POST_FILES['bpicture']['tmp_name'], $bpicture,88,true,$name) ; 
		}
		else
		{
			$p = upload($bpicture_name, "weblink/", $HTTP_POST_FILES['bpicture']['tmp_name'], $bpicture, 0, false,$name) ; 
		}

	 $bpicname=$p["picname"];
	 $bpic_file_name = $p["picture_name"];

	}
	else
	{
		 if($unlinks != "")
		{
		@unlink("weblink/".$bpicture_old);
		}
		else
		{
		$bpicname = $bpicture_old;
		$bpic_file_name = "";

		}
	}

		$sql = "UPDATE web_link SET wPic = '".$bpicname.$bpic_file_name."',wDetail = '".$detail."',wURL = '".mysql_real_escape_string($url)."',wURLPic = '".mysql_real_escape_string($urlpic)."' WHERE wID = '$wID'";
		$db->query($sql);
		$msg = urlencode("แก้ไขเว็บลิ้งค์เรียบร้อยแล้วครับ") ; 
		refresh('link_mod.php?msg='.$msg.'&offset='.$offset.'&limit='.$limit.'') ;
}


if($flag =="changstatus") {

$update= "UPDATE  web_link SET wStatus='".$_GET['active']."' where  wID = '".$_GET['wID']."'";
$result =  $db->query($update) ; 
echo	"<script language='javascript'>window.location.href = 'link_mod.php?msg=เปลี่ยนสถานะเรียบร้อย&offset=$offset&limit=$limit'</script>";
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">