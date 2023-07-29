<?php 
   $host = 'localhost';
   $user = 'root';
   $pass = '';
   $data = 'gestion_db';
   try {
    $pdo =new PDO("mysql:host=$host;dbname=$data", $user, '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //echo'connexion reussie ';
 } catch (Exception $e) {
    echo'Echec de la connexion'.$e->getMessage();
}