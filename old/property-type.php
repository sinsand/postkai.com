<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>��������ѧ�������Ѿ�� ŧ��С�ȿ�� ��ѧ�������Ѿ��  ���� ��� ������ ��ҹ����� ��ҹ�Ѵ��� ��ǹ������� �͹� ���Թ �Ҥ�� ��������� ��ͧ��� ö¹��</title>
<meta name="Keywords" content="��������ѧ�������Ѿ��,��ѧ�������Ѿ��,��ѧ��,����,���,������,��ҹ,��ҹ����ͧ,��ҹ�����,home,condo,building,rent,car,furniture,land" />
<meta name="Description" content="��������ѧ�������Ѿ�� ��ѧ�������Ѿ�� ��ѧ�� ���� ��� ������ ��ҹ ��ҹ����ͧ ��ҹ����� ��ҹ�Ѵ��� ���ͺ�ҹ����ͧ home condo building rent car furniture land" />
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
<img src="<?=$page_link?>/images/property_type.jpg" alt="��������ѧ�������Ѿ��" title="��������ѧ�������Ѿ��" /><br />

<div class="alink">
<table width="87%" border="0" align="center">
  <tr>
    <td width="23%" align="center"><img src="<?=$page_link?>/images/home.jpg" width="59" height="53" title="��ҹ ��ǹ������� ��ҹ�Ѵ��� ��ҹ����� ��ҹ����ͧ" alt="��ҹ ��ǹ������� ��ҹ�Ѵ��� ��ҹ����� ��ҹ����ͧ" /></td>
    <td width="26%" align="center"><img src="<?=$page_link?>/images/condo.jpg" width="60" height="46" title="�͹� �͹������� �Ҥ�êش" alt="�͹� �͹������� �Ҥ�êش" /></td>
    <td width="26%" align="center"><img src="<?=$page_link?>/images/building.jpg" width="51" height="53" title="�֡ �Ҥ�þҹԪ�� �ç�ҹ ⡴ѧ" alt="�֡ �Ҥ�þҹԪ�� �ç�ҹ ⡴ѧ" /></td>
    <td width="25%" align="center"><img src="<?=$page_link?>/images/land.jpg" width="52" height="58" title="���Թ���� ���Թ�Ѵ��� ���Թ" alt="���Թ���� ���Թ�Ѵ��� ���Թ" /></td>
    </tr>
  <tr>
    <td align="center"><h2><a href="<?=$page_link?>/��ҹ-��ǹ�������-��ҹ�Ѵ���-��ҹ�����-��ҹ����ͧ/house" title="��ҹ ��ǹ������� ��ҹ�Ѵ��� ��ҹ����� ��ҹ����ͧ">House</a></h2></td>
    <td align="center"><h2><a href="<?=$page_link?>/�͹�-�͹�������-�Ҥ�êش-�ŵ/condo" title="�͹� �͹������� �Ҥ�êش">Condo</a></h2></td>
    <td align="center"><h2><a href="<?=$page_link?>/�֡-�Ҥ�þҹԪ��-��ҹ���-�ç�ҹ-⡴ѧ/building" title="�֡ �Ҥ�þҹԪ�� �ç�ҹ ⡴ѧ">Building</a></h2></td>
    <td align="center"><h2><a href="<?=$page_link?>/���Թ����-���Թ�Ѵ���-���Թ����Ѻ����ɵ�/land" title="���Թ���� ���Թ�Ѵ��� ���Թ">Land</a></h2></td>
    </tr>
  <tr>
    <td colspan="4" align="center">-------------------------------------------------------------------------------------------------</td>
    </tr>
  <tr>
    <td align="center"><img src="<?=$page_link?>/images/rent.png" width="59" height="51" title="�Ҥ����� ��ͧ��� ��ҹ���" alt="�Ҥ����� ��ͧ��� ��ҹ���" /></td>
    <td align="center"><img src="<?=$page_link?>/images/furniture.jpg" width="54" height="52" title="�ػ��쵡�觺�ҹ �ػ�ó��ӹѡ�ҹ ���� ������" alt="�ػ��쵡�觺�ҹ �ػ�ó��ӹѡ�ҹ ���� ������" /></td>
    <td align="center"><img src="<?=$page_link?>/images/car.jpg" width="61" height="52" title="ö¹�� ö����ͧ ö�ѡ��ҹ¹��" alt="ö¹�� ö����ͧ ö�ѡ��ҹ¹��" /></td>
    <td align="center"><img src="<?=$page_link?>/images/others.jpg" width="45" height="46 " title="ö�Ѻ��ҧ �غ�֡ ���Ͷ͹��ҹ" alt="ö�Ѻ��ҧ �غ�֡ ���Ͷ͹��ҹ" /></td>
    </tr>
  <tr>
    <td align="center"><h2><a href="<?=$page_link?>/�Ҥ�����-��ͧ���-��ҹ���-�;ѡ/rent" title="�Ҥ����� ��ͧ��� ��ҹ���">Rent</a></h2></td>
    <td align="center"><h2><a href="<?=$page_link?>/�ػ��쵡�觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-��ҹ����-������/furniture" title="�ػ��쵡�觺�ҹ �ػ�ó��ӹѡ�ҹ ���� ������">Furniture</a></h2></td>
    <td align="center"><h2><a href="<?=$page_link?>/ö¹��-ö����ͧ-ö�ѡ��ҹ¹��/car" title="ö¹�� ö����ͧ ö�ѡ��ҹ¹��">Car</a></h2></td>
    <td align="center"><h2><a href="<?=$page_link?>/ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ-���ѡ/others" title="ö�Ѻ��ҧ �غ�֡ ���Ͷ͹��ҹ">Others</a></h2></td>
    </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
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
