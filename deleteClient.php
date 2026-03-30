<?php
require 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $checkArticles = "SELECT COUNT(*) as count FROM bonlivraison WHERE client_id='$id'";
    $result = mysqli_query($con, $checkArticles);
    $row = mysqli_fetch_assoc($result);
    $articleCount = $row['count'];

    if ($articleCount > 0) {
        echo "Impossible de supprimer ce client car il est liée à des bonlivraison,si vous souhaitez supprimer ce client,vous devez aller dans bonlivraison  et le supprimer.";
    } else {
        $sql = "DELETE FROM client WHERE id='$id'";
        $query = mysqli_query($con, $sql);

        if ($query) {
            header("Location: client.php");
            exit();
        } else {
            echo "Erreur de suppression";
        }
    }
} else {
    echo "Méthode non autorisée";
}
?>
