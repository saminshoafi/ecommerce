<?php
$id = $GLOBALS["urlArray"][3];
user::update($_POST)->where("id","=",$id)->get();