<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>เว็บบอร์ด หัวข้อบอร์ดอสังหาริมทรัพย์ ลงประกาศฟรี อสังหาริมทรัพย์ เว็บบอร์ดอสังหาริมทรัพย์</title>
<meta name="Keywords" content="หัวข้อบอร์ดอสังหาริมทรัพย์,เว็บบอร์ด,อสังหาริมทรัพย์,อสังหา,ซื้อ,ขาย,ให้เช่า,บ้าน,บ้านมือสอง,บ้านเดี่ยว,บ้านจัดสรร,ซื้อบ้านมือสอง,ซื้อขายบ้าน,ลงประกาศฟรี,เช่าคอนโดมิเนียม,ซื้อรถยนต์มือสอง" />
<meta name="Description" content="หัวข้อบอร์ดอสังหาริมทรัพย์,อสังหาริมทรัพย์ อสังหา ซื้อ ขาย ให้เช่า บ้าน บ้านมือสอง บ้านเดี่ยว บ้านจัดสรร ซื้อบ้านมือสอง ซื้อขายบ้าน ลงประกาศฟรี" />
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

<!--WEBBOARD-->
<div class="bodywebboard">
&nbsp;<p><strong><font size="4">กระทู้ทั้งหมด&nbsp;
<?
$sql = "SELECT * FROM webboard where wType = '".$_GET['bID']."'";
$result = $db->query($sql);
echo $num = mysql_num_rows($result);
?>&nbsp;
กระทู้
&nbsp;&nbsp;&nbsp;<a href="<?=$page_link?>/webboard/เริ่มหัวข้อใหม่" title="เริ่มหัวข้อใหม่"><img src="<?=$page_link?>/images/new-topic.png" border="0" alt="เริ่มหัวข้อใหม่" title="เริ่มหัวข้อใหม่" /></a></font></strong>
</p>
<h3><font color="#FF0000"><u>++&nbsp;ประกาศ!&nbsp;&nbsp;เว็บบอร์ดอสังหาริมทรัพย์สามารถใช้งานได้แล้วตั้งแต่บัดนี้เป็นต้นไปครับ.&nbsp;++</u></font></h3>
&nbsp;
<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard">
<? if($_GET['bID'] == "1"){ ?><img src="<?=$page_link?>/images/board-home.png" alt="บ้าน ,ทาวน์เฮ้าส์ ,บ้านจัดสรร ,บ้านเดี่ยว ,บ้านมือสอง" title="บ้าน ,ทาวน์เฮ้าส์ ,บ้านจัดสรร ,บ้านเดี่ยว ,บ้านมือสอง" /><? } ?>
<? if($_GET['bID'] == "2"){ ?><img src="<?=$page_link?>/images/board-condo.png" alt="คอนโด ,คอนโดมีเนียม ,อาคารชุด ,อพาร์ทเม้นท์" title="คอนโด ,คอนโดมีเนียม ,อาคารชุด ,อพาร์ทเม้นท์" /><? } ?>
<? if($_GET['bID'] == "3"){ ?><img src="<?=$page_link?>/images/board-building.png" alt="ตึก ,อาคารพานิชย์ ,โรงงาน ,โกดัง ,สำนักงาน" title="ตึก ,อาคารพานิชย์ ,โรงงาน ,โกดัง ,สำนักงาน" /><? } ?>
<? if($_GET['bID'] == "4"){ ?><img src="<?=$page_link?>/images/board-land.png" alt="ที่ดินเปล่า ,ที่ดินจัดสรร ,ที่ดิน" title="ที่ดินเปล่า ,ที่ดินจัดสรร ,ที่ดิน" /><? } ?>
<? if($_GET['bID'] == "5"){ ?><img src="<?=$page_link?>/images/board-rent.png" alt="อาคารเช่า ,ห้องเช่า ,ตึกเช่า ,ห้องพัก ,ให้เช่า ,ห้องว่างให้เช่า" title="อาคารเช่า ,ห้องเช่า ,ตึกเช่า ,ห้องพัก ,ให้เช่า ,ห้องว่างให้เช่า" /><? } ?>
<? if($_GET['bID'] == "6"){ ?><img src="<?=$page_link?>/images/board-furniture.png" alt="อุปกร์ตกแต่งบ้าน ,อุปกรณ์สำนักงาน ,แอร์ ,ซ่อมแซม ,เฟอร์นิเจอร์" title="อุปกร์ตกแต่งบ้าน ,อุปกรณ์สำนักงาน ,แอร์ ,ซ่อมแซม ,เฟอร์นิเจอร์" /><? } ?>
<? if($_GET['bID'] == "7"){ ?><img src="<?=$page_link?>/images/board-car.png" alt="รถยนต์ ,รถมือสอง ,รถยนต์มือสอง ,รถใหม่ ,รถบรรทุก" title="รถยนต์ ,รถมือสอง ,รถยนต์มือสอง ,รถใหม่ ,รถบรรทุก" /><? } ?>
<? if($_GET['bID'] == "8"){ ?><img src="<?=$page_link?>/images/board-others.png" alt="รถรับจ้าง ,ทุบตึก ,รื้อถอนบ้าน ,ย้ายสำนักงาน และอื่น ๆ" title="รถรับจ้าง ,ทุบตึก ,รื้อถอนบ้าน ,ย้ายสำนักงาน และอื่น ๆ" /><? } ?>
</div>
<div class="textwebboard"><strong>
<? if($_GET['bID'] == "1"){ ?>
<font size="4">House</font></strong><br /><strong>บ้าน ,ทาวน์เฮ้าส์ ,บ้านจัดสรร ,บ้านเดี่ยว ,บ้านมือสอง</strong><br />
ร่วมพูดคุย แบ่งปันเรื่องราวไม่ว่าจะเป็นการสร้างบ้าน การเลือกซื้อบ้าน บ้านเดี่ยว บ้านจัดสรร ทาวน์เฮ้าส์ เป็นต้น
<? } ?>
<? if($_GET['bID'] == "2"){ ?>
<font size="4">Condo</font></strong><br /><strong>คอนโด ,คอนโดมีเนียม ,อาคารชุด ,อพาร์ทเม้นท์</strong><br />
ร่วมพูดคุย แบ่งปันเรื่องราวไม่ว่าจะเป็นการสร้างคอนโด การเลือกซื้อคอนโด อพาร์ทเม้นท์ คอนโดมีเนียม เป็นต้น 
<? } ?>
<? if($_GET['bID'] == "3"){ ?>
<font size="4">Building</font></strong><br /><strong>ตึก ,อาคารพานิชย์ ,โรงงาน ,โกดัง ,สำนักงาน</strong><br />
ร่วมพูดคุย แบ่งปันเรื่องราวไม่ว่าจะเป็นการสร้างตึก การเลือกซื้อตึก อาคารพานิชย์ สำนักงาน โรงงาน เป็นต้น 
<? } ?>
<? if($_GET['bID'] == "4"){ ?>
<font size="4">Land</font></strong><br /><strong>ที่ดินเปล่า ,ที่ดินจัดสรร ,ที่ดิน</strong><br />
ร่วมพูดคุย แบ่งปันเรื่องราวไม่ว่าจะเป็นการเลือกซื้อที่ดิน เป็นต้น
<? } ?>
<? if($_GET['bID'] == "5"){ ?>
<font size="4">Rent</font></strong><br /><strong>อาคารเช่า ,ห้องเช่า ,ตึกเช่า ,ห้องพัก ,ให้เช่า ,ห้องว่างให้เช่า</strong><br />
ร่วมพูดคุย แบ่งปันเรื่องราวไม่ว่าจะเป็นการเช่าห้องพัก ห้องว่างให้เช่า อาคารเช่า ตึกเช่า เป็นต้น 
<? } ?>
<? if($_GET['bID'] == "6"){ ?>
<font size="4">Furniture</font></strong><br /><strong>อุปกร์ตกแต่งบ้าน ,อุปกรณ์สำนักงาน ,แอร์ ,ซ่อมแซม ,เฟอร์นิเจอร์</strong><br />
ร่วมพูดคุย แบ่งปันเรื่องราวไม่ว่าจะเป็นอุปกร์ตกแต่งบ้าน อุปกรณ์สำนักงาน ซ่อมแซม เฟอร์นิเจอร์ เป็นต้น
<? } ?>
<? if($_GET['bID'] == "7"){ ?>
<font size="4">Car</font></strong><br /><strong>รถยนต์ ,รถมือสอง ,รถยนต์มือสอง ,รถใหม่ ,รถบรรทุก</strong><br />
ร่วมพูดคุย แบ่งปันเรื่องราวไม่ว่าจะเป็นรถยนต์ รถยนต์มือสอง รถใหม่ รถบรรทุก เป็นต้น
<? } ?>
<? if($_GET['bID'] == "8"){ ?>
<font size="4">Others</font></strong><br /><strong>รถรับจ้าง ,ทุบตึก ,รื้อถอนบ้าน ,ย้ายสำนักงาน และอื่น ๆ</strong><br />
ร่วมพูดคุย แบ่งปันเรื่องราวไม่ว่าจะเป็นรถรับจ้าง รื้อถอนบ้าน ทุบตึก ย้ายสำนักงาน เป็นต้น 
<? } ?>
</div>
</div>

