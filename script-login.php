<?php
session_start();
if(isset($_POST['valider'])){
  if(isset($_POST['username']) and !empty($_POST['username'])){
     if(filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)){
        if(isset($_POST['password']) and !empty($_POST['password'])){

            require 'login-connexion.php';

            $password = md5($_POST['password']);

            $getdata = $pdo->prepare("SELECT login FROM users WHERE login =? and pass=?");
            $getdata->execute(array($_POST['username'], $password));

            $rows = $getdata->rowCount();

            if($rows==true){
                $_SESSION['users']=$_POST['username'];
                header("location:accueil.php"); 

            }else{
                $erreur="Nom d'utlisateur ou mot de passe inconnue !";  
            }
            
        }else{
            $erreur="Veuillez saisire votre mot de passe !";
        }
        
     }else{
        $erreur="Veuillez entrer un nom d'utilisateur valide !";
     }
    }else{
        $erreur="Veuillez entrer un nom d'utlisateur !";
    }
}
?>