<?php

namespace App\FishRepository\Paikar\Repositories\Interfaces;
use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Models\Paikar;
use Illuminate\Support\Collection;

interface PaikarInterface extends BaseRepositoryInterface
{
    public function listPaikars(string $order = 'id', $except = []) : Collection;

    public function createPaikar(array $params) : Paikar;

    public function updatePaikar(array $params) : Paikar;

    public function findPaikarById(int $id) : Paikar;

    public function deletePaikar() : bool;

    public function rootPaikars(string $string);

}
?>