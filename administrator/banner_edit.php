<?php include 'config/isLogon.php' ; 
include '../lib/connect.php' ; 
$db = new mydb;

$sql = "SELECT * FROM banner WHERE bID = '".$_GET['bID']."'";
$result = $db->query($sql);
$row = mysql_fetch_array($result);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php echo $titles ; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="css/style_text.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=JavaScript>

function uzXmlHttp(){
    var xmlhttp = false;
    try{
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    }catch(e){
        try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }catch(e){
            xmlhttp = false;
        }
    }

    if(!xmlhttp && document.createElement){
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}


function validLength(item,min,max){
			return (item.length >= min) && (item.length<=max)
	}
	
function validEMail(mailObj){
		if (validLength(mailObj.value,1,50)){
			//return false;
			if (mailObj.value.search("^.+@.+\\..+$") != -1){
				return true;
			}else{ 
				return false;
 			}
		}else{	
			return false;
		}
	}
	 function emptyField(textObj) {
	   if (textObj.value.length == 0)
    		 return true;
	   for (var i=0; i<textObj.value.length; ++i) {
		     var ch = textObj.value.charAt(i);
		     if (ch != ' ' && ch != '	')
		        return false;
	   }
	   return true;
	 } 
	 
	function validLength(item,min,max){
			return (item.length >= min) && (item.length<=max)
	}
	function chkExe(exet){
	var i= exet.length-4;
	var e =	exet.substring(i, exet.length);
	return  ( e == '.jpg' || e == 'peg'|| e == '.JPG' || e == 'PEG' || e == '.gif' || e == '.GIF' || e == '.SWF' || e == '.swf' || e == 'swf' || e == '.png' || e == '.PNG' || e == 'png');
	}
	 
	function  validFormbanner() {

			if(emptyField(document.formbanner.bposition)){
				alert("กรุณาเลือกขนาด");
				document.formbanner.bposition.focus();
				return false;
			}
			if(emptyField(document.formbanner.bmonth)){
				alert("กรุณาเลือกระยะเวลา");
				document.formbanner.bmonth.focus();
				return false;
			}		
			if(emptyField(document.formbanner.bdetail)){
				alert("กรุณากรอกรายละเอียด");
				document.formbanner.bdetail.focus();
				return false;
			}				
			
			if(document.formbanner.file1.value != ''){
				if(!(chkExe(document.formbanner.file1.value))){
					alert("เลือกรูปภาพได้เฉพาะ .JPG , GIF หรือ .SWF เท่านั้น.");
					document.formbanner.file1.focus();
					return false;
				}
		}	
		if(document.formbanner.file2.value != ''){
				if(!(chkExe(document.formbanner.file2.value))){
					alert("เลือกรูปภาพได้เฉพาะ .JPG , GIF หรือ .SWF เท่านั้น.");
					document.formbanner.file2.focus();
					return false;
				}
		}	
		if(document.formbanner.file3.value != ''){
				if(!(chkExe(document.formbanner.file3.value))){
					alert("เลือกรูปภาพได้เฉพาะ .JPG , GIF หรือ .SWF เท่านั้น.");
					document.formbanner.file3.focus();
					return false;
				}
		}	
		if(document.formbanner.file4.value != ''){
				if(!(chkExe(document.formbanner.file4.value))){
					alert("เลือกรูปภาพได้เฉพาะ .JPG , GIF หรือ .SWF เท่านั้น.");
					document.formbanner.file4.focus();
					return false;
				}
		}		
		if(document.formbanner.file5.value != ''){
				if(!(chkExe(document.formbanner.file5.value))){
					alert("เลือกรูปภาพได้เฉพาะ .JPG , GIF หรือ .SWF เท่านั้น.");
					document.formbanner.file5.focus();
					return false;
				}
		}	
		if(document.formbanner.baddress.value==''){
				alert("กรุณากรอกที่อยู่");
				document.formbanner.baddress.focus();
				return false;
			}
			if(document.formbanner.bprovince.value==''){
				alert("กรุณากรอกเลือกจังหวัด");
				document.formbanner.bprovince.focus();
				return false;
			}
			if(document.formbanner.bzipcode.value==''){
				alert("กรุณากรอกรหัสไปรษณีย์");
				document.formbanner.bzipcode.focus();
				return false;
			}
		if(document.formbanner.btel.value==''){
				alert("กรุณากรอกเบอร์โทรศัพท์");
				document.formbanner.btel.focus();
				return false;
			}
			if(emptyField(document.formbanner.capts)){
				alert("กรุณากรอกรหัสรูปภาพ");
				document.formbanner.capts.focus();
				return false;
			}		
		if(! emptyField(document.formbanner.bemail)){
		if(! validEMail(document.formbanner.bemail)){ alert("กรุณากรอกอีเมล์ให้ถูกต้อง"); document.formbanner.bemail.focus(); return false; }
				}else{
		alert("กรุณากรอกอีเมล์");
		document.formbanner.bemail.focus(); return false;
		}
			aa=checkemail(document.formadd.bemail);
			
			if(aa=="Yes"){
				alert("กรุณากรอกอีเมล์ให้ถูกต้อง");
				document.formbanner.bemail.value="";
				document.formbanner.bemail.focus();
			return false ;
			}
		
		

		
return true;
}																														//end function()


