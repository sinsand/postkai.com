<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;

$selectmember1 = "select * from member where  mID = '".$_SESSION["mID"]."'" ; 
$rmember1 = $db->query($selectmember1);
$Rmember1 = mysql_fetch_array($rmember1);

if($_GET['bID'] != "")
{
$sql = "SELECT * FROM webboard WHERE wID=".$_GET['bID'];
$result = $db->query($sql);
$array = mysql_fetch_array($result);
$addread = $array['wRead'] + 1 ;

	
$query = "update webboard set wRead = '$addread'  where wID = '".$_GET['bID']."'";
$result = $db->query($query) ; 
}


$sql1 = "SELECT * FROM webboard where wID = '".$_GET['bID']."'";
$result1 = $db->query($sql1);
$fetch1 = mysql_fetch_array($result1);

$selectmembers = "select * from member where  mID = '".$fetch1["mID"]."'" ; 
$rmembers = $db->query($selectmembers);
$Rmembers = mysql_fetch_array($rmembers);

if($_GET['btype'] == "1"){
$type = "House (��ҹ ��ǹ������� �)";
}
if($_GET['btype'] == "2"){
$type = "Condo (�͹� �ŵ �)";
}
if($_GET['btype'] == "3"){
$type = "Building (�Ҥ�� �֡ �)";
}
if($_GET['btype'] == "4"){
$type = "Land (���Թ ���Թ�Ѵ��� �)";
}
if($_GET['btype'] == "5"){
$type = "Rent (��ҹ��� ��ͧ��� �)";
}
if($_GET['btype'] == "6"){
$type = "Funiture (�ػ�ó��觺�ҹ �)";
}
if($_GET['btype'] == "7"){
$type = "Car (ö¹�� ö����ͧ �)";
}
if($_GET['btype'] == "8"){
$type = "Others (��� �)";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title><?=$fetch1['wTitle']?></title>
<meta name="Keywords" content="��纺���,������ѧ��,��ѧ�������Ѿ��,��ѧ��,����,���,������,��ҹ,��ҹ����ͧ,��ҹ�����,��ҹ�Ѵ���,���ͺ�ҹ����ͧ,���͢�º�ҹ,ŧ��С�ȿ��,����ö¹������ͧ,���ö¹������ͧ,���ö¹��" />
<meta name="Description" content="������ѧ�� ��纺�����ѧ�������Ѿ�� ��ѧ�������Ѿ�� ��ѧ�� ���� ��� ������ ŧ��С�ȿ�� ��ǹ������� ���ͷ�ǹ������� ��·��Թ ���ͷ��Թ ����ö¹������ͧ ���ö¹������ͧ" />
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
&nbsp;<p><a href="<?=$page_link?>/webboard/�������Ǣ������" title="�������Ǣ������"><img src="<?=$page_link?>/images/new-topic.png" border="0" alt="�������Ǣ������" title="�������Ǣ������" /></a></p><br />
<h1><?=$type?>&nbsp;&raquo;&nbsp;<u><?=$fetch1['wTitle']?></u></h1>
<? if($fetch1['wPic1'] != ""){ ?><p align="center"><img src="<?=$page_link?>/board-pic/<?=$fetch1['wPic1']?>" alt="<?=$fetch1['wTitle']?>" title="<?=$fetch1['wTitle']?>" /></p><? } ?>
<p><?=$fetch1['wDetail']?></p>
<p><strong>�� :</strong> <?=$Rmembers['mUsername']?>&nbsp;&nbsp;<strong>�ѹ���:</strong> <?=$fetch1['wDate_Create']?>&nbsp;&nbsp;<strong>��ҹ����:</strong> <?=$fetch1['wRead']?>&nbsp;����</p>

<p align="center"><font color="#CCCCCC">---------------------------------------------------------------------------------------------------------------</font></p>
<?
	$sql = "SELECT * FROM rejob where wID = '".$_GET['bID']."' ORDER BY rDate_Create DESC";
	$result = $db->query($sql);
	while ($rowrejob = mysql_fetch_array($result))
	{
?>
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="13%">&nbsp;</td>
    <td width="87%"><h3><?=nl2br($rowrejob['rDetail'])?></h3></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><font size="1" color="#666666">�� : <? echo $rowrejob['rName']; ?> ������ : <? echo $rowrejob['rEmail']; ?>&nbsp;����� : <? echo $rowrejob['rDate_Create']; ?></font></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td><font color="#CCCCCC">------------------------------------------------------------------------------------------------------------------------------------------</font></td>
    </tr>
</table>
<? } ?>

<form name="formrejob" id="formrejob" action="<?=$page_link?>/property-webboard-function.php" method="post" onsubmit="return validFormrejob();">
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td width="56%">&nbsp;</td>
    <td width="44%"><h1>�ͺ��С��</h1></td>
  </tr>
  <tr>
    <td align="right">���� : </td>
    <td>
      <input name="rname" type="text" class="box" id="rname" size="25" <? if($_SESSION["mID"] != ""){ ?> value="<?=$Rmember1['mUsername']?>" <? } ?> />    </td>
  </tr>
  <tr>
    <td align="right">��������´ : </td>
    <td>
      <textarea name="rdetail" cols="40" rows="6" id="rdetail"></textarea>    </td>
  </tr>
  <tr>
    <td align="right">������ : </td>
    <td>
      <input name="remail" type="text" id="remail" <? if($_SESSION["mID"] != ""){ ?> value="<? echo $Rmember1['mEmail']; ?>" <? } ?> />    </td>
  </tr>
  <tr>
    <td align="right"></td>
    <td></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td><img src="<?=$page_link?>/verify-images.php" alt="�����ٻ�Ҿ" title="�����ٻ�Ҿ" /></td>
  </tr>
  <tr>
    <td align="right">�����ٻ�Ҿ : </td>
    <td><input name="capts" id="capts" type="text" class="box"  onkeyup="javascript:this.value=this.value.toUpperCase();" size="15" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
	<input name="flag" type="hidden" id="flag" value="Addrejob" />
	<input name="bID" type="hidden" id="bID" value="<?=$_GET['bID']?>" />
    <input name="btype" type="hidden" id="btype" value="<?=$_GET['btype']?>" />
    <input name="wTitle" type="hidden" id="wTitle" value="<?=$fetch1['wTitle']?>" />
    <input type="submit" name="Submit" value="  �ͺ  " />    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>

</div>

<!--FOOTER-->
<div class="footer"><br /><? include "include-footer.php"; ?></div>

</center>
</body>
</html>
