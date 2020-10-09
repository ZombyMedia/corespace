<?php
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################

// Requst handler for the web command interface
// All commands and settings will be handled here

  // Importing all library's
  require("../../assets/DBConnector.php");
  require("modules/commandlist.php");

  // Form request assigned to variable
  $command = $_POST["command"];

  // ! IMPORTANT !
  // Checking if command wasn't received to prevent issues
  if ($command == "") {
    $command = "ERROR: command not received";
  }


  ##################################################
  #               Resolve Logic                    #
  ##################################################

  // Analysing if command exists in library and is spellt correctly
  // Executing the requested command if found

  function checkCommand($commands, $allcommands){
    $search = array_search($commands, $allcommands);

    if (false !== $search) {
      echo shell_exec("php ./modules/$allcommands[$search].php");
    } else {
      echo "command not found";
    }
  }


  // Command handler for the clear command
  // Also refining the received non clear commands for further use

  if ($command !="") {
    if ($command == "clear") {
      echo "clear";
    } else {
      $result = explode(" ", $command, str_word_count($command));
      checkCommand($result[0], $allcommands);
    }
  } else {
    echo "Can't execute empty command";
  }
?>
