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
           
           if(isset($designation,$prix_ht,$tva,$stock,$famille_id) ){
              
            include "connexion.php";
            
                $req = mysqli_query($con , "INSERT INTO article (designation, prix_ht, tva, stock, famille_id) VALUES ('$designation', '$prix_ht','$tva','$stock','$famille_id')");
                if($req){
                    header("location: article.php");
                }else {
                    $message = "Article non ajouté";
                }

           }else {
              
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="article.php" class="back_btn"><img src="image/back.svg"> Retour</a>
        <h2>Ajouter Article</h2>
        <p class="erreur_message">
            <?php 
            
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="post">
          
            
            <input type="text" name="designation" placeholder="Designation" >
            <input type="text" name="prix_ht" placeholder="Prix_ht">
            <input type="text" name="tva"  placeholder="TVA">
            <input type="text" name="stock"  placeholder="Stock">
            <label for="famille_id">famille_id</label>
            <select id="famille_id" name="famille_id">
            
                <?php
                    require "connexion.php";
                            $requete = "SELECT * FROM famille";
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
