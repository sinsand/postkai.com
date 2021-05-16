<?php
include('config/config.php');

$SqlSelect = "SELECT a.jID,a.jProvince,b.PROVINCE_ID FROM sb_job a LEFT OUTER JOIN p_province b ON (a.jProvince = b.PROVINCE_NAME) ORDER BY a.jProvince ASC";
foreach (select_tb($SqlSelect) as $value) {
  echo "<p> UPDATE sb_job SET jProvince = '".$value['PROVINCE_ID']."' WHERE jID = '".$value['jID']."'; ## ".$value['jProvince']." </p>";
}

?>
