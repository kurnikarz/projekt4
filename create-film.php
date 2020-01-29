<?php
    session_start();

    require_once 'database.php';

    if (isset($_POST['tytul'])) {

        $nazwa = $_POST['tytul'];
        $rezyser = $_POST['rezyser'];
        $cena = $_POST['cena'];

        $flaga = true;

        if (strlen($nazwa) == 0) {
            $_SESSION['blad-nazwa'] = '<span class="err">To pole nie może być puste</span>';
            $flaga = false;
        }

        if (strlen($rezyser) == 0) {
            $_SESSION['blad-rezyser'] = '<span class="err">To pole nie może być puste</span>';
            $flaga = false;
        }

        if (!is_numeric($cena) || strlen($cena) == 0) {
            $_SESSION['liczba'] = '<span class="err">Cena musi być liczbą</span>';
            $flaga = false;
        }

        if ($flaga == true) {
            $sql = "INSERT INTO filmy(nazwa,rezyser,cena) VALUES (?, ?, ?)";
            $q = $dbh->prepare($sql);
            $q->execute(array($nazwa,$rezyser,$cena));
            $_SESSION['dodano'] = true;
            header('Location: index.php');
        }
    }
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
        <div class="col-md-12">
            <h2>Dodaj film</h2>
            <hr>
            <br>
            <p>Wypełnij formularz aby dodać nowy film</p>
            <hr>
            <br>
            <form method="post">
                <div class="form-group">
                    <label for="tytul"><strong>Tytuł</strong></label>
                    <input type="text" class="form-control" id="tytul" name="tytul" maxlength="50" style="width: 300px;">
                    <?php
                        if (isset($_SESSION['blad-nazwa'])) {
                            echo $_SESSION['blad-nazwa'];
                            unset ($_SESSION['blad-nazwa']);
                        }
                    ?>
                </div>

                <div class="form-group">
                    <label for="rezyser"><strong>Reżyser</strong></label>
                    <input type="text" class="form-control" id="rezyser" name="rezyser"  maxlength="50" style="width: 300px;">
                    <?php
                    if (isset($_SESSION['blad-rezyser'])) {
                        echo $_SESSION['blad-rezyser'];
                        unset ($_SESSION['blad-rezyser']);
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label for="cena"><strong>Cena</strong></label>
                    <input type="text" class="form-control" id="cena" name="cena" maxlength="50" style="width: 300px;">
                    <?php
                    if (isset($_SESSION['liczba'])) {
                        echo $_SESSION['liczba'];
                        unset ($_SESSION['liczba']);
                    }
                    ?>
                </div>

                <input type="submit" class="btn btn-primary" value="Dodaj rekord">
                <a href="index.php" class="btn btn-default">Powrót</a>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>

