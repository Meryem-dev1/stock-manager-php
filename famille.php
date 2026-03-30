<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de stock</title>
    <link rel="stylesheet" href="test.css">
   
</head>
<body>
    
    <?php include "menu.php" ?>
    <a href="ajouterFamille.php" class="add">Ajouter</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>famille</th>
                <th colspan="3">les actions</th>
            </tr>
        </thead>
<tbody>
    <?php
    require 'connexion.php';
    $requite = "SELECT * FROM famille";
    $query = mysqli_query($con, $requite);
    while ($row = mysqli_fetch_assoc($query)) {
        $id = $row['id'];
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['famille']."</td>";
        echo "<td>
                <a href='modifierFamille.php?id=".$id."'><img src='image/edit.svg'></a>
                </td>";
        echo "<td>
                <form method='post' action='deleteFamille.php'>
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
