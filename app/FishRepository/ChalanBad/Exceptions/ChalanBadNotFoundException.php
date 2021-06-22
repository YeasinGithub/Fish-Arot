<?php

namespace App\FishRepository\ChalanBad\Exceptions;

class ChalanBadNotFoundException extends \Exception
{

public function render($request)
    {
        return "ChalanBad Not Found";
    }


}
