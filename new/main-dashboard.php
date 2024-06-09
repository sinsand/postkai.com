<!-- recommand -->
<div class="row">
  <div class="col-xs-12">
    <h2 class="head-main-cate-new f-k"><?php echo $translations["recommend-month"]; ?></h2>
  </div>
  <?php
  $SqlSelect = "SELECT sj.*,pt.name_Type
                    FROM sb_job sj
                    INNER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                    WHERE (
                              ( sj.jPic1 != '' AND sj.jStatus = '1' ) AND
                              ( DATE_FORMAT(sj.jDate_Create ,'%Y-%m') BETWEEN '" . date('Y-m') . "'  AND '" . date('Y-m') . "')
                          )
                    ORDER BY sj.jRead DESC
                    LIMIT 0,4;";
  //echo $SqlSelect;
  if (select_num($SqlSelect) > 0) {
    foreach (select_tb($SqlSelect) as $row) {
  ?>
      <a href="<?php echo $LinkWeb; ?>post/<?php echo $row['jID']; ?>" class="col-xs-6 col-sm-3 col-md-3 pb-10">
        <div class="thumbnail p-0">
          <?php
          if (!empty($row['jPic1'])) {
          ?>
            <div class="photo-in-thumnail">
              <h5 class="p-5 lh-15 text-row cat-on-photo"><?php echo $row['name_Type']; ?></h5>
              <img class="col-xs-12 p-0 image-show lazy" data-src="<?php echo $LinkWeb; ?>images/post/picture_job_1/<?php echo $row['jPic1']; ?>" src="" style="width:100%;height:auto;" alt="<?php echo $row['jTitle']; ?>" />
              <div class="middle">
                <div class="text"><?php echo $translations["post-view-main"]; ?></div>
              </div>
            </div>
          <?php
          } else {
          ?><img src="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" class="col-xs-12 lazy" alt="" /><?php
                                                                                                        }
                                                                                                          ?>
          <div class="caption col-xs-12 p-0">
            <h4 class="text-head text-row mt-5 mb-5"><?php echo $row['jTitle']; ?></h4>
            <p class="text-desc-2 text-row"><?php echo $row['jDetail']; ?></p>
            <p class="text-desc-2 text-row">
              <?php
              $vaprice = floatval($row['jPrice']);
              if (!empty($vaprice) && $vaprice > 0) {
                echo "<span style='color: #f00;font-weight: bold;'>ราคา " . number_format($vaprice) . "</span>";
              } else {
                echo "<span style='color: #f00;font-weight: bold;'>ไม่ระบุราคา</span>";
              }
              ?>
            </p>
          </div>
        </div>
      </a>
  <?php
    }
    // code...
  }
  ?>
</div>
<!-- Slide -->
<?php
$SqlSelectSL = "SELECT *
                  FROM n_slide
                  WHERE (
                    (DATE_FORMAT(sstr,'%Y-%m-%d') <= '" . date('Y-m-d') . "' AND
                    DATE_FORMAT(send,'%Y-%m-%d') >= '" . date('Y-m-d') . "' ) AND
                    sstatus = '1'
                  )
                  ORDER BY RAND();";
echo $SqlSelectSL;
if (select_num($SqlSelectSL) > 0) {
?>
  <div class="row">
    <div class="col-xs-12 p-3">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <?php
          $i = 0;
          foreach (select_tb($SqlSelectSL) as $row) {
            $clas = "";
            if ($i == 0) {
              $clas = "active";
            }
          ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo ($i++); ?>" class="<?php echo $clas; ?>"></li>
          <?php
          }
          ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <?php
          $i = 0;
          foreach (select_tb($SqlSelectSL) as $row) {
            $clas = "";
            if ($i == 0) {
              $clas = "active";
            }
          ?>
            <div class="item <?php echo $clas; ?>">
              <a href="<?php echo $row['slink']; ?>" target="_blank">
                <img class="lazy" data-src="<?php echo $LinkWeb; ?>query/view-image.php?sview=<?php echo $row['sid']; ?>" src="" alt="<?php echo $row['sname']; ?>" style="width:100%;height:auto;">
              </a>
            </div>
          <?php $i++;
          }
          ?>
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
    </div>
  </div>
<?php
}
?>

<!-- slide -->
<!-- Ads -->
<div class="row">
  <div class="col-xs-12">
    <h2 class="head-main-cate-new  f-k"><?php echo $translations["sponsor"]; ?></h2>
  </div>
