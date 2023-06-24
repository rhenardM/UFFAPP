<?php
include_once("login-connexion.php");
$getFrais="";
    function getFrais(){
    $sql=$pdo->prepare("SELECT COUNT(*) AS nbre FROM  tb_frais");
    $sql->fetch(PDO::FETCH_OBJ);
    $result= $sql->execute(); 
}                
?>