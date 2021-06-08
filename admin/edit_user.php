<?php 
 
    include("../connexion_db.php");

    $id = $_GET['edit'];
    $id_users = '';
    $prenom = '';
    $nom = '';
    $mail = '';
    $password = '';
    $telephone= '';
    $type = '';

    $edit = "SELECT * FROM users WHERE id_users = $id";
    $res = $pdo->prepare($edit);
    $res->execute();

    while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $id_users = $row['id_users'];
        $prenom = $row['prenom'];
        $nom = $row['nom'];
        $mail = $row['Email'];
        $password = $row['passwrd'];
        $telephone = $row['telephone'];
        $type=$row['type'];
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>GESTION RDV</title>
</head>
<body>
    <main>
        <section class="ajout_apprenant">
            <h1>Formulaire de mise à jour</h1>
            
            <form action="update_users.php?edit=<?= $id ;?>" method="post">
            <div class="field">
                    <input type="text" name="id_users" name="id_users" placeholder="Identifiant : " class="input_field" required value="<?= $id_users?>">
                </div>
            <div class="field">
                    <input type="text" name="prenom" name="prenom" placeholder="Prenom : " class="input_field" required value="<?= $prenom ?>">
                </div>
                <div class="field">
                    <input type="text" name="nom" id="nom" placeholder="Nom : " class="input_field" required value="<?= $nom ?>">
                </div>
                <div class="field">
                    <input type="text" name="Email" id="Email" placeholder="Email" class="input_field" required value="<?= $mail ?>"> 
                </div>
                <div class="input-group">
                    <select class="input_field" name="type" id="type" >
                        <option value="" disabled selected>Type</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
	        </div>
                <div class="field">
                    <input type="password" name="passwrd" id="passwrd" placeholder="Mot de passe" class="input_field" required value="<?= $password ?>">
                </div>
                <div class="field">
                    <input type="text" name="telephone" id="telephone" placeholder="Telephone" class="input_field" required value="<?= $telephone ?>">
                </div>
                
                <input type="submit" value="Mettre à jour" class="btn btn_add"><br>
                <button type="reset" value="Retour" class="btn btn_add" style="background:red"><a href="home.php" style="color:white; text-decoration:none">Retour</a></button>
            </form>
        </section>
        
    </main>
</body>
</html>
