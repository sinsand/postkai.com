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
	$tdiff = 3600 * 0; // ����¹�ҡ 0 �� 7 ��� Server �͡ (GMT) ��������Ŵ������ Time Zone ������� (GMT -12 �֧ GMT +13)
	$file = "bots.txt";
	$day = date("d/m/Y",time() + $tdiff);
	$time = date("H:i:s",time() + $tdiff);
	$ip = $_SERVER['REMOTE_ADDR'];
	$fh = fopen($file, "w");
	fwrite($fh, "$day|$time|$bot|$ip");
	fclose($fh);
}

$month[1] = "���Ҥ�";
$month[2] = "����Ҿѹ��";
$month[3] = "�չҤ�";
$month[4] = "����¹";
$month[5] = "����Ҥ�";
$month[6] = "�Զ���¹";
$month[7] = "�á�Ҥ�";
$month[8] = "�ԧ�Ҥ�";
$month[9] = "�ѹ��¹";
$month[10] = "���Ҥ�";
$month[11] = "��Ȩԡ�¹";
$month[12] = "�ѹ�Ҥ�";

$file = "bots.txt";
if(file_exists($file)) {
	$fh = fopen($file, 'r+');
	$s = filesize($file);
	if($s == 0) {
		$out = "<strong>�ͷ�ѧ��������红�����</strong>";
	}else{
		$contents = fread($fh, $s);
		fclose($fh);
		
		$info = explode("|",$contents);
		$day = explode("/",$info[0]);
		$m = number_format($day[1]);
		$tm = explode(":",$info[1]);
		$agent = $info[2];
		$ip = $info[3];

		$out = "<strong>�ͷ�������ش���������红����� ��� ".$agent ." ($ip) ";
		
		if(date('d',time()) == $day[0]){
			$out .= " �ѹ���";
		}else{
			$out .=" ������ѹ��� ".$day[0]." ".$month[$m]." ". ($day[2]+543);
		}
		$out .= " ���� ". $tm[0]. ".".$tm[1]." �.</strong>";
		
	}
	echo $out;
}
?>