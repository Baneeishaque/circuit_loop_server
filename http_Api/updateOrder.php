<?php
include_once 'dbConfig.php';

$order_id = filter_input(INPUT_POST, 'order_id');
$order_price = filter_input(INPUT_POST, 'order_price');
$order_status = filter_input(INPUT_POST, 'order_status');
$supplier_id = filter_input(INPUT_POST, 'supplier_id');
$transaction_id = filter_input(INPUT_POST, 'transaction_id');

$updationSql = "UPDATE
  ``
SET
 `price` = '$order_price',
  `status ` = '$order_status',
  `supplier_id` = '$supplier_id',
  `transaction_id` = '$transaction_id'
WHERE `id` = '$order_id';
";

if (!$con->query($updationSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
