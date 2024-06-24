<?php

require("../config/config.php");



if (isset($_GET['bview'])) {

  $SqlSelect = "SELECT bphoto FROM n_banner WHERE bid = '" . $_GET['bview'] . "' ";

  foreach (select_tb($SqlSelect) as $row) {

    header("Content-type:");

    echo $row["bphoto"];
  }
}

if (isset($_GET['sview'])) {

  $SqlSelect = "SELECT sphoto FROM n_slide WHERE sid = '" . $_GET['sview'] . "' ";

  foreach (select_tb($SqlSelect) as $row) {

    header("Content-type:");

    echo $row["sphoto"];
  }
}
