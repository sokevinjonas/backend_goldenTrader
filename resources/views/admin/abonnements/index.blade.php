@extends('admin.layouts.app')
@section('pageTitle')
<h1>Gestion des Abonnements</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
    <li class="breadcrumb-item">Abonnements</li>
    <li class="breadcrumb-item active">Plans</li>
  </ol>
</nav>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Plans d'Abonnement</h5>

          <!-- Ajouter un plan -->
          <div class="row mb-4">
            <form method="POST" action="{{ route('store_abonnement') }}" id="addPlanForm" class="d-flex gap-3">
                @csrf
                <select class="form-select" id="type" name="type" required>
                    <option value="">--Choisir--</option>
                    <option value="premium">Premium</option>
                    <option value="vip">VIP</option>
                </select>
                <input type="number" class="form-control" placeholder="Prix (USD)" id="planPrice" name="price" required>
                <select class="form-select" id="duration" name="duration" required>
                    <option value="">--Choisir--</option>
                    <option value="14">14 jours</option>
                    <option value="30">30 jours</option>
                </select>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>

         <!-- Table des abonnements -->
        <div class="table-responsive">
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
            <tbody>
                @forelse ($abonnement as $data)
                <tr>
                <td>{{ $data->id }}</td>
                <td>{{ ucfirst($data->type) }}</td>
                <td>{{ number_format($data->price, 2) }} USD</td>
                <td>{{ $data->duration }} jours</td>
                <td>
                    <button class="btn btn-sm btn-warning" disabled>Modifier</button>
                    <form action="{{ route('delete_abonnement', $data->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Confirmez-vous la suppression ?')">Supprimer</button>
                    </form>
                </td>
                </tr>
                @empty
                <tr>
                <td colspan="5" class="text-center">Aucun abonnement trouvé. Veuillez en ajouter.</td>
                </tr>
                @endforelse
            </tbody>
            </table>
        </div>


        </div>
      </div>

    </div>
  </div>
@endsection