<div class="rightwebboard">
<strong>กระทู้หมวดนี้ทั้งหมด&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '".$_GET['bID']."'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;กระทู้</strong><br />
กระทู้ล่าสุดโดย:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '".$_GET['bID']."' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
วันที่:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>
<?

$q="SELECT * FROM webboard where wStatus = '1' and wType = '".$_GET['bID']."' ";
$q.=" order by wDate_Create desc";
$qr=mysql_query($q);
$total=mysql_num_rows($qr);
$e_page=20; // กำหนด จำนวนรายการที่แสดงในแต่ละหน้า   
if(!isset($_GET['s_page'])){   
	$_GET['s_page']=0;   
}else{   
	$chk_page=$_GET['s_page'];     
	$_GET['s_page']=$_GET['s_page']*$e_page;   
}   
$q.=" LIMIT ".$_GET['s_page'].",$e_page";
$qr=mysql_query($q);
if(mysql_num_rows($qr)>=1){   
	$plus_p=($chk_page*$e_page)+mysql_num_rows($qr);   
}else{   
	$plus_p=($chk_page*$e_page);       
}   
$total_p=ceil($total/$e_page);   
$before_p=($chk_page*$e_page)+1;


$sqlall = "SELECT * FROM webboard where wStatus = '1' and wType = '".$_GET['bID']."' order by wDate_Create desc limit 0,30";
$resultall = $db->query($sqlall);
while($fetchall = mysql_fetch_array($qr)){

$sqlre = "SELECT * FROM rejob where wID = '".$fetchall['wID']."'";
$resultre = $db->query($sqlre);
$numre= mysql_num_rows($resultre);

$titleb = str_replace(' ','-', $fetchall['wTitle']);
$titleb = str_replace('#','-', $titleb);
$titleb = str_replace('%','-', $titleb);

$sqlm = "SELECT * FROM member where mID = '".$fetchall['mID']."' ";
$resultm = $db->query($sqlm);
$fetchm = mysql_fetch_array($resultm);
?>
<div class="webboardlisttype">
<img src="<?=$page_link?>/images/list-webboard.png" alt="<?=$fetchall['wTitle']?>" title="<?=$fetchall['wTitle']?>" />&nbsp;&nbsp;<b><a href="<?=$page_link?>/board/<?=$titleb?>/<?=$fetchall['wID']?>/<?=$fetchall['wType']?>" title="<?=$fetchall['wTitle']?>" target="_blank"><u><?=$fetchall['wTitle']?></u></a></b>&nbsp;&nbsp;<font size="1"><b>โดย:</b>&nbsp;<?=$fetchm['mUsername']?>&nbsp;&nbsp;<b>วันที่:</b>&nbsp;<?=$fetchall['wDate_Create']?></font><font color="#FF0099">&nbsp;อ่าน:&nbsp;<strong><?=$fetchall['wRead']?></strong>&nbsp;,ตอบ:&nbsp;<strong><?=$numre?></strong></font><br />
</div>
<?
}
?>

<?php if($total>0){ ?>หน้า&nbsp;:&nbsp;
<div class="browse_page">
 <?php   
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
  page_navigatorboard($before_p,$plus_p,$total,$total_p,$chk_page,"&bID=".$_GET['bID']."");    
  ?> 
</div>
<?php } ?>
<br />
</div>

<!--FOOTER-->
<div class="footer"><br /><? include "include-footer.php"; ?></div>

</center>
</body>
</html>
