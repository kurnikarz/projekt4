<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przeglądaj film</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Przeglądaj</h1>
    </div>

    <?php

        $idFilm = null;
        if (!empty($_GET['idFilm']))
            $idFilm = $_REQUEST['idFilm'];

        if ($idFilm == null)
            header('Location: index.php');



        require_once 'database.php';
        echo '<table class="table table-hover">';
        if ($result = $connect->query("DESCRIBE filmy")) {
            echo '<thead>';
            echo '<tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<th scope="col">'.$row['Field'].'</th>';
            }
        }
        echo '</thead>';
        echo '</tr>';
        echo '<br>';
        echo '<br>';
        echo '<tbody>';
        if ($result = $connect->query("SELECT * FROM filmy WHERE idFilm = '$idFilm'")) {
            while($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>'.$row['idFilm'].'</td>';
                echo '<td>'.$row['nazwa'].'</td>';
                echo '<td>'.$row['rezyser'].'</td>';
                echo '<td>'.$row['cena'].'</td>';
            }

        }
    echo '</tbody>';
    echo '</table>';
    echo '<br>';



    ?>
<br>
<div class="row">
    <?php
    echo '<table class="table table-hover">';
    if ($result = $connect->query("DESCRIBE zamowienia")) {
        echo '<thead>';
        echo '<tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<th scope="col">'.$row['Field'].'</th>';
        }
    }
    echo '</thead>';
    echo '</tr>';
    echo '<h3>Zamówienia dla tego filmu</h3>';
    echo '<tbody>';
    if ($result = $connect->query("SELECT idZamowienia, filmy.idFilm, dataZamowienia, dataWygasniecia, ilosc, suma FROM filmy LEFT JOIN zamowienia ON filmy.idFilm = zamowienia.idFilm WHERE filmy.Idfilm = '$idFilm'")) {
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$row['idZamowienia'].'</td>';
            echo '<td>'.$row['idFilm'].'</td>';
            echo '<td>'.$row['dataZamowienia'].'</td>';
            echo '<td>'.$row['dataWygasniecia'].'</td>';
            echo '<td>'.$row['ilosc'].'</td>';
            echo '<td>'.$row['suma'].'</td>';
        }

    }
    echo '</tbody>';
    echo '</tr>';
    echo '</table>';
    echo '<a class="btn btn-primary" href="index.php">Powrót</a>';
    ?>
</div>
</div>
<link rel="stylesheet" href="js/bootstrap.min.js">
</body>
</html>