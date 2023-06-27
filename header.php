<?php
     session_start();
     if($_SESSION["autoriser"]!="oui"){
         header("location:page-login.php");
         exit();
     }
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tableau de bord</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="" rel="icon">
  <link href="" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
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
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="dashbord.php" class="logo d-flex align-items-center">
    <img src="" alt="">
    <span class="d-none d-lg-block">Onlyway Travel</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="assets/img/person.png" alt="Profile" class="rounded-circle text-primary">
        <span class="d-none d-md-block dropdown-toggle ps-2"></span>
      </a><!-- End Profile Iamge Icon -->
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <!-- Vérification de l'heure de la session -->
          <span><?php echo(date("H")<18)? ("Bonjour"):("Bonsoir") ?></span>
          <h6><span> <?= $_SESSION["nomPrenom"] ?>  </span></h6>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
       
        <li>
          <a class="dropdown-item d-flex align-items-center" href="deconnexion.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Se deconnecter</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->
  </ul>
</nav><!-- End Icons Navigation -->
</header><!-- End Header -->
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="Dashbord.php">
      <i class="bi bi-grid"></i>
      <span>Tableau de bordard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Formulaires</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="forms-inscription.php">
          <i class="bi bi-circle"></i><span>Formulaire d'inscription</span>
        </a>
      </li>
      <li>
        <a href="forms-frais.php">
          <i class="bi bi-circle"></i><span>Formulaire de frais</span>
        </a>
      </li>
      <li>
        <a href="forms-doc.php">
          <i class="bi bi-circle"></i><span>Formulaire de documents</span>
        </a>
      </li>
    </ul>
  </li><!-- End Forms Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Tables d'enregistrement</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="tables-data-doc.php">
          <i class="bi bi-circle"></i><span>Enregistrements documents</span>
        </a>
      </li>
      <li>
        <a href="tables-inscription.php">
          <i class="bi bi-circle"></i><span>Enregistrements de clients</span>
        </a>
      </li>
      <li>
        <a href="tables-frais.php">
          <i class="bi bi-circle"></i><span>Enregistrements de frrais</span><i class=""></i>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->
  <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.php">
          <i class="bi bi-envelope"></i>
          <span>Nous Contacter</span>
        </a>
      </li><!-- End Contact Page Nav -->
  
</ul>

</aside><!-- End Sidebar-->