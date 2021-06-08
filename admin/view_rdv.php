<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleContact.css">
    <title>GESTION RDV</title>
</head>
<body>
    <main>
        <!-- <section class="ajout_apprenant">
            <img src="../images/images.jfif" alt="not found" style="width: 500px; height: 300px; object-fit:container">
        </section> -->
        <div>
            <h1 style="margin-top:15px;border-style:outset">La Liste des Demandes de Rendez-Vous</h1>
            <section class="resultat">
                <table>
                    <?php
                     include("../connexion_db.php");
                     $req = "SELECT * FROM prendrerv INNER JOIN users ON prendrerv.id_users = users.id_users";
                     $res = $pdo->prepare($req);
                     $res->execute();
                     echo "<thead><tr>
                                <th scope='col'>DATE</th>
                                <th scope='col'>Heure Debut</th>
                                <th scope='col'>Heure Fin</th>
                                <th scope='col'>Objet</th>
                                <th scope='col'>Destinataire</th>
                                <th scope='col'>Action</th>
                            </tr></thead>";
                      
                // if($result->rowCount() > 0){
                    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                         
                   
                     ?>
                   <tbody>
                    <tr>
                        <td data-label="Account"><?=  $row['Date_RV'] ;?></td>
                        <td data-label="Account"><?=  $row['Heure_Deb'] ;?></td>
                        <td data-label="Account"><?=  $row['Heure_Fin'] ;?></td>
                        <td data-label="Account"><?=  $row['Objet']; ?></td>
                        <td data-label="Account"><?=  $row['prenom']." ".$row['nom']; ?></td>
                        <td data-label="Account"> <button type="submit" class="btn-danger"><a style="color :black" href="delete_rdv.php?del=<?= $row['id_users']; ?>">Supprimer</a></button></td> 
                                        
                    </tr>
                    </tbody>
                    <?php  }?>
                </table>
            </section>
            
        </div>
    </main>
</body>
</html>
