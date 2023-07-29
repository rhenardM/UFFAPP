<?php
  $submit= @$_POST["submit"];
  $type_doc=@$_POST["type_doc"];
  $nom_personne=@$_POST["nom_personne"];
  $message='';
  $message2='';
    //The error message 
    if(isset($submit)){ 
        if(empty($type_doc)) $message.="<li>Veuillez entrer le type du document! </li>";
        if(empty($nom_personne))$message.="<li>Veuillez entrer le nom de la personne !</li>";
        //include the connexion
        include "login-connexion.php";
        //Register doc
        if(isset($_POST['submit'])&&!empty($type_doc)&&!empty($nom_personne))
        {
            $sql=$pdo->prepare("INSERT INTO tb_document(type_doc,nom_personne)
                                      VALUE   (?,?)");
            $sql->execute(array($type_doc,$nom_personne,));                              
           // header("Location:tables-data-doc.php");
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
  <!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Formulaire de documents</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="accueil.php">Accueil</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Documents</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section" >
      <div class="row">
        <div class="col-lg-10">
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
              <!-- Browser Default Validation -->
              <form  method="POST" class="row g-3">
                <div class="col-md-4">
                  <label for="validationDefault02" class="form-label">Nom de la personne</label>
                  <input type="text" name="nom_personne" class="form-control" id="validationDefault02" value="" >
                </div>
                <div class="col-md-4">
                  <label for="validationDefault04" class="form-label">Type de document</label>
                  <select class="form-select" value="type_doc" name="type_doc" id="validationDefault04">
                    <option selected disabled value="">Choisir...</option>
                    <option>Attestation de naissance</option>
                    <option>Attestation de reussite</option>
                    <option>Diplome d'Etat</option>
                    <option>Diplome graduat</option>
                    <option>Diplome licence</option>
                  </select>
                </div>    
                <div class="col-12">
                  <button class="btn btn-primary" name="submit" type="submit">Valider</button>
                </div>
              </form>
              <!-- End Browser Default Validation -->
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->
<!-- ======= footer ======= -->
<?php include "footer.php"; ?>
 <!-- End footer -->