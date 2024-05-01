<?php

namespace App\DTO;

class TariffDTO {
    public string $name;
    public float $price;
    public int $validityPeriod;
    public string $speed;
    public string $type;

    public function __construct(string $name, float $price, int $validityPeriod, string $speed, string $type) {
        $this->name = $name;
        $this->price = $price;
        $this->validityPeriod = $validityPeriod;
        $this->speed = $speed;
        $this->type = $type;
    }
}
