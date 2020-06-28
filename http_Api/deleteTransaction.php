<?php 
include_once 'dbConfig.php';

$transaction_id = filter_input(INPUT_POST,'transaction_id');

$deletionSql = "DELETE
FROM
  `transactions`
WHERE `id` = '$transaction_id';
";

if (!$con->query($deletionSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);

?>