<?php
include_once 'dbConfig.php';

$order_item_id = filter_input(INPUT_POST, 'order_item_id');

$deletionSql = "DELETE
FROM
  `order_items`
WHERE `id` = '$order_item_id';
";

if (!$con->query($deletionSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
