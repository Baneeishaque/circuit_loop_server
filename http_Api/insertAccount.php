<?php
include_once 'dbConfig.php';

$account_name = filter_input(INPUT_POST,'account_name');


$insertionSql="INSERT INTO `accounts`(
    `name`,
   
    )
    VALUES
        (
            '$account_name',
        
        );
    ";

if (!$con->query($insertionSql)) {
  
    $arr = array('status' => "1", 'error' => $con->error);

} else {

    $arr = array('status' => "0");
}

echo json_encode($arr);
?>