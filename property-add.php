<?php session_start();
include 'lib/connect.php' ; 
//include 'config/isLogon.php' ; 
$db = new mydb ;

$select = "select  *  from member  where mID='".$_SESSION['mID']."'";
$result= $db->query($select) ; 
$row = mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>ŧ��С�� ŧ��С�ȿ�� ��ѧ�������Ѿ��</title>
<meta name="Keywords" content="ŧ��С�ȿ��,��ѧ�������Ѿ��,��ѧ��,����,���,������,��ҹ,��ҹ����ͧ,��ҹ�����,��ҹ�Ѵ���,���ͺ�ҹ����ͧ,���͢�º�ҹ,��ǹ�������,��·��Թ,���ͷ��Թ,����ö¹������ͧ,���ö¹������ͧ,���ö¹��,��ͧ���" />
<meta name="Description" content="ŧ��С�ȿ�� ��ѧ�������Ѿ�� ��ѧ�� ���� ��� ������ ��ҹ ��ҹ����ͧ ��ҹ����� ��ҹ�Ѵ��� ���ͺ�ҹ����ͧ ���͢�º�ҹ ��ǹ������� ���ͷ�ǹ������� ��·��Թ ���ͷ��Թ ��ͧ���" />
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
<img src="<?=$page_link?>/images/property_register.jpg" alt="ŧ��С�ȿ�� ��ѧ�������Ѿ��" title="ŧ��С�ȿ�� ��ѧ�������Ѿ��" /><br />

