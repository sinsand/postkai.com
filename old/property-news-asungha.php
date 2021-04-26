<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;

$sqlnews = "SELECT * FROM news where nID = '".$_GET['nID']."'";
$resultnews = $db->query($sqlnews);
$fetchnews = mysql_fetch_array($resultnews);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title><?=$fetchnews['nTitle']?></title>
<meta name="Keywords" content="ข่าวสาร,ข่าวอสังหาริมทรัพย์,อสังหาริมทรัพย์,อสังหา,ซื้อ,ขาย,ให้เช่า,บ้าน,บ้านมือสอง,บ้านเดี่ยว,บ้านจัดสรร,ลงประกาศฟรี" />
<meta name="Description" content="ข่าวสาร ข่าวอสังหาริมทรัพย์ อสังหาริมทรัพย์ อสังหา ซื้อ ขาย ให้เช่า บ้าน บ้านมือสอง บ้านเดี่ยว บ้านจัดสรร ลงประกาศฟรี" />
<meta name="robots" content="index,follow" />
<meta name="stats-in-th" content="f0f5" />
<link href="<?=$page_link?>/css/style.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" type="image/x-icon" href="<?=$page_link?>/favicon.ico" />
<script type="text/javascript" src="<?=$page_link?>/js/checkmember.js"></script>
<script type="text/javascript">
function bookmark(title,url){
	if(window.sidebar){ // สำหรับ firefox
		window.sidebar.addPanel(title, url, "");
	}else if(window.opera & window.print){ // สำหรับ opera
		var elem = document.createElement('a');
		elem.setAttribute('href',url);
		elem.setAttribute('title',title);
		elem.setAttribute('rel','sidebar');
		elem.click();
	}else if(document.all){// สำหรับ ie
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
<img src="<?=$page_link?>/images/asungha_news.jpg" alt="ข่าวอสังหาริมทรัพย์" title="ข่าวอสังหาริมทรัพย์" /><br />

<div class="alink">

</p>
<p class="paddingsing"><strong><h3><u><?=$fetchnews['nTitle']?></u></h3></strong></p><br />
<p align="center">
<?  if($fetchnews['nPic'] != "" ){  echo "<img src='$page_link/administrator/news/".$fetchnews['nPic']."' alt='".$fetchnews['nTitle']."' title='".$fetchnews['nTitle']."' /><br /><br />"; } ?>
</p>
<p style="padding-left:30px;">
<?=nl2br($fetchnews['nDetail'])?>
</p>
<strong>เมื่อวันที่&nbsp;:&nbsp;</strong><?=$fetchnews['nDate_Create']?>

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
