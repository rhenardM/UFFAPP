<!DOCTYPE html>
<html lang="en">

<body>
<!-- ======= Header ======= -->
<?php include "header.php"; ?>
<!-- End Header -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Tableau de bord</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="accueil.php">Accuei</a></li>
          <li class="breadcrumb-item active">Tableau de bord</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-10">
          <div class="row">
            <!-- Sales Card -->
            <!-- End Sales Card -->
         
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#"></a></li>
                  </ul>
                </div>
              
                <div class="card-body">
                  <h5 class="card-title">Personels <span>|</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <a href="tables-inscription.php"><i class="bi bi-person-circle"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6><i class="bi bi-person"></i></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Les Personels</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
                     
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#"></a></li>
                  </ul>
                </div>
              
                <div class="card-body">
                  <h5 class="card-title"><span>|xxxxxxx</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <a href=""><i class="bi bi-journal-text text-info"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6>xxxxxxx</h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#"></a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Documents...<span>|</span></h5>
                   
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <a href="HSD_PHP_fpdf_Exemples/Fichier.php"><i class="bi bi-journal-text text-info"></i></a>
                    </div>
                    <div class="ps-3">
                      <h6></h6>
                      <span class="text-info small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">Documents enregistrer</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

           <!-- Budget Report -->
           <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title"><span></span></h5>

              <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                    legend: {
                      data: ['', '']
                    },
                    radar: {
                      // shape: 'circle',
                      indicator: [{
                          name: 'Frais payé',
                          max: 6500
                        },
                        {
                          name: 'Administration',
                          max: 16000
                        },
                        {
                          name: '',
                          max: 30000
                        },
                        {
                          name: 'Clients',
                          max: 38000
                        },
                        {
                          name: 'Enregistrement',
                          max: 52000
                        },
                        {
                          name: '',
                          max: 25000
                        }
                      ]
                    },
                    series: [{
                      name: 'Budget vs spending',
                      type: 'radar',
                      data: [{
                          value: [4200, 3000, 20000, 35000, 50000, 18000],
                          name: 'Allocated Budget'
                        },
                        {
                          value: [5000, 14000, 28000, 26000, 42000, 21000],
                          name: 'Actual Spending'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div><!-- End Budget Report -->
      </div>
    </section>
  </main><!-- End #main -->
  <br><br>
<!-- ======= footer ======= -->
<?php include "footer.php"; ?>
 <!-- End footer -->