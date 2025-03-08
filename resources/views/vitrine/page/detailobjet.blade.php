@extends('vitrine.layouts.app')

@section('content')
<div class="container-fluid p-5 position-relative text-white" style="background-color: var(--accent-color); height:300px;">
    <!-- Encadrement stylisé -->
    <div class="position-absolute" style="top: 20px; left: 20px; border-left: 8px solid #000040; border-bottom: 8px solid #000040; width: 80px; height: 200px;"></div>

    <!-- Contenu principal -->
    <div class="text-center">
        <h1 class="fw-bold animate__animated animate__fadeInDown">Détail de l'annonce</h1>
        <p class="mt-3">
            <a href="" class="text-decoration-none text-light fw-bold">ACCUEIL</a>
            / <span class="text-light">Détail de l'annonce</span>
        </p>
    </div>
</div>
<hr>
<br>

<div class="row g-4" style="margin-left: 60px; background-color: #f0f0f0; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-right: 320px;">
    <div class="col-sm-12 col-md-8 d-flex align-items-center" style="padding: 10px">
        <!-- Image -->
        <img src="{{ asset('assets/vitrine/img/logo.png') }}" alt="" style="width: 100px; height: auto;" data-aos="fade-in">
        <!-- Détails -->
        <div class="text-start ps-4">
            <h5 class="mb-3">{{ $objet->titre_anonce }}</h5>
            <span class="badge bg-dark p-2">
                <i class="fa fa-map-marker-alt me-2"></i>{{ $objet->lieu_perte }}
            </span>
            <span class="badge bg-primary p-2">
                <i class="far fa-clock me-2"></i>{{ $objet->date_perte }}
            </span>
            <span class="badge bg-secondary p-2">
                <i class="far fa-user me-2"></i>{{ $objet->utilisateur->prenom }} {{ $objet->utilisateur->nom }}
            </span>
        </div>
    </div>
</div>
<br>
<!-- Nouvelle ligne pour la description et la catégorie -->
<div class="text-start ps-4 mt-3">
    <p class="mb-3"><strong>Description :</strong> <br> {{ $objet->description }}</p> <!-- Ajouter la description -->
    <h3>Details</h3>
    <ul>
        <li><p><i class="fas fa-cogs"></i> <strong>Categorie :</strong> {{ $objet->categorie->nom }}</p></li> <!-- Afficher le nom de la sous-catégorie -->
        <li><p><i class="fas fa-cogs"></i> <strong>Sous Catégorie :</strong> {{ $objet->sous_categorie->nom }}</p></li> <!-- Afficher le nom de la sous-catégorie -->
        <li><p><i class="far fa-calendar-alt"></i> <strong>Date de Perte/Retrouver :</strong> {{ $objet->date_perte }}</p></li> <!-- Afficher la date de perte -->
        <li><p><i class="fas fa-map-marker-alt"></i> <strong>Lieu de Perte/Retrouver :</strong> {{ $objet->lieu_perte }}</p></li> <!-- Afficher le lieu de perte -->
        <li><p><i class="fas fa-user"></i> <strong>Nom Complet declarant :</strong> {{ $objet->utilisateur->prenom }} {{ $objet->utilisateur->nom }}</p></li> <!-- Afficher le nom de l'utilisateur -->
        <li><p><i class="fas fa-phone"></i> <strong>Contact declarant :</strong> {{ $objet->utilisateur->telephone }}</p></li> <!-- Afficher le contact de l'utilisateur -->
        <li><p><i class="fas fa-map-marker-alt"></i> <strong>Adresse declarant :</strong> {{ $objet->utilisateur->adresse }}</p></li> <!-- Afficher l'adresse de l'utilisateur -->
        <li><p><i class="fas fa-calendar-day"></i> <strong>Date d'Annonce :</strong> {{ $objet->created_at }}</p></li> <!-- Afficher la date d'annonce -->
    </ul>
</div>
<div style="display: flex; align-items: center; gap: 10px; margin-left:500px; margin-top:-400px">
    <span class="text-truncate me-5" style="font-weight: bold; color: #007bff;">
    </span>
    <img src="{{ asset('storage/' . $objet->photo) }}" alt="Photo de l'objet" class="img-thumbnail" style="width: 250px; height: auto; border: 2px solid #007bff; border-radius: 5px;">
</div>
<br><br><br>


<br><br><br>


@endsection
