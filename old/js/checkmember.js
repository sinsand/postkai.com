// JavaScript Document
function emptyField(textObj) 
{
	   if (textObj.value.length == 0)
    		 return true;
	   for (var i=0; i<textObj.value.length; ++i) {
		     var ch = textObj.value.charAt(i);
		     if (ch != ' ' && ch != '	')0
		        return false;
	   }
	   return true;
	 } 

function  validFormlogin() {
				
				if(emptyField(document.formlogin.user)){
				alert("��سҡ�͡������͡�Թ");
				document.formlogin.user.focus();
				return false;
			}	
				if(emptyField(document.formlogin.pass)){
				alert("��سҡ�͡���ʼ�ҹ");
				document.formlogin.pass.focus();
				return false;
			}	
			
return true;
}

function hidden(){
		if(document.getElementById("hidden").checked==true)
		{
			document.getElementById('showtop10allwebhidden').style.display='';
			document.getElementById('showtop10allwebHouse').style.display='none';
			document.getElementById('showtop10allwebCondo').style.display='none';
			document.getElementById('showtop10allwebBuilding').style.display='none';
			document.getElementById('showtop10allwebLand').style.display='none';
			document.getElementById('showtop10allwebRent').style.display='none';
			document.getElementById('showtop10allwebFurniture').style.display='none';
			document.getElementById('showtop10allwebCar').style.display='none';
			document.getElementById('showtop10allwebOthers').style.display='none';
		}
		else
		{
			document.getElementById('showtop10allwebhidden').style.display='none';
		}
		if(document.getElementById("house10").checked==true)
		{
			document.getElementById('showtop10allwebhidden').style.display='none';
			document.getElementById('showtop10allwebHouse').style.display='';
			document.getElementById('showtop10allwebCondo').style.display='none';
			document.getElementById('showtop10allwebBuilding').style.display='none';
			document.getElementById('showtop10allwebLand').style.display='none';
			document.getElementById('showtop10allwebRent').style.display='none';
			document.getElementById('showtop10allwebFurniture').style.display='none';
			document.getElementById('showtop10allwebCar').style.display='none';
			document.getElementById('showtop10allwebOthers').style.display='none';
		}
		else
		{
			document.getElementById('showtop10allwebHouse').style.display='none';
		}
		if(document.getElementById("condo10").checked==true)
		{
			document.getElementById('showtop10allwebhidden').style.display='none';
			document.getElementById('showtop10allwebHouse').style.display='none';
			document.getElementById('showtop10allwebCondo').style.display='';
			document.getElementById('showtop10allwebBuilding').style.display='none';
			document.getElementById('showtop10allwebLand').style.display='none';
			document.getElementById('showtop10allwebRent').style.display='none';
			document.getElementById('showtop10allwebFurniture').style.display='none';
			document.getElementById('showtop10allwebCar').style.display='none';
			document.getElementById('showtop10allwebOthers').style.display='none';
		}
		else
		{
			document.getElementById('showtop10allwebCondo').style.display='none';
		}
		if(document.getElementById("building10").checked==true)
		{
			document.getElementById('showtop10allwebhidden').style.display='none';
			document.getElementById('showtop10allwebHouse').style.display='none';
			document.getElementById('showtop10allwebCondo').style.display='none';
			document.getElementById('showtop10allwebBuilding').style.display='';
			document.getElementById('showtop10allwebLand').style.display='none';
			document.getElementById('showtop10allwebRent').style.display='none';
			document.getElementById('showtop10allwebFurniture').style.display='none';
			document.getElementById('showtop10allwebCar').style.display='none';
			document.getElementById('showtop10allwebOthers').style.display='none';
		}
		else
		{
			document.getElementById('showtop10allwebBuilding').style.display='none';
		}
		if(document.getElementById("land10").checked==true)
		{
			document.getElementById('showtop10allwebhidden').style.display='none';
			document.getElementById('showtop10allwebHouse').style.display='none';
			document.getElementById('showtop10allwebCondo').style.display='none';
			document.getElementById('showtop10allwebBuilding').style.display='none';
			document.getElementById('showtop10allwebLand').style.display='';
			document.getElementById('showtop10allwebRent').style.display='none';
			document.getElementById('showtop10allwebFurniture').style.display='none';
			document.getElementById('showtop10allwebCar').style.display='none';
			document.getElementById('showtop10allwebOthers').style.display='none';
		}
		else
		{
			document.getElementById('showtop10allwebLand').style.display='none';
		}
		if(document.getElementById("rent10").checked==true)
		{
			document.getElementById('showtop10allwebhidden').style.display='none';
			document.getElementById('showtop10allwebHouse').style.display='none';
			document.getElementById('showtop10allwebCondo').style.display='none';
			document.getElementById('showtop10allwebBuilding').style.display='none';
			document.getElementById('showtop10allwebLand').style.display='none';
			document.getElementById('showtop10allwebRent').style.display='';
			document.getElementById('showtop10allwebFurniture').style.display='none';
			document.getElementById('showtop10allwebCar').style.display='none';
			document.getElementById('showtop10allwebOthers').style.display='none';
		}
		else
		{
			document.getElementById('showtop10allwebRent').style.display='none';
		}
		if(document.getElementById("furniture10").checked==true)
		{
			document.getElementById('showtop10allwebhidden').style.display='none';
			document.getElementById('showtop10allwebHouse').style.display='none';
			document.getElementById('showtop10allwebCondo').style.display='none';
			document.getElementById('showtop10allwebBuilding').style.display='none';
			document.getElementById('showtop10allwebLand').style.display='none';
			document.getElementById('showtop10allwebRent').style.display='none';
			document.getElementById('showtop10allwebFurniture').style.display='';
			document.getElementById('showtop10allwebCar').style.display='none';
			document.getElementById('showtop10allwebOthers').style.display='none';
		}
		else
		{
			document.getElementById('showtop10allwebFurniture').style.display='none';
		}
		if(document.getElementById("car10").checked==true)
		{
			document.getElementById('showtop10allwebhidden').style.display='none';
			document.getElementById('showtop10allwebHouse').style.display='none';
			document.getElementById('showtop10allwebCondo').style.display='none';
			document.getElementById('showtop10allwebBuilding').style.display='none';
			document.getElementById('showtop10allwebLand').style.display='none';
			document.getElementById('showtop10allwebRent').style.display='none';
			document.getElementById('showtop10allwebFurniture').style.display='none';
			document.getElementById('showtop10allwebCar').style.display='';
			document.getElementById('showtop10allwebOthers').style.display='none';
		}
		else
		{
			document.getElementById('showtop10allwebCar').style.display='none';
		}
		if(document.getElementById("others10").checked==true)
		{
			document.getElementById('showtop10allwebhidden').style.display='none';
			document.getElementById('showtop10allwebHouse').style.display='none';
			document.getElementById('showtop10allwebCondo').style.display='none';
			document.getElementById('showtop10allwebBuilding').style.display='none';
			document.getElementById('showtop10allwebLand').style.display='none';
			document.getElementById('showtop10allwebRent').style.display='none';
			document.getElementById('showtop10allwebFurniture').style.display='none';
			document.getElementById('showtop10allwebCar').style.display='none';
			document.getElementById('showtop10allwebOthers').style.display='';
		}
		else
		{
			document.getElementById('showtop10allwebOthers').style.display='none';
		}


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

function  validForm(){
            
			
			
			if(emptyField(document.form1.user)){
				alert("��سҡ�͡������͡�Թ");
				document.form1.user.focus();
				return false;
			}
			
			if(! validLength(document.form1.user.value,6,15)){
				alert("������͡�Թ����յ���ѡ�� 6 �֧ 15 ����ѡ��");
				document.form1.user.focus();
				return false;
			}
			
			if(emptyField(document.form1.password)){
				alert("��سҡ�͡���ʼ�ҹ");
				document.form1.password.focus();
				return false;
			}
			
			if(! validLength(document.form1.password.value,6,15)){
				alert("���ʼ�ҹ����յ���ѡ�� 6 �֧ 15 ����ѡ��");
				document.form1.password.focus();
				return false;
			}			
			
			if(emptyField(document.form1.cpassword)){
				alert("��سҡ�͡�׹�ѹ���ʼ�ҹ");
				document.form1.cpassword.focus();
				return false;
			}

			if(document.form1.cpassword.value != document.form1.password.value){
				alert("���ʼ�ҹ���ç�ѹ��سҡ�͡�ա����");
				document.form1.cpassword.focus();
				return false;
			}
			if(emptyField(document.form1.capts)){
				alert("��سҡ�͡�����ٻ�Ҿ");
				document.form1.capts.focus();
				return false;
			}

			if(emptyField(document.form1.fname)){
				alert("��سҡ�͡����");
				document.form1.fname.focus();
				return false;
			}
			if(emptyField(document.form1.lname)){
				alert("��سҡ�͡���ʡ��");
				document.form1.lname.focus();
				return false;
			}
			if(emptyField(document.form1.address)){
				alert("��سҡ�͡�������");
				document.form1.address.focus();
				return false;
			}				
			if(emptyField(document.form1.postalcode)){
				alert("��سҡ�͡������ɳ���");
				document.form1.postalcode.focus();
				return false;
			}					
				
			if(! emptyField(document.form1.email)){
			if(! validEMail(document.form1.email)){
				alert("������ͧ�س���١��ͧ��سҵ�Ǩ�ͺ���¤�Ѻ");
				document.form1.email.focus();
				return false;
			}
		}else{
				alert("��سҡ�͡������");
				document.form1.email.focus();
				return false;
		}
						
			aa=checkusername(document.form1.user);
			
			if(aa=="Yes"){
				alert("������͡�Թ��ӡ�سҵ�Ǩ�ͺ���¤�Ѻ");
				document.form1.user.value="";
				document.form1.user.focus();
			return false ;
			}			
						
			bb=checkemail(document.form1.email);
			
			if(bb=="Yes"){
				alert("������ͧ�س��ӡ�سҵ�Ǩ�ͺ���¤�Ѻ");
				document.form1.email.value="";
				document.form1.email.focus();
			return false ;
			}
			
return true;
}	

function checkusername(obj){

		if(obj.value != ''){
			url = "member_function.php?flag=checkuser&username="+escape(encodeURI(obj.value));
			xmlhttp = uzXmlHttp();
			xmlhttp.open("GET", url, false);
   xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=tis-620");
			xmlhttp.send(null); 

		//(ixmlhttp.responseText);
		//document.write(xmlhttp.responseText ) ; 
		}
		return xmlhttp.responseText ; 
}

function  validFormforgot() {
            
			if(document.forgot.username.value == ""){
			alert("��سҡ�͡�������͡�Թ.");
				document.forgot.username.focus();
				return false;
			
			}
			
			if(document.forgot.email.value == ""){
			alert("��سҡ�͡�����.");
				document.forgot.email.focus();
				return false;
			
			}
	
			if(! emptyField(document.forgot.email)){
			if(! validEMail(document.forgot.email)){
				alert("����Ţͧ��ҹ���١��ͧ.");
				document.forgot.email.focus();
				return false;
			}
		}
return true;
}

function  validFormedit(){

			
		if(document.getElementById('password-old').value != ''){
		
		if(document.getElementById('password-new1').value == ''){
				alert("��سҡ�͡���ʼ�ҹ����");
				document.getElementById('password-new1').focus();
				return false;
		}	
		if(document.getElementById('cpassword-re-new1').value == ''){
				alert("��سҡ�͡�����׹�ѹ���ʼ�ҹ����");
				document.getElementById('cpassword-re-new1').focus();
				return false;
		}
		if(document.getElementById('password-new1').value != document.getElementById('cpassword-re-new1').value){
				alert("��سҵ�Ǩ�ͺ����׹�ѹ���ʼ�ҹ����");
				document.getElementById('cpassword-re-new1').focus();
				return false;
		}
		
		
		}
		
			if(document.getElementById('fname').value == ''){
				alert("��سҡ�͡����");
				document.getElementById('fname').focus();
				return false;
			}
			if(document.getElementById('lname').value == ''){
				alert("��سҡ�͡���ʡ��");
				document.getElementById('lname').focus();
				return false;
			}
			if(document.getElementById('address').value == ''){
				alert("��سҡ�͡�������");
				document.getElementById('address').focus();
				return false;
			}				
			if(document.getElementById('postalcode').value == ''){
				alert("��سҡ�͡������ɳ���");
				document.getElementById('postalcode').focus();
				return false;
			}					
			
return true;
}	


function clickpersonal() 
{
	if(document.getElementById('showdata').checked)
	{ 		
		document.getElementById('ctitle').value=document.getElementById('ctitle1').value; 
			if(document.getElementById('ctitle1').value!='���' && document.getElementById('ctitle1').value!='�ҧ' && document.getElementById('ctitle1').value!='�ҧ���'){document.getElementById('ctitle').value='1';document.getElementById('ctitletxt').innerHTML="<input name=ctitles type=text size=25 id=ctitles value="+document.getElementById('ctitle1').value+" onkeyup=javascript:this.value=this.value.toUpperCase(); class=box >";}else{document.getElementById('ctitletxt').innerHTML="<input name=ctitles type=hidden  id=ctitles value=0 onkeyup=javascript:this.value=this.value.toUpperCase(); >";}
			document.getElementById('cname').value=document.getElementById('cnames').value; 
			document.getElementById('caddress').value=document.getElementById('caddresss').value; 
			document.getElementById('ctelephone').value=document.getElementById('ctelephones').value;
			document.getElementById('cemail').value=document.getElementById('cemails').value; 
		}
		else
		{
			document.getElementById('ctitle').value='���';
			document.getElementById('ctitles').value='';
			document.getElementById('ctitletxt').innerHTML='';
			document.getElementById('cname').value=''; 
			document.getElementById('caddress').value=''; 
			document.getElementById('ctelephone').value=''; 
			document.getElementById('cemail').value='';
	}
}


function chkExe(exet){
	var i= exet.length-4;
	var e =	exet.substring(i, exet.length);
	return  ( e == '.jpg' || e == 'peg'|| e == '.JPG' || e == 'PEG' || e == '.gif' || e == '.GIF');
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

function checkaddjob() 
{
		if(emptyField(document.formadd.aatype)){
			alert("��س����͡��������ѧ�������Ѿ��");
			document.formadd.aatype.focus();
			return false;
		}
		if(emptyField(document.formadd.atype)){
			alert("��س����͡��������ѧ�������Ѿ��");
			document.formadd.atype.focus();
			return false;
		}
		if(emptyField(document.formadd.aprovince)){
			alert("��س����͡�ѧ��Ѵ");
			document.formadd.aprovince.focus();
			return false;
		}
		if(emptyField(document.formadd.atitle)){
			alert("��سҡ�͡��Ǣ��");
			document.formadd.atitle.focus();
			return false;
		}
		if(emptyField(document.formadd.aprice)){
			alert("��سҡ�͡�Ҥ�");
			document.formadd.aprice.focus();
			return false;
		}
		if(emptyField(document.formadd.adetail)){
			alert("��سҡ�͡��������´");
			document.formadd.adetail.focus();
			return false;
		}
		if(document.formadd.file1.value != ''){
				if(!(chkExe(document.formadd.file1.value))){
					alert("���͡�ٻ�Ҿ��੾�� .JPG ���� GIF ��ҹ��.");
					document.formadd.file1.focus();
					return false;
				}
		}
		if(document.formadd.file2.value != ''){
				if(!(chkExe(document.formadd.file2.value))){
					alert("���͡�ٻ�Ҿ��੾�� .JPG ���� GIF ��ҹ��.");
					document.formadd.file2.focus();
					return false;
				}
		}

		if(document.getElementById('ctitle').value=='1' && document.formadd.ctitles.value==''){ 
	   alert("��سҡ�͡�ӹ�˹�Ҵ��¤�Ѻ."); 
	   document.formadd.ctitles.focus();
		return false; 
		}
		
		if(emptyField(document.formadd.cname)){
			alert("��سҡ�͡����-ʡ�Ŵ��¤�Ѻ");
			document.formadd.cname.focus();
			return false;
		}
		if(emptyField(document.formadd.caddress)){
			alert("��سҡ�͡���������¤�Ѻ");

			document.formadd.caddress.focus();
			return false;
		}
		if(emptyField(document.formadd.ctelephone)){
			alert("��سҡ�͡���Ѿ��");
			document.formadd.ctelephone.focus();
			return false;
		}
		if(emptyField(document.formadd.capts)){
			alert("��سҡ�͡�����ٻ�Ҿ");
			document.formadd.capts.focus();
			return false;
		}
		
		if(! emptyField(document.formadd.cemail)){
		if(! validEMail(document.formadd.cemail)){ alert("Your e-mail format are invalid ."); document.formadd.cemail.focus(); return false; }
		}else{
alert("Please input Your e-mail.");
document.formadd.cemail.focus(); return false;
		}
			aa=checkemail(document.formadd.cemail);
			
			if(aa=="Yes"){
				alert("e-mail is existing.");
				document.formadd.cemail.value="";
				document.formadd.cemail.focus();
			return false ;
			}
		
		
return true;
}