<?php

namespace App\FishRepository\ChalanBad\Exceptions;

class ChalanBadCreateErrorException extends \Exception
{
	public function render($request)
    {
        return "ChalanBad Not Created...!
        		Somethings Error...!";
    }
}
