<?php
include ('top.php');
$userid = $_SESSION['userid'];
$result = $conn->query("select * from `order` where userID=$userid ");
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
</style>
<h2>我的订单</h2>
<table  cellpadding="0" cellspacing="0"  border='1'>
    <tr class='t-f'>
        <td width="80">订单号</td>  
        <td width="80">下单时间</td> 
        <td width="70">总价</td> 
        <td width="80">备注</td>
    </tr>
    <?php
    while($row =$result->fetch_array(MYSQLI_ASSOC)){ ?>
    <tr>     
        <td width="180"><?php echo $row['orderID'] ?></td>
        <td width="180"><?php echo $row['orderDate'] ?></td>
        <td width="70"><?php echo $row['total_price'] ?></td>
        <td width="240"><?php echo $row['beizhu'] ?></td>    
    </tr>
    <?php
    }
    ?>
</table>



