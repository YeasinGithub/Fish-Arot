<?php

namespace App\FishRepository\Sell\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class SellsInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "Sells Invalid Argument";
    }
}
