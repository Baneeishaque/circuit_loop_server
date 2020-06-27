<?php
include_once 'dbConfig.php';

$order_price = filter_input(INPUT_POST, 'order_price');
$order_status = filter_input(INPUT_POST, 'order_status');
$supplier_id = filter_input(INPUT_POST, 'supplier_id');
$transaction_id = filter_input(INPUT_POST, 'transaction_id');

$insertionSql = "INSERT INTO `order_items` (
  `price`,
  `status`,
  `supplier_id`,
  `transaction_id`
)
VALUES
  (
    '$order_price',
    '$order_status',
    '$supplier_id',
    '$transaction_id'
  );
";

if (!$con->query($insertionSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
