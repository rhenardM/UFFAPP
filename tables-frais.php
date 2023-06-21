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
    </div><!-- End Page Title -->

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
                    <th scope="col"></th>
                    <th scope="col">biellet</th>
                    <th scope="col">Dossier</th>
                    <th scope="col">passeport</th>
                    <th scope="col">legislation</th>
                    <th scope="col">Jugement</th>
                    <th scope="col">Acompte</th>
                    <th scope="col">1er Tranche</th>
                    <th scope="col">2em Tranche</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php require 'login-connexion.php';  
                  $query="select * from tb_frais";
                  $pdostmt=$pdo->prepare($query);
                  $pdostmt->execute();
                ?>
                <?php while($ligne=$pdostmt->fetch(PDO::FETCH_ASSOC)):?>
                  <tr>
                    <th scope="row"></th>
                    <td><?php echo $ligne["f_billet"]; ?>&nbsp;$</td>
                    <td><?php echo $ligne["f_ouverture_doss"]; ?>&nbsp;$</td>
                    <td><?php echo $ligne["f_passport"]; ?>&nbsp;$</td>
                    <td><?php echo $ligne["f_legalisation"]; ?>&nbsp;$</td>
                    <td><?php echo $ligne["f_jugement"]; ?>&nbsp;$</td>
                    <!--<td><?php echo $ligne["f_photo"]; ?></td>-->
                    <td><?php echo $ligne["f_acompte"]; ?>&nbsp;$</td>
                    <td><?php echo $ligne["f_tranche_1"]; ?>&nbsp;$</td>
                    <td><?php echo $ligne["f_tranche_2"]; ?>&nbsp;$</td>
                    <td><?php echo $ligne["datePaie"]; ?></td>
                    <td>
                      <div class="d-flex justify-content">
                      <button  type="button" class="btn btn-info bi bi-pencil-square btn-sm"  data-bs-toggle="modal"  data-bs-target="#exampleModal"></button>&nbsp;
                      <button class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
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