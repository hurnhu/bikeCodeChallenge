<?php

namespace App\Service;

class Motorcycle extends Bike
{
    private $isRunning = false;
    /**
     * constructor function
     *
     * @param [type] $logger
     * @param [type] $numSeats
     * @param [type] $sound
     * @param integer $tireSize
     * @param integer $numWheels
     */
    function __construct($logger, $numSeats, $sound, $tireSize = 26, $numWheels = 2)
    {
        parent::__construct($logger, $numSeats, $sound, $tireSize, $numWheels);
    }

    /**
     * makeNoise function
     *
     * before a motorcycle can make noise it needs to be started.
     * if it is not started we throw a error
     * 
     * @return void
     */
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
