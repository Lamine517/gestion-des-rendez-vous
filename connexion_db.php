<?php
  try {
    $pdo = new PDO("mysql:host=localhost;dbname=rdv","root","");
    
  } catch (PDOException $e) {
      die("Erreur : ".$e->getMessage);
  }
  