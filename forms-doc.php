<?php
  $submit= @$_POST["submit"];
  $nom_doc= @$_POST["nom_doc"];
  $type_doc=@$_POST["type_doc"];
  $nom_personne=@$_POST["nom_personne"];
  $descption=@$_POST["descption"];
  $message='';
  $message2='';
    //The error message 
    if(isset($submit)){ 
        if(empty($nom_doc)) $message.="<li>Veuillez entrer le nom du document! </li>";
        if(empty($type_doc)) $message.="<li>Veuillez entrer le type du document! </li>";
        if(empty($nom_personne))$message.="<li>Veuillez entrer le nom de la personne !</li>";
        //include the connexion
        include "login-connexion.php";
        //Register doc
        if(isset($_POST['submit'])&&!empty($nom_doc)&&!empty($type_doc)&&!empty($nom_personne)&&!empty($descption))
        {
            $sql=$pdo->prepare("INSERT INTO tb_document(nom_doc,type_doc,nom_personne,descption)
                                      VALUE   (?,?,?,?)");
            $sql->execute(array($nom_doc,$type_doc,$nom_personne,$descption));                              
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
                  <label for="validationDefault01" class="form-label">Nom du document</label>
                  <input type="text" name="nom_doc" class="form-control" id="validationDefault01" value="" >
                </div>
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
                <div class="col-md-6">
                  <label for="validationDefault03" class="form-label">Description</label>
                  <textarea class="form-control" name="descption" style="height: 100px"></textarea>
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