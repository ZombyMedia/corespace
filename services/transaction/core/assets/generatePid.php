<?php
    // All initi Vars
    /*$factr = 23472739;
    $datetime=0;

    function getCurrentDate() {
        return date("YmdHis");
    }

    function generatePid($factr) {
        $datetime = getCurrentDate();
        $v1 = $factr *5;
        $v2 = $datetime / 3 * $factr;
        $v3 = $v2 / $v1;
        return $datetime + $v3;
    }

    $pid = generatePid($factr);
    */


// cat /proc/self/cgroup | grep \"docker\" | sed s/\\//\\n/g | tail -1

    $containerID = shell_exec("cat /proc/self/cgroup | grep \"docker\"");
    echo $containerID;
