<?php
////  for xml file
function con_xml($value){
  $hour = substr($value,12,2);
  $min = substr($value,15,2);
  $second = substr($value,18,2);
  $month = substr($value,6,2);
  $day = substr($value,8,);
  $year = substr($value,0,4);
  return date("Y-m-d\TH:i:s+00:00",mktime($hour,$min,$second,$month,$day,$year));
  //2009-12-27 00:10:34
}
//// time thai full
function day_format_month_thai($value){
  $a_monthth = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
  return substr($value,8,2)." ".$a_monthth[substr($value,6,2)-1]." ".(substr($value,0,4)+543). " ".substr($value,11,8);
}

//// alert success
function fSuccess($type,$value,$link,$time){
  ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php echo FType($type);?>
    <?php echo $value;?> ....<i class="fas fa-spinner faa-spin animated"></i>
  </div>
  <?php
    if ($time>0) {
      ?><meta http-equiv="refresh" content="<?php echo $time;?>;url=<?php echo $link;?>"><?php
    }
}
//// alert error
function fError($type,$value,$sql=""){
  ?>
  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php echo FType($type);?>
    <?php echo $value;?> ....<?php echo $sql;?>
  </div>
  <?php
}
//// check alert type
function FType($type){
  if ($type==1) { /// add
    return "<h4><i class='far fa-check-circle'></i> ADD !</h4>";
  }else if ($type==2){ /// update
    return "<h4><i class='far fa-check-circle'></i> UPDATE !</h4>";
  }else if ($type==3){ // delete
    return "<h4><i class='far fa-check-circle'></i> DELETE !</h4>";
  }else if ($type==4){ // sign out
    return "<h4><i class='fas fa-lock-open'></i> Exit !</h4>";
  }else if ($type==5){ // sign in
    return "<h4><i class='fas fa-lock'></i> Sign In !</h4>";
  }else if ($type==6){ // register
    return "<h4><i class='far fa-check-circle'></i> Register !</h4>";
  }
}
//// insert to table log
function log_insert($value,$eid){
  $SqlInsert  = "INSERT INTO p_log VALUES(0,".base64url_decode($eid).",'".htmlentities($value)."',now());";
  if(insert_tb($SqlInsert)==true){
    return true;
  }else {
    return false;
  }
}

///// check login
function checklogin(){
  if (empty($_COOKIE[$CookieID])){
    echo header("Location:$LinkWeb");
  }
}

?>
