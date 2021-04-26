<?php
session_start() ; 
require '../lib/connect.php';
include "../lib/imageTransform.php";
$db = new mydb;

$flag = $_REQUEST["flag"];
$limit = $_REQUEST["limit"];
$offset = $_REQUEST["offset"];
$unlinks = $_POST['unlinks'] ; 
$bID = $_REQUEST["bID"];
$url = $_REQUEST['url'] ; 
$urlpic = $_REQUEST['urlpic'] ;
$detail = $_REQUEST['detail'] ; 
$checkbox = $_POST["checkbox"] ; 
$bpicture_name = $HTTP_POST_FILES['bpicture']['name'] ;
$bpicture_old = $_POST['bpicture_old'] ; 

$file1_name = $HTTP_POST_FILES['file1']['name'] ;
$bpicture_old1 = $_POST['bpicture_old1'] ; 
$unlinks1 = $_POST['unlinks1'] ; 
$file2_name = $HTTP_POST_FILES['file2']['name'] ;
$bpicture_old2 = $_POST['bpicture_old2'] ; 
$unlinks2 = $_POST['unlinks2'] ; 
$file3_name = $HTTP_POST_FILES['file3']['name'] ;
$bpicture_old3 = $_POST['bpicture_old3'] ; 
$unlinks3 = $_POST['unlinks3'] ; 
$file4_name = $HTTP_POST_FILES['file4']['name'] ;
$bpicture_old4 = $_POST['bpicture_old4'] ; 
$unlinks4 = $_POST['unlinks4'] ; 
$file5_name = $HTTP_POST_FILES['file5']['name'] ;
$bpicture_old5 = $_POST['bpicture_old5'] ; 
$unlinks5 = $_POST['unlinks5'] ; 

if (get_magic_quotes_gpc())
{
	$url = stripslashes($url);
	$urlpic = stripslashes($urlpic);

}

  if($flag =="Delete") {


if (empty($checkbox))
{
		refresh('banner_top_show.php?msg='.urlencode("กรุณาเลือกข้อมูลที่จะลบ.").'') ;
}
$i=0;
while($i<count($checkbox))
{
$bID = $checkbox[$i];
$sql = "SELECT * FROM banner WHERE bID=".$bID;
$result = $db->query($sql);
$row = mysql_fetch_array($result);

if ($row['bPic3'] != ""){ 
@unlink ("../picture_banner/banner-top/".$row['bPic3']);
}
if ($row['bPic1'] != ""){ 
@unlink ("../picture_banner/banner-left/".$row['bPic1']);
}
if ($row['bPic1'] != ""){ 
@unlink ("../picture_banner/banner-right/".$row['bPic1']);
}
if ($row['bPic2'] != ""){ 
@unlink ("../picture_banner/banner-center/".$row['bPic2']);
}
if ($row['bPic4'] != ""){ 
@unlink ("../picture_banner/banner-large/banner-large-1/".$row['bPic4']);
}
if ($row['bPic5'] != ""){ 
@unlink ("../picture_banner/banner-large/banner-large-2/".$row['bPic5']);
}

$query = "delete from  banner where bID = '".$bID."'";
$result = $db->query($query) ; 
if(!$result)
return;
$i++;
}
		refresh('banner_top_show.php?msg='.urlencode("ลบแบนเนอร์์เรียบร้อย.").'') ;
}


