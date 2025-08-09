<?php
$id = $GLOBALS["urlArray"][3];
$user = user::find($id)->fetch_assoc();
echo $user['id'];
echo $user['name'];
echo $user['family'];
echo $user['phoneNumber'];