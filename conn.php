<?php
$conn = new mysqli("localhost","root","",'buy');
if ($conn->connect_error) {
  die("连接数据库失败：" . $conn->connect_error());
}
$conn->query("set character set 'utf8'");
$conn->query("set names 'UTF8'");
?>



