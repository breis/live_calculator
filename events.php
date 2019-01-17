<?php
$servername = "localhost";
$username = "calculator";
$password = "calch4x";
$database = "calculator";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

$starting_id = 1;
date_default_timezone_set("America/New_York");
header('Cache-Control: no-cache');
header("Content-Type: text/event-stream\n\n");


while (1) {
  // Every second, check the database. This is v bad for the database.
  // Also, I'm never expecting the index to start over haha
  $result = mysqli_query($conn, "SELECT * FROM (SELECT id, entry FROM entries WHERE id >".$starting_id." ORDER BY id DESC LIMIT 10) t ORDER BY id");

  while ($row = mysqli_fetch_row($result)) {
    echo 'data: { "id" : "'.$row[0].'", "entry": "'.$row[1].'"}';
    echo "\n\n";
    $starting_id = $row[0];
    ob_end_flush();
    flush();
  }
  sleep(1);
}

