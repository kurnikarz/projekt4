<?php
session_start();
require_once 'database.php';
$idZamowienia = null;
if (!empty($_GET['idZamowienia']))
    $idZamowienia = $_REQUEST['idZamowienia'];

if ($idZamowienia == null)
    header('Location: index.php');

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "DELETE FROM zamowienia WHERE idZamowienia=?";
$q = $dbh->prepare($sql);
$q->execute(array($idZamowienia));
$_SESSION['usunieto'] = true;

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
            <h2>Czy na pewno chcesz usunąć ten film?</h2>
            <hr>
            <br>
            <form method="post" action="delete.php">
                <input type="hidden" name="indeks" value="<?php echo $idZamowienia;?>"/>
                <p class="alert alert-error">Czy chcesz napewno usunąc rekord ?</p>
                <div class="form-actions">
                    <button type="submit" class="btn btn-danger">Tak</button>
                    <a class="btn " href="index.php">Nie</a>
                </div>
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