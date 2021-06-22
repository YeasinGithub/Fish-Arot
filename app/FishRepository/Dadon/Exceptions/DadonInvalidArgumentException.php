<?php

namespace App\FishRepository\Dadon\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class DadonInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "Dadon Invalid Argument";
    }
}
