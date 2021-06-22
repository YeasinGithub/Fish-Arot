<?php

namespace App\FishRepository\MohajonChalan\Exceptions;

class MohajonChalanUpdateErrorException extends \Exception
{
	public function render($request)
    {
        return "MohajonChalan Not Updated";
    }

}
