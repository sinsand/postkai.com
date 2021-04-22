<img src="<?php echo $page_link;?>/images/news.jpg" title="���ǻ�Ъ�����ѹ��" alt="���ǻ�Ъ�����ѹ��" /><br /><br />
		<?php
		$sqlnew = "SELECT * FROM news where nStatus = '1' order by nDate_Create desc limit 0,4";

		if(select_num($sqlnew) > 0){
		  $color = "#FFFFFF";
			foreach (select_tb($sqlnew) as $Rs) {
			  if ($color == "#FFFFFF"){
					$color = "#F9F9F9";
				}else{
					$color = "#FFFFFF";
				}
				$nTitle = str_replace(' ','-', $Rs['nTitle']);
				$nTitle = str_replace('#','-', $nTitle);
				$nTitle = str_replace('%','-', $nTitle);
 		 		?>
        	<img src="<?php echo $page_link;?>/images/news.gif" align="<?php echo $Rs['nTitle']; ?>" border="0" title="<?php echo $Rs['nTitle']; ?>" />&nbsp;&nbsp;<a href="<?php echo $page_link;?>/������ѧ�������Ѿ��/<?php echo $nTitle;?>/<?php echo $Rs['nID'];?>" title="<?php echo $Rs['nTitle'];?>" target="_blank">
				<?php
				if(strlen(strip_tags($Rs['nTitle']))<75){
					echo $detail = $Rs['nTitle'];
				}else{
					echo $detail = substr(strip_tags($nTitle),0,75)."...";
				}
				?>
				</a>&nbsp;&nbsp;</font><br /><font size="1" color="#000000"><em>( �ѹ��� :
	      <?php
				  list($day,$time) = explode (" ",$Rs['nDate_Create']) ;
				  list($h,$m,$s) = explode(":",$time) ;
				  list ($year,$month,$days)=explode("-",$day) ;
		      echo "$days-$month-$year" ;
					?> )
    		</em></font><br /><br />
        <?php
        }
		}
		?>
  <br />
