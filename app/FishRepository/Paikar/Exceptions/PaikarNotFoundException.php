<?php

namespace App\FishRepository\Paikar\Exceptions;

class PaikarNotFoundException extends \Exception
{

public function render($request)
    {
        return "Paikar Not Found";
    }


}
