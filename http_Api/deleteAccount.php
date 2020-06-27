<?php 
include_once 'dbConfig.php';

$account_id = filter_input(INPUT_POST,'account_id');

$deletionSql = "DELETE
FROM
  `accounts`
WHERE `id` = '$account_id';
";

if (!$con->query($deletionSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);

?>