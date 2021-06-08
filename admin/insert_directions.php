<?php

    include("../connexion_db.php");

    if(isset($_POST['matricule_directions'],$_POST['libelle_directions'])){


        $matdir = $_POST['matricule_directions'];
        $lib = $_POST['libelle_directions'];

        $insert = "INSERT INTO directions(matricule_directions,libelle_directions) VALUES (?,?)";

        $result = $pdo->prepare($insert);
        $result->execute([$matdir,$lib]);

        header('Location:home');

    }
?>