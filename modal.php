<?php 
  include('the-function.php');
  $id="";
  $req = $_SERVER["REQUEST_URI"];
  $tab = explode("=" ,$req);
  $id = $tab[1];
  $tab = show($id);
  $change= update();
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
                <input type="hidden" name="id" value="<?=@$tab['id']?>">
        <div class="col-md-6">
                    <label for="inputprenom" class="form-label">Nom du document</label>
                    <input type="text" class="form-control" name="nom_doc" value="<?=@$tab['nom_doc']?>" >
        </div>
        <div class="col-md-6">
                    <label for="inputprenom" class="form-label">Type de document</label>
                    <input type="text" class="form-control" name="type_doc" value="<?=@$tab['type_doc']?>" >
        </div>
        <div class="col-md-6">
                    <label for="inputprenom" class="form-label">Non de la personne</label>
                    <input type="text" class="form-control" name="nom_personne" value="<?=@$tab['nom_personne']?>" >
        </div>
        <div class="col-md-6">
                    <label for="inputprenom" class="form-label">Description</label>
                    <input type="text" class="form-control" name="descption" value="<?=@$tab['descption']?>">
        </div>
            <div class="modal-footer">
                <button type="submit" name="submit" value="" class="btn btn-primary">Mettre à jour</button>
                <button type="submit" name="" value="" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Annuler</button>
            </div>
            </form>
            </div>
        </div>
        </div>