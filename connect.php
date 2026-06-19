<?php

$dbc = mysqli_connect(
    "localhost",
    "root",
    "",
    "bbc_portal"
);

mysqli_set_charset($dbc, "utf8");

if(!$dbc){
    die("Greška pri spajanju na bazu!");
}

?>