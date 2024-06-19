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
  <link rel="stylesheet" href="../CSS/cstyle.css">
</head>

<body>

  <?php
  include("../includes/navbar.php");
  include("../includes/pagination.php");
  ?>


  <!-- PHP code started from here!!! -->
  <?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "wordwise";

  $connection = new mysqli($servername, $username, $password, $database);

  if ($connection->connect_error) {
    die("Connection failed!" . $connection->connect_error);
  }

  $sql = "SELECT * FROM bookss";
  $result = $connection->query($sql);

  if (!$result) {
    die("Invalid Query!" . $connection->error);
  }




  $errorMessage = "";
  $successMessage = "";

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // GET method: Show the data of the client
    if (!isset($_GET["id"])) {
      header("location: /BookStore/pages/newAuthor.php");
      exit;
    }
    $id = $_GET["id"];

    $tail = "SELECT * FROM category WHERE category.id=$id";
    $tailResult = $connection->query($tail);

    $tailRow = $tailResult->fetch_assoc();
    echo "<h4 class='booksText'>BOOKS LIST / $tailRow[category_name]</h4>";

  ?>

    <!-- This is in the display period of the BOOKS page -->
    <div class="gridContainer row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">

    <?php

    try {
      //read the row of the selected client from database table
      $sql = "SELECT DISTINCT *
        FROM bookss
        WHERE bookss.category_id = $id";

      $result = $connection->query($sql);

      if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
          $authorSql = "SELECT * FROM authors WHERE $row[author_id] = authors.id";
          $authorResult = $connection->query($authorSql);
          $author = $authorResult->fetch_assoc();

          echo "<div class='imageBox '>
                  <a href='../pages/detail.php?id=$row[id]'>
  
                    <img class='imageImageBox' src='../img/" . $row['image'] . "'  alt='image' height='309px' width='224px''/>
                    <div class='title'><i class='fa-solid fa-magnifying-glass'></i></div>
                    <p style='color:black;' class='authorIndex'>$author[author_name]</p>
                    <p style='color:black' class='statusIndex'>$row[name]</p>
  
                  </a>
                </div>";
        }
        $result = -1;
      } else {
        echo "
        <h6 style='color:black;'>Comming Soon!</h6>
       
        ";
      }
    } catch (mysqli_sql_exception $e) {
      var_dump($e);
      exit;
    }
  }

    ?>
    </div>

    <?php
    include("../includes/footer.php");
    ?>

</body>

</html>