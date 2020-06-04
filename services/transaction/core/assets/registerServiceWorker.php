<?php
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################

    function checkIfAlreadyExists($conn, $processID) {
        $sql = "SELECT startstamp FROM processors WHERE pid=\"$processID\"";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            return $row["startstamp"];
        }
    }

    function registerServiceWorker($conn, $processID) {
        $date = getDateStamp();
        $sql = "INSERT INTO processors(pid, startstamp) VALUES (\"$processID\", \"$date\")";
        $result = $conn->query($sql);
    }

    function updateServiceWorkerTimeStamp($conn, $processID) {
        $date = getDateStamp();
        $sql = "UPDATE processors SET startstamp=$date WHERE pid=\"$processID\"";
        $result = $conn->query($sql);
    }

