<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>�Դ����š��駤������͹��ҹ�Ѻ���</title>
<meta name="Keywords" content="�š��駤�,�Դ����š��駤����͹��ҹ,��ѧ�������Ѿ��,��ѧ��,����,���,������,��ҹ,��ҹ����ͧ,��ҹ�����,��ҹ�Ѵ���,���ͺ�ҹ����ͧ,���͢�º�ҹ,ŧ��С�ȿ��,��ǹ�������,��·��Թ,���ͷ��Թ" />
<meta name="Description" content="�š��駤� �Դ����š��駤����͹��ҹ ��ѧ�������Ѿ�� ��ѧ�� ���� ��� ������ ��ҹ ��ҹ����ͧ ��ҹ����� ��ҹ�Ѵ��� ���ͺ�ҹ����ͧ ���͢�º�ҹ ŧ��С�ȿ�� ��ǹ�������  ��·��Թ ���ͷ��Թ ���ͤ͹�������" />
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
<img src="<?=$page_link?>/images/property_network.jpg" alt="�Դ����š��駤������͹��ҹ�Ѻ���" title="�Դ����š��駤������͹��ҹ�Ѻ���" /><br />

<div class="alink">
<strong>Banner&nbsp;Link&nbsp;:</strong>
<a href="http://www.singburin.net/" target="_blank"><img src="<?=$page_link?>/images/Singburin.gif" alt="ŧ��С�ȿ�� ��ѧ�������Ѿ��  ���� ��� ������ ��ҹ����� ��ҹ�Ѵ��� ��ҹ����ͧ ��ǹ������� �͹� ���Թ �Ҥ�� ��������� ��ҹ��� ��ͧ��� ö¹�� ö¹������ͧ" width="88" height="31" border="0" title="ŧ��С�ȿ�� ��ѧ�������Ѿ��  ���� ��� ������ ��ҹ����� ��ҹ�Ѵ��� ��ҹ����ͧ ��ǹ������� �͹� ���Թ �Ҥ�� ��������� ��ҹ��� ��ͧ��� ö¹�� ö¹������ͧ" /></a>
</p>
	<? 
		
	$sqlw = "select * from web_link where wStatus = '1' order by wDate_Create DESC limit 0,30";
	$resultw = $db->query($sqlw);
	$numw = mysql_num_rows($resultw);
	$i = 0;
	?>
	<table width="22%" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>
          <?
   while ($roww=mysql_fetch_array($resultw)) { 
   //echo $roww['wPic'];
	   if($i == 5){
		   echo "</tr><tr>";
		   $i = 0;
	   }
?>
          <td>
              <table width="100"  border="0" cellpadding="2" cellspacing="0">
                <tr>
                  <td width="96" height="17">&nbsp;</td>
                </tr>
                <tr>
                  <td><a href="<? echo $roww['wURL'];  ?>" target="_blank">
                    <? 
					if($roww['wPic']!="") 
					{ 
						 echo"<img src='$page_link/administrator/weblink/".$roww['wPic']."'  alt='".$roww['wDetail']."' width='88' height='31' title = '".$roww['wDetail']."' border = '0' />";  
                    } 
					else 
					{ 
                         echo"<img src='".$roww['wURLPic']."'  alt='".$roww['wDetail']."' width='88'  height='31' title = '".$roww['wDetail']."' border = '0' />";  
                     }
					 ?>
                  </a></td>
                </tr>
            </table></td>
          <?
  $i++;
}
?>
        </tr>
</table><br /><br />
<p style="padding-left:30px;">
<strong>Text&nbsp;Link&nbsp;:</strong>
<a href="http://www.singburin.net/" target="_blank" title="ŧ��С�ȿ�� ��ѧ�������Ѿ��  ���� ��� ������ ��ҹ����� ��ҹ�Ѵ��� ��ҹ����ͧ ��ǹ������� �͹� ���Թ �Ҥ�� ��������� ��ҹ��� ��ͧ��� ö¹�� ö¹������ͧ">ŧ��С�ȿ��&nbsp;��ѧ�������Ѿ��</a><br /><br />

