<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>��纺��� ��Ǣ�ͺ�����ѧ�������Ѿ�� ŧ��С�ȿ�� ��ѧ�������Ѿ�� ��纺�����ѧ�������Ѿ��</title>
<meta name="Keywords" content="��Ǣ�ͺ�����ѧ�������Ѿ��,��纺���,��ѧ�������Ѿ��,��ѧ��,����,���,������,��ҹ,��ҹ����ͧ,��ҹ�����,��ҹ�Ѵ���,���ͺ�ҹ����ͧ,���͢�º�ҹ,ŧ��С�ȿ��,��Ҥ͹�������,����ö¹������ͧ" />
<meta name="Description" content="��Ǣ�ͺ�����ѧ�������Ѿ��,��ѧ�������Ѿ�� ��ѧ�� ���� ��� ������ ��ҹ ��ҹ����ͧ ��ҹ����� ��ҹ�Ѵ��� ���ͺ�ҹ����ͧ ���͢�º�ҹ ŧ��С�ȿ��" />
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
&nbsp;<p><strong><font size="4">��з�������&nbsp;
<?
$sql = "SELECT * FROM webboard where wType = '".$_GET['bID']."'";
$result = $db->query($sql);
echo $num = mysql_num_rows($result);
?>&nbsp;
��з��
&nbsp;&nbsp;&nbsp;<a href="<?=$page_link?>/webboard/�������Ǣ������" title="�������Ǣ������"><img src="<?=$page_link?>/images/new-topic.png" border="0" alt="�������Ǣ������" title="�������Ǣ������" /></a></font></strong>
</p>
<h3><font color="#FF0000"><u>++&nbsp;��С��!&nbsp;&nbsp;��纺�����ѧ�������Ѿ������ö��ҹ�����ǵ����Ѵ����繵�令�Ѻ.&nbsp;++</u></font></h3>
&nbsp;
<div class="webboard" style="background-color:#F2F2F2;">
<div class="leftwebboard">
<div class="imgwebboard">
<? if($_GET['bID'] == "1"){ ?><img src="<?=$page_link?>/images/board-home.png" alt="��ҹ ,��ǹ������� ,��ҹ�Ѵ��� ,��ҹ����� ,��ҹ����ͧ" title="��ҹ ,��ǹ������� ,��ҹ�Ѵ��� ,��ҹ����� ,��ҹ����ͧ" /><? } ?>
<? if($_GET['bID'] == "2"){ ?><img src="<?=$page_link?>/images/board-condo.png" alt="�͹� ,�͹������� ,�Ҥ�êش ,;�����鹷�" title="�͹� ,�͹������� ,�Ҥ�êش ,;�����鹷�" /><? } ?>
<? if($_GET['bID'] == "3"){ ?><img src="<?=$page_link?>/images/board-building.png" alt="�֡ ,�Ҥ�þҹԪ�� ,�ç�ҹ ,⡴ѧ ,�ӹѡ�ҹ" title="�֡ ,�Ҥ�þҹԪ�� ,�ç�ҹ ,⡴ѧ ,�ӹѡ�ҹ" /><? } ?>
<? if($_GET['bID'] == "4"){ ?><img src="<?=$page_link?>/images/board-land.png" alt="���Թ���� ,���Թ�Ѵ��� ,���Թ" title="���Թ���� ,���Թ�Ѵ��� ,���Թ" /><? } ?>
<? if($_GET['bID'] == "5"){ ?><img src="<?=$page_link?>/images/board-rent.png" alt="�Ҥ����� ,��ͧ��� ,�֡��� ,��ͧ�ѡ ,������ ,��ͧ��ҧ������" title="�Ҥ����� ,��ͧ��� ,�֡��� ,��ͧ�ѡ ,������ ,��ͧ��ҧ������" /><? } ?>
<? if($_GET['bID'] == "6"){ ?><img src="<?=$page_link?>/images/board-furniture.png" alt="�ػ��쵡�觺�ҹ ,�ػ�ó��ӹѡ�ҹ ,���� ,������ ,���������" title="�ػ��쵡�觺�ҹ ,�ػ�ó��ӹѡ�ҹ ,���� ,������ ,���������" /><? } ?>
<? if($_GET['bID'] == "7"){ ?><img src="<?=$page_link?>/images/board-car.png" alt="ö¹�� ,ö����ͧ ,ö¹������ͧ ,ö���� ,ö��÷ء" title="ö¹�� ,ö����ͧ ,ö¹������ͧ ,ö���� ,ö��÷ء" /><? } ?>
<? if($_GET['bID'] == "8"){ ?><img src="<?=$page_link?>/images/board-others.png" alt="ö�Ѻ��ҧ ,�غ�֡ ,���Ͷ͹��ҹ ,�����ӹѡ�ҹ ������ �" title="ö�Ѻ��ҧ ,�غ�֡ ,���Ͷ͹��ҹ ,�����ӹѡ�ҹ ������ �" /><? } ?>
</div>
<div class="textwebboard"><strong>
<? if($_GET['bID'] == "1"){ ?>
<font size="4">House</font></strong><br /><strong>��ҹ ,��ǹ������� ,��ҹ�Ѵ��� ,��ҹ����� ,��ҹ����ͧ</strong><br />
�����ٴ��� �觻ѹ����ͧ��������Ҩ��繡�����ҧ��ҹ ������͡���ͺ�ҹ ��ҹ����� ��ҹ�Ѵ��� ��ǹ������� �繵�
<? } ?>
<? if($_GET['bID'] == "2"){ ?>
<font size="4">Condo</font></strong><br /><strong>�͹� ,�͹������� ,�Ҥ�êش ,;�����鹷�</strong><br />
�����ٴ��� �觻ѹ����ͧ��������Ҩ��繡�����ҧ�͹� ������͡���ͤ͹� ;�����鹷� �͹������� �繵� 
<? } ?>
<? if($_GET['bID'] == "3"){ ?>
<font size="4">Building</font></strong><br /><strong>�֡ ,�Ҥ�þҹԪ�� ,�ç�ҹ ,⡴ѧ ,�ӹѡ�ҹ</strong><br />
�����ٴ��� �觻ѹ����ͧ��������Ҩ��繡�����ҧ�֡ ������͡���͵֡ �Ҥ�þҹԪ�� �ӹѡ�ҹ �ç�ҹ �繵� 
<? } ?>
<? if($_GET['bID'] == "4"){ ?>
<font size="4">Land</font></strong><br /><strong>���Թ���� ,���Թ�Ѵ��� ,���Թ</strong><br />
�����ٴ��� �觻ѹ����ͧ��������Ҩ��繡�����͡���ͷ��Թ �繵�
<? } ?>
<? if($_GET['bID'] == "5"){ ?>
<font size="4">Rent</font></strong><br /><strong>�Ҥ����� ,��ͧ��� ,�֡��� ,��ͧ�ѡ ,������ ,��ͧ��ҧ������</strong><br />
�����ٴ��� �觻ѹ����ͧ��������Ҩ��繡�������ͧ�ѡ ��ͧ��ҧ������ �Ҥ����� �֡��� �繵� 
<? } ?>
<? if($_GET['bID'] == "6"){ ?>
<font size="4">Furniture</font></strong><br /><strong>�ػ��쵡�觺�ҹ ,�ػ�ó��ӹѡ�ҹ ,���� ,������ ,���������</strong><br />
�����ٴ��� �觻ѹ����ͧ��������Ҩ����ػ��쵡�觺�ҹ �ػ�ó��ӹѡ�ҹ ������ ��������� �繵�
<? } ?>
<? if($_GET['bID'] == "7"){ ?>
<font size="4">Car</font></strong><br /><strong>ö¹�� ,ö����ͧ ,ö¹������ͧ ,ö���� ,ö��÷ء</strong><br />
�����ٴ��� �觻ѹ����ͧ��������Ҩ���ö¹�� ö¹������ͧ ö���� ö��÷ء �繵�
<? } ?>
<? if($_GET['bID'] == "8"){ ?>
<font size="4">Others</font></strong><br /><strong>ö�Ѻ��ҧ ,�غ�֡ ,���Ͷ͹��ҹ ,�����ӹѡ�ҹ ������ �</strong><br />
�����ٴ��� �觻ѹ����ͧ��������Ҩ���ö�Ѻ��ҧ ���Ͷ͹��ҹ �غ�֡ �����ӹѡ�ҹ �繵� 
<? } ?>
</div>
</div>

