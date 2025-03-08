@extends('admin.layouts.app')

@section('content')
    <div class="row column_title">
        <div class="col-md-12">
        <div class="page_title">
            <h2>LISTE OBJETS PERDUS</h2>
        </div>
        </div>
    </div>
    <br>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <div class="row g-4" style="margin-left: 60px; background-color: #f0f0f0; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-right: 30px;">
        @foreach ($objets as $objet)
            <div class="col-sm-12 col-md-8 d-flex align-items-center" style="padding: 10px">
                <!-- Image -->
                <img src="{{ asset('assets/vitrine/img/logo.png') }}" alt="" style="width: 100px; height: auto; margin-right: 20px;" data-aos="fade-in">

                <!-- Détails -->
                <div class="text-start ps-4">
                    <a href="{{ url('#/objet-detail/' . $objet->id) }}">
                        <h5 class="mb-3">{{ $objet->titre_anonce }}</h5>
                    </a>
                    <span class="text-truncate me-4" style="margin-right: 20px;">
                        <i class="fa fa-map-marker-alt text-primary me-2"></i>
                        {{ $objet->lieu_perte }}
                    </span>
                    <span class="text-truncate me-4" style="margin-right: 20px;">
                        <i class="far fa-clock text-primary me-2"></i>
                        {{ $objet->date_perte }}
                    </span>
                    <span class="text-truncate me-4" style="margin-right: 20px;">
                        <i class="far fa-user text-primary me-2"></i>
                        {{ $objet->utilisateur->prenom }} {{ $objet->utilisateur->nom }}
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
        <br>
    </div>
@endsection
