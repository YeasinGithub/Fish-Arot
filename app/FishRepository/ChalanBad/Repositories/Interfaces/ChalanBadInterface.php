<?php

namespace App\FishRepository\Sell\Repositories\Interfaces;
use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Models\Sell;
use Illuminate\Support\Collection;

interface SellsInterface extends BaseRepositoryInterface
{
    public function listSells(string $order = 'id', $except = []) : Collection;

    public function createSell(array $params) : Sell;

    public function updateSell(array $params) : Sell;

    public function findSellById(int $id) : Sell;

    public function deleteSell() : bool;

    public function rootSells(string $string);

}
?>