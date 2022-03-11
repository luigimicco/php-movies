<?php 

$success = $sql->execute();

$conn->close();

if ($success) {
  header('Location: index.php');
} else {
  http_response_code(500);
  exit();
}
