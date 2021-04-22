<?php session_start();
include 'lib/connect.php' ; 
//include 'config/isLogon.php' ; 
$db = new mydb ;

$selectm = "select  *  from member  where mID='".$_SESSION['mID']."'";
$resultm= $db->query($selectm) ; 
$rowm = mysql_fetch_array($resultm);

$sql = "SELECT * FROM sb_job where mID = '".$_SESSION['mID']."' and jID='".$_GET['jID']."'";
$result = $db->query($sql);
$row = mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>แก้ไขอสังหาริมทรัพย์ ลงประกาศฟรี อสังหาริมทรัพย์</title>
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
<body onload="document.getElementById('word-search').focus();<?php if($row['jc_Title'] != 'นาย' && $row['jc_Title'] != 'นาง' && $row['jc_Title'] != 'นางสาว') { ?>document.formadd.title.value=1;<?php } ?>if(document.formadd.title.value==1){document.getElementById('ctitletxt').innerHTML='<input name=title type=text size=10 value=<?php echo $row['jc_Title'] ; ?>  onkeyup=javascript:this.value=this.value.toUpperCase(); id=titles>';}else{document.getElementById('ctitletxt').innerHTML='';}">
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
<p class="txtbold">แก้ไขข้อมูลอสังหาริมทรัพย์</p>
<strong>ลงประกาศฟรี&nbsp;,อสังหาริมทรัพย์&nbsp;,ซื้อ&nbsp;,ขาย&nbsp;,ให้เช่า&nbsp;,บ้านเดี่ยว&nbsp;,บ้านจัดสรร&nbsp;,บ้านมือสอง&nbsp;,ทาวน์เฮ้าส์&nbsp;,คอนโด&nbsp;,ที่ดิน&nbsp;,อาคาร&nbsp;,เฟอร์นิเจอร์&nbsp;,บ้านเช่า&nbsp;,ห้องเช่า&nbsp;,รถยนต์&nbsp;,รถยนต์มือสอง</strong><br /><br />
<?


	$titleall = str_replace(' ','-', $row['jTitle']);
	
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

