<?php

namespace App\FishRepository\Mohajon\Repositories;
use Jsdecena\Baserepo\BaseRepository;
use App\Models\Mohajon;
use App\FishRepository\Mohajon\Exceptions\MohajonInvalidArgumentException;
use App\FishRepository\Mohajon\Exceptions\MohajonCreateErrorException;
use App\FishRepository\Mohajon\Exceptions\MohajonNotFoundException;
// use App\Inventory\Categories\Exceptions\CategoryUpdateErrorException;
use App\FishRepository\Mohajon\Repositories\Interfaces\MohajonInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

class MohajonRepository extends BaseRepository implements MohajonInterface
{
    /*
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Mohajon $mohajon)
    {
        parent::__construct($mohajon);
        $this->model = $mohajon;
    }
    /**
     * List all the categories
     * @param string $sort
     * @return \Illuminate\Support\Collection
     */
    public function listMohajons(string $order = 'id', $except = []) : Collection
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
    public function rootMohajons(string $order = 'id', $except = []) : Collection
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
    public function createMohajon(array $params) : Mohajon
    {
        try {

            $collection = collect($params);
            if (isset($params['mohajon_name'])) {
                $slug =($params['mohajon_name']);
            }
            $merge = $collection->merge(compact('slug'));
            
            $customer = new Mohajon($merge->all());

            if (isset($params['parent'])) {
                $parent = $this->findMohajonById($params['parent']);
                $category->parent()->associate($parent);
            }

            $customer->save();
            return $customer;
        } catch (QueryException $e) {
            throw new MohajonInvalidArgumentException($e->getMessage());
        }
    }
    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findMohajonById(int $id) : Mohajon
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new MohajonNotFoundException($e->getMessage());
        }
    }
     /**
     * Update the category
     * @param array $params
     *
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function updateMohajon(array $params) : Mohajon
    {  
        $category = $this->findMohajonById($this->model->id);
        $collection = collect($params)->except('_token');
        $slug = ($collection->get('mohajon_name'));

        $merge = $collection->merge(compact('slug'));

        // set parent attribute default value if not set
        $params['parent'] = $params['parent'] ?? 0;

        // If parent category is not set on update
        // just make current category as root
        if ( (int)$params['parent'] == 0) {
            $category->save();
        } else {
            $parent = $this->findMohajonById($params['id']);
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
    public function deleteMohajon() : bool
    {
        return $this->model->delete();
    }



}
