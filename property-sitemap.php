<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>แผนผังเว็บไซต์</title>
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
<img src="<?=$page_link?>/images/property_sitemap.jpg" alt="แผนผังเว็บไซต์" title="แผนผังเว็บไซต์" /><br />

<div class="alink">
<table width="90%" border="0" align="center" class="typepage">
  <tr>
    <td valign="top"><h4>
&raquo;&nbsp;<a href="index.php">หน้าแรก</a><br />
&raquo;&nbsp;<a href="<?=$page_link?>/ลงประกาศฟรี-อสังหาริมทรัพย์/ลงประกาศฟรี" title="ลงประกาศฟรีอสังหาริมทรัพย์">ลงประกาศฟรีอสังหาริมทรัพย์</a><br />
&raquo;&nbsp;<a href="<?=$page_link?>/อสังหาริมทรัพย์ทั้งหมด/property-all" title="อสังหาริมทรัพย์ทั้งหมด">อสังหาริมทรัพย์ทั้งหมด</a><br />
&raquo;&nbsp;<a href="<?=$page_link?>/ค้นหา-อสังหาริมทรัพย์/search" title="ค้นหาอสังหาริมทรัพย์">ค้นหาอสังหาริมทรัพย์</a><br />
&raquo;&nbsp;<a href="<?=$page_link?>/อสังหาริมทรัพย์-type/type" title="ประเภทอสังหาริมทรัพย์">ประเภทอสังหาริมทรัพย์</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/บ้าน-ทาวน์เฮ้าส์-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง/house" title="บ้าน-ทาวน์เฮ้าส์-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง">House</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/คอนโด-คอนโดมีเนียม-อาคารชุด-แฟลต/condo" title="คอนโด-คอนโดมีเนียม-อาคารชุด-แฟลต">Condo</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/ตึก-อาคารพานิชย์-ร้านค้า-โรงงาน-โกดัง/building" title="ตึก-อาคารพานิชย์-ร้านค้า-โรงงาน-โกดัง">Building</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดินสำหรับการเกษตร/land" title="ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดินสำหรับการเกษตร">Land</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/อาคารเช่า-ห้องเช่า-บ้านเช่า-หอพัก/rent" title="อาคารเช่า-ห้องเช่า-บ้านเช่า-หอพัก">Rent</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ร้านซ่อม-ซ่อมแซม/furniture" title="อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ร้านซ่อม-ซ่อมแซม">Furniture</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/รถยนต์-รถมือสอง-รถจักรยานยนต์/car" title="รถยนต์-รถมือสอง-รถจักรยานยนต์">Car</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน-ที่พัก/others" title="รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน-ที่พัก">Others</a><br />
</h4>
</td>

    <td valign="top">
<h4>
&raquo;&nbsp;<a href="<?=$page_link?>/ข่าวสาร/news" title="ข่าวอสังหาริมทรัพย์">ข่า่วสาร</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/ข่าวสาร/news" title="ข่าวอสังหาริมทรัพย์">ข่าวอสังหาริมทรัพย์</a><br /> 
&raquo;&nbsp;<a href="<?=$page_link?>/สมัครสมาชิก/register" title="สมาชิก">สมาชิก</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/สมัครสมาชิก/register" title="สมัครสมาชิก">สมัครสมาชิก</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/ลืมรหัสผ่าน/forgot-password" title="ลืมรหัสผ่าน">ลืมรหัสผ่าน</a><br />
</h4>
</td>

    <td valign="top">
<h4>
&raquo;&nbsp;<a href="<?=$page_link?>/ติดต่อลงโฆษณา/advertisting" title="ติดต่อลงโฆษณา">ติดต่อลงโฆษณา</a><br />
&raquo;&nbsp;<a href="<?=$page_link?>/ติดต่อชำระเงิน/payment" title="ติดต่อชำระเงิน">ติดต่อชำระเงิน</a><br />
&raquo;&nbsp;<a href="<?=$page_link?>/ติดต่อเรา/contactus" title="ติดต่อเรา">ติดต่อเรา</a><br />
&raquo;&nbsp;<a href="<?=$page_link?>/แลกลิ้งค์เพื่อนบ้าน/link-network" title="เพื่อนบ้าน">เพื่อนบ้าน</a><br />
&raquo;&nbsp;<a href="<?=$page_link?>/แผนผังเว็บ/sitemap" title="แผนผังเว็บไซต์">แผนผังเว็บไซต์</a><br />
</h4>
</td>
  </tr>
</table>

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
