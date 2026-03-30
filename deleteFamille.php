<?php
require 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $checkArticles = "SELECT COUNT(*) as count FROM article
     WHERE famille_id='$id'";
    $result = mysqli_query($con, $checkArticles);
    $row = mysqli_fetch_assoc($result);
    $articleCount = $row['count'];

    if ($articleCount > 0) {
        echo "Impossible de supprimer cette famille car elle est liée à des articles,si vous souhaitez supprimer cette famille,vous devez aller dans article  et le supprimer.";
    } else {
        $sql = "DELETE FROM famille  WHERE id='$id'";
        $query = mysqli_query($con, $sql);

        if ($query) {
            header("Location: famille.php");
            exit();
        } else {
            echo "Erreur de suppression";
        }
    }
} else {
    echo "Méthode non autorisée";
}
?>
