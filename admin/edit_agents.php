<?php 
 
    include("../connexion_db.php");

    $id = $_GET['edit'];
    $mat = '';
    $nom = '';
    $pre = '';
    $mail = '';
    $tel = '';
    $adr = '';
    $spec = '';
    $matser = '';
    $pass = '';
    $edit = "SELECT * FROM personnes WHERE id_personnes = $id";
    $res = $pdo->prepare($edit);
    $res->execute();

    while($row = $res->fetch(PDO::FETCH_ASSOC)){
        $mat = $row['id_personnes'];
        $nom = $row['Nom'];
        $pre = $row['Prenom'];
        $mail = $row['Email'];
        $tel = $row['Numtel'];
        $adr = $row['Adresse'];
        $spec =$row['Specialiste'];
        $matser = $row['matricule_services'];
        $pass = $row['passwrd'];
        
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
    <main class="main">
        <section class="ajout_apprenant">
            <div class="content-main">
            <h1>Formulaire de mise à jour</h1>
            <form action="update_agents.php?edit=<?= $id ;?>" method="post">
                <div class="field">
                    <input type="text" id="id_personnes" name="id_personnes" placeholder="Matricule ex : 2003....(4 chiffres minimum)" class="input_field" value="<?= $mat ?>" > 
                </div>
                <div class="field">
                    <input type="text" id="Nom" name="Nom" placeholder="Votre nom" class="input_field" required value="<?= $nom ?>">
                </div>
                <div class="field">
                    <input type="text" id="Prenom" name="Prenom" placeholder="Votre Prenom"  class="input_field" required value="<?= $pre ?>"> 
                </div>
                <div class="field">
                    <input type="text" id="Email" name="Email" placeholder="Votre adresse email" class="input_field" required value="<?= $mail ?>"> 
                </div>
                <div class="field">
                    <input type="password" id="passwrd" name="passwrd" placeholder="Votre Mot de passe" class="input_field" required value="<?= $pass ?>">
                </div>
                <div class="field">
                    <input type="text" id="Numtel" name="Numtel" placeholder="Votre Numero de Telephone" class="input_field" required value="<?= $tel ?>"> 
                </div>
                 <div class="field">
                    <select name="matricule_services" class="input_field">
                        <option selected disabled>Choisir un service</option>
                        <?php
                        include("connexion_db.php");
                        $req = "SELECT * FROM services";
                        $result = $pdo->prepare($req);
                        $result->execute();

                        while($service = $result->fetch(PDO::FETCH_ASSOC)){

                            ?>

                            <option value="<?= $service['matricule_services'] ;?>"><?= $service['matricule_services']." ".$service['libelle_services']; ?></option>
                        <?php  } ?>
                    </select>
                 </div>

                <div class="field">
                    <input type="text" id="Adresse" name="Adresse" placeholder="Votre Adresse ville" class="input_field" required value="<?= $adr ?>">
                </div>
                <div class="field">
                    <input type="text" id="Specialiste" name="Specialiste" placeholder="Votre Specialiste" class="input_field" required value="<?= $spec ?>">
                </div>
                
                <input type="submit" value="Mettre à jour" class="btn btn_add"><br>
                <button type="reset" value="Retour" class="btn btn_add" style="background:red"><a href="home.php" style="color:white; text-decoration:none">Retour</a></button>
            </form>
            </div>
            
        </section>
    </main>
</body>
</html>
