<?php
    require_once("assets/DBConnector.php");

    // All initi Vars
    $factr = 23472739;
    $datetime=0;

    function getCurrentDate() {
        return date("YmdHis");
    }

    function generatePid($factr, $date) {
        $v1 = $factr *5;
        $v2 = $date / 3 * $factr;
        $v3 = $v2 / $v1;
        return $date + $v3;
    }

    $datetime = getCurrentDate();
    $pid = generatePid($factr, $datetime) . "\n";