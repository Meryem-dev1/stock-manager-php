<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bonlivraison</title>
    <link rel="stylesheet" href="test.css">
   
</head>
<body>
<?php include "menu.php"?>
<table>
        <thead>
            <tr>
                <th>Id</th>
                <th>date</th>
                <th>caissier</th>
                <th>client</th>
                <th colspan="3">Les action</th>
                
            </tr>
        </thead>
        <tbody id="tableBody">
           <?php
                require "connexion.php";
                $requete = "SELECT bonlivraison.id, bonlivraison.date, caissier.nom 
                as nomCaissier,caissier.prenom as prenomCaissier, client.nom 
                as nomClient,client.prenom as prenomClient FROM client INNER JOIN
                 bonlivraison ON client.id = bonlivraison.client_id INNER JOIN 
                 caissier on  bonlivraison.caissier_id =caissier.id " ;
                $query = mysqli_query($con, $requete);
                while ($row = mysqli_fetch_assoc($query)) {
                    $id=$row['id'];
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['date']."</td>";
                    echo "<td>".$row['nomCaissier']." ".$row['prenomCaissier']."</td>";
                    echo "<td>".$row['nomClient']." ".$row['prenomClient']."</td>";
                    echo "<td><a href='detailBonlivraison.php?id=".$id."'><img src='image/detail2.jpg'></a></td>";
                    echo "<td><a href='modifierBonlivraison.php?id=".$id."'><img src='image/edit.svg'></a></td>";
                    echo "<td>
                    <form method='post' action='deleteBonlivraison.php'>
                    <input type='hidden' name='id' value='".$id."'>
                    <button type='submit' onclick=\"return confirm('Êtes-vous sûr de supprimer cet enregistrement ?')\">
                        <img src='image/del.svg'>
                    </button>
                   </form>
                    </td>";
                    echo "</tr>";
                }
                
            ?>
        </tbody>
        </body>
        </html>

       