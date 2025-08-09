<?php
$id = $GLOBALS["urlArray"][3];
$footer = footer::find($id)-> fetch_assoc();
?>
<form action='http://localhost/ecommerce/updatefooter/<?php echo $GLOBALS["urlArray"][3];?>' method='post'>
    <input type ='text'    name = 'nameDesigner'value="<?php echo $footer['nameDesigner'];?>">
    <input type ='text'    name = 'phoneNumber' value="<?php echo $footer['phoneNumber'];?>">
    <input type ='text'    name = 'description'  value="<?php echo $footer['description'];?>">
    <button>✅</button>
</form> 