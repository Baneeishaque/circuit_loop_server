<?php
include_once 'dbConfig.php';

$shop_owner_id = filter_input(INPUT_POST,'shop_owner_id');
$shop_owner_username = filter_input(INPUT_POST,'shop_owner_username');
$shop_owner_password = filter_input(INPUT_POST,'shop_owner_password');

$updationSql = "UPDATE
  `shop_owners`
SET
  `username` = '$shop_owner_username',
  `password` = '$shop_owner_password'

WHERE `id` = '$shop_owner_id';
";

if (!$con->query($updationSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
