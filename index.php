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
  //รีไดเรค ผู้ที่ไม่มี session เข้าหน้านี้ไม่ได้จะถูกส่งไปหน้า login
 ?>



 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <h1 style="text-align:center">หากไม่สามารถเข้าสู้ระบบได้...</h1>

       <a href="login_tyh.php?logout='1'" class="nav-link">
         <h1 style="text-align:center">โปรดลิกที่นี้</h1></a>



   </body>
 </html>
