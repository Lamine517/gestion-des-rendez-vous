<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css" />
</head>
<body>
<?php
require('../config.php');

if (isset($_REQUEST['prenom'],$_REQUEST['nom'], $_REQUEST['Email'],$_REQUEST['passwrd'],$_REQUEST['telephone'], $_REQUEST['type'])){
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$prenom = stripslashes($_REQUEST['prenom']);
	$prenom = mysqli_real_escape_string($conn, $prenom); 
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
	// récupérer le type (user | admin)
	$type = stripslashes($_REQUEST['type']);
	$type = mysqli_real_escape_string($conn, $type);
	
    $query = "INSERT into `users` (prenom,nom, Email, passwrd,telephone,type)
				  VALUES ('$prenom','$nom', '$email', '".hash('sha256', $password)."', '$telephone', '$type')";
    $res = mysqli_query($conn, $query);

    if($res){
       echo "<div class='sucess'>
             <h3>L'utilisateur a été créée avec succés.</h3>
             <p>Cliquez <a href='home.php'>ici</a> pour retourner à la page d'accueil</p>
			 </div>";
    }
}else{
?>
<form class="box" action="" method="post">
	<h1 class="box-logo box-title"><a href="https://waytolearnx.com/">WayToLearnX.com</a></h1>
    <h1 class="box-title">Add user</h1>
	<input type="text" class="box-input" name="prenom" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="nom" placeholder="Nom d'utilisateur" required />
    <input type="text" class="box-input" name="Email" placeholder="Email" required />
	<div class="input-group">
			<select class="box-input" name="type" id="type" >
				<option value="" disabled selected>Type</option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
	</div>
    <input type="password" class="box-input" name="passwrd" placeholder="Mot de passe" required />
    <input type="number" class="box-input" name="telephone" placeholder="telephone" required />
    <input type="submit" name="submit" value="+ Add" class="box-button" />
</form>
<?php } ?>
</body>
</html>