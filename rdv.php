<?php
// Importez les classes PHPMailer dans l'espace de noms global 
// Celles-ci doivent être en haut de votre script, pas dans une fonction 
use  PHPMailer \ PHPMailer \ PHPMailer ;
use  PHPMailer \ PHPMailer \ SMTP ;
use  PHPMailer \ PHPMailer \ Exception ;

// Charger l'autochargeur de Compositeur 
require  'vendor/autoload.php' ;
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
// require 'vendor/phpmailer/phpmailer/language/phpmailer.lang-fr';
$mail = new  PHPMailer(true);
if(isset($_POST['sendmail']))
{
 
// require 'vendor/phpmailer/phpmailer/language/phpm
    // Paramètres du serveur
    $mail -> SMTPDebug = SMTP :: DEBUG_SERVER ; // Activer la sortie de débogage détaill
    $mail -> isSMTP(); // Envoi en utilisant SMTP
    $mail -> Host = 'smtp.example.com' ; // Définit le serveur SMTP pour qu'il env
    $mail -> SMTPAuth = true ; // Activer l'authentification SMTP
    $mail-> Username='isepdd197@gmail.com'; // Nom d'utilisateur SMTP
    $mail -> Password='isep2020' ; // Mot de passe SMTP 
    $mail -> SMTPSecure = PHPMailer :: ENCRYPTION_STARTTLS ; // Activer le cryptage TLS
    $mail -> Port = 587 ; // Port TCP auquel se connecter, utilisez
    // Pour charger la version française
    // $mail -> setLanguage ( 'fr' , '/ optional / path / to / language / directory /' );
    // Destinataires
    $mail -> setFrom ('isepdd197@gmail.com','Gestions de Rendez-Vous');
    $mail -> addAddress ($_POST['destinataire']); // Ajout d'un destinataire
    // $mail -> addAddress ( 'ellen@example.com' ); // Le nom est facultatif
    $mail -> addReplyTo ( 'diemelamine398@gmail.com' , 'Information' );
    // $mail -> addCC ( 'cc@example.com' );
    // $mail -> addBCC ( 'bcc@example.com' ); // Pièces jointes 
    // $mail -> addAttachment ( '/var/tmp/file.tar.gz' );
    $mail -> isHTML(true);                                  // Définit le format de l'e-mail sur HTML 
    $mail ->Subject = $_POST['subject'];
    $mail ->Body= "J'aimerais prendre un rendez-vous à la du ".$_POST['Date_RV']." entre ".$_POST['Heure_Deb']." et ".$_POST['Heure_Fin']."  <br><br>".$_POST['Objet'] ;

    //$mail ->Body     = '<div  style="border:2px solid red;">Ceci est le corps du message HTML <b> en gras! frer cool </b>' ;
    $mail ->AltBody = $_POST['Objet'] ;
    if(!$mail->send()){
        echo "Erreur d'envoie";
        echo "Message d'Erreur :".$mail->ErrorInfo;
    }else{
        echo "Votre message a été envoyé avec succes";
    }
}
?>
<?php include("nav.php"); ?>
<html>
    <head>
        <title>Gestion de RDV</title>
        <link rel="stylesheet"  href="style2.css">
        <link rel="stylesheet"  href="styleRDV.css">
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>

    
    <div class="alert"><h4> 🚫Si votre nom ne se figure pas sur la liste ,allez creer un compte avant de prendre un rendez-vous❗❗❗</h4></div>

    
    <form  method="post">
    <!-- action="insertRDV.php" -->
    <h3><i>Formulaire de Demande de Rendez-vous</i></h3><hr/><br><br>
      

        <div>
            <h4><i>Veuillez vous identifier </i></h4><br>
            <select id="select" name="id_users">
            <option selected ></option>
                    <?php
                    include("connexion_db.php");
                    $req = "SELECT * FROM users";
                    $result = $pdo->prepare($req);
                    $result->execute();

                    while($pers = $result->fetch(PDO::FETCH_ASSOC)){

                        ?>

                        <option value="<?= $pers['id_users'] ;?>"><?= strtoupper($pers['prenom']." ".$pers['nom']); ?></option>
                <?php  } ?>
            </select>
        
        </div>
      

        <div>
            <label for="Date_RV"><b>Date </b> </label></br>
            <input type="date" id="Date_RV" name="Date_RV" placeholder="Date"> </br></br>
        </div>
        <div>
            <label for="Heure_Deb">Heure Debut </label>
            <input type="time" id="Heure_Deb" name="Heure_Deb" placeholder="Heure Debut">
            &nbsp; &nbsp;&nbsp;&nbsp;--🕐--&nbsp;

            <label for="Heure_Fin">Heure Fin </label>
            <input type="time" id="Heure_Fin" name="Heure_Fin" placeholder="Heure Fin">
        </div></br>
       
        <div>
            <label for="destinataire"><b>Destinataire</b></label></br>
            <select id="destinataire"name="destinataire">
            <option selected ></option>

            <?php
                include("connexion_db.php");
                $req= "SELECT * FROM personnes";
                $resulte= $pdo->prepare($req);
                $resulte->execute();

                while($destinataire = $resulte->fetch(PDO::FETCH_ASSOC)){

             ?>

             <option selected value="<?= $destinataire['Email']; ?>"><?=strtoupper($destinataire['Specialiste'])." - ".$destinataire['Email']; ?></option>
             <?php }?>
            </select>
            
        </div>
        
        <div>
            <label for="subject"><b>Sujet</b></label></br>
            <input type="text" id="subject" name="subject" placeholder="Sujet"> </br></br>
        </div>

        <div>
            <textarea type="text" id="Objet" name="Objet" cols="50" rows="10" placeholder="Votre demande" value=></textarea></br></br>
        </div>

       <button type="submit" class="btn" value="beusseul" name="sendmail">Envoyer</button>
                   
        </form>

  
       
  </body>
</html>