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
    $tid = -1;


    if (checkIfAlreadyExists($conn, $processID)) {
        echo "This Serviceworker is already registered \n";
        echo "Updating TimeStamp... \n";
        // Updating timestamp to prevent removal
        updateServiceWorkerTimeStamp($conn, $processID);

        updateServiceWorkerRunCounter($conn, $processID);

        $tid = checkForTransactions($conn, $processID);

        if($tid != "") {
          echo "transaction found: " . $tid;
          echo reservTransaction($conn, $tid, $processID);
          shell_exec("php /programm/core/completeTransaction.php");
        } else {
          echo "No transaction found";
        }
    } else {
        echo "No Service Worker matching: " . $processID;
        echo "Registering service worker... \n";
        // registering service worker in database (can only exist onetime with id)
        registerServiceWorker($conn, "$processID");
        // $output = shell_exec('php completeTransaction.php');
    }
