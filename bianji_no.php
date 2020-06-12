<?php
header ( "Content-type: text/html; charset=utf-8" ); 
include "conn.php";  
$conn->set_charset('utf8_general_ci');  
if(isset($_POST['submit'])) {
  //获取提交的数据
  $name=$_POST['name'];
  $introduce=$_POST['introduce'];
  $price=$_POST['price'];
  $id=$_GET['new'];
    
  $sql="update food set 
  name='$name',introduce='$introduce',price='$price' where id=".$id;
  if($conn->query($sql)) {
    header('location:menu_manage.php');
  }
  else {   
    echo '添加失败';
  }
}
$conn->close();
?>