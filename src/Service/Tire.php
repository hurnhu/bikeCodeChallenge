<?php

namespace App\Service;

use App\Exception\FlatTireException;

class Tire
{
    // property declaration
    private $numSpokes = 0;
    protected $basePSI = 32;
    private $currentPSI = 32;
    private $tireSize = 26;

    /**
     * constructor function
     *
     * sets up initial state of the tire. 
     * basePSI is our ideal point, if we run out of air we want to refill upto this point
     * 
     * @param [type] $numSpokes
     * @param [type] $psi
     * @param integer $tireSize
     */
    function __construct($numSpokes, $psi, $tireSize = 26)
    {
        $this->numSpokes = $numSpokes;
        $this->basePSI = $psi;
        $this->currentPSI = $psi;
        $this->tireSize = $tireSize;
    }

    /**
     * checkPSI function
     *
     * check to see if we are below are ideal point
     * 
     * @return boolean
     */
    public function checkPSI(): bool
    {
        return $this->basePSI <= $this->currentPSI;
    }

    /**
     * rotateTire function
     *
     * with every tire rotation there is a chance to lose air
     * 
     * when no air is present in the tire we throw an error
     * 
     * @throws FlatTireException
     * @return void
     */
    public function rotateTire(): void
    {
        if ($this->currentPSI <= 0) {
            throw new FlatTireException();
        }
        if (!mt_rand(0, 15)) {
            $this->currentPSI--;
        }
    }

    /**
     * getTireSize function
     *
     * @return integer
     */
    public function getTireSize(): int
    {
        return $this->tireSize;
    }

    /**
     * pump function
     *
     * adds are to this current tire
     * returns if it is full or not
     * 
     * @return boolean
     */
    public function pump(): bool
    {
        $this->currentPSI += mt_rand(1, 4);
        return $this->checkPSI();
    }

    /**
     * getPSI function
     *
     * @return integer
     */
    public function getPSI(): int
    {
        return $this->currentPSI;
    }
}
