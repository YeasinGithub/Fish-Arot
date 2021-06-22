<?php

namespace App\FishRepository\Sell\Exceptions;

class SellsNotFoundException extends \Exception
{

public function render($request)
    {
        return "Sells Not Found";
    }


}
