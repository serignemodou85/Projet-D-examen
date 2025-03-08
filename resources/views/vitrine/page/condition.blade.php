@extends('vitrine.layouts.app')

@section('content')
<div class="container-fluid p-5 position-relative text-white" style="background-color: var(--accent-color); height:300px;">
    <!-- Encadrement stylisé -->
    <div class="position-absolute" style="top: 20px; left: 20px; border-left: 8px solid #000040; border-bottom: 8px solid #000040; width: 80px; height: 200px;"></div>

    <!-- Contenu principal -->
    <div class="text-center">
        <h1 class="fw-bold animate__animated animate__fadeInDown">Condition d'utilisation</h1>
        <p class="mt-3">
            <a href="" class="text-decoration-none text-light fw-bold">ACCUEIL</a>
            / <span class="text-light">Condition d'utilisation</span>
        </p>
    </div>
</div>
<br>
<hr>
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-4" style="text-decoration: underline;">Conditions d'utilisation</h1>
        <p id="last-updated" class="text-muted text-center"></p>
        <script>
            // Obtenir la date actuelle
            const currentDate = new Date();

            // Options pour formater la date
            const options = {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            };

            // Formater la date au format français
            const formattedDate = currentDate.toLocaleDateString('fr-FR', options);

            // Ajouter la date dans le paragraphe
            document.getElementById('last-updated').textContent = `Dernière mise à jour : ${formattedDate}`;
        </script>

        <div class="card shadow-sm p-4">
            <h6>Bienvenue sur Gëstu Sama Yëf, un service dédié à la déclaration et la recherche d'objets perdus et trouvés au Sénégal. En utilisant notre site, vous acceptez les présentes conditions d'utilisation. Merci de les lire attentivement.</h6>

            <!-- Section 1: Objet du site -->
            <section>
                <h2>1. Objet du site</h2>
                <p>
                    <strong>Gëstu Sama Yëf</strong> permet aux utilisateurs de publier des annonces pour signaler des objets perdus ou trouvés, ainsi que de faciliter la mise en relation entre les parties concernées.
                </p>
                <br>
                <h2>2. Création de compte</h2>
                <p>
                    L'inscription sur <strong>Gëstu Sama Yëf</strong> est requise pour publier des annonces et accéder à certaines fonctionnalités. Vous vous engagez à fournir des informations exactes et à maintenir à jour vos coordonnées. Vous êtes seul responsable de la sécurité de votre compte.
                </p>
                <br>
                <h2>3. Utilisation du service</h2>
                <ul>
                    <li>Utiliser le site uniquement à des fins légales et conformément à son objet.</li>
                    <li>Ne pas publier d'annonces fausses, trompeuses ou illégales.</li>
                    <li>Publier des informations précises sur les objets perdus ou trouvés.</li>
                    <li>Ne pas utiliser le service pour envoyer des messages commerciaux ou non sollicités (spams).</li>
                </ul>
                <br>
                <h2>4. Responsabilité des contenus</h2>
                <p>
                    Vous êtes seul responsable des annonces publiées sur <strong>Gëstu Sama Yëf</strong>. Nous nous réservons le droit de retirer toute annonce contraire aux présentes conditions ou à la législation en vigueur.
                </p>
                <br>
                <h2>5. Données personnelles</h2>
                <p>
                    Les informations fournies sur <strong>Gëstu Sama Yëf</strong> sont utilisées pour faciliter la mise en relation entre utilisateurs. Vos données seront traitées conformément à notre <a href="{{route('vitrine.politiqueconf')}}">Politique de confidentialité</a>.
                </p>
                <br>
                <h2>6. Propriété intellectuelle</h2>
                <p>
                    Les contenus de <strong>Gëstu Sama Yëf</strong> (textes, images, logos, etc.) sont protégés par des droits de propriété intellectuelle. Leur reproduction ou utilisation sans autorisation préalable est interdite.
                </p>
                <br>
                <h2>7. Responsabilité du site</h2>
                <p>
                    <strong>Gëstu Sama Yëf</strong> n'est pas responsable des contenus publiés par les utilisateurs. Nous ne garantissons pas que les objets signalés seront retrouvés ni les interactions entre utilisateurs.
                </p>
                <br>
                <h2>8. Modification des conditions</h2>
                <p>
                    Nous nous réservons le droit de modifier ces conditions à tout moment. Les modifications seront effectives dès leur publication sur cette page. Consultez régulièrement cette page pour rester informé.
                </p>
                <br>
                <h2>9. Contact</h2>
                <p>
                    Pour toute question, contactez-nous à : <a href="mailto:contact@loreerle.com">contact@loreerle.com</a>.
                </p>
            </section>
        </div>
    </div>
</div>

@endsection
