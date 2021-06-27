<?php
 $SqlSelect = "SELECT *
               FROM sb_job
               WHERE ( mID = '".base64url_decode($_COOKIE[$CookieID])."' )";
 if (select_num($SqlSelect)>0) {
   foreach (select_tb($SqlSelect) as $row) {
     ?>
      <div class="row">
        <div class="col-sm-2"><?php echo $row['IDJOB'];?></div>
        <div class="col-sm-6"><?php echo $row['jTitle'];?></div>
        <div class="col-sm-4 text-center">
          <div class="btn-group btn-xs">
            <button id="<?php echo $row['jID'];?>" data-toggle="modal" class="btn btn-sm btn-default modal-view" data-target="#modal-view"><i class="fa fa-search"></i></button>
            <button id="<?php echo $row['jID'];?>" data-toggle="modal" class="btn btn-sm btn-default modal-edit" data-target="#modal-edit"><i class="fa fa-edit"></i></button>
            <button id="<?php echo $row['jID'];?>" data-toggle="modal" class="btn btn-sm btn-default modal-trash" data-target="#modal-trash"><i class="fa fa-trash"></i></button>
          </div>
        </div>
      </div>
     <?php
   }
 }
?>
