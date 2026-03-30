<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
    <?php
       if(isset($_POST['button'])){
        
           extract($_POST);
           
           if(isset($nom) && isset($prenom) && isset($adresse) && isset($ville) ){
              
           include "connexion.php";
            
                $req = mysqli_query($con , "INSERT INTO client (nom, prenom, adresse, ville) VALUES ('$nom', '$prenom','$adresse','$ville')");
                if($req){
                    header("location: client.php");
                }else {
                    $message = "client non ajouté";
                }

           }else {
              
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="client.php" class="back_btn"><img src="image/back.svg"> Retour</a>
        <h2>Ajouter client</h2>
        <p class="erreur_message">
            <?php 
            
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="post">
          
            
            <input type="text" name="nom" placeholder="Nom">
            <input type="text" name="prenom" placeholder="Prenom">
            <input type="text" name="adresse"  placeholder="adresse">
            <input type="text" name="ville"  placeholder="Ville">
            <input type="submit" value="Ajouter" name="button">
            <input type="reset" value="cancel" >
        </form>
    </div>
</body>
</html>
