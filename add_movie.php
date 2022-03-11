<?php

include __DIR__ . '/includes/open_db_conn.php';

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
    $categories[] = $cat;
  }
}

$conn->close();

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <?php include_once __DIR__ . '/includes/head.inc' ?>
  <title>Add Movie</title>
</head>

<body>
  <div class="container p-5">
    <header>
      <h1>Add Movie</h1>
    </header>
    <main>
      <form action="store_movie.php" method="POST">
        <input type="text" name="title" placeholder="Nome Film" required />

        <select name="category_id" >
          <?php foreach ($categories as $cat) { ?>
            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
          <?php } ?>
        </select>


        <button class="btn btn-primary" type="submit">Aggiungi</button>
      </form>
    </main>
  </div>
</body>

</html>