<!-- Ads -->
<div class="row m-0 mt-5">
    <div class="col-12 p-0">
        <h2 class=""><?php echo $translations["sponsor"]; ?></h2>
        <div class="row m-0 row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-4">
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
                    <div class="col p-1">
                        <div class="col-12 card p-2">
                            <div class=" p-0">
                                <?php
                                if (!empty($row['bscript'])) {
                                    echo htmlspecialchars_decode($row['bscript']);
                                } else {
                                ?>
                                    <a href="<?php echo $row['blink']; ?>" target="_blank">
                                        <img class="col-12 lazyload border-0" src="<?php echo $LinkWeb . "images/loading-screen.gif";?>" data-src="<?php echo $LinkWeb; ?>query/view-image.php?bview=<?php echo $row['bid']; ?>" width="auto" height="100%" />
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>