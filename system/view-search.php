<h2 class="main-head-cate t-search f-k">ค้นหาประกาศ</h2>
<?php
    $S_search = null;
    if (!empty($_GET['type'])) {
      $S_search .= " AND ( pt.id_Type = '".$_GET['type']."' ) ";
    }
    if (!empty($_GET['province'])) {
      $S_search .= " AND ( p.PROVINCE_ID = '".$_GET['province']."' ) ";
    }
    if (!empty($_GET['category'])) {
      $S_search .= " AND ( p.id_category = '".$_GET['category']."' ) ";
    }
    if (!empty($_GET['keywords'])) {
      $S_search .= " AND ( sj.jTitle LIKE '%".$_GET['keywords']."%' ) ";
    }
    $SqlSelectSearch = "";
    $SqlSelectSearchAll ="";
    if (!empty($S_search)) {
      $SqlSelectSearch = "SELECT sj.*,pt.name_Type,p.PROVINCE_NAME
                          FROM sb_job sj
                          INNER JOIN p_Type pt ON (sj.jaType = pt.id_Type)
                          INNER JOIN p_province p  ON (sj.jProvince = p.PROVINCE_NAME)
                          WHERE (
                                  ( sj.jStatus = '1' )
                                  $S_search
                                )
                          ORDER BY sj.jDate_Create DESC ";
      $Per_Page = 50;   // Per Page
      $Page = $_GET['page'];
      if(!$_GET['page']){
        $Page=1;
      }

      $Prev_Page = $Page-1;
      $Next_Page = $Page+1;

      $Page_Start = (($Per_Page*$Page)-$Per_Page);
      if(select_num($SqlSelectSearch)<=$Per_Page){
        $Num_Pages =1;
      }
      else if((select_num($SqlSelectSearch) % $Per_Page)==0){
        $Num_Pages =(select_num($sql)/$Per_Page) ;
      }else{
        $Num_Pages =(select_num($SqlSelectSearch)/$Per_Page)+1;
        $Num_Pages = (int)$Num_Pages;
      }
      $id_run = $Page_Start+1;

      $SqlSelectSearchAll  = $SqlSelectSearch;
      $SqlSelectSearch .= " LIMIT $Page_Start , $Per_Page; ";

    }

    ?>

    <div class="col-xs-12">
      <form action="<?php echo $LinkWeb;?>search/" method="get">
        <div class="col-xs-12">
          <div class="form-group">
            <label for="email">ข้อความค้นหา</label>
            <input type="search" class="form-control" placeholder="ข้อความค้นหา" name="keywords" autocomplete="off" required>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4">
          <div class="form-group">
            <select class="form-control" name="province">
              <option value="">ทุกจังหวัด</option>
              <?php
                $SqlSelect = "SELECT *
                              FROM p_province
                              ORDER BY PROVINCE_NAME ASC ";
                if (select_num($SqlSelect)>0) {
                  foreach (select_tb($SqlSelect) as $row) {
                    ?><option value="<?php echo $row['PROVINCE_ID'];?>"<?php echo $_GET['province']==$row['PROVINCE_ID']?"selected":"";?>><?php echo $row['PROVINCE_NAME'];?></option><?php
                  }
                }
              ?>
            </select>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4">
          <div class="form-group">
            <select class="form-control" name="category">
              <option value="">ทุกหมวดหมู่</option>
              <?php
                $SqlSelect = "SELECT *
                              FROM p_category
                              ORDER BY name_category ASC ";
                if (select_num($SqlSelect)>0) {
                  foreach (select_tb($SqlSelect) as $row) {
                    ?><option value="<?php echo $row['id_category'];?>" <?php echo $_GET['category']==$row['id_category']?"selected":"";?>><?php echo $row['name_category'];?></option><?php
                  }
                }
              ?>
            </select>
          </div>
        </div>
        <div class="col-xs-12 col-sm-4">
          <div class="form-group">
            <select class="form-control" name="type">
              <option value="">ทุกประเภท</option>
              <?php
                $SqlSelect = "SELECT *
                              FROM p_Type
                              ORDER BY name_Type ASC ";
                if (select_num($SqlSelect)>0) {
                  foreach (select_tb($SqlSelect) as $row) {
                    ?><option value="<?php echo $row['id_Type'];?>" <?php echo $_GET['type']==$row['id_Type']?"selected":"";?>><?php echo $row['name_Type'];?></option><?php
                  }
                }
              ?>
            </select>
          </div>
        </div>
        <div class="col-xs-12">
          <button type="submit" class="btn btn-success mb-10" style="width:100%;">ค้นหา</button>
        </div>
      </form>
    </div>


    <?php

    if (select_num($SqlSelectSearch)>0) {
      ?>
      <div class="col-xs-12 p-0">
        <h2 class="main-head-cate t-others f-k">แสดงประกาศ <?php echo  select_num($SqlSelectSearch)."/".select_num($SqlSelectSearchAll);?> รายการ</h2>
      </div>
      <?php
      foreach (select_tb($SqlSelectSearch) as $row) {
        ?>
          <a href="<?php echo $LinkWeb."post/".$row['jID'];?>" class="row click-post">
            <div class="col-md-4 col-xs-3 p-0">
              <!--<img src="http://placehold.it/500x300" class="col-xs-12" alt="">-->
              <?php
                if (!empty($row['jPic1'])) {
                  ?><img src="<?php echo $LinkWeb;?>images/post/picture_job_1/<?php echo $row['jPic1'];?>" class="col-xs-12" alt="" /><?php
                }else {
                  ?><img src="<?php echo $LinkWeb;?>images/system/no-image.jpeg" class="col-xs-12" alt="" /><?php
                }
              ?>
            </div>
            <div class="col-md-8 col-xs-9 p-0">
              <h3 class="text-row pt-5 pb-5"><?php echo $row['jTitle'];?></h3>
              <p class="text-desc-2 text-row"><?php echo $row['jDetail'];?></p>
              <p class="m-0"><span class="label label-success t-type t-text-desc"><?php echo $row['name_Type'];?></span> | <span class="label label-warning t-province t-text-desc"><?php echo $row['PROVINCE_NAME'];?></span></p>
              <p class="mt-2 m-0"><span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $row['jDate_Create'];?></span></p>
              <p class="mt-2 m-0"><span><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $row['jRead'];?></span></p>
              <h4 class="pt-10 pb-10 m-0 font-price"><?php echo $row['jPrice'];?></h4>
            </div>
          </a>
        <?php
      }
      ?>
        <div class="col-xs-12 p-0 text-center">
          <nav>
            <ul class="pagination m-0">
             <?php
                if($Prev_Page){
                  ?><li><a href="<?php echo $LinkWeb.$UrlPage;?>/<?php echo $Prev_Page;?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li><?php
                }
                for($i=1; $i<=$Num_Pages; $i++){
                  $Page1 = $Page-2;
                  $Page2 = $Page+2;
                  if($i != $Page && $i >= $Page1 && $i <= $Page2){
                    ?><li><a href="<?php echo $LinkWeb.$UrlPage;?>/<?php echo $i;?>"><?php echo $i;?></a></li><?php
                  }else if($i==$Page){
                    ?><li class="active"><a href="#"><?php echo $i;?></a></li><?php
                  }
                }
                if($Page!=$Num_Pages){
                  ?><li><a href="<?php echo $LinkWeb.$UrlPage;?>/<?php echo $Next_Page;?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li><?php
                }
            ?>
            </ul>
          </nav>
        </div>
      <?php
    }else {
      ?>
      <p>ไม่พบข้อมูล - not found - กรุณาเลือกข้อมูลให้ถูกต้อง</p>
      <?php
    }
?>
