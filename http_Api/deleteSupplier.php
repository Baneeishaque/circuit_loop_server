<?php 
include_once 'dbConfig.php';

$supplier_id = filter_input(INPUT_POST,'supplier_id');

$deletionSql = "DELETE
FROM
  `suppliers`
WHERE `id` = '$supplier_id';
";

if (!$con->query($deletionSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);

?>