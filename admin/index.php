<?php
if (!empty($_COOKIE['AID'])) {
  include ("system-admin/index.php");
}else {
  include ("main-login.php");
}

?>
