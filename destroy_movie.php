<?php 
// 1 - Controllo che arrivo a questa pagina con POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(401);
  die();
}


$id = $_POST['id'] ?? false;

if ( !$id || !is_numeric($id)) {
  http_response_code(400);
  die();
}


include __DIR__ . '/includes/open_db_conn.php';


$sql = $conn->prepare("DELETE FROM movies  WHERE id = ?");
$sql->bind_param('i',  $id);

include __DIR__ . '/includes/exec_and_close_db.php';
