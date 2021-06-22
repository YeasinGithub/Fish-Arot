<?php

namespace App\FishRepository\Due\Exceptions;

class DueNotFoundException extends \Exception
{

public function render($request)
    {
        return "Due Not Found";
    }


}
