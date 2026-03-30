<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mode reglement</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
<?php
include_once "connexion.php";

$message = '';

if(isset($_POST['button'])){
    $id = $_POST['id'];
    $mode= $_POST['mode'];

    if(!empty($mode)){
        $req = mysqli_query($con, "UPDATE mode_reglement SET mode = '$mode' WHERE id = $id");
        if($req){
            header("location: modereglement.php");
            exit;
        } else {
            $message = "mode reglement non modifié";
        }
    } else {
        $message = "Veuillez remplir tous les champs !";
    }
}

// Récupérer l'ID de l'URL
$id = isset($_GET['id']) ? $_GET['id'] : die("ID non spécifié");

$req = mysqli_query($con, "SELECT * FROM mode_reglement  WHERE id = $id");
$row = mysqli_fetch_assoc($req);

if(!$row) {
    die("mode_reglement non trouvé");
}
?>
<div class="form">
    <a href="modereglement.php" class="back_btn"><img src="image/back.svg"> Retour</a>
    <h2>Modifier mode reglement</h2>
    <p class="erreur_message"><?= $message ?></p>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="text" name="mode" placeholder="mode" value="<?= $row['mode'] ?>">

        <input type="submit" value="enregistrer" name="button">
        <input type="reset" value="cancel">
    </form>
</div>
</body>
</html>
