<?php
$id =  $GLOBALS["urlArray"][3];
user::delete()->where("id","=",$id)->get();