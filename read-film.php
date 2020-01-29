<?php

$idFilm = null;
if (!empty($_GET['idFilm']))
    $idFilm = $_REQUEST['idFilm'];

if ($idFilm == null)
    header('Location: index.php');


else {
    require_once 'database.php';
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM filmy where idFilm = ?";
    $q = $dbh->prepare($sql);
    $q->execute(array($idFilm));
    $data = $q->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przeglądaj film</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="span10 offset1">
        <div class="row">
            <h3>Dane filmu</h3>
        </div>

        <div class="form-group row">
            <label class="col-sm-3 control-label">Id filmu</label>
            <div class="col-sm-3">
                <label class="form-control" style="width: 400px;">
                    <?php echo $data['idFilm'];?>
                </label>
            </div>
        </div>
        <div class="control-group row">
            <label class=" col-sm-3 control-label">Tytuł</label>
            <div class="col-sm-3">
                <label class="form-control" style="width: 400px;">
                    <?php echo $data['nazwa'];?>
                </label>
            </div>
        </div>
        <div class="control-group row">
            <label class="col-sm-3 control-label">Reżyser</label>
            <div class="col-sm-3">
                <label class="form-control" style="width: 400px;">
                    <?php echo $data['rezyser'];?>
                </label>
            </div>
        </div>
        <div class="control-group row">
            <label class="col-sm-3 control-label">cena</label>
            <div class="col-sm-3">
                <label class="form-control" style="width: 400px;">
                    <?php echo $data['cena'];?>
                </label>
            </div>
        </div>
        <div class="form-actions">
            <a class="btn btn-info" href="index.php">Cofnij</a>
        </div>
</div>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>