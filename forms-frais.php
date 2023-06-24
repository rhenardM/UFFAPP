<?php
  $submit= @$_POST["submit"];
  //$matricule=@$_POST["matricule"];
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
  $message='';
  $message2='';
    //The error message 
    if(isset($submit)){ 
  
        if(empty($datePaie)) $message.="<li>Veuillez entrer la date! </li>";
        if(empty($f_billet))$message.="<li>Veuillez entrer le frais du billet !</li>";
        if(empty($f_ouverture_doss))$message.="<li>Veuillez entrer le frais de l'ouveture de dossier !</li>";
        if(empty($f_passport)) $message.="<li> Veuillez entrer le frais de passeport !</li>";
        if(empty($f_legalisation)) $message.="<li>Veuillez entrer le frais de la legislation!</li>";
        if(empty($f_jugement)) $message.="<li>Veuillez entrer du jugement!</li>";
        if(empty($f_acompte)) $message.="<li> Veuillez entrer le frais d'acompte!</li>";
        if(empty($f_tranche_1)) $message.="<li> Vueillez entrer le frais de la 1er tranche !</li>";
        if(empty($f_tranche_2)) $message.="<li> Veuillez entrer le frais de la 2em tranche !</li>";
        //include the connexion
        include "login-connexion.php";
        //Register frais
        if(isset($_POST['submit'])&&!empty($datePaie)&&!empty($f_billet)&&!empty($f_ouverture_doss)
        &&!empty($f_passport)&&!empty($f_legalisation)&&!empty($f_jugement)&&!empty($f_photo)&&!empty($f_acompte)&&!empty($f_tranche_1)&&!empty($f_tranche_2))
        {
          $sql=$pdo->prepare("INSERT INTO tb_frais(datePaie,f_billet,f_ouverture_doss,f_passport,f_legalisation,f_jugement,f_photo,f_acompte,f_tranche_1,f_tranche_2)
                                  VALUE   (?,?,?,?,?,?,?,?,?,?) ");
           $sql->execute(array($datePaie,$f_billet,$f_ouverture_doss,$f_passport,$f_legalisation,$f_jugement,$f_photo,$f_acompte,$f_tranche_1,$f_tranche_2));                              
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
<!DOCTYPE html>
<html lang="en">
<body>
 <!-- ======= Header ======= -->
 <?php include "header.php"; ?>
 <!-- End Header -->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Formulaire de frais</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="accueil.php">Accueil</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Frais</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-14">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
                <!--Success Message ! -->  
                <?php if (!empty($message)) {?>
                    <div class="alert alert-danger">
                        <?= $message ?>
                    </div>
                    <?php } ?>
                    <!--Success Message ! -->    
                    <?php if (!empty($message2)) {?>
                    <div class="alert alert-success">
                        <?= $message2 ?>
                    </div>
                    <?php } ?>
              <!-- General Form frais -->
              <form method="POST">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Ajouter un fichier</label>
                  <div class="col-sm-3">
                    <input class="form-control"  name="f_photo" type="file" id="formFile">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-3">
                    <input type="DATE"  name="datePaie" class="form-control" placeholder="">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Billet</label>
                  <div class="col-sm-3">
                    <input type="number"  name="f_billet" class="form-control" placeholder="entrer le frais de billet">
                  </div>
                  <label for="inputNumber" class="col-sm-2 col-form-label">Acompte</label>
                  <div class="col-sm-3">
                    <input type="number"  name="f_acompte" class="form-control" placeholder="entrer le frais d'acompte">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Ouverture dossier</label>
                  <div class="col-sm-3">
                    <input type="number"  name="f_ouverture_doss" class="form-control" placeholder="entrer le frais de l'ouverture">
                  </div>
                  <label for="inputNumber" class="col-sm-2 col-form-label">Passport</label>
                  <div class="col-sm-3">
                    <input type="number"  name="f_passport" class="form-control" placeholder="entrer le frais de passport">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber"  class="col-sm-2 col-form-label">Legalisation</label>
                  <div class="col-sm-3">
                    <input type="number" name="f_legalisation" class="form-control" placeholder="entrer le frais de ligislation">
                  </div>
                  <label for="inputNumber" class="col-sm-2 col-form-label">Jugement</label>
                  <div class="col-sm-3">
                    <input type="number"  name="f_jugement" class="form-control" placeholder="entrer le frais du jugement">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputTime" class="col-sm-2 col-form-label">1er tranche</label>
                  <div class="col-sm-3">
                    <input type="number"  name="f_tranche_1" class="form-control" placeholder="entrer le frais 1er tranche">
                  </div>
                  <label for="inputTime" class="col-sm-2 col-form-label">2em Tranche</label>
                  <div class="col-sm-3">
                    <input type="number"  name="f_tranche_2" class="form-control" placeholder="entrer le frais 2em trache">
                  </div>
                </div>
                <br>
                <div class="row mb-3">
                  <div class="col-sm-4  ">
                    <button type="submit" name="submit" class="btn btn-primary">Valider</button>
                  </div>
                </div>
              </form><!-- End General Form frais -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= footer ======= -->
<?php include "footer.php"; ?>
 <!-- End footer -->