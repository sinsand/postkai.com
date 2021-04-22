<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;

		if($_REQUEST['atype'] == "1")
		{
			$con = " and jaType = '1'";
			$txtatype = "ซื้อ";
		}
		if($_REQUEST['atype'] == "2")
		{
			$con = " and jaType = '2'";
			$txtatype = "ขาย";
		}
		if($_REQUEST['atype'] == "3")
		{
			$con = " and jaType = '3'";
			$txtatype = "ให้เช่า";
		}
		
		if($_REQUEST['btype'] == "1")
		{
			$con2 = " and jType = '1'";
			$txtbtype = "Home";
		}
		if($_REQUEST['btype'] == "2")
		{
			$con2 = " and jType = '2'";
			$txtbtype = "Condo ";
		}
		if($_REQUEST['btype'] == "3")
		{
			$con2 = " and jType = '3'";
			$txtbtype = "Building";
		}
		if($_REQUEST['btype'] == "4")
		{
			$con2 = " and jType = '4'";
			$txtbtype = "Land";
		}
		if($_REQUEST['btype'] == "5")
		{
			$con2 = " and jType = '5'";
			$txtbtype = "Rent";
		}
		if($_REQUEST['btype'] == "6")
		{
			$con2 = " and jType = '6'";
			$txtbtype = "Furniture";
		}
		if($_REQUEST['btype'] == "7")
		{
			$con2 = " and jType = '7'";
			$txtbtype = "Car";
		}
		if($_REQUEST['btype'] == "8")
		{
			$con2 = " and jType = '8'";
			$txtbtype = "Others";
		}

		if($_REQUEST['word_search'] != "")
		{
			$word = $_REQUEST['word_search'];
			$con3 = " and (jTitle like '%$word%' or jDetail like '%$word%') ";
		}
		
		if($_REQUEST['province'] != "")
		{
			$con4 = " and jProvince = '".$_REQUEST['province']."' ";
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>ค้นหาประกาศ ลงประกาศฟรี อสังหาริมทรัพย์  ซื้อ ขาย ให้เช่า บ้านเดี่ยว บ้านจัดสรร บ้านมือสอง ทาวน์เฮ้าส์ คอนโด ที่ดิน อาคาร เฟอร์นิเจอร์ บ้านเช่า ห้องเช่า รถยนต์ รถยนต์มือสอง</title>
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

var start = new Date();
var startsec = start.getTime();
var num = 0;
for( var i = 0; i < 250000; i++ )
{
  num++;
}

var stop  = new Date();
var stopsec = stop.getTime();
var loadtime = ( stopsec - startsec ) / 1000;
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
<img src="<?=$page_link?>/images/property_search.jpg" alt="ค้นหาอสังหาริมทรัพย์" title="ค้นหาอสังหาริมทรัพย์" /><br />

<div class="alink">

<form action="<?=$page_link?>/ค้นหา-อสังหาริมทรัพย์/search" method="post" name="frm-search">
<strong id="txtbold">ค้นหาประกาศ</strong><br /><input name="word_search" id="word-search" type="text" size="70" value="<?=$_REQUEST['word_search']?>" /><br /><br />

<input name="atype" type="radio" value="1"<? if($_REQUEST['atype'] == "1"){ ?> checked="checked"<? } ?> />ซื้อ&nbsp;
<input name="atype" type="radio" value="2"<? if($_REQUEST['atype'] == "2"){ ?> checked="checked"<? } ?> />ขาย&nbsp;
<input name="atype" type="radio" value="3"<? if($_REQUEST['atype'] == "3"){ ?> checked="checked"<? } ?> />ให้เช่า&nbsp;&nbsp;
จังหวัด&nbsp;:&nbsp;<select name="province" id="province">
	<option selected="selected" value=""> เลือกจังหวัด </option>
	<option value="กระบี่"<? if($_REQUEST['province'] == "กระบี่"){ ?>  selected="selected"<? } ?>>กระบี่</option>
	<option value="กรุงเทพมหานคร"<? if($_REQUEST['province'] == "กรุงเทพมหานคร"){ ?>  selected="selected"<? } ?>>กรุงเทพมหานคร</option>
	<option value="กาญจนบุรี"<? if($_REQUEST['province'] == "กาญจนบุรี"){ ?>  selected="selected"<? } ?>>กาญจนบุรี</option>
	<option value="กาฬสินธุ์"<? if($_REQUEST['province'] == "กาฬสินธุ์"){ ?>  selected="selected"<? } ?>>กาฬสินธุ์</option>
	<option value="กำแพงเพชร"<? if($_REQUEST['province'] == "กำแพงเพชร"){ ?> selected="selected"<? } ?>>กำแพงเพชร</option>
	<option value="ขอนแก่น"<? if($_REQUEST['province'] == "ขอนแก่น"){ ?> selected="selected"<? } ?>>ขอนแก่น</option>
	<option value="จันทบุรี"<? if($_REQUEST['province'] == "จันทบุรี"){ ?> selected="selected"<? } ?>>จันทบุรี</option>
	<option value="ฉะเชิงเทรา"<? if($_REQUEST['province'] == "ฉะเชิงเทรา"){ ?> selected="selected"<? } ?>>ฉะเชิงเทรา</option>
	<option value="ชลบุรี"<? if($_REQUEST['province'] == "ชลบุรี"){ ?> selected="selected"<? } ?>>ชลบุรี</option>
	<option value="ชัยนาท"<? if($_REQUEST['province'] == "ชัยนาท"){ ?> selected="selected"<? } ?>>ชัยนาท</option>
	<option value="ชัยภูมิ"<? if($_REQUEST['province'] == "ชัยภูมิ"){ ?> selected="selected"<? } ?>>ชัยภูมิ</option>
	<option value="ชุมพร"<? if($_REQUEST['province'] == "ชุมพร"){ ?> selected="selected"<? } ?>>ชุมพร</option>
	<option value="เชียงราย"<? if($_REQUEST['province'] == "เชียงราย"){ ?> selected="selected"<? } ?>>เชียงราย</option>
	<option value="เชียงใหม่"<? if($_REQUEST['province'] == "เชียงใหม่"){ ?> selected="selected"<? } ?>>เชียงใหม่</option>
	<option value="ตรัง"<? if($_REQUEST['province'] == "ตรัง"){ ?> selected="selected"<? } ?>>ตรัง</option>
	<option value="ตราด"<? if($_REQUEST['province'] == "ตราด"){ ?> selected="selected"<? } ?>>ตราด</option>
	<option value="ตาก"<? if($_REQUEST['province'] == "ตาก"){ ?> selected="selected"<? } ?>>ตาก</option>
	<option value="นครนายก"<? if($_REQUEST['province'] == "นครนายก"){ ?> selected="selected"<? } ?>>นครนายก</option>
	<option value="นครปฐม"<? if($_REQUEST['province'] == "นครปฐม"){ ?> selected="selected"<? } ?>>นครปฐม</option>
	<option value="นครพนม"<? if($_REQUEST['province'] == "นครพนม"){ ?> selected="selected"<? } ?>>นครพนม</option>
	<option value="นครราชสีมา"<? if($_REQUEST['province'] == "นครราชสีมา"){ ?> selected="selected"<? } ?>>นครราชสีมา</option>
	<option value="นครศรีธรรมราช"<? if($_REQUEST['province'] == "นครศรีธรรมราช"){ ?> selected="selected"<? } ?>>นครศรีธรรมราช</option>
	<option value="นครสวรรค์"<? if($_REQUEST['province'] == "นครสวรรค์"){ ?> selected="selected"<? } ?>>นครสวรรค์</option>
	<option value="นนทบุรี"<? if($_REQUEST['province'] == "นนทบุรี"){ ?> selected="selected"<? } ?>>นนทบุรี</option>
	<option value="นราธิวาส"<? if($_REQUEST['province'] == "นราธิวาส"){ ?> selected="selected"<? } ?>>นราธิวาส</option>
	<option value="น่าน"<? if($_REQUEST['province'] == "น่าน"){ ?> selected="selected"<? } ?>>น่าน</option>
	<option value="บุรีรัมย์"<? if($_REQUEST['province'] == "บุรีรัมย์"){ ?> selected="selected"<? } ?>>บุรีรัมย์</option>
	<option value="ปทุมธานี"<? if($_REQUEST['province'] == "ปทุมธานี"){ ?> selected="selected"<? } ?>>ปทุมธานี</option>
	<option value="ประจวบคีรีขันธ์"<? if($_REQUEST['province'] == "ประจวบคีรีขันธ์"){ ?> selected="selected"<? } ?>>ประจวบคีรีขันธ์</option>
	<option value="ปราจีนบุรี"<? if($_REQUEST['province'] == "ปราจีนบุรี"){ ?> selected="selected"<? } ?>>ปราจีนบุรี</option>
	<option value="ปัตตานี"<? if($_REQUEST['province'] == "ปัตตานี"){ ?> selected="selected"<? } ?>>ปัตตานี</option>
	<option value="พระนครศรีอยุธยา"<? if($_REQUEST['province'] == "พระนครศรีอยุธยา"){ ?> selected="selected"<? } ?>>พระนครศรีอยุธยา</option>
	<option value="พะเยา"<? if($_REQUEST['province'] == "พะเยา"){ ?> selected="selected"<? } ?>>พะเยา</option>
	<option value="พังงา"<? if($_REQUEST['province'] == "พังงา"){ ?> selected="selected"<? } ?>>พังงา</option>
	<option value="พัทลุง"<? if($_REQUEST['province'] == "พัทลุง"){ ?> selected="selected"<? } ?>>พัทลุง</option>
	<option value="พิจิตร"<? if($_REQUEST['province'] == "พิจิตร"){ ?> selected="selected"<? } ?>>พิจิตร</option>
	<option value="พิษณุโลก"<? if($_REQUEST['province'] == "พิษณุโลก"){ ?> selected="selected"<? } ?>>พิษณุโลก</option>
	<option value="เพชรบุรี"<? if($_REQUEST['province'] == "เพชรบุรี"){ ?> selected="selected"<? } ?>>เพชรบุรี</option>
	<option value="เพชรบูรณ์"<? if($_REQUEST['province'] == "เพชรบูรณ์"){ ?> selected="selected"<? } ?>>เพชรบูรณ์</option>
	<option value="แพร่"<? if($_REQUEST['province'] == "แพร่"){ ?> selected="selected"<? } ?>>แพร่</option>
	<option value="ภูเก็ต"<? if($_REQUEST['province'] == "ภูเก็ต"){ ?> selected="selected"<? } ?>>ภูเก็ต</option>
	<option value="มหาสารคาม"<? if($_REQUEST['province'] == "มหาสารคาม"){ ?> selected="selected"<? } ?>>มหาสารคาม</option>
	<option value="มุกดาหาร"<? if($_REQUEST['province'] == "มุกดาหาร"){ ?> selected="selected"<? } ?>>มุกดาหาร</option>
	<option value="แม่ฮ่องสอน"<? if($_REQUEST['province'] == "แม่ฮ่องสอน"){ ?> selected="selected"<? } ?>>แม่ฮ่องสอน</option>
	<option value="ยโสธร"<? if($_REQUEST['province'] == "ยโสธร"){ ?> selected="selected"<? } ?>>ยโสธร</option>
	<option value="ยะลา"<? if($_REQUEST['province'] == "ยะลา"){ ?> selected="selected"<? } ?>>ยะลา</option>
	<option value="ร้อยเอ็ด"<? if($_REQUEST['province'] == "ร้อยเอ็ด"){ ?> selected="selected"<? } ?>>ร้อยเอ็ด</option>
	<option value="ระนอง"<? if($_REQUEST['province'] == "ระนอง"){ ?> selected="selected"<? } ?>>ระนอง</option>
	<option value="ระยอง"<? if($_REQUEST['province'] == "ระยอง"){ ?> selected="selected"<? } ?>>ระยอง</option>
	<option value="ราชบุรี"<? if($_REQUEST['province'] == "ราชบุรี"){ ?> selected="selected"<? } ?>>ราชบุรี</option>
	<option value="ลพบุรี"<? if($_REQUEST['province'] == "ลพบุรี"){ ?> selected="selected"<? } ?>>ลพบุรี</option>
	<option value="ลำปาง"<? if($_REQUEST['province'] == "ลำปาง"){ ?> selected="selected"<? } ?>>ลำปาง</option>
	<option value="ลำพูน"<? if($_REQUEST['province'] == "ลำพูน"){ ?> selected="selected"<? } ?>>ลำพูน</option>
	<option value="เลย"<? if($_REQUEST['province'] == "เลย"){ ?> selected="selected"<? } ?>>เลย</option>
	<option value="ศรีสะเกษ"<? if($_REQUEST['province'] == "ศรีสะเกษ"){ ?> selected="selected"<? } ?>>ศรีสะเกษ</option>
	<option value="สกลนคร"<? if($_REQUEST['province'] == "สกลนคร"){ ?> selected="selected"<? } ?>>สกลนคร</option>
	<option value="สงขลา"<? if($_REQUEST['province'] == "สงขลา"){ ?> selected="selected"<? } ?>>สงขลา</option>
	<option value="สตูล"<? if($_REQUEST['province'] == "สตูล"){ ?> selected="selected"<? } ?>>สตูล</option>
	<option value="สมุทรปราการ"<? if($_REQUEST['province'] == "สมุทรปราการ"){ ?> selected="selected"<? } ?>>สมุทรปราการ</option>
	<option value="สมุทรสงคราม"<? if($_REQUEST['province'] == "สมุทรสงคราม"){ ?> selected="selected"<? } ?>>สมุทรสงคราม</option>
	<option value="สมุทรสาคร"<? if($_REQUEST['province'] == "สมุทรสาคร"){ ?> selected="selected"<? } ?>>สมุทรสาคร</option>
	<option value="สระแก้ว"<? if($_REQUEST['province'] == "สระแก้ว"){ ?> selected="selected"<? } ?>>สระแก้ว</option>
	<option value="สระบุรี"<? if($_REQUEST['province'] == "สระบุรี"){ ?> selected="selected"<? } ?>>สระบุรี</option>
	<option value="สิงห์บุรี"<? if($_REQUEST['province'] == "สิงห์บุรี"){ ?> selected="selected"<? } ?>>สิงห์บุรี</option>
	<option value="สุโขทัย"<? if($_REQUEST['province'] == "สุโขทัย"){ ?> selected="selected"<? } ?>>สุโขทัย</option>
	<option value="สุพรรณบุรี"<? if($_REQUEST['province'] == "สุพรรณบุรี"){ ?> selected="selected"<? } ?>>สุพรรณบุรี</option>
	<option value="สุราษฏร์ธานี"<? if($_REQUEST['province'] == "สุราษฏร์ธานี"){ ?> selected="selected"<? } ?>>สุราษฏร์ธานี</option>
	<option value="สุรินทร์"<? if($_REQUEST['province'] == "สุรินทร์"){ ?> selected="selected"<? } ?>>สุรินทร์</option>
	<option value="หนองคาย"<? if($_REQUEST['province'] == "หนองคาย"){ ?> selected="selected"<? } ?>>หนองคาย</option>
	<option value="หนองบัวลำภู"<? if($_REQUEST['province'] == "หนองบัวลำภู"){ ?> selected="selected"<? } ?>>หนองบัวลำภู</option>
	<option value="อุบลราชธานี"<? if($_REQUEST['province'] == "อุบลราชธานี"){ ?> selected="selected"<? } ?>>อุบลราชธานี</option>
	<option value="อ่างทอง"<? if($_REQUEST['province'] == "อ่างทอง"){ ?> selected="selected"<? } ?>>อ่างทอง</option>
	<option value="อำนาจเจริญ"<? if($_REQUEST['province'] == "อำนาจเจริญ"){ ?> selected="selected"<? } ?>>อำนาจเจริญ</option>
	<option value="อุดรธานี"<? if($_REQUEST['province'] == "อุดรธานี"){ ?> selected="selected"<? } ?>>อุดรธานี</option>
	<option value="อุตรดิตถ์"<? if($_REQUEST['province'] == "อุตรดิตถ์"){ ?> selected="selected"<? } ?>>อุตรดิตถ์</option>
	<option value="อุทัยธานี"<? if($_REQUEST['province'] == "อุทัยธานี"){ ?> selected="selected"<? } ?>>อุทัยธานี</option>
</select>
<br /><br />
<input name="btype" type="radio" value="1"<? if($_REQUEST['btype'] == "1"){ ?> checked="checked"<? } ?> />
Home
<input name="btype" type="radio" value="2"<? if($_REQUEST['btype'] == "2"){ ?> checked="checked"<? } ?> />
Condo
<input name="btype" type="radio" value="3"<? if($_REQUEST['btype'] == "3"){ ?> checked="checked"<? } ?> />
Building
<input name="btype" type="radio" value="4"<? if($_REQUEST['btype'] == "4"){ ?> checked="checked"<? } ?> />
Land
<input name="btype" type="radio" value="5"<? if($_REQUEST['btype'] == "5"){ ?> checked="checked"<? } ?> />
Rent 
<input name="btype" type="radio" value="6"<? if($_REQUEST['btype'] == "6"){ ?> checked="checked"<? } ?> />
Furniture 
<input name="btype" type="radio" value="7"<? if($_REQUEST['btype'] == "7"){ ?> checked="checked"<? } ?> />
Car 
<input name="btype" type="radio" value="8"<? if($_REQUEST['btype'] == "8"){ ?> checked="checked"<? } ?> />
Others 
<br /><br />
<input name="submit" type="submit" value="คลิกค้นหาประกาศ!" />
</form>
<br />
<font color="#CCCCCC">--------------------------------------------------------------------------------------------------------------------------------</font><br /><br />
<?		
$q="SELECT * FROM sb_job where jType != '0' $con $con2 $con3 $con4 ";
$q.=" order by jDate_Create desc";
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
?>

<? if($_REQUEST['atype'] != "" or $_REQUEST['btype'] != "" or $_REQUEST['word_search'] != "" or $_REQUEST['province'] != ""){ ?>
<strong>ผลการค้นหา&nbsp;:&nbsp;</strong>ประเภท&nbsp;:&nbsp;<? if($_REQUEST['atype'] != ""){ ?><strong><?=$txtatype?></strong>&nbsp;<? }else{ echo "<strong>-&nbsp;</strong>"; } if($_REQUEST['btype'] != ""){ ?>&raquo;&nbsp;<strong><?=$txtbtype?></strong><? }else{ echo "&raquo;&nbsp;<strong>-</strong>"; } ?>&nbsp;,คำค้นหา&nbsp;:&nbsp;<strong><? if($_REQUEST['word_search'] != ""){ echo $_REQUEST['word_search']; }else{ echo "-"; } ?></strong>&nbsp;,จังหวัด&nbsp;:&nbsp;<strong><? if($_REQUEST['province'] != ""){ echo $_REQUEST['province']; }else{ echo "-"; } ?></strong>&nbsp;<? if($_REQUEST['atype'] != "" or $_REQUEST['btype'] != "" or $_REQUEST['word_search'] != "" or $_REQUEST['province'] != ""){ ?>,ทั้งหมด&nbsp;<strong><font color="#006600"><?=$total?></font></strong>&nbsp;รายการ<? } ?>&nbsp;&nbsp;(<strong><script type="text/javascript">document.write("ใช้เวลาทั้งหมด " +loadtime+ " วินาที");</script></strong>)
<br /><br /><? } ?>



<?

while ($row = mysql_fetch_array($qr))
{
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);
	

	
	if($row['jaType'] == "1")
	{
		$subtype = "ซื้อ";
	}
	if($row['jaType'] == "2")
	{
		$subtype = "ขาย";
	}
	if($row['jaType'] == "3")
	{
		$subtype = "ให้เช่า";
	}
	
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
<div class="imgleft">    
<?	
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?=$page_link?>/<?=$cat_type?>/<?=$titleall?>/1/1/<?=$row['jType']?>/<?=$row['jaType']?>/<?=$row['jID']?>" target="_blank" title="<?=$row['jTitle']?>">
                <? 
		  	echo "<b><font size='2'>"; 
			$position=100; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jTitle']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}	
			echo "</font></b>";		
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?=$subtype?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>ดูแ้ล้ว&nbsp;:&nbsp;<?=$row['jRead']?>&nbsp;ครั้ง</strong></font>
<br />
<?
			$position=150; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$row['jDetail']; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div>
<br />&nbsp;<br />
<?
}
if($total == 0)
{
?>
<center><h1><font color="#CC0000">ไม่มีข้อมูลการค้นหา</font></h1></center>
<?
}
?>
<br />
<?php if($total>0){ ?>หน้า&nbsp;:&nbsp;
<div class="browse_page">
 <?php   
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
  page_navigatorsearch($before_p,$plus_p,$total,$total_p,$chk_page,"&atype=".$_REQUEST['atype']."&btype=".$_REQUEST['btype']."&province=".$_REQUEST['province']."&word_search=".$word."");    
  ?> 
</div>
<?php } ?>

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
