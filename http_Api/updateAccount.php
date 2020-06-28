<?php
include_once 'dbConfig.php';

$account_id = filter_input(INPUT_POST,'account_id');
$account_name = filter_input(INPUT_POST,'account_name');


$updationSql = "UPDATE
  `accounts`
SET
  `name` = '$account_name',


WHERE `id` = '$account_id';
";

if (!$con->query($updationSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
