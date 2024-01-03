<?php
require("Vehicle.php");
require("Tire.php");
require_once(__DIR__ . "/../exceptions/FlatTireException.php");

class Bike extends Vehicle
{
    private $tires = [];
    function __construct($numSeats, $sound, $tireSize = 26, $numWheels = 2) {
        parent::__construct($numSeats, $sound);
        for ($i=0; $i < $numWheels; $i++) { 
            $tire = new Tire(12, 30, $tireSize);
            $this->tires[] = $tire;
        }
    }

    /**
     * getNumWheels
     *
     * @return integer
     */
    public function getNumWheels() : int {
        return count($this->tires);
    }

    /**
     * rideBike
     *
     * @param integer $distanceToRide | distance in miles
     * @return void
     */
    public function rideBike($distanceToRide = 1) : void {
        $tireSize = $this->tires[0]->getTireSize();
        $rotations = $this->milesToInches($distanceToRide) / $tireSize;
        for ($i=0; $i < $rotations; $i++) { 
            var_dump("Currentt distance from start: " . sprintf("%f", $this->inchesToMiles($i * $tireSize)));
            foreach ($this->tires as $key => $tire) {
                try {
                    $tire->rotateTire($rotations);
                } catch (\FlatTireException $th) {
                    var_dump($th->getMessage());
                    $this->preformMaintenance();
                }
            }
        }
    }

    private function checkTire(&$tire) {
        var_dump("Current PSI " . $tire->getPSI());
        if(!$tire->checkPSI()){
            var_dump("pumping tire");
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
    private function preformMaintenance(){
        foreach ($this->tires as $key => $tire) {
            var_dump("Checking tire #" . $key);
            $this->checkTire($tire);
        }
    }
}
?>
