<?php
session_start();
@$valider=$_POST['valider'];
@$email= $_POST['email'];
@$password=$_POST['password'];
if(isset($_POST['valider'])){
  if(isset($_POST['email']) and !empty($_POST['email'])){
     if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        if(isset($_POST['password']) and !empty($_POST['password'])){

            require 'login-connexion.php';

            $password = md5($_POST['password']);

            $getdata = $pdo->prepare("SELECT email FROM user_register WHERE email =? and password=?");
            $getdata->execute(array($_POST['email'], $password));

            $rows = $getdata->rowCount();

            if($rows==true){
                //$_SESSION['user_register']=$_POST['email'];
                header("location:Dashbord.php"); 
            }else
            {
                $erreur="Nom d'utlisateur ou mot de passe inconnue !";  
            }
            
        }else
        {
            $erreur="Veuillez saisire votre mot de passe !";
        }
        
     }else{
        $erreur="Veuillez entrer un nom d'utilisateur valide !";
     }
    }else{
        $erreur="Veuillez entrer un nom d'utlisateur !";
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
                    <p class="text-center small"></p>
                  </div>
                      <!-- Message Error from script_login.php ! -->
                        <?php if(!empty($erreur)){?>          
                        <div class="alert alert-danger d-flex align-items-center" role="alert" >
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="25px" height="20px" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                            <?php echo $erreur?></div>
                        <?php }?>
                      <!-- fin Message -->   
                  <form method="POST" class="row g-4 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="" class="form-label">Nom d'utilisateur</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" id="" >
                        <div class="invalid-feedback">S'il vous plaît entrez votre nom d'utilisateur.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="" class="form-label">Mot de passe</label>
                      <input type="password" name="password" class="form-control" id="" >
                      <div class="invalid-feedback">s'il vous plait entrez votre mot de passe!</div>
                    </div>
                    <div class="col-12">
                      <button type="submit" name="valider" class="w-100 btn btn-primary btn-sm">S'authentifier</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Vous n'avez pas de compte ?<a href="page-register.php">Créer un compte</a></p>
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