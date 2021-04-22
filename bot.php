<?
if (strstr($_SERVER['HTTP_USER_AGENT'], 'Yandex')){ $bot='Yandex';}
else if (strstr($_SERVER['HTTP_USER_AGENT'], 'Googlebot')){$bot='Google';}
else if (strstr($_SERVER['HTTP_USER_AGENT'], 'Mediapartners-Google')){$bot='Mediapartners-Google (Adsense)';}
else if (strstr($_SERVER['HTTP_USER_AGENT'], 'Slurp')){$bot='Hot Bot search';}
else if (strstr($_SERVER['HTTP_USER_AGENT'], 'WebCrawler')){$bot='WebCrawler search';}
else if (strstr($_SERVER['HTTP_USER_AGENT'], 'ZyBorg')){$bot='Wisenut search';}
else if (strstr($_SERVER['HTTP_USER_AGENT'], 'scooter')){$bot='AltaVista';}  
else if (strstr($_SERVER['HTTP_USER_AGENT'], 'StackRambler')){$bot='Rambler';}  
else if (strstr($_SERVER['HTTP_USER_AGENT'], 'Aport')){$bot='Aport';}  
else if (strstr($_SERVER['HTTP_USER_AGENT'], 'lycos')){$bot='Lycos';}  
else if (strstr($_SERVER['HTTP_USER_AGENT'], 'WebAlta')){$bot='WebAlta';}
else if (strstr($_SERVER['HTTP_USER_AGENT'], 'yahoo')){$bot='Yahoo';}
else if (strstr($_SERVER['HTTP_USER_AGENT'], 'msnbot')){$bot='msnbot/1.0';}
else if (strstr($_SERVER['HTTP_USER_AGENT'], 'ia_archiver')){$bot='Alexa search engine';}
else if (strstr($_SERVER['HTTP_USER_AGENT'], 'FAST')){$bot='AllTheWeb';}
 
if($bot !=""){
	$tdiff = 3600 * 0; // เปลี่ยนจาก 0 เป็น 7 ถ้า Server นอก (GMT) หรือเพิ่มลดได้ตามแต่ Time Zone อยู่ที่ได (GMT -12 ถึง GMT +13)
	$file = "bots.txt";
	$day = date("d/m/Y",time() + $tdiff);
	$time = date("H:i:s",time() + $tdiff);
	$ip = $_SERVER['REMOTE_ADDR'];
	$fh = fopen($file, "w");
	fwrite($fh, "$day|$time|$bot|$ip");
	fclose($fh);
}

$month[1] = "มกราคม";
$month[2] = "กุมภาพันธ์";
$month[3] = "มีนาคม";
$month[4] = "เมษายน";
$month[5] = "พฤษภาคม";
$month[6] = "มิถุยายน";
$month[7] = "กรกฎาคม";
$month[8] = "สิงหาคม";
$month[9] = "กันยายน";
$month[10] = "ตุลาคม";
$month[11] = "พฤศจิกายน";
$month[12] = "ธันวาคม";

$file = "bots.txt";
if(file_exists($file)) {
	$fh = fopen($file, 'r+');
	$s = filesize($file);
	if($s == 0) {
		$out = "<strong>บอทยังไม่ได้มาเก็บข้อมูล</strong>";
	}else{
		$contents = fread($fh, $s);
		fclose($fh);
		
		$info = explode("|",$contents);
		$day = explode("/",$info[0]);
		$m = number_format($day[1]);
		$tm = explode(":",$info[1]);
		$agent = $info[2];
		$ip = $info[3];

		$out = "<strong>บอทตัวล่าสุดที่เข้ามาเก็บข้อมูล คือ ".$agent ." ($ip) ";
		
		if(date('d',time()) == $day[0]){
			$out .= " วันนี้";
		}else{
			$out .=" เมื่อวันที่ ".$day[0]." ".$month[$m]." ". ($day[2]+543);
		}
		$out .= " เวลา ". $tm[0]. ".".$tm[1]." น.</strong>";
		
	}
	echo $out;
}
?>