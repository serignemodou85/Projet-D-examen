@extends('vitrine.layouts.app')

@section('content')
<div class="container-fluid p-5 position-relative text-white" style="background-color: var(--accent-color); height:300px;">
    <!-- Encadrement stylisé -->
    <div class="position-absolute" style="top: 20px; left: 20px; border-left: 8px solid #000040; border-bottom: 8px solid #000040; width: 80px; height: 200px;"></div>

    <!-- Contenu principal -->
    <div class="text-center">
        <h1 class="fw-bold animate__animated animate__fadeInDown">Contact</h1>
        <p class="mt-3">
            <a href="" class="text-decoration-none text-light fw-bold">ACCUEIL</a>
            / <span class="text-light">Contact</span>
        </p>
    </div>
</div>
<br>
<hr>
<div class="container-xxl py-5">
    <div class="container">
      <!-- Titre principal -->
      <h1 class="text-center mb-5 wow fadeInUp" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
        Contactez-nous
      </h1>

      <!-- Texte introductif -->
      <p class="text-center">
        Si vous avez perdu ou ramassé quelque chose ? <br>
        Vous rencontrez des difficultés avec notre plateforme ? <br>
        Vous avez des suggestions pour améliorer nos services ? <br>
        N’hésitez pas à nous contacter.
      </p>

      <!-- Section des informations de contact -->
      <div class="row g-4">
        <div class="col-12">
          <div class="row gy-4">
            <!-- Disponibilité -->
            <div class="col-md-4 wow fadeIn" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
              <div class="d-flex align-items-center bg-light rounded p-4">
                <div class="bg-white border rounded d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                  <i class="fa fa-clock text-primary"></i>
                </div>
                <span>Plateforme disponible <br> 7j/7 - 24h/24</span>
              </div>
            </div>

            <!-- Email -->
            <div class="col-md-4 wow fadeIn" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;">
              <div class="d-flex align-items-center bg-light rounded p-4">
                <div class="bg-white border rounded d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                  <i class="fa fa-envelope-open text-primary"></i>
                </div>
                <span>loreerle221@gmail.com</span>
              </div>
            </div>

            <!-- Téléphone -->
            <div class="col-md-4 wow fadeIn" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
              <div class="d-flex align-items-center bg-light rounded p-4">
                <div class="bg-white border rounded d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                  <i class="fa fa-phone-alt text-primary"></i>
                </div>
                <span>+221 77 556 54 54 <br> +221 77 556 54 54</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Image de contact -->
        <div class="col-md-6 wow fadeInUp" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <img src="{{ asset('assets/vitrine/img/logo.png') }}" alt="">
        </div>

        <!-- Formulaire de contact -->
        <div class="col-md-6">
          <div class="wow fadeInUp" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
            <p class="mb-4 text-primary">
              Vous pouvez également nous écrire en remplissant le formulaire ci-dessous. Nous vous répondrons dans les plus brefs délais.
            </p>
            <div class="container">
                <form method="POST" action="{{ route('contact.addContact') }}" novalidate class="ng-untouched ng-pristine ng-invalid" id="contactForm">
                    @csrf
                    <!-- Nom -->
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" id="nom1" name="nom" class="form-control" required>
                        @error('nom')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Message -->
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" name="message" rows="4" class="form-control" required></textarea>
                        @error('message')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Bouton d'envoi -->
                    <button type="submit" class="btn btn-primary" id="submitButton" >Envoyer</button>
                </form>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const form = document.querySelector("#contactForm"); // Correct selection of form by ID

                        // Sélection des champs à valider
                        const nom1 = document.getElementById("nom1");
                        const email = document.getElementById("email");
                        const message = document.getElementById("message");

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

                        nom1.addEventListener("input", function () {
                            validateInput(this, this.value.trim() === "", "Le nom est obligatoire.");
                        });

                        email.addEventListener("input", function () {
                            if (this.value.trim() === "") {
                                validateInput(this, true, "L'email est obligatoire.");
                            } else {
                                // Validate email format using a regular expression
                                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                                validateInput(this, !emailPattern.test(this.value), "L'email n'est pas valide.");
                            }
                        });

                        message.addEventListener("input", function () {
                            if (this.value.trim() === "") {
                                validateInput(this, true, "Le message est obligatoire.");
                            } else {
                                validateInput(this, this.value.length < 10, "Le message doit comporter au moins 10 caractères.");
                            }
                        });

                        // Vérification avant soumission du formulaire
                        form.addEventListener("submit", function (event) {
                            let hasErrors = false;

                            validateInput(nom, nom.value.trim() === "" || nom.value.length < 15, "Le nom est obligatoire et doit comporter au moins 15 caractères.");

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

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
