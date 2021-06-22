<?php

namespace App\FishRepository\Due\Exceptions;

class DueCreateErrorException extends \Exception
{
	public function render($request)
    {
        return "Due Not Created...!
        		Somethings Error...!";
    }
}
