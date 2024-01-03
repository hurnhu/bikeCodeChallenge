<?php
require("Vehicle.php");

class Bike extends Vehicle
{
    function __construct($numWheels, $sound) {
        parent::__construct($numWheels, $sound);
    }
}
?>
