<?php
include 'connect.php';

if(isset($_POST['delete'])){

    $id = $_POST['id'];

    $query = "DELETE FROM vijesti
              WHERE id=$id";

    mysqli_query($dbc,$query);

    header("Location: administrator.php");
}


if(isset($_POST['update'])){

    $id = $_POST['id'];

    $naslov = $_POST['naslov'];
    $sazetak = $_POST['sazetak'];
    $tekst = $_POST['tekst'];
    $kategorija = $_POST['kategorija'];

    $arhiva = 0;

    if(isset($_POST['arhiva'])){
        $arhiva = 1;
    }

    $query = "UPDATE vijesti SET
                naslov='$naslov',
                sazetak='$sazetak',
                tekst='$tekst',
                kategorija='$kategorija',
                arhiva='$arhiva'
              WHERE id=$id";

    mysqli_query($dbc,$query);

    header("Location: administrator.php");
}

?>