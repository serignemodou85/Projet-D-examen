<div class="branding d-flex align-items-center">
    <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('assets/vitrine/img/logo.png') }}" alt="">
        <h1 class="sitename">Gëstu Sama Yëf</h1>
        </a>

        <nav id="navmenu" class="navmenu">
        <ul>
            <li><a href="{{ route('vitrine.index') }}" class="active">ACCUEIL<br></a></li>
            <li class="dropdown"><a href="#"><span>ANNONCES</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                    <li><a href="{{ route('vitrine.perte.listebienperdu') }}">Biens Perdus</a></li>
                    <li><a href="{{ route('vitrine.retrouver.listebienretrouver') }}">Biens Retrouves</a></li>
                    <li><a href="{{ route('vitrine.listebienparcategories') }}">Recherche Par Categories</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#"><span>DECLARATION</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                    <li><a href="{{ route('vitrine.perte.declarerperte') }}">Biens Perdu</a></li>
                    <li><a href="{{ route('vitrine.retrouver.declarertrouver') }}">Biens Retrouves</a></li>
                </ul>
            </li>
            <li><a href="{{ route('vitrine.apropos') }}">A PROPOS</a></li>
            <li><a href="{{ route('vitrine.contact') }}">CONTACT</a></li>
            <li><a href="{{ route('login') }}" class="">CONNEXION</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="cta-btn d-none d-sm-block" href="{{ route('vitrine.aide') }}">DIAP SI LIGUEY BI</a>
    </div>

</div>
