<?php
include 'connect.php';

$kategorija = $_GET['kategorija'];

$query = "SELECT * FROM vijesti
          WHERE kategorija='$kategorija'
          AND arhiva=0";

$result = mysqli_query($dbc, $query);
?>






<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBC News</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="header-container">

        <div class="logo">
            <span>B</span>
            <span>B</span>
            <span>C</span>
        </div>

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="kategorija.php?kategorija=novosti">News</a></li>
                <li><a href="kategorija.php?kategorija=sport">Sport</a></li>
                <li><a href="administrator.php">Administracija</a></li>
            </ul>
        </nav>

    </div>
</header>

<main>

    <h1><?php echo ucfirst($kategorija); ?></h1>

    <div class="cards">

        <?php
        while($row = mysqli_fetch_array($result)){
        ?>

        <article class="card">

            <img src="img/<?php echo $row['slika']; ?>">

            <h3>
                <a href="clanak.php?id=<?php echo $row['id']; ?>">
                    <?php echo $row['naslov']; ?>
                </a>
            </h3>

            <p><?php echo $row['sazetak']; ?></p>

        </article>

        <?php
        }
        ?>

    </div>

</main>

<footer>
    © 2026 - David Pavić
</footer>

</body>
</html>