<?php

namespace App\FishRepository\Dadon\Exceptions;

class DadonCreateErrorException extends \Exception
{
	public function render($request)
    {
        return "Dadon Not Created...!
        		Somethings Error...!";
    }
}