<form name="formadd" id="formadd" action="<?=$page_link?>/property-function.php" method="post" onsubmit="return checkaddjob();" enctype="multipart/form-data">
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><font color="#CC0000">**</font></strong>&nbsp;กรุณากรอกข้อมูลให้ครบทุกช่องเพื่อผลประโยชน์จากการประกาศและสถานที่การติดต่อของท่าน</td>
    </tr>
  <tr>
    <td width="30%">&nbsp;</td>
    <td width="70%">&nbsp;</td>
  </tr>
  
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="27" align="right">ประเภทอสังหา์ :&nbsp; </td>
    <td>
	<select name="aatype" id="aatype" class="box">
	<option value="">- กรุณาเลือกประเภท -</option>
	<option value="1" <? if($row['jaType'] == "1"){ ?> selected="selected"<? } ?>>ซื้อ</option>
	<option value="2" <? if($row['jaType'] == "2"){ ?> selected="selected"<? } ?>>ขาย</option>
	<option value="3" <? if($row['jaType'] == "3"){ ?> selected="selected"<? } ?>>ให้เช่า</option>
  </select>	</td>
  </tr>
  <tr>
    <td align="right"></td>
    <td>
	<select name="atype" id="atype" class="box">
	<option value="">- กรุณาเลือกประเภท -</option>
	<option value="1" <? if($row['jType'] == "1"){ ?> selected="selected"<? } ?>>House (บ้าน ทาวน์เฮ้าส์ ฯ)</option>
	<option value="2" <? if($row['jType'] == "2"){ ?> selected="selected"<? } ?>>Condo (คอนโด แฟลต ฯ)</option>
	<option value="3" <? if($row['jType'] == "3"){ ?> selected="selected"<? } ?>>Building (อาคาร ตึก ฯ)</option>
	<option value="4"  <? if($row['jType'] == "4"){ ?> selected="selected"<? } ?>>Land (ที่ดิน ที่ดินจัดสรร ฯ)</option>
	<option value="5" <? if($row['jType'] == "5"){ ?> selected="selected"<? } ?>>Rent (บ้านเช่า ห้องเช่า ฯ)</option>
	<option value="6" <? if($row['jType'] == "6"){ ?> selected="selected"<? } ?>>Funiture (อุปกรณ์แต่งบ้าน ฯ)</option>
	<option value="7" <? if($row['jType'] == "7"){ ?> selected="selected"<? } ?>>Car (รถยนต์ รถมือสอง ฯ)</option>
	<option value="8"  <? if($row['jType'] == "8"){ ?> selected="selected"<? } ?>>Others (อื่น ๆ)</option>
  </select>
	<font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td height="27" align="right">จังหวัด : </td>
    <td><select name="aprovince" id="aprovince" tabindex="26" style="width: 175px" class="box">
	<option selected="selected" value=""> - กรุณาเลือกจังหวัด - </option>
	<option value="กระบี่"<? if($row['jProvince'] == "กระบี่"){ ?>  selected="selected"<? } ?>>กระบี่</option>
	<option value="กรุงเทพมหานคร"<? if($row['jProvince'] == "กรุงเทพมหานคร"){ ?>  selected="selected"<? } ?>>กรุงเทพมหานคร</option>
	<option value="กาญจนบุรี"<? if($row['jProvince'] == "กาญจนบุรี"){ ?>  selected="selected"<? } ?>>กาญจนบุรี</option>
	<option value="กาฬสินธุ์"<? if($row['jProvince'] == "กาฬสินธุ์"){ ?>  selected="selected"<? } ?>>กาฬสินธุ์</option>
	<option value="กำแพงเพชร"<? if($row['jProvince'] == "กำแพงเพชร"){ ?> selected="selected"<? } ?>>กำแพงเพชร</option>
	<option value="ขอนแก่น"<? if($row['jProvince'] == "ขอนแก่น"){ ?> selected="selected"<? } ?>>ขอนแก่น</option>
	<option value="จันทบุรี"<? if($row['jProvince'] == "จันทบุรี"){ ?> selected="selected"<? } ?>>จันทบุรี</option>
	<option value="ฉะเชิงเทรา"<? if($row['jProvince'] == "ฉะเชิงเทรา"){ ?> selected="selected"<? } ?>>ฉะเชิงเทรา</option>
	<option value="ชลบุรี"<? if($row['jProvince'] == "ชลบุรี"){ ?> selected="selected"<? } ?>>ชลบุรี</option>
	<option value="ชัยนาท"<? if($row['jProvince'] == "ชัยนาท"){ ?> selected="selected"<? } ?>>ชัยนาท</option>
	<option value="ชัยภูมิ"<? if($row['jProvince'] == "ชัยภูมิ"){ ?> selected="selected"<? } ?>>ชัยภูมิ</option>
	<option value="ชุมพร"<? if($row['jProvince'] == "ชุมพร"){ ?> selected="selected"<? } ?>>ชุมพร</option>
	<option value="เชียงราย"<? if($row['jProvince'] == "เชียงราย"){ ?> selected="selected"<? } ?>>เชียงราย</option>
	<option value="เชียงใหม่"<? if($row['jProvince'] == "เชียงใหม่"){ ?> selected="selected"<? } ?>>เชียงใหม่</option>
	<option value="ตรัง"<? if($row['jProvince'] == "ตรัง"){ ?> selected="selected"<? } ?>>ตรัง</option>
	<option value="ตราด"<? if($row['jProvince'] == "ตราด"){ ?> selected="selected"<? } ?>>ตราด</option>
	<option value="ตาก"<? if($row['jProvince'] == "ตาก"){ ?> selected="selected"<? } ?>>ตาก</option>
	<option value="นครนายก"<? if($row['jProvince'] == "นครนายก"){ ?> selected="selected"<? } ?>>นครนายก</option>
	<option value="นครปฐม"<? if($row['jProvince'] == "นครปฐม"){ ?> selected="selected"<? } ?>>นครปฐม</option>
	<option value="นครพนม"<? if($row['jProvince'] == "นครพนม"){ ?> selected="selected"<? } ?>>นครพนม</option>
	<option value="นครราชสีมา"<? if($row['jProvince'] == "นครราชสีมา"){ ?> selected="selected"<? } ?>>นครราชสีมา</option>
	<option value="นครศรีธรรมราช"<? if($row['jProvince'] == "นครศรีธรรมราช"){ ?> selected="selected"<? } ?>>นครศรีธรรมราช</option>
	<option value="นครสวรรค์"<? if($row['jProvince'] == "นครสวรรค์"){ ?> selected="selected"<? } ?>>นครสวรรค์</option>
	<option value="นนทบุรี"<? if($row['jProvince'] == "นนทบุรี"){ ?> selected="selected"<? } ?>>นนทบุรี</option>
	<option value="นราธิวาส"<? if($row['jProvince'] == "นราธิวาส"){ ?> selected="selected"<? } ?>>นราธิวาส</option>
	<option value="น่าน"<? if($row['jProvince'] == "น่าน"){ ?> selected="selected"<? } ?>>น่าน</option>
	<option value="บุรีรัมย์"<? if($row['jProvince'] == "บุรีรัมย์"){ ?> selected="selected"<? } ?>>บุรีรัมย์</option>
	<option value="ปทุมธานี"<? if($row['jProvince'] == "ปทุมธานี"){ ?> selected="selected"<? } ?>>ปทุมธานี</option>
	<option value="ประจวบคีรีขันธ์"<? if($row['jProvince'] == "ประจวบคีรีขันธ์"){ ?> selected="selected"<? } ?>>ประจวบคีรีขันธ์</option>
	<option value="ปราจีนบุรี"<? if($row['jProvince'] == "ปราจีนบุรี"){ ?> selected="selected"<? } ?>>ปราจีนบุรี</option>
	<option value="ปัตตานี"<? if($row['jProvince'] == "ปัตตานี"){ ?> selected="selected"<? } ?>>ปัตตานี</option>
	<option value="พระนครศรีอยุธยา"<? if($row['jProvince'] == "พระนครศรีอยุธยา"){ ?> selected="selected"<? } ?>>พระนครศรีอยุธยา</option>
	<option value="พะเยา"<? if($row['jProvince'] == "พะเยา"){ ?> selected="selected"<? } ?>>พะเยา</option>
	<option value="พังงา"<? if($row['jProvince'] == "พังงา"){ ?> selected="selected"<? } ?>>พังงา</option>
	<option value="พัทลุง"<? if($row['jProvince'] == "พัทลุง"){ ?> selected="selected"<? } ?>>พัทลุง</option>
	<option value="พิจิตร"<? if($row['jProvince'] == "พิจิตร"){ ?> selected="selected"<? } ?>>พิจิตร</option>
	<option value="พิษณุโลก"<? if($row['jProvince'] == "พิษณุโลก"){ ?> selected="selected"<? } ?>>พิษณุโลก</option>
	<option value="เพชรบุรี"<? if($row['jProvince'] == "เพชรบุรี"){ ?> selected="selected"<? } ?>>เพชรบุรี</option>
	<option value="เพชรบูรณ์"<? if($row['jProvince'] == "เพชรบูรณ์"){ ?> selected="selected"<? } ?>>เพชรบูรณ์</option>
	<option value="แพร่"<? if($row['jProvince'] == "แพร่"){ ?> selected="selected"<? } ?>>แพร่</option>
	<option value="ภูเก็ต"<? if($row['jProvince'] == "ภูเก็ต"){ ?> selected="selected"<? } ?>>ภูเก็ต</option>
	<option value="มหาสารคาม"<? if($row['jProvince'] == "มหาสารคาม"){ ?> selected="selected"<? } ?>>มหาสารคาม</option>
	<option value="มุกดาหาร"<? if($row['jProvince'] == "มุกดาหาร"){ ?> selected="selected"<? } ?>>มุกดาหาร</option>
	<option value="แม่ฮ่องสอน"<? if($row['jProvince'] == "แม่ฮ่องสอน"){ ?> selected="selected"<? } ?>>แม่ฮ่องสอน</option>
	<option value="ยโสธร"<? if($row['jProvince'] == "ยโสธร"){ ?> selected="selected"<? } ?>>ยโสธร</option>
	<option value="ยะลา"<? if($row['jProvince'] == "ยะลา"){ ?> selected="selected"<? } ?>>ยะลา</option>
	<option value="ร้อยเอ็ด"<? if($row['jProvince'] == "ร้อยเอ็ด"){ ?> selected="selected"<? } ?>>ร้อยเอ็ด</option>
	<option value="ระนอง"<? if($row['jProvince'] == "ระนอง"){ ?> selected="selected"<? } ?>>ระนอง</option>
	<option value="ระยอง"<? if($row['jProvince'] == "ระยอง"){ ?> selected="selected"<? } ?>>ระยอง</option>
	<option value="ราชบุรี"<? if($row['jProvince'] == "ราชบุรี"){ ?> selected="selected"<? } ?>>ราชบุรี</option>
	<option value="ลพบุรี"<? if($row['jProvince'] == "ลพบุรี"){ ?> selected="selected"<? } ?>>ลพบุรี</option>
	<option value="ลำปาง"<? if($row['jProvince'] == "ลำปาง"){ ?> selected="selected"<? } ?>>ลำปาง</option>
	<option value="ลำพูน"<? if($row['jProvince'] == "ลำพูน"){ ?> selected="selected"<? } ?>>ลำพูน</option>
	<option value="เลย"<? if($row['jProvince'] == "เลย"){ ?> selected="selected"<? } ?>>เลย</option>
	<option value="ศรีสะเกษ"<? if($row['jProvince'] == "ศรีสะเกษ"){ ?> selected="selected"<? } ?>>ศรีสะเกษ</option>
	<option value="สกลนคร"<? if($row['jProvince'] == "สกลนคร"){ ?> selected="selected"<? } ?>>สกลนคร</option>
	<option value="สงขลา"<? if($row['jProvince'] == "สงขลา"){ ?> selected="selected"<? } ?>>สงขลา</option>
	<option value="สตูล"<? if($row['jProvince'] == "สตูล"){ ?> selected="selected"<? } ?>>สตูล</option>
	<option value="สมุทรปราการ"<? if($row['jProvince'] == "สมุทรปราการ"){ ?> selected="selected"<? } ?>>สมุทรปราการ</option>
	<option value="สมุทรสงคราม"<? if($row['jProvince'] == "สมุทรสงคราม"){ ?> selected="selected"<? } ?>>สมุทรสงคราม</option>
	<option value="สมุทรสาคร"<? if($row['jProvince'] == "สมุทรสาคร"){ ?> selected="selected"<? } ?>>สมุทรสาคร</option>
	<option value="สระแก้ว"<? if($row['jProvince'] == "สระแก้ว"){ ?> selected="selected"<? } ?>>สระแก้ว</option>
	<option value="สระบุรี"<? if($row['jProvince'] == "สระบุรี"){ ?> selected="selected"<? } ?>>สระบุรี</option>
	<option value="สิงห์บุรี"<? if($row['jProvince'] == "สิงห์บุรี"){ ?> selected="selected"<? } ?>>สิงห์บุรี</option>
	<option value="สุโขทัย"<? if($row['jProvince'] == "สุโขทัย"){ ?> selected="selected"<? } ?>>สุโขทัย</option>
	<option value="สุพรรณบุรี"<? if($row['jProvince'] == "สุพรรณบุรี"){ ?> selected="selected"<? } ?>>สุพรรณบุรี</option>
	<option value="สุราษฏร์ธานี"<? if($row['jProvince'] == "สุราษฏร์ธานี"){ ?> selected="selected"<? } ?>>สุราษฏร์ธานี</option>
	<option value="สุรินทร์"<? if($row['jProvince'] == "สุรินทร์"){ ?> selected="selected"<? } ?>>สุรินทร์</option>
	<option value="หนองคาย"<? if($row['jProvince'] == "หนองคาย"){ ?> selected="selected"<? } ?>>หนองคาย</option>
	<option value="หนองบัวลำภู"<? if($row['jProvince'] == "หนองบัวลำภู"){ ?> selected="selected"<? } ?>>หนองบัวลำภู</option>
	<option value="อุบลราชธานี"<? if($row['jProvince'] == "อุบลราชธานี"){ ?> selected="selected"<? } ?>>อุบลราชธานี</option>
	<option value="อ่างทอง"<? if($row['jProvince'] == "อ่างทอง"){ ?> selected="selected"<? } ?>>อ่างทอง</option>
	<option value="อำนาจเจริญ"<? if($row['jProvince'] == "อำนาจเจริญ"){ ?> selected="selected"<? } ?>>อำนาจเจริญ</option>
	<option value="อุดรธานี"<? if($row['jProvince'] == "อุดรธานี"){ ?> selected="selected"<? } ?>>อุดรธานี</option>
	<option value="อุตรดิตถ์"<? if($row['jProvince'] == "อุตรดิตถ์"){ ?> selected="selected"<? } ?>>อุตรดิตถ์</option>
	<option value="อุทัยธานี"<? if($row['jProvince'] == "อุทัยธานี"){ ?> selected="selected"<? } ?>>อุทัยธานี</option>
