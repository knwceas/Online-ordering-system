<?php
header ( "Content-type: text/html; charset=utf-8" ); //设置文件编码格式
include "conn.php";
$id=$_GET['orderID'];
$sql="delete from `order` where orderID=".$id;
$result=$conn->query($sql); 

if($result) {
  echo "<script>alert('该订单已被删除!');window.history.back(-1);</script>"; 
}
else {	
  echo "<script>alert('删除操作失败!');history.go(-1);</script>";
}
?> 



