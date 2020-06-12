<?php
include ('top.php');
$userid = $_SESSION['userid'];

date_default_timezone_set("Asia/Shanghai");
$order_num = '';
for ($i=0;$i<8;$i++) {         
    $randcode = mt_rand(0,9);     
    $order_num .= $randcode;
}
$time=date("Y-m-d H:i:s");
$sp=$_GET['sp'];
?>
<style>
    table{
        text-align:center;
        margin:20px auto;
        border-color:#52C3DD;
        }  
    table tr{
    height:40px;
    }
    table .t-f{
        background:#9DD3FA;
    }
    table input{    
       border: none;  
       outline: none; 
       background-color: rgba(0, 0, 0, 0);
      
   }
   .e{
    margin-left:100px;
   }
    .sumbt input{
        border: 1px solid black; 
        width:70px;
        height:30px;
        background:#ccc; 
   }
   a{
       color:red;
   }
</style>
<table  cellpadding="0" cellspacing="0"  border='1'>
<tr >
    <td class='t-f' colspan="2" width="60">订单中心</td>
    </tr>
    <tr>
        <td width="80">订单号</td> 
        <td width="255"><?php echo $order_num ?></td>
    </tr>
    <tr >
        <td width="80">下单时间</td> 
        <td width="180"><?php echo $time ?></td>
    </tr>
    <tr >
        <td width="80">总价</td> 
        <td width="180"><?php echo $sp ?></td>
    </tr>   
    <tr >
        <td width="80">备注</td>
        <td width="180">
        <form action="#" method='post'>
            <input class='e' type="text" name="beizhu" value='添加备注'>
        </td>
    </tr>
    <tr>
        <td class='sumbt' colspan="2" width="60">
            <input type="submit" name="submit"> 
        </form>
        </td>
    </tr>
</table>

<?php 
if(isset($_POST['submit'])){
    $beizhu=$_POST["beizhu"];
    $sql = "INSERT INTO `order` VALUES('$order_num','$userid','$time','$sp','$beizhu')";
    if($conn->query($sql)) {
        ob_start();
        $arr=array(); //清空购物车
        $_SESSION["mycar"]=$arr;
        ob_clean();
        echo "下单成功！点击此处 <a href='index.php'>回到首页</a>";   
    } else {
        echo '抱歉！添加数据失败：'. $sql . "<br>" . $conn->error;
        echo '点击此处 <a href="javascript:history.back(-1);">返回</a> 重试';
    }
    $conn->close();
}
?>




