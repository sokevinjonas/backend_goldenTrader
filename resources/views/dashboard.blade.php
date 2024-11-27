@extends('admin.layouts.app')
@section('pageTitle')
<h1>Tableau de Bord</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./index.html">Accueil</a></li>
            <li class="breadcrumb-item">Tableau de Bord</li>
            <li class="breadcrumb-item active">Vue Générale</li>
          </ol>
        </nav>
@endsection
@section('content')
<div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Total Users Card -->
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card users-card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filtrer</h6>
                </li>
                <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
                <li><a class="dropdown-item" href="#">Ce mois</a></li>
                <li><a class="dropdown-item" href="#">Cette année</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Total Utilisateurs <span>| Aujourd'hui</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>1,245</h6>
                  <span class="text-success small pt-1 fw-bold">+15%</span>
                  <span class="text-muted small pt-2 ps-1">par rapport à hier</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Total Users Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card revenue-card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filtrer</h6>
                </li>
                <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
                <li><a class="dropdown-item" href="#">Ce mois</a></li>
                <li><a class="dropdown-item" href="#">Cette année</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Revenus <span>| Ce mois</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="ps-3">
                  <h6>$3,560</h6>
                  <span class="text-success small pt-1 fw-bold">+10%</span>
                  <span class="text-muted small pt-2 ps-1">par rapport au mois dernier</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Revenue Card -->

        <!-- Publications Card -->
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card posts-card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filtrer</h6>
                </li>
                <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
                <li><a class="dropdown-item" href="#">Ce mois</a></li>
                <li><a class="dropdown-item" href="#">Cette année</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Publications <span>| Ce mois</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-file-text"></i>
                </div>
                <div class="ps-3">
                  <h6>320</h6>
                  <span class="text-success small pt-1 fw-bold">+5%</span>
                  <span class="text-muted small pt-2 ps-1">par rapport au mois dernier</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Publications Card -->

        <!-- Signalements Card -->
        <div class="col-xxl-3 col-md-6">
          <div class="card info-card reports-card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filtrer</h6>
                </li>
                <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
                <li><a class="dropdown-item" href="#">Ce mois</a></li>
                <li><a class="dropdown-item" href="#">Cette année</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Signalements <span>| Ce mois</span></h5>
              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-exclamation-triangle"></i>
                </div>
                <div class="ps-3">
                  <h6>12</h6>
                  <span class="text-danger small pt-1 fw-bold">+20%</span>
                  <span class="text-muted small pt-2 ps-1">par rapport au mois dernier</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Signalements Card -->

      </div>
    </div><!-- End Left side columns -->

    <!-- Activity Chart -->
    <div class="col-12">
      <div class="card">
        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filtrer</h6>
            </li>
            <li><a class="dropdown-item" href="#">Aujourd'hui</a></li>
            <li><a class="dropdown-item" href="#">Ce mois</a></li>
            <li><a class="dropdown-item" href="#">Cette année</a></li>
          </ul>
        </div>

        <div class="card-body">
          <h5 class="card-title">Activité mensuelle</h5>
          <div id="activityChart"></div>
          <script>
            document.addEventListener("DOMContentLoaded", () => {
              new ApexCharts(document.querySelector("#activityChart"), {
                series: [{
                  name: 'Revenus',
                  data: [1000, 1500, 2000, 2500, 3000, 3500]
                }, {
                  name: 'Publications',
                  data: [20, 30, 25, 35, 40, 45]
                }],
                chart: {
                  type: 'line',
                  height: 350,
                },
                xaxis: {
                  categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']
                }
              }).render();
            });
          </script>
        </div>
      </div>
    </div><!-- End Activity Chart -->

  </div>
@endsection
