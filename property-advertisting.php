<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>ติดต่อลงโฆษณา ลงประกาศฟรี อสังหาริมทรัพย์  ซื้อ ขาย ให้เช่า บ้านเดี่ยว บ้านจัดสรร ทาวน์เฮ้าส์ คอนโด ที่ดิน อาคาร เฟอร์นิเจอร์ ห้องเช่า รถยนต์</title>
<meta name="Keywords" content="ติดต่อลงโฆษณา,อสังหาริมทรัพย์,อสังหา,ซื้อ,ขาย,ให้เช่า,บ้าน,บ้านมือสอง,บ้านเดี่ยว,บ้านจัดสรร,ซื้อบ้านมือสอง,ซื้อขายบ้าน,ลงประกาศฟรี,ทาวน์เฮ้าส์,ซื้อทาวน์เฮ้าส์,เช่ารถยนต์,ห้องเช่า" />
<meta name="Description" content="ติดต่อลงโฆษณา อสังหาริมทรัพย์ อสังหา ซื้อ ขาย ให้เช่า บ้าน บ้านมือสอง บ้านเดี่ยว บ้านจัดสรร ซื้อบ้านมือสอง ซื้อขายบ้าน ลงประกาศฟรี ทาวน์เฮ้าส์ ซื้อทาวน์เฮ้าส์ เช่ารถยนต์ ห้องเช่า" />
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
<img src="<?=$page_link?>/images/contact-advertising.jpg" alt="ติดต่อลงโฆษณา" title="ติดต่อลงโฆษณา" /><br />

<div class="alink">
<table width="87%" border="0" align="center">
  <tr>
    <td width="23%" align="center"><strong>&nbsp;แสดงตำแหน่งโฆษณาต่าง&nbsp;ๆ&nbsp;ของเว็บไซต์</strong><br />
      <br /><img src="<?=$page_link?>/images/advertising.jpg" width="500" height="1100" title="ติดต่อลงโฆษณา" alt="ติดต่อลงโฆษณา" />
    <br /><br /><strong>ลงโฆษณากับเว็บ www.singburin.net</strong><br /><br />
    
    <table width="100%"  border="0" cellpadding="0" cellspacing="0">
          <tr style="background-color:#FF6A6A;">
            <td height="31" align="center"><strong><font color="#FFFFFF">ตำแหน่งโฆษณา</font></strong></td>
            <td align="center"><strong><font color="#FFFFFF">1 เดือน</font></strong> </td>
            <td align="center"><strong><font color="#FFFFFF">3 เดือน</font></strong> </td>
            <td align="center"><strong><font color="#FFFFFF">6 เดือน</font></strong> </td>
            <td align="center"><strong><font color="#FFFFFF">12 เดือน</font></strong> </td>
            <td align="center"><strong><font color="#FFFFFF">สถานะ</font></strong></td>
          </tr>
          <tr>
            <td width="23%" height="24" align="center">ตำแหน่ง A1 </td>
            <td width="16%" align="center">1,000</td>
            <td width="16%" align="center">2,500</td>
            <td width="16%" align="center">5,000</td>
            <td width="15%" align="center">10,000</td>
            <td width="14%" align="center">ว่าง</td>
          </tr>
          <tr>
            <td height="23" align="center">ตำแหน่ง B1</td>
            <td align="center">300</td>
            <td align="center">800</td>
            <td align="center">1,700</td>
            <td align="center">3,400</td>
            <td align="center">ว่าง</td>
          </tr>
          <tr>
            <td height="26" align="center">ตำแหน่ง B2</td>
            <td align="center">300</td>
            <td align="center">800</td>
            <td align="center">1,700</td>
            <td align="center">3,400</td>
            <td align="center">ว่าง</td>
          </tr>
          <tr>
            <td height="27" align="center">ตำแหน่ง C1</td>
            <td align="center">200</td>
            <td align="center">500</td>
            <td align="center">1,100</td>
            <td align="center">2,200</td>
            <td align="center">ว่าง</td>
          </tr>
          <tr>
            <td height="24" align="center">ตำแหน่ง C2 </td>
            <td align="center">200</td>
            <td align="center">500</td>
            <td align="center">1,100</td>
            <td align="center">2,200</td>
            <td align="center">ว่าง</td>
          </tr>
          <tr>
            <td height="27" align="center">ตำแหน่ง D1</td>
            <td align="center">200</td>
            <td align="center">500</td>
            <td align="center">1,100</td>
            <td align="center">2,200</td>
            <td align="center">ไม่ว่าง</td>
          </tr>
          <tr>
            <td height="22" align="center">ตำแหน่ง D2 </td>
            <td align="center">200</td>
            <td align="center">500</td>
            <td align="center">1,100</td>
            <td align="center">2,200</td>
            <td align="center">ไม่ว่าง</td>
          </tr>
          <tr>
            <td height="22" align="center">ตำแหน่ง D3</td>
            <td align="center">200</td>
            <td align="center">500</td>
            <td align="center">1,100</td>
            <td align="center">2,200</td>
            <td align="center">ไม่ว่าง</td>
          </tr>
          <tr>
            <td height="22" align="center">ตำแหน่ง D4</td>
            <td align="center">200</td>
            <td align="center">500</td>
            <td align="center">1,100</td>
            <td align="center">2,200</td>
            <td align="center">ไม่ว่าง</td>
          </tr>
          <tr>
            <td height="22" align="center">ตำแหน่ง D5</td>
            <td align="center">200</td>
            <td align="center">500</td>
            <td align="center">1,100</td>
            <td align="center">2,200</td>
            <td align="center">ว่าง</td>
          </tr>
          <tr>
            <td height="22" align="center">ตำแหน่ง D6</td>
            <td align="center">200</td>
            <td align="center">500</td>
            <td align="center">1,100</td>
            <td align="center">2,200</td>
            <td align="center">ว่าง</td>
          </tr>
          <tr>
            <td height="22" align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td height="22" colspan="2" align="left"><font color="#CC0000">**</font>&nbsp;ทุกตำแหน่งแสดงทุกหน้า</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td height="22" colspan="2" align="left">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td height="22" colspan="5" align="left">ราคาโฆษณาจะปรับลดได้ต้องลงโฆษณากับทางเว็บไม่ต่ำกว่า&nbsp;3&nbsp;เดือนขึ้นไปเท่านั้น<br />
              <br />
              <strong>สิ่งที่ต้องเตรียมสำหรับการติดต่อลงโฆษณา</strong><br />
