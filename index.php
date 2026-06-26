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
        <nav class="navbar navbar-expand-sm bg-white">
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
                                <li><a class="dropdown-item" href="phones.php?b=apple">Apple</a></li>
                                <li><a class="dropdown-item" href="phones.php?b=samsung">Samsung</a></li>
                                <li><a class="dropdown-item" href="phones.php?b=google">Google</a></li>
                                <li><a class="dropdown-item" href="phones.php?b=onePlus">OnePlus</a></li>
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
                            <i class="bi bi-person fs-5"></i>
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

        <div class="container-fluid collapse bg-white border-bottom align-content-center" id="searchCollapse">
            <div class="input-group px-2">
                <input type="text" class="form-control" placeholder="Zoeken...">
                <button class="btn btn-outline-primary" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
    </header>

    <main>
        <!-- Carousel -->
        <div class="container-fluid mt-5 mb-5">
            <div id="featured-phones" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner h-100">
                    <div class="carousel-item h-100 overflow-hidden border-5 rounded-5 border border-primary-subtle active">
                        <!-- Card 1: iPhone 17 Pro -->
                        <div class="card bg-primary border-0 h-100">
                            <div class="row g-0 h-100">
                                <div class="col-5 bg-white">
                                    <img src="img/phones/iphone 17 pro.svg" class="img-fluid w-100 h-100" style="object-fit:contain;" alt="Apple iPhone 17 Pro">
                                </div>
                                <div class="col-7 d-flex flex-column justify-content-center">
                                    <div class="card-header">
                                        <p class="mb-1 text-white">Apple</p>
                                        <h5 class="card-title text-white">iPhone 17 Pro <span class="badge bg-light text-primary">NIEUW</span></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-white">Uitgerust met de grensverleggende A19 Pro-chip, een volledig vernieuwd titanium design en geavanceerde Apple Intelligence-functies.</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" class="btn btn-light btn-sm fw-semibold">Shop nu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item h-100 overflow-hidden border-5 rounded-5 border border-primary-subtle">
                        <!-- Card 2: Samsung Galaxy S26 -->
                        <div class="card bg-primary border-0 h-100">
                            <div class="row g-0 h-100">
                                <div class="col-5 bg-white">
                                    <!-- Referencing your provided file name here -->
                                    <img src="img/phones/s26.svg" class="img-fluid w-100 h-100" style="object-fit:contain;" alt="Samsung Galaxy S26">
                                </div>
                                <div class="col-7 d-flex flex-column justify-content-center">
                                    <div class="card-header">
                                        <p class="mb-1 text-white">Samsung</p>
                                        <h5 class="card-title text-white">Galaxy S26 <span class="badge bg-light text-primary">Populair</span></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-white">Ervaar ongekende prestaties met de allernieuwste processor en een revolutionair camerasysteem boordevol AI-functies.</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" class="btn btn-light btn-sm fw-semibold">Shop nu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item h-100 overflow-hidden border-5 rounded-5 border border-primary-subtle">
                        <!-- Card 3: Google Pixel 10 -->
                        <div class="card bg-primary border-0 h-100">
                            <div class="row g-0 h-100">
                                <div class="col-5 bg-white">
                                    <img src="img/phones/pixel 10.webp" class="img-fluid w-100 h-100" style="object-fit:contain;" alt="Google Pixel 10">
                                </div>
                                <div class="col-7 d-flex flex-column justify-content-center">
                                    <div class="card-header">
                                        <p class="mb-1 text-white">Google</p>
                                        <h5 class="card-title text-white">Pixel 10 <span class="badge bg-light text-primary">25% Korting</span></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-white">De puurste Android-ervaring met de slimste assistent en ongeëvenaarde nachtfotografie van studiokwaliteit.</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" class="btn btn-light btn-sm fw-semibold">Shop nu</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="carousel-item h-100 overflow-hidden border-5 rounded-5 border border-primary-subtle">
                        <!-- Card 4: OnePlus 15 -->
                        <div class="card bg-primary border-0 h-100">
                            <div class="row g-0 h-100">
                                <div class="col-5 bg-white">
                                    <img src="img/phones/oneplus 15.avif" class="img-fluid w-100 h-100" style="object-fit:contain;" alt="OnePlus 14">
                                </div>
                                <div class="col-7 d-flex flex-column justify-content-center">
                                    <div class="card-header">
                                        <p class="mb-1 text-white">OnePlus</p>
                                        <h5 class="card-title text-white">OnePlus 15 <span class="badge bg-light text-primary">15% KORTING</span></h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text text-white">Verleg je grenzen met supersnel 150W laden en een vloeiend 120Hz display voor de ultieme gaming-ervaring.</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" class="btn btn-light btn-sm fw-semibold">Shop nu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-indicators position-relative mt-2">
                    <button type="button" data-bs-target="#featured-phones" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#featured-phones" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#featured-phones" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#featured-phones" data-bs-slide-to="3"></button>
                </div>

                <button class="carousel-dark carousel-control-prev" type="button" data-bs-target="#featured-phones" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-dark carousel-control-next" type="button" data-bs-target="#featured-phones" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>


        <!-- CATEGORIE-BUTTONS BAR -->
        <h2 class="text-primary pt-5">Ga direct naar</h2>
        <div class="p-3">
            <div class="container d-flex justify-content-center gap-3 flex-wrap">
                <button class="btn btn-light btn-lg px-5 py-3 d-flex align-items-center gap-3 fs-5">
                    <i class="bi bi-phone"></i>
                    Telefoons
                </button>
                <button class="btn btn-light btn-lg px-5 py-3 d-flex align-items-center gap-3 fs-5">
                    <i class="bi bi-sim"></i>
                    Sim Only
                </button>
                <button class="btn btn-light btn-lg px-5 py-3 d-flex align-items-center gap-3 fs-5">
                    <i class="bi bi-headset"></i>
                    Klanten service
                </button>
            </div>
        </div>

        <!-- MERKEN -->
        <h2 class="text-primary pt-5">Onze Merken</h2>
        <div class="p-3">
            <div class="container d-flex justify-content-around gap-3 flex-wrap">
                <button class="btn btn-light btn-lg btn-brand px-5 py-3">
                    <i class="bi bi-apple"></i>
                </button>
                <button class="btn btn-light btn-lg btn-brand px-5 py-3">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b4/Samsung_wordmark.svg" alt="" width="64px">
                </button>
                <button class="btn btn-light btn-lg btn-brand px-5 py-3">
                    <i class="bi bi-google"></i>
                </button>
                <button class="btn btn-light btn-lg btn-brand px-5 py-2">
                    <img src="https://miro.medium.com/1*nYbKJr9SdqE9AwmpwXYx5w.png" alt="" width="48px">
                </button>
            </div>
        </div>
    </main>
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