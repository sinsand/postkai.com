<img src="<?php echo $page_link;?>/images/support.jpg" title="���ʹѺʹع��ɳҵ��˹觹��" alt="���ʹѺʹع��ɳҵ��˹觹��" /><br /><br />
	<?php
	$sqld = "SELECT * FROM banner where bPosition = 'D' and bStatus = '1' ORDER BY bDate_Create asc limit 0,6";
	$totalrowsd = select_num($sqld);
	if($totalrowsd > 0){
		$d = 200 ;
		foreach (select_tb($sqld) as $RWd) {
			$bID[$d] = $RWd['bID'];
			$bTitle[$d] = $RWd['bTitle'];
			$bDetail[$d] = $RWd['bDetail'];
			$bURL[$d] = $RWd['bURL'];
			$bPic2[$d] = $RWd['bPic2'];
			$bPic4[$d] = $RWd['bPic4'];
			$bPic5[$d] = $RWd['bPic5'];
			$d++;
		}
	}
	 ?>
     <?php if($bPic2[201] != ""){ ?><a href="<?php echo $bURL[201]; ?> " title="<?php echo $bTitle[201]; ?>" target="_blank"><?php } ?><img src="<?php echo $page_link?>/picture_banner/banner-center/<?php echo $bPic2[201]; ?>" width="125" border="0" alt="<?php echo $bDetail[201]; ?>" title="<?php echo $bDetail[201]; ?>" class="boarderimg" /><?php if($bPic2[201] != ""){ ?></a><?php } ?><br /><br />
     <?php if($bPic2[200] != ""){ ?><a href="<?php echo $bURL[200]; ?> " title="<?php echo $bTitle[200]; ?>" target="_blank"><?php } ?><img src="<?php echo $page_link?>/picture_banner/banner-center/<?php echo $bPic2[200]; ?>" border="0" width="125" height="125" alt="<?php echo $bDetail[200]; ?>" title="<?php echo $bDetail[200]; ?>" class="boarderimg" /><?php if($bPic2[200] != ""){ ?></a><?php } ?><br /><br />
     <?php if($bPic2[202] != "" ){ ?><a href="<?php echo $bURL[202]; ?> " title="<?php echo $bTitle[202]; ?>" target="_blank"><?php } ?><img src="<?php echo $page_link?>/picture_banner/banner-center/<?php echo $bPic2[202]; ?>" border="0" alt="<?php echo $bDetail[202]; ?>" title="<?php echo $bDetail[202]; ?>" class="boarderimg" /><?php if($bPic2[202] != ""){ ?></a><?php } ?><br /><br />
     <?php if($bPic2[203] != "" ){ ?><a href="<?php echo $bURL[203]; ?> " title="<?php echo $bTitle[203]; ?>" target="_blank"><?php } ?><img src="<?php echo $page_link?>/picture_banner/banner-center/<?php echo $bPic2[203]; ?>" border="0" alt="<?php echo $bDetail[203]; ?>" title="<?php echo $bDetail[203]; ?>" class="boarderimg" /><?php if($bPic2[203] != ""){ ?></a><?php } ?><br /><br />
     <?php if($bPic2[204] != ""){ ?><a href="<?php echo $bURL[204]; ?> " title="<?php echo $bTitle[204]; ?>" target="_blank"><?php } ?><img src="<?php echo $page_link?>/picture_banner/banner-center/<?php echo $bPic2[204]; ?>" border="0" alt="<?php echo $bDetail[204]; ?>" title="<?php echo $bDetail[204]; ?>" class="boarderimg" /><?php if($bPic2[204] != ""){ ?></a><?php } ?><br /><br />
     <?php if($bPic2[205] != ""){ ?><a href="<?php echo $bURL[205]; ?> " title="<?php echo $bTitle[205]; ?>" target="_blank"><?php } ?><img src="<?php echo $page_link?>/picture_banner/banner-center/<?php echo $bPic2[205]; ?>" border="0" alt="<?php echo $bDetail[205]; ?>" title="<?php echo $bDetail[205]; ?>" class="boarderimg" /><?php if($bPic2[205] != ""){ ?></a><?php } ?><br />
	 <p align="center"><font color="#B4B4B4">---------------------------------------------</font></p>

<img src="<?php echo $page_link;?>/images/network.jpg" title="�š��駤�����͹��ҹ" alt="�š��駤�����͹��ҹ" /><br /><br />
	<?php
$sqlw = "SELECT * FROM web_link where wStatus = '1' ORDER BY RAND() limit 0,10";
foreach (select_tb($sqlw) as $roww) {
	if($roww['wPic'] != ""){
		echo "<a href='$roww[wURL]' title='$roww[wDetail]'  target='_blank'><img src='".$page_link."/administrator/weblink/$roww[wPic]' alt='$roww[wDetail]' title='$roww[wDetail]' class='boarderimg' /></a>";
	}
	?>
	<br />&nbsp;<br />
	<?php
}
?>&nbsp;<br />
<a href="<?php echo $page_link;?>/�š��駤�����͹��ҹ/link-network>">�������駤���ԡ</a>
	 <p align="center"><font color="#B4B4B4">---------------------------------------------</font></p>
