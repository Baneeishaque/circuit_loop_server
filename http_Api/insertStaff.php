<?php
include_once 'dbConfig.php';

$staff_username = filter_input(INPUT_POST,'staff_username');
$staff_password = filter_input(INPUT_POST,'staff_password');

$insertionSql="INSERT INTO `staffs`(
    `username`,
    `password`
    )
    VALUES
        (
            '$staff_username',
            '$staff_password'
        );
    ";

if (!$con->query($insertionSql)) {
  
    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
?>