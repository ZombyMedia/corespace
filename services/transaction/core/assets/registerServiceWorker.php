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

    function getRunCounter($conn, $processID) {
        $sql = "SELECT runcount FROM processors WHERE pid=\"$processID\"";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            return $row["runcount"];
        }
    }

    function registerServiceWorker($conn, $processID) {
        $date = getDateStamp();
        $sql = "INSERT INTO processors(pid, startstamp, runcount) VALUES (\"$processID\", \"$date\", 1)";
        $result = $conn->query($sql);
    }

    function updateServiceWorkerRunCounter($conn, $processID) {
        $runCounter = getRunCounter($conn, $processID) + 1;
        $sql = "UPDATE processors SET runcount=$runCounter WHERE pid=\"$processID\"";
        $result = $conn->query($sql);
        return $runCounter;
    }

    function updateServiceWorkerTimeStamp($conn, $processID) {
        $date = getDateStamp();
        $sql = "UPDATE processors SET startstamp=$date WHERE pid=\"$processID\"";
        $result = $conn->query($sql);
    }
