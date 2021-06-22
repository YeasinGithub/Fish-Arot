<?php

namespace App\FishRepository\Due\Repositories\Interfaces;
use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Models\Due;
use Illuminate\Support\Collection;

interface DueInterface extends BaseRepositoryInterface
{
    public function listDues(string $order = 'id', $except = []) : Collection;

    public function createDue(array $params) : Due;

    public function updateDue(array $params) : Due;

    public function findDueById(int $id) : Due;

    public function deleteDue() : bool;

    public function rootDues(string $string);

}
?>