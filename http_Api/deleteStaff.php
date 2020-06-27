<?php 
include_once 'dbConfig.php';

$staff_id = filter_input(INPUT_POST,'staff_id');

$deletionSql = "DELETE
FROM
  `staffs`
WHERE `id` = '$staff_id';
";

if (!$con->query($deletionSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);

?>