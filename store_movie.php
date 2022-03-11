<?php
// 1 - Controllo che arrivo a questa pagina con POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(401);
  die();
}


$title = $_POST['title'] ?? false;
$category_id = $_POST['category_id'] ?? false;

if (!$title) {
  http_response_code(400);
  die();
}

include __DIR__ . '/includes/open_db_conn.php';

$sql = $conn->prepare("INSERT INTO movies (title, category_id) VALUES (?,?)");
$sql->bind_param('si', $title, $category_id);

include __DIR__ . '/includes/exec_and_close_db.php';
