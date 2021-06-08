<?php

    include("connexion_db.php");
    session_start();
    // $_SESSION['prenom'] = $mat;


    if(isset($_POST['Date_RV'],$_POST['Heure_Deb'],$_POST['Heure_Fin'],$_POST['Objet'],$_POST['destinataire'],$_POST['id_personnes'])){

        $date = $_POST['Date_RV'];
        $hd = $_POST['Heure_Deb'];
        $hf = $_POST['Heure_Fin'];
        $objet = $_POST['Objet'];
        $dest = $_POST['destinataire'];
        $mat = $_POST['id_users'];
        $pers = $_POST['id_personnes'];

        $insert = "INSERT INTO prendrerv VALUES (?,?,?,?,?,?,?)";

        $result = $pdo->prepare($insert);
        $result->execute([$date,$hd,$hf,$objet,$dest,$mat,$pers]);

        header('Location:index.php');

    }
?>