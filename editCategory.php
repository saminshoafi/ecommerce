<?php
$id = $GLOBALS["urlArray"][3];
$category = category::find($id)->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<form action = 'http://localhost/ecommerce/updateCategory/<?php echo $GLOBALS["urlArray"][3];?>' method='post'>
        <input type ='text'    name = 'title'       value="<?php echo $category['title'];?>">
        <input type ='text'    name = 'description' value="<?php echo $category['description'];?>">
        <button>✅</button>
    </form> 
</body>
</html>