<?php
session_start();
ob_start();
include('conn.php');
$id=$_GET["id"];
$arr = isset($_SESSION['mycar']) ? $_SESSION['mycar'] : [];

if(is_array($arr)) {
  if(array_key_exists($id,$arr)) {
    $uu=$arr[$id]; 
    $uu["num"]=$uu["num"]+1;  
    $arr[$id]=$uu;
  }
  else {  
    $arr[$id]=array("id"=>$id,"num"=>1);
  }
}
else {
  $arr[$id]=array("id"=>$id,"num"=>1);
}

$_SESSION["mycar"]=$arr;
ob_clean();
header("location:index.php");
?>