<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style1.css"> -->
    <link rel="stylesheet" href="styleContact.css">
    <title>GESTION RDV</title>
</head>
<body>
    <main>
        <div>
            <h1 style="margin-top:15px;border-style:outset">La Liste des Contacts</h1>
            <section class="resultat">
                <table>
                <thead>
                    <?php
                     include("../connexion_db.php");
                     $req = "SELECT * FROM contact";
                     $res = $pdo->prepare($req);
                     $res->execute();
                     echo " <tr>
                                <th scope='col'>Nom d'utilisateur</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>Sujet</th>
                                <th scope='col'>Objet</th>
                                <th scope='col'>Date d'envoi</th>
                                <th scope='col'>Action</th>
                            </tr></thead>";
                      
                // if($result->rowCount() > 0){
                    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                         
                   
                     ?>
                     <tbody>
                   
                    <tr>
                        <td data-label="Account"><?=  $row['name'] ;?></td>
                        <td data-label="Account"><?=  $row['mail'] ;?></td>
                        <td data-label="Account"><?=  $row['subject'] ;?></td>
                        <td data-label="Account"><?=  $row['Objet']; ?></td>
                        <td data-label="Due Date"><?=  $row['date_envoie']; ?></td>
                        <td data-label="Account"> <button type="submit" class="btn-danger"><a style="color :black" href="delete_contact.php?del=<?= $row['id_contact']; ?>">Supprimer</a></button></td> 
                                        
                    </tr>
                    </tbody>
                    <?php  }?>
                </table>
            </section>
            
        </div>
    </main>
</body>
</html>