1.&nbsp;เตรียมแบนเนอร์ขนาดเท่ากับป้ายโฆษณาที่ทางเว็บไซต์กำหนดไว้<br />
2.&nbsp;เตรียม&nbsp;url&nbsp;สำหรับที่จะลงโฆษณาพร้อมรายละเอียดที่จำเป็นอื่น ๆ<br />
<br />
<strong>ทางเว็บไซต์เราจะไม่ขอรับเว็บไซต์ดังต่อไปนี้</strong><br />
1.&nbsp;เว็บค้าขายเกี่ยวกับสิ่งเสพติด&nbsp;เว็บการพนัน&nbsp;สิ่งผิดกฏหมายทุกชนิด<br />
2.&nbsp;เว็บผิดโจมตีการเมือง&nbsp;หรือเว็บสร้างความวุ่นวายกับการเมือง</td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td height="22" colspan="6" align="left"><table width="381" border="0" cellspacing="4">
              <tr>
                <td colspan="2">&nbsp;<strong>ท่านสามารถชำระเงินได้ตามรายละเอียดหมายเลขบัญชีด้านล่างนี้</strong></td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
              <tr>
                <td align="right">ธนาคาร&nbsp;:&nbsp;</td>
                <td>กรุงเทพ ฯ</td>
              </tr>
              <tr>
                <td width="85" align="right">ชื่อบัญชี&nbsp;:&nbsp;</td>
                <td width="209">นายสราวุธ&nbsp;ศรีบุรินทร์</td>
              </tr>
              <tr>
                <td align="right">เลขที่บัญชี&nbsp;:&nbsp;</td>
                <td>916-0-05198-4</td>
              </tr>
              <tr>
                <td align="right">สาขา&nbsp;:&nbsp;</td>
                <td>ย่อยเทสโก้โลตัสบางปู</td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" align="center">ซึ่งหากท่านใดโอนเงินมาเรียบร้อยแล้วกรุณาแจ้งที่</td>
              </tr>
              <tr>
                <td colspan="2" align="center">นายสราวุธ&nbsp;ศรีบุรินทร์&nbsp;(ยู)&nbsp;โทร.&nbsp;083-3489908</td>
              </tr>
              <tr>
                <td colspan="2" align="center">หรือ</td>
              </tr>
              <tr>
                <td colspan="2" align="center">E-Mail&nbsp;:&nbsp;webmaster&nbsp;[at]&nbsp;singburin.net </td>
              </tr>
              <tr>
                <td colspan="2" align="center">sarawoot.singburin [at] gmail.com</td>
                </tr>
              <tr>
                <td colspan="2">ซึ่งเราจะทำการติดแบนเนอร์เฉพาะลูกค้าที่ชำระเงินเข้ามาก่อนเท่านั้นครับ</td>
                </tr>
            </table></td>
            </tr>
        </table>
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
