<?php

include("connexion_db.php");
 $id = $_GET['edit'];

$id_users = $_POST['id_users'];
$pre = $_POST['prenom'];
$nom = $_POST['nom'];
$mail = $_POST['Email'];
$pass = $_POST['passwrd'];
$tel = $_POST['telephone'];
$profil =$_FILES["profil"]["name"];



$update = "UPDATE users SET id_users=$id_users,prenom='$pre',nom='$nom',Email='$mail',passwrd='$pass',telephone=$tel,profil='$profil'  WHERE id_users = $id";
$result = $pdo->prepare($update);
$result->execute();
if($result){
    echo "<div style='color:blue'><h1>modification avec succes</h1></div>";
    header('Location: profil.php');
}else{
    echo "<div style='color:red'><h1>Erreur de modification</h1></div>";
}



?>