if($flag =="addbanner") 
{
	
		if ($bposition == "A"){
		$patch = "../picture_banner/banner-top/"; 
		}
		if($bposition == "B"){
		$patch = "../picture_banner/banner-left/"; 
		}
		if($bposition == "C"){
		$patch = "../picture_banner/banner-right/"; 
		}
		if($bposition == "D"){
		$patch = "../picture_banner/banner-center/"; 
		}
	
	
		if($HTTP_POST_FILES['file1']['tmp_name'] != "")
		{
				$ext = substring($file1_name, -4, 4);
	
				if ($ext != ".swf")
				{
						$size = GetimageSize($HTTP_POST_FILES['file1']['tmp_name']);
				
						if ($size[0] > 777)
						{
							$p = upload($file1_name, $patch, $HTTP_POST_FILES['file1']['tmp_name'],  $bpicture,777,true,$name) ; 
						}
						else
						{
							$p = upload($file1_name,$patch, $HTTP_POST_FILES['file1']['tmp_name'],  $bpicture, 0, false,$name) ; 
						}
							$bpicname1=$p["picname"];
							$bpic_file_name1 = $p["picture_name"];
							@unlink($bpicture['tmp_name']); 	
				}
				else
				{
							$p = upload($file1_name, $patch, $HTTP_POST_FILES['file1']['tmp_name'],  $bpicture, 0, false,$name) ; 
							$bpicname1=$p["picname"];
							$bpic_file_name1 = $p["picture_name"];
							@unlink($bpicture['tmp_name']); 
				}
								
		}
		
		if($HTTP_POST_FILES['file2']['tmp_name'] != "")
		{
				$ext = substring($file2_name, -4, 4);
	
				if ($ext != ".swf")
				{
						$size = GetimageSize($HTTP_POST_FILES['file2']['tmp_name']);
				
						if ($size[0] > 150)
						{
							$p = upload($file2_name, $patch, $HTTP_POST_FILES['file2']['tmp_name'],  $bpicture,150,true,$name) ; 
						}
						else
						{
							$p = upload($file2_name,$patch, $HTTP_POST_FILES['file2']['tmp_name'],  $bpicture, 0, false,$name) ; 
						}
							$bpicname2=$p["picname"];
							$bpic_file_name2 = $p["picture_name"];
							@unlink($bpicture['tmp_name']); 	
				}
				else
				{
							$p = upload($file2_name, $patch, $HTTP_POST_FILES['file2']['tmp_name'],  $bpicture, 0, false,$name) ; 
							$bpicname2=$p["picname"];
							$bpic_file_name2 = $p["picture_name"];
							@unlink($bpicture['tmp_name']); 
				}
								
		}
		
		if($HTTP_POST_FILES['file3']['tmp_name'] != "")
		{
				$ext = substring($file3_name, -4, 4);
	
				if ($ext != ".swf")
				{
						$size = GetimageSize($HTTP_POST_FILES['file3']['tmp_name']);
				
						if ($size[0] > 777)
						{
							$p = upload($file3_name, $patch, $HTTP_POST_FILES['file3']['tmp_name'],  $bpicture,777,true,$name) ; 
						}
						else
						{
							$p = upload($file3_name,$patch, $HTTP_POST_FILES['file3']['tmp_name'],  $bpicture, 0, false,$name) ; 
						}
							$bpicname3=$p["picname"];
							$bpic_file_name3 = $p["picture_name"];
							@unlink($bpicture['tmp_name']); 	
				}
				else
				{
							$p = upload($file3_name, $patch, $HTTP_POST_FILES['file3']['tmp_name'],  $bpicture, 0, false,$name) ; 
							$bpicname3=$p["picname"];
							$bpic_file_name3 = $p["picture_name"];
							@unlink($bpicture['tmp_name']); 
				}
								
		}
		
		if($HTTP_POST_FILES['file4']['tmp_name'] != "")
		{
				$ext = substring($file4_name, -4, 4);
	
				if ($ext != ".swf")
				{
						$size = GetimageSize($HTTP_POST_FILES['file4']['tmp_name']);
				
						if ($size[0] > 500)
						{
							$p = upload($file4_name, "../picture_banner/banner-large/banner-large-1/", $HTTP_POST_FILES['file4']['tmp_name'],  $bpicture,500,true,$name) ; 
						}
						else
						{
							$p = upload($file4_name,"../picture_banner/banner-large/banner-large-1/", $HTTP_POST_FILES['file4']['tmp_name'],  $bpicture, 0, false,$name) ; 
						}
							$bpicname4=$p["picname"];
							$bpic_file_name4 = $p["picture_name"];
							@unlink($bpicture['tmp_name']); 	
				}
				else
				{
							$p = upload($file4_name, "../picture_banner/banner-large/banner-large-1/", $HTTP_POST_FILES['file4']['tmp_name'],  $bpicture, 0, false,$name) ; 
							$bpicname4=$p["picname"];
							$bpic_file_name4 = $p["picture_name"];
							@unlink($bpicture['tmp_name']); 
				}
								
		}
		
		if($HTTP_POST_FILES['file5']['tmp_name'] != "")
		{
				$ext = substring($file5_name, -4, 4);
	
				if ($ext != ".swf")
				{
						$size = GetimageSize($HTTP_POST_FILES['file5']['tmp_name']);
				
						if ($size[0] > 500)
						{
							$p = upload($file5_name, "../picture_banner/banner-large/banner-large-2/", $HTTP_POST_FILES['file5']['tmp_name'],  $bpicture,500,true,$name) ; 
						}
						else
						{
							$p = upload($file5_name,"../picture_banner/banner-large/banner-large-2/", $HTTP_POST_FILES['file5']['tmp_name'],  $bpicture, 0, false,$name) ; 
						}
							$bpicname5=$p["picname"];
							$bpic_file_name5 = $p["picture_name"];
							@unlink($bpicture['tmp_name']); 	
				}
				else
				{
							$p = upload($file5_name, "../picture_banner/banner-large/banner-large-2/", $HTTP_POST_FILES['file5']['tmp_name'],  $bpicture, 0, false,$name) ; 
							$bpicname5=$p["picname"];
							$bpic_file_name5 = $p["picture_name"];
							@unlink($bpicture['tmp_name']); 
				}
								
		}

	
				 $insert = "INSERT INTO  banner (bTitle,bDetail,bURL,bPic1,bPic2,bPic3,bPic4,bPic5,bAddress,bProvince,bZipcode,bPosition,bMonth,bEmail,bTel,bStatus,bDate_Create) VALUES ('".$btitle."','".$bdetail."','".$burl."' ,'".$bpicname1.$bpic_file_name1."','".$bpicname2.$bpic_file_name2."','".$bpicname3.$bpic_file_name3."','".$bpicname4.$bpic_file_name4."','".$bpicname5.$bpic_file_name5."' ,'".$baddress."','".$bprovince."','".$bzipcode."','".$bposition."','".$bmonth."' ,'".$bemail."' ,'".$btel."' ,'1', NOW())";
				 $result = $db->query($insert) ; 

				 echo "<script>alert('เพิ่มประกาศลงเรียบร้อย')</script>" ; 
				 refresh('banner_top_show.php') ; 

}


