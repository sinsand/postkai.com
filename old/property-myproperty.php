<?php session_start();
include 'lib/connect.php' ;
include 'config/isLogon.php' ; 
$db = new mydb ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>��������ѧ�������Ѿ��ͧ��ҹ</title>
<meta name="Keywords" content="��������ѧ�������Ѿ��,��ѧ�������Ѿ��,��ѧ��,����,���,������,��ҹ,��ҹ����ͧ,��ҹ�����,��ҹ�Ѵ���,���ͺ�ҹ����ͧ,���ö¹������ͧ,���ö¹��,��ͧ���" />
<meta name="Description" content="��������ѧ�������Ѿ�� ��ѧ�������Ѿ�� ��ѧ�� ���� ��� ������ ��ҹ ��ҹ����ͧ ��ҹ����� ��ҹ�Ѵ��� ���ͺ�ҹ����ͧ ����ö¹������ͧ ���ö¹������ͧ ���ö¹�� ��ͧ���" />
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
<img src="<?=$page_link?>/images/myproperty.jpg" alt="��������ѧ�������Ѿ��ͧ�س" title="��������ѧ�������Ѿ��ͧ�س" /><br />

<div class="alink">
<p class="txtbold">��������ѧ�������Ѿ��ͧ�س&nbsp;<font color="#006600"><?=$Rmember['mUsername']?></font></p>
<a href="<?=$page_link?>/ŧ��С�ȿ��-��ѧ�������Ѿ��/ŧ��С�ȿ��" title="ŧ��С�ȿ��"><font size="4">>>ŧ��С�ȿ��<<</font></a><br /><br />
<?
$sql = "SELECT * FROM sb_job where mID = '".$_SESSION['mID']."' ORDER BY jDate_Create DESC";
$result = $db->query($sql);
$m = 1;
while ($row = mysql_fetch_array($result))
{
	$titleall = str_replace(' ','-', $row['jTitle']);
	$titleall = str_replace('#','-', $titleall);
	$titleall = str_replace('%','-', $titleall);
	
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
<a href="<?=$page_link?>/<?=$cat_type?>/<?=$titleall?>/1/1/<?=$row['jType']?>/<?=$row['jaType']?>/<?=$row['jID']?>" target="_blank" title="<?=$row['jTitle']?>">
                <? 
		  	echo "<b><font size='3'>".$m.". "; 
			$position=100; // �кؤ�����Ǣͧ���¤��ҵ�ͧ������˹
			$message=$row['jTitle']; 
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵���� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}	
			echo "</font></b>";		
			?>
</a>

<?
if($row['jPic1'] != "")
{
	echo "<img src='".$page_link."/images/picture.png' alt='$row[jTitle]' title='$row[jTitle]' />";
}
?>
&nbsp;&nbsp;&nbsp;<strong><a href="<?=$page_link?>/<?=$cat_type?>/<?=$titleall?>/<?=$row['jID']?>" title="<?=$row['jTitle']?>"><font color="#990000">Edit</font></a></strong>
<br />
<?
			$position=150; // �кؤ�����Ǣͧ���¤��ҵ�ͧ������˹
			$message=$row['jDetail']; 
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵���� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
?>
<br />
<font color="#009900"><? echo "".$page_link."/".$cat_type."/".$titleall."/1/1"."/".$row['jType']."/".$row['jaType']."/".$row['jID'].""; ?></font>
<br /><br /><br />
<?
$m++;}
?>
<br /><br />
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
