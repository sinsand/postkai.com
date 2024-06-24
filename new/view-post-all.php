<div class="row m-0">
  <div class="col-12 p-0 pt-5 pb-5">
    <div class="container pt-0 pb-5">
      <h2 class=""><?php echo $translations["post-all"]; ?></h2>
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
      if (!$_GET['page']) {
        $Page = 1;
      }

      $Prev_Page = $Page - 1;
      $Next_Page = $Page + 1;

      $Page_Start = (($Per_Page * $Page) - $Per_Page);
      if (select_num($SqlSelect) <= $Per_Page) {
        $Num_Pages = 1;
      } else if ((select_num($SqlSelect) % $Per_Page) == 0) {
        $Num_Pages = (select_num($SqlSelect) / $Per_Page);
      } else {
        $Num_Pages = (select_num($SqlSelect) / $Per_Page) + 1;
        $Num_Pages = (int)$Num_Pages;
      }
      $id_run = $Page_Start + 1;

      $SqlSelect .= " LIMIT $Page_Start , $Per_Page; ";


      ?>
      <div class="row m-0">
        <div class="col-12 pt-3 pb-5 p-0 text-left">
          <nav class="blog-pagination">
            <?php
            if ($Prev_Page) {
            ?>
              <a href="<?php echo $LinkWeb . $UrlPage . "/?" . $U_search; ?>&page=<?php echo $Prev_Page; ?>" aria-label="Previous" class="btn btn-outline-primary"><span aria-hidden="true">&laquo;</span></a>
              <?php
            }
            for ($i = 1; $i <= $Num_Pages; $i++) {
              $Page1 = $Page - 2;
              $Page2 = $Page + 2;
              if ($i != $Page && $i >= $Page1 && $i <= $Page2) {
              ?>
                <a href="<?php echo $LinkWeb . $UrlPage . "/?" . $U_search; ?>&page=<?php echo $i; ?>" class="btn btn-outline-primary"><?php echo $i; ?></a>
              <?php
              } else if ($i == $Page) {
              ?>
                <a href="#" class="btn btn-outline-primary active"><?php echo $i; ?></a>
              <?php
              }
            }
            if ($Page != $Num_Pages) {
              ?>
              <a href="<?php echo $LinkWeb . $UrlPage . "/?" . $U_search; ?>&page=<?php echo $Next_Page; ?>" aria-label="Next"><span aria-hidden="true" class="btn btn-outline-primary">&raquo;</span></a>
            <?php
            }
            ?>
          </nav>
        </div>

        <div class="col-12 p-0">
          <div class="row m-0">
            <?php
            foreach (select_tb($SqlSelect) as $row) {
            ?>
              <div class="col p-0 pb-1">
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
                        <img class="col-12 p-0 lazyload" data-src="<?php echo $image_p1; ?>" src="<?php echo $LinkWeb . "images/loading-screen.gif";?>" style="width:100%;height:auto;" alt="<?php echo $row['jTitle']; ?>" />
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
          </div>
        </div>

        <div class="col-12 pt-3 pb-5 p-0 text-left">
          <nav class="blog-pagination">
            <?php
            if ($Prev_Page) {
            ?>
              <a href="<?php echo $LinkWeb . $UrlPage . "/?" . $U_search; ?>&page=<?php echo $Prev_Page; ?>" aria-label="Previous" class="btn btn-outline-primary"><span aria-hidden="true">&laquo;</span></a>
              <?php
            }
            for ($i = 1; $i <= $Num_Pages; $i++) {
              $Page1 = $Page - 2;
              $Page2 = $Page + 2;
              if ($i != $Page && $i >= $Page1 && $i <= $Page2) {
              ?>
                <a href="<?php echo $LinkWeb . $UrlPage . "/?" . $U_search; ?>&page=<?php echo $i; ?>" class="btn btn-outline-primary"><?php echo $i; ?></a>
              <?php
              } else if ($i == $Page) {
              ?>
                <a href="#" class="btn btn-outline-primary active"><?php echo $i; ?></a>
              <?php
              }
            }
            if ($Page != $Num_Pages) {
              ?>
              <a href="<?php echo $LinkWeb . $UrlPage . "/?" . $U_search; ?>&page=<?php echo $Next_Page; ?>" aria-label="Next"><span aria-hidden="true" class="btn btn-outline-primary">&raquo;</span></a>
            <?php
            }
            ?>
          </nav>
        </div>
      </div>

      <?php
      /* ADS  */
      require('mv-ads.php');
      ?>



    </div>
  </div>
</div>