<div class="alink">
<?
if($_SESSION['mID'] != "")
{
?>
<p class="txtbold">ŧ��С�ȿ����ѧ�������Ѿ��</p>
<strong> ŧ��С�ȿ�� ,��ѧ�������Ѿ�� ,���� ,��� ,������ ,��ҹ, �͹� ,���Թ ,�Ҥ�� ,��������� ,��ҹ��� ,��������� ,ö¹�� , ��� � </strong><br /><br />
<form name="formadd" id="formadd" action="<?=$page_link?>/property-function.php" method="post" onsubmit="return checkaddjob();" enctype="multipart/form-data">
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><font color="#CC0000">**</font></strong>&nbsp;��سҡ�͡���������ú�ء��ͧ���ͼŻ���ª��ҡ��û�С�����ʶҹ����õԴ��ͧ͢��ҹ</td>
    </tr>
  <tr>
    <td width="27%">&nbsp;</td>
    <td width="73%">&nbsp;</td>
  </tr>
  
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="27" align="right">��������ѧ�� :&nbsp; </td>
    <td>
	<select name="aatype" id="aatype" class="box">
	<option value="">- ��س����͡������ -</option>
	<option value="1">����</option>
	<option value="2">���</option>
	<option value="3">������</option>
  </select>	</td>
  </tr>
  <tr>
    <td align="right"></td>
    <td>
	<select name="atype" id="atype" class="box">
	<option value="">- ��س����͡������ -</option>
	<option value="1">House (��ҹ ��ǹ������� �)</option>
	<option value="2">Condo (�͹� �ŵ �)</option>
	<option value="3">Building (�Ҥ�� �֡ �)</option>
	<option value="4" >Land (���Թ ���Թ�Ѵ��� �)</option>
	<option value="5">Rent (��ҹ��� ��ͧ��� �)</option>
	<option value="6">Funiture (�ػ�ó��觺�ҹ �)</option>
	<option value="7">Car (ö¹�� ö����ͧ �)</option>
	<option value="8" >Others (��� �)</option>
  </select>
	<font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td height="27" align="right">�ѧ��Ѵ : </td>
    <td><select name="aprovince" id="aprovince" tabindex="26" style="width: 175px" class="box">
	<option selected="selected" value=""> - ��س����͡�ѧ��Ѵ - </option>
	<option value="��к��">��к��</option>
	<option value="��ا෾��ҹ��">��ا෾��ҹ��</option>
	<option value="�ҭ������">�ҭ������</option>
	<option value="����Թ���">����Թ���</option>
	<option value="��ᾧྪ�">��ᾧྪ�</option>
	<option value="�͹��">�͹��</option>
	<option value="�ѹ�����">�ѹ�����</option>
	<option value="���ԧ���">���ԧ���</option>
	<option value="�ź���">�ź���</option>
	<option value="��¹ҷ">��¹ҷ</option>
	<option value="�������">�������</option>
	<option value="�����">�����</option>
	<option value="��§���">��§���</option>
	<option value="��§����">��§����</option>
	<option value="��ѧ">��ѧ</option>
	<option value="��Ҵ">��Ҵ</option>
	<option value="�ҡ">�ҡ</option>
	<option value="��ù�¡">��ù�¡</option>
	<option value="��û��">��û��</option>
	<option value="��þ��">��þ��</option>
	<option value="����Ҫ����">����Ҫ����</option>
	<option value="�����ո����Ҫ">�����ո����Ҫ</option>
	<option value="������ä�">������ä�</option>
	<option value="�������">�������</option>
	<option value="��Ҹ����">��Ҹ����</option>
	<option value="��ҹ">��ҹ</option>
	<option value="���������">���������</option>
	<option value="�����ҹ�">�����ҹ�</option>
	<option value="��ШǺ���բѹ��">��ШǺ���բѹ��</option>
	<option value="��Ҩչ����">��Ҩչ����</option>
	<option value="�ѵ�ҹ�">�ѵ�ҹ�</option>
	<option value="��й�������ظ��">��й�������ظ��</option>
	<option value="�����">�����</option>
	<option value="�ѧ��">�ѧ��</option>
	<option value="�ѷ�ا">�ѷ�ا</option>
	<option value="�ԨԵ�">�ԨԵ�</option>
	<option value="��ɳ��š">��ɳ��š</option>
	<option value="ྪú���">ྪú���</option>
	<option value="ྪú�ó�">ྪú�ó�</option>
	<option value="���">���</option>
	<option value="����">����</option>
	<option value="�����ä��">�����ä��</option>
	<option value="�ء�����">�ء�����</option>
	<option value="�����ͧ�͹">�����ͧ�͹</option>
	<option value="��ʸ�">��ʸ�</option>
	<option value="����">����</option>
	<option value="�������">�������</option>
	<option value="�йͧ">�йͧ</option>
	<option value="���ͧ">���ͧ</option>
	<option value="�Ҫ����">�Ҫ����</option>
	<option value="ž����">ž����</option>
	<option value="�ӻҧ">�ӻҧ</option>
	<option value="�Ӿٹ">�Ӿٹ</option>
	<option value="���">���</option>
	<option value="�������">�������</option>
	<option value="ʡŹ��">ʡŹ��</option>
	<option value="ʧ���">ʧ���</option>
	<option value="ʵ��">ʵ��</option>
	<option value="��طû�ҡ��">��طû�ҡ��</option>
	<option value="��ط�ʧ����">��ط�ʧ����</option>
	<option value="��ط��Ҥ�">��ط��Ҥ�</option>
	<option value="������">������</option>
	<option value="��к���">��к���</option>
	<option value="�ԧ�����">�ԧ�����</option>
	<option value="��⢷��">��⢷��</option>
	<option value="�ؾ�ó����">�ؾ�ó����</option>
	<option value="����ɯ��ҹ�">����ɯ��ҹ�</option>
	<option value="���Թ���">���Թ���</option>
	<option value="˹ͧ���">˹ͧ���</option>
	<option value="˹ͧ�������">˹ͧ�������</option>
	<option value="�غ��Ҫ�ҹ�">�غ��Ҫ�ҹ�</option>
	<option value="��ҧ�ͧ">��ҧ�ͧ</option>
	<option value="�ӹҨ��ԭ">�ӹҨ��ԭ</option>
	<option value="�شøҹ�">�شøҹ�</option>
	<option value="�صôԵ��">�صôԵ��</option>
	<option value="�ط�¸ҹ�">�ط�¸ҹ�</option>
</select>	</td>
  </tr>
  <tr>
    <td height="25" align="right">��Ǣ�ͻ�С�� :&nbsp; </td>
    <td><input name="atitle" type="text" id="atitle"  onkeyup="javascript:this.value=this.value.toUpperCase();" size="40" class="box" />
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td height="18" align="right">�Ҥ� :&nbsp; </td>
    <td>
	<input name="aprice"  id="aprice" type="text" size="20" maxlength="30" class="box" />
      &nbsp;�ҷ&nbsp; <font color="#CC0000">*</font> <font color="#009900">����ͧ�������ͧ���� , �ӡѺ</font></td>
  </tr>
  <tr>
    <td height="173" align="right">��������´ :&nbsp; </td>
    <td><textarea name="adetail" cols="70" rows="12" id="adetail" onkeyup="javascript:this.value=this.value.toUpperCase();" class="box"></textarea>
<font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td height="24" align="right">�ٻ�Ҿ 1 :&nbsp; </td>
    <td><input name="file1" type="file" class="box" id="file1" size="20" />
      <font color="#CC0000">*</font> <font color="#009900">��Ҵ����Թ 2 MB ���� 500 px. </font></td>
  </tr>
  <tr>
    <td height="24" align="right">�ٻ�Ҿ 2 :&nbsp; </td>
    <td><input name="file2" type="file" class="box" id="file2" size="20" />
	<font color="#CC0000">*</font> <font color="#009900">��Ҵ����Թ 2 MB ���� 500 px.</font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>
      <input type="checkbox" name="Show" id="showdata" onClick="return clickpersonal();" />
      ������������Ѥ���Ҫԡ    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="26" align="right">�ӹ�˹�� :&nbsp; </td>
    <td>
	<select name="ctitle" id="ctitle" onChange="if(document.getElementById('ctitle').value==1){document.getElementById('ctitletxt').innerHTML='<input name=ctitles id=ctitles type=text size=10 onkeyup=javascript:this.value=this.value.toUpperCase(); class=box>';}else{document.getElementById('ctitletxt').innerHTML='';}" class="box">
	<option value="���">���</option>
	<option value="�ҧ">�ҧ</option>
	<option value="�ҧ���">�ҧ���</option>
	<option value="1" >��� �</option>
  </select>	&nbsp;&nbsp;<label id='ctitletxt'></label></td>
  </tr>
  <tr>
    <td align="right">���� - ���ʡ�� :&nbsp; </td>
    <td><input name="cname" type="text" id="cname"  onkeyup="javascript:this.value=this.value.toUpperCase();" size="40" class="box" />
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td align="right">������� :&nbsp; </td>
    <td><textarea name="caddress" cols="65" rows="6" id="caddress" onkeyup="javascript:this.value=this.value.toUpperCase();" class="box"></textarea>
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td align="right">�������Ѿ�� :&nbsp; </td>
    <td>
      <input name="ctelephone" type="text" id="ctelephone" onkeyup="javascript:this.value=this.value.toUpperCase();" size="40" class="box" />
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">������ :&nbsp; </td>
    <td>
      <input name="cemail" type="text" id="cemail" size="40" class="box" />
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">����¹�ٻ�Ҿ&nbsp;:&nbsp;</td>
    <td><img src="<?=$page_link?>/verify-images.php" alt="�����ٻ�Ҿ" title="�����ٻ�Ҿ" /></td>
  </tr>
  <tr>
    <td align="right">�����ٻ�Ҿ:&nbsp; </td>
    <td><input name="capts" id="capts" type="text" size="25" onkeyup="javascript:this.value=this.value.toUpperCase();" class="box" />
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
	<input name="flag" id="flag" type="hidden" value="addjob" />
	<input name="ctitle1" id="ctitle1" type="hidden" value="<? echo $row['mTitle']; ?>" />
	<input name="cnames" id="cnames" type="hidden" value="<? echo $row['mName']." ".$row['mLname']; ?>" />
	<input name="caddresss" id="caddresss" type="hidden" value="<? echo $row['mAddress']."  ".$row['mPostalcode']; ?>" />
	<input name="ctelephones" id="ctelephones" type="hidden" value="<? echo $row['mTelephone']; ?>" />
	<input name="cemails" id="cemails" type="hidden" value="<? echo $row['mEmail']; ?>" />
	<input name="Submit" type="submit" value="  ŧ��С��  " /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

<?
}
else
{
?>
<p class="txtbold">ŧ��С�ȿ����ѧ�������Ѿ��</p>
<strong> ŧ��С�ȿ�� ,��ѧ�������Ѿ�� ,���� ,��� ,������ ,��ҹ, �͹� ,���Թ ,�Ҥ�� ,��������� ,��ҹ��� ,��������� ,ö¹�� , ��� � </strong><br /><br /><br />
<p align="center"><strong><font color="#CC0000" size="4">��ҹ�ѧ������������к�&nbsp;��س��������к�!</font></strong></p>
<?
}
?>

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
