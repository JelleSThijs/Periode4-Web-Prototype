<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <!-- Makes the page responsive on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Official bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm fixed-top bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="Avatar Logo" style="width:40px;" class="rounded-pill">
                <span class="d-none d-md-inline">TellYourPhone</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav single-note">
                    <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">Smartphones</button>
                        <ul class="dropdown-menu single-note-list">
                            <li><a class="dropdown-item" href="#">Apple</a></li>
                            <li><a class="dropdown-item" href="#">Samsung</a></li>
                            <li><a class="dropdown-item" href="#">Google</a></li>
                            <li><a class="dropdown-item" href="#">Motorola</a></li>
                            <li><a class="dropdown-item" href="#">OnePlus</a></li>
                            <li><a class="dropdown-item" href="#">Oppo</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">Abonnementen</button>
                        <ul class="dropdown-menu single-note-list">
                            <li><a class="dropdown-item" href="#">TMobile</a></li>
                            <li><a class="dropdown-item" href="#">Lebara</a></li>
                            <li><a class="dropdown-item" href="#">Vodafone</a></li>
                            <li><a class="dropdown-item" href="#">Simpel</a></li>
                            <li><a class="dropdown-item" href="#">Simyo</a></li>
                        </ul>
                    <li class="nav-item"><a class="nav-link" href="#">Klantenservice</a></li>
                </ul>
            </div>

            <!-- Right side icons -->
            <ul class="navbar-nav ms-auto flex-row gap-1">
                <!-- User button -->
                <li class="nav-item dropdown">
                    <button class="btn nav-link px-2" data-bs-toggle="dropdown" aria-label="User menu">
                        <i class="bi bi-person"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end p-3" style="min-width: 220px;">
                        <h6 class="dropdown-header">Inloggen</h6>
                        <div class="mb-2">
                            <input type="text" class="form-control form-control-sm" placeholder="Gebruikersnaam">
                        </div>
                        <div class="mb-2">
                            <input type="password" class="form-control form-control-sm" placeholder="Wachtwoord">
                        </div>
                        <button class="btn btn-primary btn-sm w-100 mb-2">Inloggen</button>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center" href="#">Registreren</a>
                    </div>
                </li>

                    <!-- Search button -->
                    <li class="nav-item">
                        <button class="btn nav-link px-2" id="searchToggle" data-bs-toggle="collapse" data-bs-target="#searchCollapse" aria-label="Search">
                            <i class="bi bi-search fs-5"></i>
                        </button>
                    </li>
            </ul>
        </div>
    </nav>

    <!-- Search bar -->
        <div class="container-fluid collapse bg-white border-bottom" id="searchCollapse">
        <div class="input-group p-2">
            <input type="text" class="form-control" placeholder="Zoeken...">
            </div>
        </div>
    </header>

    <main class="pt-4">
        <!-- Carousel -->
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
            <button class="btn btn-outline-secondary" id="searchClose">✕</button>
        </div>
    </div>
</body>


<script>
    document.addEventListener('click', function(e) {
        const searchCollapse = document.getElementById('searchCollapse');
        const searchToggle = document.getElementById('searchToggle');

        if (searchCollapse.classList.contains('show') &&
            !searchCollapse.contains(e.target) &&
            !searchToggle.contains(e.target)) {
            bootstrap.Collapse.getInstance(searchCollapse).hide();
        }
    });

    // get navbar height
    document.documentElement.style.setProperty('--navbar-height', document.querySelector('.navbar').offsetHeight + 'px');
</script>

</html>