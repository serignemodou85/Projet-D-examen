@extends('admin.layouts.app')

@section('content')
    <div class="row column_title">
        <div class="col-md-12">
        <div class="page_title">
            <h2>AJOUT ADMIN</h2>
        </div>
        </div>
    </div>
    <br>

    @if (session('success_alert'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                timer: 2000,
                timerProgressBar: true,
                title: "Ajout Réussi",
                text: "Admin ajouté avec succès",
                icon: "success",
                showConfirmButton: false
            });
        </script>
    @endif

    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
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
                    <label for="titre" class="form-label">Nom<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="">
                    @error('nom')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="titre" class="form-label">Prenom<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="">
                    @error('prenom')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="titre" class="form-label">Telephone<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="telephone" name="telephone" placeholder="">
                    @error('telephone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Colonne Droite -->
            <div class="col-md-6 border" style="border: 1px solid black; padding: 15px;">
                <div class="mb-3">
                    <label for="nom" class="form-label">Email  <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="pasword" class="form-control" id="password" name="password" placeholder="">
                </div>
            </div>
        </div>
        <br>

        <!-- Bouton de soumission -->
        <button type="submit" class="btn btn-primary">Ajout Admin</button>
    </form>
@endsection
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");

        // Sélection des champs à valider
        const nom = document.getElementById("nom");
        const prenom = document.getElementById("prenom");
        const telephone = document.getElementById("telephone");
        const email = document.getElementById("email");
        const password = document.getElementById("password");

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

        nom.addEventListener("input", function () {
            validateInput(this, this.value.trim() === "", "Le nom est obligatoire.");
        });

        prenom.addEventListener("input", function () {
            validateInput(this, this.value.trim() === "", "Le prénom est obligatoire.");
        });

        telephone.addEventListener("input", function () {
            validateInput(this, this.value.trim() === "", "Le numéro de téléphone est obligatoire.");
            validateInput(this, !/^\d{9,}$/.test(this.value), "Le numéro doit contenir au moins 9 chiffres.");
        });

        email.addEventListener("input", function () {
            validateInput(this, this.value.trim() === "", "L'email est obligatoire.");
            validateInput(this, !/\S+@\S+\.\S+/.test(this.value), "Veuillez entrer un email valide.");
        });

        password.addEventListener("input", function () {
            validateInput(this, this.value.trim() === "", "Le mot de passe est obligatoire.");
            validateInput(this, this.value.length < 6, "Le mot de passe doit comporter au moins 6 caractères.");
        });

        // Vérification avant soumission du formulaire
        form.addEventListener("submit", function (event) {
            let hasErrors = false;

            validateInput(nom, nom.value.trim() === "", "Le nom est obligatoire.");
            validateInput(prenom, prenom.value.trim() === "", "Le prénom est obligatoire.");
            validateInput(telephone, telephone.value.trim() === "", "Le numéro de téléphone est obligatoire.");
            validateInput(telephone, !/^\d{9,}$/.test(telephone.value), "Le numéro doit contenir au moins 9 chiffres.");
            validateInput(email, email.value.trim() === "", "L'email est obligatoire.");
            validateInput(email, !/\S+@\S+\.\S+/.test(email.value), "Veuillez entrer un email valide.");
            validateInput(password, password.value.trim() === "", "Le mot de passe est obligatoire.");
            validateInput(password, password.value.length < 6, "Le mot de passe doit comporter au moins 6 caractères.");

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
