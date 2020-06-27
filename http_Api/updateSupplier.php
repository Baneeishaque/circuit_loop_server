<?php
include_once 'dbConfig.php';

$supplier_id = filter_input(INPUT_POST,'id');
$supplier_name = filter_input(INPUT_POST,'supplier_name');
$supplier_account_id = filter_input(INPUT_POST,'supplier_account_id');

$updationSql = "UPDATE
  `suppliers`
SET
  `name` = '$supplier_name',
  `account_id` = '$supplier_account_id'

WHERE `id` = '$supplier_id';
";

if (!$con->query($updationSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
