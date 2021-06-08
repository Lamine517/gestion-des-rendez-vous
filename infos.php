<?php 
      include("connexion_db.php"); 
      include("navbar.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>RDV</title>
	<link rel="stylesheet"  href="style2.css">
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>


<body>
<div class="headerP" style="width: 15%;margin-top: 60px;color: white;background: rgb(86,52,24);text-align: center;border-radius: 10px 10px 5px 5px;border-bottom: none; border :1px solid rgb(86,52,24);padding: 10px;margin-left:-4px   ">
	<h2>Mes Informations</h2>
</div>



<form method="post" action="zindex.php"  class="infoP" style="margin-left:-1px; margin-top:0px ;width: 40%;padding: 20px;border :3px solid rgb(86,52,24) ;background: white; border-radius: 10px 10px 10px 10px;">

<div class="contentP" style="font-weight: bold;">

<?php  

include("connexion_db.php");
session_start();


if($_SESSION['prenom'] !== ""){
    $user = $_SESSION['prenom'];
    // $id = $_GET['email'];
                 $dat = 0;
                 $hd = '';
                 $hf = '';
                 $ob = '';
                 $dest = '';
                 $mat = '';
    $req = "SELECT * FROM prendrerv INNER JOIN users ON prendrerv.id_users=users.id_users where prenom= '$user'";
    $result=$pdo->prepare($req);
    $result->execute();


                 if ($result->rowCount() > 0){
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        $dat = $row['Date_RV'];
                        $hd = $row['Heure_Deb'];
                        $hf = $row['Heure_Fin'];
                        $ob = $row['Objet'];
                        $dest = $row['destinataire'];
                        $mat = $row['id_users'];
                        
                    }
                

                ?>

                <form>
                    <label> <b>Date :</b> <?php echo $dat; ?></label>
                    <br><br>
                            
                    <label> Heure Debut : <?php echo $hd; ?></label>
                    <br><br>
                    
                    <label> Heure Fin : <?php echo $hf; ?></label>
                    <br><br>
                    
                    <label> Objet : <?php echo $ob; ?></label>
                    <br><br>
                    
                    <label> Destinataire : <?php echo $dest; ?></label>
                    <br><br>
                   
                    <label> Matricule : <?php echo $mat; ?></label>
                    <br><br><hr/>
              
                </form>

    <?php } } else{ echo "<h2 text-align='center'>Aucune demande</h2>"; }	?>
</form>
</body>
</html>

    