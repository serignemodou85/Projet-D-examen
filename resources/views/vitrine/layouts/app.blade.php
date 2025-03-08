<!DOCTYPE html>
<html lang="en">
    @include('vitrine.section.head')
<body>
    <header id="header" class="header sticky-top">
        @include('vitrine.section.barehaut')
        @include('vitrine.section.menu')
    </header>
    <div class="content">
        @yield('content')
    </div>
    <hr>
    <app-footer _ngcontent-ng-c2665693032="" _nghost-ng-c3965900266="">
        <div _ngcontent-ng-c3965900266="" data-wow-delay="0.1s" class="container-fluid text-white footer pt-5 mt-5 wow fadeIn" style="background: rgb(2, 18, 106); visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
            <div _ngcontent-ng-c3965900266="" class="container py-5">
                <div _ngcontent-ng-c3965900266="" class="row g-5">
                    @include('vitrine.section.accerapide')
                    @include('vitrine.section.contact')
                    @include('vitrine.section.formulaire')
                </div>
            </div>
            <hr>
            @include('vitrine.section.footer')
        </div>
    </app-footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    @include('vitrine.section.script')

    @include('admin.section.message')

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
</body>
</html>
