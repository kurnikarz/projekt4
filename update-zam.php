<?php
session_start();
require_once 'database.php';
$idFilm = null;
if (!empty($_GET['idZamowienia']))
    $idZamowienia = $_REQUEST['idZamowienia'];

if ($idZamowienia == null)
    header('Location: index.php');

if ($result = $connect->query("SELECT * FROM zamowienia WHERE idZamowienia = '$idZamowienia'")) {
    while ($row = $result->fetch_assoc()) {
        $idFilm = $row['idFilm'];
        $dataZamowienia = $row['dataZamowienia'];
        $dataWygasniecia = $row['$dataWygasniecia'];
        $ilosc = $row['ilosc'];
    }
}

if (isset($_POST['dataZamowienia'])) {

    $idFilm1 = $row['idFilm'];
    $dataZamowienia1 = $row['dataZamowienia'];
    $dataWygasniecia1 = $row['dataWygasniecia'];
    $ilosc1 = $row['ilosc'];

    $flaga = true;

    if (!is_numeric($ilosc)) {
        $_SESSION['liczba'] = '<span class="err">Wartość musi być liczbą</span>';
        $flaga = false;
    }

    if ($ilosc > 50) {
        $_SESSION['zla-ilosc'] = '<span class="err">Maksymalna ilość to 50</span>';
        $flaga = false;
    }

    if ($flaga == true) {
        $connect->query("UPDATE zamowienia SET idFilm='$idFilm1', dataZamowienia='$dataZamowienia1', dataWygasniecia='$dataWygasniecia1', ilosc='$ilosc' WHERE idZamowienia = '$idZamowienia'");
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
            <h2>Aktualizuj zamówienie</h2>
            <hr>
            <br>
            <p>Wypełnij formularz aby zaktualizować zamówienie</p>
            <br>
            <form method="post">
                <div class="form-group">
                    <label for="idFilm"><strong>idFilm</strong></label> <br>
                    <select class="form-control" style="width: 300px;" name="idFilm" id="idFilm">
                        <option value="" disabled selected><?php echo $idFilm ?></option>
                        <?php
                        if ($result = $connect->query("SELECT idFilm FROM filmy")) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="'.$row['idFilm'].'">'.$row['idFilm'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="dataZamowienia"><strong>Data zamówienia</strong></label>
                    <input type="date" min="2020-01-01" max="2020-01-31" class="form-control" id="dataZamowienia" name="dataZamowienia"  maxlength="50" style="width: 300px;" value="<?php echo $dataZamowienia ?>">
                </div>

                <div class="form-group">
                    <label for="dataWygasniecia"><strong>Data wygaśnięcia</strong></label>
                    <input type="date" min="2020-01-10" max="2020-03-01" class="form-control" id="dataWygasniecia" name="dataWygasniecia" maxlength="50" style="width: 300px;" value="<?php echo $dataWygasniecia ?>">
                </div>

                <div class="form-group">
                    <label for="ilosc"><strong>ilość</strong></label>
                    <input type="text" class="form-control" id="ilosc" name="ilosc" maxlength="50" style="width: 300px;" value="<?php echo $ilosc ?>">
                    <?php
                    if (isset($_SESSION['liczba'])) {
                        echo $_SESSION['liczba'];
                        unset($_SESSION['liczba']);
                    }

                    if (isset($_SESSION['zla-ilosc'])) {
                        echo $_SESSION['zla-ilosc'];
                        unset($_SESSION['zla-ilosc']);
                    }
                    ?>
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