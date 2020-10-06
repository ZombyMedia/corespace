<!--
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################
-->

<?php
  require("../../assets/DBConnector.php");

  function generateUUID() {
    $randomStr = rand();
    $hashed = hash('sha265', $randomStr);
    return $hashed;
  }

  function createBankAccount($conn, $transactionID, $creditAmount, $receiver, $sender) {
    $sql = "INSERT INTO transactions(tid, credits, sender, receiver)
    VALUES (\"$transactionID\", \"$creditAmount\", \"$sender\", \"$receiver\")";

    if ($conn->query($sql) === TRUE) {
        echo "Transaction created";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  if (!$_POST["amount"]==null && !$_POST["receiver"]==null && !$_POST["sender"]==null) {
    $transactionID = rand(1 , 99999999);
    $creditAmount = $_POST["amount"];
    $receiver = $_POST["receiver"];
    $sender = $_POST["sender"];

    createBankAccount($conn, $transactionID, $creditAmount, $receiver, $sender);
  } else {
    echo "Transaction request got denied: one of the required filds is not filled";
  }
