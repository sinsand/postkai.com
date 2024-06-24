<div class="row m-0">
  <div class="col-12 p-0 pt-5 pb-5">
    <div class="container pt-5 pb-5">




      <!-- recommand -->
      <div class="row m-0">
        <div class="col-12 pb-5">
          <h2><?php echo $translations["sponsor"]; ?> <i class="fa-solid fa-circle-info" style="font-size:14px;"></i></h2>
          <?php
          /* $SqlSelect = "SELECT sj.*,pt.name_Type
                    FROM sb_job sj
                    INNER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                    WHERE (
                              ( sj.jPic1 != '' AND sj.jStatus = '1' ) AND
                              ( DATE_FORMAT(sj.jDate_Create ,'%Y-%m') BETWEEN '" . date('Y-m') . "'  AND '" . date('Y-m') . "')
                          )
                    ORDER BY sj.jRead DESC
                    LIMIT 0,4;"; */
          $SqlSelect = "SELECT sj.*,pt.name_Type
                    FROM sb_job sj
                    INNER JOIN p_type pt ON (sj.jaType = pt.id_Type)
                    WHERE (
                              ( sj.jPic1 != '' AND sj.jStatus = '1' ) 
                          )
                    ORDER BY rand()
                    LIMIT 0,4;";
          if (select_num($SqlSelect) > 0) {
          ?>
            <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-4">
              <?php
              foreach (select_tb($SqlSelect) as $row) {
                $image_p1 = $LinkWeb . "images/system/no-image.jpeg";
                if (!empty($row['jPic1'])) {
                  $image_p1 = $LinkWeb . "images/post/picture_job_1/" . $row['jPic1'];
                }
              ?>
                <div class="p-1 col">
                  <div class="card shadow-sm p-0">
                    <a href="<?php echo $LinkWeb; ?>post/<?php echo $row['jID']; ?>">
                      <img src="<?php echo $LinkWeb . "images/loading-screen.gif"; ?>" data-src="<?php echo $image_p1; ?>" class="col-12 p-0 lazyload bd-placeholder-img card-img-top" alt="" />
                      <!-- <img class="col-12 p-0 lazyload bd-placeholder-img card-img-top" data-original="<?php echo $LinkWeb; ?>query/view-image.php?sview=<?php echo $row['sid']; ?>" src="<?php echo $LinkWeb . "images/loading-screen.gif"; ?>" alt="<?php echo $row['sname']; ?>" > -->
                    </a>
                    <div class="card-body">
                      <p class="card-text text-truncate" alt="<?php echo $row['jTitle']; ?>">
                        <a href="<?php echo $LinkWeb; ?>post/<?php echo $row['jID']; ?>" class="text-decoration-none text-black fw-bold">
                          <?php echo $row['jTitle']; ?>
                        </a>
                      </p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <a href="<?php echo $LinkWeb; ?>post/<?php echo $row['jID']; ?>" class="btn btn-sm btn-outline-secondary"><?php echo $translations['post-view-main']; ?></a>
                        </div>
                        <small class="text-muted text-end">
                          <?php
                          $vaprice = floatval($row['jPrice']);
                          if (!empty($vaprice) && $vaprice > 0) {
                            echo "<div style='color: #f00;font-weight: bold;'>" . number_format($vaprice) . "</div>";
                          } else {
                            echo "<div style='color: #f00;font-weight: bold;'>N/A</div>";
                          }
                          ?>
                        </small>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>
          <?php
          }
          ?>
        </div>
      </div>

      <!-- Slide -->
      <div class="row m-0">
        <?php
        $SqlSelectSL = "SELECT *
                  FROM n_slide
                  WHERE (
                    (DATE_FORMAT(sstr,'%Y-%m-%d') <= '" . date('Y-m-d') . "' AND
                    DATE_FORMAT(send,'%Y-%m-%d') >= '" . date('Y-m-d') . "' ) AND
                    sstatus = '1'
                  )
                  ORDER BY RAND();";
        //echo $SqlSelectSL;
        if (select_num($SqlSelectSL) > 0) {
        ?>
          <div class="col-12 p-0 pb-5">
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <?php
                $i = 0;
                $a = 1;
                foreach (select_tb($SqlSelectSL) as $row) {
                  $clas = "";
                  if ($i == 0) {
                    $clas = "class='active' aria-current='true'";
                  }
                ?>
                  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="<?php echo $i; ?>" aria-label="Slide <?php echo $a; ?>" <?php echo $clas; ?>></button>
                <?php $i++;
                  $a++;
                }
                ?>


              </div>
              <div class="carousel-inner">
                <?php
                $i = 0;
                foreach (select_tb($SqlSelectSL) as $row) {
                  $clas = "";
                  if ($i == 0) {
                    $clas = "active";
                  }
                ?>
                  <div class="carousel-item <?php echo $clas; ?>">
                    <img class="lazyload" src="<?php echo $LinkWeb . "images/loading-screen.gif"; ?>" data-src="<?php echo $LinkWeb; ?>query/view-image.php?sview=<?php echo $row['sid']; ?>" alt="<?php echo $row['sname']; ?>" width="100%" height="auto">

                    <div class="container">
                      <div class="carousel-caption">
                        <p><?php echo $row['sname']; ?></p>
                        <p><a class="btn btn-lg btn-primary" href="<?php echo $row['slink']; ?>"><?php echo $translations['post-view-main']; ?></a></p>
                      </div>
                    </div>
                  </div>
                <?php $i++;
                }
                ?>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        <?php
        }
        ?>
      </div>

      <!-- Tab -->
      <div class="row m-0">
        <div class="col p-0  pb-5">
          <ul class="nav nav-tabs" id="CatTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active fs-4" id="cat-tab" data-bs-toggle="tab" data-bs-target="#cat-tab-pane" type="button" role="tab" aria-controls="cat-tab-pane" aria-selected="true"><?php echo $translations["post-from-cat"]; ?></button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link fs-4" id="province-tab" data-bs-toggle="tab" data-bs-target="#province-tab-pane" type="button" role="tab" aria-controls="province-tab-pane" aria-selected="false"><?php echo $translations["post-from-province"]; ?></button>
            </li>
          </ul>
          <div class="tab-content" id="TabContent">
            <div id="cat-tab-pane" class="tab-pane fade show active">
              <div class="row m-0">
                <div class="col-12 p-2 bg-white">
                  <div class="row m-0">
                    <?php
                    $SqlSelect = "SELECT *
                            FROM p_category
                            ORDER BY name_category ASC ";
                    if (select_num($SqlSelect) > 0) {
                      foreach (select_tb($SqlSelect) as $row) {
                    ?>
                        <div class="col-6 col-sm-4 col-md-3 p-1">
                          <a href="<?php echo $LinkWeb; ?>search/?category=<?php echo $row['id_category']; ?>" class="text-decoration-none col-12 border border-secondary-subtle p-0 d-block" title="<?php echo $row['name_category']; ?>">
                            <div class="text-center p-2 text-black" style="font-size: 14px;"><?php echo $row['name_category']; ?></div>
                          </a>
                        </div>
                    <?php
                      }
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div id="province-tab-pane" class="tab-pane fade">
              <div class="row m-0">
                <div class="col-12 p-2 bg-white">
                  <div class="row m-0">
                    <?php
                    $SqlSelect = "SELECT *
                            FROM p_province
                            ORDER BY PROVINCE_NAME ASC ";
                    if (select_num($SqlSelect) > 0) {
                      foreach (select_tb($SqlSelect) as $row) {
                    ?>
                        <div class="col-xs-6 col-sm-4 col-md-3 p-1">
                          <a href="<?php echo $LinkWeb; ?>search/?province=<?php echo $row['PROVINCE_ID']; ?>" class="text-decoration-none col-12 border border-secondary-subtle d-block p-0 ">
                            <div class="text-center p-2 text-black" style="font-size: 14px;">
                              <?php echo $row['PROVINCE_NAME']; ?>
                            </div>
                          </a>
                        </div>
                    <?php
                      }
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
      /* ADS  */
      require('mv-ads.php');
      ?>

      <!-- lasted 10 -->
      <div class="row m-0">
        <div class="col-12 mb-5 mt-5">
          <h2 class=""><?php echo $translations["new-post"]; ?></h2>
          <div class="row m-0 row-cols-1">
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
              <div class="p-1 col">
                <div class="card shadow-sm p-0">
                  <a href="<?php echo $LinkWeb; ?>post/<?php echo $row['jID']; ?>" class="row m-0 text-decoration-none text-black row-cols-2">
                    <div class="col-4 col-sm-3 p-0">
                      <?php
                      $image_p1 = $LinkWeb . "images/system/no-image.jpeg";
                      if (!empty($row['jPic1'])) {
                        $image_p1 = $LinkWeb . "images/post/picture_job_1/" . $row['jPic1'];
                      }
                      ?>
                      <div class="col-12 p-0">
                        <div class="position-relative">
                          <div class="position-absolute" style="top: 10px;left: 5px;">
                            <span class="text-white pt-1 pb-1 pe-2 ps-2 rounded" style="background: rgb(108 117 125 / 75%);">
                              <?php echo $row['name_Type']; ?>
                            </span>
                          </div>
                        </div>
                        <img class="col-12 p-0 lazyload" data-src="<?php echo $image_p1; ?>" src="<?php echo $LinkWeb . "images/loading-screen.gif"; ?>" style="width:100%;height:auto;" alt="<?php echo $row['jTitle']; ?>" />
                      </div>
                    </div>
                    <div class="col-8 col-sm-9 p-2 ps-3">
                      <div class="col-xs-12">
                        <div class="text-row pt-2 pb-1 fs-4 text-truncate"><?php echo $row['jTitle']; ?></div>
                        <p class="text-secondary text-truncate m-0"><?php echo $row['jDetail']; ?></p>
                        <p class="m-0 float-left">
                          <span class="text-secondary-subtle bg-warning pt-1 pb-1 pe-2 ps-2 rounded" style="font-size: 11px;"><?php echo $row['PROVINCE_NAME']; ?></span>&nbsp;&nbsp;
                          <span class="text-secondary-subtle bg-warning pt-1 pb-1 pe-2 ps-2 rounded" style="font-size: 11px;"><?php echo $row['name_category']; ?></span>
                        </p>
                        <p class="m-0">
                          <span class="text-muted" style="font-size: 11px;"><i class="fa-regular fa-clock"></i> <?php echo day_format_month_thai($row['jDate_Create']); ?></span>
                        </p>
                        <div class="row row-cols-2 d-flex ">
                          <div class="col-4 align-items-end justify-content-start">
                            <p class="mt-2 m-0">
                              <span style="font-size: 16px;"><i class="fa-regular fa-eye"></i> <?php echo number_format($row['jRead']); ?></span>
                            </p>
                          </div>
                          <div class="col-8 text-end d-flex align-items-end justify-content-end">
                            <div class="fs-4 pe-2 pe-sm-3 pt-10 pb-10 m-0 text-danger fw-bold">
                              <?php
                              $vaprice = floatval($row['jPrice']);
                              if (!empty($vaprice) && $vaprice > 0) {
                                echo $translations["price"] . " " . number_format($vaprice);
                              } else {
                                echo $translations["price-annouce"];
                              }
                              ?>
                            </div>
                          </div>
                        </div>


                      </div>
                    </div>
                  </a>
                </div>
              </div>
            <?php
            }
            ?>
            <div class="text-center col-12 pt-5">
              <a href="<?php echo $LinkWeb; ?>post-all" class="btn btn-secondary btn-sm"><?php echo $translations["all-post"]; ?> >></a>
            </div>
          </div>
        </div>
      </div>








    </div>
  </div>
</div>