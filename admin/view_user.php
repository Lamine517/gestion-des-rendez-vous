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
    <title>AJOUTER UTILISATEUR</title>
</head>
<body>
    <main>
        <div>
            <div class="col-3">
                <button type="submit" value="Ajouter une direction" class="btn btn-primary" data-toggle="modal" data-target="#ajoutUser">Ajouter un utilisateur</button>
            </div>
            <h1 style="margin-top:15px;border-style:outset">Liste des Utilisateurs</h1>
            <section class="resultat">
                <table >
                    <?php
                     include("../connexion_db.php");
                     $req = "SELECT * FROM users";
                     $res = $pdo->prepare($req);
                     $res->execute();
                     echo " <tr>
                                <th scope='col'>MATRICULE</th>
                                <th scope='col'>PRENOM</th>
                                <th scope='col'>NOM</th>
                                <th scope='col'>EMAIL</th>
                                <th scope='col'>TELEPHONE</th>
                                <th scope='col'>TYPE</th>
                                <th scope='col'>PROFIL</th>
                                <th scope='col'>ACTION 1</th>
                                <th scope='col'>ACTION 2</th>
                            </tr>";
                      
                if($result->rowCount()){
                    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                     ?>
                   
                    <tr>
                        <td data-label="Account"><?=  $row['id_users'] ;?></td>
                        <td data-label="Account"><?=  $row['prenom'] ;?></td>
                        <td data-label="Account"><?=  $row['nom'] ;?></td>
                        <td data-label="Account"><?=  $row['Email']; ?></td>
                        <td data-label="Account"><?=  $row['telephone']; ?></td>
                        <td data-label="Account"><?=  $row['type']; ?></td>
                        <td data-label="Account"><img src="images/<?= htmlentities($row['profil']);?>" alt="pas d'images" height="1 50" width="150"></td>
                        <td data-label="Account"> <button type="submit" class="btn-warning" data-toggle="modal" data-target="#editUser"><a style="color :black"  href="edit_user.php?edit=<?= $row['id_users']; ?>">Modifier</a></button> </td>
                        <td data-label="Account"> <button type="submit" class="btn-danger"><a style="color :black"  href="delete_user.php?del=<?= $row['id_users']; ?>">Supprimer</a></button></td> 
                                        
                    </tr>
                    <?php } }?>
                </table>
            </section>
                                    <!-- Ajouter un utilsateur -->
            <div class="modal fade" id="ajoutUser">
                <div class="modal-dialog"> 
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Ajouter un utilsateur</h4>
                            <button type="submit" class="close closemodal" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body row">
                            <form action="insert_users.php" method="post" class="col">
                                <div class="row">
                                        <div class="col-5 m-4">
                                            <input type="text" name="prenom" name="prenom" placeholder="Prenom : " class="form-control" required>
                                        </div><br><br><br>
                                        <div class="col-5 m-4">
                                            <input type="text" name="nom" id="nom" placeholder="Nom : " class="form-control" required>
                                        </div><br><br><br>
                                        <div class="col-11 m-4">
                                            <input type="text" name="Email" id="Email" placeholder="Email" class="form-control" required>
                                        </div><br><br><br>
                                        <div class="col-5 m-4">
                                            <select class="form-control" name="type" id="type" >
                                                <option value="" disabled selected>Type</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                        </div><br><br><br>
                                        <div class="col-11 m-4">
                                            <input type="password" name="passwrd" id="passwrd" placeholder="Mot de passe" class="form-control" required>
                                        </div><br><br><br>
                                        <div class="col-11 m-4">
                                            <input type="text" name="telephone" id="telephone" placeholder="Telephone" class="form-control" required>
                                        </div><br><br><br>
                                        <div class="col-3 m-4">
                                            <input type="file" name="profil" id="profil"  class="form-control" required>
                                        </div><br><br><br>
                                        <div class="col-12 m-4">
                                            <button type="submit" class="btn btn-primary"> Ajouter</button>
                                        </div>
                                </div>
                            </form>
                        </div><!--end modal-body row  -->
                    </div>
                </div>
            </div><!-- end modal fade -->  
        </div>
        <!-- dcript php -->
        <?php
        include("../connexion_db.php");

        // $id = $_GET['edit'];
        $id_users = '';
        $prenom = '';
        $nom = '';
        $mail = '';
        $password = '';
        $telephone= 221;
        $type = '';

        if($_SESSION['prenom'] !== ""){
            
            $user = $_SESSION['prenom'];
            $req = "SELECT * FROM users where id_users= $user";
            // $result=$pdo->prepare($req);
            // $result->execute();
        // $edit = "SELECT * FROM users  ";
        $res = $pdo->prepare($req);
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
        <?php }?>


                                 <!-- Modifier un utilsateur -->
            <div class="modal fade" id="editUser">
                <div class="modal-dialog"> 
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Modifier un utilisateur</h4>
                            <button type="submit" class="close closemodal" data-dismiss="modal">
                                <span>&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body row">
                            <form action="update_users.php?edit=<?= $user ;?>" method="post" class="col">
                                <div class="row">
                                        <div class="col-5 m-4">
                                            <input type="text" name="prenom" name="prenom" placeholder="Prenom : " class="form-control" value="<?= $prenom; ?>" required>
                                        </div><br><br><br>
                                        <div class="col-5 m-4">
                                            <input type="text" name="nom" id="nom" placeholder="Nom : " class="form-control"  value="<?= $nom; ?>" required>
                                        </div><br><br><br>
                                        <div class="col-11 m-4">
                                            <input type="text" name="Email" id="Email" placeholder="Email" class="form-control" required value="<?= $mail; ?>">
                                        </div><br><br><br>
                                        <div class="col-5 m-4">
                                            <select class="form-control" name="type" id="type" >
                                                <option value="" disabled selected>Type</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                        </div><br><br><br>
                                        <div class="col-11 m-4">
                                            <input type="password" name="passwrd" id="passwrd" placeholder="Mot de passe" class="form-control" value="<?= $password; ?>">
                                        </div><br><br><br>
                                        <div class="col-11 m-4">
                                            <input type="text" name="telephone" id="telephone" placeholder="Telephone" class="form-control" value="<?= $telephone; ?>">
                                        </div><br><br><br>
                                        <div class="col-12 m-4">
                                            <button type="submit" class="btn btn-primary"> Mise à jour</button>
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





