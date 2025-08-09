<?php
$id = $GLOBALS["urlArray"][3];
category::delete()->where("id","=",$id)->get();


