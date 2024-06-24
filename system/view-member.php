<?php echo checklogin(); ?>
<h2 class="main-head-cate t-search f-k"><?php echo $translations["member-head"];?></h2>
<div class="row" style="margin:20px 0;">
  <div class="col-xs-12 p-0">
    <ul class="nav nav-tabs f-k fs-13">
      <li <?php echo $UrlId=="profile"||empty($UrlId)?"class='active'":"";?>><a href="<?php echo $LinkWeb.$UrlPage."/";?>profile"><?php echo $translations["member-profile"];?></a></li>
      <li <?php echo $UrlId=="post-all"?"class='active'":"";?>><a href="<?php echo $LinkWeb.$UrlPage."/";?>post-all"><?php echo $translations["member-my-post"];?></a></li>
    </ul>
    <div class="tab-content">
      <div id="" class="tab-pane fade in active">
        <div class="row m-0">
          <div class="col-xs-12" style="padding:20px;">
            <?php
              switch (trim($UrlId)) {
                case 'profile'      : include("view-member-profile.php"); break;
                case 'post-all'     : include("view-member-post-all.php"); break;
                default             : include("view-member-profile.php"); break;
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
