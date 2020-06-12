<?php
session_start();
ob_start();
$id=$_GET["id"];
$arr=$_SESSION["mycar"];

foreach($arr as $key=>$proId) {
  if($key==$id) {
    unset($arr[$key]);
  }
}
$_SESSION["mycar"]=$arr;
ob_clean();
header("location:index.php");
?>