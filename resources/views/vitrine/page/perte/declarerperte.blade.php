@extends('vitrine.layouts.app')

@section('content')
<div class="container-fluid p-5 position-relative text-white" style="background-color: var(--accent-color); height:300px;">
    <!-- Encadrement stylisé -->
    <div class="position-absolute" style="top: 20px; left: 20px; border-left: 8px solid #000040; border-bottom: 8px solid #000040; width: 80px; height: 200px;"></div>

    <!-- Contenu principal -->
    <div class="text-center">
        <h1 class="fw-bold animate__animated animate__fadeInDown">Déclarer une perte</h1>
        <p class="mt-3">
            <a href="" class="text-decoration-none text-light fw-bold">ACCUEIL</a>
            / <span class="text-light">DÉCLARER UNE PERTE</span>
        </p>
    </div>

</div>
<br>
<hr>
<div class="avertissement-perte">
    <i class="bi bi-exclamation-triangle-fill"></i>
    <h3>Faites une déclaration de perte à la police pour obtenir un certificat de perte. C'est important !</h3>
</div>

@include('vitrine.section.bienperdu')
<br>
<hr>
<h1 class="for1">Formulaire de déclaration d'un bien perdu</h1>
<div class="container mt-5">
    <div class="formulaire-container">
        <!-- Formulaire -->
        <form method="POST" action="{{ route('objets.store') }}" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Oops! Il y a un problème avec votre soumission :</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <div class="row g-3"> <!-- Utilisation de la classe gap pour l'espacement -->
                <!-- Colonne Gauche -->
                <div class="col-md-6 border" style="border: 1px solid black; padding: 15px;">
                    <div class="mb-3">
                        <label for="titre" class="form-label">Titre de votre annonce <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="titre" name="titre" placeholder="">
                        @error('titre')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="categorie" class="form-label">Catégorie ? <span class="text-danger">*</span></label>
                            <select class="form-select" id="categorie" name="categorie">
                                <option value="">-- Sélectionner --</option>
                                <option value="documents">Documents administratifs</option>
                                <option value="electroniques">Objets électroniques</option>
                                <option value="accessoires">Accessoires personnels</option>
                                <option value="vetements">Vêtements</option>
                                <option value="transport">Objets de transport</option>
                                <option value="divers">Effets personnels divers</option>
                                <option value="argent">Argent</option>
                            </select>
                            @error('categorie')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="sous-categorie" class="form-label">Sous catégorie ? <span class="text-danger">*</span></label>
                            <select class="form-select" id="sous-categorie" name="sous_categorie">
                                <option>-- Sélectionner --</option>
                            </select>
                            @error('sous categorie')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="statut" class="form-label">Statut <span class="text-danger">*</span></label>
                            <select class="form-select" id="statut" name="statut">
                                <option value="perdu" selected>Perdu</option>
                            </select>
                            @error('statut')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo du bien</label>
                            <input type="file" class="form-control" id="photo" name="photo" placeholder="" accept="image/*" required>
                            @error('photo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @include('vitrine.section.scriptcategorie')
                </div>

                <!-- Colonne Droite -->
                <div class="col-md-6 border" style="border: 1px solid black; padding: 15px;">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom  <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom complet de la personne">
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Prenom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom complet de la personne">
                        @error('prenom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="telephone" class="form-label">Numéro de téléphone <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="772223344">
                            @error('numero telephone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="whatsapp" class="form-label">Adresse<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse de la personne">
                            @error('adresse')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="lieu" class="form-label">Lieu de perte ? <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lieu" name="lieu_perte" placeholder="Lieu de la perte">
                            @error('lieu perte')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="date" class="form-label">Date de perte ? <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="date_perte" id="date" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                            @error('date perte')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-check mb-3 custom-checkbox">
                        <input type="checkbox" class="form-check-input" id="afficher-telephone">
                        <label class="form-check-label" for="afficher-telephone">Afficher mes numéros de téléphone!</label>
                    </div>
                </div>
            </div><br>

            <!-- Bouton de soumission -->
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
</div>
@endsection
