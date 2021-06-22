<?php

namespace App\FishRepository\ChalanBad\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class ChalanBadInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "ChalanBad Invalid Argument";
    }
}
