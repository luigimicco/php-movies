<?php
// 1 - Controllo che arrivo a questa pagina con POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(401);
  die();
}


$title = $_POST['title'] ?? false;

if (!$title) {
  http_response_code(400);
  die();
}

include __DIR__ . '/includes/open_db_conn.php';

$sql = $conn->prepare("INSERT INTO movies (title) VALUES (?)");
$sql->bind_param('s', $title);

include __DIR__ . '/includes/exec_and_close_db.php';
