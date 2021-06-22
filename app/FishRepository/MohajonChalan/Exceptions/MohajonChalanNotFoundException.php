<?php

namespace App\FishRepository\MohajonChalan\Exceptions;

class MohajonChalanNotFoundException extends \Exception
{

public function render($request)
    {
        return "MohajonChalan Not Found";
    }


}
