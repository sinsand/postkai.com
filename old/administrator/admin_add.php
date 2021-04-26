<?php include 'config/isLogon.php' ; 
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
<SCRIPT language=JavaScript>
<!--
function chkExe(exet){
	var i= exet.length-4;
	var e =	exet.substring(i, exet.length);
	return  (e.toLowerCase() == '.gif' || e.toLowerCase() == '.jpg' || e.toLowerCase() == 'jpeg' );
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
	function  validForm() {
            
			if(emptyField(document.form1.name)){
				alert("กรุณากรอกชื่อ");
				document.form1.name.focus();
				return false;
			}
					if(emptyField(document.form1.lastname)){
				alert("กรุณากรอกนามสกุล");
				document.form1.lastname.focus();
				return false;
			}

				if (emptyField(document.form1.username)){
				alert("กรุณากรอกชื่อล็อกอิน");
				document.form1.username.focus();
				return false;
		}				
			if (emptyField(document.form1.password)){
				alert("กรุณากรอกรหัสผ่าน");
				document.form1.password.focus();
				return false;
		}	
return true;
}																														//end function()
//-->
</script>
<?php 
error_reporting (E_ALL ^ E_NOTICE);
$flag = $_GET["flag"];
$aID = $_GET["aID"] ; 
$offset = $_GET["offset"];
$limit = $_GET["limit"] ;


if($flag == 'Edit'){
	 $select = "select  *  from  admin  where aID='$aID'";
 $result= $db->query($select) ; 
 $row = mysql_fetch_array($result);

} ?>

<body>

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td height="70" colspan="3" class="contentbody"><font color="#464646" size="8">ผู้ดูแลระบบ</font></td>
  </tr>
  <tr> 
    <td width="160" align="left" valign="top">
<?php include ('include_menu.php') ; ?></td>
    <td width="10" align="left" valign="top"><img src="images/spacer.gif" width="10" height="100"></td>
    <td width="100%" align="left" valign="top"> 
	
	<table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="108%" valign="top" class="boldbodytx">เพิ่มผู้ดูแลระบบ</td>
        </tr>
        <tr>
          <td valign="top"> 
            <table width="100%" border="0" cellpadding="3" cellspacing="1">
              <form action="admin_function.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return validForm();">
                <tr class="boldbodytx"> 
                  <td width="23%" height="30" valign="middle"><div align="right">ชื่อ 
                      : </div></td>
                  <td width="77%" valign="middle" class="textbody"> <input name="name" type="text" id="name" value="<?php echo htmlspecialchars($row['aName']); ?>" size="30"> 
                    &nbsp;<span class="boldbodytx">*</span> </td>
                </tr>
                <tr class="boldbodytx"> 
                  <td height="30" valign="middle"><div align="right"> นามสกุล 
                      :</div></td>
                  <td><input name="lastname" type="text" id="lastname" value="<?php echo htmlspecialchars($row['aSurname']); ?>" size="30"> 
                    <span class="boldbodytx"> &nbsp;*</span> </td>
                </tr>
                <tr class="boldbodytx"> 
                  <td height="35"><div align="right"> ชื่อล็อกอิน :</div></td>
                  <td height="35"><input name="username" type="text" id="username" value="<?php echo $row['aUsername']; ?>" size="30"> 
                    &nbsp;<span class="boldbodytx">*</span> </td>
                </tr>
                <tr class="boldbodytx"> 
                  <td height="30" valign="middle"><div align="right"> รหัสผ่าน 
                      :</div></td>
                  <td valign="middle" class="textbody"> <input name="password" type="text" id="password"  size="30" value="<?php echo $row['aPassword'] ; ?>"> 
                    &nbsp;<span class="boldbodytx">*</span> </td>
                </tr>
                <?php if ($_SESSION['aAdmin'] == "1" || $_SESSION['aAdmin'] == "2" ){ 
				if($aID !='1'){
				?>
                <tr> 
                  <? }} ?>
                  <td height="35"><input name="Button" type="button" class="aceButton" onClick="window.history.back();" value="&lt;&lt; กลับ"></td>
                  <td height="35"> <div align="left"> 
                      <?php if($flag == "Edit"){ ?>
                      <input name="offset" type="hidden" id="offset" value="<?php echo $offset ; ?>">
                      <input name="limit" type="hidden" id="limit" value="<?php echo $limit ; ?>">
                      <input name="aID" type="hidden" id="aID" value="<?php echo $row['aID'] ; ?>">
                      <input type="hidden" name="flag" value="Edit">
                      <?php }else{?>
                      <input type="hidden" name="flag" value="Add">
                      <input name="offset" type="hidden" id="offset" value="<?php echo 0 ; ?>">
                      <input name="limit" type="hidden" id="limit" value="<?php echo 25 ; ?>">
                      <?php }?>
                      <input name="Submit" type="submit" class="aceButton" value=" บันทึก ">
                    </div></td>
                </tr>
              </form>
            </table></td>
        </tr>
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
<?php 
$db->close() ;
 ?>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
