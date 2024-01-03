<?php

namespace App\Service;

use App\Exception\FlatTireException;

class Bike extends Vehicle
{
    private $tires = [];
    private $logger;
    function __construct($logger, $numSeats, $sound, $tireSize = 26, $numWheels = 2)
    {
        parent::__construct($numSeats, $sound);
        $this->logger = $logger;
        for ($i = 0; $i < $numWheels; $i++) {
            $tire = new Tire(12, 30, $tireSize);
            $this->tires[] = $tire;
        }
    }

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
     * @param integer $distanceToRide | distance in miles
     * @return void
     */
    public function rideBike($distanceToRide = 1): void
    {
        $tireSize = $this->tires[0]->getTireSize();
        $rotations = $this->milesToInches($distanceToRide) / $tireSize;
        for ($i = 0; $i < $rotations; $i++) {

            $this->logger->success("Currentt distance from start: " . sprintf("%f", $this->inchesToMiles($i * $tireSize)));
            $this->logger->clear();
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

    private function checkTire(&$tire)
    {
        $this->logger->info("Current PSI " . $tire->getPSI());
        if (!$tire->checkPSI()) {
            $this->logger->info("pumping tire");
            while (!$tire->checkPSI()) {
                $tire->pump();
            }
        }
    }

    /**
     * preformMaintenance function
     *
     * this function will check all parts of the bike and fix them if necessary 
     * 
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
