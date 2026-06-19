<?php
include 'connect.php';

$title = $_POST['title'];
$about = $_POST['about'];
$content = $_POST['content'];
$category = $_POST['category'];

$picture = $_FILES['pphoto']['name'];
$tmp_name = $_FILES['pphoto']['tmp_name'];

$date = date('d.m.Y');
$archive = isset($_POST['archive']) ? 1 : 0;

move_uploaded_file($tmp_name, "img/".$picture);


$query = "INSERT INTO vijesti
(datum, naslov, sazetak, tekst, slika, kategorija, arhiva)
VALUES
('$date', '$title', '$about', '$content', '$picture', '$category', '$archive')";

mysqli_query($dbc, $query);

?>


<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cvjetna tržnica privukla velik broj posjetitelja</title>
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
        <h1><?php echo strtoupper($category); ?></h1>
    </div>
</div>

<main class="article-container">

    <article class="article-page">

        <h2><?php echo $title; ?></h2>

        <img src="img/<?php echo $picture; ?>" alt="">

        <p class="lead">
            <?php echo $about; ?>
        </p>

        <p>
            <?php echo nl2br($content); ?>
        </p>

    </article>

</main>

<footer>
    Copyright © 2025 BBC portal. Sva prava pridržana.
</footer>

</body>
</html>