<?php
    session_start();
    require_once 'database.php';
    $idFilm = null;
    if (!empty($_GET['idFilm']))
        $idFilm = $_REQUEST['idFilm'];

    if ($idFilm == null)
        header('Location: index.php');

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM filmy WHERE idFilm=?";
    $q = $dbh->prepare($sql);
    try {
        $q->execute(array($idFilm));
    } catch (Exception $e) {
        echo 'Rekord posaida klucz obcy! Nie można usunąć';
        exit();
    }

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
                <input type="hidden" name="indeks" value="<?php echo $idFilm;?>"/>
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