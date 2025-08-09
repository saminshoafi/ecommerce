
<?php
$result = footer:: select(["id","nameDesigner", "phoneNumber", "description"])->get();
 $count = $result -> num_rows;
if($count == 1){
    $footer1=$result->fetch_assoc();
    echo $footer1 ['nameDesigner'];
    
    echo $footer1 ['phoneNumber'];
    
    echo $footer1 ['description'];
   }else{
    echo "footer dosent exist";
   }


?>
</body>
</html>