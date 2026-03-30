
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modier</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
<?php
include_once "connexion.php";

$message = '';

if (isset($_POST['button'])) {
    $id = $_POST['id'];
    $date = $_POST['date'];
    $montant = $_POST['montant'];
    $bl_id = $_POST['bl_id'];
    $mode_id = $_POST['mode_id'];

    $bl_check_query = "SELECT id FROM bonlivraison WHERE id = $bl_id";
    $bl_check_result = mysqli_query($con, $bl_check_query);

    if (mysqli_num_rows($bl_check_result) > 0) {
      
        $stmt = mysqli_prepare($con, "UPDATE reglement SET date = ?, montant = ?, bl_id = ?, mode_id = ? WHERE id = ?");
mysqli_stmt_bind_param($stmt, "ssiii", $date, $montant, $bl_id, $mode_id, $id);

        if (mysqli_stmt_execute($stmt)) {
            header("location: reglement.php");
            exit;
        } else {
            $message = "Reglement non modifié. Erreur : " . mysqli_error($con);
        }

mysqli_stmt_close($stmt);
    } else {
        $message = "Le bl_id spécifié n'existe pas dans la table bonlivraison.";
    }
}


$id = isset($_GET['id']) ? $_GET['id'] : die("ID non spécifié");

$req = mysqli_query($con, "SELECT * FROM reglement WHERE id = $id");
$row = mysqli_fetch_assoc($req);

if (!$row) {
    die("Reglement non trouvé");
}
?>

<div class="form">
<a href="reglement.php" class="back_btn"><imgsrc="image/back.svg"> Retour</a>
<h2>Modifier reglement</h2>
<p class="erreur_message"><?= $message ?></p>
<form action="" method="post">
<input type="hidden" name="id" value="<?= $id ?>">
<input type="date" name="date" placeholder="date" value="<?= $row['date'] ?>">
<input type="number" name="montant" placeholder="montant" value="<?= $row['montant'] ?>">


<label for="bl_id">bl_id</label>
<select id="bl_id" name="bl_id">
<?php
                $requete = "SELECT * FROM bonlivraison";
                $query = mysqli_query($con, $requete);
while ($bl_row = mysqli_fetch_assoc($query)) {
                    $selected = ($bl_row['id'] == $row['bl_id']) ? 'selected' : '';
echo "<option value='" . $bl_row['id'] . "' $selected>" . $bl_row['id'] . "</option>";
                }
                ?>
</select>

<label for="mode_id">mode_id</label>
<select id="mode_id" name="mode_id">
<?php
                $requete = "SELECT * FROM mode_reglement";
                $query = mysqli_query($con, $requete);
while ($mode_row = mysqli_fetch_assoc($query)) {
                    $selected = ($mode_row['id'] == $row['mode_id']) ? 'selected' : '';
echo "<option value='" . $mode_row['id'] . "' $selected>" . $mode_row['id'] . "</option>";
                }
                ?>
</select>
<input type="submit" value="enregistrer" name="button">
<input type="reset" value="cancel">
</form>
</div>
</body>
</html>
