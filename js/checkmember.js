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
				alert("กรุณากรอกชื่อล็อกอิน");
				document.formlogin.user.focus();
				return false;
			}	
				if(emptyField(document.formlogin.pass)){
				alert("กรุณากรอกรหัสผ่าน");
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
				alert("กรุณากรอกชื่อล็อกอิน");
				document.form1.user.focus();
				return false;
			}
			
			if(! validLength(document.form1.user.value,6,15)){
				alert("ชื่อล็อกอินควรมีตัวอักษร 6 ถึง 15 ตัวอักษร");
				document.form1.user.focus();
				return false;
			}
			
			if(emptyField(document.form1.password)){
				alert("กรุณากรอกรหัสผ่าน");
				document.form1.password.focus();
				return false;
			}
			
			if(! validLength(document.form1.password.value,6,15)){
				alert("รหัสผ่านควรมีตัวอักษร 6 ถึง 15 ตัวอักษร");
				document.form1.password.focus();
				return false;
			}			
			
			if(emptyField(document.form1.cpassword)){
				alert("กรุณากรอกยืนยันรหัสผ่าน");
				document.form1.cpassword.focus();
				return false;
			}

			if(document.form1.cpassword.value != document.form1.password.value){
				alert("รหัสผ่านไม่ตรงกันกรุณากรอกอีกครั้ง");
				document.form1.cpassword.focus();
				return false;
			}
			if(emptyField(document.form1.capts)){
				alert("กรุณากรอกรหัสรูปภาพ");
				document.form1.capts.focus();
				return false;
			}

			if(emptyField(document.form1.fname)){
				alert("กรุณากรอกชื่อ");
				document.form1.fname.focus();
				return false;
			}
			if(emptyField(document.form1.lname)){
				alert("กรุณากรอกนามสกุล");
				document.form1.lname.focus();
				return false;
			}
			if(emptyField(document.form1.address)){
				alert("กรุณากรอกที่อยู่");
				document.form1.address.focus();
				return false;
			}				
			if(emptyField(document.form1.postalcode)){
				alert("กรุณากรอกรหัสไปรษณีย์");
				document.form1.postalcode.focus();
				return false;
			}					
				
			if(! emptyField(document.form1.email)){
			if(! validEMail(document.form1.email)){
				alert("อีเมล์ของคุณไม่ถูกต้องกรุณาตรวจสอบด้วยครับ");
				document.form1.email.focus();
				return false;
			}
		}else{
				alert("กรุณากรอกอีเมล์");
				document.form1.email.focus();
				return false;
		}
						
			aa=checkusername(document.form1.user);
			
			if(aa=="Yes"){
				alert("ชื่อล็อกอินซ้ำกรุณาตรวจสอบด้วยครับ");
				document.form1.user.value="";
				document.form1.user.focus();
			return false ;
			}			
						
			bb=checkemail(document.form1.email);
			
			if(bb=="Yes"){
				alert("อีเมล์ของคุณซ้ำกรุณาตรวจสอบด้วยครับ");
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
			alert("กรุณากรอกชืื่อล็อกอิน.");
				document.forgot.username.focus();
				return false;
			
			}
			
			if(document.forgot.email.value == ""){
			alert("กรุณากรอกอีเมล.");
				document.forgot.email.focus();
				return false;
			
			}
	
			if(! emptyField(document.forgot.email)){
			if(! validEMail(document.forgot.email)){
				alert("อีเมลของท่านไม่ถูกต้อง.");
				document.forgot.email.focus();
				return false;
			}
		}
return true;
}

