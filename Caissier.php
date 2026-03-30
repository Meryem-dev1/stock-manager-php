<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de stock</title>
    <link rel="stylesheet" href="index.css">

</head>
<body>
     <?php include "menu.php"?>
       
   <a href="ajouterCaissier.php" class="add">Ajouter</a>
    <table >
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Poste</th>
                <th>Admin</th>
                <th colspan="3">les actions</th>
            </tr>
        </thead>
       <?php
       
         require 'connexion.php';
         $requite="SELECT * FROM caissier";
         $query=mysqli_query($con,$requite);
         while($row=mysqli_fetch_assoc($query)){
           $id=$row['id'];
           echo "<tr>";
           echo "<td>".$row['id']."</td>";
           echo "<td>".$row['nom']."</td>";
           echo "<td>".$row['prenom']."</td>";
           echo "<td>".$row['poste']."</td>";
           echo "<td>".$row['admin']."</td>";
           echo "<td><a href='modifierCaissier.php?id=".$id."'><img src='image/edit.svg'</a></td>";
        echo "<td>
        <form method='post' action='deletecaissier.php'>
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
    </table>
        </div>
 </div>

</body>
</html>