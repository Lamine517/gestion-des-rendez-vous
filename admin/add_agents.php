<html>
    <head>
        <title>Gestion de RDV</title>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="stylesInscrire.css" media="screen" type="text/css" />
    </head>
    <style>
    
    
    </style>
    <body>

    
    <h1 id="h1"><i>Formulaire d'Inscription</i></h1><hr/>
    <form action="insert_agents.php" method="post">
   
        <div>
            <label for="id_personnes"><b>Matricule </b></label>
            <input type="text" id="id_personnes" name="id_personnes" placeholder="ex : 2003....(4 chiffres minimum)"> </br></br>
        <d/iv>

        <div>
            <label for="Nom"><b>Nom </b></label>
            <input type="text" id="Nom" name="Nom" placeholder="votre nom"> </br></br>
        </div>

        <div>
            <label for="Prenom"><b>Prénom </b> </label>
            <input type="text" id="Prenom" name="Prenom" placeholder="votre Prenom"> </br></br>
        </div>
        <div>
            <label for="Email"><b>Email </b> </label>
            <input type="text" id="Email" name="Email" placeholder="votre adresse email"> </br></br>
        </div>
        <div>
            <label for="passwrd"><b>Mot de passe</b></label>
            <input type="password" id="passwrd" name="passwrd" placeholder="votre Mot de passe"> </br></br>
        </div>
        <div>
            <label for=""><b>Numero de Telephone </b> </label>
            <input type="text" id="Numtel" name="Numtel" placeholder="votre Numero de Telephone"> </br></br>
        </div>

        <div>
            <label for="Adresse"><b>Adresse </b> </label>
            <input type="text" id="Adresse" name="Adresse" placeholder="votre Adresse ville"> </br></br>
        </div>

        <div>
            <label for="Specialiste"><b>Specialiste</b> </label>
            <input type="text" id="Specialiste" name="Specialiste" placeholder="votre Specialiste"> </br></br>
        </div>

        <div>
            <label><b>Veuillez choisir un service dont vous aimerez prendre un rendez-vous</b></label></br>
            <select name="matricule_services">
            <option selected >Choisir un service</option>
                    <?php
                    include("../connexion_db.php");
                    $req = "SELECT * FROM services";
                    $result = $pdo->prepare($req);
                    $result->execute();

                    while($service = $result->fetch(PDO::FETCH_ASSOC)){

                        ?>

                        <option value="<?= $service['matricule_services'] ;?>"><?= $service['matricule_services']." ".$service['libelle_services']; ?></option>
                <?php  } ?>
            </select>
        
        </div>
       
        <input type="submit" id='submit' value="S'inscrire" >
        </form>

  
       
  </body>
</html>