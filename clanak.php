<?php
include 'connect.php';

$id = $_GET['id'];

$query = "SELECT * FROM vijesti WHERE id=$id";
$result = mysqli_query($dbc, $query);

$row = mysqli_fetch_array($result);
?>






<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['naslov']; ?></title>
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

<div class="category-bar news-bar">
    <div class="article-container">
        <h1>SPORT</h1>
    </div>
</div>

<main class="article-container">

    <article class="article-page">

        <h2><?php echo $row['naslov']; ?></h2>

        <img src="img/<?php echo $row['slika']; ?>" alt="">

        <p class="lead">
            <?php echo $row['sazetak']; ?>
        </p>

        <p>
            <?php echo nl2br($row['tekst']); ?>
        </p>
    </article>

</main>

<footer>
    Copyright © 2025 BBC portal. Sva prava pridržana.
</footer>

</body>
</html>