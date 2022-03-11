<?php
// 1 - Controllo che arrivo a questa pagina con POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  http_response_code(401);
  die();
}


$id = $_POST['id'] ?? false;
$title = $_POST['title'] ?? false;
$category_id = $_POST['category_id'] ?? false;


$validate = true;

if (!$title || !$id || !$category_id || !is_numeric($id) || !is_numeric($category_id)) $validate = false; 
if (strlen($title) < 3) $validate = false;


//{
//  http_response_code(400);
//  die();
//}



if ($validate) {
  include __DIR__ . '/includes/open_db_conn.php';

  $sql = $conn->prepare("UPDATE movies SET title = ?, category_id = ? WHERE id = ?");
  $sql->bind_param('sii', $title, $category_id, $id);


  include __DIR__ . '/includes/exec_and_close_db.php';

} else {


  header('Location: edit_movie.php?id='. $id. '&error=1'); 
}  



