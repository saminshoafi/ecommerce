<?php
$id = $GLOBALS["urlArray"][3];
category::update($_POST)->where("id","=",$id)->get();


