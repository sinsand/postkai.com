<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>�֡ �Ҥ�þҹԪ�� �ç�ҹ ⡴ѧ �ӹѡ�ҹ</title>
<meta name="Keywords" content="�֡,�Ҥ�þҹԪ��,�ç�ҹ,⡴ѧ,�ӹѡ�ҹ,��ѧ�������Ѿ��,��ѧ��,����,���,������,ŧ��С�ȿ��" />
<meta name="Description" content="�֡ �Ҥ�þҹԪ�� �ç�ҹ ⡴ѧ �ӹѡ�ҹ ��ѧ�������Ѿ�� ��ѧ�� ���� ��� ������ ŧ��С�ȿ��" />
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
<img src="<?=$page_link?>/images/property_type.jpg" alt="Building - �֡ ,�Ҥ�þҹԪ�� ,�ç�ҹ ,⡴ѧ ,�ӹѡ�ҹ" title="Building - �֡ ,�Ҥ�þҹԪ�� ,�ç�ҹ ,⡴ѧ ,�ӹѡ�ҹ" /><br />

<div class="alink">
<?		
$q="SELECT * FROM sb_job where jType = '3' ";
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
<h3>Building - �֡ ,�Ҥ�þҹԪ�� ,�ç�ҹ ,⡴ѧ ,�ӹѡ�ҹ</h3>
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
  page_navigator($before_p,$plus_p,$total,$total_p,$chk_page);    
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
