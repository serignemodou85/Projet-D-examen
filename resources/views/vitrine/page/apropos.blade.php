@extends('vitrine.layouts.app')

@section('content')
<div class="container-fluid p-5 position-relative text-white" style="background-color: var(--accent-color); height:300px;">
    <!-- Encadrement stylisé -->
    <div class="position-absolute" style="top: 20px; left: 20px; border-left: 8px solid #000040; border-bottom: 8px solid #000040; width: 80px; height: 200px;"></div>

    <!-- Contenu principal -->
    <div class="text-center">
        <h1 class="fw-bold animate_animated animate_fadeInDown">A propos</h1>
        <p class="mt-3">
            <a href="" class="text-decoration-none text-light fw-bold">ACCUEIL</a>
            / <span class="text-light">A propos</span>
        </p>
    </div>
</div>
<br>
<hr>

<div class="container my-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center mb-4">Qui sommes-nous ?</h2>
            <div class="row text-center">
                <div class="col-md-4">
                    <p class="lead">
                        Bienvenue sur Gestu sama yeuf , la plateforme dédiée à la déclaration des biens perdus et retrouvés.
                    </p>
                </div>
                <div class="col-md-4">
                    <p>
                        Nous facilitons la récupération des objets perdus en connectant les personnes qui les ont perdus avec celles qui les ont trouvés.
                    </p>
                </div>
                <div class="col-md-4">
                    <p>
                        Notre communauté contribue à rendre le monde plus organisé et solidaire.
                    </p>
                </div>
            </div>

            <h3 class="mt-5">Notre engagement</h3>
            <p>
                Chez Gëstu Sama Yëf, nous nous engageons à fournir une plateforme sécurisée, intuitive et accessible à tous.
            </p>

            <h3 class="mt-5">Comment ça marche ?</h3>
            <div class="d-flex justify-content-between">
                <p><strong>Déclarer un objet perdu :</strong> Déclarez votre objet avec une description et une photo.</p>
                <p><strong>Déclarer un objet trouvé :</strong> Aidez quelqu'un en déclarant un objet retrouvé.</p>
                <p><strong>Rechercher un objet :</strong> Utilisez notre moteur de recherche.</p>
            </div>

            <h3 class="mt-5">Rejoignez notre communauté</h3>
            <p>
                Ensemble, nous pouvons faire la différence en aidant les gens à retrouver leurs objets précieux.
            </p>

            <div class="text-center mt-5">
                <a href="" class="btn btn-primary btn-lg">Déclarer Objet Perdu</a>
                <a href="" class="btn btn-success btn-lg">Rechercher un objet</a>
                <a href="" class="btn btn-warning btn-lg">Déclarer Objet Retrouvé</a>
            </div>
        </div>
    </div>
</div>

@endsection
