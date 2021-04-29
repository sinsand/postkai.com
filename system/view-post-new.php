<h2 class="main-head-cate t-announce f-k">เพิ่มประกาศใหม่</h2>
<div class="col-xs-12">
  <form class="form-horizontal" action="<?php echo $LinkPath;?>" method="post">

    <div class="row">
      <div class="col-xs-12">
        <div class="form-group">
          <label class="control-label col-sm-2" for="post_type">หมวดหมู่:</label>
          <div class="col-sm-10">
            <select class="form-cntrol" name="post_type" id="post_type">
              <?php
              $SqlSelect = "SELECT *
                            FROM p_category
                            ORDER BY name_category ASC ";
              if (select_num($SqlSelect)>0) {
                foreach (select_tb($SqlSelect) as $row) {
                  ?><option value="<?php echo $row['id_category'];?>"><?php echo $row['name_category'];?></option><?php
                }
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="province">จังหวัด:</label>
          <div class="col-sm-10">
            <select class="form-control" name="province">
              <option value="">ทุกจังหวัด</option>
              <?php
                $SqlSelect = "SELECT *
                              FROM p_province
                              ORDER BY PROVINCE_NAME ASC ";
                if (select_num($SqlSelect)>0) {
                  foreach (select_tb($SqlSelect) as $row) {
                    ?><option value="<?php echo $row['PROVINCE_ID'];?>"><?php echo $row['PROVINCE_NAME'];?></option><?php
                  }
                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="post_subject">หัวข้อประกาศ:</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="post_subject" value="" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="post_desc">รายละเอียดย่อ:</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="post_desc" value="" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-12" for="post_desc_full">รายละเอียดทั้งหมด:</label>
          <div class="col-sm-12">
            <textarea class="form-control summernote" name="post_desc_full"></textarea>
          </div>
        </div>


      </div>
    </div>

  </form>
</div>
