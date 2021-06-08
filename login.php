<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/styleConnect.css" />
</head>
<body>
<?php
require('config.php');
session_start();

if (isset($_POST['prenom'],$_POST['passwrd'])){
	$prenom = stripslashes($_REQUEST['prenom']);
	$prenom = mysqli_real_escape_string($conn, $prenom);
	$_SESSION['prenom'] = $prenom;
	$passwrd = stripslashes($_REQUEST['passwrd']);
	$passwrd = mysqli_real_escape_string($conn, $passwrd);
    $query = "SELECT * FROM `users` WHERE prenom='$prenom' and passwrd='".hash('sha256', $passwrd)."'";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	
	if (mysqli_num_rows($result) == 1) {
		$user = mysqli_fetch_assoc($result);
		// vérifier si l'utilisateur est un administrateur ou un utilisateur
		if ($user['type'] == 'admin') {
			header('location: admin/home.php');		  
		}else{
			header('location: accueil.php');
		}
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}
}
?> 
	<div id="container">
	<button class="retour"><a href="index.php">retour</a></button>
	<form action="" method="POST">
		<div class="form-box">
			<div class="header-text">
				Connexion
			</div>
                <input type="text" placeholder="Nom d'utilisateur" name="prenom" required>
                <input type="password" placeholder="Entrer le mot de passe" name="passwrd" required>
                <button>login</button>
               <p style="text-align:center"> Vous êtes nouveau ici?<a href="register.php"><i>S'inscrire</i></a></p>
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?>
		</div>
    </form>
	</div>


</body>
</html>