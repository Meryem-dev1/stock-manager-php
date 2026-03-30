<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reglement</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php include "menu.php"?>
    <a href="ajouterReglement.php" class="add">Ajouter</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Date</th>
                <th>Montant</th>
                <th>bl_id</th>
                <th>mode_id</th>
                <th colspan="3">les actions</th>
            </tr>
        </thead>
        <?php
           require "connexion.php";
           $requete="SELECT * FROM reglement";
           $query=mysqli_query($con,$requete);
           while($row=mysqli_fetch_assoc($query)){
            $id=$row['id'];
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['date']."</td>";
            echo "<td>".$row['montant']."</td>";
            echo "<td>".$row['bl_id']."</td>";
            echo "<td>".$row['mode_id']."</td>";
            echo "<td><a href='modifierReglement.php?id=".$id."'><img src='image/edit.svg'</a></td>";
            echo "<td>
            <form method='post' action='deleteReglement.php'>
            <input type='hidden' name='id' value='".$id."'>
            <button type='submit' onclick=\"return confirm('Êtes-vous sûr de supprimer cet enregistrement ?')\">
                <img src='image/del.svg'>
            </button>
           </form>
            </td>";
        
            echo "</tr>";
        }
           
        ?>
</body>
</html>