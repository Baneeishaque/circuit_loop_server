<?php
include_once 'dbConfig.php';

$order_id = filter_input(INPUT_POST, 'order_id');
$item_id = filter_input(INPUT_POST, 'item_id');
$order_item_qty = filter_input(INPUT_POST, 'order_item_qty');
$order_item_piece_rate = filter_input(INPUT_POST, 'order_item_piece_rate');

$insertionSql = "INSERT INTO `order_items` (
  `order_id`,
  `item_id`,
  `qty`,
  `piece_rate`
)
VALUES
  (
    '$order_id',
    '$item_id',
    '$order_item_qty',
    '$order_item_piece_rate'
  );
";

if (!$con->query($insertionSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
