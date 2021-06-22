<?php

namespace App\FishRepository\Due\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class DueInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "Due Invalid Argument";
    }
}
