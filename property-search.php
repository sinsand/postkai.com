<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;

		if($_REQUEST['atype'] == "1")
		{
			$con = " and jaType = '1'";
			$txtatype = "����";
		}
		if($_REQUEST['atype'] == "2")
		{
			$con = " and jaType = '2'";
			$txtatype = "���";
		}
		if($_REQUEST['atype'] == "3")
		{
			$con = " and jaType = '3'";
			$txtatype = "������";
		}
		
		if($_REQUEST['btype'] == "1")
		{
			$con2 = " and jType = '1'";
			$txtbtype = "Home";
		}
		if($_REQUEST['btype'] == "2")
		{
			$con2 = " and jType = '2'";
			$txtbtype = "Condo ";
		}
		if($_REQUEST['btype'] == "3")
		{
			$con2 = " and jType = '3'";
			$txtbtype = "Building";
		}
		if($_REQUEST['btype'] == "4")
		{
			$con2 = " and jType = '4'";
			$txtbtype = "Land";
		}
		if($_REQUEST['btype'] == "5")
		{
			$con2 = " and jType = '5'";
			$txtbtype = "Rent";
		}
		if($_REQUEST['btype'] == "6")
		{
			$con2 = " and jType = '6'";
			$txtbtype = "Furniture";
		}
		if($_REQUEST['btype'] == "7")
		{
			$con2 = " and jType = '7'";
			$txtbtype = "Car";
		}
		if($_REQUEST['btype'] == "8")
		{
			$con2 = " and jType = '8'";
			$txtbtype = "Others";
		}

		if($_REQUEST['word_search'] != "")
		{
			$word = $_REQUEST['word_search'];
			$con3 = " and (jTitle like '%$word%' or jDetail like '%$word%') ";
		}
		
		if($_REQUEST['province'] != "")
		{
			$con4 = " and jProvince = '".$_REQUEST['province']."' ";
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>���һ�С�� ŧ��С�ȿ�� ��ѧ�������Ѿ��  ���� ��� ������ ��ҹ����� ��ҹ�Ѵ��� ��ҹ����ͧ ��ǹ������� �͹� ���Թ �Ҥ�� ��������� ��ҹ��� ��ͧ��� ö¹�� ö¹������ͧ</title>
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

var start = new Date();
var startsec = start.getTime();
var num = 0;
for( var i = 0; i < 250000; i++ )
{
  num++;
}

var stop  = new Date();
var stopsec = stop.getTime();
var loadtime = ( stopsec - startsec ) / 1000;
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
<img src="<?=$page_link?>/images/property_search.jpg" alt="������ѧ�������Ѿ��" title="������ѧ�������Ѿ��" /><br />

<div class="alink">

<form action="<?=$page_link?>/����-��ѧ�������Ѿ��/search" method="post" name="frm-search">
<strong id="txtbold">���һ�С��</strong><br /><input name="word_search" id="word-search" type="text" size="70" value="<?=$_REQUEST['word_search']?>" /><br /><br />

<input name="atype" type="radio" value="1"<? if($_REQUEST['atype'] == "1"){ ?> checked="checked"<? } ?> />����&nbsp;
<input name="atype" type="radio" value="2"<? if($_REQUEST['atype'] == "2"){ ?> checked="checked"<? } ?> />���&nbsp;
<input name="atype" type="radio" value="3"<? if($_REQUEST['atype'] == "3"){ ?> checked="checked"<? } ?> />������&nbsp;&nbsp;
�ѧ��Ѵ&nbsp;:&nbsp;<select name="province" id="province">
	<option selected="selected" value=""> ���͡�ѧ��Ѵ </option>
	<option value="��к��"<? if($_REQUEST['province'] == "��к��"){ ?>  selected="selected"<? } ?>>��к��</option>
	<option value="��ا෾��ҹ��"<? if($_REQUEST['province'] == "��ا෾��ҹ��"){ ?>  selected="selected"<? } ?>>��ا෾��ҹ��</option>
	<option value="�ҭ������"<? if($_REQUEST['province'] == "�ҭ������"){ ?>  selected="selected"<? } ?>>�ҭ������</option>
	<option value="����Թ���"<? if($_REQUEST['province'] == "����Թ���"){ ?>  selected="selected"<? } ?>>����Թ���</option>
	<option value="��ᾧྪ�"<? if($_REQUEST['province'] == "��ᾧྪ�"){ ?> selected="selected"<? } ?>>��ᾧྪ�</option>
	<option value="�͹��"<? if($_REQUEST['province'] == "�͹��"){ ?> selected="selected"<? } ?>>�͹��</option>
	<option value="�ѹ�����"<? if($_REQUEST['province'] == "�ѹ�����"){ ?> selected="selected"<? } ?>>�ѹ�����</option>
	<option value="���ԧ���"<? if($_REQUEST['province'] == "���ԧ���"){ ?> selected="selected"<? } ?>>���ԧ���</option>
	<option value="�ź���"<? if($_REQUEST['province'] == "�ź���"){ ?> selected="selected"<? } ?>>�ź���</option>
	<option value="��¹ҷ"<? if($_REQUEST['province'] == "��¹ҷ"){ ?> selected="selected"<? } ?>>��¹ҷ</option>
	<option value="�������"<? if($_REQUEST['province'] == "�������"){ ?> selected="selected"<? } ?>>�������</option>
	<option value="�����"<? if($_REQUEST['province'] == "�����"){ ?> selected="selected"<? } ?>>�����</option>
	<option value="��§���"<? if($_REQUEST['province'] == "��§���"){ ?> selected="selected"<? } ?>>��§���</option>
	<option value="��§����"<? if($_REQUEST['province'] == "��§����"){ ?> selected="selected"<? } ?>>��§����</option>
	<option value="��ѧ"<? if($_REQUEST['province'] == "��ѧ"){ ?> selected="selected"<? } ?>>��ѧ</option>
	<option value="��Ҵ"<? if($_REQUEST['province'] == "��Ҵ"){ ?> selected="selected"<? } ?>>��Ҵ</option>
	<option value="�ҡ"<? if($_REQUEST['province'] == "�ҡ"){ ?> selected="selected"<? } ?>>�ҡ</option>
	<option value="��ù�¡"<? if($_REQUEST['province'] == "��ù�¡"){ ?> selected="selected"<? } ?>>��ù�¡</option>
	<option value="��û��"<? if($_REQUEST['province'] == "��û��"){ ?> selected="selected"<? } ?>>��û��</option>
	<option value="��þ��"<? if($_REQUEST['province'] == "��þ��"){ ?> selected="selected"<? } ?>>��þ��</option>
	<option value="����Ҫ����"<? if($_REQUEST['province'] == "����Ҫ����"){ ?> selected="selected"<? } ?>>����Ҫ����</option>
	<option value="�����ո����Ҫ"<? if($_REQUEST['province'] == "�����ո����Ҫ"){ ?> selected="selected"<? } ?>>�����ո����Ҫ</option>
	<option value="������ä�"<? if($_REQUEST['province'] == "������ä�"){ ?> selected="selected"<? } ?>>������ä�</option>
	<option value="�������"<? if($_REQUEST['province'] == "�������"){ ?> selected="selected"<? } ?>>�������</option>
	<option value="��Ҹ����"<? if($_REQUEST['province'] == "��Ҹ����"){ ?> selected="selected"<? } ?>>��Ҹ����</option>
	<option value="��ҹ"<? if($_REQUEST['province'] == "��ҹ"){ ?> selected="selected"<? } ?>>��ҹ</option>
	<option value="���������"<? if($_REQUEST['province'] == "���������"){ ?> selected="selected"<? } ?>>���������</option>
	<option value="�����ҹ�"<? if($_REQUEST['province'] == "�����ҹ�"){ ?> selected="selected"<? } ?>>�����ҹ�</option>
	<option value="��ШǺ���բѹ��"<? if($_REQUEST['province'] == "��ШǺ���բѹ��"){ ?> selected="selected"<? } ?>>��ШǺ���բѹ��</option>
	<option value="��Ҩչ����"<? if($_REQUEST['province'] == "��Ҩչ����"){ ?> selected="selected"<? } ?>>��Ҩչ����</option>
	<option value="�ѵ�ҹ�"<? if($_REQUEST['province'] == "�ѵ�ҹ�"){ ?> selected="selected"<? } ?>>�ѵ�ҹ�</option>
	<option value="��й�������ظ��"<? if($_REQUEST['province'] == "��й�������ظ��"){ ?> selected="selected"<? } ?>>��й�������ظ��</option>
	<option value="�����"<? if($_REQUEST['province'] == "�����"){ ?> selected="selected"<? } ?>>�����</option>
	<option value="�ѧ��"<? if($_REQUEST['province'] == "�ѧ��"){ ?> selected="selected"<? } ?>>�ѧ��</option>
	<option value="�ѷ�ا"<? if($_REQUEST['province'] == "�ѷ�ا"){ ?> selected="selected"<? } ?>>�ѷ�ا</option>
	<option value="�ԨԵ�"<? if($_REQUEST['province'] == "�ԨԵ�"){ ?> selected="selected"<? } ?>>�ԨԵ�</option>
	<option value="��ɳ��š"<? if($_REQUEST['province'] == "��ɳ��š"){ ?> selected="selected"<? } ?>>��ɳ��š</option>
	<option value="ྪú���"<? if($_REQUEST['province'] == "ྪú���"){ ?> selected="selected"<? } ?>>ྪú���</option>
	<option value="ྪú�ó�"<? if($_REQUEST['province'] == "ྪú�ó�"){ ?> selected="selected"<? } ?>>ྪú�ó�</option>
	<option value="���"<? if($_REQUEST['province'] == "���"){ ?> selected="selected"<? } ?>>���</option>
	<option value="����"<? if($_REQUEST['province'] == "����"){ ?> selected="selected"<? } ?>>����</option>
	<option value="�����ä��"<? if($_REQUEST['province'] == "�����ä��"){ ?> selected="selected"<? } ?>>�����ä��</option>
	<option value="�ء�����"<? if($_REQUEST['province'] == "�ء�����"){ ?> selected="selected"<? } ?>>�ء�����</option>
	<option value="�����ͧ�͹"<? if($_REQUEST['province'] == "�����ͧ�͹"){ ?> selected="selected"<? } ?>>�����ͧ�͹</option>
	<option value="��ʸ�"<? if($_REQUEST['province'] == "��ʸ�"){ ?> selected="selected"<? } ?>>��ʸ�</option>
	<option value="����"<? if($_REQUEST['province'] == "����"){ ?> selected="selected"<? } ?>>����</option>
	<option value="�������"<? if($_REQUEST['province'] == "�������"){ ?> selected="selected"<? } ?>>�������</option>
	<option value="�йͧ"<? if($_REQUEST['province'] == "�йͧ"){ ?> selected="selected"<? } ?>>�йͧ</option>
	<option value="���ͧ"<? if($_REQUEST['province'] == "���ͧ"){ ?> selected="selected"<? } ?>>���ͧ</option>
	<option value="�Ҫ����"<? if($_REQUEST['province'] == "�Ҫ����"){ ?> selected="selected"<? } ?>>�Ҫ����</option>
	<option value="ž����"<? if($_REQUEST['province'] == "ž����"){ ?> selected="selected"<? } ?>>ž����</option>
	<option value="�ӻҧ"<? if($_REQUEST['province'] == "�ӻҧ"){ ?> selected="selected"<? } ?>>�ӻҧ</option>
	<option value="�Ӿٹ"<? if($_REQUEST['province'] == "�Ӿٹ"){ ?> selected="selected"<? } ?>>�Ӿٹ</option>
	<option value="���"<? if($_REQUEST['province'] == "���"){ ?> selected="selected"<? } ?>>���</option>
	<option value="�������"<? if($_REQUEST['province'] == "�������"){ ?> selected="selected"<? } ?>>�������</option>
	<option value="ʡŹ��"<? if($_REQUEST['province'] == "ʡŹ��"){ ?> selected="selected"<? } ?>>ʡŹ��</option>
	<option value="ʧ���"<? if($_REQUEST['province'] == "ʧ���"){ ?> selected="selected"<? } ?>>ʧ���</option>
	<option value="ʵ��"<? if($_REQUEST['province'] == "ʵ��"){ ?> selected="selected"<? } ?>>ʵ��</option>
	<option value="��طû�ҡ��"<? if($_REQUEST['province'] == "��طû�ҡ��"){ ?> selected="selected"<? } ?>>��طû�ҡ��</option>
	<option value="��ط�ʧ����"<? if($_REQUEST['province'] == "��ط�ʧ����"){ ?> selected="selected"<? } ?>>��ط�ʧ����</option>
	<option value="��ط��Ҥ�"<? if($_REQUEST['province'] == "��ط��Ҥ�"){ ?> selected="selected"<? } ?>>��ط��Ҥ�</option>
	<option value="������"<? if($_REQUEST['province'] == "������"){ ?> selected="selected"<? } ?>>������</option>
	<option value="��к���"<? if($_REQUEST['province'] == "��к���"){ ?> selected="selected"<? } ?>>��к���</option>
	<option value="�ԧ�����"<? if($_REQUEST['province'] == "�ԧ�����"){ ?> selected="selected"<? } ?>>�ԧ�����</option>
	<option value="��⢷��"<? if($_REQUEST['province'] == "��⢷��"){ ?> selected="selected"<? } ?>>��⢷��</option>
	<option value="�ؾ�ó����"<? if($_REQUEST['province'] == "�ؾ�ó����"){ ?> selected="selected"<? } ?>>�ؾ�ó����</option>
	<option value="����ɯ��ҹ�"<? if($_REQUEST['province'] == "����ɯ��ҹ�"){ ?> selected="selected"<? } ?>>����ɯ��ҹ�</option>
	<option value="���Թ���"<? if($_REQUEST['province'] == "���Թ���"){ ?> selected="selected"<? } ?>>���Թ���</option>
	<option value="˹ͧ���"<? if($_REQUEST['province'] == "˹ͧ���"){ ?> selected="selected"<? } ?>>˹ͧ���</option>
	<option value="˹ͧ�������"<? if($_REQUEST['province'] == "˹ͧ�������"){ ?> selected="selected"<? } ?>>˹ͧ�������</option>
	<option value="�غ��Ҫ�ҹ�"<? if($_REQUEST['province'] == "�غ��Ҫ�ҹ�"){ ?> selected="selected"<? } ?>>�غ��Ҫ�ҹ�</option>
	<option value="��ҧ�ͧ"<? if($_REQUEST['province'] == "��ҧ�ͧ"){ ?> selected="selected"<? } ?>>��ҧ�ͧ</option>
	<option value="�ӹҨ��ԭ"<? if($_REQUEST['province'] == "�ӹҨ��ԭ"){ ?> selected="selected"<? } ?>>�ӹҨ��ԭ</option>
	<option value="�شøҹ�"<? if($_REQUEST['province'] == "�شøҹ�"){ ?> selected="selected"<? } ?>>�شøҹ�</option>
	<option value="�صôԵ��"<? if($_REQUEST['province'] == "�صôԵ��"){ ?> selected="selected"<? } ?>>�صôԵ��</option>
	<option value="�ط�¸ҹ�"<? if($_REQUEST['province'] == "�ط�¸ҹ�"){ ?> selected="selected"<? } ?>>�ط�¸ҹ�</option>
</select>
<br /><br />
<input name="btype" type="radio" value="1"<? if($_REQUEST['btype'] == "1"){ ?> checked="checked"<? } ?> />
Home
<input name="btype" type="radio" value="2"<? if($_REQUEST['btype'] == "2"){ ?> checked="checked"<? } ?> />
Condo
<input name="btype" type="radio" value="3"<? if($_REQUEST['btype'] == "3"){ ?> checked="checked"<? } ?> />
Building
<input name="btype" type="radio" value="4"<? if($_REQUEST['btype'] == "4"){ ?> checked="checked"<? } ?> />
Land
<input name="btype" type="radio" value="5"<? if($_REQUEST['btype'] == "5"){ ?> checked="checked"<? } ?> />
Rent 
<input name="btype" type="radio" value="6"<? if($_REQUEST['btype'] == "6"){ ?> checked="checked"<? } ?> />
Furniture 
<input name="btype" type="radio" value="7"<? if($_REQUEST['btype'] == "7"){ ?> checked="checked"<? } ?> />
Car 
<input name="btype" type="radio" value="8"<? if($_REQUEST['btype'] == "8"){ ?> checked="checked"<? } ?> />
Others 
<br /><br />
<input name="submit" type="submit" value="��ԡ���һ�С��!" />
</form>
<br />
<font color="#CCCCCC">--------------------------------------------------------------------------------------------------------------------------------</font><br /><br />
<?		
$q="SELECT * FROM sb_job where jType != '0' $con $con2 $con3 $con4 ";
$q.=" order by jDate_Create desc";
$qr=mysql_query($q);
$total=mysql_num_rows($qr);
$e_page=20; // ��˹� �ӹǹ��¡�÷���ʴ������˹��   
if(!isset($_GET['s_page'])){   
	$_GET['s_page']=0;   
}else{   
	$chk_page=$_GET['s_page'];     
	$_GET['s_page']=$_GET['s_page']*$e_page;   
}   
$q.=" LIMIT ".$_GET['s_page'].",$e_page";
$qr=mysql_query($q);
if(mysql_num_rows($qr)>=1){   
	$plus_p=($chk_page*$e_page)+mysql_num_rows($qr);   
}else{   
	$plus_p=($chk_page*$e_page);       
}   
$total_p=ceil($total/$e_page);   
$before_p=($chk_page*$e_page)+1;
?>

<? if($_REQUEST['atype'] != "" or $_REQUEST['btype'] != "" or $_REQUEST['word_search'] != "" or $_REQUEST['province'] != ""){ ?>
<strong>�š�ä���&nbsp;:&nbsp;</strong>������&nbsp;:&nbsp;<? if($_REQUEST['atype'] != ""){ ?><strong><?=$txtatype?></strong>&nbsp;<? }else{ echo "<strong>-&nbsp;</strong>"; } if($_REQUEST['btype'] != ""){ ?>&raquo;&nbsp;<strong><?=$txtbtype?></strong><? }else{ echo "&raquo;&nbsp;<strong>-</strong>"; } ?>&nbsp;,�Ӥ���&nbsp;:&nbsp;<strong><? if($_REQUEST['word_search'] != ""){ echo $_REQUEST['word_search']; }else{ echo "-"; } ?></strong>&nbsp;,�ѧ��Ѵ&nbsp;:&nbsp;<strong><? if($_REQUEST['province'] != ""){ echo $_REQUEST['province']; }else{ echo "-"; } ?></strong>&nbsp;<? if($_REQUEST['atype'] != "" or $_REQUEST['btype'] != "" or $_REQUEST['word_search'] != "" or $_REQUEST['province'] != ""){ ?>,������&nbsp;<strong><font color="#006600"><?=$total?></font></strong>&nbsp;��¡��<? } ?>&nbsp;&nbsp;(<strong><script type="text/javascript">document.write("�����ҷ����� " +loadtime+ " �Թҷ�");</script></strong>)
<br /><br /><? } ?>



<?

while ($row = mysql_fetch_array($qr))
{
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);
	

	
	if($row['jaType'] == "1")
	{
		$subtype = "����";
	}
	if($row['jaType'] == "2")
	{
		$subtype = "���";
	}
	if($row['jaType'] == "3")
	{
		$subtype = "������";
	}
	
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
<div class="imgleft">    
<?	
if($row['jPic1'] != "")
{
echo "<img src='".$page_link."/picture_job_1/$row[jPic1]' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}else{
echo "<img src='".$page_link."/images/noimage-news.gif' width='60' height='60' alt='$row[jTitle]' title='$row[jTitle]' class='boarderimg' />";
}
?>
</div>
<div class="titleright">
<a href="<?=$page_link?>/<?=$cat_type?>/<?=$titleall?>/1/1/<?=$row['jType']?>/<?=$row['jaType']?>/<?=$row['jID']?>" target="_blank" title="<?=$row['jTitle']?>">
                <? 
		  	echo "<b><font size='2'>"; 
			$position=100; // �кؤ�����Ǣͧ���¤��ҵ�ͧ������˹
			$message=$row['jTitle']; 
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵���� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}	
			echo "</font></b>";		
			?>
</a>
&nbsp;&nbsp;<font color="#CC0000" size="2"><strong><?=$subtype?></strong></font>&nbsp;,&nbsp;<font color="#009900"><strong>�������&nbsp;:&nbsp;<?=$row['jRead']?>&nbsp;����</strong></font>
<br />
<?
			$position=150; // �кؤ�����Ǣͧ���¤��ҵ�ͧ������˹
			$message=$row['jDetail']; 
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵���� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
</div>
<br />&nbsp;<br />
<?
}
if($total == 0)
{
?>
<center><h1><font color="#CC0000">����բ����š�ä���</font></h1></center>
<?
}
?>
<br />
<?php if($total>0){ ?>˹��&nbsp;:&nbsp;
<div class="browse_page">
 <?php   
 // ���¡��ҹ�ѧ���� ����Ѻ�ʴ������˹��   
  page_navigatorsearch($before_p,$plus_p,$total,$total_p,$chk_page,"&atype=".$_REQUEST['atype']."&btype=".$_REQUEST['btype']."&province=".$_REQUEST['province']."&word_search=".$word."");    
  ?> 
</div>
<?php } ?>

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
