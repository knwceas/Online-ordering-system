<?php

if(!isset($_POST['submit'])){
    exit('非法访问!');
}
$username = $_POST['username'];
$password = $_POST['password'];
$address = $_POST['address'];
$tel = $_POST['tel'];
if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
    exit('错误：用户名不符合规定。<a href="javascript:history.back(-1);">返回</a>');
}
if(strlen($password) < 3){
    exit('错误：密码长度不符合规定。<a href="javascript:history.back(-1);">返回</a>');
}
if(!preg_match('/^1\d{10}$/', $tel)){
    exit('错误：手机号长度不符合规定。<a href="javascript:history.back(-1);">返回</a>');
}

include('conn.php');
$check_query = $conn->query("select id from user where username='$username' limit 1");
if($check_query->fetch_array()) {
    echo '错误：用户名 ',$username,' 已存在。<a href="javascript:history.back(-1);">返回</a>';
    exit;
}
$sql = "INSERT INTO user(username,password,address,tel) VALUES('$username','$password','$address','$tel')";
if($conn->query($sql)) {
    exit('用户注册成功！点击此处 <a href="login.html">登录</a>');
} 
else {
    echo '抱歉！添加数据失败：'. $sql . "<br>" . $conn->error;
    echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';
}
$conn->close();
?>
