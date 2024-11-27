@extends('admin.layouts.app')
@section('pageTitle')
<h1>Gestion des Abonnements</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./index.html">Accueil</a></li>
    <li class="breadcrumb-item">Abonnements</li>
    <li class="breadcrumb-item active">Plans</li>
  </ol>
</nav>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Plans d'Abonnement</h5>

          <!-- Ajouter un plan -->
          <div class="row mb-4">
            <form id="addPlanForm" class="d-flex gap-3">
              <input type="text" class="form-control" placeholder="Nom du plan" id="planName">
              <input type="number" class="form-control" placeholder="Prix (USD)" id="planPrice">
              <select class="form-select" id="planDuration">
                <option value="monthly">Mensuel</option>
                <option value="semiannual">Semestriel</option>
                <option value="annual">Annuel</option>
              </select>
              <button type="button" class="btn btn-primary" onclick="addPlan()">Ajouter</button>
            </form>
          </div>

          <!-- Table des abonnements -->
          <table class="table table-hover">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Nom du Plan</th>
                <th>Prix</th>
                <th>Durée</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="plansTableBody">
              <tr>
                <td>1</td>
                <td>Standard</td>
                <td>$10</td>
                <td>Mensuel</td>
                <td>
                  <button class="btn btn-sm btn-warning" onclick="editPlan(1)">Modifier</button>
                  <button class="btn btn-sm btn-danger" onclick="deletePlan(1)">Supprimer</button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Premium</td>
                <td>$50</td>
                <td>Annuel</td>
                <td>
                  <button class="btn btn-sm btn-warning" onclick="editPlan(2)">Modifier</button>
                  <button class="btn btn-sm btn-danger" onclick="deletePlan(2)">Supprimer</button>
                </td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>

    </div>
  </div>
@endsection
