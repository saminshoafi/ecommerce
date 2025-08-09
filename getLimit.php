
<div style = "width:1000px; height:1000px; margin-left:380px; margin-top:10px;">
<?php
if(!empty($_POST)){
    $from = $_POST['from'];
    $to = $_POST['to'];
}else{
    $from = $GLOBALS['urlArray'][5];
    $to = $GLOBALS['urlArray'][6];
}
if($from<$to){//////////////////////////////////بزرگ به کوچک
   $limit = $to-$from;
   $offset = $from;
   $result = product::select(['*'])->with('category')->limit($limit,$offset)->get();
   
   $products = [];
   for($i=0; $i<$result->num_rows; $i++){
       $product=$result->fetch_assoc();
       $products[]=$product;
    }
       $count = count($products);
       for($i=0; $i<$count; $i++){
           for($j=0; $j<$count-1; $j++){
               //if($j==count($products)-1);
               if($products[$j]["price"]<$products[$j+1]["price"]){
                   $x = $products[$j];
                   $products[$j] = $products[$j+1];
                   $products[$j+1] = $x;
                }
            }
        }
 }else if($from>$to){
   $limit = $from-$to;///////////////////////////////کوچک به بزرگ
   $offset = $to;
   $result = product::select(['*'])->with('category')->limit($limit,$offset)->get();
   $products = [];
   for($i=0; $i<$result->num_rows; $i++){
       $product=$result->fetch_assoc();
       $products[]=$product;
    }
       $count = count($products);
       for($i=0; $i<$count; $i++){
           for($j=0; $j<$count-1; $j++){
               //if($j==count($products)-1);
               if($products[$j]["price"]>$products[$j+1]["price"]){
                   $x = $products[$j];
                   $products[$j] = $products[$j+1];
                   $products[$j+1] = $x;
                }
            }
        }
    }
        $count= count($products);
        //var_dump($count);
        $pageNate =4;
        $offset =($GLOBALS['urlArray'][4]-1)*$pageNate;
        $limit = $offset+$pageNate;
        for($i=$offset;$i<$limit;$i++){
            if($i<$count){
        //echo $products[$i]["price"]; 
        // for($j=0; $j<$count; $j++){
        $product = $products[$i];
        //$category = category::find($product['category'])->fetch_assoc();
        ?>
<div style="width:380px; height:40px; background-color:pink; float:left;">
    
    <div style= "width:60px; height:20px;background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">
        <?php echo $product ['id'];?>
    </div>
    <div style="width: 60px; height:20px;background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">
        <?php echo $product ['name'];?>
    </div>
    <div style="width: 60px; height:20px;background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">
        <?php echo $product ['price'];?>
    </div>
    <div style="width: 60px; height:20px;background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">
        <?php echo $product ['category_title'];?>
    </div>
    <div style="width :60px; height:20px; background-color:lightyellow; float:left;margin-top:10px; margin-left:10px">
        <?php echo $product ['description'];?>
    </div> 
    <?php
     }
    }
//}
    ?>
    </div>
</div>
<?php
$pageResult = product::all();
 $rows = $pageResult->num_rows;
 $pages = ceil($rows/5);
for($j=1; $j<=$pages; $j++){
?>
<a style="width: 60px; height:20px;background-color:lightyellow; float:left; margin-top:100px; margin-left:10px" href = "http://localhost/ecommerce/getLimit/page/<?php echo $j; ?>/<?php echo $from;?>/<?php echo $to;?>"><?php echo "page".$j;?></a>
<?php
}
?>


