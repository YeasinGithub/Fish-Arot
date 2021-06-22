<?php

namespace App\Providers;

use App\FishRepository\Mohajon\Repositories\MohajonRepository;
use App\FishRepository\Mohajon\Repositories\Interfaces\MohajonInterface;

use App\FishRepository\Sell\Repositories\SellsRepository;
use App\FishRepository\Sell\Repositories\Interfaces\SellsInterface;

use App\FishRepository\Paikar\Repositories\PaikarRepository;
use App\FishRepository\Paikar\Repositories\Interfaces\PaikarInterface;

use App\FishRepository\Due\Repositories\DueRepository;
use App\FishRepository\Due\Repositories\Interfaces\DueInterface;

use App\FishRepository\Dadon\Repositories\DadonRepository;
use App\FishRepository\Dadon\Repositories\Interfaces\DadonInterface;

use App\FishRepository\CreditDebit\Repositories\CreditDebitRepository;
use App\FishRepository\CreditDebit\Repositories\Interfaces\CreditDebitInterface;

use App\FishRepository\TotalCash\Repositories\TotalCashRepository;
use App\FishRepository\TotalCash\Repositories\Interfaces\TotalCashInterface;



use Illuminate\Support\ServiceProvider;
class RepositoryServiceProvider extends ServiceProvider
{
 
  public function register(){

        $this->app->bind(
            MohajonInterface::class,
            MohajonRepository::class
        );
        $this->app->bind(
            SellsInterface::class,
            SellsRepository::class
        );
        $this->app->bind(
            PaikarInterface::class,
            PaikarRepository::class
        );
        $this->app->bind(
            DueInterface::class,
            DueRepository::class
        );
        $this->app->bind(
            DadonInterface::class,
            DadonRepository::class
        );
        $this->app->bind(
            CreditDebitInterface::class,
            CreditDebitRepository::class
        );
        $this->app->bind(
            TotalCashInterface::class,
            TotalCashRepository::class
        );
        

        
  }
}    

?>