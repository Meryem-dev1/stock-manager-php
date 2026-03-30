<?php
require 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $checkArticles = "SELECT COUNT(*) as count FROM reglement WHERE mode_id='$id'";
    $result = mysqli_query($con, $checkArticles);
    $row = mysqli_fetch_assoc($result);
    $articleCount = $row['count'];

    if ($articleCount > 0) {
        echo "Impossible de supprimer cette mode reglement car elle est liée à des reglement.si vous souhaitez supprimer cette mode reglement,vous devez aller dans reglement  et le supprimer.";
    } else {
        $sql = "DELETE FROM mode_reglement WHERE id='$id'";
        $query = mysqli_query($con, $sql);

        if ($query) {
            header("Location: modereglement.php");
            exit();
        } else {
            echo "Erreur de suppression";
        }
    }
} else {
    echo "Méthode non autorisée";
}
?>
