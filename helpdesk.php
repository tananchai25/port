<?php
session_start();
  if (!isset($_SESSION['tyh_username'])) {
    header('location:login_tyh.php');
 }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['tyh_username']);
    header('location:login_tyh.php');
 }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Helpdesk</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css2/adminlte.css">




  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
</head>
<body class="hold-transition login-page">



<div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  <strong>คำแนะนำ!</strong> กรณีแจ้งติดตั้งอุปกรณ์ใหม่ กรุณาติดต่อพัสดุ
</div>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">

    <div class="card-body">
      <h4 class="login-box-msg2" >ระบบแจ้งซ่อมคอมพิวเตอร์</h4>


   <?php if(isset($_SESSION['tyh_username'])) :?>
      <p class="d-block login-box-msg">ยินดีต้อนรับ <?php echo $_SESSION['tyh_username'];?> เข้าสู่ระบบ</p>
    <?php endif ?>



      <form action="helpdesk_db.php" method="post">

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="ชื่อผู้แจ้ง" name="name" required>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="เบอร์ติดต่อ" name="tel" required>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" name="location" id="location" placeholder="แผนก" required>
            <option value="" disabled selected>สถานที่อาคาร/ตึกชำรุด</option>
	    <option value="อื่นๆ....">อื่นๆ....</option>
          </select>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="ระบุสถานที่เครื่องที่ชำรุดโดยละเอียด" name="location2" required>
        </div>


        <div class="input-group mb-3">

          <select class="form-control" name="mach" id="mach" placeholder="อุปกรณ์" required>
            <option value="" disabled selected>อุปกรณที่ชำรุด</option>
            <option value="wardwave">wardware</option>
            <option value="wardwave">sofeware</option>
          </select>
        </div>

        <div class="input-group mb-3">
          <textarea class="form-control" name="detial" rows="5" cols="40" placeholder="อาการเสีย" required></textarea>
        </div>




        <div class="row">

          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="btn_helpdesk" class="btn btn-primary btn-block">แจ้งซ่อมทันที</button>

          </div>
          <!-- /.col -->
          <!--<p class="card-body login-box-msg" >เมื่อส่งข้อมูลเข้าระบบแล้ว กรุณารอช่างเข้าไปดำเนินการแก้ไข</p>*/-->
        </div>
      </form>


    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
