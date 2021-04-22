<?php session_start();
session_register("titles");
$titles = ".:: Administrator ::.";
?> 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $titles ; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="css/style_text.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=JavaScript>
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

				function  validForm() {
			if(emptyField(document.form1.user)){
				alert("กรุณากรอกชื่อล็อกอิน");
				document.form1.user.focus();
				return false;
			}	
						if(emptyField(document.form1.pass)){
				alert("กรุณากรอกรหัสผ่าน");
				document.form1.pass.focus();
				return false;
			}	
			

return true;
}


</script>
<? 
error_reporting (E_ALL ^ E_NOTICE);
$msg = $_GET['msg'] ; ?>
<body <? if($msg !=''){?> onLoad="alert('<? echo $msg ; ?>')"<? } ?> >

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td align="center" valign="middle">
<table width="483" height="241" border="0" cellpadding="0" cellspacing="0">
       <tr>
          <td align="center" class="contentbody"><font color="#464646" size="8"><img src="images/admin_key.gif" width="51" height="51">ผู้ดูแลระบบ</font>			</td>
        </tr>
        <tr> 
          <td valign="top"><table width="93%" border="0" cellspacing="0" cellpadding="0">
               <form action="login_function.php"  method="post" name="form1" onSubmit="return validForm();">
			  
			  <tr> 
                <td width="39%" class="contenttx"><div align="right"></div></td>
                <td width="61%" class="contenttx">&nbsp;</td>
              </tr>
              <tr> 
                <td height="30" class="contentbody"><div align="right"><strong><font color="#464646">ชื่อล็อกอิน:</font>&nbsp;&nbsp;</strong></div></td>
                <td height="30" class="contenttx"> <div align="left">
                    <font face="MS Sans Serif, Microsoft Sans Serif" size="2" color="#FF0000">
                    <input style="width: 150px" name="user" type="text" >
                    </font> </div></td>
              </tr>
              <tr> 
                <td height="30" class="contentbody"><div align="right"><strong><font color="#464646">รหัสผ่าน:</font>&nbsp;&nbsp;</strong></div></td>
                <td height="30" class="contenttx"> <div align="left">
                    <input style="width: 150px" name="pass" type="password">
                  </div></td>
              </tr>
              <tr> 
                <td class="contenttx">&nbsp;</td>
                <td class="contenttx">&nbsp;</td>
              </tr>
              <tr> 
                <td class="contenttx"> <div align="right">&nbsp; </div></td>
                  <td class="contenttx"> 
                    <input name="Submit" type="submit" style="border-style:none" value=" เข้าสู่ระบบ ">
                    &nbsp; <input name="Submit2" type="reset" style="border-style:none" value=" ยกเลิก ">
                    <input name="flag" type="hidden" value="login"> </td>
              </tr>
              <tr>
                <td class="contenttx">&nbsp;</td>
                <td class="contenttx">&nbsp;</td>
              </tr>
			  </form>
			  
            </table></td>
        </tr>
      </table> 
    </td>
  </tr>
  <tr valign="top"> 
    <td></td>
  </tr>
  <tr align="center" valign="top"> 
    <td height="23"></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
