<?php

namespace App\Service;

use App\Exception\FlatTireException;

class Bike extends Vehicle
{
    //all tires on the bike
    private $tires = [];
    //console lgger
    private $logger;

    //since this extends uppon a vehicle. need to call the parent constructor.
    function __construct($logger, $numSeats, $sound, $tireSize = 26, $numWheels = 2)
    {
        parent::__construct($numSeats, $sound);
        $this->logger = $logger;
        //attach wheels to this bike
        for ($i = 0; $i < $numWheels; $i++) {
            $tire = new Tire(12, 30, $tireSize);
            $this->tires[] = $tire;
        }
    }

    /**
     * makeNoise function
     * outputs to the console the noise this makes.
     * this is a abstract function on the base class. 
     * reguardless of what type of vehicle you make with this base class
     * they are all going to make some sort of noise
     * but may have different logic 
     * @return void
     */
    public function makeNoise(): void
    {
        $this->logger->info($this->sound);
    }

    /**
     * getNumWheels
     *
     * @return integer
     */
    public function getNumWheels(): int
    {
        return count($this->tires);
    }

    /**
     * rideBike
     *
     * simulates riding the bike with leaky tires. 
     * with every revolution of the tires there is a chance to lose some pressure
     * while riding if you get a flat you will get off and preform maintence (pump both tires)
     * 
     * @param integer $distanceToRide | distance in miles
     * @return void
     */
    public function rideBike($distanceToRide = 1): void
    {
        $tireSize = $this->tires[0]->getTireSize();
        $rotations = $this->milesToInches($distanceToRide) / $tireSize;
        for ($i = 0; $i < $rotations; $i++) {

            $this->logger->success("Currentt distance from start: " . sprintf("%f", $this->inchesToMiles($i * $tireSize)));
            foreach ($this->tires as $key => $tire) {
                try {
                    $tire->rotateTire($rotations);
                } catch (FlatTireException $th) {
                    $this->logger->warning($th->getMessage());
                    $this->preformMaintenance();
                    sleep(2);
                }
            }
        }
    }
    
    /**
     * checkTire function
     * pass a tire by reference.
     * we check to see if it is at or above base psi
     * if it is not we add pressure
     * @param ref $tire
     * @return void
     */
    private function checkTire(&$tire)
    {
        $this->logger->info("Current PSI " . $tire->getPSI());
        if (!$tire->checkPSI()) {
            $this->logger->info("pumping tire");
            while (!$tire->pump()) {
            }
        }
    }

    /**
     * preformMaintenance function
     *
     * the idea here was to build out various other parts of the bike
     * breaks, gears, etc that can degrade over a trip. 
     * this function would check each of the parts of the bike and fix
     * anything that is broken
     * @return void
     */
    private function preformMaintenance()
    {
        foreach ($this->tires as $key => $tire) {
            $this->logger->info("Checking tire #" . $key);
            $this->checkTire($tire);
        }
    }
}
