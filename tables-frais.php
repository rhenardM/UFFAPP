<!DOCTYPE html>
<html lang="en">
<body>
  <!-- ======= Header ======= -->
  <?php include "header.php"; ?>
<!-- End Header -->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Table d'enregistrement</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="accueil.php">Accueil</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Table</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Les enregistrements de frais</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Noms du payeur</th>
                    <th scope="col">1ère Tranche</th>
                    <th scope="col">2ème Tranche</th>
                    <th scope="col">Dossier</th>
                    <th scope="col">passeport</th>
                    <th scope="col">législation</th>
                    <th scope="col">Jugement</th>
                    <th scope="col">biellet</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Date de paye</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php require 'login-connexion.php';?>
                    <!-- Delete info-->
                <?php           
                    $id="";
                    if(isset($_POST['delete'])){
                    $id = $_POST['id'];
                    $sql= $pdo->prepare("DELETE FROM tb_frais WHERE id = :id");
                    $sql->fetch(PDO::FETCH_OBJ);
                    $result= $sql->execute(['id'=>$id]);
                  }
                ?>
                    <!-- Affichage info-->
                <?php
                    $query="select * from tb_frais";
                    $pdostmt=$pdo->prepare($query);
                    $pdostmt->execute();
                ?>
                <?php while($ligne=$pdostmt->fetch(PDO::FETCH_ASSOC)):?>
                  <tr>
                    <td><?php echo $ligne["noms"]; ?>&nbsp;</td>
                    <td><?php echo $ligne["tranche1"]; ?>&nbsp;$</td>
                    <td><?php echo $ligne["tranche2"]; ?>&nbsp;$</td>
                    <td><?php echo $ligne["ouverture"]; ?>&nbsp;$</td>
                    <td><?php echo $ligne["passport"]; ?>&nbsp;$</td>
                    <td><?php echo $ligne["legalisation"]; ?>&nbsp;$</td>
                    <td><?php echo $ligne["jugement"]; ?>&nbsp;$</td>
                    <td><?php echo $ligne["photo"]; ?></td>
                    <td><?php echo $ligne["billet"]; ?>&nbsp;$</td>
                    <td><?php echo $ligne["date"]; ?></td>
                    <td>
                      <div class="d-flex justify-content">
                          <button  type="button" class="btn btn-info bi bi-pencil-square btn-sm"  data-bs-toggle="modal" data-bs-target="#exampleModal"> 
                          </button>&nbsp;
                      <form onsubmit="alert('Vous le vous vraiment supprimer cet enregistrement ?')" method="post">
                          <input type="hidden" name="id" value="<?php echo $ligne["id"]; ?>">
                          <button name="delete" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
                      </form> 
                      </div>
                    </td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table><br>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

<!-- ======= footer ======= -->
<?php include "footer.php"; ?>
 <!-- End footer -->