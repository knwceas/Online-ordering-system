<?php
include('top.php');
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
<h2>用户管理</h2>

<table width="500" cellpadding="0" cellspacing="0"  border='1'>
    <tr class='t-f'>
        <td width="60">ID</td>
        <td width="120">用户名</td>
        <td width="200">手机号</td>
        <td width="40"></td>
    </tr>
    <?php
        $result = $conn->query("SELECT * FROM user ");   
        while($a=$result->fetch_array(MYSQLI_ASSOC)){      
    ?>
    <tr>
        <td width="60"><?php echo $a["id"]?></td>
        <td width="120"><?php echo $a["username"]?></td>
        <td width="200"><?php echo $a["tel"]?></td>
        <td width="40" class='del'><a href=" <?php echo "deluser.php?user_id=".$a['id'] ?>">删除</a></td>  
    </tr>
    
    <?php
        }     
    ?>
</table>

 