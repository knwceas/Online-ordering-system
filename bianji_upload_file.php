<?php
header ( "Content-type: text/html; charset=utf-8" ); 
include "conn.php";  
$conn->set_charset('utf8_general_ci');  
if(isset($_POST['submit'])) {
  $name=$_POST['name'];
  $introduce=$_POST['introduce'];
  $price=$_POST['price'];
  $id=$_GET['new'];

  if($_FILES["file"]["error"]) {
    echo $_FILES["file"]["error"];
  }
  else {
    if(($_FILES["file"]["type"]=="image/jpeg" || $_FILES["file"]["type"]=="image/png") && $_FILES["file"]["size"]<1024000)
    {
      date_default_timezone_set("Asia/Shanghai");
      $filename = "uploads/".date("YmdHis").$_FILES["file"]["name"];
      $filename1 = iconv("UTF-8","gb2312",$filename);

      if(file_exists($filename1)) {
        echo "该文件已存在！";
      }
      else {
        move_uploaded_file($_FILES["file"]["tmp_name"],$filename1);            
        $sql="update food set 
        name='$name',img_src='$filename',introduce='$introduce',price='$price' where id=".$id;
        
        if($conn->query($sql)) {
            header('location:menu_manage.php');
        }
        else {   
            echo '添加失败';
        }
      }
    }
    else {
      echo "文件类型不正确！";
    }
  } 
}
$conn->close();
?>