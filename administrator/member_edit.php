<?php 
include 'config/isLogon.php' ; 
include '../lib/connect.php' ;
$db = new mydb;
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php echo $titles ; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="css/style_text.css" rel="stylesheet" type="text/css">
</head>


<body>
<?php
$sql = "SELECT * FROM member where mID = '".$_GET['mID']."'";
$result = $db->query($sql);
$fetch = mysql_fetch_array($result);
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
          <td valign="top"></td>
        </tr>
        <tr> 
          <td width="50%" height="30" valign="middle" class="boldbodytx">แก้ไขสมาชิก</td>
        </tr>
      </table>

<table width="52%" border="0" align="center" cellpadding="0" cellspacing="0" class="boldbodytx">
                  <form name="form1" method="post" action="member_function.php" onSubmit="return validForm();">
                    <tr>
                      <td valign="top">
                        <fieldset class="fielset">
                          <legend class="bluetexthilight2">ข้อมูลเข้าสู่ระบบ</legend>
                          <table width="100%" border="0" cellspacing="0" cellpadding="5" class="boldbodytx">
                          <tr>
                            <td colspan="2" align="right" class="mtext1">&nbsp;</td>
                            </tr>
                          <tr>
                            <td width="25%" align="right" class="mtext1"><b>ชื่อล๊อกอิน<span class="text">*</span> : </b></td>
                            <td width="75%">
                              <input name="user" type="text" class="box" id="user" size="25" value="<? echo $fetch['mUsername']; ?>">
                            <span class="text">*กรุณากรอกข้อมูลตั้งแต่ 6 ถึง 15 ตัวอักษร</span></td>
                          </tr>
                          <tr>
                            <td align="right" class="mtext1"><b>รหัสผ่าน<span class="text">*</span> : </b></td>
                            <td class="mtext1">
                              <input name="password" type="text" class="box" id="password" size="25" value="<? echo $fetch['mPassword']; ?>"> &nbsp;<span class="text">*กรุณากรอกข้อมูลตั้งแต่ 6 ถึง 15 ตัวอักษร</span></td>
                          </tr>
                          <tr>
                            <td align="right" class="mtext1"><b>ยืนยันรหัสผ่าน<span class="text">*</span> : </b></td>
                            <td class="mtext1">
                              <input name="cpassword" type="text" class="box" id="cpassword" size="25"  value="<? echo $fetch['mPassword']; ?>"></td>
                          </tr>
                        </table>
						<br>
                        </fieldset>
                        <br>
                        <fieldset class="fielset">
                          <legend class="bluetexthilight2"><strong>ข้อมูลส่วนตัว</strong></legend>
                          <table width="100%" border="0" cellspacing="0" cellpadding="5" class="boldbodytx">
                          <tr>
                            <td colspan="4" class="mtext1">&nbsp;</td>
                            </tr>
                          <tr>
                            <td width="25%" align="right" class="mtext1"><b>คำนำหน้า<span class="text">*</span> :&nbsp; </b></td>
                            <td width="75%" colspan="3">
                              <select name="title" class="box" id="title" onChange="if(document.getElementById('title').value==1){document.getElementById('titletxt').innerHTML='<input name=title type=text size=25 onkeyup=javascript:this.value=this.value.toUpperCase(); class=box>';}else{document.getElementById('titletxt').innerHTML='';}">
                                <option value="นาย" <?php if($_SESSION['title']=='นาย'){ echo "selected" ; } ?>>นาย</option>
                                <option value="นาง" <?php if($_SESSION['title']=='นาง'){ echo "selected" ; } ?>>นาง</option>
                                <option value="นางสาว" <?php if($_SESSION['title']=='นางสาว'){ echo "selected" ; } ?>>นางสาว</option>
                                <option value="1" >อื่น ๆ</option>
                              </select>
                            &nbsp;&nbsp;<label id='titletxt'></label></td>
                          </tr>
                          <tr>
                            <td align="right" class="mtext1"><b>ชื่อ<span class="text">*</span>  :&nbsp;</b></td>
                            <td colspan="3" class="mtext1">
                              <input name="fname" type="text" class="box"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="<? echo $fetch['mName']; ?>" size="25"></td>
                          </tr>
                          <tr>
                            <td align="right" class="mtext1"><b>ชื่อเล่น :&nbsp; </b></td>
                            <td colspan="3" class="mtext1">
                              <input name="mname" type="text" class="box"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="<? echo $fetch['mMname']; ?>" size="25">                            </td>
                          </tr>
                          <tr>
                            <td align="right" class="mtext1"><b>นามสกุล<span class="text">*</span> :&nbsp; </b></td>
                            <td colspan="3" class="mtext1">
                              <input name="lname" type="text" class="box" onKeyUp="javascript:this.value=this.value.toUpperCase();" value="<? echo $fetch['mLname']; ?>" size="25"></td>
                          </tr>
                          <tr>
                            <td align="right" valign="top" class="mtext1"><b>ที่อยู่<span class="text">*</span>&nbsp;:&nbsp;</b></td>
                            <td colspan="3" class="mtext1">
                              <textarea name="address" cols="45" rows="10" class="box" onKeyUp="javascript:this.value=this.value.toUpperCase();"><? echo $fetch['mAddress']; ?></textarea></td>
                          </tr>
                          <tr>
                            <td align="right" class="mtext1"><b>รหัสไปรษณีย์<span class="text">*</span> :&nbsp; </b></td>
                            <td colspan="3" class="mtext1"><b>
                              <input name="postalcode" type="text" class="box" onKeyUp="javascript:this.value=this.value.toUpperCase();" value="<? echo $fetch['mPostalcode']; ?>" size="25">
                            </b></td>
                          </tr>
                          <tr>
                            <td align="right" class="mtext1"><b>โทรศัพท์ :&nbsp;</b></td>
                            <td colspan="3" class="mtext1">
                              <b>
                              <input name="telephone" type="text" class="box" id="telephone" onKeyUp="javascript:this.value=this.value.toUpperCase();" value="<? echo $fetch['mTelephone']; ?>" size="25">
                              </b></td>
                          </tr>
                          <tr>
                            <td align="right" class="mtext1"><b>อีเมล์<span class="text">*</span> :&nbsp; </b></td>
                            <td colspan="3" class="mtext1">
                              <b>
                              <input name="email" type="text" class="box" value="<? echo $fetch['mEmail']; ?>" size="25">
                              </b></td>
                          </tr>
                          <tr>
                            <td colspan="4">&nbsp;</td>
                            </tr>
                        </table>
                        </fieldset>                      </td>
                    </tr>
                    <tr>
                      <td valign="top"><br>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
						  <input name="id" type="hidden" id="id" value="<?php echo $_GET['id'] ; ?>">
						  <input name="mID" type="hidden" id="mID" value="<?php echo $_GET['mID'] ; ?>">
                          <input name="flag" type="hidden" id="flag" value="Editmember">
                      <input name="Submit" type="submit" class="aceButton" value="แก้ไขสมาชิก"></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top">&nbsp;</td>
                    </tr>
                  </form>

</table>

    </td>
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
