@extends('admin.layouts.app')
@section('pageTitle')
<h1>Liste des Utilisateurs</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./index.html">Accueil</a></li>
      <li class="breadcrumb-item">Utilisateurs</li>
      <li class="breadcrumb-item active">Liste</li>
    </ol>
  </nav>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Gérer les Utilisateurs</h5>

          <!-- Filtre et recherche -->
          <div class="row mb-3">
            <!-- Recherche -->
            <div class="col-md-6">
              <input type="text" class="form-control" placeholder="Rechercher par nom ou email..." id="searchInput">
            </div>
            <!-- Filtres -->
            <div class="col-md-3">
              <select class="form-select" id="roleFilter">
                <option value="">Tous les rôles</option>
                <option value="Analyst">Analyst</option>
                <option value="Investor">Investor</option>
              </select>
            </div>
            <div class="col-md-3">
              <select class="form-select" id="statusFilter">
                <option value="">Tous les statuts</option>
                <option value="active">Actif</option>
                <option value="disabled">Désactivé</option>
                <option value="banned">Banni</option>
              </select>
            </div>
          </div>

          <!-- Table des utilisateurs -->
          <table class="table table-hover">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Statut</th>
                <th>Date d'inscription</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="userTableBody">
              <!-- Exemple de données -->
              <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>john.doe@example.com</td>
                <td><span class="badge bg-primary">Analyst</span></td>
                <td><span class="badge bg-success">Actif</span></td>
                <td>2024-01-15</td>
                <td>
                  <button class="btn btn-sm btn-warning">Modifier</button>
                  <button class="btn btn-sm btn-danger" >Désactiver</button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Jane Smith</td>
                <td>jane.smith@example.com</td>
                <td><span class="badge bg-secondary">Investor</span></td>
                <td><span class="badge bg-danger">Banni</span></td>
                <td>2023-11-20</td>
                <td>
                  <button class="btn btn-sm btn-warning" >Modifier</button>
                  <button class="btn btn-sm btn-success" >Réactiver</button>
                </td>
              </tr>
              <!-- Répéter pour chaque utilisateur -->
            </tbody>
          </table>

        </div>
      </div>

    </div>
  </div>
@endsection
