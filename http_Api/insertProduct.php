<?php
include_once 'dbConfig.php';

$product_name = filter_input(INPUT_POST, 'product_name');
$product_current_stock = filter_input(INPUT_POST, 'product_current_stock');
$product_minimum_stock = filter_input(INPUT_POST, 'product_minimum_stock');

$insertionSql = "INSERT INTO `products` (
  `name`,
  `current_stock`,
  `minimum_stock`
)
VALUES
  (
    '$product_name',
    '$product_current_stock',
    '$product_minimum_stock'
  );
";

if (!$con->query($insertionSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
