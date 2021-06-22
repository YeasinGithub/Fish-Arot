<?php

namespace App\FishRepository\Mohajon\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class MohajonInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "Mohajon Invalid Argument";
    }
}
