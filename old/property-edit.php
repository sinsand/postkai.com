<?php session_start();
include 'lib/connect.php' ; 
//include 'config/isLogon.php' ; 
$db = new mydb ;

$selectm = "select  *  from member  where mID='".$_SESSION['mID']."'";
$resultm= $db->query($selectm) ; 
$rowm = mysql_fetch_array($resultm);

$sql = "SELECT * FROM sb_job where mID = '".$_SESSION['mID']."' and jID='".$_GET['jID']."'";
$result = $db->query($sql);
$row = mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>�����ѧ�������Ѿ�� ŧ��С�ȿ�� ��ѧ�������Ѿ��</title>
<meta name="Keywords" content="��ѧ�������Ѿ��,��ѧ��,����,���,������,��ҹ,��ҹ����ͧ,��ҹ�����,��ҹ�Ѵ���,���ͺ�ҹ����ͧ,���͢�º�ҹ,ŧ��С�ȿ��,��ǹ�������,���ͷ�ǹ�������,��·��Թ,���ͷ��Թ,���ͤ͹�������,��¤͹�������,��Ҥ͹�������,����ö¹������ͧ,���ö¹������ͧ,���ö¹��,��ͧ���" />
<meta name="Description" content="��ѧ�������Ѿ�� ��ѧ�� ���� ��� ������ ��ҹ ��ҹ����ͧ ��ҹ����� ��ҹ�Ѵ��� ���ͺ�ҹ����ͧ ���͢�º�ҹ ŧ��С�ȿ�� ��ǹ������� ���ͷ�ǹ������� ��·��Թ ���ͷ��Թ ���ͤ͹������� ��¤͹������� ��Ҥ͹������� ����ö¹������ͧ ���ö¹������ͧ ���ö¹�� ��ͧ���" />
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
<body onload="document.getElementById('word-search').focus();<?php if($row['jc_Title'] != '���' && $row['jc_Title'] != '�ҧ' && $row['jc_Title'] != '�ҧ���') { ?>document.formadd.title.value=1;<?php } ?>if(document.formadd.title.value==1){document.getElementById('ctitletxt').innerHTML='<input name=title type=text size=10 value=<?php echo $row['jc_Title'] ; ?>  onkeyup=javascript:this.value=this.value.toUpperCase(); id=titles>';}else{document.getElementById('ctitletxt').innerHTML='';}">
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
<p class="txtbold">��䢢�������ѧ�������Ѿ��</p>
<strong>ŧ��С�ȿ��&nbsp;,��ѧ�������Ѿ��&nbsp;,����&nbsp;,���&nbsp;,������&nbsp;,��ҹ�����&nbsp;,��ҹ�Ѵ���&nbsp;,��ҹ����ͧ&nbsp;,��ǹ�������&nbsp;,�͹�&nbsp;,���Թ&nbsp;,�Ҥ��&nbsp;,���������&nbsp;,��ҹ���&nbsp;,��ͧ���&nbsp;,ö¹��&nbsp;,ö¹������ͧ</strong><br /><br />
<?


	$titleall = str_replace(' ','-', $row['jTitle']);
	
	if($row['jType'] == "1")
	{
		$cat_type = "��ҹ-��ҹ�Ѵ���-��ҹ�����-��ҹ����ͧ";
	}
	if($row['jType'] == "2")
	{
		$cat_type = "�͹�-�͹�������-�Ҥ�êش";
	}
	if($row['jType'] == "3")
	{
		$cat_type = "�֡-�Ҥ�þҹԪ��-�ç�ҹ-⡴ѧ";
	}
	if($row['jType'] == "4")
	{
		$cat_type = "���Թ����-���Թ�Ѵ���-���Թ";
	}
	if($row['jType'] == "5")
	{
		$cat_type = "�Ҥ�����-��ͧ���-��ҹ���";
	}
	if($row['jType'] == "6")
	{
		$cat_type = "�ػ��쵡�觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-������";
	}
	if($row['jType'] == "7")
	{
		$cat_type = "ö¹��-ö����ͧ";
	}
	if($row['jType'] == "8")
	{
		$cat_type = "ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ";
	}
