<?php session_start(); 
require 'lib/connect.php';
include "lib/imageTransform.php";
 
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

$file1_old1_name = $_POST['file1_old1'] ;
$file2_old2_name = $_POST['file2_old2'] ;

$rname = $_REQUEST['rname'] ; 
$rdetail = $_REQUEST['rdetail'] ;
$remail = $_REQUEST['remail'] ; 
$jID = $_REQUEST['jID'] ; 
$unlinks1 = $_REQUEST['unlinks1'] ; 
$unlinks2 = $_REQUEST['unlinks2'] ; 


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
		
    if($_SESSION['verify_value'] ==$_POST['capts'])
	{	
	
		if ($ctitle == 1 ){
		$ctitle_e = $ctitles_e ; 
		}else{
		$ctitle_e = $ctitle_e ;
		}
	
	
			if (filesize($HTTP_POST_FILES['file1']['tmp_name']) > 2048 * 1024)
				{
					echo "<script>alert('ท่านสามารอัพโหลดไฟล์ได้ไม่เกิน 2 MB ครับ');</script>" ;
					refresh(''.$page_link.'/ลงประกาศฟรี-อสังหาริมทรัพย์/ลงประกาศฟรี');
					exit();
			}
			if (filesize($HTTP_POST_FILES['file2']['tmp_name']) > 2048 * 1024)
				{
					echo "<script>alert('ท่านสามารอัพโหลดไฟล์ได้ไม่เกิน 2 MB ครับ');</script>" ;
					refresh(''.$page_link.'/ลงประกาศฟรี-อสังหาริมทรัพย์/ลงประกาศฟรี');
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
					print @unlink($bpicture['tmp_name']); 	
						
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

				 echo "<script>alert('ลงประกาศเรียบร้อย');</script>" ; 
				 refresh(''.$page_link.'/ข้อมูลอสังหาริมทรัพย์/'.$_SESSION['mID'].'') ; 
	}
	else
	{

				echo "<script>alert('รหัสรูปภาพไม่ถูกต้อง');</script>" ; 
				refresh(''.$page_link.'/ลงประกาศฟรี-อสังหาริมทรัพย์/ลงประกาศฟรี') ; 
	}

}

if($flag =="editjob") 
{

$sql = "SELECT * FROM sb_job where jID = '".$_POST['jID']."'";
$result = $db->query($sql);
$row = mysql_fetch_array($result);

$titleall = str_replace(' ','-', $row['jTitle']);
$titleall = str_replace('#','-', $titleall);
$titleall = str_replace('%','-', $titleall);

	if($row['jType'] == "1")
	{
		$cat_type = "บ้าน-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง";
	}
	if($row['jType'] == "2")
	{
		$cat_type = "คอนโด-คอนโดมีเนียม-อาคารชุด";
	}
	if($row['jType'] == "3")
	{
		$cat_type = "ตึก-อาคารพานิชย์-โรงงาน-โกดัง";
	}
	if($row['jType'] == "4")
	{
		$cat_type = "ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดิน";
	}
	if($row['jType'] == "5")
	{
		$cat_type = "อาคารเช่า-ห้องเช่า-บ้านเช่า";
	}
	if($row['jType'] == "6")
	{
		$cat_type = "อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ซ่อมแซม";
	}
	if($row['jType'] == "7")
	{
		$cat_type = "รถยนต์-รถมือสอง";
	}
	if($row['jType'] == "8")
	{
		$cat_type = "รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน";
	}
		
    if($_SESSION['verify_value'] ==$_POST['capts'])
	{	
	
		if ($ctitle == 1 ){
		$ctitle_e = $ctitles_e ; 
		}else{
		$ctitle_e = $ctitle_e ;
		}
	
	
			if (filesize($HTTP_POST_FILES['file1']['tmp_name']) > 2048 * 1024)
				{
					echo "<script>alert('ท่านสามารอัพโหลดไฟล์ได้ไม่เกิน 2 MB ครับ');</script>" ;
					refresh(''.$page_link.'/'.$cat_type.'/'.$titleall.'/'.$row['jID'].'');
					exit();
			}
			if (filesize($HTTP_POST_FILES['file2']['tmp_name']) > 2048 * 1024)
				{
					echo "<script>alert('ท่านสามารอัพโหลดไฟล์ได้ไม่เกิน 2 MB ครับ');</script>" ;
					refresh(''.$page_link.'/'.$cat_type.'/'.$titleall.'/'.$row['jID'].'');
					exit();
			}
	
				if($HTTP_POST_FILES['file1']['tmp_name'] != "")
				{
					@unlink("picture_job_1/".$file1_old1_name."");
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
				else
				{
					 if($unlinks1 != "")
					{
						@unlink("picture_job_1/".$file1_old1_name."");
					}
					else
					{
						$bpicname = $file1_old1_name;
						$bpic_file_name = "";
					}
				}
			
				if($HTTP_POST_FILES['file2']['tmp_name'] != "")
				{
				@unlink("picture_job_1/".$file2_old2_name."");
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
				else
				{
					 if($unlinks2 != "")
					{
					@unlink("picture_job_2/".$file2_old2_name."");
					}
					else
					{
					$bpicname2 = $file2_old2_name;
					$bpic_file_name2 = "";
					}
				}
	
				 $update = "UPDATE  sb_job SET jTitle='".$atitle_e."',jDetail='".$adetail."',jPrice='".$aprice."',jaType='".$aatype_e."' ,jType='".$atype_e."',jProvince='".$aprovince."',jPic1='".$bpicname.$bpic_file_name."',jPic2='".$bpicname2.$bpic_file_name2."',jc_Title='".$ctitle_e."',jc_Name='".$cname_e."',jc_Address='".$caddress_e."',jc_Telephone='".$ctelephone_e."',jc_Email='".$cemail_e."'where jID = '".$_POST['jID']."' and mID = '".$_SESSION['mID']."'";
				 $result = $db->query($update) ; 

				 echo "<script>alert('แก้ไขประกาศเรียบร้อย');</script>" ; 
				 refresh(''.$page_link.'/'.$cat_type.'/'.$titleall.'/'.$row['jID'].'');
	}
	else
	{

				echo "<script>alert('รหัสรูปภาพไม่ถูกต้อง');</script>" ; 
				refresh(''.$page_link.'/'.$cat_type.'/'.$titleall.'/'.$row['jID'].'');
	}

}

$db->close() ; 
?>