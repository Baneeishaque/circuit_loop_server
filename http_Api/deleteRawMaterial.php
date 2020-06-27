<?php
include_once 'dbConfig.php';

$raw_material_id = filter_input(INPUT_POST, 'raw_material_id');

$deletionSql = "DELETE
FROM
  `raw_materials`
WHERE `id` = '$raw_material_id';
";

if (!$con->query($deletionSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
