<!--
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################
-->

<?php
  require("assets/DBConnector.php");

  // updating the bankaccount to given amount from the transaction
  function updateCreditAmount($conn, $bid, $credits) {
      $sql = "UPDATE bank SET credits=$credits WHERE bid=\"$bid\"";

      if (mysqli_query($conn, $sql)) {
          echo "Record updated successfully <br>";
      } else {
          echo "Error updating record: " . mysqli_error($conn);
      }
  }

  // getBalance of given account
  function getBalance($conn, $bid) {
    $sql = "SELECT credits FROM bank WHERE bid=\"$bid\"";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      return $row["credits"];
    }
  }

  function getBidFromUser($conn, $username) {
    $sql = "SELECT bankid FROM users WHERE username=\"$username\"";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
      return $row["bankid"];
    }
  }

  function removeTransactions($conn, $tid) {
    $sql = "DELETE FROM transactions WHERE tid=$tid";
    if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully <br>";
    } else {
      echo "Error deleting record: " . $conn->error . "<br>";
    }
  }

  function getTransaction($conn) {
    $sql = "SELECT * FROM transactions LIMIT 1";
    $result= $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
      $tid = $row["tid"];
      $credits = $row["credits"];
      $receiver = $row["receiver"];
      $sender = $row["sender"];


      $tarray = array(
        "tid" => $tid,
        "credits" => $credits,
        "receiver" => $receiver,
        "sender" => $sender
      );

      return $tarray;
    }
  }

  function validateBalance($Scredits, $credits) {
    if ($Scredits >= $credits) {
      return true;
    } else {
      return false;
    }
  }

  for ($i=0; $i < 1; $i++) {
    $tarry = getTransaction($conn);
    $tid = $tarry["tid"];
    $credits = $tarry["credits"];
    $receiver = $tarry["receiver"];
    $sender = $tarry["sender"];

    if ($credits == 0) {
      echo "0 Credit Transaction denied <br>";
      removeTransactions($conn, $tid);
    } else {
      $recCredits = getBalance($conn, $receiver);
      $senCredits = getBalance($conn, $sender);

      if (validateBalance($senCredits, $credits)) {
        $cRecCredits = $recCredits + $credits;
        $cSenCredits = $senCredits - $credits;
        updateCreditAmount($conn, $sender, $cSenCredits);
        updateCreditAmount($conn, $receiver, $cRecCredits);
      } else {
        echo "Not enough credits <br>";
      }

      removeTransactions($conn, $tid);
    }
  }
