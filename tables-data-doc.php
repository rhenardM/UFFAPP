<!DOCTYPE html>
<html lang="en">

<body>
  <!-- ======= Header ======= -->
  <?php include "header.php"; ?>
 <!-- End Header -->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Documents enregistrer</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="accueil.php">Accueil</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Enregistrement du documents</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Table d'enregistrement de document</h5>
              <!-- Default Table -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Nom document</th>
                    <th scope="col">Type de document</th>
                    <th scope="col">Nom de la personne</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Include the connexion-->
                  <?php require 'login-connexion.php';  ?>
                  <?php //require 'modal.php';?>
                  <!-- Delete info-->
                <?php           
                    $id="";
                    if(isset($_POST['delete'])){
                    $id = $_POST['id'];
                    $sql= $pdo->prepare("DELETE FROM tb_document WHERE id = :id");
                    $sql->fetch(PDO::FETCH_OBJ);
                    $result= $sql->execute(['id'=>$id]);
                  }
                ?>
                <!-- Affichage  info-->
                <?php 
                  $query="SELECT * FROM tb_document";
                  $pdostmt=$pdo->prepare($query);
                  $pdostmt->execute();
                ?>
                <?php while($ligne=$pdostmt->fetch(PDO::FETCH_ASSOC)):?>
                  <tr>
                    <th scope="row"><!--?php echo $ligne["id"]; ?--></th>
                    <td><?php echo $ligne["nom_doc"]; ?>&nbsp;</td>
                    <td><?php echo $ligne["type_doc"]; ?>&nbsp;</td>
                    <td><?php echo $ligne["nom_personne"]; ?>&nbsp;</td>
                    <td><?php echo $ligne["descption"]; ?>&nbsp;</td>
                    <td>
                      <!-- integration modal -->
             
                      <!-- end integration modal -->
                      <div class="d-flex justify-content">
                      <button type="button" class="btn btn-info bi bi-pencil-square btn-sm"  data-bs-toggle="modal"  data-bs-target="#exampleModal"></button>&nbsp;
                      <form onsubmit="alert('Vous le vous vraiment supprimer cet enregistrement ?')" method="post">
                          <input type="hidden" name="id" value="<?php echo $ligne["id"]; ?>">
                          <button name="delete" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
                      </form>      
                      </div>
                    </td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
    </section>
  </main><!-- End #main -->
<!-- ======= footer ======= -->
<?php include "footer.php"; ?>
 <!-- End footer -->