
     <form name="contact_form" method="post" action="">
    <table width="500">
    <tr>
     <td valign="top">
      <label for="Heure_Deb">Heure Debut *</label>
     </td>
     <td valign="top">
      <input  type="text" name="Heure_Deb" maxlength="50" size="30" value="<?php if (
isset($_POST['Heure_Deb'])) echo htmlspecialchars($_POST['Heure_Deb']);?>">
     </td>
    </tr>
    <tr>
     <td valign="top"">
      <label for="Heure_Fin">Heure Fin</label>
     </td>
     <td valign="top">
      <input  type="text" name="Heure_Fin" maxlength="50" size="30" value="<?php if
 (isset($_POST['Heure_Fin'])) echo htmlspecialchars($_POST['Heure_Fin']);?>">
     </td>
    </tr>
    <tr>
     <td valign="top">
      <label for="email">Email Addresse *</label>
     </td>
     <td valign="top">
      <input  type="text" name="destinataire" maxlength="80" size="30" value="<?php if 
(isset($_POST['destinataire'])) echo htmlspecialchars($_POST['destinataire']);?>">
     </td>
    </tr>
    <tr>
     <td valign="top">
      <label for="subject">Sujet</label>
     </td>
     <td valign="top">
      <input  type="text" name="subject" maxlength="30" size="30" value="
<?php if (isset($_POST['subject'])) echo htmlspecialchars($_POST['subject'])
;?>">
     </td>
    </tr>
    <tr>
     <td valign="top">
      <label for="Objet">Objet *</label>
     </td>
     <td valign="top">
      <textarea  name="Objet" cols="28" rows="10"><?php if (isset($_POST[
'Objet'])) echo htmlspecialchars($_POST['Objet']);?></textarea>
     </td>
    </tr>
    <tr>
     <td colspan="2" style="text-align:center">
      <input type="submit" value=" Envoyer ">
     </td>
    </tr>
    </table>
    </form>

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

