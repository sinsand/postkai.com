<?php include 'config/isLogon.php' ; 
include '../lib/connect.php' ; 
$db = new mydb;

$sql = "SELECT * FROM banner WHERE bID = '".$_GET['bID']."'";
$result = $db->query($sql);
$row = mysql_fetch_array($result);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php echo $titles ; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<link href="css/style_text.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=JavaScript>

function uzXmlHttp(){
    var xmlhttp = false;
    try{
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    }catch(e){
        try{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }catch(e){
            xmlhttp = false;
        }
    }

    if(!xmlhttp && document.createElement){
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}


function validLength(item,min,max){
			return (item.length >= min) && (item.length<=max)
	}
	
function validEMail(mailObj){
		if (validLength(mailObj.value,1,50)){
			//return false;
			if (mailObj.value.search("^.+@.+\\..+$") != -1){
				return true;
			}else{ 
				return false;
 			}
		}else{	
			return false;
		}
	}
	 function emptyField(textObj) {
	   if (textObj.value.length == 0)
    		 return true;
	   for (var i=0; i<textObj.value.length; ++i) {
		     var ch = textObj.value.charAt(i);
		     if (ch != ' ' && ch != '	')
		        return false;
	   }
	   return true;
	 } 
	 
	function validLength(item,min,max){
			return (item.length >= min) && (item.length<=max)
	}
	function chkExe(exet){
	var i= exet.length-4;
	var e =	exet.substring(i, exet.length);
	return  ( e == '.jpg' || e == 'peg'|| e == '.JPG' || e == 'PEG' || e == '.gif' || e == '.GIF' || e == '.SWF' || e == '.swf' || e == 'swf' || e == '.png' || e == '.PNG' || e == 'png');
	}
	 
	function  validFormbanner() {

			if(emptyField(document.formbanner.bposition)){
				alert("��س����͡��Ҵ");
				document.formbanner.bposition.focus();
				return false;
			}
			if(emptyField(document.formbanner.bmonth)){
				alert("��س����͡��������");
				document.formbanner.bmonth.focus();
				return false;
			}		
			if(emptyField(document.formbanner.bdetail)){
				alert("��سҡ�͡��������´");
				document.formbanner.bdetail.focus();
				return false;
			}				
			
			if(document.formbanner.file1.value != ''){
				if(!(chkExe(document.formbanner.file1.value))){
					alert("���͡�ٻ�Ҿ��੾�� .JPG , GIF ���� .SWF ��ҹ��.");
					document.formbanner.file1.focus();
					return false;
				}
		}	
		if(document.formbanner.file2.value != ''){
				if(!(chkExe(document.formbanner.file2.value))){
					alert("���͡�ٻ�Ҿ��੾�� .JPG , GIF ���� .SWF ��ҹ��.");
					document.formbanner.file2.focus();
					return false;
				}
		}	
		if(document.formbanner.file3.value != ''){
				if(!(chkExe(document.formbanner.file3.value))){
					alert("���͡�ٻ�Ҿ��੾�� .JPG , GIF ���� .SWF ��ҹ��.");
					document.formbanner.file3.focus();
					return false;
				}
		}	
		if(document.formbanner.file4.value != ''){
				if(!(chkExe(document.formbanner.file4.value))){
					alert("���͡�ٻ�Ҿ��੾�� .JPG , GIF ���� .SWF ��ҹ��.");
					document.formbanner.file4.focus();
					return false;
				}
		}		
		if(document.formbanner.file5.value != ''){
				if(!(chkExe(document.formbanner.file5.value))){
					alert("���͡�ٻ�Ҿ��੾�� .JPG , GIF ���� .SWF ��ҹ��.");
					document.formbanner.file5.focus();
					return false;
				}
		}	
		if(document.formbanner.baddress.value==''){
				alert("��سҡ�͡�������");
				document.formbanner.baddress.focus();
				return false;
			}
			if(document.formbanner.bprovince.value==''){
				alert("��سҡ�͡���͡�ѧ��Ѵ");
				document.formbanner.bprovince.focus();
				return false;
			}
			if(document.formbanner.bzipcode.value==''){
				alert("��سҡ�͡������ɳ���");
				document.formbanner.bzipcode.focus();
				return false;
			}
		if(document.formbanner.btel.value==''){
				alert("��سҡ�͡�������Ѿ��");
				document.formbanner.btel.focus();
				return false;
			}
			if(emptyField(document.formbanner.capts)){
				alert("��سҡ�͡�����ٻ�Ҿ");
				document.formbanner.capts.focus();
				return false;
			}		
		if(! emptyField(document.formbanner.bemail)){
		if(! validEMail(document.formbanner.bemail)){ alert("��سҡ�͡���������١��ͧ"); document.formbanner.bemail.focus(); return false; }
				}else{
		alert("��سҡ�͡������");
		document.formbanner.bemail.focus(); return false;
		}
			aa=checkemail(document.formadd.bemail);
			
			if(aa=="Yes"){
				alert("��سҡ�͡���������١��ͧ");
				document.formbanner.bemail.value="";
				document.formbanner.bemail.focus();
			return false ;
			}
		
		

		
return true;
}																														//end function()


</SCRIPT>
<body>
<?php
error_reporting (E_ALL ^ E_NOTICE);
$limit = $_GET["limit"] ;
$offset = $_GET["offset"] ;
$db = new mydb;

?>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td height="70" colspan="3" class="contentbody"><font color="#464646" size="8">�������к�</font></td>
  </tr>
  <tr> 
    <td width="160" align="left" valign="top">
<?php include ('include_menu.php') ; ?></td>
    <td width="10" align="left" valign="top"><img src="images/spacer.gif" width="10" height="100"></td>
    <td width="100%" align="left" valign="top"> <table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td colspan="2" valign="top"></td>
        </tr>
        <tr> 
          <td width="50%" height="30" valign="middle" class="boldbodytx">���ẹ����</td>
          <td width="58%" height="30" valign="middle" class="boldbodytx"><div align="right"> 
             
<a href="banner_add.php"><font color="#000000">����ẹ����</font></a> 
            </div></td>
        </tr>
      </table>

      <div align="center" class="menutx">
	  
	  <form name="formbanner" id="formbanner" action="banner_top_function.php" method="post" enctype="multipart/form-data" onSubmit="return validFormbanner();">
  <table width="100%" height="442" border="0" class="menutx">
  <tr>
    <td colspan="2" style="padding-left:15px;">&nbsp;</td>
    </tr>
  <tr>
    <td width="24%">&nbsp;</td>
    <td width="76%">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">���͡��Ҵ : </td>
    <td align="left">&nbsp;
	<select name="bposition" class="box" id="bposition">
	<option value="">- ��س����͡��Ҵ -</option>
	<option value="A" <? if($row['bPosition'] =='A'){ ?> selected="selected" <? } ?>>C = 777x100</option>
	<option value="B" <? if($row['bPosition'] =='B'){ ?> selected="selected" <? } ?>>B = 777x100</option>
	<option value="D" <? if($row['bPosition'] =='D'){ ?> selected="selected" <? } ?>>A = 125x125</option>
  </select><font color="#CC0000">*</font>	</td>
  </tr>
  <tr>
    <td align="right">���͡�������� : </td>
    <td align="left">&nbsp;
	<select name="bmonth" class="box" id="bmonth">
	<option value="">- ��س����͡�������� -</option>
	<option value="1" <? if($row['bMonth'] =='1'){ ?> selected="selected" <? } ?>>1 ��͹</option>
	<option value="3" <? if($row['bMonth'] =='3'){ ?> selected="selected" <? } ?>>3 ��͹</option>
	<option value="6" <? if($row['bMonth'] =='6'){ ?> selected="selected" <? } ?>>6 ��͹</option>
	<option value="12" <? if($row['bMonth'] =='12'){ ?> selected="selected" <? } ?>>12 ��͹</option>
  </select><font color="#CC0000">*</font>	</td>
  </tr>
  <tr>
    <td align="right">������� / ��Ǣ�� : </td>
    <td align="left">&nbsp;
      <input name="btitle" type="text" id="btitle" size="30"  class="box" value="<? echo $row['bTitle']; ?>"> </td>
  </tr>
  <tr>
    <td align="right">URL : </td>
    <td align="left">&nbsp;
      <input name="burl" type="text" id="burl" size="30"  class="box" value="<?  echo $row['bURL']; ?>"></td>
  </tr>
  <tr>
    <td align="right">��������´ : </td>
    <td align="left">&nbsp;
      <textarea name="bdetail" cols="60" rows="7" id="bdetail"  class="box"><?  echo $row['bDetail']; ?></textarea>
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">�ٻ�Ҿ : </td>
    <td align="left">&nbsp;
	<?
	if($row['bPosition'] =='B'){
	$path = "../picture_banner/banner-left/";
	}
	if($row['bPosition'] =='C'){
	$path = "../picture_banner/banner-right/";
	}
	
	 if ($row['bPic1']!="" ) { 
					$checkpic =substring($row['bPic1'],-4,4) ;
					$flash = substring($row['bPic1'],0,-4) ; 
					if ($checkpic ==".swf" ){
					?>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="777" height="100">
  <param name="movie" value="<? echo $path; echo $row['bPic1']; ?>">
  <param name="quality" value="high">
  <embed src="<? echo $path; echo $row['bPic1']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="777" height="100"></embed>
</object><br>
					<?
					}else{
					echo"<img src='".$path."".$row['bPic1']."' align='absmiddle'><br>" ; 
					}
			   ?> &nbsp;
	  <input type="checkbox" name="unlinks1" value="<?php echo $row['bPic1'];?>" onClick="if(this.checked){document.all.file1.style.display='none';}else{document.all.file1.style.display='';}">���͡����ź�ٻ
     <? } ?>
	  <input type="file" name="file1" id="file1"  class="box" />
	  <input name="bpicture_old1" type="hidden" id="bpicture_old1"   value="<?php echo $row['bPic1']?>">
      <font color="#CC0000"> *</font><font color="#009900">����Ѻ��Ҵ B 777x100</font></td>
  </tr>
  <tr>
    <td align="right">�ٻ�Ҿ : </td>
    <td align="left"> &nbsp;
	<?
	 if ($row['bPic2']!="" ) { 
					$checkpic =substring($row['bPic2'],-4,4) ;
					$flash = substring($row['bPic2'],0,-4) ; 
					if ($checkpic ==".swf" ){
					?>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="125" height="125">
  <param name="movie" value="../picture_banner/banner-center/<? echo $row['bPic2']; ?>">
  <param name="quality" value="high">
  <embed src="../picture_banner/banner-center/<? echo $row['bPic2']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="150" height="150"></embed>
</object><br>
					<?
					}else{
					echo"<img src='../picture_banner/banner-center/".$row['bPic2']."'  align='absmiddle'><br>" ; 
					}
			   ?> &nbsp;
	  <input type="checkbox" name="unlinks2" value="<?php echo $row['bPic2'];?>" onClick="if(this.checked){document.all.file2.style.display='none';}else{document.all.file2.style.display='';}">���͡����ź�ٻ
     <? } ?>
	  <input type="file" name="file2" id="file2"  class="box" />
	  <input name="bpicture_old2" type="hidden" id="bpicture_old2"   value="<?php echo $row['bPic2']?>">
      <font color="#CC0000">*</font><font color="#009900">����Ѻ��Ҵ A 125x125</font></td>
  </tr>
  <tr>
    <td align="right">�ٻ�Ҿ : </td>
    <td align="left"> &nbsp;
	<?
	 if ($row['bPic3']!="" ) { 
					$checkpic =substring($row['bPic3'],-4,4) ;
					$flash = substring($row['bPic3'],0,-4) ; 
					if ($checkpic ==".swf" ){
					?>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="777" height="100">
  <param name="movie" value="../picture_banner/banner-top/<? echo $row['bPic3']; ?>">
  <param name="quality" value="high">
  <embed src="../picture_banner/banner-top/<? echo $row['bPic3']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="495" height="120"></embed>
</object><br>
					<?
					}else{
					echo"<img src='../picture_banner/banner-top/".$row['bPic3']."' align='absmiddle'><br>" ; 
					}
			   ?> &nbsp;
	  <input type="checkbox" name="unlinks3" value="<?php echo $row['bPic3'];?>" onClick="if(this.checked){document.all.file3.style.display='none';}else{document.all.file3.style.display='';}">���͡����ź�ٻ
     <? } ?>
	  <input type="file" name="file3" id="file3"  class="box" />
	  <input name="bpicture_old3" type="hidden" id="bpicture_old3"   value="<?php echo $row['bPic3']?>">
      <font color="#CC0000">*</font><font color="#009900">����Ѻ��Ҵ C 777x100 </font></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">�ٻ��Ҵ�˭�&nbsp; : </td>
    <td align="left"> &nbsp;
	<?
	 if ($row['bPic4']!="" ) { 
					$checkpic =substring($row['bPic4'],-4,4) ;
					$flash = substring($row['bPic4'],0,-4) ; 
					if ($checkpic ==".swf" ){
					?>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="500">
  <param name="movie" value="../picture_banner/banner-large/banner-large-1/<? echo $row['bPic4']; ?>">
  <param name="quality" value="high">
  <embed src="../picture_banner/banner-large/banner-large-1/<? echo $row['bPic4']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="500"></embed>
</object><br>
					<?
					}else{
					echo"<img src='../picture_banner/banner-large/banner-large-1/".$row['bPic4']."' align='absmiddle'><br>" ; 
					}
			   ?> &nbsp;
	  <input type="checkbox" name="unlinks4" value="<?php echo $row['bPic4'];?>" onClick="if(this.checked){document.all.file4.style.display='none';}else{document.all.file4.style.display='';}">���͡����ź�ٻ
     <? } ?>
	  <input type="file" name="file4" id="file4"  class="box" />
	  <input name="bpicture_old4" type="hidden" id="bpicture_old4"   value="<?php echo $row['bPic4']?>"></td>
  </tr>
  <tr>
    <td align="right">�ٻ��Ҵ�˭�&nbsp; : </td>
    <td align="left">&nbsp; 
	<?
	 if ($row['bPic5']!="" ) { 
					$checkpic =substring($row['bPic5'],-4,4) ;
					$flash = substring($row['bPic5'],0,-4) ; 
					if ($checkpic ==".swf" ){
					?>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="500">
  <param name="movie" value="../picture_banner/banner-large/banner-large-2/<? echo $row['bPic5']; ?>">
  <param name="quality" value="high">
  <embed src="../picture_banner/banner-large/banner-large-2/<? echo $row['bPic5']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="500"></embed>
</object><br>
					<?
					}else{
					echo"<img src='../picture_banner/banner-large/banner-large-2/".$row['bPic5']."' align='absmiddle'><br>" ; 
					}
			   ?> &nbsp;
	  <input type="checkbox" name="unlinks5" value="<?php echo $row['bPic5'];?>" onClick="if(this.checked){document.all.file5.style.display='none';}else{document.all.file5.style.display='';}">���͡����ź�ٻ
     <? } ?>
	  <input type="file" name="file5" id="file5"  class="box" />
	  <input name="bpicture_old5" type="hidden" id="bpicture_old5"   value="<?php echo $row['bPic5']?>"></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">�������㹡�õԴ���&nbsp; : </td>
    <td align="left">
      &nbsp; 
      <textarea name="baddress" cols="60" rows="7" class="box" id="baddress"><?  echo $row['bAddress']; ?></textarea>
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">�ѧ��Ѵ : </td>
    <td align="left">&nbsp;
	<select name="bprovince" id="bprovince" tabindex="26" style="width: 175px" class="box">
	<option selected="selected" value=""> - ��س����͡�ѧ��Ѵ - </option>
	<option value="��к��" <? if($row['bProvince'] == "��к��"){ ?> selected="selected" <? } ?>>��к��</option>
	<option value="��ا෾��ҹ��" <? if($row['bProvince'] == "��ا෾��ҹ��"){ ?> selected="selected" <? } ?>>��ا෾��ҹ��</option>
	<option value="�ҭ������" <? if($row['bProvince'] == "�ҭ������"){ ?> selected="selected" <? } ?>>�ҭ������</option>
	<option value="����Թ���" <? if($row['bProvince'] == "����Թ���"){ ?> selected="selected" <? } ?>>����Թ���</option>
	<option value="��ᾧྪ�" <? if($row['bProvince'] == "��ᾧྪ�"){ ?> selected="selected" <? } ?>>��ᾧྪ�</option>
	<option value="�͹��" <? if($row['bProvince'] == "�͹��"){ ?> selected="selected" <? } ?>>�͹��</option>
	<option value="�ѹ�����" <? if($row['bProvince'] == "�ѹ�����"){ ?> selected="selected" <? } ?>>�ѹ�����</option>
	<option value="���ԧ���" <? if($row['bProvince'] == "���ԧ���"){ ?> selected="selected" <? } ?>>���ԧ���</option>
	<option value="�ź���" <? if($row['bProvince'] == "�ź���"){ ?> selected="selected" <? } ?>>�ź���</option>
	<option value="��¹ҷ" <? if($row['bProvince'] == "��¹ҷ"){ ?> selected="selected" <? } ?>>��¹ҷ</option>
	<option value="�������" <? if($row['bProvince'] == "�������"){ ?> selected="selected" <? } ?>>�������</option>
	<option value="�����" <? if($row['bProvince'] == "�����"){ ?> selected="selected" <? } ?>>�����</option>
	<option value="��§���" <? if($row['bProvince'] == "��§���"){ ?> selected="selected" <? } ?>>��§���</option>
	<option value="��§����" <? if($row['bProvince'] == "��§����"){ ?> selected="selected" <? } ?>>��§����</option>
	<option value="��ѧ" <? if($row['bProvince'] == "��ѧ"){ ?> selected="selected" <? } ?>>��ѧ</option>
	<option value="��Ҵ" <? if($row['bProvince'] == "��Ҵ"){ ?> selected="selected" <? } ?>>��Ҵ</option>
	<option value="�ҡ" <? if($row['bProvince'] == "�ҡ"){ ?> selected="selected" <? } ?>>�ҡ</option>
	<option value="��ù�¡" <? if($row['bProvince'] == "��ù�¡"){ ?> selected="selected" <? } ?>>��ù�¡</option>
	<option value="��û��" <? if($row['bProvince'] == "��û��"){ ?> selected="selected" <? } ?>>��û��</option>
	<option value="��þ��" <? if($row['bProvince'] == "��þ��"){ ?> selected="selected" <? } ?>>��þ��</option>
	<option value="����Ҫ����" <? if($row['bProvince'] == "����Ҫ����"){ ?> selected="selected" <? } ?>>����Ҫ����</option>
	<option value="�����ո����Ҫ" <? if($row['bProvince'] == "�����ո����Ҫ"){ ?> selected="selected" <? } ?>>�����ո����Ҫ</option>
	<option value="������ä�" <? if($row['bProvince'] == "������ä�"){ ?> selected="selected" <? } ?>>������ä�</option>
	<option value="�������" <? if($row['bProvince'] == "�������"){ ?> selected="selected" <? } ?>>�������</option>
	<option value="��Ҹ����" <? if($row['bProvince'] == "��Ҹ����"){ ?> selected="selected" <? } ?>>��Ҹ����</option>
	<option value="��ҹ" <? if($row['bProvince'] == "��ҹ"){ ?> selected="selected" <? } ?>>��ҹ</option>
	<option value="���������" <? if($row['bProvince'] == "���������"){ ?> selected="selected" <? } ?>>���������</option>
	<option value="�����ҹ�" <? if($row['bProvince'] == "�����ҹ�"){ ?> selected="selected" <? } ?>>�����ҹ�</option>
	<option value="��ШǺ���բѹ��" <? if($row['bProvince'] == "��ШǺ���բѹ��"){ ?> selected="selected" <? } ?>>��ШǺ���բѹ��</option>
	<option value="��Ҩչ����" <? if($row['bProvince'] == "��Ҩչ����"){ ?> selected="selected" <? } ?>>��Ҩչ����</option>
	<option value="�ѵ�ҹ�" <? if($row['bProvince'] == "�ѵ�ҹ�"){ ?> selected="selected" <? } ?>>�ѵ�ҹ�</option>
	<option value="��й�������ظ��" <? if($row['bProvince'] == "��й�������ظ��"){ ?> selected="selected" <? } ?>>��й�������ظ��</option>
	<option value="�����" <? if($row['bProvince'] == "�����"){ ?> selected="selected" <? } ?>>�����</option>
	<option value="�ѧ��" <? if($row['bProvince'] == "�ѧ��"){ ?> selected="selected" <? } ?>>�ѧ��</option>
	<option value="�ѷ�ا" <? if($row['bProvince'] == "�ѷ�ا"){ ?> selected="selected" <? } ?>>�ѷ�ا</option>
	<option value="�ԨԵ�" <? if($row['bProvince'] == "��ɳ��š"){ ?> selected="selected" <? } ?>>�ԨԵ�</option>
	<option value="��ɳ��š" <? if($row['bProvince'] == "��к��"){ ?> selected="selected" <? } ?>>��ɳ��š</option>
	<option value="ྪú���" <? if($row['bProvince'] == "ྪú���"){ ?> selected="selected" <? } ?>>ྪú���</option>
	<option value="ྪú�ó�" <? if($row['bProvince'] == "ྪú�ó�"){ ?> selected="selected" <? } ?>>ྪú�ó�</option>
	<option value="���" <? if($row['bProvince'] == "���"){ ?> selected="selected" <? } ?>>���</option>
	<option value="����" <? if($row['bProvince'] == "����"){ ?> selected="selected" <? } ?>>����</option>
	<option value="�����ä��" <? if($row['bProvince'] == "�����ä��"){ ?> selected="selected" <? } ?>>�����ä��</option>
	<option value="�ء�����" <? if($row['bProvince'] == "�ء�����"){ ?> selected="selected" <? } ?>>�ء�����</option>
	<option value="�����ͧ�͹" <? if($row['bProvince'] == "�����ͧ�͹"){ ?> selected="selected" <? } ?>>�����ͧ�͹</option>
	<option value="��ʸ�" <? if($row['bProvince'] == "��ʸ�"){ ?> selected="selected" <? } ?>>��ʸ�</option>
	<option value="����" <? if($row['bProvince'] == "����"){ ?> selected="selected" <? } ?>>����</option>
	<option value="�������" <? if($row['bProvince'] == "�������"){ ?> selected="selected" <? } ?>>�������</option>
	<option value="�йͧ" <? if($row['bProvince'] == "�йͧ"){ ?> selected="selected" <? } ?>>�йͧ</option>
	<option value="���ͧ" <? if($row['bProvince'] == "���ͧ"){ ?> selected="selected" <? } ?>>���ͧ</option>
	<option value="�Ҫ����" <? if($row['bProvince'] == "�Ҫ����"){ ?> selected="selected" <? } ?>>�Ҫ����</option>
	<option value="ž����" <? if($row['bProvince'] == "ž����"){ ?> selected="selected" <? } ?>>ž����</option>
	<option value="�ӻҧ" <? if($row['bProvince'] == "�ӻҧ"){ ?> selected="selected" <? } ?>>�ӻҧ</option>
	<option value="�Ӿٹ" <? if($row['bProvince'] == "�Ӿٹ"){ ?> selected="selected" <? } ?>>�Ӿٹ</option>
	<option value="���" <? if($row['bProvince'] == "���"){ ?> selected="selected" <? } ?>>���</option>
	<option value="�������" <? if($row['bProvince'] == "�������"){ ?> selected="selected" <? } ?>>�������</option>
	<option value="ʡŹ��" <? if($row['bProvince'] == "ʡŹ��"){ ?> selected="selected" <? } ?>>ʡŹ��</option>
	<option value="ʧ���" <? if($row['bProvince'] == "ʧ���"){ ?> selected="selected" <? } ?>>ʧ���</option>
	<option value="ʵ��" <? if($row['bProvince'] == "ʵ��"){ ?> selected="selected" <? } ?>>ʵ��</option>
	<option value="��طû�ҡ��" <? if($row['bProvince'] == "��طû�ҡ��"){ ?> selected="selected" <? } ?>>��طû�ҡ��</option>
	<option value="��ط�ʧ����" <? if($row['bProvince'] == "��ط�ʧ����"){ ?> selected="selected" <? } ?>>��ط�ʧ����</option>
	<option value="��ط��Ҥ�" <? if($row['bProvince'] == "��ط��Ҥ�"){ ?> selected="selected" <? } ?>>��ط��Ҥ�</option>
	<option value="������" <? if($row['bProvince'] == "������"){ ?> selected="selected" <? } ?>>������</option>
	<option value="��к���" <? if($row['bProvince'] == "��к���"){ ?> selected="selected" <? } ?>>��к���</option>
	<option value="�ԧ�����" <? if($row['bProvince'] == "�ԧ�����"){ ?> selected="selected" <? } ?>>�ԧ�����</option>
	<option value="��⢷��" <? if($row['bProvince'] == "��⢷��"){ ?> selected="selected" <? } ?>>��⢷��</option>
	<option value="�ؾ�ó����" <? if($row['bProvince'] == "�ؾ�ó����"){ ?> selected="selected" <? } ?>>�ؾ�ó����</option>
	<option value="����ɯ��ҹ�" <? if($row['bProvince'] == "����ɯ��ҹ�"){ ?> selected="selected" <? } ?>>����ɯ��ҹ�</option>
	<option value="���Թ���" <? if($row['bProvince'] == "���Թ���"){ ?> selected="selected" <? } ?>>���Թ���</option>
	<option value="˹ͧ���" <? if($row['bProvince'] == "˹ͧ���"){ ?> selected="selected" <? } ?>>˹ͧ���</option>
	<option value="˹ͧ�������" <? if($row['bProvince'] == "˹ͧ�������"){ ?> selected="selected" <? } ?>>˹ͧ�������</option>
	<option value="�غ��Ҫ�ҹ�" <? if($row['bProvince'] == "�غ��Ҫ�ҹ�"){ ?> selected="selected" <? } ?>>�غ��Ҫ�ҹ�</option>
	<option value="��ҧ�ͧ" <? if($row['bProvince'] == "��ҧ�ͧ"){ ?> selected="selected" <? } ?>>��ҧ�ͧ</option>
	<option value="�ӹҨ��ԭ" <? if($row['bProvince'] == "�ӹҨ��ԭ"){ ?> selected="selected" <? } ?>>�ӹҨ��ԭ</option>
	<option value="�شøҹ�" <? if($row['bProvince'] == "�شøҹ�"){ ?> selected="selected" <? } ?>>�شøҹ�</option>
	<option value="�صôԵ��" <? if($row['bProvince'] == "�صôԵ��"){ ?> selected="selected" <? } ?>>�صôԵ��</option>
	<option value="�ط�¸ҹ�" <? if($row['bProvince'] == "�ط�¸ҹ�"){ ?> selected="selected" <? } ?>>�ط�¸ҹ�</option>
</select><font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td align="right">������ɳ��� : </td>
    <td align="left">
      &nbsp; 
      <input name="bzipcode" type="text" class="box" id="bzipcode" size="30" value="<?  echo $row['bZipcode']; ?>">
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td align="right">������&nbsp; : </td>
    <td align="left">&nbsp;
      <input name="bemail" type="text" id="bemail" size="30"  class="box" value="<?  echo $row['bEmail']; ?>"> <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">�������Ѿ�� : </td>
    <td align="left">&nbsp;
      <input name="btel" type="text" id="btel" size="30" class="box" value="<?  echo $row['bTel']; ?>"> <font color="#CC0000">*</font></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left">
      &nbsp; <input name="flag" id="flag" type="hidden" value="editbanner">
	  <input name="offset" type="hidden" id="offset" value="<?php echo $_REQUEST["offset"]; ?>">
      <input name="limit" type="hidden" id="limit" value="<?php echo $_REQUEST["limit"]; ?>">
	  <input name="bID" type="hidden" id="bID" value="<?php echo $_GET['bID']; ?>">
      <input type="submit" name="Submit" value="  ��ŧ  " class="box">   </td>
  </tr>
</table>
  </form>
	  
	  <?php echo $msg ; ?></div></td>
        </tr>
      </table>
      <p class="bodytx">&nbsp;</p></td>
  </tr>
  <tr valign="top"> 
    <td colspan="3"><img src="images/spacer.gif" width="200" height="10"></td>
  </tr>
  <tr align="center" valign="top"> 
    <td height="23" colspan="3"><div align="center"> <img src="images/spacer.gif" width="1" height="1"> 
        
      </div>
    </td>
  </tr>
</table>
<?php $db->close() ; ?>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
