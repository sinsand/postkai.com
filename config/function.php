<?php
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

?>
