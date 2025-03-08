<div class="sidebar_blog_1">
    <div class="sidebar-header">
        <div class="logo_section">
            <a href="index.html"><img class="logo_icon img-responsive" src="{{ asset('assets/admin/images/logo/logo_icon.png')}}" alt="#" /></a>
        </div>
    </div>
    <div class="sidebar_user_info">
        <div class="icon_setting"></div>
        <div class="user_profle_side">
            @if(Auth::check())
                <div class="user_info">
                    {{ $userInfo['nom'] }} {{ $userInfo['prenom'] }}
                    <p><span class="online_animation"></span> Online</p>
                </div>
                <div class="user_img">
                    {{ $userInfo['statut'] }}
                </div>
            @else
                <p>Utilisateur non connecté</p>
            @endif
       </div>
    </div>
</div>
