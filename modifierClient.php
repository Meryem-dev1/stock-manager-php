<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Client</title>
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
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    

    if(!empty($nom) && !empty($prenom) && !empty($adresse) && !empty($ville)){
        $req = mysqli_query($con, "UPDATE client SET nom = '$nom', prenom = '$prenom', adresse = '$adresse', ville = '$ville' WHERE id = $id");
        if($req){
            header("location: client.php");
            exit;
        } else {
            $message = "client non modifié";
        }
    } else {
        $message = "Veuillez remplir tous les champs !";
    }
}

// Récupérer l'ID de l'URL
$id = isset($_GET['id']) ? $_GET['id'] : die("ID non spécifié");

$req = mysqli_query($con, "SELECT * FROM client WHERE id = $id");
$row = mysqli_fetch_assoc($req);

if(!$row) {
    die("client non trouvé");
}
?>
<div class="form">
    <a href="article.php" class="back_btn"><img src="image/back.svg"> Retour</a>
    <h2>Modifier client</h2>
    <p class="erreur_message"><?= $message ?></p>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="text" name="nom" placeholder="nom" value="<?= $row['nom'] ?>">
        <input type="text" name="prenom" placeholder="prenom" value="<?= $row['prenom'] ?>">
        <input type="text" name="adresse"  placeholder="adresse" value="<?= $row['adresse'] ?>">
        <input type="text" name="ville"  placeholder="ville" value="<?= $row['ville'] ?>">
        <input type="submit" value="enregistrer" name="button">
        <input type="reset" value="cancel">
    </form>
</div>
</body>
</html>
