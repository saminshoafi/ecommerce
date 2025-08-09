
<div style = "width:1000px; height:1000px; margin-left:380px">
<?php
$result = category::select(["id","title","description"])->get();
for($i=0; $i<$result->num_rows; $i++){
    $category=$result->fetch_assoc();
    ?>
    <div style="width:445px; height:55px; background-color:lightblue;">

        <div style= "width:100px; height:20px;background-color:yellow; float:left; margin-top:10px; margin-left:10px">
            <?php echo $category ['id'];?>
        </div>
        <div style="width: 60px; height:20px;background-color:yellow; float:left; margin-top:10px; margin-left:10px">
            <?php echo $category ['title'];?>
        </div>
        <div style="width :60px; height:20px; background-color:yellow; float:left;margin-top:10px; margin-left:10px">
            <?php echo $category ['description'];?>
        </div>
        <a href = "http://localhost/ecommerce/editCategory/<?php echo $category ['id'];?>">editCategory</a>
        
        <a href = "http://localhost/ecommerce/deleteCategory/<?php echo $category['id'];?>">deleteCategory</a>
        
        <a href = "http://localhost/ecommerce/singlecategory/<?php echo $category ['id'];?>">singleCategory</a>

    </div>
<?php 
} 
?>
</div>
