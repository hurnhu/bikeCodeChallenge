<?php

namespace App\Service;

class Motorcycle extends Bike
{
    private $isRunning = false;
    function __construct($logger, $numSeats, $sound, $tireSize = 26, $numWheels = 2)
    {
        parent::__construct($logger, $numSeats, $sound, $tireSize, $numWheels);
    }

    public function makeNoise(): void
    {
        if ($this->isRunning) {
            parent::makeNoise();
        } else {
            throw new \Exception("Need to turn it on before engine will make noise");
        }
    }

    public function start(): void
    {
        $this->isRunning = true;
    }
}
