<?php

namespace App\Service;

const INCHES_IN_MILE = 63360;

/**
 * Vehicle class
 * BASE abstract class
 * 
 * this is a abstract class as there is a function that is required.
 * but can not be implemented here (make noise)
 * 
 * all Vehicles will make noise, but might have different logic (see motorcycle)
 */
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

    /**
     * getSeats function
     *
     * @return integer
     */
    public function getSeats(): int
    {
        return $this->seats;
    }

    /**
     * makeNoise function
     * required absctract function to be implemented by the children
     * @return void
     */
    abstract public function makeNoise(): void;

    /**
     * milesToInches function
     *
     * @param [int] $miles
     * @return integer
     */
    public function milesToInches($miles): int
    {
        if (!is_numeric($miles)) {
            throw new \Exception("must provide a number");
        }
        return $miles * INCHES_IN_MILE;
    }

    /**
     * inchesToMiles function
     *
     * @param [int] $inches
     * @return float
     */
    public function inchesToMiles($inches): float
    {
        if (!is_numeric($inches)) {
            throw new \Exception("must provide a number");
        }

        return round($inches / INCHES_IN_MILE, 5);
    }
}
