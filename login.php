<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "connexion.php";

if (isset($_POST['nom']) && isset($_POST['PASSWORD'])) {
    $uname = $_POST['nom'];
    $pass = $_POST['PASSWORD'];

    if (empty($uname)) {
        header("Location: index.php?error=User Name is required");
        exit();
    } elseif (empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT id, nom, PASSWORD FROM caissier WHERE nom='$uname' AND PASSWORD='$pass'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_assoc($result);
            if ($row['nom'] === $uname && $row['PASSWORD'] === $pass) {
               
               
                header("Location: article.php");
                exit();
            } else {
                header("Location: index.php?error=Incorrect User name or password");
                exit();
            }
        } else {
            header("Location: index.php?error=Incorrect User name or password");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
