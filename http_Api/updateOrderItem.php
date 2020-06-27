<?php
include_once 'dbConfig.php';

$order_item_id = filter_input(INPUT_POST, 'order_item_id');
$order_id = filter_input(INPUT_POST, 'order_id');
$item_id = filter_input(INPUT_POST, 'item_id');
$qty = filter_input(INPUT_POST, 'order_item_qty');
$order_item_piece_rate = filter_input(INPUT_POST, 'order_item_piece_rate');

$updationSql = "UPDATE
  `order_items`
SET
  `order_id` = '$order_id',
  `item_id` = '$item_id',
  `qty` = '$qty',
  `piece_rate` = '$order_item_piece_rate'
WHERE `id` = '$order_item_id';
";

if (!$con->query($updationSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
