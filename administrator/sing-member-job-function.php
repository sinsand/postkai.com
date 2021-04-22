<?php session_start(); 
require '../lib/connect.php';
require '../lib/images.php';
include "../lib/imageTransform.php";
 
$db = new mydb;

$flag = $_REQUEST["flag"] ; 
$offset = $_REQUEST['offset'] ;
$limit = $_REQUEST['limit'] ; 
$atype = $_REQUEST['atype'] ; 
$aatype = $_REQUEST['aatype'] ; 
$atitle = $_REQUEST['atitle'] ;
$aprice = $_REQUEST['aprice'] ; 
$adetail = $_REQUEST['adetail'] ;
$aprovince = $_REQUEST['aprovince'] ;  

$ctitle = $_REQUEST['ctitle'] ; 
$ctitles = $_REQUEST['ctitles'] ;
$cname = $_REQUEST['cname'] ; 
$caddress = $_REQUEST['caddress'] ; 
$ctelephone = $_REQUEST['ctelephone'] ;  
$cemail = $_REQUEST['cemail'] ;

$file1_name = $HTTP_POST_FILES['file1']['name'] ;
$file2_name = $HTTP_POST_FILES['file2']['name'] ;

$rname = $_REQUEST['rname'] ; 
$rdetail = $_REQUEST['rdetail'] ;
$remail = $_REQUEST['remail'] ; 
$jID = $_REQUEST['jID'] ; 


	if (get_magic_quotes_gpc())
{
	$atitle = stripslashes($atitle);
	$ctitle = stripslashes($ctitle);
	$ctitles = stripslashes($ctitles);
	$cname = stripslashes($cname);
	$caddress = stripslashes($caddress);
	$ctelephone = stripslashes($ctelephone) ; 
	$cemail = stripslashes($cemail) ;
	$atype = stripslashes($atype) ;
	$aatype = stripslashes($aatype) ;
	$atitle = stripslashes($atitle) ;
	$adetail = stripslashes($adetail) ;
	$rname = stripslashes($rname) ;
	$rdetail = stripslashes($rdetail) ;
	$remail = stripslashes($remail) ;
}
	$atitle_e = mysql_real_escape_string($atitle);
	$ctitle_e = mysql_real_escape_string($ctitle);
	$ctitles_e = mysql_real_escape_string($ctitles);
	$cname_e = mysql_real_escape_string($cname);
	$caddress_e = mysql_real_escape_string($caddress);
	$ctelephone_e = mysql_real_escape_string($ctelephone);
	$cemail_e = mysql_real_escape_string($cemail) ; 
	$atype_e = mysql_real_escape_string($atype) ;
	$aatype_e = mysql_real_escape_string($aatype) ;
	$atitle_e = mysql_real_escape_string($atitle) ;
	$adetail_e = mysql_real_escape_string($adetail) ;
	$rname_e = mysql_real_escape_string($rname) ;
	$rdetail_e = mysql_real_escape_string($rdetail) ;
	$remail_e = mysql_real_escape_string($remail) ;

