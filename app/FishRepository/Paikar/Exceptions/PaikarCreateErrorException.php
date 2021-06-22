<?php

namespace App\FishRepository\Paikar\Exceptions;

class PaikarCreateErrorException extends \Exception
{
	public function render($request)
    {
        return "Paikar Not Created...!
        		Somethings Error...!";
    }
}
