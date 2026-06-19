
<?php
session_start();
include 'connect.php';

$uspjesnaPrijava = false;
$admin = false;

if(isset($_POST['prijava'])){

    $prijavaImeKorisnika = $_POST['username'];
    $prijavaLozinkaKorisnika = $_POST['lozinka'];

    $sql = "SELECT korisnicko_ime, lozinka, razina
            FROM korisnik
            WHERE korisnicko_ime=?";

    $stmt = mysqli_stmt_init($dbc);

    if(mysqli_stmt_prepare($stmt, $sql)){

        mysqli_stmt_bind_param(
            $stmt,
            "s",
            $prijavaImeKorisnika
        );

        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        mysqli_stmt_bind_result(
            $stmt,
            $imeKorisnika,
            $lozinkaKorisnika,
            $levelKorisnika
        );

        mysqli_stmt_fetch($stmt);

        if(
            password_verify(
                $_POST['lozinka'],
                $lozinkaKorisnika
            )
            &&
            mysqli_stmt_num_rows($stmt) > 0
        ){

            $uspjesnaPrijava = true;

            $_SESSION['username'] = $imeKorisnika;
            $_SESSION['level'] = $levelKorisnika;

            if($levelKorisnika == 1){
                $admin = true;
            }

        }
    }
}

if(isset($_SESSION['username'])){

    if($_SESSION['level'] == 1){
        $admin = true;
    }

    $uspjesnaPrijava = true;
}
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

<main class="admin">
  
<?php
if($uspjesnaPrijava){
    echo '<p><a href="logout.php">Odjava</a></p>';
} else {
?>

<?php
if(isset($_POST['prijava']) && !$uspjesnaPrijava){
    echo "<p>Neispravno korisničko ime ili lozinka. Registrirajte se.</p>";
}
?>

<form method="POST">

    <h2>Prijava korisnika</h2>

    <label>Korisničko ime</label><br>
    <input type="text" name="username"><br><br>

    <label>Lozinka</label><br>
    <input type="password" name="lozinka"><br><br>

    <button type="submit" name="prijava">
        Prijava
    </button>

</form>

<p>
    Nemate račun?
    <a href="registracija.php">Registrirajte se</a>
</p>

<?php
}
?>



<?php

if($admin){

$query = "SELECT * FROM vijesti";
$result = mysqli_query($dbc, $query);

while($row = mysqli_fetch_array($result)){

?>


<form action="update.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label>Naslov</label><br>
    <input type="text" name="naslov"
           value="<?php echo $row['naslov']; ?>"><br><br>

    <label>Sažetak</label><br>
    <textarea name="sazetak"><?php echo $row['sazetak']; ?></textarea><br><br>

    <label>Tekst</label><br>
    <textarea name="tekst"><?php echo $row['tekst']; ?></textarea><br><br>

    <label>Kategorija</label><br>

    <select name="kategorija">

        <option value="novosti"
        <?php if($row['kategorija']=="novosti") echo "selected"; ?>>
        Novosti
        </option>

        <option value="sport"
        <?php if($row['kategorija']=="sport") echo "selected"; ?>>
        Sport
        </option>

    </select>

    <br><br>

    <label>Arhiva</label>

    <input type="checkbox"
           name="arhiva"
           value="1"

    <?php
    if($row['arhiva']==1){
        echo "checked";
    }
    ?>

    >

    <br><br>

    <button type="submit" name="update">
        Izmijeni
    </button>

    <button type="submit" name="delete">
        Izbriši
    </button>

    <hr>

</form>

<?php
}
?>

<?php
}
elseif($uspjesnaPrijava){

    echo "<h2>Nemate administratorska prava.</h2>";

}
?>

</main>

<footer>
    © 2026 - David Pavić
</footer>

</body>
</html>