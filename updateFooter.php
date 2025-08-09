<?php
$id = $_POST['id'];
footer::update($_POST)->where("id","=",$id)->get();