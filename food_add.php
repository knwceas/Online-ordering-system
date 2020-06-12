<?php
header ( "Content-type: text/html; charset=utf-8" ); 
include "conn.php";  
?>
<style>
  h3,table>tr>td {
    text-align:center;
  }
  table {
    width:500px;
    text-align:center;
    border-color:#52C3DD;
    margin:20px auto;
  }  
  table img {
    margin:0 30px 20px 0;
    width:100px;
    height:100px;
  }
  table tr {
    height:60px;
  }
  input,textarea {    
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
<h3>添加商品</h3>
<!-- <form> 标签的 enctype 属性规定了在提交表单时要使用哪种内容类型。在表单需要二进制数据时，比如文件内容，请使用 "multipart/form-data"。 -->
<form action="upload_file.php" method="post" enctype="multipart/form-data">
  <table  cellpadding="0" cellspacing="0"  border='1'>
    <tr>
      <td width="60">菜名</td> 
      <td width="120"><input type="text" name="name" value='请输入商品名称'></td>
    </tr>
    <tr >
      <td width="60">图片</td> 
      <td width="120">
        <input id='up_file' name="file" type="file"/>
        <img id='photo' src="images/0.jpg" alt="">
      </td>
    </tr>
    <tr >
      <td width="60">描述</td> 
      <td width="120"><textarea name="introduce" id=""  rows="4">请输入商品描述</textarea></td>
    </tr>   
    <tr >
      <td width="60">单价</td>
      <td width="120"><input type="text" name="price" value='请输入商品价格'></td>
    </tr>
    <tr class='sumbt'><td colspan="2"><input type="submit" name="submit" value='发布商品'></td></tr>
  </table>   
</form>

<script src='js/jquery-1.12.4.min.js'></script>
<script>
  $('#up_file').on('change',function() {
    var filePath = $(this).val();        
    fileFormat = filePath.substring(filePath.lastIndexOf(".")).toLowerCase();
    src = window.URL.createObjectURL(this.files[0]); 
        
    if( !fileFormat.match('/.png|.jpg|.jpeg/') ) {
      error_prompt_alert('上传错误,文件格式必须为：png/jpg/jpeg');
      return;  
    };
    $('#photo').attr('src',src);
  });
</script>

