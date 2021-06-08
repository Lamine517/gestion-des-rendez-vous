<?php
// // Importez les classes PHPMailer dans l'espace de noms global 
// // Celles-ci doivent être en haut de votre script, pas dans une fonction 
// use  PHPMailer \ PHPMailer \ PHPMailer ;
// use  PHPMailer \ PHPMailer \ SMTP ;
// use  PHPMailer \ PHPMailer \ Exception ;

// // Charger l'autochargeur de Compositeur 
// require  'phpmailer/vendor/autoload.php' ;

// // L'instanciation et le passage de «true» activent les exceptions 
// $mail = new  PHPMailer(true);

// if(isset($_POST['sendmail'])) {
//      // Paramètres du serveur 
//     //$mail ->SMTPDebug = 1;                      // Activer la sortie de débogage détaillée 
//     $mail -> isSMTP ();                                            // Envoi en utilisant SMTP 
//     $mail ->Host= 'smtp.gmail.com' ;                     // Définit le serveur SMTP pour qu'il envoie via 
//     $mail ->SMTPAuth = true ;                                   // Activer l'authentification SMTP 
//     $mail->SMTPSecure='tls';

//     $mail->Username='isepdd197@gmail.com';
//     $mail->Password='isep2020';         // Activer le cryptage TLS; `PHPMailer :: ENCRYPTION_SMTPS` encouragé 
//     $mail ->Port = 587 ;                                    // Port TCP auquel se connecter, utilisez 465 pour `PHPMailer :: ENCRYPTION_SMTPS` ci-dessus

//     // Destinataires 
//     $mail->setFrom($_POST['mail'],$_POST['name']);
//     $mail->addAddress('isepdd197@gmail.com');     // Ajout d'un destinataire 
//                    // Le nom est facultatif 
//     $mail->addReplyTo('isepdd197@gmail.com');
//     //$mail->addAttachement($_FILES['file']['tmp_name'],$_FILES['file']['name']);
    
//     // Contenu 
//     $mail -> isHTML(true);                                  // Définit le format de l'e-mail sur HTML 
//     $mail ->Subject = $_POST['subject'];
//     $mail ->Body= "Je me nomme".$_POST['name']." <br><br> ".$_POST['Objet'] ;

//     //$mail ->Body     = '<div  style="border:2px solid red;">Ceci est le corps du message HTML <b> en gras! frer cool </b>' ;
//     $mail ->AltBody = $_POST['Objet'] ;
//     if(!$mail->send()){
//         echo "Erreur d'envoie";
//         echo "Message d'Erreur :".$mail->ErrorInfo;
//     }else{
//         echo "Votre message a été envoyé avec succes";
//     }


// }
?>
<?php include("nav.php"); include_once("connexion_db.php") ?>
<html>
    <head>
        <title>Gestion de RDV</title>
        <link rel="stylesheet"  href="css/style2.css">
        <link rel="stylesheet"  href="css/styleRDV.css">
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
    <form  action="insert_contact.php" method="post">
    <h3><i>Formulaire de Contact</i></h3><hr/><br><br>
        <div>
            <label for="name"> <b>Nom et Prénom (obligatoire) </b></label></br>
            <input type="text"  name="name" placeholder="Nom et Prénom">
        </div></br>
       
        <div>
            <label for="mail"><b>Votre e-mail(obligatoire)</b></label></br>
            <input type="text"  name="mail" placeholder="ex : axz@gmail.com"> </br></br>
           </div>
        <div>
            <label for="subject"><b>Sujet</b></label></br>
            <input type="text"  name="subject" placeholder="Sujet"> </br></br>
        </div>

        <div>
        <label for="object"><b>Votre Message</b></label></br>
            <textarea type="text"  name="Objet" cols="50" rows="10" placeholder="Votre message"></textarea></br></br>
        </div>

       <button type="submit" class="btn" value="beusseul" name="sendmail">Envoyer</button>
                   
        </form>
        <div class="alert" style="width:35%;margin-left:16cm">
            <h4> Adresse : Diamniadio,Cité du savoir, Arrondissement 1 Pôle urbain de Diamniadio </h4><br>
            <h4> Téléphone : +221 33 864 68 67 </h4><br>
            <h4> Adresse email :contact@isepdiamniadio.com </h4>
    
    </div>

  
       
  </body>
</html>