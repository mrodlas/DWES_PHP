<?php

declare(strict_types=1);

class Vehicle
{
    public string $make;
    public string $model;
    public string $licensePlate;
    public bool $available;

    public function __construct(string $make, string $model, string $licensePlate, bool $available = true)
    {
        $this->make = $make;
        $this->model = $model;
        $this->licensePlate = $licensePlate;
        $this->available = $available;
    }

    public function getDetails(): string
    {
        return "Make: {$this->make}, Model: {$this->model}, License Plate: {$this->licensePlate}, Available: " . ($this->available ? 'Yes' : 'No');
    }

    public function isAvailable(): bool
    {
        return $this->available;
    }
}

class Fleet
{
    public string $name;
    private array $vehicles = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addVehicle(Vehicle $vehicle): void
    {
        $this->vehicles[] = $vehicle;
    }

    public function listVehicles(): array
    {
        return $this->vehicles;
    }

    public function listAvailableVehicles(): array
    {
        return array_filter($this->vehicles, fn($vehicle) => $vehicle->isAvailable());
    }
}

// Crear algunos vehículos
$vehicle1 = new Vehicle("Toyota", "Corolla", "ABC123", true);
$vehicle2 = new Vehicle("Honda", "Civic", "XYZ789", false);
$vehicle3 = new Vehicle("Ford", "Focus", "LMN456", true);

// Crear el parque de vehículos
$fleet = new Fleet("City Fleet");

// Agregar vehículos al parque
$fleet->addVehicle($vehicle1);
$fleet->addVehicle($vehicle2);
$fleet->addVehicle($vehicle3);

// Obtener la lista de todos los vehículos
$vehicles = $fleet->listVehicles();

// Obtener la lista de vehículos disponibles
$availableVehicles = $fleet->listAvailableVehicles();
?>

<?php include 'includes/header.php'; ?>
<h2><?= ($fleet->name) ?> - Vehicle Fleet</h2>
<h3>All Vehicles:</h3>
<ul>
    <?php foreach ($vehicles as $vehicle): ?>
        <li><?= ($vehicle->getDetails()) ?></li>
    <?php endforeach; ?>
</ul>

<h3>Available Vehicles:</h3>
<ul>
    <?php foreach ($availableVehicles as $vehicle): ?>
        <li><?= ($vehicle->getDetails()) ?></li>
    <?php endforeach; ?>
</ul>
<?php include 'includes/footer.php'; ?>