<img src="<?php echo $page_link;?>/images/asungha_re_s.jpg" alt="" title="" /><br />
	<?php
	$sqljr = "SELECT * FROM sb_job where jStatus = '1' and jPic1 != '' ORDER BY RAND() limit 0,4";
	$totalrowsj = select_num($sqljr);
	$r = 0;
	foreach (select_tb($sqljr) as $RWjr) {
		$jID[$r] = $RWjr['jID'];
		$jTitle[$r] = $RWjr['jTitle'];
		$jaType[$r] = $RWjr['jaType'];
		$jType[$r] = $RWjr['jType'];
		$jRead[$r] = $RWjr['jRead'];
		$jPic1[$r] = $RWjr['jPic1'];

		$titleall[$r] = str_replace(' ','-', $jTitle[$r]);
		$titleall[$r] = str_replace('#','-', $titleall[$r]);
		$titleall[$r] = str_replace('%','-', $titleall[$r]);

		if($jaType[$r] == "1"){
			$jaTypes[$r] = "����";
		}
		if($jaType[$r] == "2"){
			$jaTypes[$r] = "���";
		}
		if($jaType[$r] == "3"){
			$jaTypes[$r] = "�������";
		}

		if($jType[$r] == "1"){
			$jTypes[$r] = "��ҹ-��ҹ�Ѵ���-��ҹ������-��ҹ����ͧ";
		}
		if($jType[$r] == "2"){
			$jTypes[$r] = "�͹��-�͹���������-�Ҥ�êش";
		}
		if($jType[$r] == "3"){
			$jTypes[$r] = "�֡-�Ҥ�þҹԪ��-�ç�ҹ-⡴ѧ";
		}
		if($jType[$r] == "4"){
			$jTypes[$r] = "����Թ�����-����Թ�Ѵ���-����Թ";
		}
		if($jType[$r] == "5"){
			$jTypes[$r] = "�Ҥ������-��ͧ����-��ҹ����";
		}
		if($jType[$r] == "6"){
			$jTypes[$r] = "�ػ��쵡��觺�ҹ-�ػ�ó��ӹѡ�ҹ-����-�������";
		}
		if($jType[$r] == "7"){
			$jTypes[$r] = "ö¹��-ö����ͧ";
		}
		if($jType[$r] == "8"){
			$jTypes[$r] = "ö�Ѻ��ҧ-�غ�֡-���Ͷ͹��ҹ";
		}
		$r++;
 }
	 ?>

<li>
<?php if($jPic1[0] != ""){ ?><img src="<?php echo $page_link;?>/picture_job_1/<?php echo $jPic1[0];?>" width="120" height="90" alt="<?php echo $jTitle[0];?>" title="<?php echo $jTitle[0];?>" class="boarderimg" /><?php } ?><br />
<a href="<?php echo $page_link;?>/<?php echo $jTypes[0];?>/<?php echo $jID[0];?>" target="_blank" title="<?php echo $jTitle[0];?>">
			<?php
		  	echo "<b><font size='2'>";
				$position=50; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
				$message=$jTitle[0];
				$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
				$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
				if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
				echo "</font></b>";
			?>
</a><br />������ <font color="#009900"><strong><?php echo $jRead[0];?></strong></font> �����<br /><br />
</li>
<li>
<?php if($jPic1[1] != ""){ ?><img src="<?php echo $page_link;?>/picture_job_1/<?php echo $jPic1[1];?>" width="120" height="90" alt="<?php echo $jTitle[1];?>" title="<?php echo $jTitle[1];?>" class="boarderimg" /><?php } ?><br />
<a href="<?php echo $page_link;?>/<?php echo $jTypes[1];?>/<?php echo $jID[1];?>" target="_blank" title="<?php echo $jTitle[1];?>">
			<?php
		  	echo "<b><font size='2'>";
			$position=50; // �кؤ�����Ǣͧ����¤��ҵ�ͧ�������˹
			$message=$jTitle[1];
			$pre_post = substr($message,$position,1); // �������Ǣ�ͤ������������Ƿ���к����㹵����� position
			$show_post = substr($message,0,$position); // �ʴ���ͤ����͡��
			if($pre_post != ""){echo"$show_post ...";}else{echo"$show_post";}
			echo "</font></b>";
			?>
