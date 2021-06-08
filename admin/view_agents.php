<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleContact.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>GESTION RDV</title>
</head>
<body>
    <main>
        <div>
            <div class="col-3">
                <button type="submit"  class="btn btn-primary" data-toggle="modal" data-target="#ajoutPersonnel">Ajouter un personnel</button>
            </div>
            <h1 style="margin-top:15px;border-style:outset">Liste des personnels</h1>
            <section class="resultat">
                <table>
                    <?php
                     include("../connexion_db.php");
                     $req = "SELECT id_personnes,Nom,Prenom,Email,Numtel,Adresse,Specialiste FROM personnes";
                     $res = $pdo->prepare($req);
                     $res->execute();
                     echo " <tr>
                                <th scope='col'>NOM</th>
                                <th scope='col'>PRENOM</th>
                                <th scope='col'>EMAIL</th>
                                <th scope='col'>TELEPHONE</th>
                                <th scope='col'>ADRESSE</th>
                                <th scope='col'>SPECIALISTE</th>
                                <th scope='col'>Action 1</th>
                                <th scope='col'>Action 2</th>
                            </tr>";
                      
                if($result->rowCount()){
                    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                         
                   
                     ?>
                   
                    <tr>
                        <td data-label="Account"><?=  $row['Nom'] ;?></td>
                        <td data-label="Account"><?=  $row['Prenom'] ;?></td>
                        <td data-label="Account"><?=  $row['Email'] ;?></td>
                        <td data-label="Account"><?=  $row['Numtel']; ?></td>
                        <td data-label="Account"><?=  $row['Adresse']; ?></td>
                        <td data-label="Account"><?=  $row['Specialiste']; ?></td>
                        <td data-label="Account"><button class="btn-warning"><a style="color :black" href="edit_agents.php?edit=<?= $row['id_personnes'];?>">Modifier</a></button></td>
                        <td data-label="Account"><button class="btn-danger"><a style="color :black" href="delete_agents.php?del=<?= $row['id_personnes'];?>">Supprimer</a></button></td>
                                        
                    </tr>
                    <?php } }?>
                </table>
            </section>
                                      <!-- Ajouter un personnel -->
            <div class="modal fade" id="ajoutPersonnel">
                <div class="modal-dialog"> 
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Ajouter un personnel</h4>
                            <button type="submit" class="close closemodal" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body row">
                            <form action="insert_agents.php" method="post" class="col">
                                <div class="row">
                                        <div class="col-5 m-4">
                                            <input type="text" id="id_personnes" name="id_personnes" placeholder="Matricule ex : 2003....(4 chiffres minimum)" class="form-control" required> 
                                        </div><br><br><br>
                                        <div class="col-5 m-4">
                                            <input type="text" id="Nom" name="Nom" placeholder="Votre nom" class="form-control" required>
                                        </div><br><br><br>
                                        <div class="col-11 m-4">
                                            <input type="text" id="Prenom" name="Prenom" placeholder="Votre Prenom"  class="form-control" required>
                                        </div><br><br><br>
                                        <div class="col-11 m-4">
                                            <input type="text" id="Email" name="Email" placeholder="Votre adresse email" class="form-control" required>
                                        </div><br><br><br>
                                        <div class="col-11 m-4">
                                            <input type="password" id="passwrd" name="passwrd" placeholder="Votre Mot de passe" class="form-control" required>
                                        </div><br><br><br>
                                        <div class="col-5 m-4">
                                            <input type="text" id="Numtel" name="Numtel" placeholder="Votre Numero de Telephone" class="form-control" required>
                                        </div><br><br><br>
                                        <div class="col-5 m-4">
                                            <select name="matricule_services" class="form-control">
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
                                        </div><br><br><br>
                                        <div class="col-5 m-4">
                                            <input type="text" id="Adresse" name="Adresse" placeholder="Votre Adresse ville" class="form-control" required>
                                        </div><br><br><br>
                                        <div class="col-5 m-4">
                                            <input type="text" id="Specialiste" name="Specialiste" placeholder="Votre Specialiste" class="form-control" required>
                                        </div><br><br><br>
                                        <div class="col-5 m-4">
                                            <button type="submit" class="btn btn-primary"> Ajouter</button>
                                        </div>
                                </div>
                            </form>
                        </div><!--end modal-body row  -->
                    </div>
                </div>
            </div><!-- end modal fade -->  
            
        </div>
    </main>

    <script>
        $(function(){
            $('.fa').click(function(){
                $('.modal').modal('show')
            })
            $('.closemodal').click(function(){
                $('.modal').modal('hide')
            })
        })
    </script>
</body>
</html>
