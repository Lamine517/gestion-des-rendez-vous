

<?php

if(isset($_POST['destinataire'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "isepdd197@gmail.com";
    $email_subject = "Le sujet de votre email";
 
    function died($error) {
        // your error code can go here
        echo 
"Nous sommes désolés, mais des erreurs ont été détectées dans le" .
" formulaire que vous avez envoyé. ";
        echo "Ces erreurs apparaissent ci-dessous.<br /><br />";
        echo $error."<br /><br />";
        echo "Merci de corriger ces erreurs.<br /><br />";
        die();
    }
 
 
    // si la validation des données attendues existe
     if(!isset($_POST['Heure_Deb']) ||
        !isset($_POST['Heure_Fin']) ||
        !isset($_POST['destinataire']) ||
        !isset($_POST['subject']) ||
        !isset($_POST['Objet'])) {
        died(
'Nous sommes désolés, mais le formulaire que vous avez soumis semble poser' .
' problème.');
    }
 
     
 
    $Heure_Deb = $_POST['Heure_Deb']; // required
    $Heure_Fin = $_POST['Heure_Fin']; // required
    $destinataire = $_POST['destinataire']; // required
    $subject = $_POST['subject']; // not required
    $Objet = $_POST['Objet']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    if(!preg_match($email_exp,$destinataire)) {
      $error_message .= 
'L\'adresse e-mail que vous avez entrée ne semble pas être valide.<br />';
    }
   
      // Prend les caractères alphanumériques + le point et le tiret 6
      $string_exp = "/^[A-Za-z0-9 .'-]+$/";

    if(strlen($Objet) < 2) {
      $error_message .= 
'Le Objet que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(strlen($error_message) > 0) {
      died($error_message);
    }
 
    $email_message = "Détail.\n\n";
    $email_message .= "Heure Debut: ".$Heure_Deb."\n";
    $email_message .= "Heure Fin: ".$Heure_Fin."\n";
    $email_message .= "Email: ".$destinataire."\n";
    $email_message .= "subject: ".$subject."\n";
    $email_message .= "Objet: ".$Objet."\n";
 
    // create email headers
    $headers = 'From: '.$destinataire."\r\n".
    'Reply-To: '.$destinataire."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $email_subject, $email_message, $headers);
    ?>
     
    <!-- mettez ici votre propre message de succès en html -->
     
    Merci de nous avoir contacter. Nous vous contacterons très bientôt.
     
    <?php

    }

