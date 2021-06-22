<?php

namespace App\FishRepository\Paikar\Exceptions;

class PaikarUpdateErrorException extends \Exception
{
	public function render($request)
    {
        return "Paikar Not Updated";
    }

}
