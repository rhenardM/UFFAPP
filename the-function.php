<?php
function update(){
if (require("login-connexion.php")) {
    if (isset($_POST["submit"])) {
        $id = $_POST['id']*1;
        $pdo=include("login-connexion.php");
        try {
        $req = $pdo->prepare("UPDATE tb_document SET nom_doc=:nom_doc, type_doc=:type_doc, nom_personne=:nom_personne, descption=:descption WHERE id =:id");
        //var_dump($req);
        $req->execute([
            'id'=>$id,
            'nom_doc'=>$_POST['nom_doc'],
            'type_doc'=>$_POST['type_doc'],
            'nom_personne'=>$_POST['nom_personne'],
            'descption'=>$_POST['descption']
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
        $req = $pdo->prepare('SELECT * FROM tb_document WHERE id=:id');
        $req->execute(['id'=>$id]);
        $tab = $req->fetch(PDO::FETCH_ASSOC);
        return $tab;
    }
}
?>


