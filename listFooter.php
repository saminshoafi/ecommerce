
<div style = "width:1000px; height:1000px; margin-left:380px">
<?php
$result = footer::select(["id","nameDesigner","phoneNumber","description"])->get();
for($i=0; $i<$result->num_rows; $i++){
    $footer=$result->fetch_assoc();
    ?>
    <div style="width:445px; height:55px; background-color:lightblue;">

        <div style= "width:100px; height:20px;background-color:yellow; float:left; margin-top:10px; margin-left:10px">
            <?php echo $footer ['id'];?>
        </div>
        <div style="width: 60px; height:20px;background-color:yellow; float:left; margin-top:10px; margin-left:10px">
            <?php echo $footer ['nameDesigner'];?>
        </div>
        <div style="width: 60px; height:20px;background-color:yellow; float:left; margin-top:10px; margin-left:10px">
            <?php echo $footer ['phoneNumber'];?>
        </div>
        <div style="width :60px; height:20px; background-color:yellow; float:left;margin-top:10px; margin-left:10px">
            <?php echo $footer ['description'];?>
        </div>
        <a href = "http://localhost/ecommerce/editfooter/<?php echo $footer ['id'];?>" style = "width:100px; height:40px; background-color:lightyellow; margin-left:10px ">editFooter</a>
    

        <a href = "http://localhost/ecommerce/deletefooter/<?php echo $footer ['id'];?>" style = "width:100px; height:40px; background-color:lightyellow; margin-left:10px ">deleteFooter</a>
    
<?php 
} 
?>
</div>
