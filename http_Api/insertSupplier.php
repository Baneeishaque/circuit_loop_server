<?php
include_once 'dbConfig.php';

$supplier_name = filter_input(INPUT_POST,'supplier_name');
$supplier_account_id = filter_input(INPUT_POST,'supplier_account_id');

$insertionSql="INSERT INTO `suppliers`(
    `name`,
    `account_id`
    )
    VALUES
        (
            '$supplier_name',
            '$supplier_account_id'
        );
    ";

if (!$con->query($insertionSql)) {
  
    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
?>