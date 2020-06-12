<?php
include ('top.php');
$result = $conn->query("select * from `order` ORDER BY userID");
if(isset($_POST['submit'])) {
  $id1 = $_POST['id1'];
  $result = $conn->query("select * from `order` where userID = ".$id1);
}
?>
<style> 
    table{
        text-align:center;
        margin:20px auto;
        border-color:#52C3DD;
    }
    h2{
        text-align:center;
    }
    table .t-f{
        background:#9DD3FA;
    }
    table .del a:hover{
        color:red;
    }
    input {    
      outline: none;
      height: 30px;
      margin: 10px 0 0 980px;
    }
    button {
      width: 50px;
      height: 30px;
    }
</style>
<h2>订单管理</h2>
<form action="#" method="post">
  <input type="text" value="请输入用户ID" name="id1">
  <button name="submit">搜索</button>
</form>
<table  cellpadding="0" cellspacing="0"  border='1'>
    <tr class='t-f'>
        <td width="60">用户ID</td>  
        <td width="80">订单号</td>  
        <td width="80">下单时间</td> 
        <td width="80">总价</td> 
        <td width="80">备注</td>
        <td width="50"></td>
    </tr>
    <?php
    while($row =$result->fetch_array(MYSQLI_ASSOC)){ ?>
    <tr> 
        <td width="60"><?php echo $row['userID'] ?></td>    
        <td width="255"><?php echo $row['orderID'] ?></td>
        <td width="180"><?php echo $row['orderDate'] ?></td>
        <td width="180"><?php echo $row['total_price'] ?></td>
        <td width="180"><?php echo $row['beizhu'] ?></td> 
        <td width="50" class='del'><a href=" <?php echo "del_order.php?orderID=".$row['orderID'] ?>">删除</a></td>  
    </tr>
    <?php
    }
    ?>
</table>



