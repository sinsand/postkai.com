<?php include 'config/isLogon.php' ; 
include '../lib/connect.php' ; ?>
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
          <td width="50%" height="30" valign="middle" class="boldbodytx">เพิ่มแบนเนอร์</td>
          <td width="58%" height="30" valign="middle" class="boldbodytx"><div align="right"> 
             
<a href="link_add.php?flag=Add"><font color="#000000">เพิ่มเว็บลิ้งค์</font></a> 
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
	<option value="A">C = 777x100</option>
	<option value="B">B = 777x100</option>
	<option value="D">A = 125x125</option>
  </select><font color="#CC0000">*</font>	</td>
  </tr>
  <tr>
    <td align="right">เลือกระยะเวลา : </td>
    <td align="left">&nbsp;
	<select name="bmonth" class="box" id="bmonth">
	<option value="">- กรุณาเลือกระยะเวลา -</option>
	<option value="1">1 เดือน</option>
	<option value="3">3 เดือน</option>
	<option value="6">6 เดือน</option>
	<option value="12">12 เดือน</option>
  </select><font color="#CC0000">*</font>	</td>
  </tr>
  <tr>
    <td align="right">ชื่อเว็บ / หัวข้อ : </td>
    <td align="left">&nbsp;
      <input name="btitle" type="text" id="btitle" size="30"  class="box" > </td>
  </tr>
  <tr>
    <td align="right">URL : </td>
    <td align="left">&nbsp;
      <input name="burl" type="text" id="burl" size="30"  class="box" ></td>
  </tr>
  <tr>
    <td align="right">รายละเอียด : </td>
    <td align="left">&nbsp;
      <textarea name="bdetail" cols="60" rows="7" id="bdetail"  class="box" ></textarea>
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">รูปภาพ : </td>
    <td align="left">&nbsp;
      <input type="file" name="file1" id="file1"  class="box" >
      <font color="#CC0000"> *</font><font color="#009900">สำหรับขนาด B 777x100</font></td>
  </tr>
  <tr>
    <td align="right">รูปภาพ : </td>
    <td align="left"> &nbsp;
      <input type="file" name="file2" id="file2"  class="box">
      <font color="#CC0000">*</font><font color="#009900">สำหรับขนาด 125x125</font></td>
  </tr>
  <tr>
    <td align="right">รูปภาพ : </td>
    <td align="left"> &nbsp;
      <input type="file" name="file3" id="file3"  class="box" />
      <font color="#CC0000">*</font><font color="#009900">สำหรับขนาด C 777x100 </font></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">รูปขนาดใหญ่&nbsp; : </td>
    <td align="left"> &nbsp;
      <input type="file" name="file4" id="file4"  class="box" /></td>
  </tr>
  <tr>
    <td align="right">รูปขนาดใหญ่&nbsp; : </td>
    <td align="left">&nbsp; <input type="file" name="file5" id="file5"  class="box" /></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">ที่อยู่ในการติดต่อ&nbsp; : </td>
    <td align="left">
      &nbsp; 
      <textarea name="baddress" cols="60" rows="7" class="box" id="baddress"></textarea>
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">จังหวัด : </td>
    <td align="left">&nbsp;
	<select name="bprovince" id="bprovince" tabindex="26" style="width: 175px" class="box">
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
</select><font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td align="right">รหัสไปรษณีย์ : </td>
    <td align="left">
      &nbsp; 
      <input name="bzipcode" type="text" class="box" id="bzipcode" size="30">
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td align="right">อีเมล์&nbsp; : </td>
    <td align="left">&nbsp;
      <input name="bemail" type="text" id="bemail" size="30"  class="box" > <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">เบอร์โทรศัพท์ : </td>
    <td align="left">&nbsp;
      <input name="btel" type="text" id="btel" size="30" class="box"> <font color="#CC0000">*</font></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left">
      &nbsp; <input name="flag" id="flag" type="hidden" value="addbanner">
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
