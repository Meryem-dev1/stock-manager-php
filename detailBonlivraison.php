<!DOCTYPE html>
<html lang="en">
<head>
<metacharset="UTF-8">
<metaname="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<link rel="stylesheet" href="add.css">
</head>
<body>

<?php
require "connexion.php";
 $id = isset($_GET['id']) ? $_GET['id'] : die("ID non spécifié");

 $req = mysqli_query($con, "SELECT * FROM bonlivraison  WHERE id = $id");

 
 if ($req&&mysqli_num_rows($req) > 0) {
    $row = mysqli_fetch_assoc($req);
?>
<div class="form">
<a href="bonlivraison.php" class="back_btn"><imgsrc="image/back.svg"> Retour</a>
<h2>Detail bonlivraison</h2>
<form action="" method="post">
<label for="caissier_id">CAISSIER :</label><br>
<select id="caissier_id" name="caissier_id">
<?php
require "connexion.php";
                $requete = "SELECT * FROM caissier";
                $query = mysqli_query($con, $requete);
while ($rowCaissier = mysqli_fetch_assoc($query)) {
echo "<option value='".$rowCaissier['id']."'>".$rowCaissier['nom']." ".$rowCaissier['prenom']."</option>";
                }
            ?>
</select><br>
<label for="client_id">CLIENT :</label><br>
<select id="client_id" name="client_id">
<?php
                $requete = "SELECT * FROM client";
                $query = mysqli_query($con, $requete);
while ($rowClient = mysqli_fetch_assoc($query)) {
echo "<option value='".$rowClient['id']."'>".$rowClient['nom']." ".$rowClient['prenom']."</option>";
                }
            ?>
</select><br>
<label for="date">DATE :</label>
<input type="text" name="date" value="<?= isset($row['date']) ? $row['date'] : '' ?>">
</form>
</div>

<?php
 } else {
echo "Aucun résultat trouvé pour l'ID spécifié.";
 }
?>

</body>
</html>
