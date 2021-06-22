<?php

namespace App\FishRepository\Dadon\Repositories;
use Jsdecena\Baserepo\BaseRepository;
use App\Models\Dadon;
use App\FishRepository\Dadon\Exceptions\DadonInvalidArgumentException;
use App\FishRepository\Dadon\Exceptions\DadonCreateErrorException;
use App\FishRepository\Dadon\Exceptions\DadonNotFoundException;
// use App\Inventory\Categories\Exceptions\CategoryUpdateErrorException;
use App\FishRepository\Dadon\Repositories\Interfaces\DadonInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;
/*use App\Models\Paikar;
use App\Models\Mohajon;*/

class DadonRepository extends BaseRepository implements DadonInterface
{
    /*
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Dadon $dadon)
    {
        parent::__construct($dadon);
        $this->model = $dadon;
    }
    /**
     * List all the categories
     * @param string $sort
     * @return \Illuminate\Support\Collection
     */
    public function listDadons(string $order = 'id', $except = []) : Collection
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
    public function rootDadons(string $order = 'id', $except = []) : Collection
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
    public function createDadon(array $params) : Dadon
    {
        try {

            $collection = collect($params);
            if (isset($params['address'])) {
                $slug =($params['address']);
            }
            $merge = $collection->merge(compact('slug'));
            
            $customer = new Dadon($merge->all());

            if (isset($params['parent'])) {
                $parent = $this->findDueById($params['parent']);
                $category->parent()->associate($parent);
            }

            $customer->save();
            return $customer;
        } catch (QueryException $e) {
            throw new DadonInvalidArgumentException($e->getMessage());
        }
    }
    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findDadonById(int $id) : Dadon
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new DadonNotFoundException($e->getMessage());
        }
    }
     /**
     * Update the category
     * @param array $params
     *
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function updateDadon(array $params) : Dadon
    {  
        $category = $this->findDadonById($this->model->id);
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
            $parent = $this->findDadonById($params['id']);
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
    public function deleteDadon() : bool
    {

    }



}
