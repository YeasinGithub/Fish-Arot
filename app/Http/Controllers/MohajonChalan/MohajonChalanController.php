<?php

namespace App\Http\Controllers\Sell;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Requestss;
use App\Http\Controllers\Sell\Requests\CreateSellsRequest;
use Illuminate\Http\Request;
use App\FishRepository\Sell\Repositories\SellsRepository;
use App\FishRepository\Sell\Repositories\Interfaces\SellsInterface;
use App\FishRepository\Sell\Sell;

class SellController extends Controller
{
   private $sellRepo;
  /******************************/

    public function __construct(SellsInterface $sellRepository)
      {
        $this->sellRepo = $sellRepository;
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {      
         $list = $this->sellRepo->listSells('created_at', 'desc');
         return view('Admin.Sell.sellsShow', [
               'sells' => $list,
               ]);
          //return $list;
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Sell.sells', [
            'sells' => $this->sellRepo->listSells('mohajon_name', 'asc')
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->sellRepo->createSell($request->except('_token', '_method'));
        return redirect('/sell')->with('msg', 'Sells Data Saved In Database successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      return view('Admin.Sell.sellEdit', [
            'sells' => $this->sellRepo->listSells('mohajon_name', 'asc', $id),
            'sell' => $this->sellRepo->findSellById($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
       // @dd($request->all());
        $list = $this->sellRepo->findSellById($id);

        $update = new SellsRepository($list);
        $update->updateSell($request->except('_token', '_method'));

        return redirect('/sell/show')->with('msg', 'Sells Data Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->sellRepo->findSellById($id);
       // $category->products()->sync([]);
        $category->delete();

        return redirect('/sell/show')->with('msgR', 'Data Deleted successfully');

    }

}
