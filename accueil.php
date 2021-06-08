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
                            <li><a href="accueil.php" class="active"  onclick="show('Paccueil');" id="accueil">Accueil</a></li>
                            <li><a href="prendreRV.php" id="rdv">Demander un RDV</a></li>    
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
  <div class="content-wrapper" style="display: block;" id="accueil" >
    <!-- Content Header (Page header) -->
    <section class="content-header" >
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <br><br><br><br><br>
            <h1>Calendrier</h1><hr><br>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="sticky mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title"><?php echo strtoupper($_SESSION['prenom']); ?></h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    <h6>Vous etes connecte en tant que utilisateur</h6>
                  </div>
                </div>
                <!-- /.card-body -->
              </div><br>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">ISEP DIAMNIADIO</h3>
                </div>
                <div class="card-body">
                  <div class="input-group">
                    <h2>Bienvenue</h2> <h4>Dans la Gestion Informatisée des Rendez-Vous au niveau des <strong> Directions et Services</strong> de L'ISEP Diamniadio.</h4> 
                    <div><h4>Prenez rendez-vous avec un professionnel, <br> Effectuez toutes ces demarches depuis votre espace personnel.</h4></div>
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
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
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="display: none;" id="rdv">
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
                        <div class="col-6">
                        <h6><i>Veuillez vous identifier </i></h6><br>
                        <select id="select" name="id_users" class="form-control form-control-sm">
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
                        </select><br>
                        </div>
                        <div class="col-6">
                        <h6><i>Veuillez choisir un destinataire </i></h6><br>
                        <select id="destinataire"name="destinataire" class="form-control form-control-sm">
                        <option selected disabled ></option>

                        <?php
                            include("connexion_db.php");
                            $req= "SELECT * FROM personnes";
                            $resulte= $pdo->prepare($req);
                            $resulte->execute();
                            
                            while($destinataire= $resulte->fetch(PDO::FETCH_ASSOC)){

                        ?>

                        <option selected value="<?= $destinataire['id_personnes']; ?>"><?=strtoupper($destinataire['Email'])." - ".$destinataire['Specialiste']; ?></option>
                        <?php }?>
                        </select><br>
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
    <strong>Copyright &copy; 2021 isepdiamnidio.edu.sn .</strong> tous droits reserves

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
<!-- <script type="text/javascript">
document.getElementById('mydiv').style.visibility='visible';</script> -->
</html>
