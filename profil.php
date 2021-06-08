<?php
    include("connexion_db.php"); 
    include("navbar.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>RDV</title>
	<link rel="stylesheet"  href="css/styleHeader.css">
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>


<body>
<div class="headerP" style="width: 250px; height:60px; margin-top: 130px;color: white;background: rgb(86,52,24);text-align: center;border-radius: 10px 10px 5px 5px;border-bottom: none; border :1px solid rgb(86,52,24);padding: 0px;margin-left:10px   ">
	<h2>Mon profil</h2>
</div>
<form method="post" action="index.php"  class="infoP" style="margin-left:10px; margin-top:0px ;width: 40%;padding: 20px;border :3px solid rgb(86,52,24) ;background: white; border-radius: 10px 10px 10px 10px;">

<div class="contentP" style="font-weight: bold;">

<?php  

include("connexion_db.php");
session_start();


if($_SESSION['prenom'] !== ""){
    $user = $_SESSION['prenom'];
    $req = "SELECT * FROM users where prenom= '$user'";
    $result=$pdo->prepare($req);
    $result->execute();


                 if ($result->rowCount() > 0){
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        $id = $row['id_users'];
                        $prenom = $row['prenom'];
                        $nom = $row['nom'];
                        $email = $row['Email'];
                        $tel = $row['telephone'];
                        $passwrd = $row['passwrd'];
                        $profil = htmlentities($row['profil']);
                    }
                

                ?>

                <form>
                     <div class="row mx-auto">
                     <!-- <img src="images/avatar1.png" alt="err"><br> -->
                     <img src="images/<?= $profil;?>" height="150" width="150" alt="pas d'image">
                     </div>
                    <label> Matricule <?php echo $id; ?></label>
                    <br><br>
                            
                    <label>Prénom : <?php echo $prenom; ?></label>
                    <br><br>
                    
                    <label>Nom : <?php echo $nom; ?></label>
                    <br><br>
                    
                    <label> Email: <?php echo $email; ?></label>
                    <br><br>
                   
                    <label> Numéro de Téléphone : <?php echo $tel; ?></label>
                    <br><br><hr/>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ajout">Modifier</button>
              
                </form>

    <?php } } else{ echo "<h2 text-align='center'>Aucune demande</h2>"; }	?>
</form>


<div class="modal fade" id="ajout">
     <div class="modal-dialog"> 
         <div class="modal-content">
             <div class="modal-header">
                 <h4 class="modal-title">Modifier votre profil</h4>
                 <button type="submit" class="close closemodal" data-dismiss="modal">
                     <span>&times;</span>
                 </button>
             </div>
             
             <div class="modal-body row">
                  <form action="update_users.php?edit=<?= $id ;?>" method="post" class="col">
                      <div class="row">
                      <div class="col-9">
                         <input type="file" name="profil" id="profil" class="form-control " value="<?= $profil;?>">
                      </div><br><br><br>
                      <div class="col-9">
                         <input type="text" name="id_users" id="id_users" class="form-control " placeholder="Matricule" value="<?= $id;?>">
                      </div><br><br><br>
                      <div class="col-9">
                         <input type="text" name="prenom" id="prenom" class="form-control " placeholder="Prénom" value="<?= $prenom; ?>">
                      </div><br><br><br>
                      <div class="col-9">
                         <input type="text" name="nom" id="nom" class="form-control " placeholder="Nom" value="<?= $nom; ?>">
                      </div><br><br><br>
                      <div class="col-9">
                         <input type="email" name="Email" id="Email" class="form-control " placeholder="Email" value="<?= $email; ?>">
                      </div><br><br><br>
                      <div class="col-9">
                         <input type="password" name="passwrd" id="passwrd" class="form-control " placeholder="Mot de passe" value="<?= $passwrd; ?>">
                      </div><br><br><br>
                      <div class="col-9">
                         <input type="text" name="telephone" id="telephone" class="form-control " placeholder="Numéro de Téléphone " value="<?= $tel; ?>">
                      </div><br><br><br>
                      </div>
                      <button type="submit" class="btn btn-primary pull-right"> Mise à jour</button>
                     
                  </form>
             </div>
         </div>
     </div>
 </div>
 <script src="plugins/jquery/jquery-3.6.0.min.js"></script>
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

    