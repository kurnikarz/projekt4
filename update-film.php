<?php
    session_start();
    require_once 'database.php';
    $idFilm = null;
    if (!empty($_GET['idFilm']))
        $idFilm = $_REQUEST['idFilm'];

    if ($idFilm == null)
        header('Location: index.php');

    if ($result = $connect->query("SELECT * FROM filmy WHERE idFIlm = '$idFilm'")) {
        while ($row = $result->fetch_assoc()) {
            $tytul = $row['nazwa'];
            $rezyser = $row['rezyser'];
            $cena = $row['cena'];
        }
    }

    if (isset($_POST['tytul'])) {

        $nazwaa = $_POST['tytul'];
        $rezyserr = $_POST['rezyser'];
        $cenaa = $_POST['cena'];

        $flaga = true;

        if (strlen($nazwaa) == 0) {
            $_SESSION['blad-nazwa'] = '<span class="err">To pole nie może być puste</span>';
            $flaga = false;
        }

        if (strlen($rezyserr) == 0) {
            $_SESSION['blad-rezyser'] = '<span class="err">To pole nie może być puste</span>';
            $flaga = false;
        }

        if (!is_numeric($cenaa) || strlen($cenaa) == 0) {
            $_SESSION['liczba'] = '<span class="err">Cena musi być liczbą</span>';
            $flaga = false;
        }

        if ($flaga == true) {
            $connect->query("UPDATE filmy SET nazwa='$nazwaa', rezyser='$rezyserr', cena='$cenaa' WHERE idFilm = '$idFilm'");
            $_SESSION['zaktualizowano'] = true;
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
    <title>Title</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Aktualizuj film</h2>
            <hr>
            <br>
            <p>Wypełnij formularz aby zaktualizować film</p>
            <br>
            <form method="post">
                <div class="form-group">
                    <label for="tytul"><strong>Tytuł</strong></label>
                    <input type="text" class="form-control" id="tytul" name="tytul" maxlength="50" style="width: 300px;" value="<?php echo $tytul ?>">
                </div>

                <div class="form-group">
                    <label for="rezyser"><strong>Reżyser</strong></label>
                    <input type="text" class="form-control" id="rezyser" name="rezyser"  maxlength="50" style="width: 300px;" value="<?php echo $rezyser ?>">
                </div>

                <div class="form-group">
                    <label for="cena"><strong>Cena</strong></label>
                    <input type="text" class="form-control" id="cena" name="cena" maxlength="50" style="width: 300px;" value="<?php echo $cena ?>">
                </div>

                <input type="submit" class="btn btn-primary" value="Zaktualizuj rekord">
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