<?php
include_once 'dbConfig.php';

$transaction_particulars = filter_input(INPUT_POST, 'transaction_particulars');
$transaction_credit = filter_input(INPUT_POST,'transaction_credit');
$transaction_debit = filter_input(INPUT_POST,'transaction_debit');
$transaction_balance = filter_input(INPUT_POST,'transaction_balance');
$transaction_from_account_id = filter_input(INPUT_POST,'transaction_from_account_id');
$transaction_to_account_id = filter_input(INPUT_POST,'transaction_to_account_id');

$insertionSql = "INSERT INTO `transactions` (
  `particulars`,
  `credit`,
  `debit`,
  `balance`,
  `from_account_id`,
  `to_account_id`
  )
  VALUES
    (
      '$transaction_particulars',
      '$transaction_credit',
      '$transaction_debit',
      '$transaction_balance',
      '$transaction_from_account_id',
      '$transaction_to_account_id'
    );
  ";
  
  if (!$con->query($insertionSql)) {
  
      $arr = array('status' => "1", 'error' => $con->error);
  
  } else {
  
      $arr = array('status' => "0");
  }
  
  echo json_encode($arr);
  
?>