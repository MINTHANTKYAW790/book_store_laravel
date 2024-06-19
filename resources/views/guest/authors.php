<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Word Wise</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/ff5868ab46.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="../img/wordwise.png">
  <link rel="stylesheet" href="../CSS/style.css">
  <link rel="stylesheet" href="../CSS/astyle.css">
</head>

<body>

  <?php
  include("../includes/navbar.php");
  include("../includes/pagination.php");
  ?>



  <!-- This is in the display period of the author page -->
  <h4 class="booksText">AUTHOR LISTS <i class="fa-solid fa-pen-nib"></i></h4>


  <div class="logInProcess authorPage">

    <?php

    // <!-- PHP code started from here!!! -->

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "wordwise";

    $connection = new mysqli($servername, $username, $password, $database);


    // <!-- PAGINATION BUTTONS PROCESS -->
    $dsn = "mysql:host=$servername;dbname=$database";

    $options = array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    );

    try {
      $pdo = new PDO($dsn, $username, $password, $options);
    } catch (PDOException $e) {
      die("Connection failed: " . $e->getMessage());
    }

    // Define the number of images per page
    $booksPerPage = 10;

    // Get the current page number from the query string (default to 1 if not set)
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Calculate the offset for the SQL query
    $offset = ($page - 1) * $booksPerPage;

    // Fetch the total number of images
    $stmt = $pdo->query("SELECT COUNT(*) FROM authors");
    $totalAuthors = $stmt->fetchColumn();

    // Calculate the total number of pages
    $totalPages = ceil($totalAuthors / $booksPerPage);

    // Fetch the images for the current page
    $stmt = $pdo->prepare("SELECT * FROM authors ORDER BY author_name ASC LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $booksPerPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $authors = $stmt->fetchAll();

    ?>
    <!-- </div> -->
    <div class="gridContainer row row-cols-1 row-cols-sm-2 row-cols-md-5 row-cols-lg-5">

      <?php foreach ($authors as $author) :
        if ($author["author_image"] == "") {
          $author["author_image"] = "user.jpg";
        }
      ?>
        <a href='../pages/authorBooks.php?id=<?php echo htmlspecialchars($author['id']); ?> ' class='card namecard' style='width: 12rem;'>
          <img src='../authorImage/<?php echo htmlspecialchars($author['author_image']); ?>' class='card-img-top' height='200px' alt='$row[author_image]'>
          <div class='card-body'>
            <h5 style='hover{color:white}' class='card-title'><?php echo htmlspecialchars($author['author_name']); ?></h5>
            <p class='card-text'><?php echo htmlspecialchars($author['description']); ?></p>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>

  <?php
  include('../includes/paginationBottom.php');
  include("../includes/footer.php");
  ?>

</body>

</html>