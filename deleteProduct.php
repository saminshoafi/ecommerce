<?php
$id =  $GLOBALS["urlArray"][3];
product::delete()->where("id","=",$id)->get();
