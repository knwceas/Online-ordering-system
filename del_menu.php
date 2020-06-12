<?php
header ( "Content-type: text/html; charset=utf-8" ); 
include "conn.php";
$id=$_GET['new'];
$sql="delete from food where id=".$id;
$result=$conn->query($sql);
if($result) {
  echo "<script>alert('该菜品已被删除!');window.history.back(-1);</script>"; 
}
else {	
  echo "<script>alert('删除操作失败!');history.go(-1);</script>";
}  
?>
  