<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Bonlivraison</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
<?php
include "connexion.php";
$message = '';  
$id = isset($_POST['id']) ? $_POST['id'] : '';
$date = isset($_POST['date']) ? $_POST['date']  : '';
$caissier = isset($_POST['caissier_id']) ? $_POST['caissier_id'] : '';
$client = isset($_POST['client_id']) ? $_POST['client_id'] : '';

 
if(isset($_POST['button'])){
    if(!empty($date ) && !empty($caissier) && !empty($client)){
        $req = mysqli_query($con, "UPDATE bonlivraison SET date = '$date', caissier_id = '$caissier', client_id = '$client' WHERE id = $id");
        if($req){
            header("location: bonlivraison.php");
            exit;
        } else {
            $message = "bonlivraison non modifié";
        }
    } else {
        $message = "Veuillez remplir tous les champs !";
    }
}

$id = isset($_GET['id']) ? $_GET['id'] : die("ID non spécifié");

$req = mysqli_query($con, "SELECT * FROM bonlivraison  WHERE id = $id");
$row = mysqli_fetch_assoc($req);

if(!$row) {
    die("client non trouvé");
}
?>
<div class="form">
    <a href="bonlivraison.php" class="back_btn"><img src="image/back.svg"> Retour</a>
    <h2>Modifier bonlivraison</h2>
    <p class="erreur_message"><?= $message ?></p>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="text" name="date" placeholder="date" value="<?= $row['date'] ?>">
        <label for="caissier_id">Caissier :</label><br>
        <select id="caissier_id" name="caissier_id">
        <?php
        require "connexion.php";
            $requete = "SELECT * FROM caissier";
            $query = mysqli_query($con, $requete);
        while ($row = mysqli_fetch_assoc($query)) {
        echo "<option value='".$row['id']."'>".$row['nom']." ".$row['prenom']."</option>";
            }
        ?>
       </select>
       <label for="client_id">Client :</label><br>
       <select id="client_id" name="client_id">
       <?php
         require "connexion.php";
            $requete = "SELECT * FROM client";
            $query = mysqli_query($con, $requete);
         while ($row = mysqli_fetch_assoc($query)) {
        echo "<option value='".$row['id']."'>".$row['nom']." ".$row['prenom']."</option>";
            }
        ?>
      </select>
        <input type="submit" value="enregistrer" name="button">
        <input type="reset" value="cancel">
    </form>
</div>
</body>
</html>


 

