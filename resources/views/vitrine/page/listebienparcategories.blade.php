@extends('vitrine.layouts.app')

@section('content')
<div class="container-fluid p-5 position-relative text-white" style="background-color: var(--accent-color); height:300px;">
    <!-- Encadrement stylisé -->
    <div class="position-absolute" style="top: 20px; left: 20px; border-left: 8px solid #000040; border-bottom: 8px solid #000040; width: 80px; height: 200px;"></div>

    <!-- Contenu principal -->
    <div class="text-center">
        <h1 class="fw-bold animate__animated animate__fadeInDown">Listes des biens par catégories</h1>
        <p class="mt-3">
            <a href="" class="text-decoration-none text-light fw-bold">ACCUEIL</a>
            / <span class="text-light">Listes des biens par catégories</span>
        </p>
    </div>
</div>
<br>
<hr>
<br>
<hr>
<br>
<div class="container-fluid mb-5 wow fadeIn" style="padding: 35px; background-color: var(--accent-color);">
    <div class="container">
        <div class="row g-2">
            <!-- Input pour mots clés -->
            <div class="col-md-4">
            <input type="text" placeholder="Mots clefs" class="form-control border-0">
            </div>

            <!-- Sélecteur pour la catégorie -->
            <div class="col-md-3">
                <select class="form-select border-0">
                    <option selected>-- Catégorie --</option>
                    <option value="1">Vêtements</option>
                    <option value="2">Personnes disparues</option>
                    <option value="3">Outils</option>
                    <option value="4">Moto, vélos, voitures</option>
                    <option value="5">Électronique</option>
                    <option value="6">Documents, Pièces</option>
                    <option value="7">Clés</option>
                    <option value="8">Bagages</option>
                    <option value="9">Autres</option>
                    <option value="10">Argent</option>
                    <option value="11">Accessoires</option>
                </select>
            </div>

            <!-- Sélecteur pour la sous-catégorie -->
            <div class="col-md-3">
                <select name="sous_categorie_id" id="sous_categorie_id" class="form-select">
                    <option value="">-- Sélectionner --</option>
                </select>
            </div>

            <!-- Bouton pour rafraîchir -->
            <div class="col-md-2">
                <button class="btn btn-light float-end">
                Rafraîchir
                <i class="fas fa-history"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<br>

<div class="row g-4" style="margin-left: 60px; background-color: #f0f0f0; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-right: 30px;">
    @foreach ($objets as $objet)
        <div class="col-sm-12 col-md-8 d-flex align-items-center" style="padding: 10px">
            <!-- Image -->
            <img src="{{ asset('assets/vitrine/img/logo.png') }}" alt="" style="width: 100px; height: auto;" data-aos="fade-in">

            <!-- Détails -->
            <div class="text-start ps-4">
                <a href="{{ url('#/objet-detail/' . $objet->id) }}">
                    <h5 class="mb-3">{{ $objet->titre_anonce }}</h5>
                </a>
                <span class="text-truncate me-5">
                    <i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $objet->lieu_perte }}
                </span>
                <span class="text-truncate me-5">
                    <i class="far fa-clock text-primary me-2"></i>{{ $objet->date_perte }}
                </span>
                <span class="text-truncate me-0">
                    <i class="far fa-user text-primary me-2"></i>{{ $objet->utilisateur->prenom }} {{ $objet->utilisateur->nom }}<!-- Utilisez 'nom' ou le champ approprié de votre table Utilisateur -->
                </span>

            </div>
        </div>

        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
            <!-- Bouton Voir les détails -->
            <div class="d-flex mb-3" style="background-color: var(--accent-color);">
                <a href="{{ route('vitrine.page.detailobjet', ['id' => $objet->id]) }}" class="btn btn-primary" style="background-color: var(--accent-color);">
                    Voir les détails
                    <i class="fa fa-eye text-primary"></i>
                </a>

            </div>
            <!-- Date de l'annonce -->
            <small class="text-truncate">
                <i class="far fa-calendar-alt text-primary me-2"></i>
                Date de l'annonce :
                <b>{{ $objet->created_at }}</b>
            </small>
        </div>
    @endforeach
    <br>
</div>
@endsection
