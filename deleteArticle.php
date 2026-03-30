<?php
require 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $checkArticles = "SELECT COUNT(*) as count FROM detail_bl WHERE article_id='$id'";
    $result = mysqli_query($con, $checkArticles);
    $row = mysqli_fetch_assoc($result);
    $articleCount = $row['count'];

    if ($articleCount > 0) {
        echo "Impossible de supprimer cette article car elle est liée avec detail_bl, si vous souhaitez supprimer ce produit,vous devez aller dans detail_bl  et le supprimer.";
    } else {
        $sql = "DELETE FROM article WHERE id='$id'";
        $query = mysqli_query($con, $sql);

        if ($query) {
            header("Location: article.php");
            exit();
        } else {
            echo "Erreur de suppression";
        }
    }
} else {
    echo "Méthode non autorisée";
}
?>
