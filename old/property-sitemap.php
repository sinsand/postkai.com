<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Ἱ�ѧ���䫵�</title>
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
<img src="<?=$page_link?>/images/property_sitemap.jpg" alt="Ἱ�ѧ���䫵�" title="Ἱ�ѧ���䫵�" /><br />

<div class="alink">
<table width="90%" border="0" align="center" class="typepage">
  <tr>
    <td valign="top"><h4>
&raquo;&nbsp;<a href="index.php">˹���á</a><br />
&raquo;&nbsp;<a href="<?=$page_link?>/ŧ��С�ȿ��-��ѧ�������Ѿ��/ŧ��С�ȿ��" title="ŧ��С�ȿ����ѧ�������Ѿ��">ŧ��С�ȿ����ѧ�������Ѿ��</a><br />
&raquo;&nbsp;<a href="<?=$page_link?>/��ѧ�������Ѿ�������/property-all" title="��ѧ�������Ѿ�������">��ѧ�������Ѿ�������</a><br />
&raquo;&nbsp;<a href="<?=$page_link?>/����-��ѧ�������Ѿ��/search" title="������ѧ�������Ѿ��">������ѧ�������Ѿ��</a><br />
&raquo;&nbsp;<a href="<?=$page_link?>/��ѧ�������Ѿ��-type/type" title="��������ѧ�������Ѿ��">��������ѧ�������Ѿ��</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/��ҹ-��ǹ�������-��ҹ�Ѵ���-��ҹ�����-��ҹ����ͧ/house" title="��ҹ-��ǹ�������-��ҹ�Ѵ���-��ҹ�����-��ҹ����ͧ">House</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/�͹�-�͹�������-�Ҥ�êش-�ŵ/condo" title="�͹�-�͹�������-�Ҥ�êش-�ŵ">Condo</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/�֡-�Ҥ�þҹԪ��-��ҹ���-�ç�ҹ-⡴ѧ/building" title="�֡-�Ҥ�þҹԪ��-��ҹ���-�ç�ҹ-⡴ѧ">Building</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/���Թ����-���Թ�Ѵ���-���Թ����Ѻ����ɵ�/land" title="���Թ����-���Թ�Ѵ���-���Թ����Ѻ����ɵ�">Land</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/�Ҥ�����-��ͧ���-��ҹ���-�;ѡ/rent" title="�Ҥ�����-��ͧ���-��ҹ���-�;ѡ">Rent</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/�ػ��쵡�觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-��ҹ����-������/furniture" title="�ػ��쵡�觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-��ҹ����-������">Furniture</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/ö¹��-ö����ͧ-ö�ѡ��ҹ¹��/car" title="ö¹��-ö����ͧ-ö�ѡ��ҹ¹��">Car</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ-���ѡ/others" title="ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ-���ѡ">Others</a><br />
</h4>
</td>

    <td valign="top">
<h4>
&raquo;&nbsp;<a href="<?=$page_link?>/�������/news" title="������ѧ�������Ѿ��">��������</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/�������/news" title="������ѧ�������Ѿ��">������ѧ�������Ѿ��</a><br /> 
&raquo;&nbsp;<a href="<?=$page_link?>/��Ѥ���Ҫԡ/register" title="��Ҫԡ">��Ҫԡ</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/��Ѥ���Ҫԡ/register" title="��Ѥ���Ҫԡ">��Ѥ���Ҫԡ</a><br />
&nbsp;&nbsp;&nbsp;-&nbsp;<a href="<?=$page_link?>/������ʼ�ҹ/forgot-password" title="������ʼ�ҹ">������ʼ�ҹ</a><br />
</h4>
</td>

    <td valign="top">
<h4>
&raquo;&nbsp;<a href="<?=$page_link?>/�Դ���ŧ�ɳ�/advertisting" title="�Դ���ŧ�ɳ�">�Դ���ŧ�ɳ�</a><br />
&raquo;&nbsp;<a href="<?=$page_link?>/�Դ��ͪ����Թ/payment" title="�Դ��ͪ����Թ">�Դ��ͪ����Թ</a><br />
&raquo;&nbsp;<a href="<?=$page_link?>/�Դ������/contactus" title="�Դ������">�Դ������</a><br />
&raquo;&nbsp;<a href="<?=$page_link?>/�š��駤����͹��ҹ/link-network" title="���͹��ҹ">���͹��ҹ</a><br />
&raquo;&nbsp;<a href="<?=$page_link?>/Ἱ�ѧ���/sitemap" title="Ἱ�ѧ���䫵�">Ἱ�ѧ���䫵�</a><br />
</h4>
</td>
  </tr>
</table>

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
