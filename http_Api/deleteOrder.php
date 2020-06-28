<?php
include_once 'dbConfig.php';

$order_id = filter_input(INPUT_POST, 'order_id');

$deletionSql = "DELETE
FROM
  `orders`
WHERE `id` = '$order_id';
";

if (!$con->query($deletionSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
