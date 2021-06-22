<?php

namespace App\FishRepository\Dadon\Repositories\Interfaces;
use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Models\Dadon;
use Illuminate\Support\Collection;

interface DadonInterface extends BaseRepositoryInterface
{
    public function listDadons(string $order = 'id', $except = []) : Collection;

    public function createDadon(array $params) : Dadon;

    public function updateDadon(array $params) : Dadon;

    public function findDadonById(int $id) : Dadon;

    public function deleteDadon() : bool;

    public function rootDadons(string $string);

}
?>