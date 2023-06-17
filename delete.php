<?php
    include_once("main.php");


    if(!empty($_GET['matricule'])){
        $query="delete from tb_eleve where matricule=:matricule";
        $objstmt=$pdo->prepare($query);
        $objstmt->execute(["matricule"=>$_GET["matricule"]]);
        $objstmt->closeCursor();
        header("location:index.php");
    }
    
    
     
    

?>
