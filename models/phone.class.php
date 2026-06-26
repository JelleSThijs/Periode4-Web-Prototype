<?php
class Phone
{
    private int $id;
    private string $brand;
    private string $model;
    private string $description;
    private float $price;
    private DateTimeImmutable $releaseDate;
    private string $imagePath;
    private array $colors;

    public function __construct(
        int $id,
        string $brand,
        string $model,
        string $description,
        float $price,
        DateTimeImmutable $releaseDate,
        string $imagePath,
        array $colors = []
    ) {
        $this->id          = $id;
        $this->brand       = $brand;
        $this->model       = $model;
        $this->description = $description;
        $this->price       = $price;
        $this->releaseDate = $releaseDate;
        $this->imagePath   = $imagePath;
        $this->colors      = $colors;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getBrand(): string
    {
        return $this->brand;
    }
    public function getModel(): string
    {
        return $this->model;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function getReleaseDate(): DateTimeImmutable
    {
        return $this->releaseDate;
    }
    public function getImagePath(): string
    {
        return $this->imagePath;
    }
    public function getColors(): array
    {
        return $this->colors;
    }

    // Setters
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }
    public function setModel(string $model): void
    {
        $this->model = $model;
    }
    public function setDescription(string $d): void
    {
        $this->description = $d;
    }
    public function setPrice(float $price): void
    {
        if ($price < 0) throw new InvalidArgumentException('Price cannot be negative.');
        $this->price = $price;
    }
    public function setReleaseDate(DateTimeImmutable $d): void
    {
        $this->releaseDate = $d;
    }
    public function setImagePath(string $path): void
    {
        $this->imagePath = $path;
    }
    public function setColors(array $colors): void
    {
        $this->colors = $colors;
    }

    // Helpers
    public function getFullName(): string
    {
        return $this->brand . ' ' . $this->model;
    }

    public function isNew(): bool
    {
        return $this->releaseDate >= new DateTimeImmutable('-3 months');
    }

    public function renderSmall(): string
    {
        $id   = $this->id;
        $imagePath   = $this->imagePath;
        $brand       = $this->brand;
        $model       = $this->model;
        $description = $this->description;
        $price       = $this->price;

        return '
        <div class="col" data-brand="' . $brand . '" data-price="' . $price . '">
            <div class="card h-100 border-0 shadow-sm overflow-hidden text-center p-3">
                <div class="bg-white p-4" style="height: 200px;">
                    <img src="' . $imagePath . '" class="w-100 h-100" style="object-fit: contain;" alt="' . $brand . ' ' . $model . '">
                </div>
                <div class="card-body d-flex flex-column justify-content-between mt-3 p-0">
                    <div>
                        <p class="text-muted small mb-1">' . $brand . '</p>
                        <h5 class="card-title fw-bold mb-2">' . $model . '</h5>
                        <p class="card-text text-muted small px-2">' . $description . '</p>
                    </div>
                    <div class="mt-3">
                        <div class="text-primary fw-bold fs-4 mb-2">v.a. €' . $price . ',- <span class="fs-6 fw-normal text-muted">/md</span></div>
                        <a href="phone.php?id=' . $id . '" class="btn btn-primary btn-sm w-100 fw-semibold py-2">Bekijk aanbod</a>
                    </div>
                </div>
            </div>
        </div>
    ';
    }

    public function renderDetail(): string
    {
        $id          = $this->id;
        $imagePath   = $this->imagePath;
        $brand       = $this->brand;
        $model       = $this->model;
        $description = $this->description;
        $price       = $this->price;

        // Custom style variable definition for light-gray styling upon selection
        $lightActiveStyles = 'style="--bs-btn-active-bg: #f8f9fa; --bs-btn-active-border-color: #adb5bd; --bs-btn-active-color: #000000;"';

        // 1. Dynamic colors loop with explicit value attributes
        $colorOptionsHtml = '';
        foreach ($this->colors as $index => $colorName) {
            $isChecked = ($index === 0) ? 'checked' : '';
            $colorId = 'color_' . $index;

            $colorOptionsHtml .= '
            <div class="col-6">
                <input type="radio" class="btn-check" name="color" id="' . $colorId . '" value="' . htmlspecialchars($colorName) . '" autocomplete="off" ' . $isChecked . '>
                <label class="btn btn-outline-light border border-secondary-subtle rounded-3 p-3 w-100 text-center fw-medium text-dark" for="' . $colorId . '" ' . $lightActiveStyles . '>
                    <span>' . htmlspecialchars($colorName) . '</span>
                </label>
            </div>';
        }

        return '
        <div class="container py-5" style="max-width: 1100px;">
            <h2 class="text-center fw-bold mb-5">Kies jouw apparaat</h2>

            <form id="phoneSelectorForm" method="POST" action="classes/cart-add-phone.php">
                <input type="hidden" name="phone_id" value="' . $id . '">
                <div class="row g-5 align-items-center">

                    <div class="col-md-6 text-center bg-white rounded-5">
                        <img src="' . $imagePath . '" alt="' . $brand . ' ' . $model . '" class="img-fluid rounded-4" style="max-height: 450px;">
                    </div>

                    <div class="col-md-6">
                        <div class="d-flex flex-column gap-4">
                            
                            <div>
                                <p class="text-muted small mb-1 text-uppercase">' . $brand . '</p>
                                <h3 class="fw-bold text-dark mb-2">' . $model . '</h3>
                                <p class="text-muted small">' . $description . '</p>
                            </div>

                            <div>
                                <h4 class="mb-3 fs-5 fw-semibold text-dark">Selecteer Kleur</h4>
                                <div class="row g-2">
                                    ' . $colorOptionsHtml . '
                                </div>
                            </div>

                            <div>
                                <h4 class="mb-3 fs-5 fw-semibold text-dark">Selecteer abonnement</h4>
                                <div class="d-flex flex-column gap-2">
                                    <div>
                                        <input type="radio" class="btn-check" name="plan" id="planLos" value="los_toestel" autocomplete="off" checked>
                                        <label class="btn btn-outline-light border border-secondary-subtle rounded-3 p-3 w-100 text-start d-flex justify-content-between align-items-center text-dark" for="planLos" ' . $lightActiveStyles . '>
                                            <span class="fw-bold text-dark">Los toestel</span>
                                            <span class="badge bg-secondary">Standaard (€' . $price . ',-)</span>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="radio" class="btn-check" name="plan" id="planKpn" value="kpn_abonnement" autocomplete="off">
                                        <label class="btn btn-outline-light border border-secondary-subtle rounded-3 p-3 w-100 text-start d-flex justify-content-between align-items-center text-dark" for="planKpn" ' . $lightActiveStyles . '>
                                            <span class="fw-bold text-dark">KPN + 20</span>
                                            <span class="text-success small fw-medium">+€20,- p/m</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h4 class="mb-3 fs-5 fw-semibold text-dark">Bezorgoptie</h4>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <input type="radio" class="btn-check" name="delivery" id="deliveryPostNL" value="postnl" autocomplete="off" checked>
                                        <label class="btn btn-outline-light border border-secondary-subtle rounded-3 p-3 w-100 text-start d-flex justify-content-between align-items-center text-dark" for="deliveryPostNL" ' . $lightActiveStyles . '>
                                            <span class="fw-bold text-dark">PostNL</span>
                                            <span class="text-muted small">Morgen in huis</span>
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <input type="radio" class="btn-check" name="delivery" id="deliveryDHL" value="dhl" autocomplete="off">
                                        <label class="btn btn-outline-light border border-secondary-subtle rounded-3 p-3 w-100 text-start d-flex justify-content-between align-items-center text-dark" for="deliveryDHL" ' . $lightActiveStyles . '>
                                            <span class="fw-bold text-dark">DHL</span>
                                            <span class="text-muted small">Kies bezorgtijd</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary btn-lg w-100 rounded-3 fw-semibold py-3 shadow-sm">
                                    <i class="bi bi-cart-plus me-2"></i>In winkelwagen
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
            </form>
        </div>
        ';
    }
}