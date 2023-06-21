<?php 
  $id="";
  include('the-function.php');
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
                    <label for="inputprenom" class="form-label">Nom</label>
                    <input type="text" class="form-control" name="nom" value="<?=@$tab['nom']?>" required>
        </div>
        <div class="col-md-6">
                    <label for="inputprenom" class="form-label">Post-nom</label>
                    <input type="text" class="form-control" name="postnom" value="<?=@$tab['postnom']?>" required>
        </div>
        <div class="col-md-6">
                    <label for="inputprenom" class="form-label">Prenom</label>
                    <input type="text" class="form-control" name="prenom" value="<?=@$tab['prenom']?>" required>
        </div>
        <div class="col-md-6">
                    <label for="inputsexe" class="form-label">Sexe</label>
                    <select class="form-control" name="sexe" id="sexe" required>
                    <option  value="">Selectionner</option>
                    <option  value="M">Homme</option>
                    <option  value="F">Femme</option>
                    <option  value="Je m'abstient">Je m'abstient</option>
                    </select>
        </div>
        <div class="col-md-6">
                    <label for="inputdatenaissance" class="form-label">Numero</label>
                    <input type="text" class="form-control" name="numero" value="<?=@$tab['numero']?>" required>
        </div>
        <div class="col-md-6">
                    <label for="mtpaye" class="form-label">Age</label>
                    <input type="text" class="form-control" name="age" value="<?=@$tab['age']?>" >
        </div>
        <div class="col-md-6">
                    <label for="quartier" class="form-label">Adresse  </label>
                    <input type="text" class="form-control" name="" value="" required>
        </div>
        <div class="col-md-6">
                <label for="contact" class="form-label">Nom du tuteur</label>
                <input type="text" class="form-control" name="nom_tuteur" value="<?=@$tab['nom_tuteur']?>" required>
        </div>
        <div class="col-md-6">
                <label for="contact" class="form-label">Numéro du tuteur</label>
                <input type="text" class="form-control" name="num_tuteur" value="<?=@$tab['num_tuteur']?>" required>
        </div>
        </div>
            <div class="modal-footer">
                <button type="submit" name="submit" value="valider" class="btn btn-primary">Mettre à jour</button>
                <button type="submit" name="" value="" class="btn btn-light" data-bs-dismiss="modal" aria-label="Close">Annuler</button>
            </div>
            </form>
            </div>
        </div>
        </div>