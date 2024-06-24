<?php


if (!empty($_SESSION[$SessionID])) {
  if (empty($_COOKIE[$CookieID])) {
    unset($_SESSION[$SessionID]);

    session_unset();
    session_destroy();
    header("Refresh:0; url=$linkpath");
  }
}

function ConnectToDB()
{
  global $Link, $Host, $User, $Pass, $DBname;
  $Link = mysqli_connect($Host, $User, $Pass, $DBname);
  if (mysqli_connect_errno()) {
    echo "Database Connect Failed : " . mysqli_connect_error();
  }
  mysqli_set_charset($Link, "utf8");
}

function insert_tb($query)
{
  ConnectToDB();
  global $Link;
  $objQuery = mysqli_query($Link, $query);
  if ($objQuery) {
    return true;
  } else {
    return false;
  }
  mysqli_close($Link);
}

function delete_tb($query)
{
  ConnectToDB();
  global $Link;
  $objQuery = mysqli_query($Link, $query);
  if ($objQuery) {
    return true;
  } else {
    return false;
  }
  mysqli_close($Link);
}

function select_tb($query)
{
  ConnectToDB();
  global $Link;
  $obj = mysqli_query($Link, $query);
  while ($ro = mysqli_fetch_array($obj, MYSQLI_ASSOC)) {
    $rows[] = $ro;
  }
  return $rows;
  mysqli_close($Link);
}

function select_num($query)
{
  ConnectToDB();
  global $Link;
  $obj = mysqli_query($Link, $query);
  $numrow = mysqli_num_rows($obj);
  return $numrow;
  mysqli_close($Link);
}

function update_tb($query)
{
  ConnectToDB();
  global $Link;
  $objQuery = mysqli_query($Link, $query);
  if ($objQuery) {
    return true;
  } else {
    return false;
  }
  mysqli_close($Link);
}

function base64url_encode($data)
{
  return base64_encode($data);
}

function base64url_decode($data)
{
  return base64_decode($data);
}


////  for xml file
function con_xml($value)
{
  $hour = substr($value, 12, 2);
  $min = substr($value, 15, 2);
  $second = substr($value, 18, 2);
  $month = substr($value, 6, 2);
  $day = substr($value, 8,);
  $year = substr($value, 0, 4);
  return date("Y-m-d\TH:i:s+00:00", mktime($hour, $min, $second, $month, $day, $year));
  //2009-12-27 00:10:34
}
//// time thai full
function day_format_month_thai($value)
{
  $time = substr($value, 11, 8);
  $timeto = "";
  if ($time != "") {
    $timeto = substr($value, 11, 8);
  }
  $a_monthth = array(
    '1' => "มกราคม",
    '2' => "กุมภาพันธ์",
    '3' => "มีนาคม",
    '4' => "เมษายน",
    '5' => "พฤษภาคม",
    '6' => "มิถุนายน",
    '7' => "กรกฎาคม",
    '8' => "สิงหาคม",
    '9' => "กันยายน",
    '10' => "ตุลาคม",
    '11' => "พฤศจิกายน",
    '12' => "ธันวาคม"
  );
  return substr($value, 8, 2) . " " . $a_monthth[substr($value, 5, 2) - 0] . " " . (substr($value, 0, 4) + 543) . " " . $timeto;
}

