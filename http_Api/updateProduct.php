<?php
include_once 'dbConfig.php';

$product_id = filter_input(INPUT_POST, 'product_id');
$product_name = filter_input(INPUT_POST, 'product_name');
$product_current_stock = filter_input(INPUT_POST, 'product_current_stock');
$product_minimum_stock = filter_input(INPUT_POST, 'product_minimum_stock');

$updationSql = "UPDATE
  `products`
SET
  `name` = '$product_name',
  `current_stock` = '$product_current_stock',
  `minimum_stock` = '$product_minimum_stock'
WHERE `id` = '$product_id';
";

if (!$con->query($updationSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
