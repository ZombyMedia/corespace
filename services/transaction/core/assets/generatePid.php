<?php
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################

    // Get containerID from the script running docker container
    // The containerID is Unique and can only be used by one container

    function getContainerID() {
        $rawContainerID = shell_exec("cat /proc/self/cgroup | grep 'docker' | tail -1");
        $subStartPos = strrchr($rawContainerID, "/");
        return substr($subStartPos, strpos($subStartPos, "/") + 1);
    }

    function getDateStamp() {
        return date("YmdHis");
    }