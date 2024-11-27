@extends('admin.layouts.app')
@section('pageTitle')
<h1>Liste des Publications</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./index.html">Accueil</a></li>
      <li class="breadcrumb-item">Publications</li>
      <li class="breadcrumb-item active">Liste</li>
    </ol>
  </nav>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Gérer les Publications</h5>

          <!-- Recherche et filtres -->
          <div class="row mb-3">
            <div class="col-md-6">
              <input type="text" class="form-control" placeholder="Rechercher par titre ou auteur..." id="searchPublications">
            </div>
            <div class="col-md-3">
              <select class="form-select" id="authorFilter">
                <option value="">Tous les Analysts</option>
                <option value="Analyst1">Analyst1</option>
                <option value="Analyst2">Analyst2</option>
              </select>
            </div>
            <div class="col-md-3">
              <select class="form-select" id="statusFilter">
                <option value="">Tous les Statuts</option>
                <option value="published">Publié</option>
                <option value="reported">Signalé</option>
              </select>
            </div>
          </div>

          <!-- Table des publications -->
          <table class="table table-hover">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Statut</th>
                <th>Date de Publication</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="publicationsTableBody">
              <tr>
                <td>1</td>
                <td>Analyse BTC</td>
                <td>Analyst1</td>
                <td><span class="badge bg-success">Publié</span></td>
                <td>2024-01-15</td>
                <td>
                  <button class="btn btn-sm btn-primary" onclick="viewPublication(1)">Voir</button>
                  <button class="btn btn-sm btn-danger" onclick="deletePublication(1)">Supprimer</button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Signal d'achat ETH</td>
                <td>Analyst2</td>
                <td><span class="badge bg-danger">Signalé</span></td>
                <td>2024-01-10</td>
                <td>
                  <button class="btn btn-sm btn-primary" onclick="viewPublication(2)">Voir</button>
                  <button class="btn btn-sm btn-danger" onclick="deletePublication(2)">Supprimer</button>
                </td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>

    </div>
  </div>
@endsection
