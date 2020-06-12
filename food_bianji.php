<?php
header ( "Content-type: text/html; charset=utf-8" ); 
include "conn.php";  
$id=$_GET['new'];

if(isset($_POST['submit1'])) {
  $res=$_POST["sex"];
  if($res=="no") {
    $s='bianji_no.php';
  }
  else {
    $s='bianji_upload_file.php';
  }
}
?>
<style>
  h3,form,table {
    text-align:center;
  }
  table {
    border-color:#52C3DD;
    margin:20px auto;
  }  
  table img {
    width:100px;
    height:100px;
  }
  table tr {
    height:60px;
  }
  table input,textarea {    
    border: none;  
    outline: none; 
    background-color: rgba(0, 0, 0, 0);
    width:300px;
  }
  .sumbt input {
    border: 1px solid black; 
    width:70px;
    height:30px;
    background:#ccc; 
  }
  textarea {
    resize:none;
  }
</style>
<h3>商品修改</h3>
<form  action="#" method="post">
    是否替换图片？
    <input type="radio" name="sex" value="yes" checked> 是
    <input type="radio" name="sex" value="no">否
    <input type="submit" name="submit1" value="提交"> 
</form>

<form action="<?php echo "{$s}?new=".$id ?>" method="post" enctype="multipart/form-data">
  <table  cellpadding="0" cellspacing="0"  border='1'>
    <?php
      $result = $conn->query("SELECT * FROM food where id =".$id);
      $a=$result->fetch_array(MYSQLI_ASSOC);     
    ?>
    <tr>
      <td width="60">ID</td>
      <td width="400"><?php echo $a["id"]?></td>
    </tr>
    <tr>
      <td width="60">菜名</td> 
      <td width="120"><input type="text" name="name" value='<?php echo $a["name"]?>'></td>
    </tr>
    <tr >
      <td width="60">图片</td> 
      <td width="120">
        <input name="file"  type="file"/>
      </td>
    </tr>
    <tr>
      <td width="60">描述</td> 
      <td width="120"><textarea name="introduce" id=""  rows="4"><?php echo $a["introduce"]?></textarea></td>
    </tr>   
    <tr>
      <td width="60">单价</td>
      <td width="120"><input type="text" name="price" value='<?php echo $a["price"]?>'></td>
    </tr>
    <tr class='sumbt'><td colspan="2"><input type="submit" name="submit"></td></tr>
  </table>   
</form>


              

