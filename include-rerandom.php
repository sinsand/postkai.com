<img src="<?=$page_link?>/images/asungha_re_s.jpg" alt="��ѧ�������Ѿ���й�" title="��ѧ�������Ѿ���й�" /><br />
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
		$jaTypes[$r] = "����";
	}
	if($jaType[$r] == "2")
	{
		$jaTypes[$r] = "���";
	}
	if($jaType[$r] == "3")
	{
		$jaTypes[$r] = "������";
	}
	
	if($jType[$r] == "1")
	{
		$jTypes[$r] = "��ҹ-��ҹ�Ѵ���-��ҹ�����-��ҹ����ͧ";
	}
	if($jType[$r] == "2")
	{
		$jTypes[$r] = "�͹�-�͹�������-�Ҥ�êش";
	}
	if($jType[$r] == "3")
	{
		$jTypes[$r] = "�֡-�Ҥ�þҹԪ��-�ç�ҹ-⡴ѧ";
	}
	if($jType[$r] == "4")
	{
		$jTypes[$r] = "���Թ����-���Թ�Ѵ���-���Թ";
	}
	if($jType[$r] == "5")
	{
		$jTypes[$r] = "�Ҥ�����-��ͧ���-��ҹ���";
	}
	if($jType[$r] == "6")
	{
		$jTypes[$r] = "�ػ��쵡�觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-������";
	}
	if($jType[$r] == "7")
	{
		$jTypes[$r] = "ö¹��-ö����ͧ";
	}
	if($jType[$r] == "8")
	{
		$jTypes[$r] = "ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ";
	}
	
	 $r++;}
	 ?>

<li>
<? if($jPic1[0] != ""){ ?><img src="<?=$page_link?>/picture_job_1/<?=$jPic1[0]?>" width="120" height="90" alt="<?=$jTitle[0]?>" title="<?=$jTitle[0]?>" class="boarderimg" /><? } ?><br />
<a href="<?=$page_link?>/<?=$jTypes[0]?>/<?=$titleall[0]?>/1/1/<?=$jType[0]?>/<?=$jaType[0]?>/<?=$jID[0]?>" target="_blank" title="<?=$jTitle[0]?>">
			<? 
		  	echo "<b><font size='2'>"; 
			$position=50; // �кؤ�����Ǣͧ���¤��ҵ�ͧ������˹
			$message=$jTitle[0]; 
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵���� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}	
			echo "</font></b>";		
			?>
</a><br />������ <font color="#009900"><strong><?=$jRead[0]?></strong></font> ����<br /><br />
</li>
<li>
<? if($jPic1[1] != ""){ ?><img src="<?=$page_link?>/picture_job_1/<?=$jPic1[1]?>" width="120" height="90" alt="<?=$jTitle[1]?>" title="<?=$jTitle[1]?>" class="boarderimg" /><? } ?><br />
<a href="<?=$page_link?>/<?=$jTypes[1]?>/<?=$titleall[1]?>/1/1/<?=$jType[1]?>/<?=$jaType[1]?>/<?=$jID[1]?>" target="_blank" title="<?=$jTitle[1]?>">
			<? 
		  	echo "<b><font size='2'>"; 
			$position=50; // �кؤ�����Ǣͧ���¤��ҵ�ͧ������˹
			$message=$jTitle[1]; 
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵���� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}	
			echo "</font></b>";		
			?>
</a><br />������ <font color="#009900"><strong><?=$jRead[1]?></strong></font> ����<br /><br />
</li>
<li>
<img src="<?=$page_link?>/images/ads2.jpg" width="120" height="90" alt="�Դ����ɳҵ��˹觹�颹Ҵ 120 x 90" title="�Դ����ɳҵ��˹觹�颹Ҵ 120 x 90" /><br />
<a href="http://www.singburin.net/�Դ������/contactus" title="�Դ����ɳҵ��˹觹�颹Ҵ  120 x 90"><b><font size="2">�Դ����ɳҵ��˹觹�颹Ҵ  120 x 90</font></b></a><br /><br />
</li>
<li>
<img src="<?=$page_link?>/images/ads2.jpg" width="120" height="90" alt="�Դ����ɳҵ��˹觹�颹Ҵ 120 x 90" title="�Դ����ɳҵ��˹觹�颹Ҵ 120 x 90" /><br />
<a href="http://www.singburin.net/�Դ������/contactus" title="�Դ����ɳҵ��˹觹�颹Ҵ 120 x 90"><b><font size="2">�Դ����ɳҵ��˹觹�颹Ҵ 120 x 90</font></b></a><br /><br />
</li>

<p align="center"><font color="#B4B4B4">---------------------------------------------</font></p>
<p align="left">
<img src="<?=$page_link?>/images/board15.jpg" alt="��纺��� 15 �ѹ�Ѻ����ش" title="��纺��� 15 �ѹ�Ѻ����ش" /><br />
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

<img src="<?=$page_link?>/images/list-webboard.png" alt="<?=$fetchall['wTitle']?>" title="<?=$fetchall['wTitle']?>" />&nbsp;&nbsp;<a href="<?=$page_link?>/board/<?=$titleb?>/<?=$fetchall['wID']?>/<?=$fetchall['wType']?>" title="<?=$fetchall['wTitle']?>" target="_blank"><u><?=$fetchall['wTitle']?></u></a>&nbsp;&nbsp;<font size="1"><b>��:</b>&nbsp;<?=$fetchm['mUsername']?>&nbsp;&nbsp;<b>�ѹ���:</b>&nbsp;<?=$fetchall['wDate_Create']?></font><font color="#FF0099">&nbsp;��ҹ:&nbsp;<strong><?=$fetchall['wRead']?></strong>&nbsp;,�ͺ:&nbsp;<strong><?=$numre?></strong></font><br />
<?
}
?>
</p>
<p align="right"><a href="<?=$page_link?>/��纺���/webboard" title="��纺��촷�����"><strong>��纺��촷�����</strong></a></p>
<p align="center"><font color="#B4B4B4">---------------------------------------------</font></p>
<center>
<script type="text/javascript"><!--
google_ad_client = "pub-2101138700314615";
/* 160x600, �١���ҧ������� 7/23/10 */
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
