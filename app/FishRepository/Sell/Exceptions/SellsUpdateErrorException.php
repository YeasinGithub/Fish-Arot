<?php

namespace App\FishRepository\Sell\Exceptions;

class SellsUpdateErrorException extends \Exception
{
	public function render($request)
    {
        return "Sells Not Updated";
    }

}
