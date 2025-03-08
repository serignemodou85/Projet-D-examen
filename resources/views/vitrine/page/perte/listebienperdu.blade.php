@extends('vitrine.layouts.app')

@section('content')
<div class="container-fluid p-5 position-relative text-white" style="background-color: var(--accent-color); height:300px;">
    <!-- Encadrement stylisé -->
    <div class="position-absolute" style="top: 20px; left: 20px; border-left: 8px solid #000040; border-bottom: 8px solid #000040; width: 80px; height: 200px;"></div>

    <!-- Contenu principal -->
    <div class="text-center">
        <h1 class="fw-bold animate__animated animate__fadeInDown">Listes des biens perdus</h1>
        <p class="mt-3">
            <a href="" class="text-decoration-none text-light fw-bold">ACCUEIL</a>
            / <span class="text-light">Listes des biens perdus</span>
        </p>
    </div>
</div>
<br>
<hr>
<br>
<div class="container-fluid mb-5 wow fadeIn" style="padding: 35px; background-color: var(--accent-color);">
    <div class="container">
        <form method="GET" action="{{ route('vitrine.perte.listebienperdu') }}" id="filterForm">
            <div class="row g-2">
                <!-- Sélecteur Catégorie -->
                <div class="col-md-3">
                    <select class="form-select" id="categorie" name="categorie">
                        <option value="">-- Sélectionner catégorie --</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->nom }}" {{ request('categorie') == $categorie->nom ? 'selected' : '' }}>
                                {{ $categorie->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Sélecteur Sous-Catégorie -->
                <div class="col-md-3">
                    <select class="form-select" id="sous-categorie" name="sous_categorie">
                        <option value="">-- Sélectionner sous-catégorie --</option>
                        @foreach ($sousCategories as $sousCategorie)
                            <option value="{{ $sousCategorie->nom }}" {{ request('sous_categorie') == $sousCategorie->nom ? 'selected' : '' }}>
                                {{ $sousCategorie->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Bouton Filtrer -->
                <div class="col-md-2">
                    <button class="btn btn-light float-end" type="submit">
                        Filtrer <i class="fas fa-filter"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

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
                    <i class="far fa-user text-primary me-2"></i>{{ $objet->utilisateur->prenom }} {{ $objet->utilisateur->nom }}
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

    @if (session('error'))
    <div class="alert alert-warning text-center">
        {{ session('error') }}
    </div>
    @endif

    @if ($objets->isEmpty())
        <div class="alert alert-danger text-center">
            Aucun résultat trouvé pour votre recherche.
        </div>
    @endif

</div>

<script>
    // Les sous-catégories pour chaque catégorie
    const sousCategories = {
        documents: ["Passeport", "Carte d'identité", "Permis de conduire", "Certificats", "Livrets bancaires"],
        electroniques: ["Téléphone portable", "Ordinateur portable", "Tablette", "Appareils photo", "Casque audio"],
        accessoires: ["Portefeuille", "Bijoux", "Lunettes", "Clés", "Sac à main ou sac à dos"],
        vetements: ["Vestes", "Chapeaux", "Écharpes", "Gants"],
        transport: ["Vélo", "Trottinette", "Valise ou bagage"],
        divers: ["Parapluie", "Livres", "Instruments de musique", "Jouets"],
        argent: ["Espèces", "Chèques", "Carte bancaire"]
    };

    // Fonction qui met à jour la sous-catégorie en fonction de la catégorie sélectionnée
    document.getElementById('categorie').addEventListener('change', function() {
        const categorie = this.value;
        const sousCategorieSelect = document.getElementById('sous-categorie');

        // Vider les options actuelles
        sousCategorieSelect.innerHTML = '<option>-- Sélectionner --</option>';

        // Vérifier si des sous-catégories existent pour la catégorie choisie
        if (categorie && sousCategories[categorie]) {
            sousCategories[categorie].forEach(subCat => {
                const option = document.createElement('option');
                option.value = subCat.toLowerCase().replace(/\s+/g, '-');
                option.textContent = subCat;
                sousCategorieSelect.appendChild(option);
            });
        }

        // Mettre à jour le formulaire caché pour la soumission
        document.getElementById('hidden-categorie').value = categorie;
    });

    // Fonction pour mettre à jour la sous-catégorie cachée
    document.getElementById('sous-categorie').addEventListener('change', function() {
        const sousCategorie = this.value;
        document.getElementById('hidden-sous-categorie').value = sousCategorie;
    });
</script>

@endsection
