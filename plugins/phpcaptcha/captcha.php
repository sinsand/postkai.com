<?php
	session_start();
	include("./phptextClass.php");

	/*create class object*/
	$phptextObj = new phptextClass();
	/*phptext function to genrate image with text*/
	$phptextObj->phpcaptcha('#162453','#fff',600,120,10,25);	
 ?>
