<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Article</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
<?php
include_once "connexion.php";

$message = '';

if(isset($_POST['button'])){
    $id = $_POST['id'];
    $designation = $_POST['designation'];
    $prix_ht = $_POST['prix_ht'];
    $tva = $_POST['tva'];
    $stock = $_POST['stock'];
    $famille_id = $_POST['famille_id'];

    if(!empty($designation) && !empty($prix_ht) && !empty($tva) && !empty($stock) && !empty($famille_id)){
        $req = mysqli_query($con, "UPDATE article SET designation = '$designation', prix_ht = '$prix_ht', tva = '$tva', stock = '$stock', famille_id = '$famille_id' WHERE id = $id");
        if($req){
            header("location: article.php");
            exit;
        } else {
            $message = "Article non modifié";
        }
    } else {
        $message = "Veuillez remplir tous les champs !";
    }
}


$id = isset($_GET['id']) ? $_GET['id'] : die("ID non spécifié");

$req = mysqli_query($con, "SELECT * FROM article WHERE id = $id");
$row = mysqli_fetch_assoc($req);

if(!$row) {
    die("Article non trouvé");
}
?>
<div class="form">
    <a href="article.php" class="back_btn"><img src="image/back.svg"> Retour</a>
    <h2>Modifier Article</h2>
    <p class="erreur_message"><?= $message ?></p>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="text" name="designation" placeholder="Designation" value="<?= $row['designation'] ?>">
        <input type="number" name="prix_ht" placeholder="Prix_ht" value="<?= $row['prix_ht'] ?>">
        <input type="number" name="tva"  placeholder="TVA" value="<?= $row['tva'] ?>">
        <input type="number" name="stock"  placeholder="Stock" value="<?= $row['stock'] ?>">
        
        <label for="famille_id">Famille_id</label>

        <select id="famille_id" name="famille_id">
            <?php
                require "connexion.php";
                            $requete = "SELECT * FROM famille";
                            $query = mysqli_query($con, $requete);
                while ($row = mysqli_fetch_assoc($query)) {
                echo "<option value='".$row['id']."'>".$row['id']. "</option>";
                            }
            ?>
        </select>
        <input type="submit" value="enregistrer" name="button">
        <input type="reset" value="cancel">
    </form>
</div>
</body>
</html>
