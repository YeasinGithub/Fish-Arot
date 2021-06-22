<?php

namespace App\FishRepository\Mohajon\Exceptions;

class MohajonUpdateErrorException extends \Exception
{
	public function render($request)
    {
        return "Mohajon Not Updated";
    }

}
