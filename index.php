<?php
include ('lib/connect.php') ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>โพสขายฟรี - Postkai.com</title>
<meta name="Keywords" content="??ѧ???????Ѿ??,??ѧ??,????,???,??????,??ҹ,??ҹ????ͧ,??ҹ?????,??ҹ?Ѵ???,???ͺ?ҹ????ͧ,???͢?º?ҹ,ŧ??С?ȿ??,??ǹ???????,???ͷ?ǹ???????,??·??Թ,???ͷ??Թ,???ͤ͹???????,??¤͹???????,??Ҥ͹???????,????ö¹??????ͧ,???ö¹??????ͧ,???ö¹??,??ͧ???" />
<meta name="Description" content="??ѧ???????Ѿ?? ??ѧ?? ???? ??? ?????? ??ҹ ??ҹ????ͧ ??ҹ????? ??ҹ?Ѵ??? ???ͺ?ҹ????ͧ ???͢?º?ҹ ŧ??С?ȿ?? ??ǹ??????? ???ͷ?ǹ??????? ??·??Թ ???ͷ??Թ ???ͤ͹??????? ??¤͹??????? ??Ҥ͹??????? ????ö¹??????ͧ ???ö¹??????ͧ ???ö¹?? ??ͧ???" />
<meta name="robots" content="index,follow" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $page_link;?>/favicon.ico" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $page_link;?>/js/checkmember.js"></script>
<script type="text/javascript">
function bookmark(title,url){
	if(window.sidebar){ // ????Ѻ firefox
		window.sidebar.addPanel(title, url, "");
	}else if(window.opera & window.print){ // ????Ѻ opera
		var elem = document.createElement('a');
		elem.setAttribute('href',url);
		elem.setAttribute('title',title);
		elem.setAttribute('rel','sidebar');
		elem.click();
	}else if(document.all){// ????Ѻ ie
		window.external.AddFavorite(url, title);
	}
}
</script>
</head>
<body onload="document.getElementById('showtop10allwebHouse').style.display='';">
<center>
<!--HEAD-->
<div class="head">
<div class="headlogo"><?php include "include-logo.php"; ?></div>
<div class="headmember">
<?php include "include-member-menu.php"; ?>
</div>
</div>

<!--MENU-->
<div class="headmenu"><?php include "include-head-menu.php"; ?></div>

<!--MENUCAT-->
<div class="headcat">
<div class="menucat"><?php include "include-left-menu.php"; ?></div>
<div class="banner"><?php include "include-banner.php"; ?><?php include "include-remenu.php"; ?></div>
</div>


<!--CONTENT-->
<div class="content">
<div class="lnews"><?php include "include-news.php"; ?><?php include "include-rerandom.php"; ?></div>

<div class="rjob">
<div class="rjobleft">
<center>
</center><br /><br />
<a href="http://www.startconcept.com/" target="_blank"><img src="http://image.ohozaa.com/i6/yenta4.png" alt="Manga ???? Onepiece" class="b-s-ora"width="1" height="1" border="0" /></a>
<img src="images/20ID.jpg" /><?php include "include-top10-type.php"; ?><p class="alignrights"><a href="<?php echo $page_link;?>/property-search.php" title="??ѧ???????Ѿ???????"><strong>??ѧ???????Ѿ???????</strong></a></p>&nbsp;</div>
<div class="rjobright"><?php include "include-right-banner.php"; ?></div>

</div>
</div>

<!--FOOTER-->
<div class="footer"><br /><?php include "include-footer.php"; ?></div>

</center>
</body>
</html>
