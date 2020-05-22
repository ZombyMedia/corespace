<?php
    require_once("DBConnector.php");

    function checkOpenTransactions($conn) {
        $sql = "SELECT * FROM transactions";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            if ($row["processor"] == "") {
                return $row["tid"];
            } else {
                return "no free transaction";
            }
        }
    }

    function registerTransactionFS() {

    }

    echo checkOpenTransactions($conn) . "\n";