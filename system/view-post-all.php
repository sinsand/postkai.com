<h2 class="main-head-cate t-announce f-k">ประกาศทั้งหมด</h2>
<?php
    $SqlSelect = "SELECT sj.*,pt.name_Type,p.PROVINCE_NAME,pc.name_category
                  FROM sb_job sj
                  INNER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                  INNER JOIN p_category pc ON (sj.jType = pc.id_category)
                  INNER JOIN p_province p  ON (sj.jProvince = p.PROVINCE_ID)
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

    foreach (select_tb($SqlSelect) as $row) {
      ?>
        <a href="<?php echo $LinkWeb."post/".$row['jID'];?>" class="row click-post">
          <div class="col-xs-3 p-0">
            <!--<img src="http://placehold.it/500x300" class="col-xs-12" alt="">-->
            <?php
              if (!empty($row['jPic1'])) {
                ?><img src="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $row['jPic1'];?>" class="col-xs-12" alt="<?php echo $row['jTitle'];?>"><?php
              }else {
                ?><img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12" alt=""><?php
              }
            ?>
          </div>
          <div class="col-xs-9 p-0">
            <h3 class="text-row pt-5 pb-5"><?php echo $row['jTitle'];?></h3>
            <p class="text-desc-2 text-row"><?php echo $row['jDetail'];?></p>
            <p class="m-0"><span class="label label-success t-type t-text-desc"><?php echo $row['name_Type'];?></span> | <span class="label label-warning t-province t-text-desc"><?php echo $row['PROVINCE_NAME'];?></span></p>
            <p class="mt-2 m-0"><span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo day_format_month_thai($row['jDate_Create']);?></span></p>
            <p class="mt-2 m-0"><span><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $row['jRead'];?></span></p>
            <h4 class="pt-10 pb-10 m-0 font-price">ราคา <?php echo $row['jPrice'];?></h4>
          </div>
        </a>
      <?php
    }
?>
<div class="col-xs-12 p-0">
  <nav>
    <ul class="pagination m-0">
     <?php
        if($Prev_Page){
          ?><li><a href="<?php echo $LinkWeb.$UrlPage;?>/?page=<?php echo $Prev_Page;?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li><?php
        }
        for($i=1; $i<=$Num_Pages; $i++){
          $Page1 = $Page-2;
          $Page2 = $Page+2;
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
