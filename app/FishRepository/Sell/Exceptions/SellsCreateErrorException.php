<?php

namespace App\FishRepository\Sell\Exceptions;

class SellsCreateErrorException extends \Exception
{
	public function render($request)
    {
        return "Sells Not Created...!
        		Somethings Error...!";
    }
}
