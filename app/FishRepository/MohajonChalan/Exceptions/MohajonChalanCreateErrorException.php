<?php

namespace App\FishRepository\MohajonChalan\Exceptions;

class MohajonChalanCreateErrorException extends \Exception
{
	public function render($request)
    {
        return "MohajonChalan Not Created...!
        		Somethings Error...!";
    }
}
