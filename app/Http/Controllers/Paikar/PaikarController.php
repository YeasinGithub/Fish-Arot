<?php

namespace App\Http\Controllers\Paikar;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Requestss;
use App\Http\Controllers\Paikar\Requests\CreatePaikarRequest;
use Illuminate\Http\Request;
use App\FishRepository\Paikar\Repositories\PaikarRepository;
use App\FishRepository\Paikar\Repositories\Interfaces\PaikarInterface;

use App\Models\Paikar;

class PaikarController extends Controller
{
   private $dueRepo;
  /******************************/

    public function __construct(PaikarInterface $paikarRepository)
      {
        $this->paikarRepo = $paikarRepository;
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     { 

        $list = $this->paikarRepo->listPaikars('created_at', 'desc');
            return view('Admin.Paikar.paikar', [
            'paikars' => $list,
            ]);

        //return view('Admin.Sell.sells',compact('lists', $lists));

    /*  $mohajons=Mohajon::get();
        $paikars=Paikar::get();

        $sells = Due::with('mohajon', 'paikar')->latest()->paginate();
        return view('Admin.Due.sells', compact('sells', 'mohajons', 'paikars'));*/

        //return $list;
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$mohajons=Mohajon::get();
        $paikars=Paikar::get();*/

        return view('Admin.Paikar.paikar', [ 'paikars' => $this->paikarRepo->listPaikars('address', 'asc') ]);
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

        $this->paikarRepo->createPaikar($request->except('_token', '_method'));
        return redirect('/paikar/show');


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
        $editData = Paikar::find($id);
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
        $update = Paikar::where("id", $request->id)->update([
            "paikar_name" => $request->paikar_name,
            "address" => $request->address,
        ]);
        if($update){
                /*return response()->json("success");*/
                return redirect('/paikar/show');
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

       /*$category = $this->paikarRepo->findPaikarById($request->id);

        if($category->delete()){
                return response()->json("success");
        }else{
                return response()->json("error");
        }*/

            $update = Paikar::where("id", $request->id)->update([
                "status" =>0,
             
            ]);
            if($update){
                    return response()->json("success");

                }
        }

}
