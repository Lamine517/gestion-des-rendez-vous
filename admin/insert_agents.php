<?php

    include("../connexion_db.php");

    if(isset($_POST['id_personnes'],$_POST['Nom'],$_POST['Prenom'],$_POST['Email'],$_POST['Numtel'],$_POST['Adresse'],$_POST['Specialiste'],$_POST['matricule_services'],$_POST['passwrd'])){


        $mat = $_POST['id_personnes'];
        $nom = $_POST['Nom'];
        $pre = $_POST['Prenom'];
        $mail = $_POST['Email'];
        $tel = $_POST['Numtel'];
        $adr = $_POST['Adresse'];
        $spec = $_POST['Specialiste'];
        $matserv= $_POST['matricule_services'];
        $pass = $_POST['passwrd'];

        $insert = "INSERT INTO personnes(id_personnes,Nom,Prenom,Email,Numtel,Adresse,Specialiste,matricule_services,passwrd) VALUES (?,?,?,?,?,?,?,?,?)";

        $result = $pdo->prepare($insert);
        $result->execute([$mat,$nom,$pre,$mail,$tel,$adr,$spec,$matserv,$pass]);

        header('Location:home.php');

    }
?>