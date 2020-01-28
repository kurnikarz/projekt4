
<?php/*
    session_start();

    if (isset($_SESSION['zaktualizowano'])) {
        echo '<h3 class="success"><center>Pomyślnie zaktualizowano rekord!</center></h3>';
        unset($_SESSION['zaktualizowano']);
    }

    if (isset($_SESSION['dodano'])) {
        echo '<h3 class="success"><center>Pomyślnie dodano rekord!</center></h3>';
        unset($_SESSION['dodano']);
    }

    if (isset($_SESSION['usunieto'])) {
        echo '<h3 class="success"><center>Pomyślnie usunięto rekord!</center></h3>';
        unset($_SESSION['usunieto']);
    }

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title>Title</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h1>Mój CRUD</h1>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <h2>Zawartość tabeli filmy</h2>
                <hr>
            </div>
            <div class="col-md-6">
                <a href="create-film.php" class="btn btn-success" style="float:right;">Dodaj film</a>
            </div>
        </div>
        <br>

                <?php

                    require_once 'database.php';
                    echo '<table class="table table-hover">';
                    if ($result = $connect->query("DESCRIBE filmy")) {
                        echo '<thead>';
                        echo '<tr>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<th scope="col">'.$row['Field'].'</th>';
                        }
                    }
                echo '<th scope="col">Operacje</th>';
                echo '</thead>';
                echo '</tr>';
                        echo '<tbody>';
                        if ($result = $connect->query("SELECT * FROM filmy")) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>'.$row['idFilm'].'</td>';
                                echo '<td>'.$row['nazwa'].'</td>';
                                echo '<td>'.$row['rezyser'].'</td>';
                                echo '<td>'.$row['cena'].'</td>';
                                echo '<td><a data-toggle="tooltip" data-placement="top" title="Przeglądaj" class="glyphicon glyphicon-search" href="read-film.php?idFilm='.$row['idFilm'].'"></a>';
                                echo '<a data-toggle="tooltip" data-placement="top" title="Aktualizuj" class="glyphicon glyphicon-edit" href="update-film.php?idFilm='.$row['idFilm'].'"></a>';
                                echo '<a data-toggle="tooltip" data-placement="top" title="Usuń" class="glyphicon glyphicon-trash" href="delete.php?idFilm='.$row['idFilm'].'"></a></td>';
                                echo '</tr>';
                            }
                        }
                        echo '</tbody>';
                        echo '</table>';
                    ?>
        <br><br>
        <div class="row">
            <div class="col-md-6">
                <h2>Zawartość tabeli zamówienia</h2>
                <hr>
            </div>
            <div class="col-md-6">
                <a href="create-zam.php" class="btn btn-success" style="float:right;">Dodaj zamówienie</a>
            </div>
        </div>
        <br>

        <?php

        require_once 'database.php';
        echo '<table class="table table-hover">';
        if ($result = $connect->query("DESCRIBE zamowienia")) {
            echo '<thead>';
            echo '<tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<th scope="col">'.$row['Field'].'</th>';
            }
        }
        echo '<th scope="col">Operacje</th>';
        echo '</thead>';
        echo '</tr>';
        echo '<tbody>';
        if ($result = $connect->query("SELECT * FROM zamowienia")) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>'.$row['idZamowienia'].'</td>';
                echo '<td>'.$row['idFilm'].'</td>';
                echo '<td>'.$row['dataZamowienia'].'</td>';
                echo '<td>'.$row['dataWygasniecia'].'</td>';
                echo '<td>'.$row['ilosc'].'</td>';
                echo '<td><a data-toggle="tooltip" data-placement="top" title="Przeglądaj" class="glyphicon glyphicon-search" href="read-zam.php?idZamowienia='.$row['idZamowienia'].'"></a>';
                echo '<a data-toggle="tooltip" data-placement="top" title="Aktualizuj" class="glyphicon glyphicon-edit" href="update-zam.php?idZamowienia='.$row['idZamowienia'].'"></a>';
                echo '<a data-toggle="tooltip" data-placement="top" title="Usuń" class="glyphicon glyphicon-trash" href="delete-zam.php?idZamowienia='.$row['idZamowienia'].'"></a></td>';
                echo '</tr>';
            }
        }
        echo '</tbody>';
        echo '</table>';
        */?>
<!--
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
-->