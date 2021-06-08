<?php

include("../connexion_db.php");
 $id = $_GET['edit'];

$mat = $_POST['id_personnes'];
$nom = $_POST['Nom'];
$pre = $_POST['Prenom'];
$mail = $_POST['Email'];
$tel = $_POST['Numtel'];
$adr = $_POST['Adresse'];
$spec =$_POST['Specialiste'];
$matser = $_POST['matricule_services'];
$pass = $_POST['passwrd'];

$update = "UPDATE personnes SET id_personnes=$mat,Nom='$nom',Prenom='$pre',Email='$mail',Numtel=$tel,Adresse='$adr',Specialiste='$spec',matricule_services='$matser',passwrd='$pass' WHERE id_personnes = $id";
$result = $pdo->prepare($update);
$result->execute();
if($result){
    echo "<div style='color:blue'><h1>modification avec succes</h1></div>";
    header('Location: home.php');
}else{
    echo "<div style='color:red'><h1>Erreur de modification</h1></div>";
}



?>