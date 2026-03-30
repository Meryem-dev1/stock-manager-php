<?php
require 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
        $sql = "DELETE FROM reglement WHERE id='$id'";
        $query = mysqli_query($con, $sql);

        if ($query) {
            header("Location: reglement.php");
            
        } else {
            echo "Erreur de suppression";
        }
    }

?>
