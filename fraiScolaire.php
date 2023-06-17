
<?php 
    include_once ("header.php");
    include_once("main.php");
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gestion_db";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    } 

    $matricule=@$_POST["matricule"];
    $datePaie=@$_POST["datePaie"];
    $f_billet=@$_POST["f_billet"];
    $f_ouverture_doss=@$_POST["f_ouverture_doss"];
    $f_passport=@$_POST["f_passport"];
    $f_legalisation=@$_POST["f_legalisation"];
    $f_jugement=@$_POST["f_jugement"];
    $f_photo=@$_POST["f_photo"];
    $f_acompte=@$_POST["f_acompte"];
    $f_tranche_1=@$_POST["f_tranche_1"];
    $f_tranche_2=@$_POST["f_tranche_2"];
    $objstmt;

    //Enregistrement des élèves
    if(isset($_POST['benrg'])&&!empty($matricule)&&!empty($datePaie)&&!empty($f_billet)&&!empty($f_ouverture_doss)
    &&!empty($f_passport)&&!empty($f_legalisation)&&!empty($f_jugement)&&!empty($f_photo)&&!empty($f_acompte)&&!empty($f_tranche_1)&&!empty($f_tranche_2)){
    $sql=mysqli_query($conn,"insert into tb_inscription(matricule,datePaie,f_billet,f_ouverture_doss,f_passport,f_legalisation,f_jugement,f_photo,f_acompte,f_tranche_1,f_tranche_2) values('$matricule','$datePaie','$f_billet','$f_ouverture_doss','$f_passport','$f_legalisation','$f_jugement','$f_photo','$f_acompte','$f_tranche_1','$f_tranche_2') ");
    header("Location:index.php");
    }
?>

    <h1 class="mt-5">Liste des frais</h1>
        <button type="button" class="btn btn-primary" style="float:right;margin-bottom:20px;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
            </svg>
        </button>
    
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter  un inscrit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form class="row g-3" method="POST">
                    <div class="col-md-6">
                            <label for="inputsexe" class="form-label">matricule</label>
                            <select class="form-control" name="sexe" id="matricule" required>
                            <option  value="<?php echo $matricule; ?>"><?php echo $matricule; ?>Selectionner</option>
                            <option  value="$matricule"></option>
                            </select>
                    </div>
                    <div class="col-md-6">
                                <label for="datePaie" class="form-label">datePaie</label>
                                <input type="date" class="form-control" name="datePaie" value="<?php print $datePaie;?>" >
                    </div>
                    <div class="col-md-6">
                                <label for="f_billet" class="form-label">frais_billet</label>
                                <input type="decimal" class="form-control" name="frais_billet" value="<?php print $f_billet;?>" >
                    </div>
                    <div class="col-md-6">
                                <label for="f_billet" class="form-label">frais_ouverture</label>
                                <input type="decimal" class="form-control" name="f_ouverture_doss" value="<?php print $f_ouverture_doss;?>" >
                    </div>
                    <div class="col-md-6">
                                <label for="f_passport" class="form-label">frais_passport_doss</label>
                                <input type="decimal" class="form-control" name="f_passport" value="<?php print $f_passport;?>" >
                    </div>
                    <div class="col-md-6">
                                <label for="f_legalisation" class="form-label">frais_legalisation</label>
                                <input type="decimal" class="form-control" name="f_legalisation" value="<?php print $f_legalisation;?>" >
                    </div>
                    <div class="col-md-6">
                                <label for="f_jugement" class="form-label">frais_jugement</label>
                                <input type="decimal" class="form-control" name="f_jugement" value="<?php print $f_jugement;?>" >
                    </div>
                    <div class="col-md-6">
                                <label for="f_photo" class="form-label">frais_photo</label>
                                <input type="f_photo" class="form-control" name="f_photo" value="<?php print $f_photo;?>" >
                    </div>
                    <div class="col-md-6">
                                <label for="f_acompte" class="form-label">frais_acompte</label>
                                <input type="decimal" class="form-control" name="f_acompte" value="<?php print $f_acompte;?>" >
                    </div>
                    <div class="col-md-6">
                                <label for="f_tranche_1" class="form-label">frais_tranche_1</label>
                                <input type="decimal" class="form-control" name="mtpaye" value="<?php print $f_tranche_1;?>" >
                    </div>
                    <div class="col-md-6">
                                <label for="f_tranche_2" class="form-label">frais_tranche_2</label>
                                <input type="decimal" class="form-control" name="f_tranche_2" value="<?php print $f_tranche_2;?>" >
                    </div>
            </div>
            <div class="modal-footer">
                <input type="submit" name="benrg" value="ENREGISTRER" class="btn btn-primary">
            </div>
            </form>
            </div>
        </div>
        </div>
    <?php
        $query="select * from tb_frais";
        $pdostmt=$pdo->prepare($query);
        $pdostmt->execute();
        //var_dump($pdostmt->fetchAll(PDO::FETCH_ASSOC));
    ?>
    <table id="table_test" class="display"><font></font>
    <thead><font></font>
        <tr><font></font>
            <th>MATRICULE</th><font></font>
            <th>DATEPAIE</th><font></font> 
            <th>FRAIS_BILLET</th><font></font>   
            <th>FRAIS_OUVERTURE</th><font></font>   
            <th>FRAIS_PASSPORT</th><font></font>   
            <th>FRAIS_LEGALISATION</th><font></font>
            <th>FRAIS_JUGEMENT</th><font></font>   
            <th>FRAIS_PHOTO</th><font></font> 
            <th>FRAIS_ACOMPTE</th><font></font>
            <th>FRAIS_TRANCHE_1</th><font></font>   
            <th>FRAIS_FRANCH_2</th><font></font> 
            <th>ACTION</th><font></font>          
        </tr><font></font>
    </thead><font></font>
    <tbody><font></font>
        <?php while($ligne=$pdostmt->fetch(PDO::FETCH_ASSOC)):?>
        <tr><font></font>
            <td><?php echo $ligne["matricule"]; ?></td><font></font>
            <td><?php echo $ligne["datePaie"]; ?></td><font></font>
            <td><?php echo $ligne["f_billet"]; ?></td><font></font>
            <td><?php echo $ligne["f_ouverture_doss"]; ?></td><font></font>
            <td><?php echo $ligne["f_passport"]; ?></td><font></font>
            <td><?php echo $ligne["f_legalisation"]; ?></td><font></font>
            <td><?php echo $ligne["f_jugement"]; ?></td><font></font>
            <td><?php echo $ligne["f_photo"]; ?></td><font></font>
            <td><?php echo $ligne["f_acompte"]; ?></td><font></font>
            <td><?php echo $ligne["f_tranche_1"]; ?></td><font></font>
            <td><?php echo $ligne["f_tranche_2"]; ?></td><font></font>
            <td>
            <div class="d-flex">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalLabel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                </button>
            </div>
            </td><font></font>
        </tr><font></font>

            <!-- Modal -->
            <div class="modal fade" id="ModalLabel" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">suppresion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        voulez vous supprimer ce client ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger">supprimer</button>
                </div>
                </div>
            </div>
            </div>
        <?php endwhile; ?>
    </tbody><font></font>
    </table><font></font>
  </div>
</main>

<?php 
    include_once("footer.php");
?>
