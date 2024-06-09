<div class="row m-0 bg_box_l">
  <div class="col-12 p-0 pt-5 pb-5">
    <div class="container pt-5 pb-5">


      <div class="row">
        <div class="col-12 col-md-9">



          <!-- recommand -->
          <div class="row m-0">
            <div class="col-12 pb-5">
              <h2><?php echo $translations["sponsor"]; ?></h2>
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
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
                  <?php
                  foreach (select_tb($SqlSelect) as $row) {
                  ?>
                    <div class="p-1">
                      <div class="card shadow-sm p-0">
                        <img src="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" class="col-12 p-0 lazyload bd-placeholder-img card-img-top" alt="" />
                        <!-- <img class="col-12 p-0 lazyload bd-placeholder-img card-img-top" data-original="<?php echo $LinkWeb; ?>query/view-image.php?sview=<?php echo $row['sid']; ?>" src="<?php echo $LinkWeb; ?>images/system/no-image.jpeg" alt="<?php echo $row['sname']; ?>" > -->
                        <div class="card-body">
                          <p class="card-text text-truncate" alt="<?php echo $row['jTitle']; ?>"><?php echo $row['jTitle']; ?></p>
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
            <div class="row m-0">
              <div class="col-12 pb-5">
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
                        <img class="lazyload"  src="<?php echo $LinkWeb; ?>query/view-image.php?sview=<?php echo $row['sid']; ?>" alt="<?php echo $row['sname']; ?>" width="100%" height="auto">

                        <div class="container">
                          <div class="carousel-caption">
                            <!-- <h1>Example headline.</h1>-->
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
            </div>
          <?php
          }
          ?>
          <!-- slide -->



          <!-- Ads -->
          <div class="row m-0">
            <div class="col-12">
              <h2 class=""><?php echo $translations["sponsor"]; ?></h2>
              <div class="row m-0 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
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
                    <div class="col p-2">
                      <div class=" p-0">
                        <?php
                        if (!empty($row['bscript'])) {
                          echo htmlspecialchars_decode($row['bscript']);
                        } else {
                        ?>
                          <a href="<?php echo $row['blink']; ?>" target="_blank">
                            <img class="col-12 lazyload" src="<?php echo $LinkWeb; ?>query/view-image.php?bview=<?php echo $row['bid']; ?>" width="auto" height="100%" border="0" />
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
            </div>
          </div>


          <div class="row m-0">
            <div class="col-12 mb-5 mt-5">
              <h2 class=""><?php echo $translations["new-post"]; ?></h2>


            </div>
          </div>










        </div>
        <div class="col-12 col-md-3"></div>
      </div>



    </div>
  </div>
</div>