</div>
<div class="row">
  <!-- show new 4 --->
  <?php
  $SqlSelect = "SELECT *
                  FROM n_banner
                  WHERE (
                    DATE_FORMAT(bstr,'%Y-%m-%d') <= '" . date('Y-m-d') . "' AND
                    DATE_FORMAT(bend,'%Y-%m-%d') >= '" . date('Y-m-d') . "'
                  )
                  ORDER BY RAND();";
  if (select_num($SqlSelect) > 0) {
    foreach (select_tb($SqlSelect) as $row) {
  ?>
      <div class="col-xs-12 col-sm-4 col-md-4 p-10">
        <div class=" p-0">
          <?php
          if (!empty($row['bscript'])) {
            echo htmlspecialchars_decode($row['bscript']);
          } else {
          ?>
            <a href="<?php echo $row['blink']; ?>" target="_blank">
              <img class="col-xs-12" src="<?php echo $LinkWeb; ?>query/view-image.php?bview=<?php echo $row['bid']; ?>" border="0" />
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
      <li class="active"><a data-toggle="tab" href="#category_post"><?php echo $translations["post-from-cat"]; ?></a></li>
      <li><a data-toggle="tab" href="#province_post"><?php echo $translations["post-from-province"]; ?></a></li>
    </ul>
    <div class="tab-content">
      <div id="category_post" class="tab-pane fade in active">
        <div class="row m-0">
          <div class="col-xs-12" style="padding:20px;">
            <?php
            $SqlSelect = "SELECT *
                            FROM p_category
                            ORDER BY name_category ASC ";
            if (select_num($SqlSelect) > 0) {
              foreach (select_tb($SqlSelect) as $row) {
            ?>
                <div class="col-xs-6 col-sm-4 col-md-3 box-cate">
                  <a href="<?php echo $LinkWeb; ?>search/?category=<?php echo $row['id_category']; ?>" class="box-in-cate col-xs-12" title="<?php echo $row['name_category']; ?>">
                    <h5 class="text-center p-5 lh-15 text-row"><?php echo $row['name_category']; ?></h5>
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
            if (select_num($SqlSelect) > 0) {
              foreach (select_tb($SqlSelect) as $row) {
            ?>
                <p class="col-xs-6 col-sm-4 col-md-3 box-province">
                  <a href="<?php echo $LinkWeb; ?>search/?province=<?php echo $row['PROVINCE_ID']; ?>" class="box-in-province"><i class="fa fa-circle-o" aria-hidden="true"></i> <?php echo $row['PROVINCE_NAME']; ?></a>
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
      <h2 class="head-main-cate-new f-k"><?php echo $translations["new-post"]; ?></h2>
    </div>
    <div class="col-xs-12" style="padding:0px;">

      <?php
      $SqlSelect = "SELECT sj.*,pt.name_Type,p.PROVINCE_NAME,pc.name_category
                        FROM sb_job sj
                        LEFT OUTER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                        LEFT OUTER JOIN p_category pc ON (sj.jType = pc.id_category)
                        LEFT OUTER JOIN p_province p  ON (sj.jProvince = p.PROVINCE_ID)
                        WHERE ( sj.jStatus = '1' )
                        ORDER BY sj.jDate_Create DESC
                        LIMIT 0,10;";
      foreach (select_tb($SqlSelect) as $row) {
      ?>
        <a href="<?php echo $LinkWeb; ?>post/<?php echo $row['jID']; ?>" class="row click-post">
          <div class="col-xs-5 col-sm-3 p-0">
            <!--<img src="http://placehold.it/500x300" class="col-xs-12" alt="">-->
            <?php
            if (!empty($row['jPic1'])) {
            ?>
              <div class="photo-in-thumnail">
                <h5 class="p-5 lh-15 text-row cat-on-photo"><?php echo $row['name_Type']; ?></h5>
                <img class="col-xs-12 p-0 image-show lazy" data-src="<?php echo $LinkWeb; ?>images/post/picture_job_1/<?php echo $row['jPic1']; ?>" src="" style="width:100%;height:auto;" alt="<?php echo $row['jTitle']; ?>" />
                <div class="middle">
                  <div class="text"><?php echo $translations["post-view-main"]; ?></div>
                </div>
              </div>
            <?php
            } else {
            ?>
              <div class="photo-in-thumnail">
                <h5 class="p-5 lh-15 text-row cat-on-photo"><?php echo $row['name_Type']; ?></h5>
                <img class="col-xs-12 lazy" data-src="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" src="" alt="<?php echo $row['jTitle']; ?>" />
                <div class="middle">
                  <div class="text"><?php echo $translations["post-view-main"]; ?></div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
          <div class="col-xs-7 col-sm-9 p-0">
            <div class="col-xs-12">
              <h3 class="text-row pt-5 pb-5"><?php echo $row['jTitle']; ?></h3>
              <p class="text-desc-2 text-row"><?php echo $row['jDetail']; ?></p>
              <p class="m-0"><span class="label label-warning t-province t-text-desc"><?php echo $row['PROVINCE_NAME']; ?></span>&nbsp;&nbsp;
                <span class="label label-warning t-province t-text-desc"><?php echo $row['name_category']; ?></span>
              </p>
              <p class="mt-2 m-0"><span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo day_format_month_thai($row['jDate_Create']); ?></span></p>
              <p class="mt-2 m-0"><span><i class="fa fa-eye" aria-hidden="true"></i> <?php echo number_format($row['jRead']); ?></span></p>
              <h4 class="pt-10 pb-10 m-0 font-price">
                <?php
                $vaprice = floatval($row['jPrice']);
                if (!empty($vaprice) && $vaprice > 0) {
                  echo $translations["price"] . " " . number_format($vaprice);
                } else {
                  echo $translations["price-annouce"];
                }
                ?>
              </h4>
            </div>
          </div>
        </a>
      <?php
      }
      ?>
      <div class="text-center col-xs-12 pt-10">
        <a href="<?php echo $LinkWeb; ?>post-all" class="btn btn-success"><?php echo $translations["all-post"]; ?> >></a>
      </div>

    </div>
  </div>
</div>