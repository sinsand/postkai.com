<div class="row m-0">
  <div class="col-12 p-0 pt-5 pb-5">
    <div class="container pt-0 pb-5">



      <?php
      //echo checklogin(); 
      ?>
      <h2 class="">Profile</h2>
      <div class="row mt-3 mb-5">
        <div class="col-12 col-sm-4 col-md-3 p-0">
          <nav class="nav flex-column text-black bg-light card p-2">
            <a class="nav-link <?php echo $UrlId == "profile" || empty($UrlId) ? "active" : ""; ?>" aria-current="page" href="<?php echo $LinkWeb . $UrlPage . "/"; ?>profile">Profile</a>
            <a class="nav-link <?php echo $UrlId == "post-all" || empty($UrlId) ? "active" : ""; ?>" href="<?php echo $LinkWeb . $UrlPage . "/"; ?>post-all">My Post</a>
          </nav>
        </div>
        <div class="col-12 col-sm-8 col-md-9 p-0 ps-md-2">
          <div class="row m-0 card p-2">
            <?php
            switch (trim($UrlId)) {
              case 'profile':
                require("m-profile.php");
                break;
              case 'post-all':
                require("m-post-all.php");
                break;
              default:
                require("m-profile.php");
                break;
            }
            ?>
          </div>
        </div>
      </div>



    </div>
  </div>
</div>