<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;

if($_GET['IDRead'] == "1")
{

$sql = "SELECT * FROM sb_job WHERE jID=".$_GET['jID'];
$result = $db->query($sql);
$array = mysql_fetch_array($result);
$addread = $array['jRead'] + 1 ;
	
$query = "update sb_job set jRead = '$addread'  where jID = '".$_GET['jID']."'";
$result = $db->query($query) ; 
}

$sqlmem = "SELECT * FROM member WHERE mID='".$_SESSION["mID"]."'";
$resultmem = $db->query($sqlmem);
$arraymem = mysql_fetch_array($resultmem);

$sql = "SELECT * FROM sb_job WHERE jID=".$_GET['jID'];
$result = $db->query($sql);
$array = mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title><?=$array['jTitle']?></title>
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
<img src="<?=$page_link?>/images/asungha_show_detail.jpg" alt="��������´��ѧ�������Ѿ��" title="��������´��ѧ�������Ѿ��" /><br />

<div class="alink">

<?
	$sql = "SELECT * FROM sb_job WHERE jID=".$_GET['jID'];
	$result = $db->query($sql);
	$row = mysql_fetch_array($result);
?>

<p><h2>&raquo;&nbsp;
<font color="#0033FF"><? if($row['jaType'] == 1){echo "����";}else if($row['jaType'] == 2){echo "���";}else{echo "������";} ?></font>&nbsp;&raquo;&nbsp;
<font color="#0033FF"><? 
		if($row['jType'] == 1)
		{
		echo "House (��ҹ-��ҹ�Ѵ���-��ҹ�����-��ҹ����ͧ �)";
		}
		else if($row['jType'] == 2)
		{
		echo "Condo (�͹�-�͹�������-�Ҥ�êش �)"; 
		}
		else if($row['jType'] == 3)
		{
		echo "Building (�֡-�Ҥ�þҹԪ��-�ç�ҹ-⡴ѧ �)";
		}
		else if($row['jType'] == 4)
		{
		echo "Land (���Թ����-���Թ�Ѵ���-���Թ �)";
		}
		else if($row['jType'] == 5)
		{
		echo "Rent (�Ҥ�����-��ͧ���-��ҹ��� �)";
		}
		else if($row['jType'] == 6)
		{
		echo "Funiture (�ػ��쵡�觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-������ �)";
		}
		else if($row['jType'] == 7)
		{
		echo "Car (ö¹��-ö����ͧ-ö¹������ͧ �)";
		}
		else if($row['jType'] == 8)
		{
		echo "Others (ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ � )";
		}
		?></font>
</h2>
</p>
<p class="paddingsing"><strong><h2><u><?=$row['jTitle']?>&nbsp;(�ѧ��Ѵ<?=$row['jProvince']?>)</u></h2></strong></p><br />
<p align="center">
<?  if($row['jPic1'] != "" and $row['jPic1'] != "1"){  echo "<img src='$page_link/picture_job_1/".$row['jPic1']."' alt='".$row['jTitle']."' title='".$row['jTitle']."' /><br /><br />"; } ?>
<?  if($row['jPic2'] != "" and $row['jPic2'] != "2"){  echo "<img src='$page_link/picture_job_2/".$row['jPic2']."' alt='".$row['jTitle']."' title='".$row['jTitle']."' /><br />"; } ?>
</p>
<p style="padding-left:30px;">
<? echo "�Ҥ�&nbsp;<font color='#CC0000'><b>".$row['jPrice']."</b></font>&nbsp;�ҷ";?><br /><?=nl2br($row['jDetail'])?>
<br />
<strong><font color="#0033FF">�������㹡�õԴ���</font></strong><br />
<?=$row['jc_Title']."&nbsp;".$row['jc_Name']?>
<br />
<strong>�������&nbsp;:&nbsp;</strong>&nbsp;<?=$row['jc_Address']?>
<br />
<strong>�������Ѿ��&nbsp;:&nbsp;</strong><?=$row['jc_Telephone']?>
<br />
<strong>�����&nbsp;:&nbsp;</strong><?=$row['jc_Email']?>
<br /><br /><br />
<strong>�ٻ�С�ȹ�������&nbsp;:&nbsp;<font color="#006600"><?=number_format($row['jRead'])?></font>&nbsp;����</strong>
<br />
<strong>ŧ��С��������ѹ���&nbsp;:&nbsp;</strong><?=$row['jDate_Create']?>
</p>
<br />

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
