<?php
$id = $GLOBALS["urlArray"][3];
$product = product::find($id)->fetch_assoc();
$category1 = category::find($product['category']);
$category = category::all();
?>
<!DOCTYPE html>
<html>
  <head>
    </head>
    <body>
      <form action = 'http://localhost/ecommerce/updateProduct/<?php echo $GLOBALS["urlArray"][3];?>' method = 'post'>
        <input type = 'text'   name = 'name'        value = "<?php echo $product['name'];?>">
        <input type = 'number' name = 'price'       value = "<?php echo $product['price'];?>">
        <input type = 'text'   name = 'description' value = "<?php echo $product['description'];?>">
            <select name='category'>
            <?php   
                for($i=0; $i<$category->num_rows; $i++){
                $categorytitle=$category->fetch_assoc();
                ?>
                <option value="<?php echo $categorytitle ['id']?>">
                  <?php echo $categorytitle['title'];
                ?>
                </option>
            <?php
            }
            ?>
            </select>
    <button>✅</button>
</form>
</body>
</html>