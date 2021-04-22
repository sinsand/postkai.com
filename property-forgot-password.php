<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>ลืมรหัสผ่าน</title>
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
<img src="<?=$page_link?>/images/member_forgot.jpg" alt="ลืมรหัสผ่าน" title="ลืมรหัสผ่าน" /><br />

<div class="alink">

&nbsp;&nbsp;&nbsp;&nbsp;<font color="#CC0000">**</font>&nbsp;&nbsp;กรุณากรอกชื่อล็อกอินและอีเมลที่ใช้ในการสมัครสมาชิก&nbsp;ระบบจะส่งชื่อล็อกอินและรหัสผ่านไปทางอีเมลที่ใช้ในการสมัคร
</p>
<form name="forgot" method="post" action="<?=$page_link?>/forgot_function.php" onSubmit="return validFormforgot();">
				<table width="100%" border="0" cellspacing="0" cellpadding="5">
				<tr>
                <td width="531" align="right" class="mtext1"><b>ชื่อล็อกอิน : </b></td>
                <td width="680" align="left">
                <input name="username" type="text" id="user" />                </td>
                </tr>
                <tr>
                <td align="right" class="mtext1"><b>อีเมล : </b></td>
                <td align="left">
                <input name="email" type="text" id="email" />                </td>
              </tr>
              <tr>
                <td align="right" class="mtext1">&nbsp;</td>
                <td align="left">
                <input name="flag" type="hidden" id="flag" value="forgot" />
          		<input name="Submit" type="submit"  value="ส่งอีเมล" /></td>
              </tr>
            </table>
        
</form>

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
