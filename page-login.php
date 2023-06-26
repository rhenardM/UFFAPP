<?php
session_start();          
@$email=$_POST['email'];
@$pass=$_POST['pass'];
@$valider=$_POST['valider'];
$message='';
  if(isset($_POST['valider'])){ 
    include("login-connexion.php");
    $req=$pdo->prepare("SELECT * FROM user_register WHERE email=? and PASSWORD=? limit 1 ");
    $req->setFetchMode(PDO::FETCH_ASSOC);
    $req->execute(array($email,md5($pass)));
    $tab=$req->fetchAll();
      if(count($tab)>0)                                      
          $message="<li> Mauvais login ou mot de passe!</li>";
          else {
            $_SESSION["autoriser"]="oui";
            $_SESSION["nom"]=strtoupper($tab[0]["nom"]);
            header("location:Dashbord.php");       
          }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>connexion</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="" rel="icon">
  <link href="" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="" class="logo d-flex align-items-center w-auto">
                  <img src="" alt="">
                  <span class="d-none d-lg-block">Onlyway Travel</span>
                </a>
              </div><!-- End Logo -->
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4"></h5>
                    <p class="text-center small">Veuillez d'abord vous authentifier pour y acceder </p>
                  </div>
                      <!-- Message Error from script_login.php ! -->
                      <?php if (!empty($message)) {?>
                    <div class="alert alert-danger">
                        <?= $message ?>
                    </div>
                    <?php } ?>  
                      <!-- fin Message -->   
                  <form method="post" class="row g-4">
                    <div class="col-12">
                      <label for="" class="form-label">Nom d'utilisateur</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" value="" class="form-control" id="" >
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="" class="form-label">Mot de passe</label>
                      <input type="password" name="pass" class="form-control" id="" >
                    </div>
                    <div class="col-12">
                      <button type="submit" name="valider" class="w-100 btn btn-primary btn-sm">S'authentifier</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->
  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>