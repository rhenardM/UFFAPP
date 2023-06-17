<?php 
    $username= "localhost";
    $user= "root";
    $password= "";


    $db_name= "gestion_db";
    $conn = mysqli_connect($username, $user, $password, $db_name);

    if (!$conn) {
        echo "connexion failed!";
    }

?>