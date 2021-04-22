<?php session_start(); 
require 'lib/connect.php';
include "lib/imageTransform.php";
 
$db = new mydb;

$flag = $_REQUEST["flag"] ; 
$offset = $_REQUEST['offset'] ;
$limit = $_REQUEST['limit'] ; 
$atype = $_REQUEST['atype'] ; 
$atitle = $_REQUEST['atitle'] ;
$adetail = $_REQUEST['adetail'] ; 
$aemail = $_REQUEST['aemail'] ;
$file1_name = $HTTP_POST_FILES['file1']['name'] ;
$rname = $_REQUEST['rname'] ; 
$rdetail = $_REQUEST['rdetail'] ;
$remail = $_REQUEST['remail'] ; 
$bID = $_REQUEST['bID'] ; 

	if (get_magic_quotes_gpc())
{
	$aemail = stripslashes($aemail) ;
	$atype = stripslashes($atype) ;
	$atitle = stripslashes($atitle) ;
	$adetail = stripslashes($adetail) ;
	$rname = stripslashes($rname) ;
	$rdetail = stripslashes($rdetail) ;
	$remail = stripslashes($remail) ;
}
	$atitle_e = mysql_real_escape_string($atitle);
	$cemail_e = mysql_real_escape_string($cemail) ; 
	$atype_e = mysql_real_escape_string($atype) ;
	$adetail_e = mysql_real_escape_string($adetail) ;
	$rname_e = mysql_real_escape_string($rname) ;
	$rdetail_e = mysql_real_escape_string($rdetail) ;
	$remail_e = mysql_real_escape_string($remail) ;


if($flag =="addboard") 
{
		
    if($_SESSION['verify_value'] ==$_POST['capts'])
	{		
	
			if (filesize($HTTP_POST_FILES['file1']['tmp_name']) > 2048 * 1024)
				{
					echo "<script>alert('ท่านสามารอัพโหลดไฟล์ได้ไม่เกิน 2 MB ครับ');</script>" ;
					refresh(''.$page_link.'/webboard/เริ่มหัวข้อใหม่');
					exit();
			}
	
				if($HTTP_POST_FILES['file1']['tmp_name'] != "")
				{
				
				$size = GetimageSize($HTTP_POST_FILES['file1']['tmp_name']);
		
				if ($size[0] > 500)
				{
					$p = upload($file1_name, "board-pic/", $HTTP_POST_FILES['file1']['tmp_name'],  $bpicture,500,true,$name) ; 
				}
				else
				{
					$p = upload($file1_name, "board-pic/", $HTTP_POST_FILES['file1']['tmp_name'],  $bpicture, 0, false,$name) ; 
				}
					$bpicname=$p["picname"];
					$bpic_file_name = $p["picture_name"];
					@unlink($bpicture['tmp_name']); 	
						
				}
				
				$sql = "SELECT * FROM webboard where wType = '".$atype_e."' order by ID_NO desc limit 0,1";
				$result = $db->query($sql) ; 
				$fetch = mysql_fetch_array($result);
				$add = $fetch['ID_NO'] + 1;
	
				 $insert = "INSERT INTO  webboard (ID_NO,wTitle,wDetail,wType,wPic1,wEmail,wDate_Create,wStatus,mID) VALUES ('".$add."','".$atitle_e."','".$adetail."' ,'".$atype_e."','".$bpicname.$bpic_file_name."','".$cemail_e."' , NOW() ,'1', '".$_SESSION['mID']."')";
				 $result = $db->query($insert) ; 

				 echo "<script>alert('เพิ่มกระทู้เรียบร้อย');</script>" ; 
				 refresh(''.$page_link.'/เว็บบอร์ด/webboard') ; 
	}
	else
	{

				echo "<script>alert('รหัสรูปภาพไม่ถูกต้อง');</script>" ; 
				refresh(''.$page_link.'/webboard/เริ่มหัวข้อใหม่');
	}

}

if($flag =="Addrejob") 
{
	     if($_SESSION['verify_value'] ==$_POST['capts'])
		{
		
			if($rname_e == "admin" || $rname_e == "Admin" || $rname_e == "administrator" || $rname_e == "Administrator")
			{
			echo "<script>alert('ท่านไม่สามารถใช้ชื่อนี้ได้ครับ')</script>" ; 
			refresh(''.$page_link.'/board/'.$_POST['wTitle'].'/'.$_POST['bID'].'/'.$_POST['btype'].'') ; 
			exit();
			}
		
		$insert = "INSERT INTO  rejob (rName,rDetail,rEmail,wID,rDate_Create) VALUES ('".$rname_e."','".$rdetail_e."' ,'".$remail_e."' ,'".$bID."', NOW())";
		$result = $db->query($insert) ; 
		echo "<script>alert('ตอบกระทู้เรียบร้อย')</script>" ; 
		refresh(''.$page_link.'/board/'.$_POST['wTitle'].'/'.$_POST['bID'].'/'.$_POST['btype'].'') ; 
		
		}	
		else
		{

		echo "<script>alert('รหัสรูปภาพไม่ถูกต้อง')</script>" ; 
		refresh(''.$page_link.'/board/'.$_POST['wTitle'].'/'.$_POST['bID'].'/'.$_POST['btype'].'') ; 
		}
}


$db->close() ; 
?>