<?php
  $benrg= @$_POST["benrg"];
  //$matricule=@$_POST["matricule"];
  $noms=@$_POST["noms"];
  $billet=@$_POST["billet"];
  $ouverture=@$_POST["ouverture"];
  $passport=@$_POST["passport"];
  $legalisation=@$_POST["legalisation"];
  $jugement=@$_POST["jugement"];
  $photo=@$_POST["photo"];
  $tranche1=@$_POST["tranche1"];
  $tranche2=@$_POST["tranche2"];
  $message='';
  $message2='';
    //The error message 
    if(isset($benrg)){ 
       // if(empty($date)) $message.="<li>Veuillez entrer la date! </li>";
        if(empty($noms))$message="<li>Veuillez entrer le nom et prenom du client !</li>";
        if(empty($billet))$message.="<li>Veuillez entrer le frais du billet !</li>";
        //if(empty($ouverture))$message.="<li>Veuillez entrer le frais de l'ouveture de dossier !</li>";
       // if(empty($passport)) $message.="<li> Veuillez entrer le frais de passeport !</li>";
        if(empty($legalisation)) $message.="<li>Veuillez entrer le frais de la legislation!</li>";
        if(empty($jugement)) $message.="<li>Veuillez entrer du jugement!</li>";
        if(empty($tranche1)) $message.="<li> Vueillez entrer le frais de la 1er tranche !</li>";
        if(empty($tranche2)) $message.="<li> Veuillez entrer le frais de la 2em tranche !</li>";
        //include the connexion
        include ("login-connexion.php");
        //Register frais
        if(isset($_POST['benrg'])&&!empty($noms)&&!empty($billet)&&!empty($ouverture)&&!empty($passport)&&!empty($legalisation)
        &&!empty($photo)&&!empty($jugement)&&!empty($tranche1)&&!empty($tranche2)){
            $sql=$pdo->prepare("INSERT INTO tb_frais(noms,date,billet,ouverture,passport,legalisation,photo,jugement,tranche1,tranche2)
                                      VALUES   (?,now(),?,?,?,?,?,?,?,?)");
            $sql->execute(array($noms,$billet,$ouverture,$passport,$legalisation,$photo,$jugement,$tranche1,$tranche2));  
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
          <li class="breadcrumb-item">Formulaire</li>
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
                  <label for="inputText" class="col-sm-2 col-form-label">Noms</label>
                  <div class="col-sm-3">
                    <input type="text"  name="noms" class="form-control" placeholder="Entrer le nom et prenom du payeur">
                  </div>
                </div>
              <div class="row mb-3">
                  <label for="inputTime" class="col-sm-2 col-form-label">1ère tranche</label>
                  <div class="col-sm-3">
                    <input type="number"  name="tranche1" class="form-control" placeholder="entrer le frais 1er tranche">
                  </div>
                  <label for="inputTime" class="col-sm-2 col-form-label">2ème Tranche</label>
                  <div class="col-sm-3">
                    <input type="number"  name="tranche2" class="form-control" placeholder="entrer le frais 2em trache">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Ouverture dossier</label>
                  <div class="col-sm-3">
                    <input type="number"  name="ouverture" class="form-control" placeholder="entrer le frais de l'ouverture">
                  </div>
                  <label for="inputNumber" class="col-sm-2 col-form-label">Passport</label>
                  <div class="col-sm-3">
                    <input type="number"  name="passport" class="form-control" placeholder="entrer le frais de passport">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber"  class="col-sm-2 col-form-label">Legalisation</label>
                  <div class="col-sm-3">
                    <input type="number" name="legalisation" class="form-control" placeholder="entrer le frais de ligislation">
                  </div>
                   <label for="inputNumber" class="col-sm-2 col-form-label">Photo</label>
                  <div class="col-sm-3">
                    <input type="number"  name="photo" class="form-control" placeholder="entrer le frais d'acompte">
                  </div>
                  
                </div>

                <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Jugement</label>
                  <div class="col-sm-3">
                    <input type="number"  name="jugement" class="form-control" placeholder="entrer le frais du jugement">
                  </div>
                  <label for="inputText" class="col-sm-2 col-form-label">billet</label>
                  <div class="col-sm-3">
                    <input type="number"  name="billet" class="form-control" placeholder="entrer le frais de billet">
                  </div>
                </div>
                <br>
                <div class="row mb-3">
                  <div class="col-sm-4  ">
                    <button type="submit" name="benrg" class="btn btn-primary">Valider</button>
                  </div>
                </div>
              </form>
              <!-- End General Form frais -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
  <!-- ======= footer ======= -->
<?php include "footer.php"; ?>
 <!-- End footer -->