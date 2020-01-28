<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przeglądaj zamówienie</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <h1>Przeglądaj</h1>
    </div>

    <?php

    $idZamowienia = null;
    if (!empty($_GET['idZamowienia']))
        $idZamowienia = $_REQUEST['idZamowienia'];

    if ($idZamowienia == null)
        header('Location: index.php');



    require_once 'database.php';
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
    echo '<br>';
    echo '<br>';
    echo '<tbody>';
    if ($result = $connect->query("SELECT * FROM zamowienia WHERE idZamowienia = '$idZamowienia'")) {
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>'.$row['idZamowienia'].'</td>';
            echo '<td>'.$row['idFilm'].'</td>';
            echo '<td>'.$row['dataZamowienia'].'</td>';
            echo '<td>'.$row['dataWygasniecia'].'</td>';
            echo '<td>'.$row['suma'].'</td>';
            echo '<td>'.$row['ilosc'].'</td>';
            echo '</tr>';
        }

    }
    echo '</tbody>';
    echo '</table>';
    echo '<br>';
    echo '<a class="btn btn-primary" href="index.php">Powrót</a>';


    ?>
</div>
<link rel="stylesheet" href="js/bootstrap.min.js">
</body>
</html>