</SCRIPT>
<body>
<?php
error_reporting (E_ALL ^ E_NOTICE);
$limit = $_GET["limit"] ;
$offset = $_GET["offset"] ;
$db = new mydb;

?>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td height="70" colspan="3" class="contentbody"><font color="#464646" size="8">ผู้ดูแลระบบ</font></td>
  </tr>
  <tr> 
    <td width="160" align="left" valign="top">
<?php include ('include_menu.php') ; ?></td>
    <td width="10" align="left" valign="top"><img src="images/spacer.gif" width="10" height="100"></td>
    <td width="100%" align="left" valign="top"> <table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td colspan="2" valign="top"></td>
        </tr>
        <tr> 
          <td width="50%" height="30" valign="middle" class="boldbodytx">แก้ไขแบนเนอร์</td>
          <td width="58%" height="30" valign="middle" class="boldbodytx"><div align="right"> 
             
<a href="banner_add.php"><font color="#000000">เพิ่มแบนเนอร์</font></a> 
            </div></td>
        </tr>
      </table>

      <div align="center" class="menutx">
	  
	  <form name="formbanner" id="formbanner" action="banner_top_function.php" method="post" enctype="multipart/form-data" onSubmit="return validFormbanner();">
  <table width="100%" height="442" border="0" class="menutx">
  <tr>
    <td colspan="2" style="padding-left:15px;">&nbsp;</td>
    </tr>
  <tr>
    <td width="24%">&nbsp;</td>
    <td width="76%">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">เลือกขนาด : </td>
    <td align="left">&nbsp;
	<select name="bposition" class="box" id="bposition">
	<option value="">- กรุณาเลือกขนาด -</option>
	<option value="A" <? if($row['bPosition'] =='A'){ ?> selected="selected" <? } ?>>C = 777x100</option>
	<option value="B" <? if($row['bPosition'] =='B'){ ?> selected="selected" <? } ?>>B = 777x100</option>
	<option value="D" <? if($row['bPosition'] =='D'){ ?> selected="selected" <? } ?>>A = 125x125</option>
  </select><font color="#CC0000">*</font>	</td>
  </tr>
  <tr>
    <td align="right">เลือกระยะเวลา : </td>
    <td align="left">&nbsp;
	<select name="bmonth" class="box" id="bmonth">
	<option value="">- กรุณาเลือกระยะเวลา -</option>
	<option value="1" <? if($row['bMonth'] =='1'){ ?> selected="selected" <? } ?>>1 เดือน</option>
	<option value="3" <? if($row['bMonth'] =='3'){ ?> selected="selected" <? } ?>>3 เดือน</option>
	<option value="6" <? if($row['bMonth'] =='6'){ ?> selected="selected" <? } ?>>6 เดือน</option>
	<option value="12" <? if($row['bMonth'] =='12'){ ?> selected="selected" <? } ?>>12 เดือน</option>
  </select><font color="#CC0000">*</font>	</td>
  </tr>
  <tr>
    <td align="right">ชื่อเว็บ / หัวข้อ : </td>
    <td align="left">&nbsp;
      <input name="btitle" type="text" id="btitle" size="30"  class="box" value="<? echo $row['bTitle']; ?>"> </td>
  </tr>
  <tr>
    <td align="right">URL : </td>
    <td align="left">&nbsp;
      <input name="burl" type="text" id="burl" size="30"  class="box" value="<?  echo $row['bURL']; ?>"></td>
  </tr>
  <tr>
    <td align="right">รายละเอียด : </td>
    <td align="left">&nbsp;
      <textarea name="bdetail" cols="60" rows="7" id="bdetail"  class="box"><?  echo $row['bDetail']; ?></textarea>
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">รูปภาพ : </td>
    <td align="left">&nbsp;
	<?
	if($row['bPosition'] =='B'){
	$path = "../picture_banner/banner-left/";
	}
	if($row['bPosition'] =='C'){
	$path = "../picture_banner/banner-right/";
	}
	
	 if ($row['bPic1']!="" ) { 
					$checkpic =substring($row['bPic1'],-4,4) ;
					$flash = substring($row['bPic1'],0,-4) ; 
					if ($checkpic ==".swf" ){
					?>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="777" height="100">
  <param name="movie" value="<? echo $path; echo $row['bPic1']; ?>">
  <param name="quality" value="high">
  <embed src="<? echo $path; echo $row['bPic1']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="777" height="100"></embed>
</object><br>
					<?
					}else{
					echo"<img src='".$path."".$row['bPic1']."' align='absmiddle'><br>" ; 
					}
			   ?> &nbsp;
	  <input type="checkbox" name="unlinks1" value="<?php echo $row['bPic1'];?>" onClick="if(this.checked){document.all.file1.style.display='none';}else{document.all.file1.style.display='';}">เลือกเพื่อลบรูป
     <? } ?>
	  <input type="file" name="file1" id="file1"  class="box" />
	  <input name="bpicture_old1" type="hidden" id="bpicture_old1"   value="<?php echo $row['bPic1']?>">
      <font color="#CC0000"> *</font><font color="#009900">สำหรับขนาด B 777x100</font></td>
  </tr>
  <tr>
    <td align="right">รูปภาพ : </td>
    <td align="left"> &nbsp;
	<?
	 if ($row['bPic2']!="" ) { 
					$checkpic =substring($row['bPic2'],-4,4) ;
					$flash = substring($row['bPic2'],0,-4) ; 
					if ($checkpic ==".swf" ){
					?>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="125" height="125">
  <param name="movie" value="../picture_banner/banner-center/<? echo $row['bPic2']; ?>">
  <param name="quality" value="high">
  <embed src="../picture_banner/banner-center/<? echo $row['bPic2']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="150" height="150"></embed>
</object><br>
					<?
					}else{
					echo"<img src='../picture_banner/banner-center/".$row['bPic2']."'  align='absmiddle'><br>" ; 
					}
			   ?> &nbsp;
	  <input type="checkbox" name="unlinks2" value="<?php echo $row['bPic2'];?>" onClick="if(this.checked){document.all.file2.style.display='none';}else{document.all.file2.style.display='';}">เลือกเพื่อลบรูป
     <? } ?>
	  <input type="file" name="file2" id="file2"  class="box" />
	  <input name="bpicture_old2" type="hidden" id="bpicture_old2"   value="<?php echo $row['bPic2']?>">
      <font color="#CC0000">*</font><font color="#009900">สำหรับขนาด A 125x125</font></td>
  </tr>
  <tr>
    <td align="right">รูปภาพ : </td>
    <td align="left"> &nbsp;
	<?
	 if ($row['bPic3']!="" ) { 
					$checkpic =substring($row['bPic3'],-4,4) ;
					$flash = substring($row['bPic3'],0,-4) ; 
					if ($checkpic ==".swf" ){
					?>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="777" height="100">
  <param name="movie" value="../picture_banner/banner-top/<? echo $row['bPic3']; ?>">
  <param name="quality" value="high">
  <embed src="../picture_banner/banner-top/<? echo $row['bPic3']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="495" height="120"></embed>
</object><br>
					<?
					}else{
					echo"<img src='../picture_banner/banner-top/".$row['bPic3']."' align='absmiddle'><br>" ; 
					}
			   ?> &nbsp;
	  <input type="checkbox" name="unlinks3" value="<?php echo $row['bPic3'];?>" onClick="if(this.checked){document.all.file3.style.display='none';}else{document.all.file3.style.display='';}">เลือกเพื่อลบรูป
     <? } ?>
	  <input type="file" name="file3" id="file3"  class="box" />
	  <input name="bpicture_old3" type="hidden" id="bpicture_old3"   value="<?php echo $row['bPic3']?>">
      <font color="#CC0000">*</font><font color="#009900">สำหรับขนาด C 777x100 </font></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">รูปขนาดใหญ่&nbsp; : </td>
    <td align="left"> &nbsp;
	<?
	 if ($row['bPic4']!="" ) { 
					$checkpic =substring($row['bPic4'],-4,4) ;
					$flash = substring($row['bPic4'],0,-4) ; 
					if ($checkpic ==".swf" ){
					?>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="500">
  <param name="movie" value="../picture_banner/banner-large/banner-large-1/<? echo $row['bPic4']; ?>">
  <param name="quality" value="high">
  <embed src="../picture_banner/banner-large/banner-large-1/<? echo $row['bPic4']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="500"></embed>
</object><br>
					<?
					}else{
					echo"<img src='../picture_banner/banner-large/banner-large-1/".$row['bPic4']."' align='absmiddle'><br>" ; 
					}
			   ?> &nbsp;
	  <input type="checkbox" name="unlinks4" value="<?php echo $row['bPic4'];?>" onClick="if(this.checked){document.all.file4.style.display='none';}else{document.all.file4.style.display='';}">เลือกเพื่อลบรูป
     <? } ?>
	  <input type="file" name="file4" id="file4"  class="box" />
	  <input name="bpicture_old4" type="hidden" id="bpicture_old4"   value="<?php echo $row['bPic4']?>"></td>
  </tr>
  <tr>
    <td align="right">รูปขนาดใหญ่&nbsp; : </td>
    <td align="left">&nbsp; 
	<?
	 if ($row['bPic5']!="" ) { 
					$checkpic =substring($row['bPic5'],-4,4) ;
					$flash = substring($row['bPic5'],0,-4) ; 
					if ($checkpic ==".swf" ){
					?>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="500">
  <param name="movie" value="../picture_banner/banner-large/banner-large-2/<? echo $row['bPic5']; ?>">
  <param name="quality" value="high">
  <embed src="../picture_banner/banner-large/banner-large-2/<? echo $row['bPic5']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="500"></embed>
</object><br>
					<?
					}else{
					echo"<img src='../picture_banner/banner-large/banner-large-2/".$row['bPic5']."' align='absmiddle'><br>" ; 
					}
			   ?> &nbsp;
	  <input type="checkbox" name="unlinks5" value="<?php echo $row['bPic5'];?>" onClick="if(this.checked){document.all.file5.style.display='none';}else{document.all.file5.style.display='';}">เลือกเพื่อลบรูป
     <? } ?>
	  <input type="file" name="file5" id="file5"  class="box" />
	  <input name="bpicture_old5" type="hidden" id="bpicture_old5"   value="<?php echo $row['bPic5']?>"></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">ที่อยู่ในการติดต่อ&nbsp; : </td>
    <td align="left">
      &nbsp; 
      <textarea name="baddress" cols="60" rows="7" class="box" id="baddress"><?  echo $row['bAddress']; ?></textarea>
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">จังหวัด : </td>
    <td align="left">&nbsp;
	<select name="bprovince" id="bprovince" tabindex="26" style="width: 175px" class="box">
	<option selected="selected" value=""> - กรุณาเลือกจังหวัด - </option>
	<option value="กระบี่" <? if($row['bProvince'] == "กระบี่"){ ?> selected="selected" <? } ?>>กระบี่</option>
	<option value="กรุงเทพมหานคร" <? if($row['bProvince'] == "กรุงเทพมหานคร"){ ?> selected="selected" <? } ?>>กรุงเทพมหานคร</option>
	<option value="กาญจนบุรี" <? if($row['bProvince'] == "กาญจนบุรี"){ ?> selected="selected" <? } ?>>กาญจนบุรี</option>
	<option value="กาฬสินธุ์" <? if($row['bProvince'] == "กาฬสินธุ์"){ ?> selected="selected" <? } ?>>กาฬสินธุ์</option>
	<option value="กำแพงเพชร" <? if($row['bProvince'] == "กำแพงเพชร"){ ?> selected="selected" <? } ?>>กำแพงเพชร</option>
	<option value="ขอนแก่น" <? if($row['bProvince'] == "ขอนแก่น"){ ?> selected="selected" <? } ?>>ขอนแก่น</option>
	<option value="จันทบุรี" <? if($row['bProvince'] == "จันทบุรี"){ ?> selected="selected" <? } ?>>จันทบุรี</option>
	<option value="ฉะเชิงเทรา" <? if($row['bProvince'] == "ฉะเชิงเทรา"){ ?> selected="selected" <? } ?>>ฉะเชิงเทรา</option>
	<option value="ชลบุรี" <? if($row['bProvince'] == "ชลบุรี"){ ?> selected="selected" <? } ?>>ชลบุรี</option>
	<option value="ชัยนาท" <? if($row['bProvince'] == "ชัยนาท"){ ?> selected="selected" <? } ?>>ชัยนาท</option>
	<option value="ชัยภูมิ" <? if($row['bProvince'] == "ชัยภูมิ"){ ?> selected="selected" <? } ?>>ชัยภูมิ</option>
	<option value="ชุมพร" <? if($row['bProvince'] == "ชุมพร"){ ?> selected="selected" <? } ?>>ชุมพร</option>
	<option value="เชียงราย" <? if($row['bProvince'] == "เชียงราย"){ ?> selected="selected" <? } ?>>เชียงราย</option>
	<option value="เชียงใหม่" <? if($row['bProvince'] == "เชียงใหม่"){ ?> selected="selected" <? } ?>>เชียงใหม่</option>
	<option value="ตรัง" <? if($row['bProvince'] == "ตรัง"){ ?> selected="selected" <? } ?>>ตรัง</option>
	<option value="ตราด" <? if($row['bProvince'] == "ตราด"){ ?> selected="selected" <? } ?>>ตราด</option>
	<option value="ตาก" <? if($row['bProvince'] == "ตาก"){ ?> selected="selected" <? } ?>>ตาก</option>
	<option value="นครนายก" <? if($row['bProvince'] == "นครนายก"){ ?> selected="selected" <? } ?>>นครนายก</option>
	<option value="นครปฐม" <? if($row['bProvince'] == "นครปฐม"){ ?> selected="selected" <? } ?>>นครปฐม</option>
	<option value="นครพนม" <? if($row['bProvince'] == "นครพนม"){ ?> selected="selected" <? } ?>>นครพนม</option>
	<option value="นครราชสีมา" <? if($row['bProvince'] == "นครราชสีมา"){ ?> selected="selected" <? } ?>>นครราชสีมา</option>
	<option value="นครศรีธรรมราช" <? if($row['bProvince'] == "นครศรีธรรมราช"){ ?> selected="selected" <? } ?>>นครศรีธรรมราช</option>
	<option value="นครสวรรค์" <? if($row['bProvince'] == "นครสวรรค์"){ ?> selected="selected" <? } ?>>นครสวรรค์</option>
	<option value="นนทบุรี" <? if($row['bProvince'] == "นนทบุรี"){ ?> selected="selected" <? } ?>>นนทบุรี</option>
	<option value="นราธิวาส" <? if($row['bProvince'] == "นราธิวาส"){ ?> selected="selected" <? } ?>>นราธิวาส</option>
	<option value="น่าน" <? if($row['bProvince'] == "น่าน"){ ?> selected="selected" <? } ?>>น่าน</option>
	<option value="บุรีรัมย์" <? if($row['bProvince'] == "บุรีรัมย์"){ ?> selected="selected" <? } ?>>บุรีรัมย์</option>
	<option value="ปทุมธานี" <? if($row['bProvince'] == "ปทุมธานี"){ ?> selected="selected" <? } ?>>ปทุมธานี</option>
	<option value="ประจวบคีรีขันธ์" <? if($row['bProvince'] == "ประจวบคีรีขันธ์"){ ?> selected="selected" <? } ?>>ประจวบคีรีขันธ์</option>
	<option value="ปราจีนบุรี" <? if($row['bProvince'] == "ปราจีนบุรี"){ ?> selected="selected" <? } ?>>ปราจีนบุรี</option>
	<option value="ปัตตานี" <? if($row['bProvince'] == "ปัตตานี"){ ?> selected="selected" <? } ?>>ปัตตานี</option>
	<option value="พระนครศรีอยุธยา" <? if($row['bProvince'] == "พระนครศรีอยุธยา"){ ?> selected="selected" <? } ?>>พระนครศรีอยุธยา</option>
	<option value="พะเยา" <? if($row['bProvince'] == "พะเยา"){ ?> selected="selected" <? } ?>>พะเยา</option>
	<option value="พังงา" <? if($row['bProvince'] == "พังงา"){ ?> selected="selected" <? } ?>>พังงา</option>
	<option value="พัทลุง" <? if($row['bProvince'] == "พัทลุง"){ ?> selected="selected" <? } ?>>พัทลุง</option>
	<option value="พิจิตร" <? if($row['bProvince'] == "พิษณุโลก"){ ?> selected="selected" <? } ?>>พิจิตร</option>
	<option value="พิษณุโลก" <? if($row['bProvince'] == "กระบี่"){ ?> selected="selected" <? } ?>>พิษณุโลก</option>
	<option value="เพชรบุรี" <? if($row['bProvince'] == "เพชรบุรี"){ ?> selected="selected" <? } ?>>เพชรบุรี</option>
	<option value="เพชรบูรณ์" <? if($row['bProvince'] == "เพชรบูรณ์"){ ?> selected="selected" <? } ?>>เพชรบูรณ์</option>
	<option value="แพร่" <? if($row['bProvince'] == "แพร่"){ ?> selected="selected" <? } ?>>แพร่</option>
	<option value="ภูเก็ต" <? if($row['bProvince'] == "ภูเก็ต"){ ?> selected="selected" <? } ?>>ภูเก็ต</option>
	<option value="มหาสารคาม" <? if($row['bProvince'] == "มหาสารคาม"){ ?> selected="selected" <? } ?>>มหาสารคาม</option>
	<option value="มุกดาหาร" <? if($row['bProvince'] == "มุกดาหาร"){ ?> selected="selected" <? } ?>>มุกดาหาร</option>
	<option value="แม่ฮ่องสอน" <? if($row['bProvince'] == "แม่ฮ่องสอน"){ ?> selected="selected" <? } ?>>แม่ฮ่องสอน</option>
	<option value="ยโสธร" <? if($row['bProvince'] == "ยโสธร"){ ?> selected="selected" <? } ?>>ยโสธร</option>
	<option value="ยะลา" <? if($row['bProvince'] == "ยะลา"){ ?> selected="selected" <? } ?>>ยะลา</option>
	<option value="ร้อยเอ็ด" <? if($row['bProvince'] == "ร้อยเอ็ด"){ ?> selected="selected" <? } ?>>ร้อยเอ็ด</option>
	<option value="ระนอง" <? if($row['bProvince'] == "ระนอง"){ ?> selected="selected" <? } ?>>ระนอง</option>
	<option value="ระยอง" <? if($row['bProvince'] == "ระยอง"){ ?> selected="selected" <? } ?>>ระยอง</option>
	<option value="ราชบุรี" <? if($row['bProvince'] == "ราชบุรี"){ ?> selected="selected" <? } ?>>ราชบุรี</option>
	<option value="ลพบุรี" <? if($row['bProvince'] == "ลพบุรี"){ ?> selected="selected" <? } ?>>ลพบุรี</option>
	<option value="ลำปาง" <? if($row['bProvince'] == "ลำปาง"){ ?> selected="selected" <? } ?>>ลำปาง</option>
	<option value="ลำพูน" <? if($row['bProvince'] == "ลำพูน"){ ?> selected="selected" <? } ?>>ลำพูน</option>
	<option value="เลย" <? if($row['bProvince'] == "เลย"){ ?> selected="selected" <? } ?>>เลย</option>
	<option value="ศรีสะเกษ" <? if($row['bProvince'] == "ศรีสะเกษ"){ ?> selected="selected" <? } ?>>ศรีสะเกษ</option>
	<option value="สกลนคร" <? if($row['bProvince'] == "สกลนคร"){ ?> selected="selected" <? } ?>>สกลนคร</option>
	<option value="สงขลา" <? if($row['bProvince'] == "สงขลา"){ ?> selected="selected" <? } ?>>สงขลา</option>
	<option value="สตูล" <? if($row['bProvince'] == "สตูล"){ ?> selected="selected" <? } ?>>สตูล</option>
	<option value="สมุทรปราการ" <? if($row['bProvince'] == "สมุทรปราการ"){ ?> selected="selected" <? } ?>>สมุทรปราการ</option>
	<option value="สมุทรสงคราม" <? if($row['bProvince'] == "สมุทรสงคราม"){ ?> selected="selected" <? } ?>>สมุทรสงคราม</option>
	<option value="สมุทรสาคร" <? if($row['bProvince'] == "สมุทรสาคร"){ ?> selected="selected" <? } ?>>สมุทรสาคร</option>
	<option value="สระแก้ว" <? if($row['bProvince'] == "สระแก้ว"){ ?> selected="selected" <? } ?>>สระแก้ว</option>
	<option value="สระบุรี" <? if($row['bProvince'] == "สระบุรี"){ ?> selected="selected" <? } ?>>สระบุรี</option>
	<option value="สิงห์บุรี" <? if($row['bProvince'] == "สิงห์บุรี"){ ?> selected="selected" <? } ?>>สิงห์บุรี</option>
	<option value="สุโขทัย" <? if($row['bProvince'] == "สุโขทัย"){ ?> selected="selected" <? } ?>>สุโขทัย</option>
	<option value="สุพรรณบุรี" <? if($row['bProvince'] == "สุพรรณบุรี"){ ?> selected="selected" <? } ?>>สุพรรณบุรี</option>
	<option value="สุราษฏร์ธานี" <? if($row['bProvince'] == "สุราษฏร์ธานี"){ ?> selected="selected" <? } ?>>สุราษฏร์ธานี</option>
	<option value="สุรินทร์" <? if($row['bProvince'] == "สุรินทร์"){ ?> selected="selected" <? } ?>>สุรินทร์</option>
	<option value="หนองคาย" <? if($row['bProvince'] == "หนองคาย"){ ?> selected="selected" <? } ?>>หนองคาย</option>
	<option value="หนองบัวลำภู" <? if($row['bProvince'] == "หนองบัวลำภู"){ ?> selected="selected" <? } ?>>หนองบัวลำภู</option>
	<option value="อุบลราชธานี" <? if($row['bProvince'] == "อุบลราชธานี"){ ?> selected="selected" <? } ?>>อุบลราชธานี</option>
	<option value="อ่างทอง" <? if($row['bProvince'] == "อ่างทอง"){ ?> selected="selected" <? } ?>>อ่างทอง</option>
	<option value="อำนาจเจริญ" <? if($row['bProvince'] == "อำนาจเจริญ"){ ?> selected="selected" <? } ?>>อำนาจเจริญ</option>
	<option value="อุดรธานี" <? if($row['bProvince'] == "อุดรธานี"){ ?> selected="selected" <? } ?>>อุดรธานี</option>
	<option value="อุตรดิตถ์" <? if($row['bProvince'] == "อุตรดิตถ์"){ ?> selected="selected" <? } ?>>อุตรดิตถ์</option>
	<option value="อุทัยธานี" <? if($row['bProvince'] == "อุทัยธานี"){ ?> selected="selected" <? } ?>>อุทัยธานี</option>
