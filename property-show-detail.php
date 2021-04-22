<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;

if($_GET['IDRead'] == "1")
{

$sql = "SELECT * FROM sb_job WHERE jID=".$_GET['jID'];
$result = $db->query($sql);
$array = mysql_fetch_array($result);
$addread = $array['jRead'] + 1 ;
	
$query = "update sb_job set jRead = '$addread'  where jID = '".$_GET['jID']."'";
$result = $db->query($query) ; 
}

$sqlmem = "SELECT * FROM member WHERE mID='".$_SESSION["mID"]."'";
$resultmem = $db->query($sqlmem);
$arraymem = mysql_fetch_array($resultmem);

$sql = "SELECT * FROM sb_job WHERE jID=".$_GET['jID'];
$result = $db->query($sql);
$array = mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title><?=$array['jTitle']?></title>
<meta name="Keywords" content="อสังหาริมทรัพย์,อสังหา,ซื้อ,ขาย,ให้เช่า,บ้าน,บ้านมือสอง,บ้านเดี่ยว,บ้านจัดสรร,ซื้อบ้านมือสอง,ซื้อขายบ้าน,ลงประกาศฟรี,ทาวน์เฮ้าส์,ซื้อทาวน์เฮ้าส์,ขายที่ดิน,ซื้อที่ดิน,ซื้อคอนโดมิเนียม,ขายคอนโดมิเนียม,เช่าคอนโดมิเนียม,ซื้อรถยนต์มือสอง,ขายรถยนต์มือสอง,เช่ารถยนต์,ห้องเช่า" />
<meta name="Description" content="อสังหาริมทรัพย์ อสังหา ซื้อ ขาย ให้เช่า บ้าน บ้านมือสอง บ้านเดี่ยว บ้านจัดสรร ซื้อบ้านมือสอง ซื้อขายบ้าน ลงประกาศฟรี ทาวน์เฮ้าส์ ซื้อทาวน์เฮ้าส์ ขายที่ดิน ซื้อที่ดิน ซื้อคอนโดมิเนียม ขายคอนโดมิเนียม เช่าคอนโดมิเนียม ซื้อรถยนต์มือสอง ขายรถยนต์มือสอง เช่ารถยนต์ ห้องเช่า" />
<meta name="robots" content="index,follow" />
<meta name="stats-in-th" content="f0f5" />
<link href="<?=$page_link?>/css/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="<?=$page_link?>/favicon.ico" />
<script type="text/javascript" src="<?=$page_link?>/js/checkmember.js"></script>
<script type="text/javascript">
function bookmark(title,url){
	if(window.sidebar){ // สำหรับ firefox
		window.sidebar.addPanel(title, url, "");
	}else if(window.opera & window.print){ // สำหรับ opera
		var elem = document.createElement('a');
		elem.setAttribute('href',url);
		elem.setAttribute('title',title);
		elem.setAttribute('rel','sidebar');
		elem.click();
	}else if(document.all){// สำหรับ ie
		window.external.AddFavorite(url, title);
	}	
}
</script>
</head>
<body>
<center>
<!--HEAD-->
<div class="head">
<div class="headlogo"><? include "include-logo.php"; ?></div>
<div class="headmember">
<? include "include-member-menu.php"; ?>
</div>
</div>

<!--MENU-->
<div class="headmenu"><? include "include-head-menu.php"; ?></div>

<!--MENUCAT-->
<div class="headcat">
<div class="menucat"><? include "include-left-menu.php"; ?></div>
<div class="banner"><? include "include-banner.php"; ?><? include "include-remenu.php"; ?></div>
</div>


<!--CONTENT-->
<div class="content">
<div class="lnews"><? include "include-news.php"; ?><? include "include-rerandom.php"; ?></div>

<div class="rjob">
<div class="rjobleft">
<img src="<?=$page_link?>/images/asungha_show_detail.jpg" alt="รายละเอียดอสังหาริมทรัพย์" title="รายละเอียดอสังหาริมทรัพย์" /><br />

