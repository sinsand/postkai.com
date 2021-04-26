<?php session_start();
include 'lib/connect.php' ;
include 'config/isLogon.php' ; 
$db = new mydb ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>ข้อมูลอสังหาริมทรัพย์ของท่าน</title>
<meta name="Keywords" content="ข้อมูลอสังหาริมทรัพย์,อสังหาริมทรัพย์,อสังหา,ซื้อ,ขาย,ให้เช่า,บ้าน,บ้านมือสอง,บ้านเดี่ยว,บ้านจัดสรร,ซื้อบ้านมือสอง,ขายรถยนต์มือสอง,เช่ารถยนต์,ห้องเช่า" />
<meta name="Description" content="ข้อมูลอสังหาริมทรัพย์ อสังหาริมทรัพย์ อสังหา ซื้อ ขาย ให้เช่า บ้าน บ้านมือสอง บ้านเดี่ยว บ้านจัดสรร ซื้อบ้านมือสอง ซื้อรถยนต์มือสอง ขายรถยนต์มือสอง เช่ารถยนต์ ห้องเช่า" />
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
<img src="<?=$page_link?>/images/myproperty.jpg" alt="ข้อมูลอสังหาริมทรัพย์ของคุณ" title="ข้อมูลอสังหาริมทรัพย์ของคุณ" /><br />

<div class="alink">
<p class="txtbold">ข้อมูลอสังหาริมทรัพย์ของคุณ&nbsp;<font color="#006600"><?=$Rmember['mUsername']?></font></p>
<a href="<?=$page_link?>/ลงประกาศฟรี-อสังหาริมทรัพย์/ลงประกาศฟรี" title="ลงประกาศฟรี"><font size="4">>>ลงประกาศฟรี<<</font></a><br /><br />
<?
$sql = "SELECT * FROM sb_job where mID = '".$_SESSION['mID']."' ORDER BY jDate_Create DESC";
$result = $db->query($sql);
$m = 1;
while ($row = mysql_fetch_array($result))
{
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
?>
<a href="<?=$page_link?>/<?=$cat_type?>/<?=$titleall?>/1/1/<?=$row['jType']?>/<?=$row['jaType']?>/<?=$row['jID']?>" target="_blank" title="<?=$row['jTitle']?>">
                <? 
		  	echo "<b><font size='3'>".$m.". "; 
			$position=100; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jTitle']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}	
			echo "</font></b>";		
			?>
</a>

<?
if($row['jPic1'] != "")
{
	echo "<img src='".$page_link."/images/picture.png' alt='$row[jTitle]' title='$row[jTitle]' />";
}
?>
&nbsp;&nbsp;&nbsp;<strong><a href="<?=$page_link?>/<?=$cat_type?>/<?=$titleall?>/<?=$row['jID']?>" title="<?=$row['jTitle']?>"><font color="#990000">Edit</font></a></strong>
<br />
<?
			$position=150; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jDetail']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
<br />
<font color="#009900"><? echo "".$page_link."/".$cat_type."/".$titleall."/1/1"."/".$row['jType']."/".$row['jaType']."/".$row['jID'].""; ?></font>
<br /><br /><br />
<?
$m++;}
?>
<br /><br />
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
