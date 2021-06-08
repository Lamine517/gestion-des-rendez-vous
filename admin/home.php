<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["prenom"])){
		header("Location: login.php");
		exit(); 
	}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Administration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css" />
  <link rel="stylesheet" href="style1.css">
  </head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">      
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Administrateur</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <form action="#" method="POST" hidden>
          <input type="hidden" name="_token" value="VeKtEnxgk0qpa4e9TPWDtdF9Om9ugmIds2mXRzRm">                                
        </form>
        <a class="nav-link"
            href="../logout.php"
            >
            Déconnexion        </a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Accueil</p>
                </a>
            </li>
                                    <!-- Gestion des rendez-vous  -->
            <li class="nav-item has-treeview ">
              <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-envelope-open-text"></i>
                  <p>
                    Gestion des rendez-vous
                      <i class="right fas fa-angle-double-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item" onclick="show('voir_rdv');" id="rdv">
                    <a href="#" class="nav-link ">
                        <i class="fa fa-eye nav-icon"></i>
                        <p>Voir</p>
                    </a>
                </li>
                <li class="nav-item" onclick="show('voir_contact');" id="contact">
                    <a href="#" class="nav-link ">
                        <i class="fa fa-eye nav-icon"></i>
                        <p>Les Contacts</p>
                    </a>
                </li>
            </ul> 
          </li>
                                      <!-- Gestion des services et directions  -->
          <li class="nav-item has-treeview ">
              <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-file"></i>
                  <p>
                    Directions et Services
                      <i class="right fas fa-angle-double-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item" onclick="show('voir_directions');" id="services">
                    <a href="#" class="nav-link ">
                        <i class="fa fa-circle nav-icon"></i>
                        <p>Directions</p>
                    </a>
                </li>
                <li class="nav-item" onclick="show('voir_services');" id="services">
                    <a href="#" class="nav-link ">
                        <i class="fa fa-circle nav-icon"></i>
                        <p>Services</p>
                    </a>
                </li>
            </ul> 
          </li>
                                      <!-- Gestion des utilisateurs -->
            <li class="nav-item has-treeview ">
                <a href="#" class="nav-link " >
                    <i class="nav-icon fas fa-user-alt"></i>
                    <p>Gestion des utilisateurs
                        <i class="right fas fa-angle-double-left"></i>
                    </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item"  onclick="show('voir_users');" id="users">
                        <a href="#" class="nav-link ">
                            <i class="fa fa-eye nav-icon"></i>
                            <p>Utilisateurs</p>
                        </a>
                    </li>
                
                    <li class="nav-item " onclick="show('voir_agents');" id="agents">
                        <a href="#" class="nav-link ">
                            <i class="fa fa-eye nav-icon"></i>
                            <p>Personnels</p>
                        </a>
                    </li>
                </ul>                                                                                                                                               </ul>
            </li>

          
            

        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark">Tableau de bord</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
         <!--Tableau de bord de l'administrateur  -->
  <div class="container-fluid">
      <div class="col-sm-12"  id="accueil" style="display: block;">
          <h1 class="m-5 text-dark" style="font-size: 700%; font-weight: bold;">Bienvenue <?php echo $_SESSION['prenom']; ?></h1><hr>
          <p>C'est votre espace en tant que administrateur</p>
    </div>
                <!--SERVICES  -->
    <div class="col-sm-12" id="voir_services" style="display: none;">
          <?php include('view_services.php');?>
    </div>
                 <!--USERS  -->
    <div class="col-sm-12" id="voir_users" style="display: none;">
      <?php include('view_user.php');?>
    </div>
                  <!--DIRECTIONS  -->
    <div class="col-sm-12" id="voir_directions" style="display: none;">
          <?php include('view_directions.php');?>
    </div>
                  <!--AGENTS  -->
    <div class="col-sm-12" id="voir_agents" style="display: none;">
          <?php include('view_agents.php');?>
    </div>
                <!--RDV  -->
    <div class="col-sm-12" id="voir_rdv" style="display: none;">
          <?php include('view_rdv.php');?>
    </div>
                <!--Contact  -->
    <div class="col-sm-12" id="voir_contact" style="display: none;">
          <?php include('view_contact.php');?>
    </div>
</div>         

      </div>      
  </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 .</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js" ></script>
<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js"></script>
<script src="adminlte/adminlte.min.js"></script>
<!-- display -->
<script>
  var divs = ["accueil","voir_services","voir_users","voir_agents","voir_directions","voir_rdv","voir_contact"];
var visibleId = null;
function show(id) {
  if(visibleId !== id) {
    visibleId = id;
  //  divs[i].style.backgroundColor ="green";
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
</body>
</html>
