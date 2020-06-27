<?php
include_once 'dbConfig.php';

$staff_id = filter_input(INPUT_POST,'staff_id');
$staff_username = filter_input(INPUT_POST,'staff_username');
$staff_password = filter_input(INPUT_POST,'staff_password');

$updationSql = "UPDATE
  `staffs`
SET
  `username` = '$staff_username',
  `password` = '$staff_password'

WHERE `id` = '$staff_id';
";

if (!$con->query($updationSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
