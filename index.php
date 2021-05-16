<?php
include("config/config.php");

if ($UrlPage!="") {
  if ($UrlPage=="sitemap.xml") {
    include("view-sitemap.php");
  }else if ($UrlPage=="member"){
    include("system/member/index.php");
  }else {
    include("system/index.php");
  }
}else {
  include("system/index.php");
  //include("under.php");
}
?>
