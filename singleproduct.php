<?php
$id = $GLOBALS["urlArray"][3];
$product = product::where("id","=",$id)->fetch_assoc();
echo $product['id']."<br>";
echo $product['name']."<br>";
echo $product['price']."<br>";
//echo $connection->getProductCategoryTitle($product['category'])['title']."<br>";
echo $product['description']."<br>";
