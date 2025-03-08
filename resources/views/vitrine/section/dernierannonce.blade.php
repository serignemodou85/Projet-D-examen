<div class="container">
    <h1 class="text-center text-primary mb-5" style="text-decoration: underline">Liste des dernières annonces</h1>
    <div class="tab-class text-center">
      <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
        <li class="nav-item">
          <a data-bs-toggle="pill" href="#tab-1" class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active">
            <h6 class="mt-n1 mb-0">Biens perdus</h6>
          </a>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="pill" href="#tab-2" class="d-flex align-items-center text-start mx-3 pb-3">
            <h6 class="mt-n1 mb-0">Biens retrouvés</h6>
          </a>
        </li>
      </ul>
      <div class="tab-content">
        <!-- Biens perdus -->
        <div id="tab-1" class="tab-pane fade table-active active show">
            <h4>Biens perdus</h4><br>

            <div class="row g-4" style="margin-left: 60px; background-color: #f0f0f0; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-right: 30px;">
                @foreach ($objetsPerdus as $objet)
                    <div class="col-sm-12 col-md-8 d-flex align-items-center" style="padding: 10px">
                        <!-- Image -->
                        <img src="{{ asset('assets/vitrine/img/logo.png') }}" alt="" style="width: 100px; height: auto;" data-aos="fade-in">

                        <!-- Détails -->
                        <div class="text-start ps-4">
                            <a href="{{ url('#/objet-detail/' . $objet->id) }}">
                                <h5 class="mb-3">{{ $objet->titre_anonce }}</h5>
                            </a>
                            <span class="text-truncate me-5">
                                <i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $objet->lieu_perte }}
                            </span>
                            <span class="text-truncate me-5">
                                <i class="far fa-clock text-primary me-2"></i>{{ $objet->date_perte }}
                            </span>
                            <span class="text-truncate me-0">
                                <i class="far fa-user text-primary me-2"></i>{{ $objet->utilisateur->prenom }} {{ $objet->utilisateur->nom }}
                            </span>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                        <!-- Bouton Voir les détails -->
                        <div class="d-flex mb-3" style="background-color: var(--accent-color);">
                            <a href="{{ route('vitrine.page.detailobjet', ['id' => $objet->id]) }}" class="btn btn-primary" style="background-color: var(--accent-color);">
                                Voir les détails
                                <i class="fa fa-eye text-primary"></i>
                            </a>
                        </div>
                        <!-- Date de l'annonce -->
                        <small class="text-truncate">
                            <i class="far fa-calendar-alt text-primary me-2"></i>
                            Date de l'annonce :
                            <b>{{ $objet->created_at }}</b>
                        </small>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('vitrine.perte.listebienperdu') }}" class="btn btn-primary my-5 px-5">Voir plus</a>
        </div>
        <!-- Biens retrouvés -->
        <div id="tab-2" class="tab-pane fade">
            <h4>Biens retrouvés</h4><br>

            <div class="row g-4" style="margin-left: 60px; background-color: #f0f0f0; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-right: 30px;">
                @foreach ($objetsRetrouves as $objet)
                    <div class="col-sm-12 col-md-8 d-flex align-items-center" style="padding: 10px">
                        <!-- Image -->
                        <img src="{{ asset('assets/vitrine/img/logo.png') }}" alt="" style="width: 100px; height: auto;" data-aos="fade-in">

                        <!-- Détails -->
                        <div class="text-start ps-4">
                            <a href="{{ url('#/objet-detail/' . $objet->id) }}">
                                <h5 class="mb-3">{{ $objet->titre_anonce }}</h5>
                            </a>
                            <span class="text-truncate me-5">
                                <i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $objet->lieu_perte }}
                            </span>
                            <span class="text-truncate me-5">
                                <i class="far fa-clock text-primary me-2"></i>{{ $objet->date_perte }}
                            </span>
                            <span class="text-truncate me-0">
                                <i class="far fa-user text-primary me-2"></i>{{ $objet->utilisateur->prenom }} {{ $objet->utilisateur->nom }}
                            </span>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                        <!-- Bouton Voir les détails -->
                        <div class="d-flex mb-3" style="background-color: var(--accent-color);">
                            <a href="{{ route('vitrine.page.detailobjet', ['id' => $objet->id]) }}" class="btn btn-primary" style="background-color: var(--accent-color);">
                                Voir les détails
                                <i class="fa fa-eye text-primary"></i>
                            </a>
                        </div>
                        <!-- Date de l'annonce -->
                        <small class="text-truncate">
                            <i class="far fa-calendar-alt text-primary me-2"></i>
                            Date de l'annonce :
                            <b>{{ $objet->created_at }}</b>
                        </small>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('vitrine.retrouver.listebienretrouver') }}" class="btn btn-primary my-5 px-5">Voir plus</a>
        </div>
      </div>
    </div>
  </div>
