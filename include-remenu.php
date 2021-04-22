<img src="<?=$page_link?>/images/asungha_re.jpg" alt="อสังหาริมทรัพย์แนะนำ" title="อสังหาริมทรัพย์แนะนำ" /><br /><br />
	<? 
	$sqlj = "SELECT * FROM sb_job where jStatus = '1' and jPic1 != '' ORDER BY jRead DESC limit 0,4";
	$resultj = $db->query($sqlj);
	$totalrowsj = mysql_num_rows($resultj);
	$d = 0;
	while($RWj = mysql_fetch_array($resultj)){
	$jID[$d] = $RWj['jID'];
	$jTitle[$d] = $RWj['jTitle'];
	$jaType[$d] = $RWj['jaType'];
	$jType[$d] = $RWj['jType'];
	$jRead[$d] = $RWj['jRead'];
	$jPic1[$d] = $RWj['jPic1'];
	
	$titleall[$d] = str_replace(' ','-', $jTitle[$d]);
	$titleall[$d] = str_replace('#','-', $titleall[$d]);
	$titleall[$d] = str_replace('%','-', $titleall[$d]);
	
	if($jaType[$d] == "1")
	{
		$jaTypes[$d] = "ซื้อ";
	}
	if($jaType[$d] == "2")
	{
		$jaTypes[$d] = "ขาย";
	}
	if($jaType[$d] == "3")
	{
		$jaTypes[$d] = "ให้เช่า";
	}
	
	if($jType[$d] == "1")
	{
		$jTypes[$d] = "บ้าน-บ้านจัดสรร-บ้านเดี่ยว-บ้านมือสอง";
	}
	if($jType[$d] == "2")
	{
		$jTypes[$d] = "คอนโด-คอนโดมีเนียม-อาคารชุด";
	}
	if($jType[$d] == "3")
	{
		$jTypes[$d] = "ตึก-อาคารพานิชย์-โรงงาน-โกดัง";
	}
	if($jType[$d] == "4")
	{
		$jTypes[$d] = "ที่ดินเปล่า-ที่ดินจัดสรร-ที่ดิน";
	}
	if($jType[$d] == "5")
	{
		$jTypes[$d] = "อาคารเช่า-ห้องเช่า-บ้านเช่า";
	}
	if($jType[$d] == "6")
	{
		$jTypes[$d] = "อุปกร์ตกแต่งบ้าน-อุปกรณ์สำนักงาน-แอร์-ซ่อมแซม";
	}
	if($jType[$d] == "7")
	{
		$jTypes[$d] = "รถยนต์-รถมือสอง";
	}
	if($jType[$d] == "8")
	{
		$jTypes[$d] = "รถรับจ้าง-ทุบตึก-รื้อถอนบ้าน";
	}
	
	 $d++;}
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
</a><br />ดูแล้ว <font color="#009900"><strong><?=$jRead[0]?></strong></font> ครั้ง
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
</a><br />ดูแล้ว <font color="#009900"><strong><?=$jRead[1]?></strong></font> ครั้ง
</li>
<li>
<img src="<?=$page_link?>/images/ads2.jpg" width="120" height="90" alt="ติดต่อโฆษณาตำแหน่งนี้ขนาด 120 x 90" title="ติดต่อโฆษณาตำแหน่งนี้ขนาด 120 x 90" /><br />
<a href="http://www.singburin.net/ติดต่อเรา/contactus" title="ติดต่อโฆษณาตำแหน่งนี้ขนาด  120 x 90"><b><font size="2">ติดต่อโฆษณาตำแหน่งนี้ขนาด  120 x 90</font></b></a><br />
</li>
<li>
<img src="<?=$page_link?>/images/ads2.jpg" width="120" height="90" alt="ติดต่อโฆษณาตำแหน่งนี้ขนาด 120 x 90" title="ติดต่อโฆษณาตำแหน่งนี้ขนาด 120 x 90" /><br />
<a href="http://www.singburin.net/ติดต่อเรา/contactus" title="ติดต่อโฆษณาตำแหน่งนี้ขนาด 120 x 90"><b><font size="2">ติดต่อโฆษณาตำแหน่งนี้ขนาด 120 x 90</font></b></a><br />
</li>