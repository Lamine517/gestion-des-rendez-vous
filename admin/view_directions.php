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

    <title>AJOUTER DIRECTION</title>
</head>
<body>
    <main>
        <div>
            <div class="col-3">
                <button type="submit" value="Ajouter une direction" class="btn btn-primary" data-toggle="modal" data-target="#ajoutDirection">Ajouter une direction</button>
            </div>
 
            <h1 style="margin-top:15px;border-style:outset">Liste des directions</h1>
            <section class="resultat">
                <table>
                    <?php
                     include("../connexion_db.php");
                     $req = "SELECT * FROM directions";
                     $res = $pdo->prepare($req);
                     $res->execute();
                     echo " <tr>
                                <th scope='col'>Matricule</th>
                                <th scope='col'>Libelle</th>
                                <th scope='col'>Action</th>
                            </tr>";
                   
                     while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                     ?>
                   
                    <tr>
                        <td data-label="Account"><?=  $row['matricule_directions'] ;?></td>
                        <td data-label="Account"><?=  $row['libelle_directions'] ;?></td>
                        <td data-label="Account"><button class="btn-danger"><a style="color:white" href="delete_directions.php?del=<?= $row['matricule_directions'];?>">Supprimer</a></button></td>
                    </tr>
                    <?php  }?>
                </table>
            </section>
                                    <!-- Ajouter une direction -->
            <div class="modal fade" id="ajoutDirection">
                <div class="modal-dialog"> 
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Ajouter une direction</h4>
                            <button type="submit" class="close closemodal" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body row">
                            <form action="insert_directions.php" method="post" class="col">
                                <div class="row">
                                        <div class="col-9 m-5">
                                                <input type="text" name="matricule_directions" id="matricule_directions" placeholder="Matricule Service (ex : S232)" class="form-control">
                                        </div><br><br><br>
                                        <div class="col-9 m-5">
                                                <input type="text" name="libelle_directions" id="libelle_directions" placeholder="Libelle Service" class="form-control">
                                        </div><br><br><br>
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