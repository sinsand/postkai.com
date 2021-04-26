<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>สมัครสมาชิก</title>
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
<img src="<?=$page_link?>/images/member_register.jpg" alt="สมัครสมาชิก" title="สมัครสมาชิก" /><br />

<div class="alink">

&nbsp;&nbsp;&nbsp;&nbsp;<font color="#CC0000">**</font>&nbsp;&nbsp;สละเวลาสักนิดในการกรอกข้อมูลเพื่อเป็นสมาชิกกับทางเว็บ&nbsp;เพื่อสิทธิประโยชน์&nbsp;สำหรับท่านเองและสามารถลงประกาศฟรี&nbsp;ซื้อ&nbsp;ขาย&nbsp;ให้เช่า&nbsp;อสังหาริมทรัพย์กับทางเว็บฟรีได้อย่างเต็มที่โดยไม่จำกัดจำนวนการลงประกาศ&nbsp;กรุณากรอกข้อมูลด้านล่างให้ครบทุกช่อง
</p>
<form name="form1" method="post" action="<?=$page_link?>/member_function.php" onsubmit="return validForm();">
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td colspan="2" align="right" class="mtext1">&nbsp;</td>
    </tr>
          <tr>
            <td width="34%" align="right" class="mtext1"><b>ชื่อล็อกอิน<font color="#CC0000">*</font> : </b></td>
            <td width="66%">
              <input name="user" type="text" class="box" id="user" size="25" />
            <font color="#CC0000">*กรอกข้อมูลตั้งแต่ 6 ถึง 15 ตัวอักษร</font></td>
    </tr>
          <tr>
            <td align="right" class="mtext1"><b>รหัสผ่าน<font color="#CC0000">*</font> : </b></td>
            <td class="mtext1">
              <input name="password" type="password" class="box" id="password" size="25" /> 
              &nbsp;<font color="#CC0000">*กรอกข้อมูลตั้งแต่ 6 ถึง 15 ตัวอักษร</font></td>
          </tr>
          <tr>
            <td align="right" class="mtext1"><b>ยืนยันรหัสผ่าน<font color="#CC0000">*</font> : </b></td>
            <td class="mtext1">
              <input name="cpassword" type="password" class="box" id="cpassword" size="25" /></td>
          </tr>
          
          <tr>
            <td align="right"><b>รูปภาพ&nbsp;:</b></td>
            <td>
            <img src="<?=$page_link?>/verify-images.php" alt="รหัสรูปภาพ" title="รหัสรูปภาพ" />
			
            </td>
           </tr>
          <tr>
            <td align="right" class="mtext1"><b>รหัสรูปภาพ<font color="#CC0000">*</font> :</b></td>
            <td class="mtext1">
              <input name="capts" id="capts" type="text" size="25" onkeyup="javascript:this.value=this.value.toUpperCase();" class="box" />
              *กรุณาใส่รหัสรูปภาพ</td>
          </tr>
          <tr>
            <td colspan="2" align="right">&nbsp;</td>
    </tr>
  </table>
        
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            <td colspan="4">&nbsp;</td>
                            </tr>
                          <tr>
                            <td width="35%" align="right"><b>คำนำหน้า<font color="#CC0000">*</font> :&nbsp; </b></td>
                            <td width="65%" colspan="3">
                              <select name="title" id="title" class="box" onChange="if(document.getElementById('title').value==1){document.getElementById('titletxt').innerHTML='<input name=title type=text size=10 onkeyup=javascript:this.value=this.value.toUpperCase(); class=box>';}else{document.getElementById('titletxt').innerHTML='';}">
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="1" >อื่น ๆ</option>
                              </select>
                            &nbsp;&nbsp;<label id='titletxt'></label></td>
              </tr>
                          <tr>
                            <td align="right"><b>ชื่อ<font color="#CC0000">*</font>  :&nbsp;</b></td>
                            <td colspan="3"> <input name="fname" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" size="25" class="box" /></td>
                          </tr>
                          <tr>
                            <td align="right"><b>ชื่อเล่น :&nbsp; </b></td>
                            <td colspan="3"><input name="mname" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" size="25" class="box" />                            </td>
                          </tr>
                          <tr>
                            <td align="right"><b>นามสกุล<font color="#CC0000">*</font> :&nbsp; </b></td>
                            <td colspan="3"><input name="lname" type="text" onKeyUp="javascript:this.value=this.value.toUpperCase();" size="25" class="box" /></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top"><b>ที่อยู่<font color="#CC0000">*</font>&nbsp;:&nbsp;</b></td>
                            <td colspan="3"><textarea name="address" cols="45" rows="10" onKeyUp="javascript:this.value=this.value.toUpperCase();" class="box"></textarea></td>
                          </tr>
                          <tr>
                            <td align="right"><b>รหัสไปรษณีย์<font color="#CC0000">*</font> :&nbsp; </b></td>
                            <td colspan="3"><input name="postalcode" type="text" onKeyUp="javascript:this.value=this.value.toUpperCase();" size="25" class="box" /></td>
                          </tr>
                          <tr>
                            <td align="right"><b>โทรศัพท์ :&nbsp;</b></td>
                            <td colspan="3"><input name="telephone" type="text" id="telephone" onKeyUp="javascript:this.value=this.value.toUpperCase();" size="25" class="box" /></td>
                          </tr>
                          <tr>
                            <td align="right"><b>อีเมล<font color="#CC0000">*</font> :&nbsp; </b></td>
                            <td colspan="3"><input name="email" type="text" size="25" class="box" /></td>
                          </tr>
                          <tr>
                            <td align="right">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="right">&nbsp;</td>
                            <td colspan="3">&nbsp;
                              <input name="flag" type="hidden" id="flag" value="Add" />
                              <input name="Submit" type="submit" value="สมัครสมาชิก" />&nbsp;&nbsp;
                              <input name="Submit2" type="reset" value="ยกเลิก" /></td>
                          </tr>
                          
                          <tr>
                            <td colspan="4" align="center">&nbsp;<font color="#CC0000">*</font>&nbsp;เมื่อสมัครสมาชิกเสร็จเรียบร้อยแล้ว&nbsp;ท่านสามารถเข้าสู่ระบบได้ทันทีครับ</td>
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
