<?php

namespace App\FishRepository\CreditDebit\Repositories;
use Jsdecena\Baserepo\BaseRepository;
use App\Models\CreditDebit;
use App\FishRepository\CreditDebit\Exceptions\CreditDebitInvalidArgumentException;
use App\FishRepository\CreditDebit\Exceptions\CreditDebitCreateErrorException;
use App\FishRepository\CreditDebit\Exceptions\CreditDebitNotFoundException;
// use App\Inventory\Categories\Exceptions\CategoryUpdateErrorException;
use App\FishRepository\CreditDebit\Repositories\Interfaces\CreditDebitInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
/*use App\Models\Paikar;
use App\Models\Mohajon;*/

class CreditDebitRepository extends BaseRepository implements CreditDebitInterface
{
    /*
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(CreditDebit $deposit)
    {
        parent::__construct($deposit);
        $this->model = $deposit;
    }
    /**
     * List all the categories
     * @param string $sort
     * @return \Illuminate\Support\Collection
     */
    public function listCreditDebits(string $order = 'id', $except = []) : Collection
    {
        /*$mohajons=Mohajon::get();
        $paikars=Paikar::get();*/
            return $this->model/*->with('mohajon', 'paikar')*/
                ->orderBy($order)
                ->get()->except($except);
    }

    /**
     * List all root categories
     * @param  string $order
     * @return \Illuminate\Support\Collection  
     */
    public function rootCreditDebits(string $order = 'id', $except = []) : Collection
    {
        return $this->model->where($order)
                        // ->orderBy($order)
                        ->get()
                        ->except($except);
    }
    /**
     * Create the category
     * @return Category
     * @throws CategoryInvalidArgumentException
     * @throws CategoryNotFoundException
     */
    public function createCreditDebit(array $params) : CreditDebit
    {
        try {

            $collection = collect($params);
            if (isset($params['address'])) {
                $slug =($params['address']);
            }
            $merge = $collection->merge(compact('slug'));
            
            $customer = new CreditDebit($merge->all());

            if (isset($params['parent'])) {
                $parent = $this->findCreditDebitById($params['parent']);
                $category->parent()->associate($parent);
            }

            $customer->save();
            return $customer;
        } catch (QueryException $e) {
            throw new CreditDebitInvalidArgumentException($e->getMessage());
        }
    }
    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findCreditDebitById(int $id) : CreditDebit
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new CreditDebitNotFoundException($e->getMessage());
        }
    }
     /**
     * Update the category
     * @param array $params
     *
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function updateCreditDebit(array $params) : CreditDebit
    {  
        $category = $this->findCreditDebitById($this->model->id);
        $collection = collect($params)->except('_token');
        $slug = ($collection->get('address'));

        $merge = $collection->merge(compact('slug'));

        // set parent attribute default value if not set
        $params['parent'] = $params['parent'] ?? 0;

        // If parent category is not set on update
        // just make current category as root
        if ( (int)$params['parent'] == 0) {
            $category->save();
        } else {
            $parent = $this->findCreditDebitById($params['id']);
            $category->parent()->associate($parent);
        }

        $category->update($merge->all());
        
        return $category;
    }

    /**
     * Delete a category
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteCreditDebit() : bool
    {

    }



}
