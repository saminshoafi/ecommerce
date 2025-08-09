<?php
$id = $GLOBALS["urlArray"][3];
$category = category::find($id)->fetch_assoc();;
echo $category['id']."<br>";
echo $category['title']."<br>";
echo $category['description']."<br>";

?>