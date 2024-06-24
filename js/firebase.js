window.onload = function() {
    render();
};

function render() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
}



///// on page register
function phoneAuth() {


      var _number = document.getElementById('pPhoneNumber').value;
      var _code_number = document.getElementById('pCodeNumber').options[document.getElementById('pCodeNumber').selectedIndex].getAttribute("code");
      var _totalnumber = '+' + _code_number + parseInt(_number);
      console.log(_totalnumber);

      if (_number.length>0) {
        //it takes two parameter first one is number and second one is recaptcha
        firebase.auth().signInWithPhoneNumber(_totalnumber, window.recaptchaVerifier).then(function(confirmationResult) {


            //s is in lowercase
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log(coderesult);
            //alert("Message sent");
            //window.location="http://localhost/postkai.com/view-verification";
            //$("#register-view-show").modal();
            $("#register-view-show").modal({backdrop: "static"});
        }).catch(function(error) {
            document.getElementById("alertShowError").innerHTML = error.message;
            //alert(error.message);
        });
      }else {
        document.getElementById("alertShowError").innerHTML = "กรุณากรอกเบอร์มือถือ";
      }
}
function codeverify() {
    var code = document.getElementById('verificationCode').value;
    coderesult.confirm(code).then(function(result) {
        //alert("Successfully registered");
        var user = result.user;
        console.log(user.uid);

        var _fullname     =  document.getElementById('pFullname').value;
        var _phonenumber  =  document.getElementById('pPhoneNumber').value;
        var _password     =  document.getElementById('pPassword').value;
        var _code_number  =  document.getElementById('pCodeNumber').options[document.getElementById('pCodeNumber').selectedIndex].getAttribute("code");


        $.ajax({
           type : "POST",  //type of method
           url  : "query/query-system.php",  //your page
           data : {
                    _fullname : _fullname,
                    _codephone : _code_number,
                    _phone : _phonenumber,
                    _password : _password,
                    uid : user.uid,
                    post : 'insert_member'
           },// passing the values
           success: function(res){
              console.log(res);
              document.getElementById("alertShowcompleted").innerHTML = res;
              //window.location = "http://localhost/postkai.com/login";
           }
       });





    }).catch(function(error) {
        //alert(error.message);
    });
}
///// end on page register


function getuser(){
  firebase.auth().onAuthStateChanged((user) => {
    if (user) {
      // User is signed in, see docs for a list of available properties
      // https://firebase.google.com/docs/reference/js/firebase.User
      var uid = user.uid;
      // ...
    } else {
      // User is signed out
      // ...
    }
  });
}



///////// on forgot
function phoneAuth_forgot() {

      var _link = document.getElementById('linkweb').value;
      var _number = document.getElementById('pPhoneNumber').value;
      var _code_number = document.getElementById('pCodeNumber').options[document.getElementById('pCodeNumber').selectedIndex].getAttribute("code");
      var _totalnumber = '+' + _code_number + parseInt(_number);
      console.log(_totalnumber);

      $.post( _link+ "query/query-system.php",
      {
            _codephone : _code_number,
            _phone : _number,
            _linkweb : _link,
            post : 'check_member'
      },
      function(res){
         var i = res.split("|||");
         var _first = i[0];
         var _end = i[1];
         if (_first=='1') {
           console.log(_end);
           document.getElementById("show_log_member").innerHTML = _end;


           if (_number.length>0) {
             //it takes two parameter first one is number and second one is recaptcha
             firebase.auth().signInWithPhoneNumber(_totalnumber, window.recaptchaVerifier).then(function(confirmationResult) {
                 //s is in lowercase
                 window.confirmationResult = confirmationResult;
                 coderesult = confirmationResult;
                 console.log(coderesult);

             }).catch(function(error) {
                 document.getElementById("show_log_member").innerHTML = error.message;
                 //alert(error.message);
             });
           }else {
             document.getElementById("show_log_member").innerHTML = "กรุณากรอกเบอร์มือถือ";
           }

         }else {
           console.log(_end);
           document.getElementById("show_log_member").innerHTML = _end;
         }

    });

}
function codeverify_forgot() {

    var code = document.getElementById('verificationCode').value;
    var _code_number  = document.getElementById('pCodeNumber').options[document.getElementById('pCodeNumber').selectedIndex].getAttribute("code");
    var _phonenumber  = document.getElementById('pPhoneNumber').value;

   coderesult.confirm(code).then(function(result) {
       //alert("Successfully registered");
       var user = result.user;

       document.getElementById('show_log_member').innerHTML = "<div style='color:#48a868;'>ยืนยันเบอร์มือถือเรียบร้อย</div>";
       document.getElementById('PostConfirm').innerHTML = "กรุณารอสักครู่....<i class='far fa-spinner faa-spin'></i>";
       document.getElementById('puid').value = user.uid;
       console.log(user.uid);
       setTimeout(function(){
         document.getElementById("FormForgotMember").submit();
       },2000);
   }).catch(function(error) {
       console.log(error.message);
   });

}
///////// end on forgot
