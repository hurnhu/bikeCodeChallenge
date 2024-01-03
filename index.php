<?php
require_once("classes/Bike.php");
require_once("classes/Motorcycle.php");
// Coding Challenge:

// Using a PHP framework, create a Bicycle Class and instantiate it. It needs some working parts of a bicycle and should be able to be run.

// We will be looking for the following:

//     Code cleanliness
//     Error handling
//     OOP paradigms
$bike = new Bike(2, "ding");
$bike->makeNoise();
$bike->rideBike(1);

$motorCycle = new Motorcycle(2, "VROOOOOOM");
$motorCycle->start();
$motorCycle->makeNoise();
?>