<div class="rightwebboard">
<strong>��з����Ǵ��������&nbsp;<?
$sql1 = "SELECT * FROM webboard where wType = '".$_GET['bID']."'";
$result1 = $db->query($sql1);
echo $num1 = mysql_num_rows($result1);
?>&nbsp;��з��</strong><br />
��з������ش��:&nbsp;<?
$sql1desc = "SELECT * FROM webboard where wType = '".$_GET['bID']."' order by wDate_Create desc limit 0,1";
$result1desc = $db->query($sql1desc);
$fetch1desc = mysql_fetch_array($result1desc);

$sql1descm = "SELECT * FROM member where mID = '".$fetch1desc['mID']."' ";
$result1descm = $db->query($sql1descm);
$fetch1descm = mysql_fetch_array($result1descm);
echo $fetch1descm['mUsername'];
?><br />
�ѹ���:&nbsp;<?=$fetch1desc['wDate_Create']?>
</div>
</div>
<?

$q="SELECT * FROM webboard where wStatus = '1' and wType = '".$_GET['bID']."' ";
$q.=" order by wDate_Create desc";
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


$sqlall = "SELECT * FROM webboard where wStatus = '1' and wType = '".$_GET['bID']."' order by wDate_Create desc limit 0,30";
$resultall = $db->query($sqlall);
while($fetchall = mysql_fetch_array($qr)){

$sqlre = "SELECT * FROM rejob where wID = '".$fetchall['wID']."'";
$resultre = $db->query($sqlre);
$numre= mysql_num_rows($resultre);

$titleb = str_replace(' ','-', $fetchall['wTitle']);
$titleb = str_replace('#','-', $titleb);
$titleb = str_replace('%','-', $titleb);

$sqlm = "SELECT * FROM member where mID = '".$fetchall['mID']."' ";
$resultm = $db->query($sqlm);
$fetchm = mysql_fetch_array($resultm);
?>
<div class="webboardlisttype">
<img src="<?=$page_link?>/images/list-webboard.png" alt="<?=$fetchall['wTitle']?>" title="<?=$fetchall['wTitle']?>" />&nbsp;&nbsp;<b><a href="<?=$page_link?>/board/<?=$titleb?>/<?=$fetchall['wID']?>/<?=$fetchall['wType']?>" title="<?=$fetchall['wTitle']?>" target="_blank"><u><?=$fetchall['wTitle']?></u></a></b>&nbsp;&nbsp;<font size="1"><b>��:</b>&nbsp;<?=$fetchm['mUsername']?>&nbsp;&nbsp;<b>�ѹ���:</b>&nbsp;<?=$fetchall['wDate_Create']?></font><font color="#FF0099">&nbsp;��ҹ:&nbsp;<strong><?=$fetchall['wRead']?></strong>&nbsp;,�ͺ:&nbsp;<strong><?=$numre?></strong></font><br />
</div>
<?
}
?>

<?php if($total>0){ ?>˹��&nbsp;:&nbsp;
<div class="browse_page">
 <?php   
 // ���¡��ҹ�ѧ���� ����Ѻ�ʴ������˹��   
  page_navigatorboard($before_p,$plus_p,$total,$total_p,$chk_page,"&bID=".$_GET['bID']."");    
  ?> 
</div>
<?php } ?>
<br />
</div>

<!--FOOTER-->
<div class="footer"><br /><? include "include-footer.php"; ?></div>

</center>
</body>
</html>
