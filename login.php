<?php
session_start();

if(isset($_GET['action'] )== "logout"){
    unset($_SESSION['userid']);
    unset($_SESSION['username']);
    echo '注销登录成功！点击此处 <a href="index.php">回到首页</a>';
    exit;
}
if(!isset($_POST['submit'])){
    exit('非法访问!');
}

$username = $_POST['username'];
$password = $_POST['password'];
include('conn.php');

$check_query = $conn->query("select id from user where username='$username' and password='$password' limit 1");
$result = $check_query->fetch_array(MYSQLI_ASSOC);
if($result!=''){
    if(empty($_SESSION['username'])) $_SESSION['username'] = '';
    if(empty($_SESSION['userid'])) $_SESSION['userid'] = '';
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $result['id']; 
    header('Location: index.php');
    exit;
} 
else {
    $_SESSION['username'] = '';
    exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');
}
?>
