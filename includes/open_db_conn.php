<?php 

const DB_SERVERNAME =  "localhost";
define("DB_USERNAME", "luigi");
define("DB_PASSWORD", "luigi");
define("DB_NAME", "movies_db");

// Connect
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// var_dump($conn);

// Check connection
if ($conn && $conn->connect_error) {
  echo "Connection failed: " . $conn->connect_error;
  exit();
}
