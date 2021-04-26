<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;

$selectmember1 = "select * from member where  mID = '".$_SESSION["mID"]."'" ; 
$rmember1 = $db->query($selectmember1);
$Rmember1 = mysql_fetch_array($rmember1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>ตั้งกระทู้ใหม่ เพิ่มกระทู้ใหม่</title>
<meta name="Keywords" content="ตั้งกระทู้ใหม่,เพิ่มกระทู้ใหม่,เพิ่มกรู้อสังหาริมทรัพย์,อสังหาริมทรัพย์,อสังหา,ซื้อ,ขาย,ให้เช่า,บ้าน,บ้านมือสอง,บ้านเดี่ยว,บ้านจัดสรร,ซื้อบ้านมือสอง,ซื้อที่ดิน,ซื้อคอนโดมิเนียม,ขายคอนโดมิเนียม,เช่าคอนโดมิเนียม,ซื้อรถยนต์มือสอง,ขายรถยนต์มือสอง,เช่ารถยนต์,ห้องเช่า" />
<meta name="Description" content="อสังหาริมทรัพย์ อสังหา ซื้อ ขาย ให้เช่า บ้าน บ้านมือสอง บ้านเดี่ยว บ้านจัดสรร ซื้อบ้านมือสอง ซื้อขายบ้าน ลงประกาศฟรี ทาวน์เฮ้าส์ ซื้อทาวน์เฮ้าส์ ขายที่ดิน" />
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
<?
if($_SESSION["mID"] == ""){
?>
&nbsp;<p align="center"><strong><font size="4" color="#CC0000">กรุณาเข้าสู่ระบบ หรือ <a href="<?=$page_link?>/สมัครสมาชิก/register" title="สมัครสมาชิก">สมัครสมาชิก</a></font></strong></p>&nbsp;
<?
}else{
?>
&nbsp;<p style="padding-left:40px;"><strong><font size="4"><u>เพิ่มกระทู้ใหม่</u></font></strong></p>&nbsp;
<table width="100%" border="0" cellpadding="0">
  <form name="formb" id="formb" action="<?=$page_link?>/property-webboard-function.php" method="post" onsubmit="return checkaddboard();" enctype="multipart/form-data">
  <tr>
    <td height="25" align="right">ชื่อ&nbsp; :&nbsp;</td>
    <td><strong><?=$Rmember1['mUsername']?></strong></td>
  </tr>
  <tr>
    <td height="25" align="right">เลือกหัวข้อกระทู้ :&nbsp; </td>
    <td>
    <select name="atype" id="atype" class="box">
	<option value="">- เลือกหัวข้อกระทู้ -</option>
	<option value="1" <? if($_GET['bID'] == "1"){ ?> selected="selected"<? } ?>>House (บ้าน ทาวน์เฮ้าส์ ฯ)</option>
	<option value="2" <? if($_GET['bID'] == "2"){ ?> selected="selected"<? } ?>>Condo (คอนโด แฟลต ฯ)</option>
	<option value="3" <? if($_GET['bID'] == "3"){ ?> selected="selected"<? } ?>>Building (อาคาร ตึก ฯ)</option>
	<option value="4" <? if($_GET['bID'] == "4"){ ?> selected="selected"<? } ?>>Land (ที่ดิน ที่ดินจัดสรร ฯ)</option>
	<option value="5" <? if($_GET['bID'] == "5"){ ?> selected="selected"<? } ?>>Rent (บ้านเช่า ห้องเช่า ฯ)</option>
	<option value="6" <? if($_GET['bID'] == "6"){ ?> selected="selected"<? } ?>>Funiture (อุปกรณ์แต่งบ้าน ฯ)</option>
	<option value="7" <? if($_GET['bID'] == "7"){ ?> selected="selected"<? } ?>>Car (รถยนต์ รถมือสอง ฯ)</option>
	<option value="8" <? if($_GET['bID'] == "8"){ ?> selected="selected"<? } ?>>Others (อื่น ๆ)</option>
  </select>
    </td>
  </tr>
  <tr>
    <td width="27%" height="25" align="right">หัวข้อประกาศ :&nbsp; </td>
    <td width="73%"><input name="atitle" type="text" id="atitle"  onkeyup="javascript:this.value=this.value.toUpperCase();" size="40" class="box" />
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td height="173" align="right">รายละเอียด :&nbsp; </td>
    <td><textarea name="adetail" cols="70" rows="12" id="adetail" onkeyup="javascript:this.value=this.value.toUpperCase();" class="box"></textarea>
<font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td height="24" align="right">รูปภาพ :&nbsp; </td>
    <td><input name="file1" type="file" class="box" id="file1" size="20" />
      <font color="#CC0000">*</font> <font color="#009900">ขนาดไม่เกิน 2 MB หรือ 500 px. </font></td>
  </tr>
  <tr>
    <td align="right">อีเมล์ :&nbsp; </td>
    <td>
      <input name="aemail" type="text" id="aemail" size="40" class="box" />
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">เปลี่ยนรูปภาพ&nbsp;:&nbsp;</td>
    <td><img src="<?=$page_link?>/verify-images.php" alt="รหัสรูปภาพ" title="รหัสรูปภาพ" /></td>
  </tr>
  <tr>
    <td align="right">รหัสรูปภาพ :&nbsp; </td>
    <td><input name="capts" id="capts" type="text" size="10" onkeyup="javascript:this.value=this.value.toUpperCase();" class="box" />
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
	<input name="flag" id="flag" type="hidden" value="addboard" />
	<input name="mID" id="mID" type="hidden" value="<?=$_SESSION['mID']?>" />
	<input name="Submit" type="submit" value="เพิ่มกระทู้" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
<?
}
?>
<p align="center"><font color="#CCCCCC">---------------------------------------------------------------------------------------------------------------</font></p>

</div>

<!--FOOTER-->
<div class="footer"><br /><? include "include-footer.php"; ?></div>

</center>
</body>
</html>
