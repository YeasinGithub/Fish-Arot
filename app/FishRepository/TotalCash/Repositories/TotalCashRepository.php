<?php

namespace App\FishRepository\TotalCash\Repositories;
use Jsdecena\Baserepo\BaseRepository;
use App\Models\TotalCash;
use App\FishRepository\TotalCash\Exceptions\TotalCashInvalidArgumentException;
use App\FishRepository\TotalCash\Exceptions\TotalCashCreateErrorException;
use App\FishRepository\TotalCash\Exceptions\TotalCashNotFoundException;
// use App\Inventory\Categories\Exceptions\CategoryUpdateErrorException;
use App\FishRepository\TotalCash\Repositories\Interfaces\TotalCashInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
/*use App\Models\Paikar;
use App\Models\Mohajon;*/

class TotalCashRepository extends BaseRepository implements TotalCashInterface
{
    /*
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(TotalCash $cash)
    {
        parent::__construct($cash);
        $this->model = $cash;
    }
    /**
     * List all the categories
     * @param string $sort
     * @return \Illuminate\Support\Collection
     */
    public function listTotalCashs(string $order = 'id', $except = []) : Collection
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
    public function rootTotalCashs(string $order = 'id', $except = []) : Collection
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
    public function createTotalCash(array $params) : TotalCash
    {
        try {

            $collection = collect($params);
            if (isset($params['address'])) {
                $slug =($params['address']);
            }
            $merge = $collection->merge(compact('slug'));
            
            $customer = new TotalCash($merge->all());

            if (isset($params['parent'])) {
                $parent = $this->findTotalCashById($params['parent']);
                $category->parent()->associate($parent);
            }

            $customer->save();
            return $customer;
        } catch (QueryException $e) {
            throw new TotalCashInvalidArgumentException($e->getMessage());
        }
    }
    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findTotalCashById(int $id) : TotalCash
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new TotalCashNotFoundException($e->getMessage());
        }
    }
     /**
     * Update the category
     * @param array $params
     *
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function updateTotalCash(array $params) : TotalCash
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
            $parent = $this->findTotalCashById($params['id']);
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
    public function deleteTotalCash() : bool
    {

    }



}
