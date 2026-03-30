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
           
           if(isset($mode)){
              
            include_once "connexion.php";
            
                $req = mysqli_query($con , "INSERT INTO mode_reglement (mode) VALUES ('$mode')");
                if($req){
                    header("location: modereglement.php");
                }else {
                    $message = "mode reglement non ajouté";
                }

           }else {
              
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>
    <div class="form">
        <a href="modereglement.php" class="back_btn"><img src="image/back.svg"> Retour</a>
        <h2>Ajouter mode reglement</h2>
        <p class="erreur_message">
            <?php 
            
            if(isset($message)){
                echo $message;
            }
            ?>

        </p>
        <form action="" method="post">
          
            
            <input type="text" name="mode" placeholder="Mode">
            <input type="submit" value="Ajouter" name="button">
            <input type="reset" value="cancel" >
        </form>
    </div>
</body>
</html>
