<?php

namespace App\FishRepository\Paikar\Repositories;
use Jsdecena\Baserepo\BaseRepository;
use App\Models\Paikar;
use App\FishRepository\Paikar\Exceptions\PaikarInvalidArgumentException;
use App\FishRepository\Paikar\Exceptions\PaikarCreateErrorException;
use App\FishRepository\Paikar\Exceptions\PaikarNotFoundException;
// use App\Inventory\Categories\Exceptions\CategoryUpdateErrorException;
use App\FishRepository\Paikar\Repositories\Interfaces\PaikarInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

class PaikarRepository extends BaseRepository implements PaikarInterface
{
    /*
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Paikar $mohajon)
    {
        parent::__construct($mohajon);
        $this->model = $mohajon;
    }
    /**
     * List all the categories
     * @param string $sort
     * @return \Illuminate\Support\Collection
     */
    public function listPaikars(string $order = 'id', $except = []) : Collection
    {
        return $this->model->where('status', 1)
                        ->orderBy($order)
                        ->get()->except($except);
    }

    /**
     * List all root categories
     * @param  string $order
     * @return \Illuminate\Support\Collection  
     */
    public function rootPaikars(string $order = 'id', $except = []) : Collection
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
    public function createPaikar(array $params) : Paikar
    {
        try {

            $collection = collect($params);
            if (isset($params['paikar_name'])) {
                $slug =($params['paikar_name']);
            }
            $merge = $collection->merge(compact('slug'));
            
            $customer = new Paikar($merge->all());

            if (isset($params['parent'])) {
                $parent = $this->findPaikarById($params['parent']);
                $category->parent()->associate($parent);
            }

            $customer->save();
            return $customer;
        } catch (QueryException $e) {
            throw new PaikarInvalidArgumentException($e->getMessage());
        }
    }
    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findPaikarById(int $id) : Paikar
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new PaikarNotFoundException($e->getMessage());
        }
    }
     /**
     * Update the category
     * @param array $params
     *
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function updatePaikar(array $params) : Paikar
    {  
        $category = $this->findPaikarById($this->model->id);
        $collection = collect($params)->except('_token');
        $slug = ($collection->get('paikar_name'));

        $merge = $collection->merge(compact('slug'));

        // set parent attribute default value if not set
        $params['parent'] = $params['parent'] ?? 0;

        // If parent category is not set on update
        // just make current category as root
        if ( (int)$params['parent'] == 0) {
            $category->save();
        } else {
            $parent = $this->findPaikarById($params['id']);
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
    public function deletePaikar() : bool
    {
        return $this->model->delete();
    }



}