</select>	</td>
  </tr>
  <tr>
    <td height="25" align="right">หัวข้อประกาศ :&nbsp; </td>
    <td><input name="atitle" type="text" id="atitle"  onkeyup="javascript:this.value=this.value.toUpperCase();" size="40" value="<?=$row['jTitle']?>" class="box" />
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td height="18" align="right">ราคา :&nbsp; </td>
    <td>
	<input name="aprice"  id="aprice" type="text" size="20" maxlength="30" value="<?=$row['jPrice']?>" class="box" />
      &nbsp;บาท&nbsp; <font color="#CC0000">*</font> <font color="#009900">ไม่ต้องใส่เครื่องหมาย , กำกับ</font></td>
  </tr>
  <tr>
    <td height="173" align="right">รายละเอียด :&nbsp; </td>
    <td><textarea name="adetail" cols="70" rows="12" id="adetail" onkeyup="javascript:this.value=this.value.toUpperCase();" class="box"><?=$row['jDetail']?></textarea>
<font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td height="24" align="right">รูปภาพ 1 :&nbsp; </td>
    <td>
    <?
     if ($row['jPic1'] != "" )
	 { 
		echo"<img src='".$page_link."/picture_job_1/".$row['jPic1']."' width='300' alt='".$row['jTitle']."' title='".$row['jTitle']."' /><br />" ; 
   ?> 
   &nbsp;
	<input type="checkbox" name="unlinks1" value="<?php echo $row['jPic1'];?>" onClick="if(this.checked){document.formadd.file1.style.display='none';}else{document.formadd.file1.style.display='';}" class="box">เลือกเพื่อลบรูป
     <br /><input name="file1_old1" type="hidden" id="file1_old1" value="<?php echo $row['jPic1']?>" class="box">
	 <? } ?>
    <input type="file" name="file1" id="file1" class="box" />
    
      <font color="#CC0000">*</font> <font color="#009900">ขนาดไม่เกิน 2 MB หรือ 500 px. </font></td>
  </tr>
  <tr>
    <td height="24" align="right">รูปภาพ 2 :&nbsp; </td>
    <td>
    <?
     if ($row['jPic2'] != "" )
	 { 
		echo"<img src='".$page_link."/picture_job_2/".$row['jPic2']."' width='300' alt='".$row['jTitle']."' title='".$row['jTitle']."' /><br />" ; 
   ?> 
   &nbsp;
	<input type="checkbox" name="unlinks2" value="<?php echo $row['jPic2'];?>" onClick="if(this.checked){document.formadd.file2.style.display='none';}else{document.formadd.file2.style.display='';}" class="box">เลือกเพื่อลบรูป
     <br /><input name="file2_old2" type="hidden" id="file2_old2" value="<?php echo $row['jPic2']?>" class="box">
	 <? } ?>
    <input type="file" name="file2" id="file2" class="box" />
    
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
	<option value="นาย" <? if($row['jc_Title'] == "นาย"){ ?> selected="selected"<? } ?>>นาย</option>
	<option value="นาง" <? if($row['jc_Title'] == "นาง"){ ?> selected="selected"<? } ?>>นาง</option>
	<option value="นางสาว" <? if($row['jc_Title'] == "นางสาว"){ ?> selected="selected"<? } ?>>นางสาว</option>
	<option value="1" >อื่น ๆ</option>
  </select>	&nbsp;&nbsp;<label id='ctitletxt'></label></td>
  </tr>
  <tr>
    <td align="right">ชื่อ - นามสกุล :&nbsp; </td>
    <td><input name="cname" type="text" id="cname"  onkeyup="javascript:this.value=this.value.toUpperCase();" size="40" value="<?=$row['jc_Name']?>" class="box" />
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td align="right">ที่อยู่ :&nbsp; </td>
    <td><textarea name="caddress" cols="65" rows="6" id="caddress" onkeyup="javascript:this.value=this.value.toUpperCase();" class="box"><?=$row['jc_Address']?></textarea>
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td align="right">เบอร์โทรศัพท์ :&nbsp; </td>
    <td>
      <input name="ctelephone" type="text" id="ctelephone" onkeyup="javascript:this.value=this.value.toUpperCase();" size="40" value="<?=$row['jc_Telephone']?>" class="box" />
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">อีเมล์ :&nbsp; </td>
    <td>
      <input name="cemail" type="text" id="cemail" size="40" value="<?=$row['jc_Email']?>" class="box" />
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">เปลี่ยนรูปภาพ&nbsp;:&nbsp;</td>
    <td><img src="<?=$page_link?>/verify-images.php" alt="รหัสรูปภาพ" title="รหัสรูปภาพ" /></td>
  </tr>
  <tr>
    <td align="right">รหัสรูปภาพ:&nbsp; </td>
    <td><input name="capts" id="capts" type="text" size="8" onkeyup="javascript:this.value=this.value.toUpperCase();" />
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
	<input name="flag" id="flag" type="hidden" value="editjob" />
    <input name="jID" id="jID" type="hidden" value="<? echo $row['jID']; ?>" />
	<input name="ctitle1" id="ctitle1" type="hidden" value="<? echo $rowm['mTitle']; ?>" />
	<input name="cnames" id="cnames" type="hidden" value="<? echo $rowm['mName']." ".$rowm['mLname']; ?>" />
	<input name="caddresss" id="caddresss" type="hidden" value="<? echo $rowm['mAddress']."  ".$rowm['mPostalcode']; ?>" />
	<input name="ctelephones" id="ctelephones" type="hidden" value="<? echo $rowm['mTelephone']; ?>" />
	<input name="cemails" id="cemails" type="hidden" value="<? echo $rowm['mEmail']; ?>" />
	<input name="Submit" type="submit" value="  แก้ไขประกาศ  " /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
