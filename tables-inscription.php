<?php //include "modal.php"; ?>
<!DOCTYPE html>
<html lang="en">
<body>
  <!-- ======= Header ======= -->
  <?php include "header.php"; ?>
 <!-- End Header -->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Table d'enregistrement du personneles</h1>
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
              <h5 class="card-title">Les personneles enregistrer </h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Nom</th>
                    <th scope="col">Post-nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Sexe</th>
                    <th scope="col">Numero</th>
                    <th scope="col">Age</th>
                    <th scope="col">Autre nom </th>
                    <th scope="col">Autre num</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php require 'login-connexion.php';   ?>
                    <!-- Delete info-->
                <?php              
                      $id="";
                      if(isset($_POST['delete'])){
                      $id = $_POST['id'];
                      $sql= $pdo->prepare("DELETE FROM tb_inscription WHERE id = :id");
                      $sql->fetch(PDO::FETCH_OBJ);
                      $result= $sql->execute(['id'=>$id]);
                    }
                ?>
                <?php
                  $query="SELECT * FROM tb_inscription";
                  $pdostmt=$pdo->prepare($query);
                  $pdostmt->execute();
                ?>
                <?php while($ligne=$pdostmt->fetch(PDO::FETCH_ASSOC)):?>
                  <tr>
                    <th scope="row"><!--<?php echo $ligne["id"]; ?>--></th>
                    <td><?php echo $ligne["nom"]; ?></td>
                    <td><?php echo $ligne["postnom"]; ?></td>
                    <td><?php echo $ligne["prenom"]; ?></td>
                    <td><?php echo $ligne["sexe"]; ?></td>
                    <td><?php echo $ligne["numero"]; ?></td>
                    <td><?php echo $ligne["age"]; ?></td>
                    <td><?php echo $ligne["nom_tuteur"]; ?></td>
                    <td><?php echo $ligne["num_tuteur"]; ?></td>
                    <td>
                      <div class="d-flex justify-content">
                      <button type="button"class="btn btn-info bi bi-pencil-square btn-sm" data-bs-toggle="modal"  data-bs-target="#exampleModal"></button>&nbsp;
                      <form onsubmit="confirm('Vous le vous vraiment supprimer cet enregistrement ?')" method="post">
                          <input type="hidden" name="id" value="<?php echo $ligne["id"];?>">
                          <button name="delete" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i></button>
                      </form> 
                      </div>
                    </td>
                  </tr>
                  <?php endwhile; ?>
                </tbody>
              </table><br><br><br>
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