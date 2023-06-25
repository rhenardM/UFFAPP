<?php 
if(isset($submit)){ 
    if(empty($nom_doc)) $message.="<li>Veuillez entrer le nom du document! </li>";
    if(empty($type_doc)) $message.="<li>Veuillez entrer le type du document! </li>";
    if(empty($nom_personne))$message.="<li>Veuillez entrer le nom de la personne !</li>";
    //include the connexion
    include "login-connexion.php";
        $sql="";
        $id = $_GET['id'];
        $sql=$pdo->prepare("SELECT * FROM tb_document WHERE id = $id");
        //$sql = FETCH_ASSOC($sql);
        $sql->execute(['id' => $id]);
        $sql->fetch(PDO::FETCH_OBJ);
    //Register doc
    if(isset($_POST['submit'])&&!empty($nom_doc)&&!empty($type_doc)&&!empty($nom_personne)&&!empty($descption))
        {                        
        // header("Location:index.php");
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
    
?>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modification de l'enregistrement</h1>
                <!--<button type="button" class="bt-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
            </div>
        <div class="modal-body">
              <form class="row g-3" method="POST">
                <input type="hidden" name="id" value="<?=@$sql['id']?>">
        <div class="col-md-6">
                    <label for="inputprenom" class="form-label">Nom du document</label>
                    <input type="text" class="form-control" name="nom_doc" value="<?php echo $sql["nom_doc"];?>" required>
        </div>
        <div class="col-md-6">
                    <label for="inputprenom" class="form-label">Type de document</label>
                    <input type="text" class="form-control" name="type_doc" value="<?=$sql['type_doc']?>" >
        </div>
        <div class="col-md-6">
                    <label for="inputprenom" class="form-label">Non de la personne</label>
                    <input type="text" class="form-control" name="nom_personne" value="<?=@$sql['nom_personne']?>" >
        </div>
        <div class="col-md-6">
                    <label for="inputprenom" class="form-label">Description</label>
                    <input type="text" class="form-control" name="descption" value="<?=@$sql['descption']?>">
        </div>
            <div class="modal-footer">
                <button type="submit" name="submit" value="" class="btn btn-primary">Mettre à jour</button>
                <button type="submit" name="" value="" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Annuler</button>
            </div>
            </form>
            </div>
        </div>
        </div>