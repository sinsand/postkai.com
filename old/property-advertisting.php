<?php session_start();
include 'lib/connect.php' ; 
$db = new mydb ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>�Դ���ŧ�ɳ� ŧ��С�ȿ�� ��ѧ�������Ѿ��  ���� ��� ������ ��ҹ����� ��ҹ�Ѵ��� ��ǹ������� �͹� ���Թ �Ҥ�� ��������� ��ͧ��� ö¹��</title>
<meta name="Keywords" content="�Դ���ŧ�ɳ�,��ѧ�������Ѿ��,��ѧ��,����,���,������,��ҹ,��ҹ����ͧ,��ҹ�����,��ҹ�Ѵ���,���ͺ�ҹ����ͧ,���͢�º�ҹ,ŧ��С�ȿ��,��ǹ�������,���ͷ�ǹ�������,���ö¹��,��ͧ���" />
<meta name="Description" content="�Դ���ŧ�ɳ� ��ѧ�������Ѿ�� ��ѧ�� ���� ��� ������ ��ҹ ��ҹ����ͧ ��ҹ����� ��ҹ�Ѵ��� ���ͺ�ҹ����ͧ ���͢�º�ҹ ŧ��С�ȿ�� ��ǹ������� ���ͷ�ǹ������� ���ö¹�� ��ͧ���" />
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
<img src="<?=$page_link?>/images/contact-advertising.jpg" alt="�Դ���ŧ�ɳ�" title="�Դ���ŧ�ɳ�" /><br />

<div class="alink">
<table width="87%" border="0" align="center">
  <tr>
    <td width="23%" align="center"><strong>&nbsp;�ʴ����˹��ɳҵ�ҧ&nbsp;�&nbsp;�ͧ���䫵�</strong><br />
      <br /><img src="<?=$page_link?>/images/advertising.jpg" width="500" height="1100" title="�Դ���ŧ�ɳ�" alt="�Դ���ŧ�ɳ�" />
    <br /><br /><strong>ŧ�ɳҡѺ��纠www.singburin.net</strong><br /><br />
    
    <table width="100%"  border="0" cellpadding="0" cellspacing="0">
          <tr style="background-color:#FF6A6A;">
            <td height="31" align="center"><strong><font color="#FFFFFF">���˹��ɳ�</font></strong></td>
            <td align="center"><strong><font color="#FFFFFF">1 ��͹</font></strong> </td>
            <td align="center"><strong><font color="#FFFFFF">3 ��͹</font></strong> </td>
            <td align="center"><strong><font color="#FFFFFF">6 ��͹</font></strong> </td>
            <td align="center"><strong><font color="#FFFFFF">12 ��͹</font></strong> </td>
            <td align="center"><strong><font color="#FFFFFF">ʶҹ�</font></strong></td>
          </tr>
          <tr>
            <td width="23%" height="24" align="center">���˹� A1 </td>
            <td width="16%" align="center">1,000</td>
            <td width="16%" align="center">2,500</td>
            <td width="16%" align="center">5,000</td>
            <td width="15%" align="center">10,000</td>
            <td width="14%" align="center">��ҧ</td>
          </tr>
          <tr>
            <td height="23" align="center">���˹� B1</td>
            <td align="center">300</td>
            <td align="center">800</td>
            <td align="center">1,700</td>
            <td align="center">3,400</td>
            <td align="center">��ҧ</td>
          </tr>
          <tr>
            <td height="26" align="center">���˹� B2</td>
            <td align="center">300</td>
            <td align="center">800</td>
            <td align="center">1,700</td>
            <td align="center">3,400</td>
            <td align="center">��ҧ</td>
          </tr>
          <tr>
            <td height="27" align="center">���˹� C1</td>
            <td align="center">200</td>
            <td align="center">500</td>
            <td align="center">1,100</td>
            <td align="center">2,200</td>
            <td align="center">��ҧ</td>
          </tr>
          <tr>
            <td height="24" align="center">���˹� C2 </td>
            <td align="center">200</td>
            <td align="center">500</td>
            <td align="center">1,100</td>
            <td align="center">2,200</td>
            <td align="center">��ҧ</td>
          </tr>
          <tr>
            <td height="27" align="center">���˹� D1</td>
            <td align="center">200</td>
            <td align="center">500</td>
            <td align="center">1,100</td>
            <td align="center">2,200</td>
            <td align="center">�����ҧ</td>
          </tr>
          <tr>
            <td height="22" align="center">���˹� D2 </td>
            <td align="center">200</td>
            <td align="center">500</td>
            <td align="center">1,100</td>
            <td align="center">2,200</td>
            <td align="center">�����ҧ</td>
          </tr>
          <tr>
            <td height="22" align="center">���˹� D3</td>
            <td align="center">200</td>
            <td align="center">500</td>
            <td align="center">1,100</td>
            <td align="center">2,200</td>
            <td align="center">�����ҧ</td>
          </tr>
          <tr>
            <td height="22" align="center">���˹� D4</td>
            <td align="center">200</td>
            <td align="center">500</td>
            <td align="center">1,100</td>
            <td align="center">2,200</td>
            <td align="center">�����ҧ</td>
          </tr>
          <tr>
            <td height="22" align="center">���˹� D5</td>
            <td align="center">200</td>
            <td align="center">500</td>
            <td align="center">1,100</td>
            <td align="center">2,200</td>
            <td align="center">��ҧ</td>
          </tr>
          <tr>
            <td height="22" align="center">���˹� D6</td>
            <td align="center">200</td>
            <td align="center">500</td>
            <td align="center">1,100</td>
            <td align="center">2,200</td>
            <td align="center">��ҧ</td>
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
            <td height="22" colspan="2" align="left"><font color="#CC0000">**</font>&nbsp;�ء���˹��ʴ��ء˹��</td>
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
            <td height="22" colspan="5" align="left">�Ҥ��ɳҨл�ѺŴ���ͧŧ�ɳҡѺ�ҧ�������ӡ���&nbsp;3&nbsp;��͹������ҹ��<br />
              <br />
              <strong>��觷���ͧ���������Ѻ��õԴ���ŧ�ɳ�</strong><br />
