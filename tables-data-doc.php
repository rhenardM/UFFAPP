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
          <li class="breadcrumb-item"><a href="accuei.php">Accueil</a></li>
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
                  <!-- integration modal -->
                <?php require 'login-connexion.php';  
                
                  $query="select * from tb_document";
                  $pdostmt=$pdo->prepare($query);
                  $pdostmt->execute();
                ?>
                <?php while($ligne=$pdostmt->fetch(PDO::FETCH_ASSOC)):?>
                  <tr>
                    <th scope="row"></th>
                    <td><?php echo $ligne["nom_doc"]; ?>&nbsp;</td>
                    <td><?php echo $ligne["type_doc"]; ?>&nbsp;</td>
                    <td><?php echo $ligne["nom_personne"]; ?>&nbsp;</td>
                    <td><?php echo $ligne["descption"]; ?>&nbsp;</td>
                    <td>
                      <!-- integration modal -->
                      <?php //require 'login-connexion.php';?>
                      <!-- end integration modal -->
                      <?php require 'modal.php';?>
                      <div class="d-flex justify-content">
                      <button  type="button" class="btn btn-info bi bi-pencil-square btn-sm"  data-bs-toggle="modal"  data-bs-target="#exampleModal"></button>&nbsp;
                      <button class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
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