<h2 class="main-head-cate t-search f-k">สมัครสมาชิก</h2>
<div class="row">
  <div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
    <form class="form-horizontal" action="<?php echo $LinkPath;?>" method="post">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" placeholder="Enter email" required autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="password">Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" placeholder="Enter password" required autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="password">Re-Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" placeholder="Enter password" required autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="">ชื่อ-นามสกุล:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="" placeholder=">ชื่อ-นามสกุล" required autocomplete="off">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="">เบอร์ติดต่อ:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="" placeholder="เบอร์ติดต่อ" required autocomplete="off">
        </div>
      </div>


      <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-10">
          <button type="submit" name="btnlogin" class="btn btn-success">สมัครสมาชิก</button> | <a href="<?php echo $LinkWeb;?>login">เข้าสูระบบ</a>
        </div>
      </div>
    </form>
  </div>
</div>
