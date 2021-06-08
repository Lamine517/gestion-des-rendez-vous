<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <title>Gestion Des Rendez-vous</title>
    <!-- fichiers CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="icon" href="assets/img/logo.jpg">
    <link rel="stylesheet" href="assets/css/templatemo-softy-pinko.css">
    <style>
    header b{
	position: absolute;
	padding: 3px;
	float: left;
	
	margin-top: 0;
	font-family: 'Alfa Slab One',cursive;
	color: rgb(212,177,123);
    width:90%;
    font-weight:800px;
}

   nav a span{
	color: rgb(95, 66, 31);

    }
    </style>

</head>
<body>
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
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
</body>
</html>