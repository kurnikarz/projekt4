<?php

$idZamowienia = null;
if (!empty($_GET['idZamowienia']))
    $idZamowienia = $_REQUEST['idZamowienia'];

if ($idZamowienia == null)
    header('Location: index.php');


else {
    require_once 'database.php';
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM zamowienia where idZamowienia = ?";
    $q = $dbh->prepare($sql);
    $q->execute(array($idZamowienia));
    $data = $q->fetch(PDO::FETCH_ASSOC);
}
?>

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
        <h3>Dane zamówienia</h3>
    </div>

    <div class="form-group row">
        <label class="col-sm-3 control-label">ID zamówienia</label>
        <div class="col-sm-3">
            <label class="form-control" style="width: 400px;">
                <?php echo $data['idZamowienia'];?>
            </label>
        </div>
    </div>
    <div class="control-group row">
        <label class=" col-sm-3 control-label">ID filmu</label>
        <div class="col-sm-3">
            <label class="form-control" style="width: 400px;">
                <?php echo $data['idFilm'];?>
            </label>
        </div>
    </div>
    <div class="control-group row">
        <label class="col-sm-3 control-label">data zamówienia</label>
        <div class="col-sm-3">
            <label class="form-control" style="width: 400px;">
                <?php echo $data['dataZamowienia'];?>
            </label>
        </div>
    </div>
    <div class="control-group row">
        <label class="col-sm-3 control-label">data wygaśnięcia</label>
        <div class="col-sm-3">
            <label class="form-control" style="width: 400px;">
                <?php echo $data['dataWygasniecia'];?>
            </label>
        </div>
    </div>
    <div class="control-group row">
        <label class="col-sm-3 control-label">ilość</label>
        <div class="col-sm-3">
            <label class="form-control" style="width: 400px;">
                <?php echo $data['ilosc'];?>
            </label>
        </div>
    </div>
    <div class="form-actions">
        <a class="btn btn-info" href="index.php">Cofnij</a>
    </div>
</div>
<script href="js/bootstrap.min.js"></script>
</body>
</html>