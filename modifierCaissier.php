<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Caissier</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
<?php
include_once "connexion.php";

$message = '';

if(isset($_POST['button'])){
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $poste = $_POST['poste'];
    $admin = $_POST['admin'];
    

    if(!empty($nom) && !empty($prenom) && !empty($poste) && !empty($admin)){
        $req = mysqli_query($con, "UPDATE caissier SET nom = '$nom', prenom = '$prenom', poste = '$poste', admin = '$admin' WHERE id = $id");
        if($req){
            header("location: caissier.php");
            exit;
        } else {
            $message = "caissier non modifié";
        }
    } else {
        $message = "Veuillez remplir tous les champs !";
    }
}

// Récupérer l'ID de l'URL
$id = isset($_GET['id']) ? $_GET['id'] : die("ID non spécifié");

$req = mysqli_query($con, "SELECT * FROM caissier WHERE id = $id");
$row = mysqli_fetch_assoc($req);

if(!$row) {
    die("caissier non trouvé");
}
?>
<div class="form">
    <a href="article.php" class="back_btn"><img src="image/back.svg"> Retour</a>
    <h2>Modifier caissier</h2>
    <p class="erreur_message"><?= $message ?></p>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="text" name="nom" placeholder="nom" value="<?= $row['nom'] ?>">
        <input type="text" name="prenom" placeholder="prenom" value="<?= $row['prenom'] ?>">
        <input type="text" name="poste"  placeholder="poste" value="<?= $row['poste'] ?>">
        <input type="text" name="admin"  placeholder="admin" value="<?= $row['admin'] ?>">
        <input type="submit" value="enregistrer" name="button">
        <input type="reset" value="cancel">
    </form>
</div>
</body>
</html>
