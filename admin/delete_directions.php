<?php 
    include("../connexion_db.php");

$id = $_GET['del'];
$del= "DELETE FROM directions WHERE matricule_directions = '$id'";
$result = $pdo->prepare($del);
// $result->execute();

if($result->execute() === TRUE){
    echo " Direction supprimée  avec success";
    header('Location:home.php');
}else {
    echo "Erreur de suppression";
}


?>