?>

<form name="formadd" id="formadd" action="<?=$page_link?>/property-function.php" method="post" onsubmit="return checkaddjob();" enctype="multipart/form-data">
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><font color="#CC0000">**</font></strong>&nbsp;��سҡ�͡���������ú�ء��ͧ���ͼŻ���ª��ҡ��û�С�����ʶҹ����õԴ��ͧ͢��ҹ</td>
    </tr>
  <tr>
    <td width="30%">&nbsp;</td>
    <td width="70%">&nbsp;</td>
  </tr>
  
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="27" align="right">��������ѧ��� :&nbsp; </td>
    <td>
	<select name="aatype" id="aatype" class="box">
	<option value="">- ��س����͡������ -</option>
	<option value="1" <? if($row['jaType'] == "1"){ ?> selected="selected"<? } ?>>����</option>
	<option value="2" <? if($row['jaType'] == "2"){ ?> selected="selected"<? } ?>>���</option>
	<option value="3" <? if($row['jaType'] == "3"){ ?> selected="selected"<? } ?>>������</option>
  </select>	</td>
  </tr>
  <tr>
    <td align="right"></td>
    <td>
	<select name="atype" id="atype" class="box">
	<option value="">- ��س����͡������ -</option>
	<option value="1" <? if($row['jType'] == "1"){ ?> selected="selected"<? } ?>>House (��ҹ ��ǹ������� �)</option>
	<option value="2" <? if($row['jType'] == "2"){ ?> selected="selected"<? } ?>>Condo (�͹� �ŵ �)</option>
	<option value="3" <? if($row['jType'] == "3"){ ?> selected="selected"<? } ?>>Building (�Ҥ�� �֡ �)</option>
	<option value="4"  <? if($row['jType'] == "4"){ ?> selected="selected"<? } ?>>Land (���Թ ���Թ�Ѵ��� �)</option>
	<option value="5" <? if($row['jType'] == "5"){ ?> selected="selected"<? } ?>>Rent (��ҹ��� ��ͧ��� �)</option>
	<option value="6" <? if($row['jType'] == "6"){ ?> selected="selected"<? } ?>>Funiture (�ػ�ó��觺�ҹ �)</option>
	<option value="7" <? if($row['jType'] == "7"){ ?> selected="selected"<? } ?>>Car (ö¹�� ö����ͧ �)</option>
	<option value="8"  <? if($row['jType'] == "8"){ ?> selected="selected"<? } ?>>Others (��� �)</option>
  </select>
	<font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td height="27" align="right">�ѧ��Ѵ : </td>
    <td><select name="aprovince" id="aprovince" tabindex="26" style="width: 175px" class="box">
	<option selected="selected" value=""> - ��س����͡�ѧ��Ѵ - </option>
	<option value="��к��"<? if($row['jProvince'] == "��к��"){ ?>  selected="selected"<? } ?>>��к��</option>
	<option value="��ا෾��ҹ��"<? if($row['jProvince'] == "��ا෾��ҹ��"){ ?>  selected="selected"<? } ?>>��ا෾��ҹ��</option>
	<option value="�ҭ������"<? if($row['jProvince'] == "�ҭ������"){ ?>  selected="selected"<? } ?>>�ҭ������</option>
	<option value="����Թ���"<? if($row['jProvince'] == "����Թ���"){ ?>  selected="selected"<? } ?>>����Թ���</option>
	<option value="��ᾧྪ�"<? if($row['jProvince'] == "��ᾧྪ�"){ ?> selected="selected"<? } ?>>��ᾧྪ�</option>
	<option value="�͹��"<? if($row['jProvince'] == "�͹��"){ ?> selected="selected"<? } ?>>�͹��</option>
	<option value="�ѹ�����"<? if($row['jProvince'] == "�ѹ�����"){ ?> selected="selected"<? } ?>>�ѹ�����</option>
	<option value="���ԧ���"<? if($row['jProvince'] == "���ԧ���"){ ?> selected="selected"<? } ?>>���ԧ���</option>
	<option value="�ź���"<? if($row['jProvince'] == "�ź���"){ ?> selected="selected"<? } ?>>�ź���</option>
	<option value="��¹ҷ"<? if($row['jProvince'] == "��¹ҷ"){ ?> selected="selected"<? } ?>>��¹ҷ</option>
	<option value="�������"<? if($row['jProvince'] == "�������"){ ?> selected="selected"<? } ?>>�������</option>
	<option value="�����"<? if($row['jProvince'] == "�����"){ ?> selected="selected"<? } ?>>�����</option>
	<option value="��§���"<? if($row['jProvince'] == "��§���"){ ?> selected="selected"<? } ?>>��§���</option>
	<option value="��§����"<? if($row['jProvince'] == "��§����"){ ?> selected="selected"<? } ?>>��§����</option>
	<option value="��ѧ"<? if($row['jProvince'] == "��ѧ"){ ?> selected="selected"<? } ?>>��ѧ</option>
	<option value="��Ҵ"<? if($row['jProvince'] == "��Ҵ"){ ?> selected="selected"<? } ?>>��Ҵ</option>
	<option value="�ҡ"<? if($row['jProvince'] == "�ҡ"){ ?> selected="selected"<? } ?>>�ҡ</option>
	<option value="��ù�¡"<? if($row['jProvince'] == "��ù�¡"){ ?> selected="selected"<? } ?>>��ù�¡</option>
	<option value="��û��"<? if($row['jProvince'] == "��û��"){ ?> selected="selected"<? } ?>>��û��</option>
	<option value="��þ��"<? if($row['jProvince'] == "��þ��"){ ?> selected="selected"<? } ?>>��þ��</option>
	<option value="����Ҫ����"<? if($row['jProvince'] == "����Ҫ����"){ ?> selected="selected"<? } ?>>����Ҫ����</option>
	<option value="�����ո����Ҫ"<? if($row['jProvince'] == "�����ո����Ҫ"){ ?> selected="selected"<? } ?>>�����ո����Ҫ</option>
	<option value="������ä�"<? if($row['jProvince'] == "������ä�"){ ?> selected="selected"<? } ?>>������ä�</option>
	<option value="�������"<? if($row['jProvince'] == "�������"){ ?> selected="selected"<? } ?>>�������</option>
	<option value="��Ҹ����"<? if($row['jProvince'] == "��Ҹ����"){ ?> selected="selected"<? } ?>>��Ҹ����</option>
	<option value="��ҹ"<? if($row['jProvince'] == "��ҹ"){ ?> selected="selected"<? } ?>>��ҹ</option>
	<option value="���������"<? if($row['jProvince'] == "���������"){ ?> selected="selected"<? } ?>>���������</option>
	<option value="�����ҹ�"<? if($row['jProvince'] == "�����ҹ�"){ ?> selected="selected"<? } ?>>�����ҹ�</option>
	<option value="��ШǺ���բѹ��"<? if($row['jProvince'] == "��ШǺ���բѹ��"){ ?> selected="selected"<? } ?>>��ШǺ���բѹ��</option>
	<option value="��Ҩչ����"<? if($row['jProvince'] == "��Ҩչ����"){ ?> selected="selected"<? } ?>>��Ҩչ����</option>
	<option value="�ѵ�ҹ�"<? if($row['jProvince'] == "�ѵ�ҹ�"){ ?> selected="selected"<? } ?>>�ѵ�ҹ�</option>
	<option value="��й�������ظ��"<? if($row['jProvince'] == "��й�������ظ��"){ ?> selected="selected"<? } ?>>��й�������ظ��</option>
	<option value="�����"<? if($row['jProvince'] == "�����"){ ?> selected="selected"<? } ?>>�����</option>
	<option value="�ѧ��"<? if($row['jProvince'] == "�ѧ��"){ ?> selected="selected"<? } ?>>�ѧ��</option>
	<option value="�ѷ�ا"<? if($row['jProvince'] == "�ѷ�ا"){ ?> selected="selected"<? } ?>>�ѷ�ا</option>
	<option value="�ԨԵ�"<? if($row['jProvince'] == "�ԨԵ�"){ ?> selected="selected"<? } ?>>�ԨԵ�</option>
	<option value="��ɳ��š"<? if($row['jProvince'] == "��ɳ��š"){ ?> selected="selected"<? } ?>>��ɳ��š</option>
	<option value="ྪú���"<? if($row['jProvince'] == "ྪú���"){ ?> selected="selected"<? } ?>>ྪú���</option>
	<option value="ྪú�ó�"<? if($row['jProvince'] == "ྪú�ó�"){ ?> selected="selected"<? } ?>>ྪú�ó�</option>
	<option value="���"<? if($row['jProvince'] == "���"){ ?> selected="selected"<? } ?>>���</option>
	<option value="����"<? if($row['jProvince'] == "����"){ ?> selected="selected"<? } ?>>����</option>
	<option value="�����ä��"<? if($row['jProvince'] == "�����ä��"){ ?> selected="selected"<? } ?>>�����ä��</option>
	<option value="�ء�����"<? if($row['jProvince'] == "�ء�����"){ ?> selected="selected"<? } ?>>�ء�����</option>
	<option value="�����ͧ�͹"<? if($row['jProvince'] == "�����ͧ�͹"){ ?> selected="selected"<? } ?>>�����ͧ�͹</option>
	<option value="��ʸ�"<? if($row['jProvince'] == "��ʸ�"){ ?> selected="selected"<? } ?>>��ʸ�</option>
	<option value="����"<? if($row['jProvince'] == "����"){ ?> selected="selected"<? } ?>>����</option>
	<option value="�������"<? if($row['jProvince'] == "�������"){ ?> selected="selected"<? } ?>>�������</option>
	<option value="�йͧ"<? if($row['jProvince'] == "�йͧ"){ ?> selected="selected"<? } ?>>�йͧ</option>
	<option value="���ͧ"<? if($row['jProvince'] == "���ͧ"){ ?> selected="selected"<? } ?>>���ͧ</option>
	<option value="�Ҫ����"<? if($row['jProvince'] == "�Ҫ����"){ ?> selected="selected"<? } ?>>�Ҫ����</option>
	<option value="ž����"<? if($row['jProvince'] == "ž����"){ ?> selected="selected"<? } ?>>ž����</option>
	<option value="�ӻҧ"<? if($row['jProvince'] == "�ӻҧ"){ ?> selected="selected"<? } ?>>�ӻҧ</option>
	<option value="�Ӿٹ"<? if($row['jProvince'] == "�Ӿٹ"){ ?> selected="selected"<? } ?>>�Ӿٹ</option>
	<option value="���"<? if($row['jProvince'] == "���"){ ?> selected="selected"<? } ?>>���</option>
	<option value="�������"<? if($row['jProvince'] == "�������"){ ?> selected="selected"<? } ?>>�������</option>
	<option value="ʡŹ��"<? if($row['jProvince'] == "ʡŹ��"){ ?> selected="selected"<? } ?>>ʡŹ��</option>
	<option value="ʧ���"<? if($row['jProvince'] == "ʧ���"){ ?> selected="selected"<? } ?>>ʧ���</option>
	<option value="ʵ��"<? if($row['jProvince'] == "ʵ��"){ ?> selected="selected"<? } ?>>ʵ��</option>
	<option value="��طû�ҡ��"<? if($row['jProvince'] == "��طû�ҡ��"){ ?> selected="selected"<? } ?>>��طû�ҡ��</option>
	<option value="��ط�ʧ����"<? if($row['jProvince'] == "��ط�ʧ����"){ ?> selected="selected"<? } ?>>��ط�ʧ����</option>
	<option value="��ط��Ҥ�"<? if($row['jProvince'] == "��ط��Ҥ�"){ ?> selected="selected"<? } ?>>��ط��Ҥ�</option>
	<option value="������"<? if($row['jProvince'] == "������"){ ?> selected="selected"<? } ?>>������</option>
	<option value="��к���"<? if($row['jProvince'] == "��к���"){ ?> selected="selected"<? } ?>>��к���</option>
	<option value="�ԧ�����"<? if($row['jProvince'] == "�ԧ�����"){ ?> selected="selected"<? } ?>>�ԧ�����</option>
	<option value="��⢷��"<? if($row['jProvince'] == "��⢷��"){ ?> selected="selected"<? } ?>>��⢷��</option>
	<option value="�ؾ�ó����"<? if($row['jProvince'] == "�ؾ�ó����"){ ?> selected="selected"<? } ?>>�ؾ�ó����</option>
	<option value="����ɯ��ҹ�"<? if($row['jProvince'] == "����ɯ��ҹ�"){ ?> selected="selected"<? } ?>>����ɯ��ҹ�</option>
	<option value="���Թ���"<? if($row['jProvince'] == "���Թ���"){ ?> selected="selected"<? } ?>>���Թ���</option>
	<option value="˹ͧ���"<? if($row['jProvince'] == "˹ͧ���"){ ?> selected="selected"<? } ?>>˹ͧ���</option>
	<option value="˹ͧ�������"<? if($row['jProvince'] == "˹ͧ�������"){ ?> selected="selected"<? } ?>>˹ͧ�������</option>
	<option value="�غ��Ҫ�ҹ�"<? if($row['jProvince'] == "�غ��Ҫ�ҹ�"){ ?> selected="selected"<? } ?>>�غ��Ҫ�ҹ�</option>
	<option value="��ҧ�ͧ"<? if($row['jProvince'] == "��ҧ�ͧ"){ ?> selected="selected"<? } ?>>��ҧ�ͧ</option>
	<option value="�ӹҨ��ԭ"<? if($row['jProvince'] == "�ӹҨ��ԭ"){ ?> selected="selected"<? } ?>>�ӹҨ��ԭ</option>
	<option value="�شøҹ�"<? if($row['jProvince'] == "�شøҹ�"){ ?> selected="selected"<? } ?>>�شøҹ�</option>
	<option value="�صôԵ��"<? if($row['jProvince'] == "�صôԵ��"){ ?> selected="selected"<? } ?>>�صôԵ��</option>
	<option value="�ط�¸ҹ�"<? if($row['jProvince'] == "�ط�¸ҹ�"){ ?> selected="selected"<? } ?>>�ط�¸ҹ�</option>
