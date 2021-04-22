<?php session_start();
include 'lib/connect.php' ; 
//include 'config/isLogon.php' ; 
$db = new mydb ;

$select = "select  *  from member  where mID='".$_SESSION['mID']."'";
$result= $db->query($select) ; 
$row = mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>ลงประกาศ ลงประกาศฟรี อสังหาริมทรัพย์</title>
<meta name="Keywords" content="ลงประกาศฟรี,อสังหาริมทรัพย์,อสังหา,ซื้อ,ขาย,ให้เช่า,บ้าน,บ้านมือสอง,บ้านเดี่ยว,บ้านจัดสรร,ซื้อบ้านมือสอง,ซื้อขายบ้าน,ทาวน์เฮ้าส์,ขายที่ดิน,ซื้อที่ดิน,ซื้อรถยนต์มือสอง,ขายรถยนต์มือสอง,เช่ารถยนต์,ห้องเช่า" />
<meta name="Description" content="ลงประกาศฟรี อสังหาริมทรัพย์ อสังหา ซื้อ ขาย ให้เช่า บ้าน บ้านมือสอง บ้านเดี่ยว บ้านจัดสรร ซื้อบ้านมือสอง ซื้อขายบ้าน ทาวน์เฮ้าส์ ซื้อทาวน์เฮ้าส์ ขายที่ดิน ซื้อที่ดิน ห้องเช่า" />
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
<img src="<?=$page_link?>/images/property_register.jpg" alt="ลงประกาศฟรี อสังหาริมทรัพย์" title="ลงประกาศฟรี อสังหาริมทรัพย์" /><br />

