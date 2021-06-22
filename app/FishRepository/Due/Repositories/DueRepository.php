<?php

namespace App\FishRepository\Due\Repositories;
use Jsdecena\Baserepo\BaseRepository;
use App\Models\Due;
use App\FishRepository\Due\Exceptions\DueInvalidArgumentException;
use App\FishRepository\Due\Exceptions\DueCreateErrorException;
use App\FishRepository\Due\Exceptions\DueNotFoundException;
// use App\Inventory\Categories\Exceptions\CategoryUpdateErrorException;
use App\FishRepository\Due\Repositories\Interfaces\DueInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
/*use App\Models\Paikar;
use App\Models\Mohajon;*/

class DueRepository extends BaseRepository implements DueInterface
{
    /*
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Due $due)
    {
        parent::__construct($due);
        $this->model = $due;
    }
    /**
     * List all the categories
     * @param string $sort
     * @return \Illuminate\Support\Collection
     */
    public function listDues(string $order = 'id', $except = []) : Collection
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
    public function rootDues(string $order = 'id', $except = []) : Collection
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
    public function createDue(array $params) : Due
    {
        try {

            $collection = collect($params);
            if (isset($params['address'])) {
                $slug =($params['address']);
            }
            $merge = $collection->merge(compact('slug'));
            
            $customer = new Due($merge->all());

            if (isset($params['parent'])) {
                $parent = $this->findDueById($params['parent']);
                $category->parent()->associate($parent);
            }

            $customer->save();
            return $customer;
        } catch (QueryException $e) {
            throw new DueInvalidArgumentException($e->getMessage());
        }
    }
    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findDueById(int $id) : Due
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new DueNotFoundException($e->getMessage());
        }
    }
     /**
     * Update the category
     * @param array $params
     *
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function updateDue(array $params) : Due
    {  
        $category = $this->findDueById($this->model->id);
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
            $parent = $this->findDueById($params['id']);
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
    public function deleteDue() : bool
    {

    }



}
