@extends('admin.layouts.app')
@section('pageTitle')
<h1>Gestion du Parrainage</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
    <li class="breadcrumb-item">Parrainage</li>
    <li class="breadcrumb-item active">Paramètres</li>
  </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Configuration du Parrainage</h5>

          <!-- Paramètres -->
          <div class="row mb-4">
            <form id="referralSettingsForm" class="d-flex gap-3">
              <input type="number" class="form-control" placeholder="Commission (%)" id="referralCommission">
              <input type="number" class="form-control" placeholder="Durée de validité (jours)" id="referralDuration">
              <button type="button" class="btn btn-primary" onclick="updateReferralSettings()">Enregistrer</button>
            </form>
          </div>

          <!-- Table des parrains -->
          <h5 class="card-title">Liste des Parrains</h5>
          <table class="table table-hover">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Parrain</th>
                <th>Filleuls</th>
                <th>Gains</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="referralTableBody">
              <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>5</td>
                <td>$50</td>
                <td>
                  <button class="btn btn-sm btn-primary" onclick="viewReferrals(1)">Voir</button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Jane Smith</td>
                <td>3</td>
                <td>$30</td>
                <td>
                  <button class="btn btn-sm btn-primary" onclick="viewReferrals(2)">Voir</button>
                </td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>

    </div>
  </div>
@endsection
