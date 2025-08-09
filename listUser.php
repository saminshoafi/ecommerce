
<div style = "width:1000px; height:1000px; margin-left:300px">
    <?php
    $result = user::select (["id","name","family","phoneNumber"])->get();
    for($i=0; $i<$result->num_rows; $i++){
        $user=$result->fetch_assoc();
        ?>
<div style="width:580px; height:40px; background-color:orange;">

<div style= "width:60px; height:20px;background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">
    <?php echo $user ['id'];?>
 </div>
<div style="width: 60px; height:20px;background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">
  <?php echo $user ['name'];?>
 </div>
 <div style="width: 60px; height:20px;background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">
  <?php echo $user ['family'];?>
 </div>
 <div style="width :110px; height:20px; background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">
  <?php echo $user ['phoneNumber'];?>
  </div>

  <a href = "http://localhost/ecommerce/editUser/<?php echo $user ['id'];?>" style = "width:100px; height:40px; background-color:lightyellow; margin-left:10px ">editUser</a>


  <a href = "http://localhost/ecommerce/deleteUser/<?php echo $user ['id'];?>" style = "width:100px; height:40px; background-color:lightyellow; margin-left:10px ">deleteUser</a>


  <a href = "http://localhost/ecommerce/singleuser/<?php echo $user ['id'];?>" style = "width:100px; height:40px; background-color:lightyellow; margin-left:10px ">singleUser</a>


   </div>
 <?php 
 }
 ?>
 </div>