function  validFormedit(){

			
		if(document.getElementById('password-old').value != ''){
		
		if(document.getElementById('password-new1').value == ''){
				alert("กรุณากรอกรหัสผ่านใหม่");
				document.getElementById('password-new1').focus();
				return false;
		}	
		if(document.getElementById('cpassword-re-new1').value == ''){
				alert("กรุณากรอกเพื่อยืนยันรหัสผ่านใหม่");
				document.getElementById('cpassword-re-new1').focus();
				return false;
		}
		if(document.getElementById('password-new1').value != document.getElementById('cpassword-re-new1').value){
				alert("กรุณาตรวจสอบการยืนยันรหัสผ่านใหม่");
				document.getElementById('cpassword-re-new1').focus();
				return false;
		}
		
		
		}
		
			if(document.getElementById('fname').value == ''){
				alert("กรุณากรอกชื่อ");
				document.getElementById('fname').focus();
				return false;
			}
			if(document.getElementById('lname').value == ''){
				alert("กรุณากรอกนามสกุล");
				document.getElementById('lname').focus();
				return false;
			}
			if(document.getElementById('address').value == ''){
				alert("กรุณากรอกที่อยู่");
				document.getElementById('address').focus();
				return false;
			}				
			if(document.getElementById('postalcode').value == ''){
				alert("กรุณากรอกรหัสไปรษณีย์");
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
			if(document.getElementById('ctitle1').value!='นาย' && document.getElementById('ctitle1').value!='นาง' && document.getElementById('ctitle1').value!='นางสาว'){document.getElementById('ctitle').value='1';document.getElementById('ctitletxt').innerHTML="<input name=ctitles type=text size=25 id=ctitles value="+document.getElementById('ctitle1').value+" onkeyup=javascript:this.value=this.value.toUpperCase(); class=box >";}else{document.getElementById('ctitletxt').innerHTML="<input name=ctitles type=hidden  id=ctitles value=0 onkeyup=javascript:this.value=this.value.toUpperCase(); >";}
			document.getElementById('cname').value=document.getElementById('cnames').value; 
			document.getElementById('caddress').value=document.getElementById('caddresss').value; 
			document.getElementById('ctelephone').value=document.getElementById('ctelephones').value;
			document.getElementById('cemail').value=document.getElementById('cemails').value; 
		}
		else
		{
			document.getElementById('ctitle').value='นาย';
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
			alert("กรุณาเลือกประเภทอสังหาริมทรัพย์");
			document.formadd.aatype.focus();
			return false;
		}
		if(emptyField(document.formadd.atype)){
			alert("กรุณาเลือกประเภทอสังหาริมทรัพย์");
			document.formadd.atype.focus();
			return false;
		}
		if(emptyField(document.formadd.aprovince)){
			alert("กรุณาเลือกจังหวัด");
			document.formadd.aprovince.focus();
			return false;
		}
		if(emptyField(document.formadd.atitle)){
			alert("กรุณากรอกหัวข้อ");
			document.formadd.atitle.focus();
			return false;
		}
		if(emptyField(document.formadd.aprice)){
			alert("กรุณากรอกราคา");
			document.formadd.aprice.focus();
			return false;
		}
		if(emptyField(document.formadd.adetail)){
			alert("กรุณากรอกรายละเอียด");
			document.formadd.adetail.focus();
			return false;
		}
		if(document.formadd.file1.value != ''){
				if(!(chkExe(document.formadd.file1.value))){
					alert("เลือกรูปภาพได้เฉพาะ .JPG หรือ GIF เท่านั้น.");
					document.formadd.file1.focus();
					return false;
				}
		}
		if(document.formadd.file2.value != ''){
				if(!(chkExe(document.formadd.file2.value))){
					alert("เลือกรูปภาพได้เฉพาะ .JPG หรือ GIF เท่านั้น.");
					document.formadd.file2.focus();
					return false;
				}
		}

		if(document.getElementById('ctitle').value=='1' && document.formadd.ctitles.value==''){ 
	   alert("กรุณากรอกคำนำหน้าด้วยครับ."); 
	   document.formadd.ctitles.focus();
		return false; 
		}
		
		if(emptyField(document.formadd.cname)){
			alert("กรุณากรอกชื่อ-สกุลด้วยครับ");
			document.formadd.cname.focus();
			return false;
		}
		if(emptyField(document.formadd.caddress)){
			alert("กรุณากรอกที่อยู่ด้วยครับ");

			document.formadd.caddress.focus();
			return false;
		}
		if(emptyField(document.formadd.ctelephone)){
			alert("กรุณากรอกโทรศัพท์");
			document.formadd.ctelephone.focus();
			return false;
		}
		if(emptyField(document.formadd.capts)){
			alert("กรุณากรอกรหัสรูปภาพ");
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