<?php 
include ('top.php');   
?>
<style> 
  .menu {
    width:880px;
    float:left;
  }   
.menu ul>li {
  list-style:none;
  float:left;
  background:#DDDDDD;
  width:400px;
  height:203px;
  padding:20px 10px 0 0;   
  margin:0 0 5px 30px;  
  }
  .menu ul>li p:nth-child(1) {
    font-weight:700;
    color:#1F6FB5;
    margin-bottom:10px;
  }
  img {
    width:155px;
    height:160px;
    float:left;
    margin:0 15px ;
  }
  .menu-w {
    height:133px;
  }
  .menu a img {
    width:25px;
    height:25px;
    float:right;
  }
  .shopcar {
    float:right;
    margin-right:10px;
    width:400px;
    border:1px #ccc solid;
  }
  .shopcar ul li:nth-child(1) {
    height:32px;
    line-height:32px;
    background:#1A2D27;
    text-align:center;
  }
  .shopcar ul li:nth-child(2) {
    height:400px;
  }
  .shopcar ul li:nth-child(3) {
    height:50px;
    line-height:50px;
    background:#1A2D27;
    text-align:center;
  }
  .shopcar ul li:nth-child(3) span {
    color:red;
    font-weight:bold;
  }
  .shopcar ul li:nth-child(2) table {
    text-align:center;
    margin:15px 0 0 30px;
    border-color:#52C3DD;
    display:none;
  }
  table .t-f {
    background:#9DD3FA;
  }
  table .del a:hover,.c {
    color:red;
  }
</style>
<div class='menu'>
  <ul> 
    <?php 
      $result = $conn->query("SELECT * FROM food ");
      while( $row =$result->fetch_array(MYSQLI_ASSOC)){
        echo " 
        <li>
          <img src='{$row['img_src']}' alt=''>
          <div class='menu-w'><p style='text-align:center'>{$row['name']}</p>
          <p>{$row['introduce']}</p> </div>
          <p style='color:red;font-size:20px;text-align:center'>￥{$row['price']}";
          if(!isset($_SESSION['username'])){  ?> 
            <a href='' onclick="alert('请先登录！')"><img src='images/icon_buy.png'></a>
            <?php 
            } 
            else{
            ?> 
              <a href='add.php?id= <?php echo $row['id'] ?>'><img src='images/icon_buy.png'></a>
            <?php
            }
          ?> 
          </p>
        </li>
    <?php  
      }   
    ?>       
  </ul>
</div>

<div class='shopcar'>
  <ul>
    <li class='w'>购物车</li>
    <li>
      <table width="342" cellpadding="0" cellspacing="0"  border='1'>
        <tr class='t-f'>
          <td width="60">商品ID</td>
          <td width="100">商品名称</td>
          <td width="80">商品数量</td>
          <td width="40">总价</td>
          <td width="60"></td>
        </tr>
        <?php  
          $arr = isset($_SESSION['mycar']) ? $_SESSION['mycar'] : [];//从session中拿出二维数组
          $sum=0;
          foreach((array)$arr as $a)
          {
            $result = $conn->query("SELECT * FROM food where id={$a['id']}");
            $row =$result->fetch_array(MYSQLI_ASSOC);
            $sum=$sum+$a["num"]*$row["price"];
        ?>
        <tr>
          <td width="60"><?php echo $a["id"]?></td>
          <td width="100"><?php echo $row["name"]?></td>
          <td width="80" class='c'><?php echo $a["num"]?></td>
          <td width="40"><?php echo $a["num"]*$row["price"]?></td>
          <td width="60" class='del'><a href="delfood.php?id=<?php echo $a['id']?>">删除</a></td>  
        </tr>  
        <?php
          }
        ?>
      </table>
    </li>
    <li class='w'>
      <?php 
        if($sum==0){echo '购物车为空';}
        else {
          echo "<style>
          .shopcar ul li:nth-child(2) table {
            display:block;
          }
          </style>";
          echo "消费总金额 : <span>{$sum}</span>元 <a class='w' href='order.php?sp={$sum}'>&emsp;&emsp;去结算</a> ";
        }
      ?>   
    </li>
  </ul>
</div>
