@extends('admin.layouts.app')

@section('content')
<!-- dashboard inner -->
<div class="midde_cont">
    <div class="container-fluid">
       <div class="row column_title">
          <div class="col-md-12">
             <div class="page_title">
                <h2>ACCUEIL</h2>
             </div>
          </div>
       </div>

       <!-- Stats row -->
       <div class="row column1">
          <!-- Nombre Utilisateur -->
          <div class="col-md-6 col-lg-3">
             <div class="full counter_section margin_bottom_30">
                <div class="couter_icon">
                   <div>
                      <i class="fa fa-user yellow_color"></i>
                   </div>
                </div>
                <div class="counter_no">
                   <div>
                      <p class="total_no">{{ $totalUsers }}</p>
                      <p class="head_couter">Nombre Utilisateurs</p>
                   </div>
                </div>
             </div>
          </div>

          <!-- Total Annonces -->
          <div class="col-md-6 col-lg-3">
             <div class="full counter_section margin_bottom_30">
                <div class="couter_icon">
                   <div>
                      <i class="fa fa-bullhorn blue1_color"></i>
                   </div>
                </div>
                <div class="counter_no">
                   <div>
                      <p class="total_no">{{ $totalAnnonces }}</p>
                      <p class="head_couter">Total Annonces</p>
                   </div>
                </div>
             </div>
          </div>

          <!-- Objets Perdus -->
          <div class="col-md-6 col-lg-3">
             <div class="full counter_section margin_bottom_30">
                <div class="couter_icon">
                   <div>
                      <i class="fa fa-cloud-download green_color"></i>
                   </div>
                </div>
                <div class="counter_no">
                   <div>
                      <p class="total_no">{{ $totalObjetsPerdus }}</p>
                      <p class="head_couter">Objets Perdus</p>
                   </div>
                </div>
             </div>
          </div>

          <!-- Objets Retrouvés -->
          <div class="col-md-6 col-lg-3">
             <div class="full counter_section margin_bottom_30">
                <div class="couter_icon">
                   <div>
                      <i class="fa fa-check-circle red_color"></i>
                   </div>
                </div>
                <div class="counter_no">
                   <div>
                      <p class="total_no">{{ $totalObjetsRetrouves }}</p>
                      <p class="head_couter">Objets Retrouvés</p>
                   </div>
                </div>
             </div>
          </div>
       </div>

    </div>
</div>
@endsection
