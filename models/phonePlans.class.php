<?php
class PhonePlan
{
    private int $id;
    private string $brand;      // e.g., Vodafone, Odido, KPN
    private int $dataGb;        // Data in GB (0 could represent 'Unlimited')
    private int $sms;           // Number of SMS
    private int $callMinutes;   // Number of calling minutes
    private float $price;

    public function __construct(
        int $id,
        string $brand,
        int $dataGb,
        int $sms,
        int $callMinutes,
        float $price
    ) {
        $this->id          = $id;
        $this->brand       = $brand;
        $this->dataGb      = $dataGb;
        $this->sms         = $sms;
        $this->callMinutes = $callMinutes;
        $this->price       = $price;
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
    public function getDataGb(): int
    {
        return $this->dataGb;
    }
    public function getSms(): int
    {
        return $this->sms;
    }
    public function getCallMinutes(): int
    {
        return $this->callMinutes;
    }
    public function getPrice(): float
    {
        return $this->price;
    }

    // Setters
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }
    public function setDataGb(int $dataGb): void
    {
        if ($dataGb < 0) throw new InvalidArgumentException('Data cannot be negative.');
        $this->dataGb = $dataGb;
    }
    public function setSms(int $sms): void
    {
        if ($sms < 0) throw new InvalidArgumentException('SMS cannot be negative.');
        $this->sms = $sms;
    }
    public function setCallMinutes(int $callMinutes): void
    {
        if ($callMinutes < 0) throw new InvalidArgumentException('Minutes cannot be negative.');
        $this->callMinutes = $callMinutes;
    }
    public function setPrice(float $price): void
    {
        if ($price < 0) throw new InvalidArgumentException('Price cannot be negative.');
        $this->price = $price;
    }

    // Helpers
    public function getDataLabel(): string
    {
        return $this->dataGb === 0 ? 'Onbeperkt' : $this->dataGb . ' GB';
    }

    public function getMinutesSmsLabel(): string
    {
        // Simple logic assuming matching or unlim options
        $minLabel = $this->callMinutes >= 9999 ? 'Onbeperkt' : $this->callMinutes . ' min';
        $smsLabel = $this->sms >= 9999 ? 'onbeperkt' : $this->sms . ' SMS';

        return $minLabel . ' / ' . $smsLabel;
    }

    // Render HTML Card
    public function renderSmall(): string {
        $brand      = $this->brand;
        $dataLabel  = $this->getDataLabel();
        $specsLabel = $this->getMinutesSmsLabel();
        $price      = number_format($this->price, 2, ',', '');

        return '
    <div class="col" data-brand="' . $brand . '" data-price="' . $this->price . '">
        <div class="card h-100 border-0 shadow-sm overflow-hidden text-center p-3">
            <div class="card-body d-flex flex-column justify-content-between p-0 mt-2">
                <div>
                    <p class="text-muted small mb-1 text-uppercase fw-semibold">' . $brand . '</p>
                    <h3 class="card-title fw-bold text-primary mb-2">' . $dataLabel . '</h3>
                    <p class="card-text text-muted small px-2">' . $specsLabel . '</p>
                </div>
                <div class="mt-4">
                    <div class="text-primary fw-bold fs-4 mb-2">€' . $price . ' <span class="fs-6 fw-normal text-muted">/md</span></div>
                    
                    <form action="classes/cart-add-plan.php" method="POST">
                        <input type="hidden" name="plan_id" value="<?= $this->id ?>"> 
                        <button type="submit" class="btn btn-primary btn-sm w-100">
                            Voeg toe aan winkelwagen
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    ';
    }
}
