<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>ประเภทอสังหาริมทรัพย์ ลงประกาศฟรี อสังหาริมทรัพย์  ซื้อ ขาย ให้เช่า บ้านเดี่ยว บ้านจัดสรร ทาวน์เฮ้าส์ คอนโด ที่ดิน อาคาร เฟอร์นิเจอร์ ห้องเช่า รถยนต์</title>
<meta name="Keywords" content="ประเภทอสังหาริมทรัพย์,อสังหาริมทรัพย์,อสังหา,ซื้อ,ขาย,ให้เช่า,บ้าน,บ้านมือสอง,บ้านเดี่ยว,home,condo,building,rent,car,furniture,land" />
<meta name="Description" content="ประเภทอสังหาริมทรัพย์ อสังหาริมทรัพย์ อสังหา ซื้อ ขาย ให้เช่า บ้าน บ้านมือสอง บ้านเดี่ยว บ้านจัดสรร ซื้อบ้านมือสอง home condo building rent car furniture land" />
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
<img src="<?=$page_link?>/images/property_type.jpg" alt="ประเภทอสังหาริมทรัพย์" title="ประเภทอสังหาริมทรัพย์" /><br />

<div class="alink">
<table width="87%" border="0" align="center">
  <tr>
    <td width="23%" align="center"><img src="<?=$page_link?>/images/home.jpg" width="59" height="53" title="บ้าน ทาวน์เฮ้าส์ บ้านจัดสรร บ้านเดี่ยว บ้านมือสอง" alt="บ้าน ทาวน์เฮ้าส์ บ้านจัดสรร บ้านเดี่ยว บ้านมือสอง" /></td>
    <td width="26%" align="center"><img src="<?=$page_link?>/images/condo.jpg" width="60" height="46" title="คอนโด คอนโดมีเนียม อาคารชุด" alt="คอนโด คอนโดมีเนียม อาคารชุด" /></td>
    <td width="26%" align="center"><img src="<?=$page_link?>/images/building.jpg" width="51" height="53" title="ตึก อาคารพานิชย์ โรงงาน โกดัง" alt="ตึก อาคารพานิชย์ โรงงาน โกดัง" /></td>
    <td width="25%" align="center"><img src="<?=$page_link?>/images/land.jpg" width="52" height="58" title="ที่ดินเปล่า ที่ดินจัดสรร ที่ดิน" alt="ที่ดินเปล่า ที่ดินจัดสรร ที่ดิน" /></td>
    </tr>
  <tr>
    <td align="center"><h2><a href="<?=$page_link?>/บ้าน-ทาวน์เฮ้าส์-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง/house" title="บ้าน ทาวน์เฮ้าส์ บ้านจัดสรร บ้านเดี่ยว บ้านมือสอง">House</a></h2></td>
    <td align="center"><h2><a href="<?=$page_link?>/คอนโด-คอนโดมีเนียม-อาคารชุด-แฟลต/condo" title="คอนโด คอนโดมีเนียม อาคารชุด">Condo</a></h2></td>
    <td align="center"><h2><a href="<?=$page_link?>/ตึก-อาคารพานิชย์-ร้านค้า-โรงงาน-โกดัง/building" title="ตึก อาคารพานิชย์ โรงงาน โกดัง">Building</a></h2></td>
    <td align="center"><h2><a href="<?=$page_link?>/ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดินสำหรับการเกษตร/land" title="ที่ดินเปล่า ที่ดินจัดสรร ที่ดิน">Land</a></h2></td>
    </tr>
  <tr>
    <td colspan="4" align="center">-------------------------------------------------------------------------------------------------</td>
    </tr>
  <tr>
    <td align="center"><img src="<?=$page_link?>/images/rent.png" width="59" height="51" title="อาคารเช่า ห้องเช่า บ้านเช่า" alt="อาคารเช่า ห้องเช่า บ้านเช่า" /></td>
    <td align="center"><img src="<?=$page_link?>/images/furniture.jpg" width="54" height="52" title="อุปกร์ตกแต่งบ้าน อุปกรณ์สำนักงาน แอร์ ซ่อมแซม" alt="อุปกร์ตกแต่งบ้าน อุปกรณ์สำนักงาน แอร์ ซ่อมแซม" /></td>
    <td align="center"><img src="<?=$page_link?>/images/car.jpg" width="61" height="52" title="รถยนต์ รถมือสอง รถจักรยานยนต์" alt="รถยนต์ รถมือสอง รถจักรยานยนต์" /></td>
    <td align="center"><img src="<?=$page_link?>/images/others.jpg" width="45" height="46 " title="รถรับจ้าง ทุบตึก รื้อถอนบ้าน" alt="รถรับจ้าง ทุบตึก รื้อถอนบ้าน" /></td>
    </tr>
  <tr>
    <td align="center"><h2><a href="<?=$page_link?>/อาคารเช่า-ห้องเช่า-บ้านเช่า-หอพัก/rent" title="อาคารเช่า ห้องเช่า บ้านเช่า">Rent</a></h2></td>
    <td align="center"><h2><a href="<?=$page_link?>/อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ร้านซ่อม-ซ่อมแซม/furniture" title="อุปกร์ตกแต่งบ้าน อุปกรณ์สำนักงาน แอร์ ซ่อมแซม">Furniture</a></h2></td>
    <td align="center"><h2><a href="<?=$page_link?>/รถยนต์-รถมือสอง-รถจักรยานยนต์/car" title="รถยนต์ รถมือสอง รถจักรยานยนต์">Car</a></h2></td>
    <td align="center"><h2><a href="<?=$page_link?>/รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน-ที่พัก/others" title="รถรับจ้าง ทุบตึก รื้อถอนบ้าน">Others</a></h2></td>
    </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
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
