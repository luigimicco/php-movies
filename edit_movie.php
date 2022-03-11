<?php

$movie_id = $_GET['id'] ?? false;
if (!$movie_id || !is_numeric($movie_id)) {
  http_response_code(400);
  echo 'INVALID ID PROVIDED IN QUERY STRING';
  die();
}
include __DIR__ . '/includes/open_db_conn.php';

$sql = $conn->prepare("SELECT * FROM movies WHERE id = ?");
$sql->bind_param('i', $movie_id);

$sql->execute();

$result = $sql->get_result();
$movie = $result->fetch_assoc();
$conn->close();

if (!$movie) {
  http_response_code(404);
  echo 'Nessun film corrispondente per l\'id fornito';
  exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <?php include_once __DIR__ . '/includes/head.inc' ?>
  <title>Edit Movie</title>
</head>

<body>
  <div class="container p-5">
    <header>
      <h1>Edit Movie</h1>
    </header>
    <main>
      <form action="update_movie.php" method="POST">
        <input type="hidden" name="id" value="<?= $movie['id'] ?>" />
        <input type="text" name="title" placeholder="Nome Film" value="<?= $movie['title'] ?>" required />
        <button class="btn btn-primary" type="submit">Aggiungi</button>
      </form>
    </main>
  </div>
</body>

</html>