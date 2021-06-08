<?php

    include("connexion_db.php");

    if(isset($_POST['name'],$_POST['mail'],$_POST['subject'],$_POST['Objet'])){

        $name = $_POST['name'];
        $mail = $_POST['mail'];
        $sub= $_POST['subject'];
        $ob = $_POST['Objet'];
        $date = date('Y-m-d H:i:s');
       
        $insert = "INSERT INTO contact(name,mail,subject,Objet,date_envoie) VALUES ('$name','$mail','$sub','$ob','$date')";
        $result = $pdo->prepare($insert);
        $result->execute([$name,$mail,$sub,$ob,$date]);

        header('Location:index.php');

    }else { 
 
        header('HTTP/1.1 500 Désolé allez boire du café et revenir 😒😒!');
        exit();
}
?>
