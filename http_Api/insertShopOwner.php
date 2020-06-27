<?php
include_once 'dbConfig.php';

$shop_owner_username = filter_input(INPUT_POST,'shop_owner_username');
$shop_owner_password = filter_input(INPUT_POST,'shop_owner_password');

$insertionSql="INSERT INTO `shop_owners`(
    `username`,
    `password`
    )
    VALUES
        (
            '$shop_owner_username',
            '$shop_owner_password'
        );
    ";

if (!$con->query($insertionSql)) {
  
    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
?>