//// alert success
function fSuccess($type, $value, $link, $time)
{
?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php echo FType($type); ?>
    <?php echo $value; ?> ....<i class="fas fa-spinner faa-spin animated"></i>
  </div>
  <?php
  if ($time > 0) {
  ?>
    <meta http-equiv="refresh" content="<?php echo $time; ?>;url=<?php echo $link; ?>">
  <?php
  }
}
//// alert error
function fError($type, $value, $sql = "")
{
  ?>
  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php echo FType($type); ?>
    <?php echo $value; ?> ....<?php echo $sql; ?>
  </div>
<?php
}
//// check alert type
function FType($type)
{
  if ($type == 1) { /// add
    return "<h4><i class='far fa-check-circle'></i> ADD !</h4>";
  } else if ($type == 2) { /// update
    return "<h4><i class='far fa-check-circle'></i> UPDATE !</h4>";
  } else if ($type == 3) { // delete
    return "<h4><i class='far fa-check-circle'></i> DELETE !</h4>";
  } else if ($type == 4) { // sign out
    return "<h4><i class='fas fa-lock-open'></i> Exit !</h4>";
  } else if ($type == 5) { // sign in
    return "<h4><i class='fas fa-lock'></i> Sign In !</h4>";
  } else if ($type == 6) { // register
    return "<h4><i class='far fa-check-circle'></i> Register !</h4>";
  }
}
//// insert to table log
function log_insert($value, $eid)
{
  $SqlInsert  = "INSERT INTO p_log VALUES(0," . base64url_decode($eid) . ",'" . htmlentities($value) . "',now());";
  if (insert_tb($SqlInsert) == true) {
    return true;
  } else {
    return false;
  }
}

///// check login
function checklogin()
{
  global $LinkWeb;
  if (!isset($_COOKIE["uid"])) {
    header("Location: " . $LinkWeb);
    //exit;
  }
}

//// check link
function check_tags($data)
{
  global $LinkWeb;
  $replace = 'href="' . $LinkWeb . 'outlink/?outlink=';
  $value = str_replace('href="', $replace, $data);
  return check_font($value);
}


//// check link
function check_font($data)
{
  $replace = 'Anuphan';
  $str_arrary = array("Cordia New", "Helvetica Neue", "Browallia New", "Angsana New", "Arial Black", "Arial", "Comic Sans MS", "Courier New", "Helvetica", "Impact", "Tahoma", "Times New Roman", "Times New Roman");
  $value = str_replace($str_arrary, $replace, $data);
  return check_link($value);
}

//// check syntax
function check_link($data)
{
  $replace = "<a rel='nofollow' target='_blank'";
  $value = str_replace("<a ", $replace, $data);
  return $value;
}


///// line notify
function line_notify($sMessage)
{
  $sToken = "2ZEgQE7xUDutDTqWTTNEs1sv4sip4F4n6EzFQDTB9jl";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  date_default_timezone_set("Asia/Bangkok");

  $chOne = curl_init();
  curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
  curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($chOne, CURLOPT_POST, 1);
  curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=" . $sMessage);
  $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer ' . $sToken . '',);
  curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($chOne);

  //Result error
  if (curl_error($chOne)) {
    //echo 'error:' . curl_error($chOne);
  } else {
    $result_ = json_decode($result, true);
    //echo "status : ".$result_['status'];
    //echo "message : ". $result_['message'];
  }
  curl_close($chOne);
}


function chmod_r($Path)
{
  $dp = opendir($Path);
  while ($File = readdir($dp)) {
    if ($File != "." and $File != "..") {
      if (is_dir($File)) {
        chmod($File, 0750);
      } else {
        chmod($Path . "/" . $File, 0644);
        if (is_dir($Path . "/" . $File)) {
          chmod_r($Path . "/" . $File);
        }
      }
    }
  }
  closedir($dp);
}

///////
function check_status_show_post($date, $amountdate)
{
  if ($amountdate == 0) {
    return date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")));
  } else {
    $day    = substr($date, 8, 2);
    $month  = substr($date, 6, 2);
    $year   = substr($date, 0, 4);
    return date("Y-m-d", mktime(0, 0, 0, $month, $day + $amountdate, $year));
  }
}

function div_date($before, $after)
{
  $date1  = date_create($before);
  $date2  = date_create($after);
  $diff   = date_diff($date1, $date2);
  return  $diff->format("%R%a");
}

////// send email
function sentmail_notify($subject, $message, $emailto, $headers)
{
  //$headers = "From: comment@poskai.com";
  mail($emailto, $subject, $message, $headers);
}

function ch_lang($value)
{
  $vo = array("?lang=us", "?lang=th");
  $voc = "";
  return str_replace($vo, "", $value);
}

?>