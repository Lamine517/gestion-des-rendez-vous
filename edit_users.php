<?php 
      include("connexion_db.php"); 
      include("navbar.php");

 $id = $_GET['edit'];
 $id_users = '';
 $prenom = '';
 $nom = '';
 $mail = '';
 $password = '';
 $telephone= 0;
 $profil= '';

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
     $profil = htmlentities($row['profil']);
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;700&display=swap" rel="stylesheet"> -->
    <title>GESTION RDV</title>
</head>
<body>
    <main>
        <section class="ajout_apprenant">
            <h1>Formulaire de mise à jour</h1>
            
            <form action="" method="post">
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
                    <input type="text" name="telephone" id="telephone" placeholder="Telephone" class="input_field" required value="<?= $telephone; ?>">
                </div>
                
                <input type="submit" value="Mettre à jour" class="btn btn_add">
            </form>
        </section>
        <div>
            <h1 style="margin-top:15px;border-style:outset">Liste des Utilisateurs</h1>
            <section class="resultat">
                <table style="margin:0;width:900px">
                    <?php
                     include("../connexion_db.php");
                     $req = "SELECT * FROM users";
                     $res = $pdo->prepare($req);
                     $res->execute();
                     echo " <tr>
                                <th>MATRICULE</th>
                                <th>PRENOM</th>
                                <th>NOM</th>
                                <th>EMAIL</th>
                                <th>TELEPHONE</th>
                                <th>TYPE</th>
                                <th>PHOTO</th>
                                <th colspan='2'>ACTIONS</th>
                            </tr>";
                      
                if($res->rowCount()){
                    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                         
                   
                     ?>
                   
                    <tr>
                        <td><?=  $row['id_users'] ;?></td>
                        <td><?=  $row['prenom'] ;?></td>
                        <td><?=  $row['nom'] ;?></td>
                        <td><?=  $row['Email']; ?></td>
                        <td><?=  $row['telephone']; ?></td>
                        <td><?=  $row['type']; ?></td>
                        <td><?=  $row['profil']; ?></td>
                        <td> <button type="submit" class="btn-edit"><a  href="edit_user.php?edit=<?= $row['id_users']; ?>">Modifier</a></button> </td>
                        <td> <button type="submit" class="btn-del"><a  href="delete_user.php?del=<?= $row['id_users']; ?>">Supprimer</a></button></td> 
                                        
                    </tr>
                    <?php } }?>
                </table>
            </section>
            
        </div>  
    </main>
</body>
</html>
