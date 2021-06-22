<?php

namespace App\FishRepository\Sell\Repositories;
use Jsdecena\Baserepo\BaseRepository;
use App\Models\Sell;
use App\FishRepository\Sell\Exceptions\SellsInvalidArgumentException;
use App\FishRepository\Sell\Exceptions\SellsCreateErrorException;
use App\FishRepository\Sell\Exceptions\SellsNotFoundException;
// use App\Inventory\Categories\Exceptions\CategoryUpdateErrorException;
use App\FishRepository\Sell\Repositories\Interfaces\SellsInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
use App\Models\Paikar;
use App\Models\Mohajon;

class SellsRepository extends BaseRepository implements SellsInterface
{
    /*
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Sell $sell)
    {
        parent::__construct($sell);
        $this->model = $sell;
    }
    /**
     * List all the categories
     * @param string $sort
     * @return \Illuminate\Support\Collection
     */
    public function listSells(string $order = 'id', $except = []) : Collection
    {
        $mohajons=Mohajon::get();
                $paikars=Paikar::get();
        return $this->model->with('mohajon', 'paikar')
                        ->orderBy($order)
                        ->get()->except($except);
    }

    /**
     * List all root categories
     * @param  string $order
     * @return \Illuminate\Support\Collection  
     */
    public function rootSells(string $order = 'id', $except = []) : Collection
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
    public function createSell(array $params) : Sell
    {
        try {

            $collection = collect($params);
            if (isset($params['mohajon_address'])) {
                $slug =($params['mohajon_address']);
            }
            $merge = $collection->merge(compact('slug'));
            
            $customer = new Sell($merge->all());

            if (isset($params['parent'])) {
                $parent = $this->findSellById($params['parent']);
                $category->parent()->associate($parent);
            }

            $customer->save();
            return $customer;
        } catch (QueryException $e) {
            throw new SellsInvalidArgumentException($e->getMessage());
        }
    }
    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findSellById(int $id) : Sell
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new SellsNotFoundException($e->getMessage());
        }
    }
     /**
     * Update the category
     * @param array $params
     *
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function updateSell(array $params) : Sell
    {  
        $category = $this->findSellById($this->model->id);
        $collection = collect($params)->except('_token');
        $slug = ($collection->get('mohajon_address'));

        $merge = $collection->merge(compact('slug'));

        // set parent attribute default value if not set
        $params['parent'] = $params['parent'] ?? 0;

        // If parent category is not set on update
        // just make current category as root
        if ( (int)$params['parent'] == 0) {
            $category->save();
        } else {
            $parent = $this->findSellById($params['id']);
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
    public function deleteSell() : bool
    {

    }



}
