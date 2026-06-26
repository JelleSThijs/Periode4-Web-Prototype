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
        $this->colors      = $colors; // fixed: was $this->$colors
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
                        <a href="#" class="btn btn-primary btn-sm w-100 fw-semibold py-2">Bekijk aanbod</a>
                    </div>
                </div>
            </div>
        </div>
    ';
    }
}
