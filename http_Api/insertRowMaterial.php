<?php
include_once 'dbConfig.php';

$raw_material_name = filter_input(INPUT_POST, 'raw_material_name');
$raw_material_measurement_unit = filter_input(INPUT_POST, 'raw_material_measurement_unit');
$raw_material_current_stock = filter_input(INPUT_POST, 'raw_material_current_stock');
$raw_material_minimum_stock = filter_input(INPUT_POST, 'raw_material_minimum_stock');

$insertionSql = "INSERT INTO `raw_materials` (
  `name`,
  `measurement_unit`,
  `current_stock`,
  `minimum_stock`
)
VALUES
  (
    '$raw_material_name',
    '$raw_material_measurement_unit',
    '$raw_material_current_stock',
    '$raw_material_minimum_stock'
  );
";

if (!$con->query($insertionSql)) {

    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
