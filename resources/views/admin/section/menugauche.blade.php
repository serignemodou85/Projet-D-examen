<div class="sidebar_blog_2">
    <h4>ADMINISTRATEUR</h4>
    <ul class="list-unstyled components">
        <!-- Tableau de bord -->
        <li class="active">
            <a href="{{ route('admin.index') }}">
                <i class="fa fa-tachometer-alt blue_color"></i>
                <span>Accueil</span>
            </a>
        </li>

        <!-- Gestion des utilisateurs -->
        <li>
            <a href="#gestion_utilisateurs" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-users blue2_color"></i>
                <span>Gestion des Utilisateurs</span>
            </a>
            <ul class="collapse list-unstyled" id="gestion_utilisateurs">
                <li><a href="{{route('admin.page.liteutilisateur')}}"> > <span>Liste Utilisateurs</span></a></li>
                <li><a href="{{route('admin.page.ajouteradmin')}}"> > <span>Ajouter Admin</span></a></li>
                <li><a href="{{route('admin.page.listeadmin')}}"> > <span>Liste Admin</span></a></li>
            </ul>
        </li>

        <!-- Gestion des annonces -->
        <li>
            <a href="#gestion_annonces" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-bullhorn yellow_color"></i>
                <span>Gestion des Annonces</span>
            </a>
            <ul class="collapse list-unstyled" id="gestion_annonces">
                <li><a href="{{route('admin.page.listeanonce')}}"> > <span>Liste Annonces</span></a></li>
                <li><a href="{{route('admin.page.ajoutanonce')}}"> > <span>Ajouter Annonce</span></a></li>
            </ul>
        </li>

        <!-- Gestion des objets perdus/retrouvés -->
        <li>
            <a href="#gestion_objet" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="fa fa-search purple_color"></i>
                <span>Gestion Objets P/R</span>
            </a>
            <ul class="collapse list-unstyled" id="gestion_objet">
                <li><a href="{{route('admin.page.listeobjetperdu')}}"> > <span>Objets Perdus</span></a></li>
                <li><a href="{{route('admin.page.listeobjetretrouver')}}"> > <span>Objets Retrouvés</span></a></li>
            </ul>
        </li>

        <!-- Statistiques et rapports -->
        <li>
            <a href="{{ route('admin.page.messagerecue') }}">
                <i class="fa fa-envelope orange_color"></i>
                <span>Messages Recue</span>
            </a>
        </li>


        <!-- Profil administrateur -->
        <li>
            <a href="{{ route('admin.page.profil') }}">
                <i class="fa fa-user-circle green_color"></i>
                <span>Profil Administrateur</span>
            </a>
        </li>

        <!-- Paramètres -->
        <li>
            <a href="{{ route('admin.page.parametres') }}">
                <i class="fa fa-cogs yellow_color"></i>
                <span>Paramètres</span>
            </a>
        </li>

        <!-- Déconnexion -->
        <li>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; padding: 0; ">
                    <i class="fa fa-sign-out-alt red_color" style="margin-left: 25px;"></i>
                    <span>Déconnexion</span>
                </button>
            </form>
        </li>

    </ul>
</div>
