<?php

namespace App\Exception;

/**
 * Define a custom exception class
 */
class FlatTireException extends \Exception
{
    // Redefine the exception so message isn't optional
    public function __construct($message = "One of your tires is out of air, can not move", $code = 0, \Throwable $previous = null)
    {
        // some code

        // make sure everything is assigned properly
        parent::__construct($message, $code, $previous);
    }

    // custom string representation of object
    public function __toString()
    {
        return __CLASS__ . "{$this->message}\n";
    }
}
