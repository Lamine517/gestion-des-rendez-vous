<?php 


include("../connexion_db.php");


$id = $_GET['del'];
$del= "DELETE FROM personnes WHERE id_personnes = $id";
$result = $pdo->prepare($del);
// $result->execute();

if($result->execute() === TRUE){
    echo "Supprimer avec success";
    header('Location:home.php');
}else {
    echo "Erreur de suppression";
}
// if ($pdo->prepare($del) === TRUE) {
//     header('Location: accueil.php');
// }

?>