</select><font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td align="right">รหัสไปรษณีย์ : </td>
    <td align="left">
      &nbsp; 
      <input name="bzipcode" type="text" class="box" id="bzipcode" size="30" value="<?  echo $row['bZipcode']; ?>">
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td align="right">อีเมล์&nbsp; : </td>
    <td align="left">&nbsp;
      <input name="bemail" type="text" id="bemail" size="30"  class="box" value="<?  echo $row['bEmail']; ?>"> <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">เบอร์โทรศัพท์ : </td>
    <td align="left">&nbsp;
      <input name="btel" type="text" id="btel" size="30" class="box" value="<?  echo $row['bTel']; ?>"> <font color="#CC0000">*</font></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left">
      &nbsp; <input name="flag" id="flag" type="hidden" value="editbanner">
	  <input name="offset" type="hidden" id="offset" value="<?php echo $_REQUEST["offset"]; ?>">
      <input name="limit" type="hidden" id="limit" value="<?php echo $_REQUEST["limit"]; ?>">
	  <input name="bID" type="hidden" id="bID" value="<?php echo $_GET['bID']; ?>">
      <input type="submit" name="Submit" value="  ตกลง  " class="box">   </td>
  </tr>
</table>
  </form>
	  
	  <?php echo $msg ; ?></div></td>
        </tr>
      </table>
      <p class="bodytx">&nbsp;</p></td>
  </tr>
  <tr valign="top"> 
    <td colspan="3"><img src="images/spacer.gif" width="200" height="10"></td>
  </tr>
  <tr align="center" valign="top"> 
    <td height="23" colspan="3"><div align="center"> <img src="images/spacer.gif" width="1" height="1"> 
        
      </div>
    </td>
  </tr>
</table>
<?php $db->close() ; ?>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
