<!DOCTYPE html>
<html lang="en">
    @include('admin.section.head')
<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <nav id="sidebar">
                @include('admin.section.profilsdroite')
                @include('admin.section.menugauche')
            </nav>
            <div id="content">
               @include('admin.section.menuhaut')
               <div class="content">
                @yield('content')
                </div>
               @include('admin.section.footer')
            </div>
         </div>
      </div>

      @include('admin.section.script')

      @include('admin.section.message')


   </body>
</html>
