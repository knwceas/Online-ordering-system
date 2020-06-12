<?php
include('top.php');
?>
<style>
    .c{
        text-align:center;
    }
    table{
        width:800px;
        margin:20px auto;
        border-color:#52C3DD;
        }  
    table img{
        width:120px;
        height:120px;    
    }
    table .tu{
        height:120px;
    }
    table .t-f{
        background:#9DD3FA;
    }
    table .del a:hover{
        color:red;
    }
    .k{
        margin-left:640px;
    }
    h2{
        margin-bottom:20px;
    }
    button{
        height:30px;
        width:70px;
    }
   
</style>
<h2 class='c'>菜单管理</h2>
<a class='k' href="food_add.php"><button >添加商品</button></a>
<table width="700" cellpadding="0" cellspacing="0"  border='1' class='c'>
    <tr class='t-f'>
        <td width="60">ID</td>
        <td width="120">菜名</td>
        <td width="120">图片</td>
        <td width="230">描述</td>
        <td width="40">单价</td>
        <td width="40"></td>
        <td width="40"></td>
    </tr>

    <?php
        $result = $conn->query("SELECT * FROM food ");
        while($a=$result->fetch_array(MYSQLI_ASSOC)){        
    ?>
    <tr class='tu'>
        <td width="60"><?php echo $a["id"]?></td>
        <td width="120"><?php echo $a["name"]?></td>
        <td width="120"><img src="<?php echo $a['img_src']?>" alt=""></td>
        <td width="230"><?php echo $a["introduce"]?></td>
        <td width="40"><?php echo $a["price"]?></td>
        <td width="40" class='del'><a href="<?php echo "food_bianji.php?new=".$a['id'] ?>">编辑</a></td>
        <td width="40" class='del'><a href="<?php echo "del_menu.php?new=".$a['id'] ?>">删除</a></td>  
    </tr>
  
    <?php
        }    
    ?>
</table>