1.&nbsp;�����ẹ���좹Ҵ��ҡѺ�����ɳҷ��ҧ���䫵��˹����<br />
2.&nbsp;�����&nbsp;url&nbsp;����Ѻ����ŧ�ɳҾ������������´��������� �<br />
<br />
<strong>�ҧ���䫵���Ҩ������Ѻ���䫵�ѧ���仹��</strong><br />
1.&nbsp;��纤�Ң������ǡѺ����ʾ�Դ&nbsp;��纡�þ�ѹ&nbsp;��觼Դ�����·ء��Դ<br />
2.&nbsp;��纼Դ���ա�����ͧ&nbsp;����������ҧ���������¡Ѻ������ͧ</td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td height="22" colspan="6" align="left"><table width="381" border="0" cellspacing="4">
              <tr>
                <td colspan="2">&nbsp;<strong>��ҹ����ö�����Թ������������´�����Ţ�ѭ�մ�ҹ��ҧ���</strong></td>
                </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
              <tr>
                <td align="right">��Ҥ��&nbsp;:&nbsp;</td>
                <td>��ا෾ �</td>
              </tr>
              <tr>
                <td width="85" align="right">���ͺѭ��&nbsp;:&nbsp;</td>
                <td width="209">�������ظ&nbsp;��պ��Թ���</td>
              </tr>
              <tr>
                <td align="right">�Ţ���ѭ��&nbsp;:&nbsp;</td>
                <td>916-0-05198-4</td>
              </tr>
              <tr>
                <td align="right">�Ң�&nbsp;:&nbsp;</td>
                <td>���������ŵ�ʺҧ��</td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" align="center">����ҡ��ҹ��͹�Թ�����º�������ǡ�س��駷��</td>
              </tr>
              <tr>
                <td colspan="2" align="center">�������ظ&nbsp;��պ��Թ���&nbsp;(��)&nbsp;��.&nbsp;083-3489908</td>
              </tr>
              <tr>
                <td colspan="2" align="center">����</td>
              </tr>
              <tr>
                <td colspan="2" align="center">E-Mail&nbsp;:&nbsp;webmaster&nbsp;[at]&nbsp;singburin.net </td>
              </tr>
              <tr>
                <td colspan="2" align="center">sarawoot.singburin [at] gmail.com</td>
                </tr>
              <tr>
                <td colspan="2">�����Ҩзӡ�õԴẹ����੾���١��ҷ������Թ����ҡ�͹��ҹ�鹤�Ѻ</td>
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
