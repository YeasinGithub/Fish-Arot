<?php

namespace App\FishRepository\Dadon\Exceptions;

class DadonUpdateErrorException extends \Exception
{
	public function render($request)
    {
        return "Dadon Not Updated";
    }

}
