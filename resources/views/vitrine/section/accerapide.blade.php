<div class="col-lg-4 col-md-6">
    <h5 class="text-white mb-4">Accès rapides</h5>
    <a routerlink="" class="btn btn-link text-white-50" href="{{ route('vitrine.apropos') }}">
        <i class="fas fa-info-circle me-2"></i>A propos
    </a>
    <a routerlink="declarer-retrouve" class="btn btn-link text-white-50" href="{{ route('vitrine.perte.declarerperte') }}">
        <i class="fas fa-search me-2"></i>Déclarer une perte
    </a>
    <a routerlink="declarer-perte" class="btn btn-link text-white-50" href="{{ route('vitrine.retrouver.declarertrouver') }}">
        <i class="fas fa-flag me-2"></i>Déclarer un objet retrouvé
    </a>
    <a routerlink="don" class="btn btn-link text-white-50" href="{{ route('vitrine.aide') }}">
        <i class="fas fa-gift me-2"></i>Faire un don
    </a>
    <a routerlink="condition-utilisation" class="btn btn-link text-white-50" href="{{ route('vitrine.condition') }}">
        <i class="fas fa-file-alt me-2"></i>Condition d'utilisation
    </a>
    <a routerlink="confidentialite" class="btn btn-link text-white-50" href="{{ route('vitrine.politiqueconf') }}">
        <i class="fas fa-shield-alt me-2"></i>Politique de confidentialité
    </a>
</div>
