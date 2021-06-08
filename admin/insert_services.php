<?php

    include("../connexion_db.php");

    if(isset($_POST['matricule_services'],$_POST['libelle_services'],$_POST['matricule_directions'])){


        $matserv = $_POST['matricule_services'];
        $lib = $_POST['libelle_services'];
        $matdir = $_POST['matricule_directions'];

        $insert = "INSERT INTO services(matricule_services,libelle_services,matricule_directions) VALUES (?,?,?)";

        $result = $pdo->prepare($insert);
        $result->execute([$matserv,$lib,$matdir]);

        header('Location:home');

    }
?>