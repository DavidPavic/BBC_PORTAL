<?php
include 'connect.php';

if(isset($_POST['registracija'])) {

    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $username = $_POST['username'];
    $lozinka = $_POST['pass'];
    $lozinka2 = $_POST['passRep'];

    if($lozinka == $lozinka2) {

        $hashed_password = password_hash($lozinka, PASSWORD_BCRYPT);

        $sql = "SELECT korisnicko_ime
                FROM korisnik
                WHERE korisnicko_ime=?";

        $stmt = mysqli_stmt_init($dbc);

        mysqli_stmt_prepare($stmt, $sql);

        mysqli_stmt_bind_param($stmt, "s", $username);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        if(mysqli_stmt_num_rows($stmt) > 0) {

            echo "<p>Korisničko ime već postoji!</p>";

        } else {

            $razina = 0;

            $sql = "INSERT INTO korisnik
                    (ime, prezime, korisnicko_ime, lozinka, razina)
                    VALUES (?, ?, ?, ?, ?)";

            $stmt = mysqli_stmt_init($dbc);

            mysqli_stmt_prepare($stmt, $sql);

            mysqli_stmt_bind_param(
                $stmt,
                "ssssi",
                $ime,
                $prezime,
                $username,
                $hashed_password,
                $razina
            );

            mysqli_stmt_execute($stmt);

            echo "<p>Registracija uspješna!</p>";
        }

    } else {

        echo "<p>Lozinke se ne podudaraju!</p>";
    }
}
?>






<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Registracija</title>
</head>
<body>

<h1>Registracija korisnika</h1>

<form method="POST">

    <label>Ime</label><br>
    <input type="text" name="ime" required><br><br>

    <label>Prezime</label><br>
    <input type="text" name="prezime" required><br><br>

    <label>Korisničko ime</label><br>
    <input type="text" name="username" required><br><br>

    <label>Lozinka</label><br>
    <input type="password" name="pass" required><br><br>

    <label>Ponovi lozinku</label><br>
    <input type="password" name="passRep" required><br><br>

    <button type="submit" name="registracija">
        Registriraj se
    </button>

</form>

</body>
</html>