if ($flag == "editbanner")
{
	if ($bposition == "A"){
	$patch = "../picture_banner/banner-top/"; 
	}
	if($bposition == "B"){
	$patch = "../picture_banner/banner-left/"; 
	}
	if($bposition == "C"){
	$patch = "../picture_banner/banner-right/"; 
	}
	if($bposition == "D"){
	$patch = "../picture_banner/banner-center/"; 
	}
		
	if ($HTTP_POST_FILES['file1']['tmp_name'] != "")
	{
		
		$ext = substring($file1_name, -4, 4);
	
		if ($ext != ".swf")
		{
				@unlink($patch.$bpicture_old1);
				$size = GetimageSize($HTTP_POST_FILES['file1']['tmp_name']);
		
				if ($size[0] > 777)
				{
					$p = upload($file1_name,$patch, $HTTP_POST_FILES['file1']['tmp_name'],  $bpicture,777,true,$name) ; 
				}
				else
				{
					$p = upload($file1_name,$patch, $HTTP_POST_FILES['file1']['tmp_name'],  $bpicture, 0, false,$name) ; 
				}
					$bpicname1=$p["picname"];
					$bpic_file_name1 = $p["picture_name"];
					@unlink($bpicture['tmp_name']); 	
		}
		else
		{
					
					@unlink($patch.$bpicture_old1);
					$p = upload($file1_name,$patch, $HTTP_POST_FILES['file1']['tmp_name'],  $bpicture, 0, false,$name) ; 
					$bpicname1=$p["picname"];
					$bpic_file_name1 = $p["picture_name"];
					@unlink($bpicture['tmp_name']); 
		}
		
	}
	else
	{
		 if($unlinks1 != "")
		{
		@unlink($patch.$bpicture_old1);
		}
		else
		{
		$bpicname1 = $bpicture_old1;
		$bpic_file_name1 = "";
		}
	
	}
	
	
	if ($HTTP_POST_FILES['file2']['tmp_name'] != "")
	{
		
		$ext = substring($file2_name, -4, 4);
	
		if ($ext != ".swf")
		{
				@unlink($patch.$bpicture_old2);
				$size = GetimageSize($HTTP_POST_FILES['file2']['tmp_name']);
		
				if ($size[0] > 150)
				{
					$p = upload($file2_name,$patch, $HTTP_POST_FILES['file2']['tmp_name'],  $bpicture,150,true,$name) ; 
				}
				else
				{
					$p = upload($file2_name,$patch, $HTTP_POST_FILES['file2']['tmp_name'],  $bpicture, 0, false,$name) ; 
				}
					$bpicname2=$p["picname"];
					$bpic_file_name2 = $p["picture_name"];
					@unlink($bpicture['tmp_name']); 	
		}
		else
		{
					@unlink($patch.$bpicture_old2);
					$p = upload($file2_name,$patch, $HTTP_POST_FILES['file2']['tmp_name'],  $bpicture, 0, false,$name) ; 
					$bpicname2=$p["picname"];
					$bpic_file_name2 = $p["picture_name"];
					@unlink($bpicture['tmp_name']); 
		}
		
	}
	else
	{
		 if($unlinks2 != "")
		{
		@unlink($patch.$bpicture_old2);
		}
		else
		{
		$bpicname2 = $bpicture_old2;
		$bpic_file_name2 = "";
		}
	
	}
	
	if ($HTTP_POST_FILES['file3']['tmp_name'] != "")
	{
		
		$ext = substring($file3_name, -4, 4);
	
		if ($ext != ".swf")
		{
				@unlink($patch.$bpicture_old3);
				$size = GetimageSize($HTTP_POST_FILES['file3']['tmp_name']);
		
				if ($size[0] > 777)
				{
					$p = upload($file3_name,$patch, $HTTP_POST_FILES['file3']['tmp_name'],  $bpicture,777,true,$name) ; 
				}
				else
				{
					$p = upload($file3_name,$patch, $HTTP_POST_FILES['file3']['tmp_name'],  $bpicture, 0, false,$name) ; 
				}
					$bpicname3=$p["picname"];
					$bpic_file_name3 = $p["picture_name"];
					@unlink($bpicture['tmp_name']); 	
		}
		else
		{
					@unlink($patch.$bpicture_old3);
					$p = upload($file3_name,$patch, $HTTP_POST_FILES['file3']['tmp_name'],  $bpicture, 0, false,$name) ; 
					$bpicname3=$p["picname"];
					$bpic_file_name3 = $p["picture_name"];
					@unlink($bpicture['tmp_name']); 
		}
		
	}
	else
	{
		 if($unlinks3 != "")
		{
		@unlink($patch.$bpicture_old3);
		}
		else
		{
		$bpicname3 = $bpicture_old3;
		$bpic_file_name3 = "";
		}
	
	}
	
	if ($HTTP_POST_FILES['file4']['tmp_name'] != "")
	{
		
		$ext = substring($file4_name, -4, 4);
	
		if ($ext != ".swf")
		{
				@unlink("../picture_banner/banner-large/banner-large-1/".$bpicture_old4);
				$size = GetimageSize($HTTP_POST_FILES['file4']['tmp_name']);
		
				if ($size[0] > 500)
				{
					$p = upload($file4_name,"../picture_banner/banner-large/banner-large-1/", $HTTP_POST_FILES['file4']['tmp_name'],  $bpicture,500,true,$name) ; 
				}
				else
				{
					$p = upload($file4_name,"../picture_banner/banner-large/banner-large-1/", $HTTP_POST_FILES['file4']['tmp_name'],  $bpicture, 0, false,$name) ; 
				}
					$bpicname4=$p["picname"];
					$bpic_file_name4 = $p["picture_name"];
					@unlink($bpicture['tmp_name']); 	
		}
		else
		{
					@unlink("../picture_banner/banner-large/banner-large-1/".$bpicture_old4);
					$p = upload($file4_name,"../picture_banner/banner-large/banner-large-1/", $HTTP_POST_FILES['file4']['tmp_name'],  $bpicture, 0, false,$name) ; 
					$bpicname4=$p["picname"];
					$bpic_file_name4 = $p["picture_name"];
					@unlink($bpicture['tmp_name']); 
		}
		
	}
	else
	{
		 if($unlinks4 != "")
		{
		@unlink("../picture_banner/banner-large/banner-large-1/".$bpicture_old4);
		}
		else
		{
		$bpicname4 = $bpicture_old4;
		$bpic_file_name4 = "";
		}
	
	}
	
	if ($HTTP_POST_FILES['file5']['tmp_name'] != "")
	{
		
		$ext = substring($file5_name, -4, 4);
	
		if ($ext != ".swf")
		{
				@unlink("../picture_banner/banner-large/banner-large-2/".$bpicture_old5);
				$size = GetimageSize($HTTP_POST_FILES['file5']['tmp_name']);
		
				if ($size[0] > 500)
				{
					$p = upload($file5_name,"../picture_banner/banner-large/banner-large-2/", $HTTP_POST_FILES['file5']['tmp_name'],  $bpicture,500,true,$name) ; 
				}
				else
				{
					$p = upload($file5_name,"../picture_banner/banner-large/banner-large-2/", $HTTP_POST_FILES['file5']['tmp_name'],  $bpicture, 0, false,$name) ; 
				}
					$bpicname5=$p["picname"];
					$bpic_file_name5 = $p["picture_name"];
					@unlink($bpicture['tmp_name']); 	
		}
		else
		{
					@unlink("../picture_banner/banner-large/banner-large-2/".$bpicture_old5);
					$p = upload($file5_name,"../picture_banner/banner-large/banner-large-2/", $HTTP_POST_FILES['file5']['tmp_name'],  $bpicture, 0, false,$name) ; 
					$bpicname5=$p["picname"];
					$bpic_file_name5 = $p["picture_name"];
					@unlink($bpicture['tmp_name']); 
		}
		
	}
	else
	{
		 if($unlinks5 != "")
		{
		@unlink("../picture_banner/banner-large/banner-large-2/".$bpicture_old5);
		}
		else
		{
		$bpicname5 = $bpicture_old5;
		$bpic_file_name5 = "";
		}
	
	}

		$sql = "UPDATE banner SET bTitle='".$_POST['btitle']."',bDetail='".$_POST['bdetail']."',bURL='".$_POST['burl']."',bPic1='".$bpicname1.$bpic_file_name1."',bPic2='".$bpicname2.$bpic_file_name2."',bPic3='".$bpicname3.$bpic_file_name3."',bPic4='".$bpicname4.$bpic_file_name4."',bPic5='".$bpicname5.$bpic_file_name5."',bAddress='".$_POST['baddress']."',bProvince='".$_POST['bprovince']."',bZipcode='".$_POST['bzipcode']."',bPosition='".$_POST['bposition']."',bMonth='".$_POST['bmonth']."',bEmail='".$_POST['bemail']."',bTel='".$_POST['btel']."' WHERE bID = '$bID'";		
		$result = $db->query($sql);
		if($result)
		{
		echo "<script>alert('แก้ไขเรียบร้อย'); window.location.replace('admin_mod.php');</script>" ; 
		}else{
		echo "<script>alert('ไม่สามารถแก้ไขได้'); window.location.replace('admin_mod.php');</script>" ; 
		}
}


if($flag =="changstatus") {

$update= "UPDATE  banner SET bStatus='".$_GET['active']."' where  bID = '".$_GET['bID']."'";
$result =  $db->query($update) ; 
echo	"<script language='javascript'>window.location.href = 'admin_mod.php?msg=เปลี่ยนสถานะเรียบร้อย&offset=$offset&limit=$limit'</script>";
}

?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">