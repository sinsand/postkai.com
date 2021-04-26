<?php
session_start() ; 
require '../lib/connect.php';
include "../lib/imageTransform.php";
$db = new mydb;

$flag = $_REQUEST["flag"];
$limit = $_REQUEST["limit"];
$offset = $_REQUEST["offset"];
$unlinks = $_POST['unlinks'] ; 
$nID = $_REQUEST["nID"];
$title = $_REQUEST['title'] ; 
$detail = $_REQUEST['detail'] ; 
$checkbox = $_POST["checkbox"] ; 
$bpicture_name = $HTTP_POST_FILES['bpicture']['name'] ;
$bpicture_old = $_POST['bpicture_old'] ; 

if (get_magic_quotes_gpc())
{
	$title = stripslashes($title);

}

  if($flag =="Delete") {


if (empty($checkbox))
{
		refresh('news_mod.php?msg='.urlencode("กรุณาเลือกข้อมูลที่จะลบ.").'') ;
}
$i=0;
while($i<count($checkbox))
{
$nID = $checkbox[$i];
$sql = "SELECT * FROM news WHERE nID=".$nID;
$result = $db->query($sql);
$row = mysql_fetch_array($result);
@unlink ("news/".$row['nPic']);

$query = "delete   from  news where nID = $nID";
$result = $db->query($query) ; 
if(!$result)
return;
$i++;
}
		refresh('news_mod.php?msg='.urlencode("ลบข่าวสารเรียบร้อย.").'') ;
}


if ($flag == "Add")
{
	
if ($HTTP_POST_FILES['bpicture']['tmp_name'] != "")
	{
		


		$size = GetimageSize($HTTP_POST_FILES['bpicture']['tmp_name']);
		
		if ($size[0] > 500)
		{
			$p = upload($bpicture_name, "news/", $HTTP_POST_FILES['bpicture']['tmp_name'],  $bpicture,500,true,$name) ; 
		}
		else
		{
			$p = upload($bpicture_name, "news/", $HTTP_POST_FILES['bpicture']['tmp_name'],  $bpicture, 0, false,$name) ; 
		}
		


		
		$bpicname=$p["picname"];
		$bpic_file_name = $p["picture_name"];
		@unlink($bpicture['tmp_name']); 
	}
			 
	$sql = "INSERT INTO news (nTitle,nDetail,nPic,nStatus,nDate_Create) VALUES ('".mysql_real_escape_string($title)."', '".$detail."','".$bpicname.$bpic_file_name."','1',NOW())";
	$db->query($sql);
	refresh('news_mod.php') ;
}


if ($flag == "Edit")
{
		
	if ($HTTP_POST_FILES['bpicture']['tmp_name'] != "")
	{
	
		@unlink("news/".$bpicture_old);

		$size = getimagesize($HTTP_POST_FILES['bpicture']['tmp_name']);
		
		if ($size[0] > 500)
		{
			$p = upload($bpicture_name, "news/", $HTTP_POST_FILES['bpicture']['tmp_name'], $bpicture,500,true,$name) ; 
		}
		else
		{
			$p = upload($bpicture_name, "news/", $HTTP_POST_FILES['bpicture']['tmp_name'], $bpicture, 0, false,$name) ; 
		}

	 $bpicname=$p["picname"];
	 $bpic_file_name = $p["picture_name"];

	}
	else
	{
		 if($unlinks != "")
		{
		@unlink("news/".$bpicture_old);
		}
		else
		{
		$bpicname = $bpicture_old;
		$bpic_file_name = "";

		}
	}

		$sql = "UPDATE news SET nTitle = '".mysql_real_escape_string($title)."',nDetail = '".$detail."',nPic = '".$bpicname.$bpic_file_name."' WHERE nID = '$nID'";
		$db->query($sql);
		$msg = urlencode("แก้ไขข่าวสารเรียบร้อยแล้วครับ") ; 
		refresh('news_mod.php?msg='.$msg.'&offset='.$offset.'&limit='.$limit.'') ;
}


if($flag =="changstatus") {

$update= "UPDATE  news SET nStatus='".$_GET['active']."' where  nID = '".$_GET['nID']."'";
$result =  $db->query($update) ; 
echo	"<script language='javascript'>window.location.href = 'news_mod.php?msg=เปลี่ยนสถานะเรียบร้อย&offset=$offset&limit=$limit'</script>";
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">