<a href="http://www.singburin.net/" target="_blank" title="ŧ��С�ȿ�� ��ѧ�������Ѿ��  ���� ��� ������ ��ҹ����� ��ҹ�Ѵ��� ��ҹ����ͧ ��ǹ������� �͹� ���Թ �Ҥ�� ��������� ��ҹ��� ��ͧ��� ö¹�� ö¹������ͧ">ŧ��С�ȿ��&nbsp;��ѧ�������Ѿ��</a>&nbsp;|&nbsp;<a title="�ٷ��ժ�ͧ7 �ٷ����͹�Ź��ͧ7" href="http://tv.zubzip.com/" target="_blank">�ٷ��ժ�ͧ7</a>&nbsp;|&nbsp;<a href="http://www.ibuy.co.th/��ѧ�������Ѿ��/" target="_blank" title="��ѧ�������Ѿ��">��ѧ�������Ѿ��</a>&nbsp;|&nbsp;<a href="http://www.it-nano.com" target="_blank" title="�ͷ�-���.���">�ͷ�-���.���</a>&nbsp;|&nbsp;<a href="http://www.siamdevil.com" target="_blank" title="it ���� ��ǹ���Ŵ �ŧ ����� �Ҿ¹��">it download</a>&nbsp;|&nbsp;<a href="http://architecture.gable-group.com" target="_blank" title="�Ѻ�͡Ẻ��ҹ">�Ѻ�͡Ẻ��ҹ</a>&nbsp;&nbsp;

</p>
<br /><br /><br />
<p style="padding-left:30px;">
�š��駤�Ẻ&nbsp;Banner&nbsp;Link
<br />
<textarea name="textarea" cols="80" rows="3" class="box"><a href="http://www.singburin.net/" target="_blank"><img src="http://www.singburin.net/images/Singburin.gif" alt="ŧ��С�ȿ�� ��ѧ�������Ѿ��  ���� ��� ������ ��ҹ����� ��ҹ�Ѵ��� ��ҹ����ͧ ��ǹ������� �͹� ���Թ �Ҥ�� ��������� ��ҹ��� ��ͧ��� ö¹�� ö¹������ͧ" width="88" height="31" border="0"  /></a></textarea>
</p>
<br />
<p style="padding-left:30px;">
�š��駤�Ẻ&nbsp;Text&nbsp;Link
<br />
<textarea name="textarea" cols="80" rows="2" class="box"><a href="http://www.singburin.net/" target="_blank" title="ŧ��С�ȿ�� ��ѧ�������Ѿ��  ���� ��� ������ ��ҹ����� ��ҹ�Ѵ��� ��ҹ����ͧ ��ǹ������� �͹� ���Թ �Ҥ�� ��������� ��ҹ��� ��ͧ��� ö¹�� ö¹������ͧ">ŧ��С�ȿ��&nbsp;��ѧ�������Ѿ��</a></textarea>
</p>
<p style="padding-left:30px;">
<font color="#CC0000">*</font>&nbsp;����ҡ��ҹ㴵�ͧ����š��駤������͹��ҹ�Ѻ������Ҷ�����¡�ù�&nbsp;Code&nbsp;��ҧ��仵Դ���˹����红ͧ��䫵��ҹ��������������´ẹ����ͧ���䫵��ҹ�ҷ�� webmaster&nbsp;[at]&nbsp;singburin.net&nbsp;����&nbsp;sarawoot.singburin&nbsp;[at]&nbsp;gmail.com&nbsp;����������ҨеԴ�š��駤�ẹ����ͧ��ҹ�����������´����ҹ����ҷѹ��&nbsp;��觷�ҹ����ö���͡����ҨеԴ��ѡɳТͧ&nbsp;Text&nbsp;Link&nbsp;�������&nbsp;Banner&nbsp;Link&nbsp;���ͷ���ͧ���ҧ���� ��ѧ���ҧ�٧�����Ҩ��������͹��ҹ�ѹ��ʹ� <br /><br />
<strong>webmaster [at] singburin.net</strong>
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
