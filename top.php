<?php
session_start();
include('conn.php');
header("Content-type:text/html;charset=utf-8");
?>
<style>
  * {
    margin:0;
    padding:0;
  }
  a {
    text-decoration: none;
    color:black;
  }
  .w {
    color:white;
  }
  .nav { 
      height:45px;
      background:#38B7B7;
      margin-bottom:20px;
  }
  li {
    list-style:none;     
  } 
  .nav li {
    line-height: 45px;
    float:left;
  }
  .nav-l {
    float:left;
    margin-left:20px;
  }
  .nav-l li {
    margin-right:20px;
  }
  .nav-r{
    float:right;
    margin-right:20px;
  }
  .nav-r li {
    margin-right:20px;
  }
  .dropdown {
    position: relative;
    display: inline-block;
  }
  .dropdown-content {
    overflow: hidden; 
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
  }
  .dropdown-content a {
    color:black;
  }
  .dropdown:hover .dropdown-content {
    display: block;
  }
</style>
<div class='nav'>
  <ul class='nav-l'>
    <li class='w'><h3>订餐</h3></li>
    <li ><a class='w' href="index.php">首页</a></li>
  </ul>
  <ul class='nav-r'>
    <?php   // 区分用户、管理员
        if(!isset($_SESSION['username']) && !isset($_SESSION['admin_name'])) { ?>
          <li ><a class='w' href="login.html">登录</a></li>
          <li ><a class='w' href="reg.html">注册</a></li>
          <li ><a class='w' href="login_admin.html">进入后台</a></li>
        <?php  
        }
        else { 
          if(isset($_SESSION['username'])) {
        ?>
          <li class="dropdown">
              <a href="#" class="w"><?php echo $_SESSION['username'];?>，欢迎你！</a>
              <div class="dropdown-content">
                  <p><a href="my.php">个人中心</a></p>
                  <p><a href="my_order.php">我的订单</a></p>
                  <p><a href="login.php?action=logout">退出</a></p>
              </div>
          </li>
          <?php 
          }
          else {
          ?>
            <li class="dropdown">
              <a href="#" class="w"><?php echo $_SESSION['admin_name'];?>，欢迎你！</a>
              <div class="dropdown-content">
                <p><a href="user_manage.php">用户管理</a></p>
                <p><a href="menu_manage.php">菜单管理</a></p>
                <p><a href="order_manage.php">订单管理</a></p>
                <p><a href="login_admin.php?action=logout">退出</a></p>
              </div>
          </li>
          <?php 
          }
        }
        ?>
  </ul>
</div>


