<?php
require_once 'models/phone.class.php';
require_once 'classes/controller.class.php';

$controller = new Controller();
$phones = $controller->createPhonesFromJson('phones.json');

$sort  = $_GET['sort']  ?? 'popular';
$brand = $_GET['b'] ?? '';

match ($sort) {
    'price_asc'  => usort($phones, fn($a, $b) => $a->getPrice() <=> $b->getPrice()),
    'price_desc' => usort($phones, fn($a, $b) => $b->getPrice() <=> $a->getPrice()),
    'newest'     => usort($phones, fn($a, $b) => $b->getReleaseDate() <=> $a->getReleaseDate()),
    default      => null
};
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <title>Alle Smartphones - TellYourPhone</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
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

    <main class="my-5">
        <div class="row g-4">
            <!-- Filter Sidebar -->
            <div class="col-lg-3">
                <div class="card border-0 shadow-sm p-4 sticky-top" style="top: 30px;">
                    <h5 class="text-primary mb-4 fw-bold"><i class="bi bi-funnel-fill me-2"></i>Filters</h5>

                    <!-- Merk Filter -->
                    <div class="mb-4">
                        <h6 class="fw-bold mb-2">Merk</h6>
                        <div class="form-check mb-1">
                            <input class="form-check-input brand-filter" type="checkbox" id="brandApple" value="Apple" <?= $brand === 'apple' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="brandApple">Apple</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input brand-filter" type="checkbox" id="brandSamsung" value="Samsung" <?= $brand === 'samsung' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="brandSamsung">Samsung</label>
                        </div>
                        <div class="form-check mb-1">
                            <input class="form-check-input brand-filter" type="checkbox" id="brandGoogle" value="Google" <?= $brand === 'google' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="brandGoogle">Google</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input brand-filter" type="checkbox" id="brandOnePlus" value="OnePlus" <?= $brand === 'onePlus' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="brandOnePlus">OnePlus</label>
                        </div>
                    </div>

                    <!-- Prijs Filter -->
                    <div class="mb-4">
                        <h6 class="fw-bold mb-2">Maandbedrag</h6>
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text">€</span>
                                    <input type="number" class="form-control" id="priceMin" min="0" max="100" step="5" placeholder="Min" value="0">
                                </div>
                                <small class="text-muted">Minimum</small>
                            </div>
                            <div class="col-6">
                                <div class="input-group input-group-sm">
                                    <span class="input-group-text">€</span>
                                    <input type="number" class="form-control" id="priceMax" min="0" max="100" step="5" placeholder="Max" value="100">
                                </div>
                                <small class="text-muted">Maximum</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="text-primary m-0">Alle Smartphones</h2>
                    <select class="form-select w-auto border-0 shadow-sm" onchange="location = '?sort=' + this.value">
                        <option value="popular" <?= $sort === 'popular'    ? 'selected' : '' ?>>Populair</option>
                        <option value="price_asc" <?= $sort === 'price_asc'  ? 'selected' : '' ?>>Prijs laag - hoog</option>
                        <option value="price_desc" <?= $sort === 'price_desc' ? 'selected' : '' ?>>Prijs hoog - laag</option>
                        <option value="newest" <?= $sort === 'newest'     ? 'selected' : '' ?>>Nieuwste</option>
                    </select>
                </div>

                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                    <?php foreach ($phones as $phone): ?>
                        <?= $phone->renderSmall() ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Run on load so pre-checked boxes from URL take effect
        applyFilters();

        // Close search bar on outside click
        document.addEventListener('click', function(e) {
            const searchCollapse = document.getElementById('searchCollapse');
            const searchToggle = document.getElementById('searchToggle');
            if (searchCollapse.classList.contains('show') &&
                !searchCollapse.contains(e.target) &&
                !searchToggle.contains(e.target)) {
                bootstrap.Collapse.getInstance(searchCollapse).hide();
            }
        });

        document.documentElement.style.setProperty('--navbar-height', document.querySelector('.navbar').offsetHeight + 'px');

        // --- Filtering ---
        function applyFilters() {
            const checkedBrands = [...document.querySelectorAll('.brand-filter:checked')].map(cb => cb.value);
            const priceMin = parseFloat(document.getElementById('priceMin').value) || 0;
            const priceMax = parseFloat(document.getElementById('priceMax').value) || Infinity;

            document.querySelectorAll('.row.row-cols-1 .col[data-brand]').forEach(card => {
                const brand = card.dataset.brand;
                const price = parseFloat(card.dataset.price);

                const brandMatch = checkedBrands.length === 0 || checkedBrands.includes(brand);
                const priceMatch = price >= priceMin && price <= priceMax;

                card.style.display = brandMatch && priceMatch ? '' : 'none';
            });
        }

        document.querySelectorAll('.brand-filter').forEach(cb => cb.addEventListener('change', applyFilters));
        document.getElementById('priceMin').addEventListener('input', applyFilters);
        document.getElementById('priceMax').addEventListener('input', applyFilters);
    </script>
</body>

</html>