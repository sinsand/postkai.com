<img src="<?=$page_link?>/images/asungha_re_s.jpg" alt="อสังหาริมทรัพย์แนะนำ" title="อสังหาริมทรัพย์แนะนำ" /><br />
	<? 
	$sqljr = "SELECT * FROM sb_job where jStatus = '1' and jPic1 != '' ORDER BY RAND() limit 0,4";
	$resultjr = $db->query($sqljr);
	$totalrowsj = mysql_num_rows($resultjr);
	$r = 0;
	while($RWjr = mysql_fetch_array($resultjr)){
	$jID[$r] = $RWjr['jID'];
	$jTitle[$r] = $RWjr['jTitle'];
	$jaType[$r] = $RWjr['jaType'];
	$jType[$r] = $RWjr['jType'];
	$jRead[$r] = $RWjr['jRead'];
	$jPic1[$r] = $RWjr['jPic1'];
	
	$titleall[$r] = str_replace(' ','-', $jTitle[$r]);
	$titleall[$r] = str_replace('#','-', $titleall[$r]);
	$titleall[$r] = str_replace('%','-', $titleall[$r]);
	
	if($jaType[$r] == "1")
	{
		$jaTypes[$r] = "ซื้อ";
	}
	if($jaType[$r] == "2")
	{
		$jaTypes[$r] = "ขาย";
	}
	if($jaType[$r] == "3")
	{
		$jaTypes[$r] = "ให้เช่า";
	}
	
	if($jType[$r] == "1")
	{
		$jTypes[$r] = "บ้าน-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง";
	}
	if($jType[$r] == "2")
	{
		$jTypes[$r] = "คอนโด-คอนโดมีเนียม-อาคารชุด";
	}
	if($jType[$r] == "3")
	{
		$jTypes[$r] = "ตึก-อาคารพานิชย์-โรงงาน-โกดัง";
	}
	if($jType[$r] == "4")
	{
		$jTypes[$r] = "ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดิน";
	}
	if($jType[$r] == "5")
	{
		$jTypes[$r] = "อาคารเช่า-ห้องเช่า-บ้านเช่า";
	}
	if($jType[$r] == "6")
	{
		$jTypes[$r] = "อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ซ่อมแซม";
	}
	if($jType[$r] == "7")
	{
		$jTypes[$r] = "รถยนต์-รถมือสอง";
	}
	if($jType[$r] == "8")
	{
		$jTypes[$r] = "รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน";
	}
	
	 $r++;}
	 ?>

<li>
<? if($jPic1[0] != ""){ ?><img src="<?=$page_link?>/picture_job_1/<?=$jPic1[0]?>" width="120" height="90" alt="<?=$jTitle[0]?>" title="<?=$jTitle[0]?>" class="boarderimg" /><? } ?><br />
<a href="<?=$page_link?>/<?=$jTypes[0]?>/<?=$titleall[0]?>/1/1/<?=$jType[0]?>/<?=$jaType[0]?>/<?=$jID[0]?>" target="_blank" title="<?=$jTitle[0]?>">
			<? 
		  	echo "<b><font size='2'>"; 
			$position=50; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$jTitle[0]; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}	
			echo "</font></b>";		
			?>
</a><br />ดูแล้ว <font color="#009900"><strong><?=$jRead[0]?></strong></font> ครั้ง<br /><br />
</li>
<li>
<? if($jPic1[1] != ""){ ?><img src="<?=$page_link?>/picture_job_1/<?=$jPic1[1]?>" width="120" height="90" alt="<?=$jTitle[1]?>" title="<?=$jTitle[1]?>" class="boarderimg" /><? } ?><br />
<a href="<?=$page_link?>/<?=$jTypes[1]?>/<?=$titleall[1]?>/1/1/<?=$jType[1]?>/<?=$jaType[1]?>/<?=$jID[1]?>" target="_blank" title="<?=$jTitle[1]?>">
			<? 
		  	echo "<b><font size='2'>"; 
			$position=50; // ระบุความยาวของโปรโยคว่าต้องการแค่ไหน
			$message=$jTitle[1]; 
			$pre_post = substr($message,$position,1); // เริ่มตัวข้อความตามความยาวที่ระบุไว้ในตัวแปร position
			$show_post = substr($message,0,$position); // แสดงข้อความออกมา
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}	
			echo "</font></b>";		
			?>
