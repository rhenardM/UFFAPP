<?php
function update(){
if (require("login-connexion.php")) {
    if (isset($_POST["submit"])) {
        $id = $_POST['id']*1;
        $pdo=include("login-connexion.php");
        try {
        $req = $pdo->prepare("UPDATE tb_inscription SET nom=:nom, postnom=:postnom, prenom=:prenom, sexe=:sexe, numero=:numero, age=:age,nom_tuteur=:nom_tuteur,num_tuteur=:num_tuteur  WHERE id=:id");
        var_dump($req);
        $req->execute([
            'id'=>$id,
            'nom'=>$_POST['nom'],
            'postnom'=>$_POST['postnom'],
            'prenom'=>$_POST['prenom'],
            'sexe'=>$_POST['sexe'],
            'age'=>$_POST['age'],
            'nom_tuteur'=>$_POST['nom_tuteur'],
            'num_tuteur'=>$_POST['num_tuteur']
        ]);
            header("Location:tables-inscription.php");
            echo'Enregistrement modifier avec succes ';        
        } 
        catch (PDOException $e) {
        echo'Enregistrement non modifier!'.$e;
        }
        return $change;
        }
    }
}

function show($id){ 
    if (require("login-connexion.php")) {
        $req = $pdo->prepare('SELECT * FROM tb_inscription WHERE id=:id');
        $req->execute(['id'=>$id]);
        $tab = $req->fetch(PDO::FETCH_ASSOC);
        return $tab;
    }
}
?>


