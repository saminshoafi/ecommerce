<?php
$id = $GLOBALS["urlArray"][3];
$user =user::find($id) -> fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <form action = 'http://localhost/ecommerce/updateUser/<?php echo $GLOBALS["urlArray"][3];?>' method = 'post'>
    <input type = 'text'   name = 'name'        value = "<?php echo $user['name'];?>">
    <input type = 'text'   name = 'family'      value = "<?php echo $user['family'];?>">
    <input type = 'number' name = 'phoneNumber' value = "<?php echo $user['phoneNumber'];?>">
    <button>✅</button>
</form>
</body>
</html>