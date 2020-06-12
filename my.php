
<?php
include ('top.php');
if(!isset($_SESSION['userid'])){
    header("Location:login.html");
    exit();
}
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
$user_query = $conn->query("select * from user where id=$userid limit 1");
$row =$user_query->fetch_array(MYSQLI_ASSOC);
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
</style>
<table  cellpadding="0" cellspacing="0"  border='1'>
<tr >
    <td class='t-f' colspan="2" width="60">用户信息</td>
    </tr>
    <tr>
        <td width="60">用户ID</td> 
        <td width="180"><?php echo $userid ?></td>
    </tr>
    <tr >
        <td width="60">用户名</td> 
        <td width="180"><?php echo $username ?></td>
    </tr>
    <tr >
        <td width="60">地址</td> 
        <td width="180"><?php echo $row['address'] ?></td>
    </tr>   
    <tr >
        <td width="60">手机号</td>
        <td width="180"><?php echo $row['tel'] ?></td>
    </tr>
</table>




