<?php session_start();
include 'lib/connect.php' ;
include 'config/isLogon.php' ; 
$db = new mydb ;

$select = "select  *  from member  where mID='".$_SESSION['mID']."'";
$result= $db->query($select) ; 
$row = mysql_fetch_array($result);
$old_user = urldecode($row['mUsername']) ; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>แก้ไขข้อมูลส่วนตัว</title>
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
<body onload="document.getElementById('word-search').focus();<?php if($row['mTitle'] != 'นาย' && $row['mTitle'] != 'นาง' && $row['mTitle'] != 'นางสาว') { ?>document.form1.title.value=1;<?php } ?>if(document.form1.title.value==1){document.getElementById('titletxt').innerHTML='<input name=title type=text size=10 value=<?php echo $row['mTitle'] ; ?>  onkeyup=javascript:this.value=this.value.toUpperCase(); id=titles >';}else{document.getElementById('titletxt').innerHTML='';}">
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
<img src="<?=$page_link?>/images/member_edit.jpg" alt="ข้อมูลอสังหาริมทรัพย์ของคุณ" title="ข้อมูลอสังหาริมทรัพย์ของคุณ" /><br />

<div class="alink">

<p style="padding-left:100px;">
&nbsp;&nbsp;&nbsp;&nbsp;<font color="#CC0000">**</font>&nbsp;&nbsp;กรุณากรอกข้อมูลด้านล่างให้ครบทุกช่อง
</p>
<form name="form1" method="post" action="<?=$page_link?>/member_function.php" onSubmit="return validFormedit();">
  <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="36%" align="right"><b>ชื่อล็อกอิน : </b></td>
            <td width="64%">
              <?=$row['mUsername']?></td>
    </tr>
          <tr>
            <td align="right"><b>รหัสผ่านเก่า<font color="#CC0000">*</font> :</b></td>
            <td class="mtext1"><input name="password-old" type="password" class="box" id="password-old" size="25" /></td>
          </tr>
          <tr>
            <td align="right"><b>รหัสผ่านใหม่<font color="#CC0000">*</font> : </b></td>
            <td class="mtext1">
              <input name="password-new1" type="password" class="box" id="password-new1" size="25" /></td>
          </tr>
          <tr>
            <td align="right"><b>ยืนยันรหัสผ่านใหม่<font color="#CC0000">*</font> : </b></td>
            <td class="mtext1">
              <input name="cpassword-re-new1" type="password" class="box" id="cpassword-re-new1" size="25" /></td>
          </tr>
  </table>
        
<table width="100%" border="0" cellspacing="0" cellpadding="5">
                          <tr>
                            <td colspan="4">&nbsp;</td>
                            </tr>
                          <tr>
                            <td width="38%" align="right"><b>คำนำหน้า<font color="#CC0000">*</font> :&nbsp; </b></td>
                            <td width="62%" colspan="3">
                              <select name="title" class="box" id="title" onChange="if(document.getElementById('title').value==1){document.getElementById('titletxt').innerHTML='<input name=titles type=text size=10  onkeyup=javascript:this.value=this.value.toUpperCase();  id=titles class=box>';}else{document.getElementById('titletxt').innerHTML='';}">
                                <option value="นาย" <?php if($row['mTitle'] == 'นาย') { echo "selected" ; } ?>>นาย</option>
                                <option value="นาง"  <?php if($row['mTitle'] == 'นาง') { echo "selected" ; } ?>>นาง</option>
                                <option value="นางสาว" <?php if($row['mTitle'] == 'นางสาว') { echo "selected" ; } ?>>นางสาว</option>
                                <option value="1">อื่น ๆ</option>
                              </select>
                            &nbsp;&nbsp;<label id='titletxt'></label></td>
                          </tr>
                          <tr>
                            <td align="right"><b>ชื่อ<font color="#CC0000">*</font>  :&nbsp;</b></td>
                            <td colspan="3"> <input name="fname" id="fname" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" size="25" value="<?=$row['mName']?>" /></td>
                          </tr>
                          <tr>
                            <td align="right"><b>ชื่อเล่น :&nbsp; </b></td>
                            <td colspan="3"><input name="mname" type="text" onkeyup="javascript:this.value=this.value.toUpperCase();" size="25" value="<?=$row['mMname']?>" /></td>
                          </tr>
                          <tr>
                            <td align="right"><b>นามสกุล<font color="#CC0000">*</font> :&nbsp; </b></td>
                            <td colspan="3"><input name="lname" id="lname" type="text" onKeyUp="javascript:this.value=this.value.toUpperCase();" size="25" value="<?=$row['mLname']?>" /></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top"><b>ที่อยู่<font color="#CC0000">*</font>&nbsp;:&nbsp;</b></td>
                            <td colspan="3"><textarea name="address" id="address" cols="45" rows="10" onKeyUp="javascript:this.value=this.value.toUpperCase();"><?=$row['mAddress']?></textarea></td>
                          </tr>
                          <tr>
                            <td align="right"><b>รหัสไปรษณีย์<font color="#CC0000">*</font> :&nbsp; </b></td>
                            <td colspan="3"><input name="postalcode" id="postalcode" type="text" onKeyUp="javascript:this.value=this.value.toUpperCase();" size="25" value="<?=$row['mPostalcode']?>" /></td>
                          </tr>
                          <tr>
                            <td align="right"><b>โทรศัพท์ :&nbsp;</b></td>
                            <td colspan="3"><input name="telephone" type="text" id="telephone" onKeyUp="javascript:this.value=this.value.toUpperCase();" size="25" value="<?=$row['mTelephone']?>" /></td>
                          </tr>
                          <tr>
                            <td align="right"><b>อีเมล :&nbsp; </b></td>
                            <td colspan="3"><input name="email" id="email" type="text" size="25" value="<?=$row['mEmail']?>" /></td>
                          </tr>
                          <tr>
                            <td align="right">&nbsp;</td>
                            <td colspan="3">&nbsp;</td>
                          </tr>
                          <tr>
                            <td align="right">&nbsp;</td>
                            <td colspan="3">&nbsp;
                              <input name="flag" type="hidden" id="flag" value="Editmember" />
                              <input name="Submit" type="submit" value="แก้ไขสมาชิก" />&nbsp;&nbsp;
                              <input name="Submit2" type="reset" value="ยกเลิก" /></td>
                          </tr>
                          
                          <tr>
                            <td colspan="4" align="center">&nbsp;</td>
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
