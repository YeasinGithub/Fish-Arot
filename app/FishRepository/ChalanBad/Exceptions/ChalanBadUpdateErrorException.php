<?php

namespace App\FishRepository\ChalanBad\Exceptions;

class ChalanBadUpdateErrorException extends \Exception
{
	public function render($request)
    {
        return "ChalanBad Not Updated";
    }

}
