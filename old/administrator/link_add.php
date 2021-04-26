<?php 
include 'config/isLogon.php' ; 
include '../lib/connect.php' ; 
$db = new mydb;
$flag = $_GET["flag"];
$wID = $_GET["wID"];

if ($flag == "Edit")
{
	$sql = "SELECT * FROM web_link WHERE wID = $wID";
	$result = $db->query($sql);
	$row = mysql_fetch_array($result);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php echo $titles ; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="css/style_text.css" rel="stylesheet" type="text/css">
</head>

<script language="javascript" type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		mode : "exact",
		theme : "advanced",
		elements : "detail",
		plugins : "ibrowser,style,table,advhr,advimage,advlink,preview,contextmenu,paste,directionality,fullscreen,noneditable",
		theme_advanced_buttons1_add_before : "newdocument,separator",
		theme_advanced_buttons1_add : "fontselect,fontsizeselect",
		theme_advanced_buttons2_add : "separator,preview,separator,forecolor,backcolor",
		theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator",
		theme_advanced_buttons3_add_before : "tablecontrols,separator",
		theme_advanced_buttons3_add : "ibrowser,advhr,separator,fullscreen",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_path_location : "bottom",
		content_css : "example_full.css",
	    plugin_insertdate_dateFormat : "%Y-%m-%d",
	    plugin_insertdate_timeFormat : "%H:%M:%S",
		extended_valid_elements : "hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
		external_link_list_url : "example_link_list.js",
		external_image_list_url : "example_image_list.js",
		flash_external_list_url : "example_flash_list.js",
		theme_advanced_resize_horizontal : false,
		theme_advanced_resizing : true
	});

</script>

<script language="JavaScript" type="text/javascript">
function chkExe(exet){
	var i= exet.length-4;
	var e =	exet.substring(i, exet.length);
	return  ( e == '.jpg' || e == 'peg' || e == '.JPG' || e == 'PEG' || e == 'GIF' || e == '.gif' || e == '.GIF');
}


function validateForm()
{

	if (document.form1.url.value == "")
	{
		alert("กรุณากรอกURLครับ.");
		document.form1.url.focus();
		
		return false;
	}

		if(document.form1.bpicture.value != ''){
				if(!(chkExe(document.form1.bpicture.value))){
					alert("คุณสามารถใช้ได้เฉพาะไฟล์ .JPG และ .GIF เท่านั้นครับ");
					document.form1.bpicture.focus();
					return false;
				}
		}
	
	return true;
}
</script>

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
	
	<table width="100%" border="0" cellpadding="3" cellspacing="0" class="boldbodytx">
              <form action="link_function.php" method="post" enctype="multipart/form-data" name="form1" onSubmit="return validateForm();">
                <tr bgcolor="#F9F9F9">
                  <td align="right">URL :</td>
                  <td><input name="url" type="text" id="url" value="<?php echo htmlspecialchars($row["wURL"]); ?>" size="50">
                    <font color="#FF0000"></font></td>
                </tr>
                <tr bgcolor="#F9F9F9">
                  <td align="right">รายละเอียด : </td>
                  <td><textarea name="detail" rows="35" id="detail" style="width: 100%;"><?php echo $row["wDetail"]; ?></textarea></td>
                </tr>
                <tr> 
                  <td align="right"> รูปภาพ : </td>
                  <td> 
                     <input name="bpicture_old" type="hidden" id="bpicture_old"   value="<?php echo $row['wPic']?>">
				
                
				 <?php 
				
				 if ($row['wPic']!="" ) { 
				 check($row['wPic'],"weblink/",88,30,$tooltip)
				 ?>
                    &nbsp;ลบรูปภาพ 
                    <input type="checkbox" name="unlinks" value="<?php echo $row['wPic'] ; ?>" onClick="if(this.checked){document.all.bpicture.style.display='none';}else{document.all.bpicture.style.display='';}">
                    <?php } ?>
                    &nbsp;&nbsp;<font size="2"><br>
                    </font><br>
                    <input name="bpicture" type="file" class="txSmall"  id="bpicture">
                    <br>
                    ( ขนาดรูปไม่ควรเกิน 88x31 pixels. )</font></span></td>
                </tr>
                <tr> 
                  <td align="right">หรือ URL รูปภาพ : </td>
                  <td><input name="urlpic" type="text" id="urlpic" value="<?php echo htmlspecialchars($row["wURLPic"]); ?>" size="50"></td>
                </tr>
                <tr> 
                  <td><input name="Button" type="button" class="aceButton" value="&lt;&lt; Back" onClick="window.location = 'link_mod.php?offset=<?php echo $_REQUEST["offset"]; ?>&limit=<?php echo $_REQUEST["limit"]; ?>';"></td>
                  <td><div> 
                      <input name="offset" type="hidden" id="offset" value="<?php echo $_REQUEST["offset"]; ?>">
                      <input name="limit" type="hidden" id="limit" value="<?php echo $_REQUEST["limit"]; ?>">
                      <input name="flag" type="hidden" id="flag" value="<?php echo $flag; ?>">
                      <input name="wID" type="hidden" id="wID" value="<?php echo $wID; ?>">
                      <input name="Submit" type="submit" class="aceButton" value="Save">
                    </div></td>
                </tr>
              </form>
            </table>
	
	<div align="center" class="menutx"><?php echo $msg ; ?></div></td>
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
