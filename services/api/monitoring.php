<!--
####################################################################
## ZOUPA - (ZombyMediaIC open source usage protection agreement)  ##
## License as of: 10.05.2020 19:41 | #202005101941                ##
## Niklas Vorberg (AsP3X)                                         ##
####################################################################
-->

<?php

require('assets/DBConnector.php');

  $sql = "SELECT * FROM users";
  $result = $conn->query($sql);
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Monitoring DB</title>
    <link rel="stylesheet" href="assets/styles/css/monitoring.css">

    <script type="text/javascript">
      var timeout = setTimeout("location.reload(true);",2000);
      function resetTimeout() {
        clearTimeout(timeout);
        timeout = setTimeout("location.reload(true);",2000);
      }
    </script>
  </head>
  <body>
    <table>
      <tr>
        <th scope="col">UUID</th>
        <th scope="col">Username</th>
        <th scope="col">Password</th>
        <th scope="col">Email</th>
        <th scope="col">BankID</th>
      </tr>
        <?php
          while($row = $result->fetch_assoc()) {
            echo "<tr class=\"users-display\">";
            echo "<td class=\"users\">" . $row["uuid"] . "</td>";
            echo "<td class=\"users\">" . $row["username"] . "</td>";
            echo "<td class=\"users\">" . $row["passwd"] . "</td>";
            echo "<td class=\"users\">" . $row["email"] . "</td>";
            echo "<td class=\"users\">" . $row["bankid"] . "</td>";
            echo "</tr>";
          }
        ?>
    </table>
    <tr>
    <table>
      <tr>
        <th scope="col">BankID</th>
        <th scope="col">Credits</th>
      </tr>
        <?php
          $sql1 = "SELECT * FROM bank";
          $result1 = $conn->query($sql1);
          while($row1 = $result1->fetch_assoc()) {
            echo "<tr class=\"users-display\">";
            echo "<td class=\"users\">" . $row1["bid"] . "</td>";
            echo "<td class=\"users\">" . $row1["credits"] . "</td>";
            echo "</tr>";
          }
        ?>
    </table>
    <tr>
    <table>
      <tr>
        <th scope="col">TransactionID</th>
        <th scope="col">Credits</th>
        <th scope="col">Sender</th>
        <th scope="col">Receiver</th>
      </tr>
        <?php
          $sql2 = "SELECT * FROM transactions";
          $result2 = $conn->query($sql2);
          while($row2 = $result2->fetch_assoc()) {
            echo "<tr class=\"users-display\">";
            echo "<td class=\"users\">" . $row2["tid"] . "</td>";
            echo "<td class=\"users\">" . $row2["credits"] . "</td>";
            echo "<td class=\"users\">" . $row2["sender"] . "</td>";
            echo "<td class=\"users\">" . $row2["receiver"] . "</td>";
            echo "</tr>";
          }
        ?>
    </table>
  </body>
</html>
