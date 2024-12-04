<?php
session_start();
include ('server.php');
$errors = array();

if (isset($_POST['btn_login'])) {
  $tyh_username = mysqli_real_escape_string($conn,$_POST['tyh_username']);
  $tyh_password = mysqli_real_escape_string($conn,$_POST['tyh_password']);

if(count($errors) == 0){
    //$tyh_password = md5($tyh_password);
    $sql = "SELECT * FROM tyh_adminuser WHERE tyh_username = '$tyh_username' AND tyh_password = '$tyh_password'";

    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result)== 1) {
      $_SESSION['tyh_name'] = $tyh_name;
      $_SESSION['tyh_username'] = $tyh_username;
      //$_SESSION['tyh_name'] = $tyh_name;
      $_SESSION['success'] = "ยินดีต้อนรับ เข้าสู่ระบบ";
      header('location:admin/repair.php');
    }else {
      $errors = array(1);
      $_SESSION['error'] = "Username หรือ Password ผิด โปรดลองอีกครั้ง...";
      header('location:tyh-admin.php');
  }
    }

}
 ?>
