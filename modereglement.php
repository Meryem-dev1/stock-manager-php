<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de stock</title>
    <link rel="stylesheet" href="index.css">

</head>
<body>
   <?php  include "menu.php" ?>
   <a href="ajouterModeReglement.php" class="add">Ajouter</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Mode</th>
                <th colspan="2">les actions</th>
            </tr>
        </thead>
       <?php
       
         require 'connexion.php';
         $requite="SELECT * FROM mode_reglement";
         $query=mysqli_query($con,$requite);
         while($row=mysqli_fetch_assoc($query)){
           $id=$row['id'];
           echo "<tr>";
           echo "<td>".$row['id']."</td>";
           echo "<td>".$row['mode']."</td>";
           echo "<td><a href='modifierModeReglement.php?id=".$id."'><img src='image/edit.svg'</a></td>";
            echo "<td>
            <form method='post' action='deleteModeReglement.php'>
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



</body>
</html>