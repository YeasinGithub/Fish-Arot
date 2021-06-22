<?php

namespace App\FishRepository\Mohajon\Repositories\Interfaces;
use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Models\Mohajon;
use Illuminate\Support\Collection;

interface MohajonInterface extends BaseRepositoryInterface
{
    public function listMohajons(string $order = 'id', $except = []) : Collection;

    public function createMohajon(array $params) : Mohajon;

    public function updateMohajon(array $params) : Mohajon;

    public function findMohajonById(int $id) : Mohajon;

    public function deleteMohajon() : bool;

    public function rootMohajons(string $string);

}
?>