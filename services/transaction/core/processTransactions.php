<?php
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################

    require_once("assets/DBConnector.php");
    require_once("assets/generatePid.php");
    require_once("assets/registerServiceWorker.php");
    require_once("assets/transactionManager.php");

    // Generated from generatePid.php file
    $processID = getContainerID();



    if (checkIfAlreadyExists($conn, $processID)) {
        echo "This Serviceworker is already registered \n";
        echo "Updating TimeStamp... \n";
        // Updating timestamp to prevent removal
        updateServiceWorkerTimeStamp($conn, $processID);

        // checking if transaction is available
        // only continues if transaction is available and no process has been registered
        if ($tid = checkForTransactions($conn, $processID) != "") {
            // registering transaction to prevent collision
            echo reservTransaction($conn, $tid, $processID);
        }
    } else {
        echo "No Service Worker matching: " . $processID;
        echo "Registering service worker... \n";
        // registering service worker in database (can only exist onetime with id)
        registerServiceWorker($conn, "$processID");
        $output = shell_exec('php completeTransaction.php');
    }
