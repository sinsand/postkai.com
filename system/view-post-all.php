<h2 class="head-main-cate-new f-k">ประกาศทั้งหมด</h2>
<?php
    $SqlSelect = "SELECT sj.*,pt.name_Type,p.PROVINCE_NAME,pc.name_category
                        FROM sb_job sj
                        LEFT OUTER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                        LEFT OUTER JOIN p_category pc ON (sj.jType = pc.id_category)
                        LEFT OUTER JOIN p_province p  ON (sj.jProvince = p.PROVINCE_ID)
                        WHERE ( sj.jStatus = '1' )
                        ORDER BY sj.jDate_Create DESC ";

    $Per_Page = 50;   // Per Page
    $Page = $_GET['page'];
    if(!$_GET['page']){
      $Page=1;
    }

    $Prev_Page = $Page-1;
    $Next_Page = $Page+1;

    $Page_Start = (($Per_Page*$Page)-$Per_Page);
    if(select_num($SqlSelect)<=$Per_Page){
      $Num_Pages =1;
    }
    else if((select_num($SqlSelect) % $Per_Page)==0){
      $Num_Pages =(select_num($SqlSelect)/$Per_Page) ;
    }else{
      $Num_Pages =(select_num($SqlSelect)/$Per_Page)+1;
      $Num_Pages = (int)$Num_Pages;
    }
    $id_run = $Page_Start+1;

    $SqlSelect .= " LIMIT $Page_Start , $Per_Page; ";


?>
<div class="col-xs-12 p-0">
  <nav class="text-center">
    <ul class="pagination m-0 btn-lg">
     <?php
        if($Prev_Page){
          ?><li><a href="<?php echo $LinkWeb.$UrlPage;?>/?page=<?php echo $Prev_Page;?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li><?php
        }
        for($i=1; $i<=$Num_Pages; $i++){
          $Page1 = $Page-3;
          $Page2 = $Page+3;
          if($i != $Page && $i >= $Page1 && $i <= $Page2){
            ?><li><a href="<?php echo $LinkWeb.$UrlPage;?>/?page=<?php echo $i;?>"><?php echo $i;?></a></li><?php
          }else if($i==$Page){
            ?><li class="active"><a href="#"><?php echo $i;?></a></li><?php
          }
        }
        if($Page!=$Num_Pages){
          ?><li><a href="<?php echo $LinkWeb.$UrlPage;?>/?page=<?php echo $Next_Page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li><?php
        }
    ?>
    </ul>
  </nav>
</div>

<div class="col-xs-12">
<?php
    foreach (select_tb($SqlSelect) as $row) {
      ?>
        <a href="<?php echo $LinkWeb."post/".$row['jID'];?>" class="row click-post">
          <div class="col-xs-5 col-sm-3 p-0">
            <!--<img src="http://placehold.it/500x300" class="col-xs-12" alt="">-->
            <?php
              if (!empty($row['jPic1'])) {
			  ?>
			  <div class="photo-in-thumnail">
				  <h5 class="p-5 lh-15 text-row cat-on-photo"><?php echo $row['name_Type'];?></h5>
				  <img class="col-xs-12 p-0 image-show lazy" data-src="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $row['jPic1'];?>" src="" style="width:100%;height:auto;" alt="<?php echo $row['jTitle'];?>"/>
				  <div class="middle">
					  <div class="text">เข้าดู</div>
				  </div>
			  </div>
			  <?php
			  }else {
			  ?>
			  <div class="photo-in-thumnail">
				  <h5 class="p-5 lh-15 text-row cat-on-photo"><?php echo $row['name_Type'];?></h5>
				  <img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12 lazy" alt="<?php echo $row['jTitle'];?>" />
				  <div class="middle">
					  <div class="text">เข้าดู</div>
				  </div>
			  </div>
			  <?php
			  }
            ?>
          </div>
          <div class="col-xs-7 col-sm-9 p-0">
			  <div class="col-xs-12">
				<h3 class="text-row pt-5 pb-5"><?php echo $row['jTitle'];?></h3>
				<p class="text-desc-2 text-row"><?php echo $row['jDetail'];?></p>
				<p class="m-0"><span class="label label-success t-type t-text-desc"><?php echo $row['name_Type'];?></span> |
							   <span class="label label-warning t-province t-text-desc"><?php echo $row['PROVINCE_NAME'];?></span> |
							   <span class="label label-warning t-province t-text-desc"><?php echo $row['name_category'];?></span></p>
				<p class="mt-2 m-0"><span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo day_format_month_thai($row['jDate_Create']);?></span></p>
				<p class="mt-2 m-0"><span><i class="fa fa-eye" aria-hidden="true"></i> <?php echo number_format($row['jRead']);?></span></p>
				<h4 class="pt-10 pb-10 m-0 font-price">
					<?php
                      $vaprice = floatval($row['jPrice']);
                      if(!empty($vaprice) && $vaprice>0) {
                        echo number_format($vaprice);
                      }else{
                        echo "ไม่ระบุราคา";
                      }
					?>
				</h4>
			 </div>
          </div>
        </a>
      <?php
    }
?>
</div>
<div class="col-xs-12 p-0">
  <nav class="text-center">
    <ul class="pagination m-0 btn-lg">
     <?php
        if($Prev_Page){
          ?><li><a href="<?php echo $LinkWeb.$UrlPage;?>/?page=<?php echo $Prev_Page;?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li><?php
        }
        for($i=1; $i<=$Num_Pages; $i++){
          $Page1 = $Page-3;
          $Page2 = $Page+3;
          if($i != $Page && $i >= $Page1 && $i <= $Page2){
            ?><li><a href="<?php echo $LinkWeb.$UrlPage;?>/?page=<?php echo $i;?>"><?php echo $i;?></a></li><?php
          }else if($i==$Page){
            ?><li class="active"><a href="#"><?php echo $i;?></a></li><?php
          }
        }
        if($Page!=$Num_Pages){
          ?><li><a href="<?php echo $LinkWeb.$UrlPage;?>/?page=<?php echo $Next_Page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li><?php
        }
    ?>
    </ul>
  </nav>
</div>




<!-- Ads -->
<div class="row">
  <div class="col-xs-12">
    <h2 class="head-main-cate-new  f-k">จากผู้สนับสนุน</h2>
  </div>
</div>
<div class="grid">
  <!-- show new 4 --->
  <?php
    $SqlSelect = "SELECT *
                  FROM n_banner
                  WHERE (
                    DATE_FORMAT(bstr,'%Y-%m-%d') <= '".date('Y-m-d')."' AND
                    DATE_FORMAT(bend,'%Y-%m-%d') >= '".date('Y-m-d')."'
                  )
                  ORDER BY RAND();";
    if (select_num($SqlSelect)>0) {
      foreach (select_tb($SqlSelect) as $row) {
        ?>
        <div class="grid-item p-10">
          <div class="thumbnail p-0">
            <?php
              if (!empty($row['bscript'])) {
                echo htmlspecialchars_decode($row['bscript']);
              }else {
                ?>
                <a href="<?php echo $row['blink'];?>" target="_blank">
            		  <img class="lazy" data-src="<?php echo $LinkWeb;?>query/view-image.php?bview=<?php echo $row['bid'];?>" src="" border="0" />
            	  </a>
                <?php
              }
            ?>
          </div>
        </div>
        <?php
      }
    }
  ?>
  <!-- show new 4 --->
</div>
<!-- Ads -->
