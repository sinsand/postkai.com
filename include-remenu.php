<img src="<?=$page_link?>/images/asungha_re.jpg" alt="��ѧ�������Ѿ���й�" title="��ѧ�������Ѿ���й�" /><br /><br />
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
		$jaTypes[$d] = "����";
	}
	if($jaType[$d] == "2")
	{
		$jaTypes[$d] = "���";
	}
	if($jaType[$d] == "3")
	{
		$jaTypes[$d] = "������";
	}
	
	if($jType[$d] == "1")
	{
		$jTypes[$d] = "��ҹ-��ҹ�Ѵ���-��ҹ�����-��ҹ����ͧ";
	}
	if($jType[$d] == "2")
	{
		$jTypes[$d] = "�͹�-�͹�������-�Ҥ�êش";
	}
	if($jType[$d] == "3")
	{
		$jTypes[$d] = "�֡-�Ҥ�þҹԪ��-�ç�ҹ-⡴ѧ";
	}
	if($jType[$d] == "4")
	{
		$jTypes[$d] = "���Թ����-���Թ�Ѵ���-���Թ";
	}
	if($jType[$d] == "5")
	{
		$jTypes[$d] = "�Ҥ�����-��ͧ���-��ҹ���";
	}
	if($jType[$d] == "6")
	{
		$jTypes[$d] = "�ػ��쵡�觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-������";
	}
	if($jType[$d] == "7")
	{
		$jTypes[$d] = "ö¹��-ö����ͧ";
	}
	if($jType[$d] == "8")
	{
		$jTypes[$d] = "ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ";
	}
	
	 $d++;}
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
</a><br />������ <font color="#009900"><strong><?=$jRead[0]?></strong></font> ����
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
</a><br />������ <font color="#009900"><strong><?=$jRead[1]?></strong></font> ����
</li>
<li>
<img src="<?=$page_link?>/images/ads2.jpg" width="120" height="90" alt="�Դ����ɳҵ��˹觹�颹Ҵ 120 x 90" title="�Դ����ɳҵ��˹觹�颹Ҵ 120 x 90" /><br />
<a href="http://www.singburin.net/�Դ������/contactus" title="�Դ����ɳҵ��˹觹�颹Ҵ  120 x 90"><b><font size="2">�Դ����ɳҵ��˹觹�颹Ҵ  120 x 90</font></b></a><br />
</li>
<li>
<img src="<?=$page_link?>/images/ads2.jpg" width="120" height="90" alt="�Դ����ɳҵ��˹觹�颹Ҵ 120 x 90" title="�Դ����ɳҵ��˹觹�颹Ҵ 120 x 90" /><br />
<a href="http://www.singburin.net/�Դ������/contactus" title="�Դ����ɳҵ��˹觹�颹Ҵ 120 x 90"><b><font size="2">�Դ����ɳҵ��˹觹�颹Ҵ 120 x 90</font></b></a><br />
</li>