if($flag =="addjob") 
{
		
    if($_SESSION['captchas'] ==$_POST['capts'])
	{	
	
		if ($ctitle == 1 ){
		$ctitle_e = $ctitles_e ; 
		}else{
		$ctitle_e = $ctitle_e ;
		}
	
	
			if (filesize($HTTP_POST_FILES['file1']['tmp_name']) > 2048 * 1024)
				{
					echo "<script>alert('ท่านสามารอัพโหลดไฟล์ได้ไม่เกิน 2 MB ครับ')</script>" ;
					refresh('sing-member-job-add.php');
					exit();
			}
			if (filesize($HTTP_POST_FILES['file2']['tmp_name']) > 2048 * 1024)
				{
					echo "<script>alert('ท่านสามารอัพโหลดไฟล์ได้ไม่เกิน 2 MB ครับ')</script>" ;
					refresh('sing-member-job-add.php');
					exit();
			}
	
				if($HTTP_POST_FILES['file1']['tmp_name'] != "")
				{
				
				$size = GetimageSize($HTTP_POST_FILES['file1']['tmp_name']);
		
				if ($size[0] > 500)
				{
					$p = upload($file1_name, "picture_job_1/", $HTTP_POST_FILES['file1']['tmp_name'],  $bpicture,500,true,$name) ; 
				}
				else
				{
					$p = upload($file1_name, "picture_job_1/", $HTTP_POST_FILES['file1']['tmp_name'],  $bpicture, 0, false,$name) ; 
				}
					$bpicname=$p["picname"];
					$bpic_file_name = $p["picture_name"];
					@unlink($bpicture['tmp_name']); 	
						
				}
			
				if($HTTP_POST_FILES['file2']['tmp_name'] != "")
				{
				$size = GetimageSize($HTTP_POST_FILES['file2']['tmp_name']);
		
				if ($size[0] > 500)
				{
					$p = upload($file2_name, "picture_job_2/", $HTTP_POST_FILES['file2']['tmp_name'],  $bpicture,500,true,$name) ; 
				}
				else
				{
					$p = upload($file2_name, "picture_job_2/", $HTTP_POST_FILES['file2']['tmp_name'],  $bpicture, 0, false,$name) ; 
				}
					$bpicname2=$p["picname"];
					$bpic_file_name2 = $p["picture_name"];
					@unlink($bpicture['tmp_name']); 			
						
				}
				
				$sql = "SELECT * FROM sb_job where jType = '".$atype_e."' order by IDJOB desc limit 0,1";
				$result = $db->query($sql) ; 
				$fetch = mysql_fetch_array($result);
				$add = $fetch['IDJOB'] + 1;
	
				 $insert = "INSERT INTO  sb_job (IDJOB,jTitle,jDetail,jPrice,jaType ,jType,jProvince,jPic1,jPic2,jc_Title,jc_Name,jc_Address,jc_Telephone,jc_Email,jDate_Create,jStatus,mID) VALUES ('".$add."','".$atitle_e."','".$adetail."' ,'".$aprice."' ,'".$aatype_e."','".$atype_e."' ,'".$aprovince."','".$bpicname.$bpic_file_name."' ,'".$bpicname2.$bpic_file_name2."' ,'".$ctitle_e."','".$cname_e."','".$caddress_e."' ,'".$ctelephone_e."' , '".$cemail_e."' , NOW() ,'1', '".$_SESSION['mID']."')";
				 $result = $db->query($insert) ; 

				 echo "<script>alert('ลงประกาศเรียบร้อย')</script>" ; 
				 refresh('sing-member-job-show.php') ; 
	}
	else
	{

				echo "<script>alert('รหัสรูปภาพไม่ถูกต้อง')</script>" ; 
				refresh('sing-member-job-add.php') ; 
	}

}


if($flag =="deletejob") 
{
	$sql = "SELECT * FROM sb_job WHERE jID=".$_GET['jID'];
	$result = $db->query($sql);
	$row = mysql_fetch_array($result);
	if($row['jPic1'] != "")
	{
	@unlink ("../picture_job_1/".$row['jPic1']);
	}
	if($row['jPic2'] != "")
	{
	@unlink ("../picture_job_2/".$row['jPic2']);
	}
	
	$query = "delete from sb_job where jID = '".$_GET['jID']."'";
	$result = $db->query($query) ; 
	
	echo "<script>alert('ลบประกาศเรียบร้อย')</script>" ; 
	refresh('member_view.php?mID='.$_GET['mID'].'') ; 
}


if($flag =="Addrejob") 
{
	    if($_SESSION['captchas'] ==$_POST['capts'])
		{
		
			if($rname_e == "admin" || $rname_e == "Admin" || $rname_e == "administrator" || $rname_e == "Administrator")
			{
			echo "<script>alert('ท่านไม่สามารถใช้ชื่อนี้ได้ครับ')</script>" ; 
			refresh('sing-member-signup.php') ; 
			exit();
			}
		
		$insert = "INSERT INTO  rejob (rName,rDetail,rEmail,jID ,rDate_Create) VALUES ('".$rname_e."','".$rdetail_e."' ,'".$remail_e."' ,'".$jID."', NOW())";
		$result = $db->query($insert) ; 
		echo "<script>alert('ตอบกระทู้เรียบร้อย')</script>" ; 
		refresh('sing-member-job-show-detail.php?jID='.$jID.'&offset='.$offset.'&limit='.$limit.'') ;
		
		}	
		else
		{

		echo "<script>alert('รหัสรูปภาพไม่ถูกต้อง')</script>" ; 
		refresh('sing-member-job-show-detail.php?jID='.$jID.'&offset='.$offset.'&limit='.$limit.'') ;
		}
}

$db->close() ; 
?>