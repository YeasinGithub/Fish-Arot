<?php

namespace App\FishRepository\Paikar\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class PaikarInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "Paikar Invalid Argument";
    }
}
