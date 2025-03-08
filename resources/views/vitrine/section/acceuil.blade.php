<section id="acceuil" class="hero section light-background">
    <img src="{{ asset('assets/images/profils.webp') }}" alt="" data-aos="fade-in">
    <div class="container position-relative">
        <div class="welcome position-relative" data-aos="fade-down" data-aos-delay="100">
            <h2>Gëstu Sama Yëf</h2>
            <p> Gëstu Sama Yëf est une plateforme où vous pouvez facilement signaler les objets perdus ou trouvés et aider à retrouver ce qui a été égaré.</p>
        </div><!-- End Welcome -->
        <div class="content row gy-4">
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="why-box" data-aos="zoom-out" data-aos-delay="200">
                    <h3>Pourquoi choisir Gëstu Sama Yëf ?</h3>
                    <p>
                        Avec Gëstu Sama Yëf, vous pouvez rapidement signaler les objets que vous avez perdus ou trouvés, aidant ainsi à connecter ceux qui cherchent et ceux qui ont retrouvé des objets. C'est une manière simple, efficace et fiable de redonner ce qui a été égaré.
                    </p>
                    <div class="text-center">
                        <a href="{{ route('vitrine.apropos') }}" class="more-btn"><span>En savoir plus</span> <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div><!-- End Why Box -->
            <div class="col-lg-8 d-flex align-items-stretch">
                <div class="d-flex flex-column justify-content-center">
                    <div class="row gy-4">
                        <div class="col-xl-4 d-flex align-items-stretch">
                            <div class="icon-box" data-aos="zoom-out" data-aos-delay="300">
                                <i class="bi bi-x-circle"></i>
                                <h4>Vous avez perdu quelque chose ? Déclarez-le ici</h4>
                                <a href="{{ route('vitrine.perte.declarerperte') }}">Déclarer Perte</a>
                            </div>
                        </div><!-- End Icon Box -->

                        <div class="col-xl-4 d-flex align-items-stretch">
                            <div class="icon-box" data-aos="zoom-out" data-aos-delay="400">
                                <i class="bi bi-check-circle"></i>
                                <h4>Vous avez retrouvé quelque chose ? Déclarez-le ici</h4>
                                <a href="{{ route('vitrine.retrouver.declarertrouver') }}">Déclarer Trouvé</a>
                            </div>
                        </div><!-- End Icon Box -->
                    </div>
                </div>
            </div>
        </div><!-- End Content-->
    </div>
</section>
