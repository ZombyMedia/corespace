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


