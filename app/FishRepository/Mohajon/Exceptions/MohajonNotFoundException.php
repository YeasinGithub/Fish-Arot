<?php

namespace App\FishRepository\Mohajon\Exceptions;

class MohajonNotFoundException extends \Exception
{

public function render($request)
    {
        return "Mohajon Not Found";
    }


}
