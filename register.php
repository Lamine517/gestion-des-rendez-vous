<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/styleRegister.css" />
</head>
<body>
<?php
require('config.php');

if (isset($_REQUEST['prenom'],$_REQUEST['nom'], $_REQUEST['Email'],$_REQUEST['passwrd'],$_REQUEST['telephone'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$prenom = stripslashes($_REQUEST['prenom']);
	$prenom = mysqli_real_escape_string($conn, $prenom); 
    // récupérer le nom  
    $nom = stripslashes($_REQUEST['nom']);
	$nom = mysqli_real_escape_string($conn, $nom);
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['Email']);
	$email = mysqli_real_escape_string($conn, $email);
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$password = stripslashes($_REQUEST['passwrd']);
	$password = mysqli_real_escape_string($conn, $password);
    // récupérer le numero de telephone et supprimer les antislashes ajoutés par le formulaire
	$telephone = stripslashes($_REQUEST['telephone']);
	$telephone = mysqli_real_escape_string($conn, $telephone);
	// récupérer le type (profil)
	$profil = stripslashes($_REQUEST['profil']);
	$profil = mysqli_real_escape_string($conn, $profil);

    // $profil=$_FILES["profil"]["name"];
	// move_uploaded_file($_FILES["profil"]["tmp_name"],"profil".$_FILES["profil"]["name"]);
	
    $query = "INSERT into `users` (prenom,nom, Email, passwrd,telephone,type,profil)
				  VALUES ('$prenom','$nom', '$email', '".hash('sha256', $password)."', '$telephone', 'user','$profil')";
    $res = mysqli_query($conn, $query);

    if($res){
       
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
			 </div>";
             
    }
}else{
?>

<div id="container">
	<form action="" method="POST">
        <div class="form-box">
            <div class="header-text">
                Connexion
            </div>
                <input type="text" placeholder="Prenom : " name="prenom" required>

                <input type="text" placeholder="Nom : " name="nom" required>

                <input type="text" placeholder="Email : " name="Email" required>

                <input type="password" placeholder="Entrer le mot de passe" name="passwrd" required>

                <input type="text" placeholder="Telephone: " name="telephone" required>
                <input type="file"  name="profil" required>
            
                <p style="text-align:center" class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
               

                <button>S'inscrire</button>
                
        </div>
    </form>
	</div>
<?php } ?>
</body>
</html>