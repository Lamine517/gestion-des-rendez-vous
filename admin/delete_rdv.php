<?php 

include("../connexion_db.php");


$id = $_GET['del'];
$del= "DELETE FROM prendrerv WHERE id_users = $id";
// supp 1
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
