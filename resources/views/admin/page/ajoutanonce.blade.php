@extends('admin.layouts.app')

@section('content')
    <div class="row column_title">
        <div class="col-md-12">
        <div class="page_title">
            <h2>AJOUT ANONCE</h2>
        </div>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <form method="POST" action="{{ route('admin.store1') }}" enctype="multipart/form-data">
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
                    </div>
                    <div class="col-6 mb-3">
                        <label for="sous-categorie" class="form-label">Sous catégorie ? <span class="text-danger">*</span></label>
                        <select class="form-select" id="sous-categorie" name="sous_categorie">
                            <option>-- Sélectionner --</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="statut" class="form-label">Statut <span class="text-danger">*</span></label>
                        <select class="form-select" id="statut" name="statut">
                            <option value="perdu" selected>Perdu</option>
                            <option value="retrouve" selected>Retrouver</option>
                        </select>
                    </div>
                </div>
                <script>
                    // Les sous-catégories pour chaque catégorie
                    const sousCategories = {
                        documents: [
                            "Passeport",
                            "Carte d'identité",
                            "Permis de conduire",
                            "Certificats",
                            "Livrets bancaires"
                        ],
                        electroniques: [
                            "Téléphone portable",
                            "Ordinateur portable",
                            "Tablette",
                            "Appareils photo",
                            "Casque audio"
                        ],
                        accessoires: [
                            "Portefeuille",
                            "Bijoux",
                            "Lunettes",
                            "Clés",
                            "Sac à main ou sac à dos"
                        ],
                        vetements: [
                            "Vestes",
                            "Chapeaux",
                            "Écharpes",
                            "Gants"
                        ],
                        transport: [
                            "Vélo",
                            "Trottinette",
                            "Valise ou bagage"
                        ],
                        divers: [
                            "Parapluie",
                            "Livres",
                            "Instruments de musique",
                            "Jouets"
                        ],
                        argent: [
                            "Espèces",
                            "Chèques",
                            "Carte bancaire"
                        ]
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
                    });
                </script>

            </div>

            <!-- Colonne Droite -->
            <div class="col-md-6 border" style="border: 1px solid black; padding: 15px;">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom  <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom complet de la personne">
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label">Prenom <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom complet de la personne">
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="telephone" class="form-label">Numéro de téléphone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="772223344">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="whatsapp" class="form-label">Adresse<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse de la personne">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="lieu" class="form-label">Lieu de perte/retrouver ? <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="lieu" name="lieu_perte" placeholder="Lieu de la perte">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="date" class="form-label">Date de perte ? <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="date_perte" id="date" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                    </div>
                </div>
                <div class="form-check mb-3 custom-checkbox">
                    <input type="checkbox" class="form-check-input" id="afficher-telephone">
                    <label class="form-check-label" for="afficher-telephone">Afficher mes numéros de téléphone!</label>
                </div>
            </div>
        </div>
        <br>

        <!-- Bouton de soumission -->
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");

        // Sélection des champs à valider
        const titre = document.getElementById("titre");
        const description = document.getElementById("description");
        const telephone = document.getElementById("telephone");
        const adresse = document.getElementById("adresse");
        const lieu = document.getElementById("lieu");
        const datePerte = document.getElementById("date");
        const nom = document.getElementById("nom");
        const prenom = document.getElementById("prenom");
        const photo = document.getElementById("photo");

        // Fonction de validation des champs
        function validateInput(input, condition, message) {
            const errorElement = input.nextElementSibling; // Sélectionne l'élément d'erreur s'il existe
            if (condition) {
                input.classList.add("is-invalid");
                if (!errorElement || !errorElement.classList.contains("invalid-feedback")) {
                    const div = document.createElement("div");
                    div.className = "invalid-feedback";
                    div.innerText = message;
                    input.parentNode.appendChild(div);
                } else {
                    errorElement.innerText = message;
                }
            } else {
                input.classList.remove("is-invalid");
                if (errorElement) errorElement.remove();
            }
        }

        titre.addEventListener("input", function () {
            if (this.value.trim() === "") {
                validateInput(this, true, "Le titre est obligatoire.");
            } else {
                validateInput(this, this.value.length < 10, "Le titre doit comporter au moins 15 caractères.");
            }
        });

        description.addEventListener("input", function () {
            if (this.value.trim() === "") {
                validateInput(this, true, "La description est obligatoire.");
            } else {
                validateInput(this, this.value.length < 10, "La description doit comporter au moins 20 caractères.");
            }
        });

        telephone.addEventListener("input", function () {
            if (this.value.trim() === "") {
                validateInput(this, true, "Le numero de telephone est obligatoire.");
            } else {
                validateInput(this, !/^\d{9,}$/.test(this.value), "Le numéro doit contenir au moins 9 chiffres.");
            }
        });

        adresse.addEventListener("input", function () {
            validateInput(this, this.value.trim() === "", "L'adresse est obligatoire.");
        });

        lieu.addEventListener("input", function () {
            validateInput(this, this.value.trim() === "", "Le lieu de perte est obligatoire.");
        });

        datePerte.addEventListener("change", function () {
            validateInput(this, new Date(this.value) > new Date(), "La date de perte ne peut pas être dans le futur.");
        });

        nom.addEventListener("input", function () {
            validateInput(this, this.value.trim() === "", "Le nom est obligatoire.");
        });

        prenom.addEventListener("input", function () {
            validateInput(this, this.value.trim() === "", "Le prénom est obligatoire.");
        });

        photo.addEventListener("input", function () {
            validateInput(photo, photo.files.length === 0, "La photo est obligatoire.");
        });

        // Vérification avant soumission du formulaire
        form.addEventListener("submit", function (event) {
            let hasErrors = false;

            validateInput(titre, titre.value.trim() === "" || titre.value.length < 15, "Le titre est obligatoire et doit comporter au moins 15 caractères.");
            validateInput(description, description.value.trim() === "" || description.value.length < 20, "La description est obligatoire et doit comporter au moins 20 caractères.");
            validateInput(telephone, !/^\d{9,}$/.test(telephone.value), "Le numéro doit contenir au moins 9 chiffres.");
            validateInput(adresse, adresse.value.trim() === "", "L'adresse est obligatoire.");
            validateInput(lieu, lieu.value.trim() === "", "Veuillez renseigner le lieu de perte.");
            validateInput(datePerte, new Date(datePerte.value) > new Date(), "La date de perte ne peut pas être dans le futur.");

            // Vérification si un champ est invalide
            document.querySelectorAll(".is-invalid").forEach(function () {
                hasErrors = true;
            });

            if (hasErrors) {
                event.preventDefault();
            }
        });
    });

</script>