</select>	</td>
  </tr>
  <tr>
    <td height="25" align="right">��Ǣ�ͻ�С�� :&nbsp; </td>
    <td><input name="atitle" type="text" id="atitle"  onkeyup="javascript:this.value=this.value.toUpperCase();" size="40" value="<?=$row['jTitle']?>" class="box" />
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td height="18" align="right">�Ҥ� :&nbsp; </td>
    <td>
	<input name="aprice"  id="aprice" type="text" size="20" maxlength="30" value="<?=$row['jPrice']?>" class="box" />
      &nbsp;�ҷ&nbsp; <font color="#CC0000">*</font> <font color="#009900">����ͧ�������ͧ���� , �ӡѺ</font></td>
  </tr>
  <tr>
    <td height="173" align="right">��������´ :&nbsp; </td>
    <td><textarea name="adetail" cols="70" rows="12" id="adetail" onkeyup="javascript:this.value=this.value.toUpperCase();" class="box"><?=$row['jDetail']?></textarea>
<font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td height="24" align="right">�ٻ�Ҿ 1 :&nbsp; </td>
    <td>
    <?
     if ($row['jPic1'] != "" )
	 { 
		echo"<img src='".$page_link."/picture_job_1/".$row['jPic1']."' width='300' alt='".$row['jTitle']."' title='".$row['jTitle']."' /><br />" ; 
   ?> 
   &nbsp;
	<input type="checkbox" name="unlinks1" value="<?php echo $row['jPic1'];?>" onClick="if(this.checked){document.formadd.file1.style.display='none';}else{document.formadd.file1.style.display='';}" class="box">���͡����ź�ٻ
     <br /><input name="file1_old1" type="hidden" id="file1_old1" value="<?php echo $row['jPic1']?>" class="box">
	 <? } ?>
    <input type="file" name="file1" id="file1" class="box" />
    
      <font color="#CC0000">*</font> <font color="#009900">��Ҵ����Թ 2 MB ���� 500 px. </font></td>
  </tr>
  <tr>
    <td height="24" align="right">�ٻ�Ҿ 2 :&nbsp; </td>
    <td>
    <?
     if ($row['jPic2'] != "" )
	 { 
		echo"<img src='".$page_link."/picture_job_2/".$row['jPic2']."' width='300' alt='".$row['jTitle']."' title='".$row['jTitle']."' /><br />" ; 
   ?> 
   &nbsp;
	<input type="checkbox" name="unlinks2" value="<?php echo $row['jPic2'];?>" onClick="if(this.checked){document.formadd.file2.style.display='none';}else{document.formadd.file2.style.display='';}" class="box">���͡����ź�ٻ
     <br /><input name="file2_old2" type="hidden" id="file2_old2" value="<?php echo $row['jPic2']?>" class="box">
	 <? } ?>
    <input type="file" name="file2" id="file2" class="box" />
    
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
	<option value="���" <? if($row['jc_Title'] == "���"){ ?> selected="selected"<? } ?>>���</option>
	<option value="�ҧ" <? if($row['jc_Title'] == "�ҧ"){ ?> selected="selected"<? } ?>>�ҧ</option>
	<option value="�ҧ���" <? if($row['jc_Title'] == "�ҧ���"){ ?> selected="selected"<? } ?>>�ҧ���</option>
	<option value="1" >��� �</option>
  </select>	&nbsp;&nbsp;<label id='ctitletxt'></label></td>
  </tr>
  <tr>
    <td align="right">���� - ���ʡ�� :&nbsp; </td>
    <td><input name="cname" type="text" id="cname"  onkeyup="javascript:this.value=this.value.toUpperCase();" size="40" value="<?=$row['jc_Name']?>" class="box" />
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td align="right">������� :&nbsp; </td>
    <td><textarea name="caddress" cols="65" rows="6" id="caddress" onkeyup="javascript:this.value=this.value.toUpperCase();" class="box"><?=$row['jc_Address']?></textarea>
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td align="right">�������Ѿ�� :&nbsp; </td>
    <td>
      <input name="ctelephone" type="text" id="ctelephone" onkeyup="javascript:this.value=this.value.toUpperCase();" size="40" value="<?=$row['jc_Telephone']?>" class="box" />
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">������ :&nbsp; </td>
    <td>
      <input name="cemail" type="text" id="cemail" size="40" value="<?=$row['jc_Email']?>" class="box" />
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">����¹�ٻ�Ҿ&nbsp;:&nbsp;</td>
    <td><img src="<?=$page_link?>/verify-images.php" alt="�����ٻ�Ҿ" title="�����ٻ�Ҿ" /></td>
  </tr>
  <tr>
    <td align="right">�����ٻ�Ҿ:&nbsp; </td>
    <td><input name="capts" id="capts" type="text" size="8" onkeyup="javascript:this.value=this.value.toUpperCase();" />
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
	<input name="flag" id="flag" type="hidden" value="editjob" />
    <input name="jID" id="jID" type="hidden" value="<? echo $row['jID']; ?>" />
	<input name="ctitle1" id="ctitle1" type="hidden" value="<? echo $rowm['mTitle']; ?>" />
	<input name="cnames" id="cnames" type="hidden" value="<? echo $rowm['mName']." ".$rowm['mLname']; ?>" />
	<input name="caddresss" id="caddresss" type="hidden" value="<? echo $rowm['mAddress']."  ".$rowm['mPostalcode']; ?>" />
	<input name="ctelephones" id="ctelephones" type="hidden" value="<? echo $rowm['mTelephone']; ?>" />
	<input name="cemails" id="cemails" type="hidden" value="<? echo $rowm['mEmail']; ?>" />
	<input name="Submit" type="submit" value="  ��䢻�С��  " /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
