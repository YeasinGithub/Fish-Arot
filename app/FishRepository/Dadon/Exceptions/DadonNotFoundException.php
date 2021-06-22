<?php

namespace App\FishRepository\Dadon\Exceptions;

class DadonNotFoundException extends \Exception
{

public function render($request)
    {
        return "Dadon Not Found";
    }


}
