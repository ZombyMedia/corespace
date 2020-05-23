<!--
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################
-->

<?php
    require_once("assets/DBConnector.php");
    require_once("assets/generatePid.php");
    require_once("assets/registerServiceWorker.php");

    // Generated from generatePid.php file
    $processID = getContainerID();

    if (checkIfAlreadyExists($conn, $processID)) {
        echo "This Serviceworker is already registered \n";
        echo "Updating TimeStamp... \n";
        updateServiceWorkerTimeStamp($conn, $processID);
    } else {
        echo "No Service Worker matching: " . $processID;
        echo "Registering service worker... \n";
        registerServiceWorker($conn, "$processID");
    }


