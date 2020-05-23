<!--
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################
-->

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