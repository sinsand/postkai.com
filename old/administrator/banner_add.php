<?php include 'config/isLogon.php' ; 
include '../lib/connect.php' ; ?>
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
          <td width="50%" height="30" valign="middle" class="boldbodytx">����ẹ����</td>
          <td width="58%" height="30" valign="middle" class="boldbodytx"><div align="right"> 
             
<a href="link_add.php?flag=Add"><font color="#000000">���������駤�</font></a> 
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
	<option value="A">C = 777x100</option>
	<option value="B">B = 777x100</option>
	<option value="D">A = 125x125</option>
  </select><font color="#CC0000">*</font>	</td>
  </tr>
  <tr>
    <td align="right">���͡�������� : </td>
    <td align="left">&nbsp;
	<select name="bmonth" class="box" id="bmonth">
	<option value="">- ��س����͡�������� -</option>
	<option value="1">1 ��͹</option>
	<option value="3">3 ��͹</option>
	<option value="6">6 ��͹</option>
	<option value="12">12 ��͹</option>
  </select><font color="#CC0000">*</font>	</td>
  </tr>
  <tr>
    <td align="right">������� / ��Ǣ�� : </td>
    <td align="left">&nbsp;
      <input name="btitle" type="text" id="btitle" size="30"  class="box" > </td>
  </tr>
  <tr>
    <td align="right">URL : </td>
    <td align="left">&nbsp;
      <input name="burl" type="text" id="burl" size="30"  class="box" ></td>
  </tr>
  <tr>
    <td align="right">��������´ : </td>
    <td align="left">&nbsp;
      <textarea name="bdetail" cols="60" rows="7" id="bdetail"  class="box" ></textarea>
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">�ٻ�Ҿ : </td>
    <td align="left">&nbsp;
      <input type="file" name="file1" id="file1"  class="box" >
      <font color="#CC0000"> *</font><font color="#009900">����Ѻ��Ҵ B 777x100</font></td>
  </tr>
  <tr>
    <td align="right">�ٻ�Ҿ : </td>
    <td align="left"> &nbsp;
      <input type="file" name="file2" id="file2"  class="box">
      <font color="#CC0000">*</font><font color="#009900">����Ѻ��Ҵ 125x125</font></td>
  </tr>
  <tr>
    <td align="right">�ٻ�Ҿ : </td>
    <td align="left"> &nbsp;
      <input type="file" name="file3" id="file3"  class="box" />
      <font color="#CC0000">*</font><font color="#009900">����Ѻ��Ҵ C 777x100 </font></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">�ٻ��Ҵ�˭�&nbsp; : </td>
    <td align="left"> &nbsp;
      <input type="file" name="file4" id="file4"  class="box" /></td>
  </tr>
  <tr>
    <td align="right">�ٻ��Ҵ�˭�&nbsp; : </td>
    <td align="left">&nbsp; <input type="file" name="file5" id="file5"  class="box" /></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">�������㹡�õԴ���&nbsp; : </td>
    <td align="left">
      &nbsp; 
      <textarea name="baddress" cols="60" rows="7" class="box" id="baddress"></textarea>
      <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">�ѧ��Ѵ : </td>
    <td align="left">&nbsp;
	<select name="bprovince" id="bprovince" tabindex="26" style="width: 175px" class="box">
	<option selected="selected" value=""> - ��س����͡�ѧ��Ѵ - </option>
	<option value="��к��">��к��</option>
	<option value="��ا෾��ҹ��">��ا෾��ҹ��</option>
	<option value="�ҭ������">�ҭ������</option>
	<option value="����Թ���">����Թ���</option>
	<option value="��ᾧྪ�">��ᾧྪ�</option>
	<option value="�͹��">�͹��</option>
	<option value="�ѹ�����">�ѹ�����</option>
	<option value="���ԧ���">���ԧ���</option>
	<option value="�ź���">�ź���</option>
	<option value="��¹ҷ">��¹ҷ</option>
	<option value="�������">�������</option>
	<option value="�����">�����</option>
	<option value="��§���">��§���</option>
	<option value="��§����">��§����</option>
	<option value="��ѧ">��ѧ</option>
	<option value="��Ҵ">��Ҵ</option>
	<option value="�ҡ">�ҡ</option>
	<option value="��ù�¡">��ù�¡</option>
	<option value="��û��">��û��</option>
	<option value="��þ��">��þ��</option>
	<option value="����Ҫ����">����Ҫ����</option>
	<option value="�����ո����Ҫ">�����ո����Ҫ</option>
	<option value="������ä�">������ä�</option>
	<option value="�������">�������</option>
	<option value="��Ҹ����">��Ҹ����</option>
	<option value="��ҹ">��ҹ</option>
	<option value="���������">���������</option>
	<option value="�����ҹ�">�����ҹ�</option>
	<option value="��ШǺ���բѹ��">��ШǺ���բѹ��</option>
	<option value="��Ҩչ����">��Ҩչ����</option>
	<option value="�ѵ�ҹ�">�ѵ�ҹ�</option>
	<option value="��й�������ظ��">��й�������ظ��</option>
	<option value="�����">�����</option>
	<option value="�ѧ��">�ѧ��</option>
	<option value="�ѷ�ا">�ѷ�ا</option>
	<option value="�ԨԵ�">�ԨԵ�</option>
	<option value="��ɳ��š">��ɳ��š</option>
	<option value="ྪú���">ྪú���</option>
	<option value="ྪú�ó�">ྪú�ó�</option>
	<option value="���">���</option>
	<option value="����">����</option>
	<option value="�����ä��">�����ä��</option>
	<option value="�ء�����">�ء�����</option>
	<option value="�����ͧ�͹">�����ͧ�͹</option>
	<option value="��ʸ�">��ʸ�</option>
	<option value="����">����</option>
	<option value="�������">�������</option>
	<option value="�йͧ">�йͧ</option>
	<option value="���ͧ">���ͧ</option>
	<option value="�Ҫ����">�Ҫ����</option>
	<option value="ž����">ž����</option>
	<option value="�ӻҧ">�ӻҧ</option>
	<option value="�Ӿٹ">�Ӿٹ</option>
	<option value="���">���</option>
	<option value="�������">�������</option>
	<option value="ʡŹ��">ʡŹ��</option>
	<option value="ʧ���">ʧ���</option>
	<option value="ʵ��">ʵ��</option>
	<option value="��طû�ҡ��">��طû�ҡ��</option>
	<option value="��ط�ʧ����">��ط�ʧ����</option>
	<option value="��ط��Ҥ�">��ط��Ҥ�</option>
	<option value="������">������</option>
	<option value="��к���">��к���</option>
	<option value="�ԧ�����">�ԧ�����</option>
	<option value="��⢷��">��⢷��</option>
	<option value="�ؾ�ó����">�ؾ�ó����</option>
	<option value="����ɯ��ҹ�">����ɯ��ҹ�</option>
	<option value="���Թ���">���Թ���</option>
	<option value="˹ͧ���">˹ͧ���</option>
	<option value="˹ͧ�������">˹ͧ�������</option>
	<option value="�غ��Ҫ�ҹ�">�غ��Ҫ�ҹ�</option>
	<option value="��ҧ�ͧ">��ҧ�ͧ</option>
	<option value="�ӹҨ��ԭ">�ӹҨ��ԭ</option>
	<option value="�شøҹ�">�شøҹ�</option>
	<option value="�صôԵ��">�صôԵ��</option>
	<option value="�ط�¸ҹ�">�ط�¸ҹ�</option>
</select><font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td align="right">������ɳ��� : </td>
    <td align="left">
      &nbsp; 
      <input name="bzipcode" type="text" class="box" id="bzipcode" size="30">
      <font color="#CC0000">*</font></td>
  </tr>
  <tr>
    <td align="right">������&nbsp; : </td>
    <td align="left">&nbsp;
      <input name="bemail" type="text" id="bemail" size="30"  class="box" > <font color="#CC0000">*</font>    </td>
  </tr>
  <tr>
    <td align="right">�������Ѿ�� : </td>
    <td align="left">&nbsp;
      <input name="btel" type="text" id="btel" size="30" class="box"> <font color="#CC0000">*</font></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left">
      &nbsp; <input name="flag" id="flag" type="hidden" value="addbanner">
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
