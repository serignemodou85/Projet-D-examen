<!DOCTYPE html>
<html lang="en">
    @include('vitrine.section.head')
<body class="index-page">

    <header id="header" class="header sticky-top">
        @include('vitrine.section.barehaut')
        @include('vitrine.section.menu')
    </header>

    <main class="main">
        @include('vitrine.section.acceuil')
        <hr>
        @include('vitrine.section.presentation')
        @include('vitrine.section.bienperdu')
        <hr><br><br>
        @include('vitrine.section.bientrouver')
        <hr>
        @include('vitrine.section.dernierannonce')
    </main>
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
    <!-- CDN SWEET ALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- SweetAlert2 pour le message de bienvenue -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Bienvenue chez GESTU SAMA YEUF !",
                text: "Trouvez ou déclarez vos objets en toute simplicité.",
                icon: "success",
                timer: 5000,
                showConfirmButton: false,
                toast: false
            });
        });
    </script>
    @include('vitrine.page.showMessage')

    @include('vitrine.section.script')
</body>

</html>
