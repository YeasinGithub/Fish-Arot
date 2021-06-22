<?php

namespace App\FishRepository\TotalCash\Repositories\Interfaces;
use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Models\TotalCash;
use Illuminate\Support\Collection;

interface TotalCashInterface extends BaseRepositoryInterface
{
    public function listTotalCashs(string $order = 'id', $except = []) : Collection;

    public function createTotalCash(array $params) : TotalCash;

    public function updateTotalCash(array $params) : TotalCash;

    public function findTotalCashById(int $id) : TotalCash;

    public function deleteTotalCash() : bool;

    public function rootTotalCashs(string $string);

}
?>