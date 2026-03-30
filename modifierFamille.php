<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier famille</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
<?php
include_once "connexion.php";

$message = '';

if(isset($_POST['button'])){
    $id = $_POST['id'];
    $famill= $_POST['famille_cl'];

    if(!empty($famill)){
        $req = mysqli_query($con, "UPDATE famille SET famille_cl = '$famill' WHERE id = $id");
        if($req){
            header("location: famille.php");
            exit;
        } else {
            $message = "Article non modifié";
        }
    } else {
        $message = "Veuillez remplir tous les champs !";
    }
}

// Récupérer l'ID de l'URL
$id = isset($_GET['id']) ? $_GET['id'] : die("ID non spécifié");

$req = mysqli_query($con, "SELECT * FROM famille  WHERE id = $id");
$row = mysqli_fetch_assoc($req);

if(!$row) {
    die("famille non trouvé");
}
?>
<div class="form">
    <a href="famille.php" class="back_btn"><img src="image/back.svg"> Retour</a>
    <h2>Modifier famille</h2>
    <p class="erreur_message"><?= $message ?></p>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="text" name="famille_cl" placeholder="famille" value="<?= $row['famille_cl'] ?>">

        <input type="submit" value="enregistrer" name="button">
        <input type="reset" value="cancel">
    </form>
</div>
</body>
</html>
