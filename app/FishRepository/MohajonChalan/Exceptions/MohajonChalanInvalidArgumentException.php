<?php

namespace App\FishRepository\MohajonChalan\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class MohajonChalanInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "MohajonChalan Invalid Argument";
    }
}
