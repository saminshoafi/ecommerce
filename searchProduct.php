<?php
$data = product::all()->get() ;
var_dump($data);
foreach($data as $x){
//for($i=0; $i<count($data); $i++){
    //$product = $data[$i];
    //$x=$data->fetch_assoc();
    if($_POST['searchInput'] == $x[$_POST['search']]);{
        $category = category::find($x['category'])->fetch_assoc();
        ?>
        <div style="width:800px; height:40px; background-color:pink; float:left;">
<div style= "width:80px; height:20px;background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">
    <?php echo $x ['id'];?>
 </div>
<div style="width: 80px; height:20px;background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">
  <?php echo $x ['name'];?>
 </div>
 <div style="width: 80px; height:20px;background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">
  <?php echo $x ['price'];?>
 </div>
 <div style="width: 80px; height:20px;background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">
  <?php echo $category ['title'];?>
 </div>
 <div style="width :80px; height:20px; background-color:lightyellow; float:left;margin-top:10px; margin-left:10px">
  <?php echo $x ['description'];?>
 </div>
 <?php
    }
}
?>