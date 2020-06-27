<?php
include_once 'dbConfig.php';

$selectSql = "SELECT
  `id`,
  `particulars`,
  `credit`,
  `debit`,  
  `balance`,
  `from_account_id`,
  `to_account_id`
FROM
  `transactions`;
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

?>