<?php
$id = $GLOBALS["urlArray"][3];
product::update($_POST)->where("id","=",$id)->get();
