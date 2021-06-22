<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Requestss;
use App\Http\Controllers\Sell\Requests\CreateSellsRequest;
use Illuminate\Http\Request;
use App\FishRepository\Sell\Repositories\SellsRepository;
use App\FishRepository\Sell\Repositories\Interfaces\SellsInterface;

use App\Models\Sell;
use App\Models\Paikar;
use App\Models\Mohajon;

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
         /*$list = $this->sellRepo->listSells('created_at', 'desc');
         return view('Admin.Sell.sellsShow', [
               'sells' => $list,
               ]);*/
         //return $list;

               /*--Work--*/
               /*$mohajons=Mohajon::get();
                $paikars=Paikar::get();

                $sells = Sell::with('mohajon', 'paikar')->latest()->paginate(5);
                return view('Admin.Sell.sells', compact('sells', 'mohajons', 'paikars'));*/

                $sells = $this->sellRepo->listSells('created_at', 'desc');
			           return response()->json([
			      'success' => true,
			      'message' => 'Sells List',
			      'data'    => $sells
			  ]);
			     return $sells;
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mohajons=Mohajon::get();
        $paikars=Paikar::get();

        return view('Admin.Sell.sells', [ 'sells' => $this->sellRepo->listSells('address', 'asc'),'mohajons'=>$mohajons,'paikars'=>$paikars ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*return $request->all();*/

        $this->sellRepo->createSell($request->except('_token', '_method'));
        return redirect('/sell/show')->with('msg', 'Sells Data Saved In Database successfully');


        /*$insert = Sell::insert([
            "mohajon_id" => $request->mohajon_id,
            "paikar_id" => $request->paikar_id,
            "address" => $request->address,
            "fish_weight" => $request->fish_weight,
            "price_per_kg" => $request->price_per_kg,
            "total" => $request->total,
            "arot_total" => $request->arot_total,
        ]);

        if($insert){
            return response()->json("success");
        }else{
            return response()->json("error");
        }*/


    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

      /*return view('Admin.Sell.sellEdit', [
            'sells' => $this->sellRepo->listSells('mohajon_id', 'asc', $id),
            'sell' => $this->sellRepo->findSellById($id)
        ]);*/

       
         $id = $request->id;
        $editData = Sell::find($id);
        return $editData;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request)
    {
       // @dd($request->all());
        $update = Sell::where("id", $request->id)->update([
            "mohajon_id" => $request->mohajon_id,
            "paikar_id" => $request->paikar_id,
            "address" => $request->address,
            "fish_weight" => $request->fish_weight,
            "price_per_kg" => $request->price_per_kg,
            "total" => $request->total,
            "arot_total" => $request->arot_total,
        ]);
        if($update){
                return response()->json("success");
        }else{
                return response()->json("error");
        }
        /*$list = $this->sellRepo->findSellById($id);
        $update = new SellsRepository($list);
        $update->updateSell($request->except('_token', '_method'));

        return redirect('/sell/show')->with('msg', 'Sells Data Updated successfully');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

       $category = $this->sellRepo->findSellById($request->id);

        if($category->delete()){
                return response()->json("success");
        }else{
                return response()->json("error");
        }

       //  return redirect('/sell/show')->with('msgR', 'Data Deleted successfully');
        
        /*$delete = Sell::where("id", $request->id)->delete();
        if($delete){
                return response()->json("success");
        }else{
                return response()->json("error");
        }*/

    }
}
