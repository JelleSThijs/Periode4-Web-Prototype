<!DOCTYPE html>
<html lang="en">

<head>
    <title>TellYourPhone</title>
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
                <a class="navbar-brand" href="index.php">
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
                                <li><a class="dropdown-item" href="phonePlans.php?b=KPN">KPN</a></li>
                                <li><a class="dropdown-item" href="phonePlans.php?b=Odido">Odido</a></li>
                                <li><a class="dropdown-item" href="phonePlans.php?b=Vodafone">Vodafone</a></li>
                                <li><a class="dropdown-item" href="phonePlans.php?b=Simyo">Simyo</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Klantenservice</a></li>
                    </ul>
                </div>

                <ul class="navbar-nav ms-auto flex-row gap-1">
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

                    <li class="nav-item">
                        <button class="btn nav-link px-2" id="searchToggle" data-bs-toggle="collapse" data-bs-target="#searchCollapse" aria-label="Search">
                            <i class="bi bi-search fs-5"></i>
                        </button>
                    </li>

                    <li class="nav-item">
                        <a href="checkout.php" class="btn nav-link px-2" aria-label="Winkelwagen">
                            <i class="bi bi-cart fs-5"></i>
                        </a>
                    </li>

                </ul>
            </div>
        </nav>

        <div class="container-fluid collapse bg-white border-bottom align-content-center" id="searchCollapse">
            <form action="phones.php" method="GET" class="input-group px-2 py-2">
                <?php if (!empty($brand)): ?>
                    <input type="hidden" name="b" value="<?= htmlspecialchars($brand) ?>">
                <?php endif; ?>
                <input type="text" name="q" class="form-control" placeholder="Zoeken naar telefoons..." value="<?= htmlspecialchars($searchQuery) ?>" required>
                <button class="btn btn-outline-primary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
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
                                        <p class="card-text text-white">Uitgerust met de grensverleggende A19 Pro-chip, een volledig vernieuwd titanium design hives en geavanceerde Apple Intelligence-functies.</p>
                                    </div>
                                    <div class="card-footer">
                                        <!-- LINK FIXED: Map to the detail page (Assuming index 0 matches JSON metadata) -->
                                        <a href="phone.php?id=0" class="btn btn-light btn-sm fw-semibold">Shop nu</a>
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
                                        <!-- LINK FIXED -->
                                        <a href="phone.php?id=1" class="btn btn-light btn-sm fw-semibold">Shop nu</a>
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
                                        <!-- LINK FIXED -->
                                        <a href="phone.php?id=2" class="btn btn-light btn-sm fw-semibold">Shop nu</a>
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
                                        <!-- LINK FIXED -->
                                        <a href="phone.php?id=3" class="btn btn-light btn-sm fw-semibold">Shop nu</a>
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
                <!-- CONVERTED TO LINKS TO MATCH INTENDED ACTIONS -->
                <a href="phones.php" class="btn btn-light btn-lg px-5 py-3 d-flex align-items-center gap-3 fs-5 text-decoration-none text-dark">
                    <i class="bi bi-phone"></i>
                    Telefoons
                </a>
                <a href="phonePlans.php" class="btn btn-light btn-lg px-5 py-3 d-flex align-items-center gap-3 fs-5 text-decoration-none text-dark">
                    <i class="bi bi-sim"></i>
                    Sim Only
                </a>
                <a href="customerService.php" class="btn btn-light btn-lg px-5 py-3 d-flex align-items-center gap-3 fs-5 text-decoration-none text-dark">
                    <i class="bi bi-headset"></i>
                    Klanten service
                </a>
            </div>
        </div>

        <!-- MERKEN -->
        <h2 class="text-primary pt-5">Onze Merken</h2>
        <div class="p-3">
            <div class="container d-flex justify-content-around gap-3 flex-wrap">
                <!-- CONVERTED TO LINKS TO EXECUTE SPECIFIC BRAND FILTER ROUTING -->
                <a href="phones.php?b=apple" class="btn btn-light btn-lg btn-brand px-5 py-3 text-dark">
                    <i class="bi bi-apple"></i>
                </a>
                <a href="phones.php?b=samsung" class="btn btn-light btn-lg btn-brand px-5 py-3 text-dark">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/b/b4/Samsung_wordmark.svg" alt="" width="64px">
                </a>
                <a href="phones.php?b=google" class="btn btn-light btn-lg btn-brand px-5 py-3 text-dark">
                    <i class="bi bi-google"></i>
                </a>
                <a href="phones.php?b=onePlus" class="btn btn-light btn-lg btn-brand px-5 py-2 text-dark">
                    <img src="https://miro.medium.com/1*nYbKJr9SdqE9AwmpwXYx5w.png" alt="" width="48px">
                </a>
            </div>
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-top mt-5 pt-5 pb-4">
        <div class="container">
            <div class="row g-4">
                <!-- Column 1: Brand Info -->
                <div class="col-md-3">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img src="img/logo.png" alt="TellYourPhone Logo" style="width:30px;" class="rounded-pill">
                        <span class="fw-bold text-primary">TellYourPhone</span>
                    </div>
                    <p class="text-muted small">Jouw expert in smartphones en abonnementen. Altijd de beste deals overzichtelijk op één plek.</p>
                </div>

                <!-- Column 2: Popular Phones (from index.php) -->
                <div class="col-6 col-md-3">
                    <h6 class="fw-bold text-dark mb-3">Populaire Telefoons</h6>
                    <ul class="list-unstyled small d-grid gap-2">
                        <li><a href="phone.php?id=0" class="text-muted text-decoration-none-hover">Apple iPhone 17 Pro</a></li>
                        <li><a href="phone.php?id=1" class="text-muted text-decoration-none-hover">Samsung Galaxy S26</a></li>
                        <li><a href="phone.php?id=2" class="text-muted text-decoration-none-hover">Google Pixel 10</a></li>
                        <li><a href="phone.php?id=3" class="text-muted text-decoration-none-hover">OnePlus 15</a></li>
                    </ul>
                </div>

                <!-- Column 3: Phone Plans -->
                <div class="col-6 col-md-3">
                    <h6 class="fw-bold text-dark mb-3">Abonnementen</h6>
                    <ul class="list-unstyled small d-grid gap-2">
                        <li><a href="phonePlans.php?b=KPN" class="text-muted text-decoration-none-hover">KPN abonnementen</a></li>
                        <li><a href="phonePlans.php?b=Odido" class="text-muted text-decoration-none-hover">Odido abonnementen</a></li>
                        <li><a href="phonePlans.php?b=Vodafone" class="text-muted text-decoration-none-hover">Vodafone abonnementen</a></li>
                        <li><a href="phonePlans.php?b=Simyo" class="text-muted text-decoration-none-hover">Simyo sim only</a></li>
                    </ul>
                </div>

                <!-- Column 4: Customer Service & Legal -->
                <div class="col-md-3">
                    <h6 class="fw-bold text-dark mb-3">Klantenservice & Info</h6>
                    <ul class="list-unstyled small d-grid gap-2">
                        <li><a href="customerService.php" class="text-muted text-decoration-none-hover">Veelgestelde vragen</a></li>
                        <li><a href="privacy.php" class="text-muted text-decoration-none-hover">Privacybeleid</a></li>
                        <li><a href="voorwaarden.php" class="text-muted text-decoration-none-hover">Algemene Voorwaarden</a></li>
                        <li><a href="cookies.php" class="text-muted text-decoration-none-hover">Cookie-instellingen</a></li>
                    </ul>
                </div>
            </div>

            <hr class="my-4 text-muted opacity-25">

            <!-- Bottom bar -->
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2 small text-muted">
                <span>&copy; 2026 TellYourPhone. Alle rechten voorbehouden.</span>
                <div class="d-flex gap-3 fs-5">
                    <a href="#" class="text-muted"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-muted"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-muted"><i class="bi bi-twitter-x"></i></a>
                </div>
            </div>
        </div>
    </footer>
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