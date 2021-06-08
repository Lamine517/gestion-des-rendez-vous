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

    <title>AJOUTER SERVICE</title>
</head>
<body>
    <main>
        <div>
            <div class="col-3">
                <button type="submit" value="Ajouter un service" class="btn btn-primary" data-toggle="modal" data-target="#ajout">Ajouter un service</button>
            </div>
 
            <h1 style="margin-top:15px;border-style:outset">Liste des services</h1>
            <section class="resultat">
                <table>
                    <?php
                     include("../connexion_db.php");
                     $req = "SELECT * FROM services";
                     $res = $pdo->prepare($req);
                     $res->execute();
                     echo " <tr>
                                <th scope='col'>Matricule Service</th>
                                <th scope='col'>Libelle Service</th>
                                <th scope='col'>Matricule Direction</th>
                                <th scope='col'>Action</th>
                            </tr>";
                   
                     while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                     ?>
                   
                    <tr>
                        <td data-label="Account"><?=  $row['matricule_services'] ;?></td>
                        <td data-label="Account"><?=  $row['libelle_services'] ;?></td>
                        <td data-label="Account"><?=  $row['matricule_directions'] ;?></td>
                        <td data-label="Account"><button class="btn btn-danger"><a style="color :white" href="delete_services.php?del=<?= $row['matricule_services'];?>">Supprimer</a></button></td>
                        
                    </tr>
                    <?php  }?>
                </table>
            </section>
                                    <!-- Ajouter un service -->
            <div class="modal fade" id="ajout">
                <div class="modal-dialog"> 
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Ajouter un service</h4>
                            <button type="submit" class="close closemodal" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body row">
                            <form action="insert_services.php" method="post" class="col">
                                <div class="row">
                                        <div class="col-9 m-5">
                                                <input type="text" name="matricule_services" id="matricule_services" placeholder="Matricule Service (ex : S232)" class="form-control">
                                        </div><br><br><br>
                                        <div class="col-9 m-5">
                                                <input type="text" name="libelle_services" id="libelle_services" placeholder="Libelle Service" class="form-control">
                                        </div><br><br><br>
                                        <div class="col-9 m-5">
                                            <label><b>Veuillez choisir une direction</b></label></br>
                                            <select name="matricule_directions" class="form-control">
                                                <option selected disabled class="form-control" >Choisir une direction</option>
                                                    <?php
                                                    include("../connexion_db.php");
                                                    $req = "SELECT * FROM directions";
                                                    $result = $pdo->prepare($req);
                                                    $result->execute();

                                                    while($service = $result->fetch(PDO::FETCH_ASSOC)){

                                                        ?>

                                                        <option  value="<?= $service['matricule_directions'] ;?>"><?= $service['matricule_directions']." ".$service['libelle_directions']; ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div><br><br><br><br>
                                        <div class="col-12 m-5">
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