<div class="alink">

<?
	$sql = "SELECT * FROM sb_job WHERE jID=".$_GET['jID'];
	$result = $db->query($sql);
	$row = mysql_fetch_array($result);
?>

<p><h2>&raquo;&nbsp;
<font color="#0033FF"><? if($row['jaType'] == 1){echo "ซื้อ";}else if($row['jaType'] == 2){echo "ขาย";}else{echo "ให้เช่า";} ?></font>&nbsp;&raquo;&nbsp;
<font color="#0033FF"><? 
		if($row['jType'] == 1)
		{
		echo "House (บ้าน-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง ฯ)";
		}
		else if($row['jType'] == 2)
		{
		echo "Condo (คอนโด-คอนโดมีเนียม-อาคารชุด ฯ)"; 
		}
		else if($row['jType'] == 3)
		{
		echo "Building (ตึก-อาคารพานิชย์-โรงงาน-โกดัง ฯ)";
		}
		else if($row['jType'] == 4)
		{
		echo "Land (ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดิน ฯ)";
		}
		else if($row['jType'] == 5)
		{
		echo "Rent (อาคารเช่า-ห้องเช่า-บ้านเช่า ฯ)";
		}
		else if($row['jType'] == 6)
		{
		echo "Funiture (อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ซ่อมแซม ฯ)";
		}
		else if($row['jType'] == 7)
		{
		echo "Car (รถยนต์-รถมือสอง-รถยนต์มือสอง ฯ)";
		}
		else if($row['jType'] == 8)
		{
		echo "Others (รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน ฯ )";
		}
		?></font>
</h2>
</p>
<p class="paddingsing"><strong><h2><u><?=$row['jTitle']?>&nbsp;(จังหวัด<?=$row['jProvince']?>)</u></h2></strong></p><br />
<p align="center">
<?  if($row['jPic1'] != "" and $row['jPic1'] != "1"){  echo "<img src='$page_link/picture_job_1/".$row['jPic1']."' alt='".$row['jTitle']."' title='".$row['jTitle']."' /><br /><br />"; } ?>
<?  if($row['jPic2'] != "" and $row['jPic2'] != "2"){  echo "<img src='$page_link/picture_job_2/".$row['jPic2']."' alt='".$row['jTitle']."' title='".$row['jTitle']."' /><br />"; } ?>
</p>
<p style="padding-left:30px;">
<? echo "ราคา&nbsp;<font color='#CC0000'><b>".$row['jPrice']."</b></font>&nbsp;บาท";?><br /><?=nl2br($row['jDetail'])?>
<br />
<strong><font color="#0033FF">ที่อยู่ในการติดต่อ</font></strong><br />
<?=$row['jc_Title']."&nbsp;".$row['jc_Name']?>
<br />
<strong>ที่อยู่&nbsp;:&nbsp;</strong>&nbsp;<?=$row['jc_Address']?>
<br />
<strong>เบอร์โทรศัพท์&nbsp;:&nbsp;</strong><?=$row['jc_Telephone']?>
<br />
<strong>อีเมล&nbsp;:&nbsp;</strong><?=$row['jc_Email']?>
<br /><br /><br />
<strong>ดูประกาศนี้ทั้งหมด&nbsp;:&nbsp;<font color="#006600"><?=number_format($row['jRead'])?></font>&nbsp;ครั้ง</strong>
<br />
<strong>ลงประกาศเมื่อวันที่&nbsp;:&nbsp;</strong><?=$row['jDate_Create']?>
</p>
<br />

<p align="center"><font color="#B4B4B4">--------------------------------------------------------------------------------------------------------------------------------</font></p>
</div>
</div>



<div class="rjobright"><? include "include-right-banner.php"; ?></div>

</div>
</div>

<!--FOOTER-->
<div class="footer"><br /><? include "include-footer.php"; ?></div>

</center>
</body>
</html>
