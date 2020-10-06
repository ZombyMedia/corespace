<?php
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################

function checkForTransactions($conn, $pid) {
    $sql = "SELECT * FROM transactions";

    $result= $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $transactionID = $row["tid"];
        $processor = $row["processor"];

        if ($transactionID != "") {
            if ($processor == "") {
                return $transactionID;
            } else {
                echo "transaction already allocated\n";
            }
        } else {
            echo "no transactions found\n";
        }
    }
}

function reservTransaction($conn, $tid, $pid) {
    $sql = "UPDATE transactions SET processor=$pid WHERE tid=\"$tid\"";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully <br>";
        return true;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}