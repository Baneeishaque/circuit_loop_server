<?php
include_once 'dbConfig.php';

$selectSql = "SELECT
  `id`,
  `name`,
  `current_stock`,
  `minimum_stock`
FROM
  `products`;
";

$selectSqlResult = $con->query($selectSql);

$out = array();

if (mysqli_num_rows($selectSqlResult) != 0) {

    array_push($out, array("status" => "0"));

    while ($selectSqlResultRow = mysqli_fetch_assoc($selectSqlResult)) {

        $out[] = $selectSqlResultRow;
    }
} else {

    array_push($out, array("status" => "1"));
}

echo json_encode($out);
