<div class="row pb-10">
  <div class="col-xs-12 text-right pb-10">
    <a href="<?php echo $LinkWeb;?>post-new" class="btn btn-lg btn-success" target="_blank">เพิ่มประกาศ <i class="fa fa-plus"></i></a>
  </div>
</div>
<?php
 $SqlSelect = "SELECT *
               FROM sb_job
               WHERE ( mID = '".base64url_decode($_COOKIE[$CookieID])."' )";
 if (select_num($SqlSelect)>0) {
   foreach (select_tb($SqlSelect) as $row) {
     ?>
      <div class="row pb-10 pt-10" style="border-bottom: 1px solid #e1e1e1;">
        <div class="col-xs-6 col-sm-2 col-md-2 text-left fw-b">#รหัสประกาศ <?php echo $row['IDJOB'];?></div>
        <div class="col-sm-7 hidden-xs"><b>#หัวข้อเรื่อง</b><div class="wb"><?php echo $row['jTitle'];?></div></div>
        <div class="col-xs-6 col-sm-3 col-md-3 text-right">
          <div class="btn-group btn-xs">
            <a href="<?php echo $LinkWeb."post/".$row['jID'];?>" target="_blank" class="btn btn-sm btn-default"><i class="fa fa-search"></i></a>
            <a href="<?php echo $LinkWeb."post/".$row['jID'];?>/?confirm-edit=check" target="_blank" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
            <button id="<?php echo $row['jID'];?>" data-toggle="modal" class="btn btn-sm btn-default modal-trash" data-target="#modal-trash"><i class="fa fa-trash"></i></button>
          </div>
        </div>
        <div class="col-xs-12 pt-5 hidden-sm hidden-md hidden-lg"><?php echo $row['jTitle'];?></div>
      </div>
     <?php
   }
 }
?>
