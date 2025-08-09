<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <form action = 'http://localhost/ecommerce/getLimit/page/1' method = 'post'  style = "margin-left:380px;">
        <input type = 'number' name = 'from'  placeholder = 'from'>
        <input type = 'number' name = 'to'    placeholder = 'to'  >
    <button>submit</button>
    </form>
    <form action = 'http://localhost/ecommerce/listProduct/page/1/' method ='post'style = "margin-left:380px; margin-top:10px;">
        <select name='sort'>
                <option value="asc">asc</option>
                <option value="desc">desc</option>
        </select>
        <select name='price'>
            <option value="price">price</option>
            <option value="phoneNumber">phoneNumber</option>
        </select>
        <button>✅</button>
    </form> 
    <form action = 'http://localhost/ecommerce/searchProduct/page/1' method = 'post'  style = "margin-left:380px; margin-top:10px;">
        <input type = 'text' name = 'searchInput'  placeholder = 'search'>
         <select name='search'>
                <option value="id">id</option>
                <option value="name">name</option>
                <option value="price">price</option>
                <option value="description">description</option>
                <option value="title">title</option>
                <option value="phoneNumber">phoneNumber</option>
        </select>
    <button>✅</button>
    </form>
    </body>
    </html>
 <div style = "width:1000px; height:1000px; margin-left:280px; margin-top:10px;">
    <?php
    if($_POST){
    $sortingType = $_POST['sort'];
    $field = $_POST['price'];
}else if(count($GLOBALS['urlArray'])!=5){
    $sortingType = $GLOBALS['urlArray'][5];
    $field = $GLOBALS['urlArray'][6];
}
if(count($GLOBALS['urlArray'])!=5){
        //$products = product::select(['*'])->with("title","category")->sort($field,$sortingType); 
        //$products = product::select(['*'])->category(["title"=>["category_id","id"]])->sort($field,$sortingType);
        //$products = product::select(['*'])->with("category")->sort($field,$sortingType);
        $products = product::select(['*'])->count($star)->sort($field,$sortingType);
        $count= count($products);
        $pageNate =5;
        $offset =($GLOBALS['urlArray'][4]-1)*$pageNate;
        $limit = $offset+$pageNate;
        for($i=$offset;$i<$limit;$i++){
        if($i<$count){
        $product = $products[$i];
    // $product = product::select(['*'])->with("title","category")->get();
    // for($i=0; $i<$products->num_rows; $i++){
        // $product = $products->fetch_assoc();
        //$category= category::find($product['category'])->fetch_assoc();
        ?>
<div style="width:800px; height:40px; background-color:pink; float:left;">

<div style= "width:80px; height:20px;background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">
    <?php echo $product['id'];?>
 </div>
<div style="width: 80px; height:20px;background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">
  <?php echo $product['name'];?>
 </div>
 <div style="width: 80px; height:20px;background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">
  <?php echo $product['price'];?>
 </div>
 <div style="width: 80px; height:20px;background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">
  <?php echo $product['category_title'];?>
 </div>
 <div style="width :80px; height:20px; background-color:lightyellow; float:left;margin-top:10px; margin-left:10px">
  <?php echo $product['description'];?>
 </div>
   <a href = "http://localhost/ecommerce/editProduct/<?php echo $product ['id'];?>" style = "width:100px; height:20px; background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">editProduct</a>
    <a href = "http://localhost/ecommerce/deleteProduct/<?php echo $product ['id'];?>" style = "width:100px; height:20px; background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">deleteProduct</a>
     <a href = "http://localhost/ecommerce/singleproduct/<?php echo $product ['id'];?>" style = "width:100px; height:20px; background-color:lightyellow; float:left; margin-top:10px; margin-left:10px">showProduct</a>
     <?php
   }
  }
}
 ?>
 </div>
</div>

<?php
$pageResult = product::all();
 $rows = $pageResult->num_rows;
 $pages = ceil($rows/5);
for($j=1; $j<=$pages; $j++){
?>
<a style="width: 60px; height:20px;background-color:lightyellow; float:left; margin-top:100px; margin-left:10px" href = "http://localhost/ecommerce/listProduct/page/<?php echo $j; ?>/<?php echo $sortingType;?>/<?php echo $field;?>"><?php echo "page".$j;?></a>
<?php
}
// }
// $rows=product::count()->get();
// $x=$rows->fetch_assoc();
// for($i=0; $i<$x["count(*)"]; $i++){
//     echo "samin<br>";
// }
?>