<?php

namespace App\FishRepository\Due\Exceptions;

class DueUpdateErrorException extends \Exception
{
	public function render($request)
    {
        return "Due Not Updated";
    }

}
