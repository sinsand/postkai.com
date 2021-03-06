<!-- Slide -->
<div class="row">
  <div class="col-sm-12 hidden-xs" style="padding:20px 15px;">
      <!-- slide -->
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="<?php echo $LinkWeb;?>images/system/p-1.jpg" alt="" style="width:100%;">
          </div>

          <div class="item">
            <img src="<?php echo $LinkWeb;?>images/system/p-2.jpg" alt="" style="width:100%;">
          </div>

          <div class="item">
            <img src="<?php echo $LinkWeb;?>images/system/p-3.jpg" alt="" style="width:100%;">
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!-- slide -->
  </div>
</div>
<!-- recommand -->
<div class="row">
  <div class="col-xs-12">
    <h2 class="main-head-cate t-announce f-k">ประกาศแนะนำ</h2>
  </div>
  <?php
      $SqlSelect = "SELECT sj.*,pt.name_Type
                    FROM sb_job sj
                    INNER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                    WHERE ( sj.jPic1 != '' AND sj.jStatus = '1' )
                    ORDER BY sj.jRead DESC
                    LIMIT 0,4;";
      foreach (select_tb($SqlSelect) as $row) {
        ?>
          <a href="<?php echo $LinkWeb;?>post/<?php echo $row['jID'];?>" class="col-xs-6 col-sm-3 col-md-3 pb-10">
            <div class="thumbnail p-0">
              <?php
                if (!empty($row['jPic1'])) {
                  ?><img src="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $row['jPic1'];?>" style="width:100%;height:auto;" class="col-xs-12 p-0" alt="<?php echo $row['jTitle'];?>"/><?php
                }else {
                  ?><img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12" alt=""/><?php
                }
              ?>
                <div class="caption col-xs-12 p-0">
                  <h4 class="text-head text-row mt-5 mb-5"><?php echo $row['jTitle'];?></h4>
                  <p class="text-desc-2 text-row"><?php echo $row['jDetail'];?></p>
                  <p class="text-desc-2 text-row"><?php echo $row['jPrice'];?></p>
              </div>
            </div>
          </a>
        <?php
      }
  ?>
</div>
<!-- Ads -->
<div class="row">
  <div class="col-xs-12">
    <h2 class="main-head-cate t-advertis f-k">สนับสนุน</h2>
  </div>
  <!-- show new 4 --->
  <div class="col-xs-6 col-sm-3 col-md-3 mb-5 pb-5 pt-5">
    <div class="thumbnail p-0">
      <a href="<?php echo $LinkWeb;?>">
        <img src="<?php echo $LinkWeb;?>images/system/ads-free-1month.jpg" class="col-xs-12 p-0" alt=""/>
      </a>
    </div>
  </div>
  <div class="col-xs-6 col-sm-3 col-md-3 mb-5 pb-5 pt-5">
    <div class="thumbnail p-0">
      <a href="<?php echo $LinkWeb;?>">
        <img src="<?php echo $LinkWeb;?>images/system/ads-free-1month.jpg" class="col-xs-12 p-0" alt=""/>
      </a>
    </div>
  </div>
  <div class="col-xs-6 col-sm-3 col-md-3 mb-5 pb-5 pt-5">
    <div class="thumbnail p-0">
      <a href="<?php echo $LinkWeb;?>">
        <img src="<?php echo $LinkWeb;?>images/system/ads-free-1month.jpg" class="col-xs-12 p-0" alt=""/>
      </a>
    </div>
  </div>
  <div class="col-xs-6 col-sm-3 col-md-3 mb-5 pb-5 pt-5">
    <div class="thumbnail p-0">
      <a href="<?php echo $LinkWeb;?>">
        <img src="<?php echo $LinkWeb;?>images/system/ads-free-1month.jpg" class="col-xs-12 p-0" alt=""/>
      </a>
    </div>
  </div>
  <!-- show new 4 --->
