    <?php 
        include_once("header.php");
        include_once("main.php");
    ?>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "inscription_db";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    } 
    ?>
    <?php
        $matricule=@$_POST["matricule"];
        $classe2=@$_POST["classe2"];
        $mtpaye=@$_POST["mtpaye"];
        $mess1='';
        $mess2='';
        $mess3='';
        
        $prenom=@$_POST["prenom"];
        $nom=@$_POST["nom"];
        $sexe=@$_POST["sexe"];
        $dateN=@$_POST["dateN"];
        $classe=@$_POST["classe"];
        $quartier=@$_POST["quartier"];
        $contact=@$_POST["contact"];
        $s_classe=@$_POST["s_classe"];
        $s_ecole=@$_POST["s_ecole"];
        $objstmt;
    ?>
   <h1 class="mt-5">MODIFIER UN ELEVE</h1>
    <form class="row g-3" method="POST">
        <div class="col-md-6">
                    <label for="inputprenom" class="form-label">MATRICULE</label>
                    <input type="text" class="form-control" name="matricule" value="<?php print "$matricule";?>"required>
        </div>
        <div class="col-md-6">
                    <label for="inputprenom" class="form-label">PRENOM</label>
                    <input type="text" class="form-control" name="prenom" value="" required>
        </div>
        <div class="col-md-6">
                    <label for="inputprenom" class="form-label">NOM</label>
                    <input type="text" class="form-control" name="nom" value="" required>
        </div>
        <div class="col-md-6">
                    <label for="inputsexe" class="form-label">SEXE</label>
                    <select class="form-control" name="sexe" id="sexe" required>
                    <option  value="<?php echo $sexe; ?>"><?php echo $sexe; ?>Selectionner</option>
                    <option  value="MASCULIN">MASCULIN</option>
                    <option  value="FEMININ">FEMININ</option>
                    </select>
        </div>
        <div class="col-md-6">
                    <label for="inputdatenaissance" class="form-label">DATANAISSANCE</label>
                    <input type="text" class="form-control" name="dateN" value="" required>
        </div>
        <div class="col-md-6">
                    <label for="classe" class="form-label">CLASSE</label>
                    <select type="text" class="form-control" name="classe" id="classe" required>
                    <option  value="<?php echo $classe; ?>"><?php echo $classe; ?>Selectionner une classe</option>
                        <option  value="1ere A">1ere A</option>
                        <option  value="1ere B">1ere B</option>
                        <option  value="2nde A">2nde A</option>
                        <option  value="2nde B">2nde B</option>
                        <option  value="3eme">3eme</option>
                        <option  value="4eme">4eme</option>
                        <option  value="5eme">5eme</option>
                        <option  value="6eme">6eme</option>
                        <option  value="7eme">7eme</option>
                        <option  value="8eme">8eme</option>
                    </select>
        </div>
        <div class="col-md-6">
                    <label for="mtpaye" class="form-label">MONTANTPAYE</label>
                    <input type="decimal" class="form-control" name="mtpaye" value="" >
        </div>
        <div class="col-md-6">
                    <label for="quartier" class="form-label">QUARTIER</label>
                    <input type="text" class="form-control" name="quartier" value="" required>
        </div>
        <div class="col-md-6">
                <label for="contact" class="form-label">CONTACT_TUTEUR</label>
                <input type="text" class="form-control" name="contact" value="" required>
        </div>
        <div class="col-md-6">
                <label for="inputsituation_classe" class="form-label">SITUATION_CLASSE</label>
                <select type="text" class="form-control" id="s_classe" name="s_classe" required>
                <option  value="<?php echo $s_ecole; ?>"><?php echo  $s_ecole; ?>Selectionner</option>
                    <option  value="ANCIEN(NE)">ANCIEN(NE)</option>
                    <option  value="NOUVEAU/NOUVELLE">NOUVEAU/NOUVELLE</option> 
                </select>
        </div>
        <div class="col-md-6">
                <label for="inputsituation_ecole" class="form-label">SITUATION_ECOLE</label>
                <select type="text" class="form-control" id="s_ecole" name="s_ecole" required>
                <option  value="<?php echo $s_ecole; ?>"><?php echo  $s_ecole; ?>Selectionner</option>
                    <option  value="ANCIEN(NE)">ANCIEN(NE)</option>
                    <option  value="NOUVEAU/NOUVELLE">NOUVEAU/NOUVELLE</option> 
                </select>
        </div>
        <div class="col-12">
                <input type="submit" name="bmodif" value="MODIFIER" class="btn btn-primary">
         </div>
   </form>



  </div> 
</main>

<?php
    //Modification d'un enregistrement 
    if(isset($_POST['bmodif'])&&!empty($matricule)){
    //$sql=mysqli_query($conn,"update tb_eleve set prenom='$prenom',nom='$nom',sexe='$sexe',dateNaissance='$dateN',classe='$classe', quartier='$quartier', contacTuteur='$contact',situation_classe='$s_classe',situation_ecole='$s_ecole'  where matricule='$matricule'");
        //prenom
        if(!empty($prenom)){
          mysqli_query($conn,"update tb_eleve set prenom='$prenom' where matricule='$matricule'");
          $mess2="<b>Modification éffectuée avec succès ! </b>";
        }
        //nom
        if(!empty($nom)){
          mysqli_query($conn,"update tb_eleve set nom='$nom' where matricule='$matricule'");
          $mess2="<b>Modification éffectuée avec succès ! </b>";
        }
        //sexe
        if(!empty($sexe)){
          mysqli_query($conn,"update tb_eleve set sexe='$sexe' where matricule='$matricule'");
          $mess2="<b>Modification éffectuée avec succès ! </b>";
        }
        //date de naissance
        if(!empty($dateN)){
          mysqli_query($conn,"update tb_eleve set dateNaissance='$dateN' where matricule='$matricule'");
          $mess2="<b>Modification éffectuée avec succès ! </b>";
        }
        //classe
        if(!empty($classe)){
          mysqli_query($conn,"update tb_eleve set classe='$classe' where matricule='$matricule'");
          $mess2="<b>Modification éffectuée avec succès ! </b>";
        }
        //quartier
        if(!empty($quartier)){
          mysqli_query($conn,"update tb_eleve set quartier='$quartier' where matricule='$matricule'");
          $mess2="<b>Modification éffectuée avec succès ! </b>";
        }
        //Contact tuteur
        if(!empty($contact)){
          mysqli_query($conn,"update tb_eleve set contacTuteur='$contact' where matricule='$matricule'");
          $mess2="<b>Modification éffectuée avec succès ! </b>";
        }
        //situation en classe
        if(!empty($s_classe)){
          mysqli_query($conn,"update tb_eleve set situation_classe='$s_classe' where matricule='$matricule'");
          $mess2="<b>Modification éffectuée avec succès ! </b>";
        }
        //situation dans l'école
        if(!empty($s_ecole)){
          mysqli_query($conn,"update tb_eleve set situation_ecole='$s_ecole' where matricule='$matricule'");
          $mess2="<b>Modification éffectuée avec succès ! </b>";
        }
    }
    
?>

<?php
    include_once("footer.php")
?>