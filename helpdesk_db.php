<?php
session_start();
include ('server.php');
if (!$conn) {
  echo "No DB";
}//else {
//  echo "success";
//}

//ตั้ง time zone------------------------------
date_default_timezone_set('Asia/Bangkok');
//ตั้งค่าตัวแปร วันที่------------------------------
//$date = date ("y-m-d");
$date = date ("d/m/y");
$time1 = date("H:i:s");
$status = "ยังไม่ได้ซ่อม";

if (isset($_POST['btn_helpdesk'])) {

  //$date = mysqli_real_escape_string($conn,$_POST[$date2]);
  //$time1 = mysqli_real_escape_string($conn,$_POST[$time1]);
  $name = mysqli_real_escape_string($conn,$_POST['name']);
  $tel = mysqli_real_escape_string($conn,$_POST['tel']);
  $location = mysqli_real_escape_string($conn,$_POST['location']);
  $location2 = mysqli_real_escape_string($conn,$_POST['location2']);
  $mach = mysqli_real_escape_string($conn,$_POST['mach']);
  $detial = mysqli_real_escape_string($conn,$_POST['detial']);


  $sql = "INSERT INTO tyh_data(date,time1,name,tel,location,location2,mach,detial,status) VALUES ('$date','$time1','$name','$tel','$location','$location2','$mach','$detial','$status')";
  mysqli_query($conn,$sql);




   // line_not------------------------------

  	ini_set('display_errors', 1);
  	ini_set('display_startup_errors', 1);
  	error_reporting(E_ALL);
  	date_default_timezone_set("Asia/Bangkok");
   $errors = array();
   // ไลน์ Token
  	$sToken = "11bb4DVyUgHva1nFDckW6vyKVO9G3imHdAvIq540FkU";
   //test Token
  	//$sToken = "KoA9GW2mt9GBsIFYwJ5rijV1ECeLbLk6dkqave5LB4L";




   $sMessage = "\n";
   $sMessage .= "วันที่ : $date \n";
   $sMessage .= "เวลา : $time1 \n";

   $sMessage .= "-------------------------\n";
   // คำสั้งวนลูปฐานข้อมูลด้วย While ------------------------------
   //while ($row = mysqli_fetch_array($result)) {
   // เรียกฐานข้อมูลออกไลน์แจ้งเตือน ------------------------------

   //$sMessage .= $row['tyh_data']."\n";


   $sMessage .= "ชื่อผู้แจ้ง :".$_POST['name']."\n";
   $sMessage .= "เบอร์ติดต่อ :".$_POST['tel']."\n";
   $sMessage .= "สถานที่ : ".$_POST['location']."\n";
   $sMessage .= "สถานที่แบบละเอียด : ".$_POST['location2']."\n";
   $sMessage .= "อุปกรณ์ที่ชำรุด : ".$_POST['mach']."\n";
   $sMessage .= "อาการเสีย : ".$_POST['detial']."\n";
   $sMessage .= "-------------------------\n";
  //}


  // ค่าส่งผ่านไลน์ ------------------------------
  	$chOne = curl_init();
  	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
  	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
  	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
  	curl_setopt( $chOne, CURLOPT_POST, 1);
  	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage);
  	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
  	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
  	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
  	$result = curl_exec( $chOne );

  	//Result error------------------------------
  	if(curl_error($chOne))
  	{
  		echo 'error:' . curl_error($chOne);
  	}
  	else {
  		$result_ = json_decode($result, true);
  		echo "status : ".$result_['status']; echo "message : ". $result_['message'];
  	}
  	curl_close( $chOne );

 //เช็ค Error------------------------------
   if(count($errors) == 0){

       $result = mysqli_query($conn,$sql );
       if ($result) {
         //echo "<script type='text/javascript'>alert('ส่งข้อมูลไลน์เรียบร้อย');</script>";
       //  echo "<script type='text/javascript'>window.location='data_table.php';</script>";
       }

       }


  echo "<script type='text/javascript'>alert('บันทึกข้อมูลเรียบร้อย');</script>";
  session_destroy();
  echo "<script type='text/javascript'>window.location='helpdesk.php';</script>";
}
 ?>
