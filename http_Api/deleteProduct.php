<?php
include_once 'dbConfig.php';

$product_id = filter_input(INPUT_POST, 'product_id');

$deletionSql = "DELETE
FROM
  `products`
WHERE `id` = '$product_id';
";

if (!$con->query($deletionSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
