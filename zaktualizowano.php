<?php
session_start();

if (!isset($_SESSION['zaktualizowano']))
{
    header('Location: index.php');
    exit();
}
else
{
    unset($_SESSION['zaktualizowano']);
}

if (isset($_SESSION['blad-nazwa'])) unset($_SESSION['blad-nazwa']);
if (isset($_SESSION['blad-rezyser'])) unset($_SESSION['blad-rezyser']);
if (isset($_SESSION['liczba'])) unset($_SESSION['liczba']);

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Dodaj film</title>
</head>
<body>
<div class="container">
    <div class="row">
        <h2>Pomyślnie zaktualizowano rekord!</h2>
        <br>
        <br>
        <a href="index.php" class="btn btn-default">Powrót do strony głównej</a>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>

