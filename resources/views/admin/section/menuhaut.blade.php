<div class="topbar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="full">
            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
            <div class="logo_section">
                <a href=""><img src="{{asset('assets/admin/images/logo/logo_icon.png')}}" alt=""></a>
            </div>
            <div class="right_topbar">
                <div class="icon_info">
                    <ul>
                        {{-- NOTIFICATION --}}
                        <li>
                            <a href="#">
                                <i class="fas fa-bell"></i>
                                <span class="badge">2</span>
                            </a>
                        </li>
                        {{-- MESSAGE EMAIL-NORMAL --}}
                        <li>
                            <a href="#">
                                <i class="fas fa-envelope"></i>
                                <span class="badge">3</span>
                            </a>
                        </li>
                    </ul>

                    <ul class="user_profile_dd">
                    <li>
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            @if(Auth::check())  <!-- Vérifie si un utilisateur est connecté -->
                                <p class="nom_prenom">
                                    {{ Auth::user()->nom }} {{ Auth::user()->prenom }}
                                </p>
                                <p class="user-role">
                                    {{ Auth::user()->statut }}
                                </p>
                            @else
                                <p>Utilisateur non connecté</p>
                            @endif
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="profile.html">Profils</a>
                            <a class="dropdown-item" href="settings.html">Parametres</a>
                            <a class="dropdown-item" href="#"><span>Deconnexion</span> <i class="fa fa-sign-out"></i></a>
                        </div>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
