<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="" alt="Tamenk Logo" height="60" width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href='@if(auth()->user() instanceof \app\models\SuperAdmin){{route("super-admin.dashboard.index")}}@else{{route("admin.dashboard.index")}}@endif' class="nav-link">Home</a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      

       
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        <li class="nav-item">
            <a class="btn btn-outline-danger" href='@if(auth()->user() instanceof \app\models\SuperAdmin){{route("super-admin.logout")}}@else{{route("admin.logout")}}@endif'  role="button">
                logout
            </a>
        </li>

        
    </ul>
</nav>
<!-- /.navbar -->