<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Wa ioe loreerle</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
      <link href="{{ asset('assets/vitrine/img/logo.png') }}" rel="icon">
      <link href="{{ asset('assets/vitrine/img/logo.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
      <link href="https://fonts.googleapis.com" rel="preconnect">
      <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

      <!-- Vendor CSS Files -->
      <link href="{{ asset('assets/vitrine/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vitrine/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vitrine/vendor/aos/aos.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vitrine/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vitrine/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vitrine/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

      <!-- Main CSS File -->
      <link href="{{ asset('assets/vitrine/css/main.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vitrine/css/detail.css') }}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Medilab
    * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
    * Updated: Aug 07 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
      .video-placeholder {
      width: 100%;
      height: 100%;
      background-color: #f0f0f0; /* Couleur de fond neutre */
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 10px; /* Coins arrondis */
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Ombre douce autour du conteneur */
      position: relative;
  }

  .play-btn {
      font-size: 50px; /* Taille de l'icône */
      color: #fff; /* Couleur de l'icône */
      background-color: rgba(0, 0, 0, 0.6); /* Fond semi-transparent */
      padding: 20px;
      border-radius: 50%; /* Rendre le bouton circulaire */
      transition: background-color 0.3s ease, transform 0.3s ease; /* Animation */
  }

  .play-btn:hover {
      background-color: rgba(0, 0, 0, 0.8); /* Changement de couleur au survol */
      transform: scale(1.1); /* Agrandissement léger au survol */
  }
  .constat .important {
      color: black ;
  }
  .btn-link {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
  }

  .btn-link i {
      font-size: 18px;  /* Ajuster la taille des icônes */
  }

  .footer-menu {
      display: flex;
      justify-content: center;  /* Centrer horizontalement */
      gap: 20px;  /* Espacement entre les liens */
      flex-wrap: wrap;  /* Permet aux liens de se réorganiser sur plusieurs lignes si nécessaire */
  }

  .footer-menu a {
      color: white;  /* Texte en blanc */
      text-decoration: none;  /* Retirer les soulignements par défaut */
      padding: 5px 10px;  /* Ajouter un peu de padding autour du texte */
      position: relative;
  }

  .footer-menu a::after {
      content: "";
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 2px;  /* Taille du trait */
      background-color: white;  /* Couleur du trait */
      transform: scaleX(0);
      transition: transform 0.3s ease;  /* Animation pour l'effet au survol */
  }

  .footer-menu a:hover::after {
      transform: scaleX(1);  /* Agrandir le trait au survol */
  }
  input::placeholder {
      color: white !important;
  }


  /* Animation pour un effet d'apparition */
@keyframes fadeInLeftBorder {
    from {
        transform: translateX(-100px);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.container-fluid .position-absolute {
    animation: fadeInLeftBorder 1s ease-in-out;
}


.avertissement-perte {
    background-color: #fffae6; /* Fond jaune clair */
    border-left: 5px solid #ffc107; /* Bordure gauche jaune vif */
    color: #6c757d; /* Couleur du texte gris foncé */
    font-size: 1rem; /* Taille du texte */
    padding: 1rem 1.5rem; /* Espacement interne */
    border-radius: 5px; /* Coins arrondis */
    display: flex; /* Alignement pour icône et texte */
    align-items: center;
    gap: 0.8rem; /* Espacement entre icône et texte */
    margin: 1rem 0; /* Espacement externe */
}

.avertissement-perte i {
    font-size: 1.5rem; /* Taille de l'icône */
    color: #ffc107; /* Couleur de l'icône jaune */
}

.for1{
    text-align: center;
}
/* Ajout de la bordure pour les colonnes gauche et droite */
/* Ajouter une marge entre les colonnes gauche et droite */
/* Style de la modale */
.modal {
    display: none; /* La modale est cachée par défaut */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Fond semi-transparent */
    justify-content: center;
    align-items: center;
    z-index: 1000; /* S'assurer que la modale soit au-dessus du contenu */
}

.modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    width: 50%;
    max-width: 600px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

button {
    font-size: 14px;
}


    </style>
  </head>
