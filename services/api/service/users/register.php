<!--
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################
-->

<?php
  require("../../assets/DBConnector.php");

  function generateUUID() {
    return uniqid();
  }

  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  $bankid = generateUUID();
  $uuid = generateUUID();

function checkPasswordLength($password) {
  if (strlen($password) > 8) {
    return "true";
  } else {
    return "false";
  }
}

function createPasswordHash($password) {
  $hashed = hash('sha512', $password);
  return $hashed;
}

function writeUserDB($conn, $username, $password, $email, $bankid, $uuid) {
  $sql = "INSERT INTO users(uuid, username, passwd, email, bankid)
  VALUES (\"$uuid\", \"$username\", \"$password\", \"$email\", \"$bankid\")";

  if ($conn->query($sql) === TRUE) {
      echo "User created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

function createBankAccount($conn, $bankid) {
  $sql = "INSERT INTO bank(bid, credits)
  VALUES (\"$bankid\", \"100\")";

  if ($conn->query($sql) === TRUE) {
      echo "Bank Account created";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  if (checkPasswordLength($password) == "true") {
    $hashpass = createPasswordHash($password);
    writeUserDB($conn, $username, $hashpass, $email, $bankid, $uuid);
    createBankAccount($conn, $bankid);
  } else {
    echo "Password not long enougth";
  }
} else {
  echo "Email address is invalid";
}