</a><br />������ <font color="#009900"><strong><?php echo $jRead[1];?></strong></font> �����<br /><br />
</li>
<li>
<img src="<?php echo $page_link;?>/images/ads2.jpg" width="120" height="90" alt="�Դ�����ɳҵ��˹觹�颹Ҵ 120 x 90" title="�Դ�����ɳҵ��˹觹�颹Ҵ 120 x 90" /><br />
<a href="<?php echo $page_link;?>/�Դ������/contactus" title="�Դ�����ɳҵ��˹觹�颹Ҵ  120 x 90"><b><font size="2">�Դ�����ɳҵ��˹觹�颹Ҵ  120 x 90</font></b></a><br /><br />
</li>
<li>
<img src="<?php echo $page_link;?>/images/ads2.jpg" width="120" height="90" alt="�Դ�����ɳҵ��˹觹�颹Ҵ 120 x 90" title="�Դ�����ɳҵ��˹觹�颹Ҵ 120 x 90" /><br />
<a href="<?php echo $page_link;?>/�Դ������/contactus" title="�Դ�����ɳҵ��˹觹�颹Ҵ 120 x 90"><b><font size="2">�Դ�����ɳҵ��˹觹�颹Ҵ 120 x 90</font></b></a><br /><br />
</li>

<p align="center"><font color="#B4B4B4">---------------------------------------------</font></p>
<p align="left">
<img src="<?php echo $page_link;?>/images/board15.jpg" alt="��纺���� 15 �ѹ�Ѻ����ش" title="��纺���� 15 �ѹ�Ѻ����ش" /><br />
<?php
$sqlall = "SELECT * FROM webboard where wStatus = '1' order by wDate_Create desc limit 0,15";
foreach (select_tb($sqlall) as $fetchall) {

	$sqlre = "SELECT * FROM rejob where wID = '".$fetchall['wID']."'";
	$numre= select_num($sqlre);

	$titleb = str_replace(' ','-', $fetchall['wTitle']);
	$titleb = str_replace('#','-', $titleb);
	$titleb = str_replace('%','-', $titleb);

	$sqlm = "SELECT * FROM member where mID = '".$fetchall['mID']."' ";
	foreach (select_tb($sqlm) as $fetchall) {
	?>
		<img src="<?php echo $page_link;?>/images/list-webboard.png" alt="<?php echo $fetchall['wTitle'];?>" title="<?php echo $fetchall['wTitle'];?>" />&nbsp;&nbsp;
		<a href="<?php echo $page_link;?>/board/<?php echo $titleb;?>/<?php echo $fetchall['wID'];?>/<?php echo $fetchall['wType'];?>" title="<?php echo $fetchall['wTitle'];?>" target="_blank"><u>
			<?php echo $fetchall['wTitle'];?></u></a>&nbsp;&nbsp;<font size="1"><b>���:</b>&nbsp;<?php echo $fetchm['mUsername'];?>&nbsp;&nbsp;<b>�ѹ���:</b>&nbsp;<?php echo $fetchall['wDate_Create'];?></font>
			<font color="#FF0099">&nbsp;��ҹ:&nbsp;<strong><?php echo $fetchall['wRead'];?></strong>&nbsp;,�ͺ:&nbsp;<strong><?php echo $numre;?></strong></font><br />
	<?php
	}
}
?>
</p>
<p align="right"><a href="<?php echo $page_link;?>/webboard" title=""><strong>webboard</strong></a></p>
<p align="center"><font color="#B4B4B4">---------------------------------------------</font></p>
<center>
</center><br />
<br />
