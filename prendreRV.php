<?php
include("connexion_db.php");
// include("navbar.php");
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["prenom"])){
		header("Location: login.php");
		exit(); 
	}
?>


<?php

if(isset($_POST['destinataire'])) {
 
    // $id = $_POST['id_users'];
    $date = $_POST['Date_RV'];
    $hd = $_POST['Heure_Deb'];
    $hf = $_POST['Heure_Fin'];
    $dest = $_POST['destinataire'];
    $sujet = $_POST['subject'];
    $corp = $_POST['Objet'];
    // $id_pers = $_POST['id_personnes'];
    $headers = "From: isepdd197@gmail.com";
    // insertion dans la base de donnees
    $insert = "INSERT INTO prendrerv(Date_RV,Heure_Deb,Heure_Fin,Objet,destinataire) VALUES (?,?,?,?,?)";
    
    $result = $pdo->prepare($insert);
    $result->execute([$date,$hd,$hf,$corp,$dest]);
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="plugins/fullcalendar/main.css">
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
  <title>Gestion Des Rendez-vous</title>
  <!-- fichiers CSS -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="icon" href="assets/img/logo.jpg">
  <link rel="stylesheet" href="assets/css/templatemo-softy-pinko.css">
  <!-- Header CSS -->
  <link rel="stylesheet" href="css/styleHeader.css">
</head>
<body class="hold-transition sidebar-mini">
<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img src="assets/img/logo.jpg" alt="logo-isep" width="100px"/><b><h4>Gestion de <span>Rendez-vous</span></h4></b>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="accueil.php" class="active"  id="accueil">Accueil</a></li>
                            <li><a href="prendreRV.php"   id="rdv">Demander un RDV</a></li>    
                            <li><a href="profil.php?prenom=true">Mon profil</a></li>
                            <li><a href="logout.php">Deconnexion</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
<div class="wrapper p-0 m-0">
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="display: block;" id="rdv">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <br><br><br><br><br>
            <h1>Demande de Rendez-vous</h1><hr><br>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 ">
            <div class="sticky mb-3">
              <!--  -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Formulaire de Demande </h3>
                </div>
                <div class="card-body">
                  <div class="input-group">
                    <form action="" method="post">
                    <div class="form-row">
                        <div class="col-9">
                        <h6><i>Veuillez choisir un destinataire </i></h6><br>
                        <select id="destinataire"name="destinataire" class="form-control form-control-sm">
                        <option selected disabled ></option>

                        <?php
                            include("connexion_db.php");
                            $req= "SELECT * FROM personnes ";
                            $resulte= $pdo->prepare($req);
                            $resulte->execute();
                            
                            while($destinataire= $resulte->fetch(PDO::FETCH_ASSOC)){

                        ?>

                        <option selected value="<?= $destinataire['Email']; ?>"><?=strtoupper($destinataire['Email'])." - ".$destinataire['Specialiste']; ?></option>
                        <?php }?>
                        </select><br>
                        <!-- <input type="hidden" id="id_users" name="id_users" placeholder="L'adresse mail du destinataire" class="form-control form-control-sm"><br> -->
                        </div>
                        <div class="col-6">
                            <input type="date" id="Date_RV" name="Date_RV" placeholder="Date" class="form-control form-control-sm"><br>
                        </div>
                        <div class="col-3">
                            <input type="text" id="Heure_Deb" name="Heure_Deb" placeholder="Heure Debut" class="form-control form-control-sm">
                        </div>
                        <div class="col-3">
                            <input type="text" id="Heure_Fin" name="Heure_Fin" placeholder="Heure Fin" class="form-control form-control-sm">
                        </div>
                        <div class="col-3">
                            <input type="text" id="subject" name="subject" placeholder="Sujet" class="form-control form-control-sm"> </br>
                        </div>
                        <div class="col-12">
                            <textarea type="text" id="Objet" name="Objet" cols="50" rows="10" class="form-control" placeholder="Votre demande" value=></textarea></br>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" value="beusseul" name="sendmail">Envoyer</button>
                    </form>
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
 
          <div class="col-md-6">
          <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Mes Informations</h3>
                  <form method="post" action="zindex.php"  class="infoP" style="margin-left:-1px; margin-top:0px ;width: 40%;padding: 20px;border :3px solid rgb(86,52,24) ;background: white; border-radius: 10px 10px 10px 10px;">

<div class="contentP" style="font-weight: bold;">

<?php  

include("connexion_db.php");
// session_start();


if($_SESSION['prenom'] !== ""){
    $user = $_SESSION['prenom'];
    // $id = $_GET['edit'];
                 $dat = '';
                 $hd = '';
                 $hf = '';
                 $ob = '';
                 $dest = '';
                 $mat = '';
    $req = "SELECT * FROM prendrerv INNER JOIN users ON prendrerv.id_users=users.id_users WHERE prenom = '$user'";
    $result=$pdo->prepare($req);
    $result->execute();


                 if ($result->rowCount() > 0){
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        $dat = $row['Date_RV'];
                        $hd = $row['Heure_Deb'];
                        $hf = $row['Heure_Fin'];
                        $ob = $row['Objet'];
                        $dest = $row['destinataire'];
                        $mat = $row['id_users'];
                        
                    }
                

                ?>

                <form>
                    <label> Matricule : <?php echo $mat; ?></label>
                    <hr/>

                    <label> <b>Date :</b> <?php echo $dat; ?></label>
                    <br><br>
                            
                    <label> Heure Debut : <?php echo $hd; ?></label>
                    <br><br>
                    
                    <label> Heure Fin : <?php echo $hf; ?></label>
                    <br><br>
                    
                    <label> Objet : <?php echo $ob; ?></label>
                    <br><br>
                    
                    <label> Destinataire : <?php echo $dest; ?></label>
                    <br><br>
              
                </form>

    <?php } } else{ echo "<h2 text-align='center'>Aucune demande</h2>"; }	?>

                </div>
                <div class="card-body">
                  <div class="input-group">
                    <!-- recuperation des informations -->
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Projet</b> Transversal
    </div>
    <strong>Copyright &copy; 2021 isepdiamnidio.edu.sn , </strong> tous droits reserves.

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- fullCalendar 2.2.5 -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/fullcalendar/main.js"></script>
<!-- Page specific script -->
<script src="js/calendar.js"></script>

<!-- pagination -->
<script >
var divs = ["test","Paccueil","prendrerdv"];
var visibleId = null;
function show(id) {
    if(visibleId !== id) {
        visibleId = id;
    } 
    hide();
}

function hide() {
    var div, i, id;
    for(i = 0; i < divs.length; i++) {
        id = divs[i];
        div = document.getElementById(id);
        if(visibleId === id) {
            div.style.display = "block";
        
        } else {
            div.style.display = "none";
        }
    }
}  
</script>
<!-- Global Init -->
<!-- <script src="assets/js/custom.js"></script> -->
</body>
</html>