</a><br />ดูแล้ว <font color="#009900"><strong><?=$jRead[1]?></strong></font> ครั้ง<br /><br />
</li>
<li>
<img src="<?=$page_link?>/images/ads2.jpg" width="120" height="90" alt="ติดต่อโฆษณาตำแหน่งนี้ขนาด 120 x 90" title="ติดต่อโฆษณาตำแหน่งนี้ขนาด 120 x 90" /><br />
<a href="http://www.singburin.net/ติดต่อเรา/contactus" title="ติดต่อโฆษณาตำแหน่งนี้ขนาด  120 x 90"><b><font size="2">ติดต่อโฆษณาตำแหน่งนี้ขนาด  120 x 90</font></b></a><br /><br />
</li>
<li>
<img src="<?=$page_link?>/images/ads2.jpg" width="120" height="90" alt="ติดต่อโฆษณาตำแหน่งนี้ขนาด 120 x 90" title="ติดต่อโฆษณาตำแหน่งนี้ขนาด 120 x 90" /><br />
<a href="http://www.singburin.net/ติดต่อเรา/contactus" title="ติดต่อโฆษณาตำแหน่งนี้ขนาด 120 x 90"><b><font size="2">ติดต่อโฆษณาตำแหน่งนี้ขนาด 120 x 90</font></b></a><br /><br />
</li>

<p align="center"><font color="#B4B4B4">---------------------------------------------</font></p>
<p align="left">
<img src="<?=$page_link?>/images/board15.jpg" alt="เว็บบอร์ด 15 อันดับล่าสุด" title="เว็บบอร์ด 15 อันดับล่าสุด" /><br />
<?
$sqlall = "SELECT * FROM webboard where wStatus = '1' order by wDate_Create desc limit 0,15";
$resultall = $db->query($sqlall);
while($fetchall = mysql_fetch_array($resultall)){

$sqlre = "SELECT * FROM rejob where wID = '".$fetchall['wID']."'";
$resultre = $db->query($sqlre);
$numre= mysql_num_rows($resultre);

$titleb = str_replace(' ','-', $fetchall['wTitle']);
$titleb = str_replace('#','-', $titleb);
$titleb = str_replace('%','-', $titleb);

$sqlm = "SELECT * FROM member where mID = '".$fetchall['mID']."' ";
$resultm = $db->query($sqlm);
$fetchm = mysql_fetch_array($resultm);
?>

<img src="<?=$page_link?>/images/list-webboard.png" alt="<?=$fetchall['wTitle']?>" title="<?=$fetchall['wTitle']?>" />&nbsp;&nbsp;<a href="<?=$page_link?>/board/<?=$titleb?>/<?=$fetchall['wID']?>/<?=$fetchall['wType']?>" title="<?=$fetchall['wTitle']?>" target="_blank"><u><?=$fetchall['wTitle']?></u></a>&nbsp;&nbsp;<font size="1"><b>โดย:</b>&nbsp;<?=$fetchm['mUsername']?>&nbsp;&nbsp;<b>วันที่:</b>&nbsp;<?=$fetchall['wDate_Create']?></font><font color="#FF0099">&nbsp;อ่าน:&nbsp;<strong><?=$fetchall['wRead']?></strong>&nbsp;,ตอบ:&nbsp;<strong><?=$numre?></strong></font><br />
<?
}
?>
</p>
<p align="right"><a href="<?=$page_link?>/เว็บบอร์ด/webboard" title="เว็บบอร์ดทั้งหมด"><strong>เว็บบอร์ดทั้งหมด</strong></a></p>
<p align="center"><font color="#B4B4B4">---------------------------------------------</font></p>
<center>
<script type="text/javascript"><!--
google_ad_client = "pub-2101138700314615";
/* 160x600, ถูกสร้างขึ้นแล้ว 7/23/10 */
google_ad_slot = "1565717998";
google_ad_width = 160;
google_ad_height = 600;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</center><br />
<br />
