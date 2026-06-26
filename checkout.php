<?php
session_start();
require_once 'models/phone.class.php';
require_once 'classes/controller.class.php';
require_once 'models/phonePlans.class.php';


// Fetch the list of phones to match against the session cart
$controller = new Controller();
$phones = $controller->createPhonesFromJson('data/phones.json');
$plans = $controller->createPhonePlansFromJson('data/phone_plans.json');

// 1. Initialize to null so the variable always exists
$orderedPhone = null;

// 2. Safely check for orders
if (!empty($_SESSION['orders'])) {
    $activeOrder = reset($_SESSION['orders']);
    
    // Safely retrieve the ID regardless of whether it's a phone or something else
    // We use the ?? null fallback to ensure we don't get an 'Undefined array key' error
    $phoneId = $activeOrder['phone_id'] ?? null;
    
    // Only attempt lookup if $phoneId is not null
    if ($phoneId !== null && isset($phones[$phoneId])) {
        $orderedPhone = $phones[$phoneId];
    }
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bezorging - TellYourPhone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">
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

<main class="container mt-5" style="max-width: 1000px;">
    <?php if (empty($_SESSION['orders'])): ?>
        <div class="text-center py-5 card border-0 shadow-sm rounded-4 bg-white">
            <i class="bi bi-cart-x text-muted display-1 mb-3"></i>
            <h3 class="fw-bold text-dark">Je winkelwagen is leeg</h3>
            <p class="text-muted">Voeg eerst een apparaat of plan toe.</p>
            <div class="mt-3">
                <a href="index.php" class="btn btn-primary px-4 fw-semibold">Bekijk aanbod</a>
            </div>
        </div>
    <?php else: ?>
        <div class="row g-4">
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
                    <h5 class="fw-bold text-dark mb-4">Jouw bestelling</h5>

                    <div class="d-flex flex-column gap-3 border-bottom pb-3">
                        <?php
                        $totalCartPrice = 0;
                        // Assuming you have loaded $plans from your controller:
                        // $plans = $controller->createPhonePlansFromJson('data/phone_plans.json');
                        
                        foreach ($_SESSION['orders'] as $item):
                            $product = null;
                            $name = 'Product';
                            $img = '';
                            $price = 0;

                            if ($item['type'] === 'phone') {
                                $product = $phones[$item['phone_id']] ?? null;
                                if ($product) {
                                    $name = $product->getBrand() . ' ' . $product->getModel();
                                    $img = $product->getImagePath();
                                    $price = $product->getPrice();
                                }
                            } elseif ($item['type'] === 'plan') {
                                $product = $plans[$item['plan_id']] ?? null;
                                if ($product) {
                                    $name = $product->getBrand() . ' Plan';
                                    $img = 'img/plan-placeholder.png'; // Update to your path
                                    $price = $product->getPrice();
                                }
                            }

                            if (!$product) continue;

                            $quantity = $item['quantity'] ?? 1;
                            $itemTotalPrice = $price * $quantity;
                            $totalCartPrice += $itemTotalPrice;
                        ?>
                            <div class="d-flex align-items-center gap-3 py-1">
                                <div class="bg-white rounded-3 border p-1 d-flex align-items-center justify-content-center" style="width: 70px; height: 70px;">
                                    <img src="<?= htmlspecialchars($img) ?>" class="img-fluid object-fit-contain" style="max-height: 100%;">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold text-dark mb-0"><?= htmlspecialchars($name) ?></h6>
                                    <small class="text-muted">Aantal: <?= $quantity ?></small>
                                </div>
                                <div class="text-end">
                                    <span class="fw-bold text-dark">€ <?= number_format($itemTotalPrice, 2, ',', '.') ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    </div>
            </div>
        </div>
    <?php endif; ?>

    <button class="btn btn-btn-outline-light btn-light text-dark border border-secondary-subtle rounded-3 p-3 mx-auto">Bestellen</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>