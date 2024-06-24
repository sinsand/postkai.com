<?php
ob_start() ;
session_start();

header("content-type: text/html; charset=utf-8");
header('Access-Control-Allow-Origin: *');
date_default_timezone_set("utc");


global $Link, $Host, $User, $Pass, $DBname;
global $CookieID,$CookieName,$CookieType,$CookieBranch,$CookieGroup,$CookieEditSystem,$CookieViewReport,$CookieAdminID,$CookieAccept;
global $SessionID,$SessionName,$SessionType,$SessionBranch,$SessionGroup,$SessionEditSystem,$SessionViewReport,$SessionAdminID;
$httplink ;
$linkpath = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']==='on'?"https" : "http")."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//echo $link;
if(isset($_SERVER['HTTPS']) &&  $_SERVER['HTTPS'] === 'on'){  $httplink = "https"; }else{  $httplink = "http"; }
$LinkPath 		  = $linkpath;


//error_reporting(~E_NOTICE);
error_reporting(0);
$Path         = $LinkPath;
$PathExplode  = explode("/",$_SERVER['REQUEST_URI']);
$Url          = $LinkWeb;
$UrlPage      = "";
$UrlId        = "";
$UrlIdSub     = "";
$UrlOther     = "";
$UrlOther2    = "";

require("config-local.php");
//require("config-lunch.php");


/// Session and Cookie Admin
$CookieID = 'C_UID'; //ID_admin
$CookieName = 'C_UNAME'; //name_admin
$CookieType = 'C_UTYPEID'; //mem_group_name
$CookieBranch = 'C_UBRANCH'; //mem_group_name
$CookieGroup = 'C_UGROUP'; //mem_group
$CookieCountry = 'C_UCOUNTRY'; //mem_country
$CookieEditSystem = 'C_SYSTEM'; //Edit System
$CookieViewReport = 'C_REPORT'; //View Report
$CookieAdminID = 'C_ADMIN'; //
$CookieAccept = 'C_ACCEPT'; //Cookie

$SessionID = 'S_UID'; // Member_id
$SessionName = 'S_UNAME'; //Company
$SessionType = 'S_UTYPEID'; //member_group
$SessionBranch = 'S_UBRANCH'; //member_branch
$SessionGroup = 'S_UGROUP'; //member_group
$SessionCountry = 'S_UCOUNTRY'; //member_country
$SessionEditSystem = 'S_SYSTEM'; /// Edit System
$SessionViewReport = 'S_REPORT'; /// View Report
$SessionAdminID = 'S_ADMIN'; ///

//// Function
require('function.php');

?>
