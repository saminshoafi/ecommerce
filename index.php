<?php

include ("autoload.php");

$uri=$_SERVER['REQUEST_URI'];
$roter = new roter($uri);
$urlArray = $roter->parsurl();
$loadFile = new loadFile;
$loadFile->load('header');
$loadFile->load($urlArray[2]);
$loadFile->load('footer');


