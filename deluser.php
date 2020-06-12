<?php
header ( "Content-type: text/html; charset=utf-8" ); 
  include "conn.php";
  $id=$_GET['user_id'];
  $sql="delete from user where id=".$id;
  $result=$conn->query($sql); 
  
	if($result) {
    echo "<script>alert('该用户已被删除!');window.history.back(-1);</script>";     
	}
	else {	
		echo "<script>alert('删除操作失败!');history.go(-1);</script>";
  }   
?> 



