<?php
require 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $checkReglement = "SELECT COUNT(*) as countReglement FROM reglement WHERE bl_id='$id'";
    $resultReglement = mysqli_query($con, $checkReglement);
    $rowReglement = mysqli_fetch_assoc($resultReglement);
    $reglementCount = $rowReglement['countReglement'];

    if ($reglementCount > 0) {
        echo "Impossible de supprimer cette Bonlivraison car elle est liée à des Reglement,si vous souhaitez supprimer cette bonlivraison,vous devez aller dans reglement et le supprimer.";
    } else {
       
        $deleteDetail = "DELETE FROM detail_bl WHERE bl_id='$id'";
        $queryDetail = mysqli_query($con, $deleteDetail);

        if ($queryDetail) {
           
            $deleteBonlivraisonSQL = "DELETE FROM bonlivraison WHERE id='$id'";
            $queryBonlivraison = mysqli_query($con, $deleteBonlivraisonSQL);

            if ($queryBonlivraison) {
                header("Location: bonlivraison.php");
                exit();
            } else {
                echo "Erreur de suppression de bonlivraison";
            }
        } else {
            echo "Erreur de suppression de detail_bl";
        }
    }
} else {
    echo "Méthode non autorisée";
}
?>
