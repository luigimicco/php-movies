<?php
// Eseguo la mia query

include_once __DIR__ .'/models/Movie.php';
include __DIR__ . '/includes/open_db_conn.php';

$query = "SELECT `id`, `title` FROM `movies` ORDER BY `id`";

$result = $conn->query($query);

if (!$result) {
  echo 'Si è verificato un errore';
  var_dump($query);
  exit();
}

$movies = [];

if ($result && $result->num_rows > 0) {
  while ($arr_movie = $result->fetch_assoc()) {    // fetch_object //fetch_assoc 
    
    $movie = new Movie($arr_movie['title'], $arr_movie['category_id']);
    $movie->setId($arr_movie['id']);
    $movies[] = $movie;
  }
}


$query ="SELECT * FROM categories ORDER BY `name` ASC";
$result = $conn->query($query);

if (!$result) {
  echo 'Si è verificato un errore';
  var_dump($query);
  exit();
}

$categories = [];

if ($result && $result->num_rows > 0) {
  while ($cat = $result->fetch_assoc()) {
    $categories[$cat['id']] = $cat['name'];
  }
}




$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once __DIR__ . '/includes/head.inc' ?>
  <title>My Movies</title>
</head>

<body>
  <div class="container p-5">

    <header clasS="d-flex align-items-center justify-content-between">
      <h1>Movies</h1>
      <a href="add_movie.php" class="btn btn-sm btn-success"><i class="fa fa-plus me-2"></i>Aggiungi</a>
    </header>
    <main>
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Category</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($movies as $movie) : ?>
            <tr>
              <td><?= $movie->getId() ?></td>
              <td><?= $movie->getTitle() ?></td>
              <td><?= $categories[$movie->getCategory()] ?></td>
              <td class="d-flex align-items-center">

                <a href="edit_movie.php?id=<?= $movie->getId() ?>" class="btn btn-sm btn-warning me-2"><i class="fa fa-pencil"></i></a>

                <form action="destroy_movie.php" method="POST" class="delete-form">
                  <input type="hidden" name="id" value="<?= $movie->getId() ?>" />
                  <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i>
                  </button>
                </form>


              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfooter>
        <tr>
          <td colspan="4" class="text-end" ><?= count($movies) ?> film</td>
        </tr>    
        </tfooter>
      </table>

    </main>
  </div>
  <script>
    const deleteForms = document.querySelectorAll('.delete-form');
    deleteForms.forEach((form) => {
      form.addEventListener('submit', (event) => {
        event.preventDefault();
        const proceed = confirm("Sei sicuro di voler eliminare questo film?")

        if (proceed) {
          form.submit();
        }
      })
    });
  </script>
</body>

</html>