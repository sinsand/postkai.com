<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>�Դ������</title>
<meta name="Keywords" content="�Դ������,��ѧ�������Ѿ��,��ѧ��,����,���,������,ŧ��С�ȿ��" />
<meta name="Description" content="�Դ������ ��ѧ�������Ѿ�� ��ѧ�� ���� ��� ������ ŧ��С�ȿ��" />
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
<img src="<?=$page_link?>/images/property_contactus.jpg" alt="�Դ������" title="�Դ������" /><br />

<div class="alink">
<strong><font size="2">�ء��ҹ����ö�Դ��ͼ������к����¡����������������Ѿ���ͺ��������������´��õԴ��ʹ�ҹ��ҧ</font></strong></p><br /><br />

<p><font size="2"><strong>����&nbsp;:&nbsp;</strong>�������ظ&nbsp;��պ��Թ���&nbsp;(��)<br /><br />
<strong>E-Mail&nbsp;:&nbsp;</strong>webmaster&nbsp;[at]&nbsp;singburin.net&nbsp;����&nbsp;sarawoot.singburin&nbsp;[at]&nbsp;gmail.com<br /><br />
<strong>Tel.&nbsp;:&nbsp;</strong>083-3489908</font>
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