<div class="alink">
<?
if($_SESSION['mID'] != "")
{
?>
<p class="txtbold">ลงประกาศฟรีอสังหาริมทรัพย์</p>
<strong> ลงประกาศฟรี ,อสังหาริมทรัพย์ ,ซื้อ ,ขาย ,ให้เช่า ,บ้าน, คอนโด ,ที่ดิน ,อาคาร ,เฟอร์นิเจอร์ ,บ้านเช่า ,เฟอร์นิเจอร์ ,รถยนต์ , อื่น ๆ </strong><br /><br />
<form name="formadd" id="formadd" action="<?=$page_link?>/property-function.php" method="post" onsubmit="return checkaddjob();" enctype="multipart/form-data">
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><font color="#CC0000">**</font></strong>&nbsp;กรุณากรอกข้อมูลให้ครบทุกช่องเพื่อผลประโยชน์จากการประกาศและสถานที่การติดต่อของท่าน</td>
    </tr>
  <tr>
    <td width="27%">&nbsp;</td>
    <td width="73%">&nbsp;</td>
  </tr>
  
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="27" align="right">ประเภทอสังหา :&nbsp; </td>
    <td>
	<select name="aatype" id="aatype" class="box">
	<option value="">- กรุณาเลือกประเภท -</option>
	<option value="1">ซื้อ</option>
	<option value="2">ขาย</option>
	<option value="3">ให้เช่า</option>
  </select>	</td>
  </tr>
  <tr>
    <td align="right"></td>
    <td>
	<select name="atype" id="atype" class="box">
	<option value="">- กรุณาเลือกประเภท -</option>
	<option value="1">House (บ้าน ทาวน์เฮ้าส์ ฯ)</option>
	<option value="2">Condo (คอนโด แฟลต ฯ)</option>
	<option value="3">Building (อาคาร ตึก ฯ)</option>
	<option value="4" >Land (ที่ดิน ที่ดินจัดสรร ฯ)</option>
	<option value="5">Rent (บ้านเช่า ห้องเช่า ฯ)</option>
	<option value="6">Funiture (อุปกรณ์แต่งบ้าน ฯ)</option>
	<option value="7">Car (รถยนต์ รถมือสอง ฯ)</option>
	<option value="8" >Others (อื่น ๆ)</option>
  </select>
	<font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td height="27" align="right">จังหวัด : </td>
    <td><select name="aprovince" id="aprovince" tabindex="26" style="width: 175px" class="box">
	<option selected="selected" value=""> - กรุณาเลือกจังหวัด - </option>
	<option value="กระบี่">กระบี่</option>
	<option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
	<option value="กาญจนบุรี">กาญจนบุรี</option>
	<option value="กาฬสินธุ์">กาฬสินธุ์</option>
	<option value="กำแพงเพชร">กำแพงเพชร</option>
	<option value="ขอนแก่น">ขอนแก่น</option>
	<option value="จันทบุรี">จันทบุรี</option>
	<option value="ฉะเชิงเทรา">ฉะเชิงเทรา</option>
	<option value="ชลบุรี">ชลบุรี</option>
	<option value="ชัยนาท">ชัยนาท</option>
	<option value="ชัยภูมิ">ชัยภูมิ</option>
	<option value="ชุมพร">ชุมพร</option>
	<option value="เชียงราย">เชียงราย</option>
	<option value="เชียงใหม่">เชียงใหม่</option>
	<option value="ตรัง">ตรัง</option>
	<option value="ตราด">ตราด</option>
	<option value="ตาก">ตาก</option>
	<option value="นครนายก">นครนายก</option>
	<option value="นครปฐม">นครปฐม</option>
	<option value="นครพนม">นครพนม</option>
	<option value="นครราชสีมา">นครราชสีมา</option>
	<option value="นครศรีธรรมราช">นครศรีธรรมราช</option>
	<option value="นครสวรรค์">นครสวรรค์</option>
	<option value="นนทบุรี">นนทบุรี</option>
	<option value="นราธิวาส">นราธิวาส</option>
	<option value="น่าน">น่าน</option>
	<option value="บุรีรัมย์">บุรีรัมย์</option>
	<option value="ปทุมธานี">ปทุมธานี</option>
	<option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์</option>
	<option value="ปราจีนบุรี">ปราจีนบุรี</option>
	<option value="ปัตตานี">ปัตตานี</option>
	<option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา</option>
	<option value="พะเยา">พะเยา</option>
	<option value="พังงา">พังงา</option>
	<option value="พัทลุง">พัทลุง</option>
	<option value="พิจิตร">พิจิตร</option>
	<option value="พิษณุโลก">พิษณุโลก</option>
	<option value="เพชรบุรี">เพชรบุรี</option>
	<option value="เพชรบูรณ์">เพชรบูรณ์</option>
	<option value="แพร่">แพร่</option>
	<option value="ภูเก็ต">ภูเก็ต</option>
	<option value="มหาสารคาม">มหาสารคาม</option>
	<option value="มุกดาหาร">มุกดาหาร</option>
	<option value="แม่ฮ่องสอน">แม่ฮ่องสอน</option>
	<option value="ยโสธร">ยโสธร</option>
	<option value="ยะลา">ยะลา</option>
	<option value="ร้อยเอ็ด">ร้อยเอ็ด</option>
	<option value="ระนอง">ระนอง</option>
	<option value="ระยอง">ระยอง</option>
	<option value="ราชบุรี">ราชบุรี</option>
	<option value="ลพบุรี">ลพบุรี</option>
	<option value="ลำปาง">ลำปาง</option>
	<option value="ลำพูน">ลำพูน</option>
	<option value="เลย">เลย</option>
	<option value="ศรีสะเกษ">ศรีสะเกษ</option>
	<option value="สกลนคร">สกลนคร</option>
	<option value="สงขลา">สงขลา</option>
	<option value="สตูล">สตูล</option>
	<option value="สมุทรปราการ">สมุทรปราการ</option>
	<option value="สมุทรสงคราม">สมุทรสงคราม</option>
	<option value="สมุทรสาคร">สมุทรสาคร</option>
	<option value="สระแก้ว">สระแก้ว</option>
	<option value="สระบุรี">สระบุรี</option>
	<option value="สิงห์บุรี">สิงห์บุรี</option>
	<option value="สุโขทัย">สุโขทัย</option>
	<option value="สุพรรณบุรี">สุพรรณบุรี</option>
	<option value="สุราษฏร์ธานี">สุราษฏร์ธานี</option>
	<option value="สุรินทร์">สุรินทร์</option>
	<option value="หนองคาย">หนองคาย</option>
	<option value="หนองบัวลำภู">หนองบัวลำภู</option>
	<option value="อุบลราชธานี">อุบลราชธานี</option>
	<option value="อ่างทอง">อ่างทอง</option>
	<option value="อำนาจเจริญ">อำนาจเจริญ</option>
	<option value="อุดรธานี">อุดรธานี</option>
	<option value="อุตรดิตถ์">อุตรดิตถ์</option>
	<option value="อุทัยธานี">อุทัยธานี</option>
</select>	</td>
  </tr>
  <tr>
    <td height="25" align="right">หัวข้อประกาศ :&nbsp; </td>
    <td><input name="atitle" type="text" id="atitle"  onkeyup="javascript:this.value=this.value.toUpperCase();" size="40" class="box" />
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td height="18" align="right">ราคา :&nbsp; </td>
    <td>
	<input name="aprice"  id="aprice" type="text" size="20" maxlength="30" class="box" />
      &nbsp;บาท&nbsp; <font color="#CC0000">*</font> <font color="#009900">ไม่ต้องใส่เครื่องหมาย , กำกับ</font></td>
  </tr>
  <tr>
    <td height="173" align="right">รายละเอียด :&nbsp; </td>
    <td><textarea name="adetail" cols="70" rows="12" id="adetail" onkeyup="javascript:this.value=this.value.toUpperCase();" class="box"></textarea>
<font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td height="24" align="right">รูปภาพ 1 :&nbsp; </td>
    <td><input name="file1" type="file" class="box" id="file1" size="20" />
      <font color="#CC0000">*</font> <font color="#009900">ขนาดไม่เกิน 2 MB หรือ 500 px. </font></td>
  </tr>
  <tr>
    <td height="24" align="right">รูปภาพ 2 :&nbsp; </td>
    <td><input name="file2" type="file" class="box" id="file2" size="20" />
	<font color="#CC0000">*</font> <font color="#009900">ขนาดไม่เกิน 2 MB หรือ 500 px.</font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>
      <input type="checkbox" name="Show" id="showdata" onClick="return clickpersonal();" />
      ใช้ที่อยู่การสมัครสมาชิก    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="26" align="right">คำนำหน้า :&nbsp; </td>
    <td>
	<select name="ctitle" id="ctitle" onChange="if(document.getElementById('ctitle').value==1){document.getElementById('ctitletxt').innerHTML='<input name=ctitles id=ctitles type=text size=10 onkeyup=javascript:this.value=this.value.toUpperCase(); class=box>';}else{document.getElementById('ctitletxt').innerHTML='';}" class="box">
	<option value="นาย">นาย</option>
	<option value="นาง">นาง</option>
	<option value="นางสาว">นางสาว</option>
	<option value="1" >อื่น ๆ</option>
  </select>	&nbsp;&nbsp;<label id='ctitletxt'></label></td>
  </tr>
  <tr>
    <td align="right">ชื่อ - นามสกุล :&nbsp; </td>
    <td><input name="cname" type="text" id="cname"  onkeyup="javascript:this.value=this.value.toUpperCase();" size="40" class="box" />
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td align="right">ที่อยู่ :&nbsp; </td>
    <td><textarea name="caddress" cols="65" rows="6" id="caddress" onkeyup="javascript:this.value=this.value.toUpperCase();" class="box"></textarea>
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td align="right">เบอร์โทรศัพท์ :&nbsp; </td>
    <td>
      <input name="ctelephone" type="text" id="ctelephone" onkeyup="javascript:this.value=this.value.toUpperCase();" size="40" class="box" />
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">อีเมล์ :&nbsp; </td>
    <td>
      <input name="cemail" type="text" id="cemail" size="40" class="box" />
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">เปลี่ยนรูปภาพ&nbsp;:&nbsp;</td>
    <td><img src="<?=$page_link?>/verify-images.php" alt="รหัสรูปภาพ" title="รหัสรูปภาพ" /></td>
  </tr>
  <tr>
    <td align="right">รหัสรูปภาพ:&nbsp; </td>
    <td><input name="capts" id="capts" type="text" size="25" onkeyup="javascript:this.value=this.value.toUpperCase();" class="box" />
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
	<input name="flag" id="flag" type="hidden" value="addjob" />
	<input name="ctitle1" id="ctitle1" type="hidden" value="<? echo $row['mTitle']; ?>" />
	<input name="cnames" id="cnames" type="hidden" value="<? echo $row['mName']." ".$row['mLname']; ?>" />
	<input name="caddresss" id="caddresss" type="hidden" value="<? echo $row['mAddress']."  ".$row['mPostalcode']; ?>" />
	<input name="ctelephones" id="ctelephones" type="hidden" value="<? echo $row['mTelephone']; ?>" />
	<input name="cemails" id="cemails" type="hidden" value="<? echo $row['mEmail']; ?>" />
	<input name="Submit" type="submit" value="  ลงประกาศ  " /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

<?
}
else
{
?>
<p class="txtbold">ลงประกาศฟรีอสังหาริมทรัพย์</p>
<strong> ลงประกาศฟรี ,อสังหาริมทรัพย์ ,ซื้อ ,ขาย ,ให้เช่า ,บ้าน, คอนโด ,ที่ดิน ,อาคาร ,เฟอร์นิเจอร์ ,บ้านเช่า ,เฟอร์นิเจอร์ ,รถยนต์ , อื่น ๆ </strong><br /><br /><br />
<p align="center"><strong><font color="#CC0000" size="4">ท่านยังไม่ได้เข้าสู่ระบบ&nbsp;กรุณาเข้าสู่ระบบ!</font></strong></p>
<?
}
?>

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
