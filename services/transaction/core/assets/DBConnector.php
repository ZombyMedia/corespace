<?php
// ####################################################################
// ## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
// ## License as of: 10.05.2020 19:41 | #202005101941                ##
// ## Niklas Vorberg (AsP3X)                                         ##
// ####################################################################

$servername = "corespace.de:3307";
$username = "corespace";
$password = "Zomby.0207";
$database = "corespace";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }