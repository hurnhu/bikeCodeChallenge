
<?php
class Vehicle
{
    // property declaration
    private $numberOfWheels = 0;
    private $sound = "";

    function __construct($numWheels, $sound) {
        $this->numberOfWheels = $numWheels;
        $this->sound = $sound;
    }

    public function getWheels() : int{
        return $this->numberOfWheels;
    }

    public function makeNoise() : void{
        echo $this->sound;
    }
}
?>
