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
           
           if(isset($date) && isset($montant) && isset($bl_id) && isset($mode_id)){
              
            include_once "connexion.php";
            
                $req = mysqli_query($con , "INSERT INTO reglement (date, montant, bl_id, mode_id) VALUES ('$date', '$montant','$bl_id','$mode_id')");
                if($req){
                    header("location: reglement.php");
                }else {
                    $message = "reglement non ajouté";
                }

           }else {
              
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="reglement.php" class="back_btn"><img src="image/back.svg"> Retour</a>
        <h2>Ajouter reglement</h2>
        <p class="erreur_message">
            <?php 
            
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="post">
          
            
            <input type="date" name="date" placeholder="Date">
            <input type="text" name="montant" placeholder="Montant">
            <label for="bl_id">bl_id</label>
            <select id="bl_id" name="bl_id">
            
            <?php
                require "connexion.php";
                        $requete = "SELECT * FROM bonlivraison";
                        $query = mysqli_query($con, $requete);
                 while ($row = mysqli_fetch_assoc($query)) {
                echo "<option>".$row['id']."</option>";
                        }
            ?>
        </select>
           
            <label for="mode_id">mode_id</label>
            <select id="mode_id" name="mode_id">
            
            <?php
                require "connexion.php";
                        $requete = "SELECT * FROM mode_reglement";
                        $query = mysqli_query($con, $requete);
                 while ($row = mysqli_fetch_assoc($query)) {
                echo "<option>".$row['id']."</option>";
                        }
            ?>
        </select>
            <input type="submit" value="Ajouter" name="button">
            <input type="reset" value="cancel" >
        </form>
    </div>
</body>
</html>
