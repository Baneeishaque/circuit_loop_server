<?php 
include_once 'dbConfig.php';

$shop_owner_id = filter_input(INPUT_POST,'shop_owner_id');

$deletionSql = "DELETE
FROM
  `shop_owners`
WHERE `id` = '$shop_owner_id';
";

if (!$con->query($deletionSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);

?>