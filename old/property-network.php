<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>ติดต่อแลกลิ้งค์เป็นเพื่อนบ้านกับเรา</title>
<meta name="Keywords" content="แลกลิ้งค์,ติดต่อแลกลิ้งค์เพื่อนบ้าน,อสังหาริมทรัพย์,อสังหา,ซื้อ,ขาย,ให้เช่า,บ้าน,บ้านมือสอง,บ้านเดี่ยว,บ้านจัดสรร,ซื้อบ้านมือสอง,ซื้อขายบ้าน,ลงประกาศฟรี,ทาวน์เฮ้าส์,ขายที่ดิน,ซื้อที่ดิน" />
<meta name="Description" content="แลกลิ้งค์ ติดต่อแลกลิ้งค์เพื่อนบ้าน อสังหาริมทรัพย์ อสังหา ซื้อ ขาย ให้เช่า บ้าน บ้านมือสอง บ้านเดี่ยว บ้านจัดสรร ซื้อบ้านมือสอง ซื้อขายบ้าน ลงประกาศฟรี ทาวน์เฮ้าส์  ขายที่ดิน ซื้อที่ดิน ซื้อคอนโดมิเนียม" />
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
<img src="<?=$page_link?>/images/property_network.jpg" alt="ติดต่อแลกลิ้งค์เป็นเพื่อนบ้านกับเรา" title="ติดต่อแลกลิ้งค์เป็นเพื่อนบ้านกับเรา" /><br />

<div class="alink">
<strong>Banner&nbsp;Link&nbsp;:</strong>
<a href="http://www.singburin.net/" target="_blank"><img src="<?=$page_link?>/images/Singburin.gif" alt="ลงประกาศฟรี อสังหาริมทรัพย์  ซื้อ ขาย ให้เช่า บ้านเดี่ยว บ้านจัดสรร บ้านมือสอง ทาวน์เฮ้าส์ คอนโด ที่ดิน อาคาร เฟอร์นิเจอร์ บ้านเช่า ห้องเช่า รถยนต์ รถยนต์มือสอง" width="88" height="31" border="0" title="ลงประกาศฟรี อสังหาริมทรัพย์  ซื้อ ขาย ให้เช่า บ้านเดี่ยว บ้านจัดสรร บ้านมือสอง ทาวน์เฮ้าส์ คอนโด ที่ดิน อาคาร เฟอร์นิเจอร์ บ้านเช่า ห้องเช่า รถยนต์ รถยนต์มือสอง" /></a>
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
<a href="http://www.singburin.net/" target="_blank" title="ลงประกาศฟรี อสังหาริมทรัพย์  ซื้อ ขาย ให้เช่า บ้านเดี่ยว บ้านจัดสรร บ้านมือสอง ทาวน์เฮ้าส์ คอนโด ที่ดิน อาคาร เฟอร์นิเจอร์ บ้านเช่า ห้องเช่า รถยนต์ รถยนต์มือสอง">ลงประกาศฟรี&nbsp;อสังหาริมทรัพย์</a><br /><br />

<a href="http://www.singburin.net/" target="_blank" title="ลงประกาศฟรี อสังหาริมทรัพย์  ซื้อ ขาย ให้เช่า บ้านเดี่ยว บ้านจัดสรร บ้านมือสอง ทาวน์เฮ้าส์ คอนโด ที่ดิน อาคาร เฟอร์นิเจอร์ บ้านเช่า ห้องเช่า รถยนต์ รถยนต์มือสอง">ลงประกาศฟรี&nbsp;อสังหาริมทรัพย์</a>&nbsp;|&nbsp;<a title="ดูทีวีช่อง7 ดูทีวีออนไลน์ช่อง7" href="http://tv.zubzip.com/" target="_blank">ดูทีวีช่อง7</a>&nbsp;|&nbsp;<a href="http://www.ibuy.co.th/อสังหาริมทรัพย์/" target="_blank" title="อสังหาริมทรัพย์">อสังหาริมทรัพย์</a>&nbsp;|&nbsp;<a href="http://www.it-nano.com" target="_blank" title="ไอที-นาโน.คอม">ไอที-นาโน.คอม</a>&nbsp;|&nbsp;<a href="http://www.siamdevil.com" target="_blank" title="it เกมส์ ดาวน์โหลด เพลง โปรแกรม ภาพยนต์">it download</a>&nbsp;|&nbsp;<a href="http://architecture.gable-group.com" target="_blank" title="รับออกแบบบ้าน">รับออกแบบบ้าน</a>&nbsp;&nbsp;

</p>
<br /><br /><br />
<p style="padding-left:30px;">
แลกลิ้งค์แบบ&nbsp;Banner&nbsp;Link
<br />
<textarea name="textarea" cols="80" rows="3" class="box"><a href="http://www.singburin.net/" target="_blank"><img src="http://www.singburin.net/images/Singburin.gif" alt="ลงประกาศฟรี อสังหาริมทรัพย์  ซื้อ ขาย ให้เช่า บ้านเดี่ยว บ้านจัดสรร บ้านมือสอง ทาวน์เฮ้าส์ คอนโด ที่ดิน อาคาร เฟอร์นิเจอร์ บ้านเช่า ห้องเช่า รถยนต์ รถยนต์มือสอง" width="88" height="31" border="0"  /></a></textarea>
</p>
<br />
<p style="padding-left:30px;">
แลกลิ้งค์แบบ&nbsp;Text&nbsp;Link
<br />
<textarea name="textarea" cols="80" rows="2" class="box"><a href="http://www.singburin.net/" target="_blank" title="ลงประกาศฟรี อสังหาริมทรัพย์  ซื้อ ขาย ให้เช่า บ้านเดี่ยว บ้านจัดสรร บ้านมือสอง ทาวน์เฮ้าส์ คอนโด ที่ดิน อาคาร เฟอร์นิเจอร์ บ้านเช่า ห้องเช่า รถยนต์ รถยนต์มือสอง">ลงประกาศฟรี&nbsp;อสังหาริมทรัพย์</a></textarea>
</p>
<p style="padding-left:30px;">
<font color="#CC0000">*</font>&nbsp;ซึ่งหากท่านใดต้องการแลกลิ้งค์เป็นเพื่อนบ้านกับเราสามาถทำได้โดยการนำ&nbsp;Code&nbsp;ข้างบนไปติดที่หน้าเว็บของว็บไซต์ท่านแล้วส่งรายละเอียดแบนเนอร์ของเว็บไซต์ท่านมาที่ webmaster&nbsp;[at]&nbsp;singburin.net&nbsp;หรือ&nbsp;sarawoot.singburin&nbsp;[at]&nbsp;gmail.com&nbsp;เสร็จแล้าเราจะติดแลกลิ้งค์แบนเนอร์ของท่านตามรายละเอียดที่ท่านให้มาทันที&nbsp;ซึ่งท่านสามารถเลือกได้ว่าจะติดในลักษณะของ&nbsp;Text&nbsp;Link&nbsp;หรือว่า&nbsp;Banner&nbsp;Link&nbsp;หรือทั้งสองอย่างก็ได้ หวังอย่างสูงว่าเราจะได้เป็นเพื่อนบ้านกันตลอดไป <br /><br />
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
