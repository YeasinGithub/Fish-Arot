<?php

namespace App\FishRepository\Mohajon\Exceptions;

class MohajonCreateErrorException extends \Exception
{
	public function render($request)
    {
        return "Mohajon Not Created...!
        		Somethings Error...!";
    }
}
