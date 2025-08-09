<?php
$id = $GLOBALS["urlArray"][3];
footer::delete()->where("id","=",$id)->get();