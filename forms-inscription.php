<?php 
    $submit= @$_POST["submit"];
    $nom= @$_POST["nom"];
    $id= @$_POST["id"];
    $postnom= @$_POST["postnom"];
    $prenom = @$_POST["prenom"];
    $sexe= @$_POST["sexe"];
    $numero =@$_POST["numero"];
    $age=  @$_POST["age"];
    $nom_tuteur= @$_POST["nom_tuteur"];
    $num_tuteur= @$_POST["num_tuteur"];
    $message='';
    $message2='';
        //The error message 
        if(isset($submit)){ 
            if(empty($nom)) $message="<li>Le champ nom et laissé vide !</li>";
            if(empty($postnom)) $message.="<li>Le postnom et laissé vide ! </li>";
            if(empty($prenom))$message.="<li>Le nom de l'autur et laissé vide !</li>";
            if(empty($sexe))$message.="<li>Veuillez inseret le pays de l'auteur !</li>";
            if(empty($numero)) $message.="<li> Veuillez entrer la region de l'auteur !</li>";
            if(empty($age)) $message.="<li>Veuillez inseret l'année de sortie du livre !</li>";
            if(empty($nom_tuteur)) $message.="<li> le champ et laisser vide !</li>";
            if(empty($num_tuteur)) $message.="<li> le champ et laisser vide !</li>";
           // if(empty($message and  $message2)){
                // include the connexion 
                include ('login-connexion.php');
                // 
                if (isset($_POST['submit']) && !empty($nom) && !empty($postnom) && !empty($prenom) && !empty($sexe) && !empty($numero) && !empty($age)
                && !empty($nom_tuteur)&& !empty($num_tuteur)) 
                {
                    $sql=$pdo->prepare("INSERT INTO tb_inscription(nom,postnom,prenom,sexe,numero,age,nom_tuteur,num_tuteur) 
                                            VALUES  (?, ?, ?, ?, ?,?,?,?)");                             
                    $sql->execute(array($nom,$postnom,$prenom,$sexe,$numero,$age,$nom_tuteur,$num_tuteur));
                    //header("Location:tables-inscription.php");                              
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
<!DOCTYPE html>
<html lang="en">
  
<body>
 <!-- ======= Header ======= -->
 <?php include "header.php"; ?>
 <!-- End Header -->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Formulaire d'inscription</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="accueil.php">Accueil</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Elements</li>
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
                    <!--error Message ! -->    
                    <?php if (!empty($message2)) {?>
                    <div class="alert alert-success">
                        <?= $message2 ?>
                    </div>
                    <?php } ?>
              <!-- General Form Elements -->
              <form method="POST">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Noms</label>
                  <div class="col-sm-3">
                    <input type="text" name="nom" class="form-control" placeholder="nom">
                  </div>
                  <div class="col-sm-3">
                    <input type="text" name="postnom" class="form-control" placeholder="post-nom">
                  </div>
                  <div class="col-sm-3">
                    <input type="text" name="prenom" class="form-control" placeholder="prenom">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Sexe</label>
                  <div class="col-sm-3">
                    <select class="form-select" name="sexe" aria-label="Default select example">
                      <option selected>Veuillez selectioner votre genre</option>
                      <option value="Homme">Homme</option>
                      <option value="Femme">Femme</option>
                      <option value="je m'abstient">je m'abtient</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Numero</label>
                  <div class="col-sm-3">
                    <input type="number" name="numero" class="form-control" placeholder="numéro de téléphone">
                  </div>
                  <label for="inputNumber" class="col-sm-1 col-form-label">Age</label>
                  <div class="col-sm-3">
                    <input type="number" name="age" class="form-control" placeholder="votre age">
                  </div>
                </div>
               
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Tuteur</label>
                  <div class="col-sm-3">
                    <input type="text" name="nom_tuteur" class="form-control" placeholder="nom du tuteur">
                  </div>
                  <label for="inputNumber" class="col-sm-1 col-form-label">Num</label>
                  <div class="col-sm-3">
                    <input type="number" name="num_tuteur"class="form-control" placeholder="numero du tuteur">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Entrer une photo</label>
                  <div class="col-sm-3">
                    <input class="form-control" type="file" id="formFile">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-4 d-flex-justify-content ">
                    <button type="submit" name="submit" class="btn btn-primary">Valider</button>
                    <button type="submit" class="btn btn-light">Annuler</button>
                  </div>
                </div>
              </form><!-- End General Form Elements -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <!-- ======= footer ======= -->
<?php include "footer.php"; ?>
 <!-- End footer -->