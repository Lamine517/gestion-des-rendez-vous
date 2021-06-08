<?php 
    include("../connexion_db.php");

$id = $_GET['del'];
$del= "DELETE FROM services WHERE matricule_services = '$id'";
$result = $pdo->prepare($del);
$result->execute();

if($result->execute() === TRUE){
    echo "Service supprimé avec success";
    header('Location:home.php');
}else {
    echo "Erreur de suppression";
}


?>
