<?php
require_once(__DIR__ . "/../exceptions/FlatTireException.php");
class Tire
{
    // property declaration
    private $numSpokes = 0;
    protected $basePSI = 32;
    private $currentPSI = 32;
    private $tireSize = 26;

    function __construct($numSpokes, $psi, $tireSize = 26) {
        $this->numSpokes = $numSpokes;
        $this->basePSI = $psi;
        $this->currentPSI = $psi;
        $this->tireSize = $tireSize;
    }

    public function checkPSI() : bool {
        return $this->basePSI <= $this->currentPSI;
    }

    public function rotateTire($revolutions) : void{
        if($this->currentPSI <= 0){
            throw new FlatTireException();
        }
        if(mt_rand(0,1)){
            $this->currentPSI--;
        }
    }

    public function getTireSize() : int {
        return $this->tireSize;
    }

    public function pump() : bool{
        $this->currentPSI += mt_rand(1,4);
        return $this->checkPSI();
    }

    public function getPSI() : int{
        return $this->currentPSI;
    }
}
?>
