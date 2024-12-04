<?php
$server = 'localhost';
//$username = 'root';
$username = 'root';
//$password = '';
$password = '';
//$db_name = 'helpdesk_engineer';
$db_name = 'new_sever';

$conn = mysqli_connect($server,$username,$password,$db_name);
if (!$conn) {
  echo "No DB";
}//else {
  //echo "success";
//}
 ?>
