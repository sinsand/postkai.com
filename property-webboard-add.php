<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;

$selectmember1 = "select * from member where  mID = '".$_SESSION["mID"]."'" ; 
$rmember1 = $db->query($selectmember1);
$Rmember1 = mysql_fetch_array($rmember1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>��駡�з������ ������з������</title>
<meta name="Keywords" content="��駡�з������,������з������,����������ѧ�������Ѿ��,��ѧ�������Ѿ��,��ѧ��,����,���,������,��ҹ,��ҹ����ͧ,��ҹ�����,��ҹ�Ѵ���,���ͺ�ҹ����ͧ,���ͷ��Թ,���ͤ͹�������,��¤͹�������,��Ҥ͹�������,����ö¹������ͧ,���ö¹������ͧ,���ö¹��,��ͧ���" />
<meta name="Description" content="��ѧ�������Ѿ�� ��ѧ�� ���� ��� ������ ��ҹ ��ҹ����ͧ ��ҹ����� ��ҹ�Ѵ��� ���ͺ�ҹ����ͧ ���͢�º�ҹ ŧ��С�ȿ�� ��ǹ������� ���ͷ�ǹ������� ��·��Թ" />
<meta name="robots" content="index,follow" />
<meta name="stats-in-th" content="f0f5" />
<link href="<?=$page_link?>/css/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="<?=$page_link?>/favicon.ico" />
<script type="text/javascript" src="<?=$page_link?>/js/checkmember.js"></script>
<script type="text/javascript">
function bookmark(title,url){
	if(window.sidebar){ // ����Ѻ firefox
		window.sidebar.addPanel(title, url, "");
	}else if(window.opera & window.print){ // ����Ѻ opera
		var elem = document.createElement('a');
		elem.setAttribute('href',url);
		elem.setAttribute('title',title);
		elem.setAttribute('rel','sidebar');
		elem.click();
	}else if(document.all){// ����Ѻ ie
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

<!--WEBBOARD-->
<div class="bodywebboard">
<?
if($_SESSION["mID"] == ""){
?>
&nbsp;<p align="center"><strong><font size="4" color="#CC0000">��س��������к� ���� <a href="<?=$page_link?>/��Ѥ���Ҫԡ/register" title="��Ѥ���Ҫԡ">��Ѥ���Ҫԡ</a></font></strong></p>&nbsp;
<?
}else{
?>
&nbsp;<p style="padding-left:40px;"><strong><font size="4"><u>������з������</u></font></strong></p>&nbsp;
<table width="100%" border="0" cellpadding="0">
  <form name="formb" id="formb" action="<?=$page_link?>/property-webboard-function.php" method="post" onsubmit="return checkaddboard();" enctype="multipart/form-data">
  <tr>
    <td height="25" align="right">����&nbsp; :&nbsp;</td>
    <td><strong><?=$Rmember1['mUsername']?></strong></td>
  </tr>
  <tr>
    <td height="25" align="right">���͡��Ǣ�͡�з�� :&nbsp; </td>
    <td>
    <select name="atype" id="atype" class="box">
	<option value="">- ���͡��Ǣ�͡�з�� -</option>
	<option value="1" <? if($_GET['bID'] == "1"){ ?> selected="selected"<? } ?>>House (��ҹ ��ǹ������� �)</option>
	<option value="2" <? if($_GET['bID'] == "2"){ ?> selected="selected"<? } ?>>Condo (�͹� �ŵ �)</option>
	<option value="3" <? if($_GET['bID'] == "3"){ ?> selected="selected"<? } ?>>Building (�Ҥ�� �֡ �)</option>
	<option value="4" <? if($_GET['bID'] == "4"){ ?> selected="selected"<? } ?>>Land (���Թ ���Թ�Ѵ��� �)</option>
	<option value="5" <? if($_GET['bID'] == "5"){ ?> selected="selected"<? } ?>>Rent (��ҹ��� ��ͧ��� �)</option>
	<option value="6" <? if($_GET['bID'] == "6"){ ?> selected="selected"<? } ?>>Funiture (�ػ�ó��觺�ҹ �)</option>
	<option value="7" <? if($_GET['bID'] == "7"){ ?> selected="selected"<? } ?>>Car (ö¹�� ö����ͧ �)</option>
	<option value="8" <? if($_GET['bID'] == "8"){ ?> selected="selected"<? } ?>>Others (��� �)</option>
  </select>
    </td>
  </tr>
  <tr>
    <td width="27%" height="25" align="right">��Ǣ�ͻ�С�� :&nbsp; </td>
    <td width="73%"><input name="atitle" type="text" id="atitle"  onkeyup="javascript:this.value=this.value.toUpperCase();" size="40" class="box" />
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td height="173" align="right">��������´ :&nbsp; </td>
    <td><textarea name="adetail" cols="70" rows="12" id="adetail" onkeyup="javascript:this.value=this.value.toUpperCase();" class="box"></textarea>
<font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td height="24" align="right">�ٻ�Ҿ :&nbsp; </td>
    <td><input name="file1" type="file" class="box" id="file1" size="20" />
      <font color="#CC0000">*</font> <font color="#009900">��Ҵ����Թ 2 MB ���� 500 px. </font></td>
  </tr>
  <tr>
    <td align="right">������ :&nbsp; </td>
    <td>
      <input name="aemail" type="text" id="aemail" size="40" class="box" />
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">����¹�ٻ�Ҿ&nbsp;:&nbsp;</td>
    <td><img src="<?=$page_link?>/verify-images.php" alt="�����ٻ�Ҿ" title="�����ٻ�Ҿ" /></td>
  </tr>
  <tr>
    <td align="right">�����ٻ�Ҿ :&nbsp; </td>
    <td><input name="capts" id="capts" type="text" size="10" onkeyup="javascript:this.value=this.value.toUpperCase();" class="box" />
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
	<input name="flag" id="flag" type="hidden" value="addboard" />
	<input name="mID" id="mID" type="hidden" value="<?=$_SESSION['mID']?>" />
	<input name="Submit" type="submit" value="������з��" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
<?
}
?>
<p align="center"><font color="#CCCCCC">---------------------------------------------------------------------------------------------------------------</font></p>

</div>

<!--FOOTER-->
<div class="footer"><br /><? include "include-footer.php"; ?></div>

</center>
</body>
</html>
