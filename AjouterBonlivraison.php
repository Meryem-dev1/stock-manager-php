

<?php


include "connexion.php";

if (isset($_POST["button"])) {
    extract($_POST);

    if (isset($date) && isset($reglé) && isset($client_id) && isset($caissier_id)){
            $req = mysqli_query($con, "INSERT INTO bonlivraison (date, reglé, client_id, caissier_id) VALUES ('$date', '$reglé', '$client_id', '$caissier_id')");

            if ($req) {
                header("location: bonlivraison.php");
                exit(); 
            } else {
                $message = "bonlivraison non ajouté : " . mysqli_error($con);
            }
        }
    } else {
        $message = "Veuillez remplir tous les champs !";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Bonlivraison</title>
    <link rel="stylesheet" href="add.css">

    
    
</head>
<body>
    <div class="form">
        <a href="bonlivraison.php" class="back_btn"><img src="image/back.svg">Retour</a>
        <h2>AjouterBonlivraison</h2>
        <p class="erreur_message">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
        </p>
        <form action="" method="post">
           <input type="text" name='date' placeholder='date'>
           <input type="text" name='reglé' placeholder='reglé'>
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
            <input type="submit" value="Ajouter" name="button">
            <input type="reset" value="cancel">
        </form>
    </div> 
</body>
</html>

