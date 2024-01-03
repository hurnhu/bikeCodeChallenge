<?php

namespace App\Service;

const INCHES_IN_MILE = 63360;
abstract class Vehicle
{
    // property declaration
    private $seats = 0;
    public $sound = "";

    function __construct($numSeats, $sound)
    {
        $this->seats = $numSeats;
        $this->sound = $sound;
    }

    public function getSeats(): int
    {
        return $this->seats;
    }

    abstract public function makeNoise(): void;

    public function milesToInches($miles): int
    {
        if (!is_numeric($miles)) {
            throw new \Exception("must provide a number");
        }
        return $miles * INCHES_IN_MILE;
    }

    public function inchesToMiles($inches): float
    {
        if (!is_numeric($inches)) {
            throw new \Exception("must provide a number");
        }

        return round($inches / INCHES_IN_MILE, 5);
    }
}
