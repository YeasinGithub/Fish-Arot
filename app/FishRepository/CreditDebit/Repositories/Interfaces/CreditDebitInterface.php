<?php

namespace App\FishRepository\CreditDebit\Repositories\Interfaces;
use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Models\CreditDebit;
use Illuminate\Support\Collection;

interface CreditDebitInterface extends BaseRepositoryInterface
{
    public function listCreditDebits(string $order = 'id', $except = []) : Collection;

    public function createCreditDebit(array $params) : CreditDebit;

    public function updateCreditDebit(array $params) : CreditDebit;

    public function findCreditDebitById(int $id) : CreditDebit;

    public function deleteCreditDebit() : bool;

    public function rootCreditDebits(string $string);

}
?>