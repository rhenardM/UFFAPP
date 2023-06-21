<?php 
    $submit= @$_POST["submit"];
    $nom= @$_POST["no,"];
    $email= @$_POST["email"];
    $username = @$_POST["username"];
    $password = @$_POST["password"];
    $message='';
    $message2='';
        //The error message 
        if(isset($benrg)){ 
            if(empty($matricule)) $message="<li>Le champ matricule et laissé vide !</li>";
            if(empty($titre_livre)) $message="<li>Le champ titre et laissé vide !</li>";
            if(empty($genre_livre)) $message.="<li>Le champ genre livre et laissé vide ! </li>";
            if(empty($nom_auteur))$message.="<li>Le nom de l'autur et laissé vide !</li>";
           // if(empty($message and  $message2)){
                // include the page connexion 
                include ('');
                // 
                if (isset($_POST['submit']) && !empty($matricule) && !empty($titre_livre) && !empty($genre_livre) && !empty($nom_auteur) && !empty($pays_auteur) && !empty($region_auteur)
                && !empty($annee_sortie) && !empty($nombre)) 
                {
                    $sql=$pdo->prepare("INSERT INTO tb_livre(matricule,titre_livre,genre_livre,nom_auteur,pays_auteur,region_auteur,annee_sortie,nombre) 
                                            VALUES  (?, ?, ?, ?, ?,?,?,?)");                             
                    $sql->execute(array($matricule,$titre_livre,$genre_livre,$nom_auteur,$pays_auteur,$region_auteur,$annee_sortie,$nombre));                              
                                          
                    if($sql)
                    {
                        $message2.= "<b>Votre enregistrement a été éffectuée avec succès! </b>";
                    }
                    else
                    {
                        $message="<b>Erreur ! </b>";
                    }
        }
    }
//}

?>