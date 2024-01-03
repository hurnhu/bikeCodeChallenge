
<?php

const INCHES_IN_MILE = 63360;
class Vehicle
{
    // property declaration
    private $seats = 0;
    private $sound = "";

    function __construct($numSeats, $sound) {
        $this->seats = $numSeats;
        $this->sound = $sound;
    }

    public function getSeats() : int{
        return $this->seats;
    }

    public function makeNoise() : void{
        echo $this->sound;
    }

    public function milesToInches($miles) : int{
        if(!is_numeric($miles)){
            throw new Exception("must provide a number");
        }
        return $miles * INCHES_IN_MILE;
    }

    public function inchesToMiles($inches) : float{
        if(!is_numeric($inches)){
            throw new Exception("must provide a number");
        }
        
        return round($inches / INCHES_IN_MILE, 3);
    }
}
?>
