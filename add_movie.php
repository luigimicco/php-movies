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
        <button class="btn btn-primary" type="submit">Aggiungi</button>
      </form>
    </main>
  </div>
</body>

</html>