</div>
<!-- category-->
<div class="row" style="margin:20px 0;">
  <!--
  <div class="col-xs-12">
    <h2 class="main-head-cate t-advertis f-k">สนับสนุน</h2>
  </div>-->
  <!-- show tab --->
  <div class="col-xs-12 p-0">
    <ul class="nav nav-tabs f-k fs-13">
      <li class="active"><a data-toggle="tab" href="#category_post">ประกาศตามหมวดหมู่</a></li>
      <li><a data-toggle="tab" href="#province_post">ประกาศตามจังหวัด</a></li>
    </ul>
    <div class="tab-content">
      <div id="category_post" class="tab-pane fade in active">
        <div class="row m-0">
          <div class="col-xs-12" style="padding:20px;">
            <?php
              $SqlSelect = "SELECT *
                            FROM p_category
                            ORDER BY name_category ASC ";
              if (select_num($SqlSelect)>0) {
                foreach (select_tb($SqlSelect) as $row) {
                  ?>
                  <div class="col-xs-6 col-sm-4 col-md-3 box-cate">
                    <a href="<?php echo $LinkWeb;?>search/?category=<?php echo $row['id_category'];?>" class="box-in-cate col-xs-12" title="<?php echo $row['name_category'];?>">
                      <h5 class="text-center p-5 lh-15 text-row"><?php echo $row['name_category'];?></h5>
                    </a>
                  </div>
                  <?php
                }
              }
            ?>
          </div>
        </div>
      </div>
      <div id="province_post" class="tab-pane fade">
        <div class="row m-0">
          <div class="col-xs-12" style="padding:20px;">
            <?php
              $SqlSelect = "SELECT *
                            FROM p_province
                            ORDER BY PROVINCE_NAME ASC ";
              if (select_num($SqlSelect)>0) {
                foreach (select_tb($SqlSelect) as $row) {
                  ?>
                  <p class="col-xs-6 col-sm-4 col-md-3 box-province">
                    <a href="<?php echo $LinkWeb;?>search/?province=<?php echo $row['PROVINCE_ID'];?>" class="box-in-province"><i class="fa fa-circle-o" aria-hidden="true"></i>  <?php echo $row['PROVINCE_NAME'];?></a>
                  </p>
                  <?php
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- show tab --->
</div>
<!-- post lasted -->
<div class="row">
  <div class="col-xs-12 col-sm-12">
    <div class="col-xs-12" style="padding:0px 0px 15px 0px;">
      <h2 class="main-head-cate t-announce f-k">ประกาศล่าสุด</h2>
    </div>
    <div class="col-xs-12" style="padding:0px;">

      <?php
          $SqlSelect = "SELECT sj.*,pt.name_Type,p.PROVINCE_NAME,pc.name_category
                        FROM sb_job sj
                        INNER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                        INNER JOIN p_category pc ON (sj.jType = pc.id_category)
                        INNER JOIN p_province p  ON (sj.jProvince = p.PROVINCE_ID)
                        WHERE ( sj.jPic1 != '' AND sj.jStatus = '1' )
                        ORDER BY sj.jDate_Create DESC
                        LIMIT 0,10;";
          foreach (select_tb($SqlSelect) as $row) {
            ?>
              <a href="<?php echo $LinkWeb;?>post/<?php echo $row['jID'];?>" class="row click-post">
                <div class="col-xs-3 p-0">
                  <!--<img src="http://placehold.it/500x300" class="col-xs-12" alt="">-->
                  <?php
                    if (!empty($row['jPic1'])) {
                      ?><img src="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $row['jPic1'];?>" class="col-xs-12" alt="<?php echo $row['jTitle'];?>" /><?php
                    }else {
                      ?><img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12" alt="" /><?php
                    }
                  ?>
                </div>
                <div class="col-xs-9 p-0">
                  <h3 class="text-row pt-5 pb-5"><?php echo $row['jTitle'];?></h3>
                  <p class="text-desc-2 text-row"><?php echo $row['jDetail'];?></p>
                  <p class="m-0"><span class="label label-success t-type t-text-desc"><?php echo $row['name_Type'];?></span> |
                                 <span class="label label-warning t-province t-text-desc"><?php echo $row['PROVINCE_NAME'];?></span> |
                                 <span class="label label-warning t-province t-text-desc"><?php echo $row['name_category'];?></span></p>
                  <p class="mt-2 m-0"><span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo day_format_month_thai($row['jDate_Create']);?></span></p>
                  <p class="mt-2 m-0"><span><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $row['jRead'];?></span></p>
                  <h4 class="pt-10 pb-10 m-0 font-price">ราคา <?php echo $row['jPrice'];?></h4>
                </div>
              </a>
            <?php
          }
      ?>
      <div class="text-center col-xs-12 pt-10">
        <a href="<?php echo $LinkWeb;?>post-all" class="btn btn-success">ดูประกาศทั้งหมด >></a>
      </div>

    </div>
  </div>
</div>
