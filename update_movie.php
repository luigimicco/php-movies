<?php
// 1 - Controllo che arrivo a questa pagina con POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(401);
  die();
}


$id = $_POST['id'] ?? false;
$title = $_POST['title'] ?? false;

if (!$title || !$id || !is_numeric($id)) {
  http_response_code(400);
  die();
}

include __DIR__ . '/includes/open_db_conn.php';

$sql = $conn->prepare("UPDATE movies SET title = ? WHERE id = ?");
$sql->bind_param('si', $title, $id);


include __DIR__ . '/includes/exec_and_close_db.php';
